<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Material;
use App\Models\ProgressPerLesson;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class LessonController extends Controller
{
  public function index()
  {
    $lessons = Lesson::orderBy('order')->get();
    return Inertia::render('Manage/Lesson/Index', ['lessons' => $lessons]);
  }

  public function detail(string $id)
  {
    $lesson = Lesson::find($id);
    $materials = Material::where('id_lesson', '=', $id)->get();
    $quizzes = Quiz::where('id_lesson', '=', $id)->get();
    return Inertia::render('Manage/Lesson/Detail', [
      'lesson' => $lesson,
      'materials' => $materials,
      'quizzes' => $quizzes,
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'lesson_name' => 'required',
      'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'class' => 'required',
    ]);

    $file_name = 'default.png';
    if ($request->cover) {
      $file_name = time() . '_' . uniqid() . '.' . $request->cover->extension();
      $request->cover->storeAs('public/images', $file_name);
    }

    $last_item = Lesson::where('class', $request->class)
      ->orderBy('order', 'desc')
      ->first();

    Lesson::create([
      'lesson_name' => $request->lesson_name,
      'cover' => $file_name,
      'class' => $request->class,
      'order' => $last_item->order + 1
    ]);
  }

  public function edit(string $id)
  {
    return Inertia::render('Manage/Lesson/Edit', ['lesson' => Lesson::find($id)]);
  }

  public function update(Request $request, string $id)
  {
    $request->validate([
      'lesson_name' => 'required',
      'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'class' => 'required',
    ]);

    $lesson = Lesson::find($id);
    $lesson->lesson_name = $request->lesson_name;
    $lesson->class = $request->class;
    if ($request->cover) {
      if ($lesson->cover !== 'default.png') {
        Storage::delete('public/images/' . $lesson->cover);
      }
      $file_name = time() . '_' . uniqid() . '.' . $request->cover->extension();;
      $request->cover->storeAs('public/images', $file_name);
      $lesson->cover = $file_name;
    }
    $lesson->save();
    return to_route('manage.lesson.index');
  }

  public function destroy(string $id)
  {
    $lesson = Lesson::find($id);
    Lesson::where('class', $lesson->class)
      ->where('order', '>', $lesson->order)
      ->decrement('order');
    if ($lesson->cover !== 'default.png') {
      Storage::delete('public/images/' . $lesson->cover);
    }
    $lesson->delete();
  }

  public function edit_order(Request $request)
  {
    $new_ids = $request->orderedIds;
    for ($i = 0; $i < count($new_ids); $i++) {
      Lesson::where('id', $new_ids[$i])->update(['order' => $i + 1]);
    }
  }

  // API
  public function get_all_lessons(Request $request)
  {
    $class = $request->query('class') ?? 'all';
    $id_user = auth('api')->user()->id;

    $data = ProgressPerLesson::whereHas('lesson', function ($query) use ($class) {
      if ($class != 'all') {
        $query->where('class', $class);
      }
    })->where('id_user', $id_user)
      ->with('lesson')
      ->get()
      ->map(function ($progress_per_lesson) {
        $lesson = $progress_per_lesson->lesson;
        $lesson['cover'] = env('APP_HOST_NAME') . '/storage/images/' . $lesson['cover'];
        $lesson['progress'] = $progress_per_lesson->progress;
        return $lesson;
      });

    return response(['data' => $data]);
  }
}
