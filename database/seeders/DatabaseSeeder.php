<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call(LessonSeeder::class);
    $this->call(MaterialAndQuizSeeder::class);
    $this->call(UserSeeder::class);
  }
}
