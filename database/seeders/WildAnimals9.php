<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class WildAnimals9 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'tiger' => ['Tiger', 'Harimau'],
            'crocodile' => ['Crocodile', 'Buaya'],
            'lion' => ['Lion', 'Singa'],
            'snake' => ['Snake', 'Ular'],
            'shark' => ['Shark', 'Hiu'],
            'whale' => ['Whale', 'Paus'],
            'gorilla' => ['Gorilla', 'Gorila'],
            'bear' => ['Bear', 'Beruang'],
            'wolf' => ['Wolf', 'Serigala'],
            'eagle' => ['Eagle', 'Elang'],
            'komodo' => ['Komodo', 'Komodo'],
            'leopard' => ['Leopard', 'Macan Tutul'],
            'bull' => ['Bull', 'Banteng'],
            'rhinoceros' => ['Rhinoceros', 'Badak'],
            'elephant' => ['Elephant', 'Gajah'],
            'giraffe' => ['Giraffe', 'Jerapah'],
            'monkey' => ['Monkey', 'Monyet'],
            'zebra' => ['Zebra', 'Zebra'],
            'i_see_a_monkey' => ['I see a monkey.', 'Saya melihat monyet.'],
            'i_see_an_elephant' => ['I see an elephant.', 'Saya melihat gajah.'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 31,
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
