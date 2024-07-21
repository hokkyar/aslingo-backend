<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InTheBathroom extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'mirror' => ['Mirror', 'Cermin'],
            'towel' => ['Towel', 'Handuk'],
            'soap' => ['Soap', 'Sabun'],
            'shampoo' => ['Shampoo', 'Sampo'],
            'toothbrush' => ['Toothbrush', 'Sikat Gigi'],
            'comb' => ['Comb', 'Sisir'],
            'toothpaste' => ['Toothpaste', 'Pasta Gigi'],
            'shower' => ['Shower', 'Pancuran'],
            'bathtub' => ['Bathtub', 'Bak Mandi'],
            'toilet' => ['Toilet', 'Toilet'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 10,
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
