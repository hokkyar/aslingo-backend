<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Fruits extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'fruits' => ['Fruits', 'Buah-buahan'],
            'grape' => ['Grape', 'Anggur'],
            'mango' => ['Mango', 'Mangga'],
            'apple' => ['Apple', 'Apel'],
            'banana' => ['Banana', 'Pisang'],
            'pineapple' => ['Pineapple', 'Nanas'],
            'watermelon' => ['Watermelon', 'Semangka'],
            'strawberry' => ['Strawberry', 'Stroberi'],
            'orange' => ['Orange', 'Jeruk'],
            'lemon' => ['Lemon', 'Lemon'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 5,
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
