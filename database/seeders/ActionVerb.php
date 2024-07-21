<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ActionVerb extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $data = [
            'to_eat' => ['To eat', 'Makan', ''],
            'to_drink' => ['To drink', 'Minum', ''],
            'to_bath' => ['To bath', 'Mandi', ''],
            'to_pee' => ['To pee', 'Kencing', ''],
            'to_poop' => ['To poop', 'Buang air besar', ''],
            'to_brushing' => ['To brushing (teeth)', 'Menyikat (gigi)', ''],
            'to_cry' => ['To cry', 'Menangis', ''],
            'to_sleep' => ['To sleep', 'Tidur', ''],
            'to_laugh' => ['To laugh', 'Tertawa', ''],
            'i_eat_an_apple' => ['I eat an apple.', 'Saya makan apel.', 'I Eat Apple I'],
            'i_drink_water' => ['I drink water.', 'Saya minum air.', 'I Drink Water I'],
            'she_sleep' => ['She sleep', 'Dia tidur', "She Sleep She"],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 22,
                'order' => $order,
                'cover' => $key . '.png',
                'head_pic' => $key . '.png',
                'ilustration' => 'ASL_' . $key . '.png',
                'video' => $key . '.mp4',
                'material_name' => $texts[0],
                'text_en' => $texts[0],
                'text_id' => $texts[1],
                'text_illustration' => $texts[2],
            ]);
            $order++;
        }
    }
}
