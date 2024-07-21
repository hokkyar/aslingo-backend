<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Greatings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('materials')->insert([
            'id_lesson' => 1,
            'order' => 1,
            'cover' => 'hello.png',
            'head_pic' => 'hello.png',
            'ilustration' => 'ASL_hello.png',
            'video' => 'hello.mp4',
            'material_name' => 'Hello',
            'text_en' => 'Hello',
            'text_id' => 'Hallo',
            'text_illustration' => '',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 1,
            'order' => 2,
            'cover' => 'good_morning.png',
            'head_pic' => 'good_morning.png',
            'ilustration' => 'ASL_good_morning.png',
            'video' => 'good_morning.mp4',
            'material_name' => 'Good Morning',
            'text_en' => 'Good Morning',
            'text_id' => 'Selamat Pagi',
            'text_illustration' => '',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 1,
            'order' => 3,
            'cover' => 'good_afternoon.png',
            'head_pic' => 'good_afternoon.png',
            'ilustration' => 'ASL_good_afternoon.png',
            'video' => 'good_afternoon.mp4',
            'material_name' => 'Good Afternoon',
            'text_en' => 'Good Afternoon',
            'text_id' => 'Selamat Siang',
            'text_illustration' => '',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 1,
            'order' => 4,
            'cover' => 'good_evening.png',
            'head_pic' => 'good_evening.png',
            'ilustration' => 'ASL_good_evening.png',
            'video' => 'good_evening.mp4',
            'material_name' => 'Good Evening',
            'text_en' => 'Good Malam',
            'text_id' => 'Selamat Malam',
            'text_illustration' => '',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 1,
            'order' => 5,
            'cover' => 'good_bye.png',
            'head_pic' => 'good_bye.png',
            'ilustration' => 'ASL_good_bye.png',
            'video' => 'good_bye.mp4',
            'material_name' => 'Good Bye',
            'text_en' => 'Good Bye',
            'text_id' => 'Selamat Tinggal',
            'text_illustration' => '',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 1,
            'order' => 6,
            'cover' => 'please.png',
            'head_pic' => 'please.png',
            'ilustration' => 'ASL_please.png',
            'video' => 'please.mp4',
            'material_name' => 'Please',
            'text_en' => 'Please',
            'text_id' => 'Tolong',
            'text_illustration' => '',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 1,
            'order' => 7,
            'cover' => 'thank_you.png',
            'head_pic' => 'thank_you.png',
            'ilustration' => 'ASL_thank_you.png',
            'video' => 'thank_you.mp4',
            'material_name' => 'Thank You',
            'text_en' => 'Thank You',
            'text_id' => 'Terima Kasih',
            'text_illustration' => '',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 1,
            'order' => 8,
            'cover' => 'how_are_you.png',
            'head_pic' => 'how_are_you.png',
            'ilustration' => 'ASL_how_are_you.png',
            'video' => 'how_are_you.mp4',
            'material_name' => 'How Are You?',
            'text_en' => 'How Are You',
            'text_id' => 'Apa Kabar?',
            'text_illustration' => '',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 1,
            'order' => 9,
            'cover' => 'fine_thank_you.png',
            'head_pic' => 'fine_thank_you.png',
            'ilustration' => 'ASL_fine_thank_you.png',
            'video' => 'fine_thank_you.mp4',
            'material_name' => 'Fine, Thank You',
            'text_en' => 'Fine, Thank You',
            'text_id' => 'Baik, Terima Kasih',
            'text_illustration' => '',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 1,
            'order' => 10,
            'cover' => 'what_is_your_name.png',
            'head_pic' => 'what_is_your_name.png',
            'ilustration' => 'ASL_what_is_your_name.png',
            'video' => 'what_is_your_name.mp4',
            'material_name' => 'What is your name?',
            'text_en' => 'What is your name?',
            'text_id' => 'Siapa nama kamu?',
            'text_illustration' => '',
        ]);
    }
}
