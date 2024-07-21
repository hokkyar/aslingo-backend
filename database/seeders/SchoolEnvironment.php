<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SchoolEnvironment extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'classroom' => ['Classroom', 'Ruang Kelas', ''],
            'office' => ['Office', 'Kantor', ''],
            'headmaster_room' => ['Headmaster Room', 'Ruang Kepala Sekolah', ''],
            'toilet' => ['Toilet', 'Toilet', ''],
            'canteen' => ['Canteen', 'Kantin', ''],
            'temple' => ['Temple', 'Kuil', ''],
            'yard' => ['Yard', 'Halaman', ''],
            'parking_area' => ['Parking Area', 'Area Parkir', ''],
            'salon' => ['Salon', 'Salon', ''],
            'kitchen' => ['Kitchen', 'Dapur', ''],
            'hall' => ['Hall', 'Aula', ''],
            'there_canteen' => ['There is a canteen', 'Ada kantin', 'There Is Canteen'],
            'there_template' => ['There is a temple', 'Ada kuil', 'There Is Temple'],
            'where_are_you_from' => ['Where are you from?', 'Dari mana asal Anda?', ''],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 21,
                'order' => $order,
                'cover' => $key . '.png',
                'head_pic' => $key . '.png',
                'ilustration' => 'ASL_' . $key . '.png',
                'video' => $key . '.mp4',
                'material_name' => $texts[0],
                'text_en' => $texts[0],
                'text_id' => $texts[1],
                'text_illustration' => $texts[2],
            ]);
            $order++;
        }
    }
}
