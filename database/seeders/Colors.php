<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Colors extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'red' => ['Red', 'Merah'],
            'blue' => ['Blue', 'Biru'],
            'yellow' => ['Yellow', 'Kuning'],
            'green' => ['Green', 'Hijau'],
            'purple' => ['Purple', 'Ungu'],
            'orange' => ['Orange', 'Oranye'],
            'white' => ['White', 'Putih'],
            'black' => ['Black', 'Hitam'],
            'grey' => ['Grey', 'Abu-abu'],
            'brown' => ['Brown', 'Coklat'],
            'pink' => ['Pink', 'Merah Muda'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 14,
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
