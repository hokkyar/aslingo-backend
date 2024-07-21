<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Alfabet extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Alfabet
        $alphabet = range('a', 'z');
        foreach ($alphabet as $index => $letter) {
            DB::table('materials')->insert([
                'id_lesson' => 3,
                'order' => $index + 1,
                'cover' => $letter . '.png',
                'head_pic' => $letter . '.png',
                'ilustration' => 'ASL_' . $letter . '.png',
                'video' => $letter . '.mp4',
                'material_name' => strtoupper($letter),
                'text_en' => strtoupper($letter),
                'text_id' => strtoupper($letter),
                'text_illustration' => '',
            ]);
        }
    }
}

