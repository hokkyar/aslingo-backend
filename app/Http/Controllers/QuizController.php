<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\UserAnswer;
use App\Models\UserQuizScore;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class QuizController extends Controller
{
  public function create(string $id)
  {
    $lesson = Lesson::find($id);
    $material = Material::where('id_lesson', $id)->select('material_name', 'video')->get();
    return Inertia::render('Manage/Quiz/Create', ['lesson' => $lesson, 'material' => $material]);
  }

  public function store(Request $request, string $id)
  {
    $request->validate([
        'asset_url' => 'required',
        'correct_answer' => 'required',
    ]);

    $existingQuiz = Quiz::where('id_lesson', $id)
        ->where('asset_url', $request->asset_url)
        ->first();

    if ($existingQuiz) {
        return redirect()->back()->withErrors(['asset_url' => 'This video is already used in another quiz.']);
    }

    $questionCount = Quiz::where('id_lesson', $id)->count();
    
    $content = $questionCount > 0 ? 'Question ' . ($questionCount + 1) : 'Question 1';

    $cover = 'default_quiz.png';

    Quiz::create([
        'id_lesson' => $id,
        'cover' => $cover,
        'asset_url' => $request->asset_url,
        'content' => $content,
        'correct_answer' => $request->correct_answer,
        'col_1' => $request->col_1,
        'col_2' => $request->col_2,
        'col_3' => $request->col_3,
        'col_4' => $request->col_4,
    ]);
    
    return to_route('manage.lesson.detail', $id);
  }


  public function edit(string $id, string $quiz_id)
  {
    
    $quiz = Quiz::find($quiz_id);
    $material = Material::where('id_lesson', $id)->select('material_name', 'video')->get();
    return Inertia::render('Manage/Quiz/Edit', ['lesson_id' => $id, 'quiz' => $quiz, 'material' => $material]);
  }
  
  public function update(Request $request, string $id, string $quiz_id)
  {
      $request->validate([
          'asset_url' => 'required',
          'correct_answer' => 'required',
      ]);
  
      $quiz = Quiz::find($quiz_id);
  
      $existingQuiz = Quiz::where('id_lesson', $id)
          ->where('asset_url', $request->asset_url)
          ->where('id', '!=', $quiz_id) 
          ->first();
  
      if ($existingQuiz) {
          return redirect()->back()->withErrors(['asset_url' => 'This video is already used in another quiz.']);
      }
  
      $quiz->correct_answer = $request->correct_answer;
      $quiz->content = $request->content;
      $quiz->col_1 = $request->col_1;
      $quiz->col_2 = $request->col_2;
      $quiz->col_3 = $request->col_3;
      $quiz->col_4 = $request->col_4;
      $quiz->asset_url = $request->asset_url;
      $quiz->save();
  
      return to_route('manage.lesson.detail', $id);
  }
  
  public function destroy(string $id)
  {
    $quiz = Quiz::find($id);

    $quiz->delete();
  }

  // API
  public function get_all_quiz(string $id_lesson)
  {
    $id_user = auth('api')->user()->id;
    $scores = UserQuizScore::where('id_user',  $id_user)
      ->where('id_lesson', $id_lesson)
      ->pluck('score');

    $quizzes = Quiz::where('id_lesson', $id_lesson)->get();
    $user_answers = UserAnswer::where('id_user', $id_user)->whereIn('id_quiz', $quizzes->pluck('id'))->get();
    $result = $quizzes->map(function ($quiz) use ($user_answers) {
      $user_answer = $user_answers->where('id_quiz', $quiz->id)->first();
      return [
        'id' => $quiz->id,
        'cover' => $quiz->cover ? env('APP_HOST_NAME') . '/storage/images/' . $quiz->cover : null,
        'asset_url' => $quiz->asset_url ? env('APP_HOST_NAME') . '/storage/videos/' . $quiz->asset_url : null,
        'content' => $quiz->content,
        'correct_answer' => $quiz->correct_answer,
        'col_1' => $quiz->col_1,
        'col_2' => $quiz->col_2,
        'col_3' => $quiz->col_3,
        'col_4' => $quiz->col_4,
        'user_answer' => $user_answer ? $user_answer->answer : null,
      ];
    });

    $data = [
      'user_scores' => $scores,
      'highest_score' => $scores->max(),
      'latest_score' => $scores->last(),
      'quiz' => $result
    ];

    return response(['data' => $data]);
  }

  public function attemt_quiz_score(string $id_lesson, Request $request)
  {

    $validator = Validator::make($request->all(), [
      'answers' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()], 400);
    }

    DB::beginTransaction();
    try {
      $id_user = auth('api')->user()->id;
      $user_answers = $request->answers;
      $quiz_answers = Quiz::where('id_lesson', $id_lesson)->get(['id', 'correct_answer']);

      $total_questions = count($quiz_answers);
      $correct_answers = 0;

      foreach ($user_answers as $user_answer) {
        $quiz_answer = $quiz_answers->firstWhere('id', $user_answer['id']);
        UserAnswer::updateOrCreate(
          [
            'id_user' => $id_user,
            'id_quiz' => $user_answer['id']
          ],
          [
            'answer' => $user_answer['user_answer']
          ]
        );
        if ($quiz_answer && $user_answer['user_answer'] === $quiz_answer['correct_answer']) {
          $correct_answers++;
        }
      }

      $score = ($correct_answers / $total_questions) * 100;
      UserQuizScore::create([
        'id_lesson' => $id_lesson,
        'id_user' => $id_user,
        'score' => $score
      ]);
      DB::commit();
      return response(['score' => $score]);
    } catch (\Exception $e) {
      DB::rollback();
      return response(['error' => 'server_error', 'message' => 'Terjadi kesalahan pada server'], 500);
    }
  }
}
