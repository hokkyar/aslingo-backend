<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Transportation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'bike' => ['Bike', 'Sepeda'],
            'motorcycle' => ['Motorcycle', 'Motor'],
            'car' => ['Car', 'Mobil'],
            'truck' => ['Truck', 'Truk'],
            'bus' => ['Bus', 'Bus'],
            'train' => ['Train', 'Kereta'],
            'plane' => ['Plane', 'Pesawat'],
            'boat' => ['Boat', 'Perahu'],
            'helicopter' => ['Helicopter', 'Helikopter'],
            'ship' => ['Ship', 'Kapal'],
            'i_go_by_bike' => ['I go by bike', 'Saya pergi naik sepeda'],
            'i_go_by_car' => ['I go by car', 'Saya pergi naik mobil'],
            'i_go_by_bus' => ['I go by bus', 'Saya pergi naik bus'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 28,
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
