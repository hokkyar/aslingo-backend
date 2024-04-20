<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('materials', function (Blueprint $table) {
      $table->unsignedInteger('order')->after('id')->nullable();
    });

    $lessonIds = DB::table('materials')->select('id_lesson')->distinct()->pluck('id_lesson');
    foreach ($lessonIds as $lessonId) {
      $materials = DB::table('materials')->where('id_lesson', $lessonId)->orderBy('id')->get();
      $order = 1;
      foreach ($materials as $material) {
        DB::table('materials')->where('id', $material->id)->update(['order' => $order]);
        $order++;
      }
    }
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('materials', function (Blueprint $table) {
      $table->dropColumn('order');
    });
  }
};
