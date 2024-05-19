<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // ADMIN
    DB::table('users')->insert([
      'name' => 'Admin',
      'email' => 'admin@gmail.com',
      'role' => 'admin',
      'password' => Hash::make('123'),
    ]);

    // USER 1
    DB::table('users')->insert([
      'name' => 'Hokky Aryasta',
      'email' => 'hokky@gmail.com',
      'password' => Hash::make('123'),
    ]);
    // USER 1 PROGRESS PER CLASS
    for ($class = 7; $class <= 9; $class++) {
      DB::table('progress_per_class')->insert([
        'id_user' => 2,
        'class' => (string)$class,
      ]);
    }
    // USER 1 PROGRESS PER LESSON
    for ($id_lesson = 1; $id_lesson <= 13; $id_lesson++) {
      DB::table('progress_per_lesson')->insert([
        'id_user' => 2,
        'id_lesson' => $id_lesson,
      ]);
    }
    // USER 1 USER MATERIAL CHECKS
    for ($id_material = 1; $id_material <= 18; $id_material++) {
      DB::table('user_material_checks')->insert([
        'id_user' => 2,
        'id_material' => $id_material,
      ]);
    }

    // USER 2
    DB::table('users')->insert([
      'name' => 'Anggi Widiantara',
      'email' => 'anggi@gmail.com',
      'password' => Hash::make('123'),
    ]);
    // USER 2 PROGRESS PER CLASS
    for ($class = 7; $class <= 9; $class++) {
      DB::table('progress_per_class')->insert([
        'id_user' => 3,
        'class' => (string)$class,
      ]);
    }
    // USER 2 PROGRESS PER LESSON
    for ($id_lesson = 1; $id_lesson <= 13; $id_lesson++) {
      DB::table('progress_per_lesson')->insert([
        'id_user' => 3,
        'id_lesson' => $id_lesson,
      ]);
    }
    // USER 2 USER MATERIAL CHECKS
    for ($id_material = 1; $id_material <= 18; $id_material++) {
      DB::table('user_material_checks')->insert([
        'id_user' => 3,
        'id_material' => $id_material,
      ]);
    }
  }
}
