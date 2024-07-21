<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PartofBody extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $data = [
            'head' => ['Head', 'Kepala'],
            'hair' => ['Hair', 'Rambut'],
            'eyes' => ['Eyes', 'Mata'],
            'ear' => ['Ear', 'Telinga'],
            'nose' => ['Nose', 'Hidung'],
            'lip' => ['Lip', 'Bibir'],
            'hand' => ['Hand', 'Tangan'],
            'chest' => ['Chest', 'Dada'],
            'stomach' => ['Stomach', 'Perut'],
            'thigh' => ['Thigh', 'Paha'],
            'leg' => ['Leg', 'Kaki'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 6,
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
