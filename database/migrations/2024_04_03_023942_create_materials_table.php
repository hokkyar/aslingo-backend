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
    Schema::create('materials', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_lesson');
      $table->string('material_name');
      $table->text('cover')->nullable();
      $table->text('head_pic')->nullable();
      $table->string('text_en');
      $table->string('text_id');
      $table->text('ilustration')->nullable();
      $table->text('video')->nullable();
      $table->timestamps();

      $table->foreign('id_lesson')->references('id')->on('lessons')->onUpdate('cascade')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('materials');
  }
};
