<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriNumber8 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Number 20-40
        $numbers = [
            20 => ['Twenty', 'Dua Puluh'],
            21 => ['Twenty One', 'Dua Puluh Satu'],
            22 => ['Twenty Two', 'Dua Puluh Dua'],
            23 => ['Twenty Three', 'Dua Puluh Tiga'],
            24 => ['Twenty Four', 'Dua Puluh Empat'],
            25 => ['Twenty Five', 'Dua Puluh Lima'],
            26 => ['Twenty Six', 'Dua Puluh Enam'],
            27 => ['Twenty Seven', 'Dua Puluh Tujuh'],
            28 => ['Twenty Eight', 'Dua Puluh Delapan'],
            29 => ['Twenty Nine', 'Dua Puluh Sembilan'],
            30 => ['Thirty', 'Tiga Puluh'],
            31 => ['Thirty One', 'Tiga Puluh Satu'],
            32 => ['Thirty Two', 'Tiga Puluh Dua'],
            33 => ['Thirty Three', 'Tiga Puluh Tiga'],
            34 => ['Thirty Four', 'Tiga Puluh Empat'],
            35 => ['Thirty Five', 'Tiga Puluh Lima'],
            36 => ['Thirty Six', 'Tiga Puluh Enam'],
            37 => ['Thirty Seven', 'Tiga Puluh Tujuh'],
            38 => ['Thirty Eight', 'Tiga Puluh Delapan'],
            39 => ['Thirty Nine', 'Tiga Puluh Sembilan'],
            40 => ['Forty', 'Empat Puluh'],
        ];

        foreach ($numbers as $number => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 13,
                'order' => $number - 19,
                'cover' => $number . '.png',
                'head_pic' => $number . '.png',
                'ilustration' => 'ASL_' . $number . '.png',
                'video' => $number . '.mp4',
                'material_name' => $texts[0],
                'text_en' => $texts[0],
                'text_id' => $texts[1],
                'text_illustration' => '',
            ]);
        }
    }
}

