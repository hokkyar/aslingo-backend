<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Material;
use App\Models\ProgressPerClass;
use App\Models\ProgressPerLesson;
use App\Models\Quiz;
use App\Models\UserMaterialCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class MaterialController extends Controller
{
  public function create(string $id)
  {
    $lesson = Lesson::find($id);
    return Inertia::render('Manage/Material/Create', ['lesson' => $lesson]);
  }

  public function store(Request $request, string $id)
  {
    $request->validate([
      'material_name' => 'required',
      'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'head_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'ilustration' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'text_en' => 'required',
      'text_id' => 'required',
    ]);

    $cover = 'default.png';
    $head_pic = 'default.png';
    $ilustration = 'default.png';

    if ($request->cover) {
      $cover = time() . '_' . uniqid() . '.' . $request->cover->extension();
      $request->cover->storeAs('public/images', $cover);
    }
    if ($request->head_pic) {
      $head_pic = time() . '_' . uniqid() . '.' . $request->head_pic->extension();
      $request->head_pic->storeAs('public/images', $head_pic);
    }
    if ($request->ilustration) {
      $ilustration = time() . '_' . uniqid() . '.' . $request->ilustration->extension();
      $request->ilustration->storeAs('public/images', $ilustration);
    }

    $last_item = Material::where('id_lesson', $id)
      ->orderBy('order', 'desc')
      ->first();

    Material::create([
      'id_lesson' => $id,
      'material_name' => $request->material_name,
      'text_en' => $request->text_en,
      'text_id' => $request->text_id,
      'cover' => $cover,
      'head_pic' => $head_pic,
      'ilustration' => $ilustration,
      'video' => $request->video,
      'order' => $last_item->order + 1,
    ]);

    return to_route('manage.lesson.detail', $id);
  }

  public function edit(string $id, string $material_id)
  {
    $material = Material::find($material_id);
    return Inertia::render('Manage/Material/Edit', ['lesson_id' => $id, 'material' => $material]);
  }

  public function update(Request $request, string $id, string $material_id)
  {
    $request->validate([
      'material_name' => 'required',
      'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'head_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'ilustration' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'text_en' => 'required',
      'text_id' => 'required',
    ]);

    $material = Material::find($material_id);
    $material->material_name = $request->material_name;
    $material->text_en = $request->text_en;
    $material->text_id = $request->text_id;
    $material->video = $request->video;

    if ($request->cover) {
      if ($material->cover !== 'default.png') {
        Storage::delete('public/images/' . $material->cover);
      }
      $cover = time() . '_' . uniqid() . '.' . $request->cover->extension();
      $request->cover->storeAs('public/images', $cover);
      $material->cover = $cover;
    }
    if ($request->head_pic) {
      if ($material->head_pic !== 'default.png') {
        Storage::delete('public/images/' . $material->head_pic);
      }
      $head_pic = time() . '_' . uniqid() . '.' . $request->head_pic->extension();
      $request->head_pic->storeAs('public/images', $head_pic);
      $material->head_pic = $head_pic;
    }
    if ($request->ilustration) {
      if ($material->ilustration !== 'default.png') {
        Storage::delete('public/images/' . $material->ilustration);
      }
      $ilustration = time() . '_' . uniqid() . '.' . $request->ilustration->extension();
      $request->ilustration->storeAs('public/images', $ilustration);
      $material->ilustration = $ilustration;
    }

    $material->save();
    return to_route('manage.lesson.detail', $id);
  }

  public function destroy(string $id, string $material_id)
  {
    $material = Material::find($material_id);
    Material::where('id_lesson', $id)
      ->where('order', '>', $material->order)
      ->decrement('order');

    if ($material->cover !== 'default.png') {
      Storage::delete('public/images/' . $material->cover);
    }
    if ($material->head_pic !== 'default.png') {
      Storage::delete('public/images/' . $material->head_pic);
    }
    if ($material->ilustration !== 'default.png') {
      Storage::delete('public/images/' . $material->ilustration);
    }
    $material->delete();
  }

  public function edit_order(Request $request)
  {
    $new_ids = $request->orderedIds;
    for ($i = 0; $i < count($new_ids); $i++) {
      Material::where('id', $new_ids[$i])->update(['order' => $i + 1]);
    }
  }

  // API
  public function get_all_materials(string $id_lesson)
  {
    $id_user = auth('api')->user()->id;
    $user_material_check = UserMaterialCheck::where('id_user', $id_user)
      ->with('material')
      ->get();

    $data = $user_material_check->map(function ($item) use ($id_lesson) {
      if ($item->material->id_lesson == $id_lesson) {
        return [
          'id' => $item->id_material,
          'material_name' => $item->material->material_name,
          'cover' => $item->material->cover,
          'is_done' => $item->is_done
        ];
      }
    })->filter()->values();

    return response(['data' => $data]);
  }

  public function get_detail_material(string $id_lesson, string $id_material)
  {
    $id_user = auth('api')->user()->id;

    $material = Material::select('id', 'material_name', 'cover', 'head_pic', 'text_en', 'text_id', 'ilustration', 'video')
      ->find($id_material);

    $user_material_check = UserMaterialCheck::where('id_user', $id_user)
      ->where('id_material', $id_material)
      ->get('is_done')
      ->first();

    $material->is_done = $user_material_check['is_done'];

    return response([
      'data' => $material
    ]);
  }

  public function check_material(string $id_lesson, string $id_material)
  {
    DB::beginTransaction();
    try {
      $id_user = auth('api')->user()->id;
      UserMaterialCheck::where('id_user', $id_user)
        ->where('id_material', $id_material)
        ->update([
          'is_done' => true
        ]);

      // UPDATE PROGRESS PER LESSON
      $materials = Material::where('id_lesson', $id_lesson)->get();
      $user_check_count = 0;
      foreach ($materials as $material) {
        $is_done = UserMaterialCheck::where('id_user', $id_user)
          ->where('id_material', $material->id)
          ->value('is_done');
        if ($is_done) {
          $user_check_count++;
        }
      }
      $progress_per_lesson = ($user_check_count / $materials->count()) * 100;
      ProgressPerLesson::where('id_user', $id_user)
        ->where('id_lesson', $id_lesson)
        ->update([
          'progress' => $progress_per_lesson
        ]);

      // UPDATE PROGRESS PER CLASS
      $class = Lesson::find($id_lesson)->class;
      $all_lesson_class_n = Lesson::where('class', $class);
      $lesson_ids = $all_lesson_class_n->pluck('id');

      $lesson_count = $all_lesson_class_n->count();
      $user_lesson_progress = ProgressPerLesson::whereIn('id_lesson', $lesson_ids)
        ->where('id_user', $id_user)->pluck('progress')->sum();

      $progress_per_class = ($user_lesson_progress / ($lesson_count * 100)) * 100;

      ProgressPerClass::where('id_user', $id_user)->where('class', $class)->update([
        'progress' => $progress_per_class
      ]);

      DB::commit();
      return response([
        'message' => 'success'
      ]);
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
  }
}
