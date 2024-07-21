<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Sport extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $data = [
            'basketball' => ['Basketball', 'Bola Basket'],
            'football' => ['Football', 'Sepak Bola'],
            'run' => ['Run', 'Lari'],
            'volleyball' => ['Volleyball', 'Bola Voli'],
            'swimming' => ['Swimming', 'Renang'],
            'tennis' => ['Tennis', 'Tenis'],
            'karate' => ['Karate', 'Karate'],
            'jump' => ['Jump', 'Melompat'],
            'i_play_basketball' => ['I play basketball.', 'Saya bermain bola basket.'],
            'i_play_tennis' => ['I play tennis.', 'Saya bermain tenis.'],
            'i_play_volleyball' => ['I play volleyball.', 'Saya bermain bola voli.'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 30,
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
