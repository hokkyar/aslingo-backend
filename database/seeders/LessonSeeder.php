<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('lessons')->insert([
      'class' => 7,
      'cover' => 'default.png',
      'lesson_name' => 'Angka',
    ]);

    DB::table('lessons')->insert([
      'class' => 7,
      'cover' => 'default.png',
      'lesson_name' => 'Hewan',
    ]);

    DB::table('lessons')->insert([
      'class' => 7,
      'cover' => 'default.png',
      'lesson_name' => 'Warna',
    ]);

    DB::table('lessons')->insert([
      'class' => 7,
      'cover' => 'default.png',
      'lesson_name' => 'Keluarga',
    ]);

    DB::table('lessons')->insert([
      'class' => 8,
      'cover' => 'default.png',
      'lesson_name' => 'Buah-buahan',
    ]);

    DB::table('lessons')->insert([
      'class' => 8,
      'cover' => 'default.png',
      'lesson_name' => 'Bagian Tubuh',
    ]);

    DB::table('lessons')->insert([
      'class' => 8,
      'cover' => 'default.png',
      'lesson_name' => 'Bangunan Sekolah',
    ]);

    DB::table('lessons')->insert([
      'class' => 8,
      'cover' => 'default.png',
      'lesson_name' => 'Benda dalam Kelas',
    ]);

    DB::table('lessons')->insert([
      'class' => 9,
      'cover' => 'default.png',
      'lesson_name' => 'Benda dalam Rumah',
    ]);

    DB::table('lessons')->insert([
      'class' => 9,
      'cover' => 'default.png',
      'lesson_name' => 'Di Dapur',
    ]);

    DB::table('lessons')->insert([
      'class' => 9,
      'cover' => 'default.png',
      'lesson_name' => 'Makanan dan Minuman',
    ]);

    DB::table('lessons')->insert([
      'class' => 9,
      'cover' => 'default.png',
      'lesson_name' => 'Seragam Sekolah',
    ]);

    DB::table('lessons')->insert([
      'class' => 7,
      'cover' => 'default.png',
      'lesson_name' => 'Alpabet',
    ]);
  }
}
