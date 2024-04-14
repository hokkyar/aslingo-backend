<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthController::class, 'login']); // Page LOGIN
Route::post('/auth/register', [AuthController::class, 'register']); // Page REGISTER

Route::middleware(['is_student'])->group(function () {

  Route::group([
    'prefix' => 'auth'
  ], function ($router) {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
  });

  // home
  Route::get('/home', [HomeController::class, 'index']); // Page HOME

  // get all lessons
  Route::get('/lessons', [LessonController::class, 'get_all_lessons']); // Page CLASS

  // get all materials by lesson
  Route::get('/lessons/{id_lesson}/materials', [MaterialController::class, 'get_all_materials']); // Page LIST LESSON

  // get detail material
  Route::get('/lessons/{id_lesson}/materials/{id_material}', [MaterialController::class, 'get_detail_material']); // Page LESSON

  // update progress
  Route::put('/lessons/{id_lesson}/materials/{id_material}/update', [MaterialController::class, 'check_material']); // Update Progress

  // get all quizzes by lesson
  Route::get('/lessons/{id_lesson}/quiz', [QuizController::class, 'get_all_quiz']); // Page QUIZ

  // attempt quiz score
  Route::post('/lessons/{id_lesson}/quiz/attempt-answer', [QuizController::class, 'attemt_quiz_score']); // Finish Quiz
});
