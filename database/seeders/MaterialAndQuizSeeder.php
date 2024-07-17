<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MaterialAndQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            'id_lesson' => 15,
            'order' => 1,
            'cover' => 'warnabiru.png',
            'head_pic' => 'warnabiru.png',
            'ilustration' => 'warnabiru.png',
            'video' => 'brown.mp4',
            'material_name' => 'test',
            'text_en' => 'test',
            'text_id' => 'test',
            'text_illustration' => 'test',
        ]);
    }
}
