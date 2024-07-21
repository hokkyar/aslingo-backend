<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Family extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'family' => ['Family', 'Keluarga'],
            'father' => ['Father', 'Ayah'],
            'mother' => ['Mother', 'Ibu'],
            'child' => ['Child', 'Anak'],
            'baby' => ['Baby', 'Bayi'],
            'brother' => ['Brother', 'Saudara Laki-laki'],
            'sister' => ['Sister', 'Saudara Perempuan'],
            'husband' => ['Husband', 'Suami'],
            'wife' => ['Wife', 'Istri'],
            'aunt' => ['Aunt', 'Bibi'],
            'uncle' => ['Uncle', 'Paman'],
            'grandfather' => ['Grandfather', 'Kakek'],
            'grandmother' => ['Grandmother', 'Nenek'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 8,
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
