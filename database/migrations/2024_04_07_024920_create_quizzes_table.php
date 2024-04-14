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
    Schema::create('quizzes', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_lesson');
      $table->text('cover')->nullable();
      $table->text('asset_url')->nullable();
      $table->text('content');
      $table->text('correct_answer');
      $table->text('col_1')->nullable();
      $table->text('col_2')->nullable();
      $table->text('col_3')->nullable();
      $table->text('col_4')->nullable();
      $table->timestamps();

      $table->foreign('id_lesson')->references('id')->on('lessons')->onUpdate('cascade')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('quizzes');
  }
};
