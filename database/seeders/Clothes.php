<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Clothes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'clothe' => ['Clothe', 'Pakaian'],
            'shirt' => ['Shirt', 'Kemeja'],
            'underwear' => ['Underwear', 'Pakaian Dalam'],
            'dress' => ['Dress', 'Gaun'],
            'short_pants' => ['Short Pants', 'Celana Pendek'],
            'jacket' => ['Jacket', 'Jaket'],
            'skirt' => ['Skirt', 'Rok'],
            'slipper' => ['Slipper', 'Sandal'],
            'shoes' => ['Shoes', 'Sepatu'],
            'hat' => ['Hat', 'Topi'],
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
