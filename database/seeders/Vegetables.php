<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Vegetables extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'vegetables' => ['Vegetables', 'Sayuran'],
            'cucumber' => ['Cucumber', 'Mentimun'],
            'carrot' => ['Carrot', 'Wortel'],
            'corn' => ['Corn', 'Jagung'],
            'potato' => ['Potato', 'Kentang'],
            'salad' => ['Salad', 'Salad'],
            'broccoli' => ['Broccoli', 'Brokoli'],
            'tomato' => ['Tomato', 'Tomat'],
            'onion' => ['Onion', 'Bawang'],
            'celery' => ['Celery', 'Seledri'],
            'mushroom' => ['Mushroom', 'Jamur'],
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
