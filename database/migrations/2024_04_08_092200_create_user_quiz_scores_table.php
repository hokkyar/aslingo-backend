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
    Schema::create('user_quiz_scores', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_lesson');
      $table->unsignedBigInteger('id_user');
      $table->integer('score')->default(0);
      $table->timestamps();

      $table->foreign('id_lesson')->references('id')->on('lessons')->onUpdate('cascade')->onDelete('cascade');
      $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('user_quiz_scores');
  }
};
