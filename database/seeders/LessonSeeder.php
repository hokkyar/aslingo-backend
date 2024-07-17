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
    //kelas 7
    // Class 7
    DB::table('lessons')->insert([
        'order' => '1',
        'class' => '7',
        'cover' => 'cover_greetings.jpg',
        'lesson_name' => 'Greetings',
    ]);
    DB::table('lessons')->insert([
        'order' => '2',
        'class' => '7',
        'cover' => 'cover_number.jpg',
        'lesson_name' => 'Numbers',
    ]);
    DB::table('lessons')->insert([
        'order' => '3',
        'class' => '7',
        'cover' => 'cover_alfabet.jpg',
        'lesson_name' => 'Alphabet',
    ]);
    DB::table('lessons')->insert([
        'order' => '4',
        'class' => '7',
        'cover' => 'cover_time.jpg',
        'lesson_name' => 'Time',
    ]);
    DB::table('lessons')->insert([
        'order' => '5',
        'class' => '7',
        'cover' => 'cover_day_of_week.jpg',
        'lesson_name' => 'Day of the Week',
    ]);
    DB::table('lessons')->insert([
        'order' => '6',
        'class' => '7',
        'cover' => 'cover_part_of_body.jpg',
        'lesson_name' => 'Part of the Body',
    ]);
    DB::table('lessons')->insert([
        'order' => '7',
        'class' => '7',
        'cover' => 'cover_school_supplies.jpg',
        'lesson_name' => 'School Supplies',
    ]);
    DB::table('lessons')->insert([
        'order' => '8',
        'class' => '7',
        'cover' => 'cover_family.jpg',
        'lesson_name' => 'Family',
    ]);
    DB::table('lessons')->insert([
        'order' => '9',
        'class' => '7',
        'cover' => 'cover_in_bedroom.jpg',
        'lesson_name' => 'In the Bedroom',
    ]);
    DB::table('lessons')->insert([
        'order' => '10',
        'class' => '7',
        'cover' => 'cover_in_bathroom.jpg',
        'lesson_name' => 'In the Bathroom',
    ]);
    DB::table('lessons')->insert([
        'order' => '11',
        'class' => '7',
        'cover' => 'cover_in_kitchen.jpg',
        'lesson_name' => 'In the Kitchen',
    ]);
    
  }
}
