<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Profession extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'teacher' => ['Teacher', 'Guru'],
            'police' => ['Police', 'Polisi'],
            'pilot' => ['Pilot', 'Pilot'],
            'driver' => ['Driver', 'Supir'],
            'army' => ['Army', 'Tentara'],
            'doctor' => ['Doctor', 'Dokter'],
            'fisherman' => ['Fisherman', 'Nelayan'],
            'farmer' => ['Farmer', 'Petani'],
            'my_father_is_a_teacher' => ['My father is a teacher', 'Ayah saya adalah seorang guru'],
            'my_mother_is_a_police' => ['My mother is a police', 'Ibu saya adalah seorang polisi'],
            'my_brother_is_an_army' => ['My brother is an army', 'Saudara saya adalah seorang tentara'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 29,
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
