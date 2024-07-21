<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DiscribingPeople extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'tall' => ['Tall', 'Tinggi'],
            'short' => ['Short', 'Pendek'],
            'fat' => ['Fat', 'Gemuk'],
            'thin' => ['Thin', 'Kurus'],
            'old' => ['Old', 'Tua'],
            'young' => ['Young', 'Muda'],
            'beautiful' => ['Beautiful', 'Cantik'],
            'handsome' => ['Handsome', 'Tampan'],
            'strong' => ['Strong', 'Kuat'],
            'weak' => ['Weak', 'Lemah'],
            'smart' => ['Smart', 'Pintar'],
            'funny' => ['Funny', 'Lucu'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 32,
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
