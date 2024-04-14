<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('progress_per_lesson', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_user');
      $table->unsignedBigInteger('id_lesson');
      $table->integer('progress')->default(0);
      $table->timestamps();

      $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
      $table->foreign('id_lesson')->references('id')->on('lessons')->onUpdate('cascade')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('progress_per_lesson');
  }
};
