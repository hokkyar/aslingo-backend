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
    Schema::create('user_material_checks', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_user');
      $table->unsignedBigInteger('id_material');
      $table->boolean('is_done')->default(false);
      $table->timestamps();

      $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
      $table->foreign('id_material')->references('id')->on('materials')->onUpdate('cascade')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('user_material_checks');
  }
};
