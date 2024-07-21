<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InTheKitchen extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'cup' => ['Cup', 'Cangkir'],
            'fork' => ['Fork', 'Garpu'],
            'pan' => ['Pan', 'Wajan'],
            'plate' => ['Plate', 'Piring'],
            'knife' => ['Knife', 'Pisau'],
            'spoon' => ['Spoon', 'Sendok'],
            'bottle' => ['Bottle', 'Botol'],
            'stove' => ['Stove', 'Kompor'],
            'bowl' => ['Bowl', 'Mangkuk'],
            'glass' => ['Glass', 'Gelas'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 11,
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
