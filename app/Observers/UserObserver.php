<?php

namespace App\Observers;

use Illuminate\Support\Facades\DB;
use App\Models\Lesson;
use App\Models\Material;
use App\Models\User;
use App\Models\ProgressPerClass;
use App\Models\ProgressPerLesson;
use App\Models\Quiz;
use App\Models\UserMaterialCheck;
use App\Models\UserQuizScore;

class UserObserver
{
  /**
   * Handle the User "created" event.
   */
  public function created(User $user): void
  {
    DB::beginTransaction();
    try {
      // add user class from 7 to 9
      for ($class = 7; $class <= 9; $class++) {
        ProgressPerClass::create([
          'id_user' => $user->id,
          'class' => (string)$class,
        ]);
      }

      // add user lesson progress
      $lessons = Lesson::all();
      foreach ($lessons as $lesson) {
        ProgressPerLesson::create([
          'id_user' => $user->id,
          'id_lesson' => $lesson->id,
        ]);
      }

      // add user material checks
      $materials = Material::all();
      foreach ($materials as $material) {
        UserMaterialCheck::create([
          'id_user' => $user->id,
          'id_material' => $material->id,
        ]);
      }
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
  }

  /**
   * Handle the User "updated" event.
   */
  public function updated(User $user): void
  {
    //
  }

  /**
   * Handle the User "deleted" event.
   */
  public function deleted(User $user): void
  {
    //
  }

  /**
   * Handle the User "restored" event.
   */
  public function restored(User $user): void
  {
    //
  }

  /**
   * Handle the User "force deleted" event.
   */
  public function forceDeleted(User $user): void
  {
    //
  }
}
