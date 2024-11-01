<?php

namespace App\Observers;

use App\Models\Lesson;
use App\Models\Material;
use App\Models\ProgressPerClass;
use App\Models\ProgressPerLesson;
use App\Models\User;
use App\Models\UserMaterialCheck;
use Illuminate\Support\Facades\DB;

class MaterialObserver
{
  /**
   * Handle the Material "created" event.
   */
  public function created(Material $material): void
  {
    DB::beginTransaction();
    try {
      $user_ids = User::pluck('id');
      $id_lesson = $material->lesson->id;
      $class = $material->lesson->class;

      $materials = Material::where('id_lesson', $id_lesson)->get();
      $all_lesson_class_n = Lesson::where('class', $class);
      $lesson_ids = $all_lesson_class_n->pluck('id');
      $lesson_count = $all_lesson_class_n->count();

      // MaterialCheck
      foreach ($user_ids as $user_id) {
        UserMaterialCheck::create([
          'id_user' => $user_id,
          'id_material' => $material->id,
        ]);

        // Progress Per Lesson
        $user_check_count = 0;
        foreach ($materials as $material) {
          $is_done = UserMaterialCheck::where('id_user', $user_id)
            ->where('id_material', $material->id)
            ->value('is_done');
          if ($is_done) {
            $user_check_count++;
          }
        }
        $progress_per_lesson = ($user_check_count / $materials->count()) * 100;
        ProgressPerLesson::where('id_user', $user_id)
          ->where('id_lesson', $id_lesson)
          ->update([
            'progress' => $progress_per_lesson
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
   * Handle the Material "updated" event.
   */
  public function updated(Material $material): void
  {
    //
  }

  /**
   * Handle the Material "deleted" event.
   */
  public function deleted(Material $material): void
  {
    DB::beginTransaction();
    try {
      $user_ids = User::pluck('id');
      $id_lesson = $material->lesson->id;
      $class = $material->lesson->class;

      $materials = Material::where('id_lesson', $id_lesson)->get();
      $all_lesson_class_n = Lesson::where('class', $class);
      $lesson_ids = $all_lesson_class_n->pluck('id');
      $lesson_count = $all_lesson_class_n->count();

      foreach ($user_ids as $user_id) {
        // Progress Per Lesson
        $user_check_count = 0;
        foreach ($materials as $material) {
          $is_done = UserMaterialCheck::where('id_user', $user_id)
            ->where('id_material', $material->id)
            ->value('is_done');
          if ($is_done) {
            $user_check_count++;
          }
        }
        $progress_per_lesson = $materials->count() > 0
                ? ($user_check_count / $materials->count()) * 100
                : 0;
        ProgressPerLesson::where('id_user', $user_id)
          ->where('id_lesson', $id_lesson)
          ->update([
            'progress' => $progress_per_lesson
          ]);

        // Progress Per Class
        $user_lesson_progress = ProgressPerLesson::whereIn('id_lesson', $lesson_ids)
          ->where('id_user', $user_id)->pluck('progress')->sum();
        $progress_per_class = $lesson_count > 0
          ? ($user_lesson_progress / ($lesson_count * 100)) * 100
          : 0;
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
   * Handle the Material "restored" event.
   */
  public function restored(Material $material): void
  {
    //
  }

  /**
   * Handle the Material "force deleted" event.
   */
  public function forceDeleted(Material $material): void
  {
    //
  }
}
