<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
  return Inertia::render('Welcome', [
    'canLogin' => Route::has('login'),
    'canRegister' => Route::has('register'),
    'laravelVersion' => Application::VERSION,
    'phpVersion' => PHP_VERSION,
  ]);
});

Route::middleware(['auth', 'is_admin'])->group(function () {

  // DATATABLE
  Route::get('/datatables/user', [UserController::class, 'get_user']);
  Route::delete('/datatables/user/{id}', [UserController::class, 'delete_user']);
  Route::put('/datatables/user/{id}', [UserController::class, 'update_user']);

  Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
  })->name('dashboard');

  // USER
  Route::get('/dashboard/manage/user', [UserController::class, 'index'])->name('manage.user.index');
  Route::get('/dashboard/manage/user/create', [UserController::class, 'create'])->name('manage.user.create');
  Route::get('/dashboard/manage/user/{id}', [UserController::class, 'detail'])->name('manage.user.detail');
  Route::post('/dashboard/manage/user', [UserController::class, 'store'])->name('manage.user.store');

  // LESSON
  Route::get('/dashboard/manage/lesson', [LessonController::class, 'index'])->name('manage.lesson.index');
  Route::get('/dashboard/manage/lesson/edit/{id}', [LessonController::class, 'edit'])->name('manage.lesson.edit');
  Route::post('/dashboard/manage/lesson', [LessonController::class, 'store'])->name('manage.lesson.store');
  Route::get('/dashboard/manage/lesson/{id}', [LessonController::class, 'detail'])->name('manage.lesson.detail');
  Route::post('/dashboard/manage/lesson/{id}', [LessonController::class, 'update'])->name('manage.lesson.update');
  Route::delete('/dashboard/manage/lesson/{id}', [LessonController::class, 'destroy'])->name('manage.lesson.destroy');

  // MATERIAL
  Route::get('/dashboard/manage/lesson/{id}/material/add', [MaterialController::class, 'create'])->name('manage.lesson.material.create');
  Route::post('/dashboard/manage/lesson/{id}/material/add', [MaterialController::class, 'store'])->name('manage.lesson.material.store');
  Route::get('/dashboard/manage/lesson/{id}/material/edit/{material_id}', [MaterialController::class, 'edit'])->name('manage.lesson.material.edit');
  Route::post('/dashboard/manage/lesson/{id}/material/edit/{material_id}', [MaterialController::class, 'update'])->name('manage.lesson.material.update');
  Route::delete('/dashboard/manage/lesson/{id}/material', [MaterialController::class, 'destroy'])->name('manage.lesson.material.destroy');

  // QUIZ
  Route::get('/dashboard/manage/lesson/{id}/quiz/add', [QuizController::class, 'create'])->name('manage.lesson.quiz.create');
  Route::post('/dashboard/manage/lesson/{id}/quiz/add', [QuizController::class, 'store'])->name('manage.lesson.quiz.store');
  Route::get('/dashboard/manage/lesson/{id}/quiz/edit/{quiz_id}', [QuizController::class, 'edit'])->name('manage.lesson.quiz.edit');
  Route::post('/dashboard/manage/lesson/{id}/quiz/edit/{quiz_id}', [QuizController::class, 'update'])->name('manage.lesson.quiz.update');
  Route::delete('/dashboard/manage/lesson/{id}/quiz', [QuizController::class, 'destroy'])->name('manage.lesson.quiz.destroy');

  // ADMIN PROFILE
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
