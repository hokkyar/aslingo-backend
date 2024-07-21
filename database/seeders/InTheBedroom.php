<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InTheBedroom extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'pillow' => ['Pillow', 'Bantal'],
            'window' => ['Window', 'Jendela'],
            'watch' => ['Watch', 'Jam Tangan'],
            'chair' => ['Chair', 'Kursi'],
            'fan' => ['Fan', 'Kipas Angin'],
            'lamp' => ['Lamp', 'Lampu'],
            'floor' => ['Floor', 'Lantai'],
            'table' => ['Table', 'Meja'],
            'door' => ['Door', 'Pintu'],
            'blanket' => ['Blanket', 'Selimut'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 9,
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
