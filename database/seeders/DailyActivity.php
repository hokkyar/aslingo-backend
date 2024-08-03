<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DailyActivity extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'wake_up' =>  ['Wake up', 'Bangun tidur'],
            'shower' => ['Shower', 'Mandi'],
            'study' => ['Study', 'Belajar'],
            'read' => ['Read', 'Membaca'],
            'play' => ['Play', 'Bermain'],
            'cook' => ['Cook', 'Memasak'],
            'i_wake_up_in_the_morning' => ['I wake up in the morning', 'Saya bangun di pagi hari'],
            'she_is_reading' => ['She is reading', 'Dia sedang membaca'],
            'my_mom_is_cooking' => ['My mom is cooking', 'Ibu saya sedang memasak'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 27,
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
