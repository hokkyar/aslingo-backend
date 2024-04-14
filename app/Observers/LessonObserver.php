<?php

namespace App\Observers;

use App\Models\Lesson;
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
      foreach ($user_ids as $user_id) {
        ProgressPerLesson::create([
          'id_user' => $user_id,
          'id_lesson' => $lesson->id,
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
    //
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
