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
    //Kelas 7
    DB::table('lessons')->insert([
        'order' => '1',
        'class' => '7',
        'cover' => 'cover_greetings.png',
        'lesson_name' => 'Greetings',
    ]);
    DB::table('lessons')->insert([
        'order' => '2',
        'class' => '7',
        'cover' => 'cover_number.png',
        'lesson_name' => 'Numbers',
    ]);
    DB::table('lessons')->insert([
        'order' => '3',
        'class' => '7',
        'cover' => 'cover_alfabet.png',
        'lesson_name' => 'Alphabet',
    ]);
    DB::table('lessons')->insert([
        'order' => '4',
        'class' => '7',
        'cover' => 'cover_time.png',
        'lesson_name' => 'Time',
    ]);
    DB::table('lessons')->insert([
        'order' => '5',
        'class' => '7',
        'cover' => 'cover_day_of_week.png',
        'lesson_name' => 'Day of the Week',
    ]);
    DB::table('lessons')->insert([
        'order' => '6',
        'class' => '7',
        'cover' => 'cover_part_of_body.png',
        'lesson_name' => 'Part of the Body',
    ]);
    DB::table('lessons')->insert([
        'order' => '7',
        'class' => '7',
        'cover' => 'cover_school_supplies.png',
        'lesson_name' => 'School Supplies',
    ]);
    DB::table('lessons')->insert([
        'order' => '8',
        'class' => '7',
        'cover' => 'cover_family.png',
        'lesson_name' => 'Family',
    ]);
    DB::table('lessons')->insert([
        'order' => '9',
        'class' => '7',
        'cover' => 'cover_in_bedroom.png',
        'lesson_name' => 'In the Bedroom',
    ]);
    DB::table('lessons')->insert([
        'order' => '10',
        'class' => '7',
        'cover' => 'cover_in_bathroom.png',
        'lesson_name' => 'In the Bathroom',
    ]);
    DB::table('lessons')->insert([
        'order' => '11',
        'class' => '7',
        'cover' => 'cover_in_kitchen.png',
        'lesson_name' => 'In the Kitchen',
    ]);

    //Kelas 8
        DB::table('lessons')->insert([
        'order' => '1',
        'class' => '8',
        'cover' => 'cover_introduction.png',
        'lesson_name' => 'Introduction',
    ]);
    DB::table('lessons')->insert([
        'order' => '2',
        'class' => '8',
        'cover' => 'cover_numbers8.png',
        'lesson_name' => 'Numbers',
    ]);
    DB::table('lessons')->insert([
        'order' => '3',
        'class' => '8',
        'cover' => 'cover_colors.png',
        'lesson_name' => 'Colors',
    ]);
    DB::table('lessons')->insert([
        'order' => '4',
        'class' => '8',
        'cover' => 'cover_clothes.png',
        'lesson_name' => 'Clothes',
    ]);
    DB::table('lessons')->insert([
        'order' => '5',
        'class' => '8',
        'cover' => 'cover_fruits.png',
        'lesson_name' => 'Fruits',
    ]);
    DB::table('lessons')->insert([
        'order' => '6',
        'class' => '8',
        'cover' => 'cover_vegetables.png',
        'lesson_name' => 'Vegetables',
    ]);
    DB::table('lessons')->insert([
        'order' => '7',
        'class' => '8',
        'cover' => 'cover_pets.png',
        'lesson_name' => 'Pets',
    ]);
    DB::table('lessons')->insert([
        'order' => '8',
        'class' => '8',
        'cover' => 'cover_wild_animals.png',
        'lesson_name' => 'Wild Animals',
    ]);
    DB::table('lessons')->insert([
        'order' => '9',
        'class' => '8',
        'cover' => 'cover_hobbies.png',
        'lesson_name' => 'Hobbies',
    ]);
    DB::table('lessons')->insert([
        'order' => '10',
        'class' => '8',
        'cover' => 'cover_school_environment.png',
        'lesson_name' => 'School Environment',
    ]);
    DB::table('lessons')->insert([
        'order' => '11',
        'class' => '8',
        'cover' => 'cover_action_verbs.png',
        'lesson_name' => 'Action Verbs',
    ]);

    //Kelas 9
    DB::table('lessons')->insert([
        'order' => '1',
        'class' => '9',
        'cover' => 'cover_number9.png',
        'lesson_name' => 'Number',
    ]);
    DB::table('lessons')->insert([
        'order' => '2',
        'class' => '9',
        'cover' => 'cover_feelings.png',
        'lesson_name' => 'Feelings',
    ]);
    DB::table('lessons')->insert([
        'order' => '3',
        'class' => '9',
        'cover' => 'cover_yes_no_questions.png',
        'lesson_name' => 'Yes/No Questions',
    ]);
    DB::table('lessons')->insert([
        'order' => '4',
        'class' => '9',
        'cover' => 'cover_wh_questions.png',
        'lesson_name' => 'WH Questions',
    ]);
    DB::table('lessons')->insert([
        'order' => '5',
        'class' => '9',
        'cover' => 'cover_daily_activities.png',
        'lesson_name' => 'Daily Activities',
    ]);
    DB::table('lessons')->insert([
        'order' => '6',
        'class' => '9',
        'cover' => 'cover_transportation.png',
        'lesson_name' => 'Transportation',
    ]);
    DB::table('lessons')->insert([
        'order' => '7',
        'class' => '9',
        'cover' => 'cover_profession.png',
        'lesson_name' => 'Profession',
    ]);
    DB::table('lessons')->insert([
        'order' => '8',
        'class' => '9',
        'cover' => 'cover_sport.png',
        'lesson_name' => 'Sport',
    ]);
    DB::table('lessons')->insert([
        'order' => '9',
        'class' => '9',
        'cover' => 'cover_wild_animals.png',
        'lesson_name' => 'Wild Animals',
    ]);
    DB::table('lessons')->insert([
        'order' => '10',
        'class' => '9',
        'cover' => 'cover_describing_people.png',
        'lesson_name' => 'Describing People',
    ]);

  }
}
