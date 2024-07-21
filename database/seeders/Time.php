<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Time extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $data = [
            'time' => ['Time', 'Waktu'],
            'morning' => ['Morning', 'Pagi'],
            'afternoon' => ['Afternoon', 'Siang'],
            'evening' => ['Evening', 'Sore'],
            'now' => ['Now', 'Sekarang'],
            'later' => ['Later', 'Nanti'],
            'just_now' => ['Just Now', 'Baru Saja'],
            'tomorrow' => ['Tomorrow', 'Besok'],
            'yesterday' => ['Yesterday', 'Kemarin'],
            'day_after_tomorrow' => ['Day After Tomorrow', 'Lusa'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 4,
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
