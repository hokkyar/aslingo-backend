<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class WHQuestion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'what_is_your_name' => ['What is your name?', 'Siapa namamu?'],
            'who_is_he' => ['Who is he?', 'Siapa dia?'],
            'who_is_she' => ['Who is she?', 'Siapa dia?'],
            'where_do_you_live' => ['Where do you live?', 'Di mana kamu tinggal?'],
            'where_is_surya' => ['Where is Surya?', 'Di mana Surya?'],
            'where_is_aditya' => ['Where is Aditya?', 'Di mana Aditya?'],
            'when_is_your_birthday' => ['When is your birthday?', 'Kapan ulang tahunmu?'],
            'why_are_you_crying' => ['Why are you crying?', 'Mengapa kamu menangis?'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 26,
                'order' => $order,
                'cover' => $key . '.png',
                'head_pic' => $key . '.png',
                'ilustration' => 'ASL_' . $key . '.png',
                'video' => $key . '.mp4',
                'material_name' => $texts[0],
                'text_en' => $texts[0],
                'text_id' => $texts[1],
                'text_illustration' => '',
            ]);
            $order++;
        }
    }
}
