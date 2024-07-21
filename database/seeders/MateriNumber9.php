<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriNumber9 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $numbers = [
            10 => ['Ten', 'Sepuluh'],
            20 => ['Twenty', 'Dua Puluh'],
            30 => ['Thirty', 'Tiga Puluh'],
            40 => ['Forty', 'Empat Puluh'],
            50 => ['Fifty', 'Lima Puluh'],
            60 => ['Sixty', 'Enam Puluh'],
            70 => ['Seventy', 'Tujuh Puluh'],
            80 => ['Eighty', 'Delapan Puluh'],
            90 => ['Ninety', 'Sembilan Puluh'],
            100 => ['One Hundred', 'Seratus'],
            1000 => ['One Thousand', 'Seribu'],
            10000 => ['Ten Thousand', 'Sepuluh Ribu'],
            100000 => ['One Hundred Thousand', 'Seratus Ribu'],
            1000000 => ['One Million', 'Satu Juta'],
        ];

        $order = 1;
        foreach ($numbers as $number => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 23,
                'order' => $order,
                'cover' => $number . '.png',
                'head_pic' => $number . '.png',
                'ilustration' => 'ASL_' . $number . '.png',
                'video' => $number . '.mp4',
                'material_name' => $texts[0],
                'text_en' => $texts[0],
                'text_id' => $texts[1],
                'text_illustration' => '',
            ]);
            $order++;
        }
    }
}
