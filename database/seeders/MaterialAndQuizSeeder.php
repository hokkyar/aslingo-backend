<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialAndQuizSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // KELAS 7 : ANGKA
    DB::table('materials')->insert([
      'id_lesson' => 1,
      'cover' => 'default.png',
      'material_name' => 'One',
      'text_en' => 'One',
      'text_id' => 'Satu',
    ]);
    DB::table('materials')->insert([
      'id_lesson' => 1,
      'cover' => 'default.png',
      'material_name' => 'Two',
      'text_en' => 'Two',
      'text_id' => 'Dua',
    ]);
    DB::table('materials')->insert([
      'id_lesson' => 1,
      'cover' => 'default.png',
      'material_name' => 'Three',
      'text_en' => 'Three',
      'text_id' => 'Tiga',
    ]);
    DB::table('materials')->insert([
      'id_lesson' => 1,
      'cover' => 'default.png',
      'material_name' => 'Four',
      'text_en' => 'Four',
      'text_id' => 'Empat',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 1,
      'cover' => 'default.png',
      'content' => '1 dalam bahasa inggris yaitu',
      'correct_answer' => 'One',
      'col_1' => 'One',
      'col_2' => 'Two',
      'col_3' => 'Three',
      'col_4' => 'Four',
    ]);

    // KELAS 7 : HEWAN
    DB::table('materials')->insert([
      'id_lesson' => 2,
      'cover' => 'default.png',
      'material_name' => 'Ayam',
      'text_en' => 'Chicken',
      'text_id' => 'Ayam',
    ]);
    DB::table('materials')->insert([
      'id_lesson' => 2,
      'cover' => 'default.png',
      'material_name' => 'Gajah',
      'text_en' => 'Elephant',
      'text_id' => 'Gajah',
    ]);
    DB::table('materials')->insert([
      'id_lesson' => 2,
      'cover' => 'default.png',
      'material_name' => 'Macan',
      'text_en' => 'Tiger',
      'text_id' => 'Macan',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 2,
      'cover' => 'default.png',
      'content' => 'Chicken dalam Bahasa Indonesia',
      'correct_answer' => 'Ayam',
      'col_1' => 'Ikan',
      'col_2' => 'Ayam',
      'col_3' => 'Macan',
      'col_4' => 'Gajah',
    ]);

    // KELAS 7 : WARNA
    DB::table('materials')->insert([
      'id_lesson' => 3,
      'cover' => 'default.png',
      'material_name' => 'Red',
      'text_en' => 'Red',
      'text_id' => 'Merah',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 3,
      'cover' => 'default.png',
      'content' => 'Red adalah',
      'correct_answer' => 'Merah',
      'col_1' => 'Kuning',
      'col_2' => 'Hitam',
      'col_3' => 'Putih',
      'col_4' => 'Merah',
    ]);

    // KELAS 7 : KELUARGA
    DB::table('materials')->insert([
      'id_lesson' => 4,
      'cover' => 'default.png',
      'material_name' => 'Father',
      'text_en' => 'Father',
      'text_id' => 'Ayah',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 4,
      'cover' => 'default.png',
      'content' => 'Father adalah',
      'correct_answer' => 'Ayah',
      'col_1' => 'Anak',
      'col_2' => 'Bibi',
      'col_3' => 'Ayah',
      'col_4' => 'Ibu',
    ]);

    // KELAS 8 : BUAH-BUAHAN
    DB::table('materials')->insert([
      'id_lesson' => 5,
      'cover' => 'default.png',
      'material_name' => 'Apple',
      'text_en' => 'Apple',
      'text_id' => 'Apel',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 5,
      'cover' => 'default.png',
      'content' => 'Apple adalah',
      'correct_answer' => 'Apel',
      'col_1' => 'Apel',
      'col_2' => 'Semangka',
      'col_3' => 'Pisang',
      'col_4' => 'Durian',
    ]);

    // KELAS 8 : BAGIAN TUBUH
    DB::table('materials')->insert([
      'id_lesson' => 6,
      'cover' => 'default.png',
      'material_name' => 'Tangan',
      'text_en' => 'Hand',
      'text_id' => 'Tangan',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 6,
      'cover' => 'default.png',
      'content' => 'Tangan dalam Bahasa Inggris',
      'correct_answer' => 'Hand',
      'col_1' => 'Head',
      'col_2' => 'Foot',
      'col_3' => 'Hand',
      'col_4' => 'Chest',
    ]);

    // KELAS 8 : BANGUNAN SEKOLAH
    DB::table('materials')->insert([
      'id_lesson' => 7,
      'cover' => 'default.png',
      'material_name' => 'Building',
      'text_en' => 'Building',
      'text_id' => 'Gedung',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 7,
      'cover' => 'default.png',
      'content' => 'Building adalah',
      'correct_answer' => 'Gedung',
      'col_1' => 'Gedung',
      'col_2' => 'Kelas',
      'col_3' => 'Lapangan',
      'col_4' => 'Pintu',
    ]);

    // KELAS 8 : BENDA DALAM KELAS
    DB::table('materials')->insert([
      'id_lesson' => 8,
      'cover' => 'default.png',
      'material_name' => 'Board',
      'text_en' => 'Board',
      'text_id' => 'Papan',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 8,
      'cover' => 'default.png',
      'content' => 'Papan dalam Bahasa Inggris',
      'correct_answer' => 'Board',
      'col_1' => 'Window',
      'col_2' => 'Chalk',
      'col_3' => 'Board',
      'col_4' => 'Spidol',
    ]);

    // KELAS 9 : BENDA DALAM RUMAH
    DB::table('materials')->insert([
      'id_lesson' => 9,
      'cover' => 'default.png',
      'material_name' => 'Television',
      'text_en' => 'Television',
      'text_id' => 'Televisi',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 9,
      'cover' => 'default.png',
      'content' => 'Television adalah',
      'correct_answer' => 'Televisi',
      'col_1' => 'Jendela',
      'col_2' => 'Televisi',
      'col_3' => 'Kamar',
      'col_4' => 'Kamar Mandi',
    ]);

    // KELAS 9 : DI DAPUR
    DB::table('materials')->insert([
      'id_lesson' => 10,
      'cover' => 'default.png',
      'material_name' => 'Spoon',
      'text_en' => 'Spoon',
      'text_id' => 'Sendok',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 10,
      'cover' => 'default.png',
      'content' => 'Sendok dalam Bahasa Inggris',
      'correct_answer' => 'Spoon',
      'col_1' => 'Bowl',
      'col_2' => 'Plate',
      'col_3' => 'Fork',
      'col_4' => 'Spoon',
    ]);

    // KELAS 9 : MAKANAN DAN MINUMAN
    DB::table('materials')->insert([
      'id_lesson' => 11,
      'cover' => 'default.png',
      'material_name' => 'Ice Tea',
      'text_en' => 'Ice Tea',
      'text_id' => 'Es Teh',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 11,
      'cover' => 'default.png',
      'content' => 'Ice Tea dalam Bahasa Inggris',
      'correct_answer' => 'Es Teh',
      'col_1' => 'Bakso',
      'col_2' => 'Es Teh',
      'col_3' => 'Es Kelapa Muda',
      'col_4' => 'Mie',
    ]);

    // KELAS 9 : SERAGAM SEKOLAH
    DB::table('materials')->insert([
      'id_lesson' => 12,
      'cover' => 'default.png',
      'material_name' => 'Uniform',
      'text_en' => 'Uniform',
      'text_id' => 'Seragam',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 12,
      'cover' => 'default.png',
      'content' => 'Seragam dalam Bahasa Inggris',
      'correct_answer' => 'Uniform',
      'col_1' => 'Uniform',
      'col_2' => 'Shoes',
      'col_3' => 'Bag',
      'col_4' => 'Hat',
    ]);

    // KELAS 7 : ALPABET
    DB::table('materials')->insert([
      'id_lesson' => 13,
      'cover' => 'default.png',
      'material_name' => 'A',
      'text_en' => 'A',
      'text_id' => 'A',
    ]);
    DB::table('quizzes')->insert([
      'id_lesson' => 13,
      'cover' => 'default.png',
      'content' => 'A B C D ...',
      'correct_answer' => 'E',
      'col_1' => 'F',
      'col_2' => 'E',
      'col_3' => 'G',
      'col_4' => 'H',
    ]);
  }
}
