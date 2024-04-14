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
    Schema::create('progress_per_class', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_user');
      $table->enum('class', [7, 8, 9]);
      $table->integer('progress')->default(0);
      $table->timestamps();

      $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('progress_per_class');
  }
};
