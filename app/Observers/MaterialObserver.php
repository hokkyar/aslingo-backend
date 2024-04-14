<?php

namespace App\Observers;

use App\Models\Material;
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
      foreach ($user_ids as $user_id) {
        UserMaterialCheck::create([
          'id_user' => $user_id,
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
    //
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
