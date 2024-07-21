<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class YNQuestion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'are_you_hungry' => ['Are you hungry?', 'Apakah kamu lapar?'],
            'are_you_thirsty' => ['Are you thirsty?', 'Apakah kamu haus?'],
            'are_you_happy' => ['Are you happy?', 'Apakah kamu bahagia?'],
            'are_you_sad' => ['Are you sad?', 'Apakah kamu sedih?'],
            'are_you_angry' => ['Are you angry?', 'Apakah kamu marah?'],
            'are_you_sick_sleepy' => ['Are you sick? Are you sleepy?', 'Apakah kamu sakit? Apakah kamu mengantuk?'],
            'are_you_tired' => ['Are you tired?', 'Apakah kamu lelah?'],
            'are_you_worried' => ['Are you worried?', 'Apakah kamu khawatir?'],
            'are_you_cold' => ['Are you cold?', 'Apakah kamu kedinginan?'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 25,
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
