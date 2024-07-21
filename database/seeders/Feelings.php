<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Feelings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'happy' => ['happy', 'senang'],
            'sad' => ['sad', 'sedih'],
            'angry' => ['angry', 'marah'],
            'thirsty' => ['thirsty', 'haus'],
            'sleepy' => ['sleepy', 'mengantuk'],
            'sick' => ['sick', 'sakit'],
            'hungry' => ['hungry', 'lapar'],
            'tired' => ['tired', 'lelah'],
            'hot' => ['hot', 'panas'],
            'cold' => ['cold', 'dingin'],
            'worried' => ['worried', 'khawatir'],
            'dizzy' => ['dizzy', 'pusing'],
            'shy' => ['shy', 'malu'],
            'confused' => ['confused', 'bingung'],
            'i_am_tired' => ['I am tired.', 'Saya lelah.'],
            'she_is_happy' => ['She is happy.', 'Dia senang.'],
            'we_are_sad' => ['We are sad.', 'Kami sedih.'],
        ];

        $order = 1;
        foreach ($data as $key => $texts) {
            DB::table('materials')->insert([
                'id_lesson' => 24,
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
