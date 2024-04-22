<?php

namespace App\Observers;

use App\Models\Lesson;
use App\Models\ProgressPerClass;
use App\Models\ProgressPerLesson;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LessonObserver
{
  /**
   * Handle the Lesson "created" event.
   */
  public function created(Lesson $lesson): void
  {
    DB::beginTransaction();
    try {
      $user_ids = User::pluck('id');
      $class = $lesson->class;
      $all_lesson_class_n = Lesson::where('class', $class);
      $lesson_ids = $all_lesson_class_n->pluck('id');
      $lesson_count = $all_lesson_class_n->count();

      foreach ($user_ids as $user_id) {
        ProgressPerLesson::create([
          'id_user' => $user_id,
          'id_lesson' => $lesson->id,
        ]);

        // Progress Per Class
        $user_lesson_progress = ProgressPerLesson::whereIn('id_lesson', $lesson_ids)
          ->where('id_user', $user_id)->pluck('progress')->sum();
        $progress_per_class = ($user_lesson_progress / ($lesson_count * 100)) * 100;
        ProgressPerClass::where('id_user', $user_id)->where('class', $class)->update([
          'progress' => $progress_per_class
        ]);
      }
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
  }

  /**
   * Handle the Lesson "updated" event.
   */
  public function updated(Lesson $lesson): void
  {
    //
  }

  /**
   * Handle the Lesson "deleted" event.
   */
  public function deleted(Lesson $lesson): void
  {
    DB::beginTransaction();
    try {
      $user_ids = User::pluck('id');
      $class = $lesson->class;
      $all_lesson_class_n = Lesson::where('class', $class);
      $lesson_ids = $all_lesson_class_n->pluck('id');
      $lesson_count = $all_lesson_class_n->count();

      foreach ($user_ids as $user_id) {
        // Progress Per Class
        $user_lesson_progress = ProgressPerLesson::whereIn('id_lesson', $lesson_ids)
          ->where('id_user', $user_id)->pluck('progress')->sum();
        $progress_per_class = ($user_lesson_progress / ($lesson_count * 100)) * 100;
        ProgressPerClass::where('id_user', $user_id)->where('class', $class)->update([
          'progress' => $progress_per_class
        ]);
      }
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
  }

  /**
   * Handle the Lesson "restored" event.
   */
  public function restored(Lesson $lesson): void
  {
    //
  }

  /**
   * Handle the Lesson "force deleted" event.
   */
  public function forceDeleted(Lesson $lesson): void
  {
    //
  }
}
