<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Hobbies extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'what_is_your_hobby' => ['What is your hobby?', 'Apa hobi Anda?'],
            'painting' => ['Painting', 'Melukis'],
            'swimming' => ['Swimming', 'Berenang'],
            'cooking' => ['Cooking', 'Memasak'],
            'dancing' => ['Dancing', 'Menari'],
            'reading' => ['Reading', 'Membaca'],
            'gardening' => ['Gardening', 'Berkebun'],
            'traveling' => ['Traveling', 'Bepergian'],
            'photography' => ['Photography', 'Fotografi'],
            'singing' => ['Singing', 'Bernyanyi'],
            'fishing' => ['Fishing', 'Memancing'],
            'watching' => ['Watching', 'Menonton'],
            'writing' => ['Writing', 'Menulis'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 20,
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
