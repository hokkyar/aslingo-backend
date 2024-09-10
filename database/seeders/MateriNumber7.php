<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriNumber7 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Number Kelas 7
        DB::table('materials')->insert([
            'id_lesson' => 2,
            'order' => 1,
            'cover' => '1.png',
            'head_pic' => '1.png',
            'ilustration' => 'ASL_one.png',
            'video' => '1.mp4',
            'material_name' => 'One',
            'text_en' => 'One',
            'text_id' => 'Satu',
            'text_illustration' => '',
        ]);

        DB::table('materials')->insert([
            'id_lesson' => 2,
            'order' => 2,
            'cover' => '2.png',
            'head_pic' => '2.png',
            'ilustration' => 'ASL_two.png',
            'video' => '2.mp4',
            'material_name' => 'Two',
            'text_en' => 'Two',
            'text_id' => 'Dua',
            'text_illustration' => '',
        ]);

        DB::table('materials')->insert([
            'id_lesson' => 2,
            'order' => 3,
            'cover' => '3.png',
            'head_pic' => '3.png',
            'ilustration' => 'ASL_three.png',
            'video' => '3.mp4',
            'material_name' => 'Three',
            'text_en' => 'Three',
            'text_id' => 'Tiga',
            'text_illustration' => '',
        ]);

        DB::table('materials')->insert([
            'id_lesson' => 2,
            'order' => 4,
            'cover' => '4.png',
            'head_pic' => '4.png',
            'ilustration' => 'ASL_four.png',
            'video' => '4.mp4',
            'material_name' => 'Four',
            'text_en' => 'Four',
            'text_id' => 'Empat',
            'text_illustration' => '',
        ]);

        DB::table('materials')->insert([
            'id_lesson' => 2,
            'order' => 5,
            'cover' => '5.png',
            'head_pic' => '5.png',
            'ilustration' => 'ASL_five.png',
            'video' => '5.mp4',
            'material_name' => 'Five',
            'text_en' => 'Five',
            'text_id' => 'Lima',
            'text_illustration' => '',
        ]);

        DB::table('materials')->insert([
            'id_lesson' => 2,
            'order' => 6,
            'cover' => '6.png',
            'head_pic' => '6.png',
            'ilustration' => 'ASL_six.png',
            'video' => '6.mp4',
            'material_name' => 'Six',
            'text_en' => 'Six',
            'text_id' => 'Enam',
            'text_illustration' => '',
        ]);

        DB::table('materials')->insert([
            'id_lesson' => 2,
            'order' => 7,
            'cover' => '7.png',
            'head_pic' => '7.png',
            'ilustration' => 'ASL_saven.png',
            'video' => '7.mp4',
            'material_name' => 'Seven',
            'text_en' => 'Seven',
            'text_id' => 'Tujuh',
            'text_illustration' => '',
        ]);

        DB::table('materials')->insert([
            'id_lesson' => 2,
            'order' => 8,
            'cover' => '8.png',
            'head_pic' => '8.png',
            'ilustration' => 'ASL_eight.png',
            'video' => '8.mp4',
            'material_name' => 'Eight',
            'text_en' => 'Eight',
            'text_id' => 'Delapan',
            'text_illustration' => '',
        ]);

        DB::table('materials')->insert([
            'id_lesson' => 2,
            'order' => 9,
            'cover' => '9.png',
            'head_pic' => '9.png',
            'ilustration' => 'ASL_nine.png',
            'video' => '9.mp4',
            'material_name' => 'Nine',
            'text_en' => 'Nine',
            'text_id' => 'Sembilan',
            'text_illustration' => '',
        ]);

        DB::table('materials')->insert([
            'id_lesson' => 2,
            'order' => 10,
            'cover' => '10.png',
            'head_pic' => '10.png',
            'ilustration' => 'ASL_ten.png',
            'video' => '10.mp4',
            'material_name' => 'Ten',
            'text_en' => 'Ten',
            'text_id' => 'Sepuluh',
            'text_illustration' => '',
        ]);
    }
}
