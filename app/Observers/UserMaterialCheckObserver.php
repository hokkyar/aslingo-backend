<?php

namespace App\Observers;

use App\Models\Material;
use App\Models\ProgressPerLesson;
use App\Models\UserMaterialCheck;
use Illuminate\Support\Facades\DB;

class UserMaterialCheckObserver
{
  /**
   * Handle the UserMaterialCheck "created" event.
   */
  public function created(UserMaterialCheck $userMaterialCheck): void
  {
    //
  }

  /**
   * Handle the UserMaterialCheck "updated" event.
   */
  public function updated(UserMaterialCheck $userMaterialCheck)
  {
    // DB::beginTransaction();
    // try {
    //   $id_lesson = $userMaterialCheck->material->lesson->id;
    //   $materials = Material::where('id_lesson', $id_lesson)->get();
    //   $user_check_count = 0;

    //   foreach ($materials as $material) {
    //     $is_done = UserMaterialCheck::where('id_user', $userMaterialCheck->id_user)
    //       ->where('id_material', $material->id)
    //       ->value('is_done');
    //     if ($is_done) {
    //       $user_check_count++;
    //     }
    //   }

    //   $progress = ($user_check_count / $materials->count()) * 100;
    //   ProgressPerLesson::where('id_user', $userMaterialCheck->id_user)
    //     ->where('id_lesson', $id_lesson)
    //     ->update([
    //       'progress' => $progress
    //     ]);
    //   DB::commit();
    // } catch (\Exception $e) {
    //   DB::rollback();
    //   throw $e;
    // }
  }

  /**
   * Handle the UserMaterialCheck "deleted" event.
   */
  public function deleted(UserMaterialCheck $userMaterialCheck): void
  {
    //
  }

  /**
   * Handle the UserMaterialCheck "restored" event.
   */
  public function restored(UserMaterialCheck $userMaterialCheck): void
  {
    //
  }

  /**
   * Handle the UserMaterialCheck "force deleted" event.
   */
  public function forceDeleted(UserMaterialCheck $userMaterialCheck): void
  {
    //
  }
}
