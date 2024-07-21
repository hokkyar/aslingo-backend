<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pets extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'animal' => ['Animal', 'Hewan'],
            'dog' => ['Dog', 'Anjing'],
            'chicken' => ['Chicken', 'Ayam'],
            'pig' => ['Pig', 'Babi'],
            'duck' => ['Duck', 'Bebek'],
            'sheep' => ['Sheep', 'Domba'],
            'bird' => ['Bird', 'Burung'],
            'fish' => ['Fish', 'Ikan'],
            'rabbit' => ['Rabbit', 'Kelinci'],
            'cat' => ['Cat', 'Kucing'],
            'horse' => ['Horse', 'Kuda'],
            'cow' => ['Cow', 'Sapi'],
            'rat' => ['Rat', 'Tikus'],
            'turtle' => ['Turtle', 'Kura-kura'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 18,
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
