<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Introduction extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $data = [
            'hello' => ['Hello', 'Halo'],
            'name' => ['Name', 'Nama'],
            'age' => ['Age', 'Usia'],
            'address' => ['Address', 'Alamat'],
            'how_are_you' => ['How are you?', 'Apa kabar?'],
            'nice_to_meet_you' => ['Nice to meet you.', 'Senang bertemu dengan Anda.'],
            'what_is_your_name' => ['What is your name?', 'Siapa nama Anda?'],
            'my_name_is' => ['My name is ....', 'Nama saya ....'],
            'how_old_are_you' => ['How old are you?', 'Berapa usia Anda?'],
            'where_are_you_from' => ['Where are you from?', 'Dari mana asal Anda?'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 1,
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
