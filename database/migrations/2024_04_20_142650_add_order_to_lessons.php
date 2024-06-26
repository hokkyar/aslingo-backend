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
    Schema::table('lessons', function (Blueprint $table) {
      $table->unsignedInteger('order')->after('id')->nullable();
    });

    $classes = DB::table('lessons')->select('class')->distinct()->pluck('class');
    foreach ($classes as $class) {
      $lessons = DB::table('lessons')->where('class', $class)->orderBy('id')->get();
      $order = 1;
      foreach ($lessons as $lesson) {
        DB::table('lessons')->where('id', $lesson->id)->update(['order' => $order]);
        $order++;
      }
    }
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('lessons', function (Blueprint $table) {
      $table->dropColumn('order');
    });
  }
};
