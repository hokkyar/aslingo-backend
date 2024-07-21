<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSupplies extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            'id_lesson' => 7,
            'order' => 1,
            'material_name' => 'Book',
            'cover' => 'img_book.png',
            'head_pic' => 'img_book.png',
            'text_en' => 'Book',
            'text_id' => 'Buku',
            'ilustration' => 'ASL_Book.png',
            'video' => 'book.mp4',
            'text_illustration' => 'Book',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 7,
            'order' => 2,
            'material_name' => 'Scissor',
            'cover' => 'img_scissor.png',
            'head_pic' => 'img_scissor.png',
            'text_en' => 'Scissor',
            'text_id' => 'Gunting',
            'ilustration' => 'ASL_Scissor.png',
            'video' => 'scissor.mp4',
            'text_illustration' => 'Scissor',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 7,
            'order' => 3,
            'material_name' => 'Bag',
            'cover' => 'img_bag.png',
            'head_pic' => 'img_bag.png',
            'text_en' => 'Bag',
            'text_id' => 'Tas',
            'ilustration' => 'ASL_Bag.png',
            'video' => 'bag.mp4',
            'text_illustration' => 'Bag',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 7,
            'order' => 4,
            'material_name' => 'Pencil',
            'cover' => 'img_pencil.png',
            'head_pic' => 'img_pencil.png',
            'text_en' => 'Pencil',
            'text_id' => 'Pensil',
            'ilustration' => 'ASL_Pencil.png',
            'video' => 'pencil.mp4',
            'text_illustration' => 'Pencil',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 7,
            'order' => 5,
            'material_name' => 'Pen',
            'cover' => 'img_pen.png',
            'head_pic' => 'img_pen.png',
            'text_en' => 'Pen',
            'text_id' => 'Pulpen',
            'ilustration' => 'ASL_Pen.png',
            'video' => 'pen.mp4',
            'text_illustration' => 'Pen',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 7,
            'order' => 6,
            'material_name' => 'Ruler',
            'cover' => 'img_ruler.png',
            'head_pic' => 'img_ruler.png',
            'text_en' => 'Ruler',
            'text_id' => 'Penggaris',
            'ilustration' => 'ASL_Ruler.png',
            'video' => 'ruler.mp4',
            'text_illustration' => 'Ruler',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 7,
            'order' => 7,
            'material_name' => 'Eraser',
            'cover' => 'img_eraser.png',
            'head_pic' => 'img_eraser.png',
            'text_en' => 'Eraser',
            'text_id' => 'Penghapus',
            'ilustration' => 'ASL_Eraser.png',
            'video' => 'eraser.mp4',
            'text_illustration' => 'Eraser',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 7,
            'order' => 8,
            'material_name' => 'Paper',
            'cover' => 'img_paper.png',
            'head_pic' => 'img_paper.png',
            'text_en' => 'Paper',
            'text_id' => 'Kertas',
            'ilustration' => 'ASL_Paper.png',
            'video' => 'paper.mp4',
            'text_illustration' => 'Paper',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 7,
            'order' => 9,
            'material_name' => 'Glue',
            'cover' => 'img_glue.png',
            'head_pic' => 'img_glue.png',
            'text_en' => 'Glue',
            'text_id' => 'Lem',
            'ilustration' => 'ASL_Glue.png',
            'video' => 'glue.mp4',
            'text_illustration' => 'Glue',
        ]);
        DB::table('materials')->insert([
            'id_lesson' => 7,
            'order' => 10,
            'material_name' => 'Sharpener',
            'cover' => 'img_sharpener.png',
            'head_pic' => 'img_sharpener.png',
            'text_en' => 'Sharpener',
            'text_id' => 'Rautan',
            'ilustration' => 'ASL_Sharpener.png',
            'video' => 'sharpener.mp4',
            'text_illustration' => 'Sharpener',
        ]);
    }
}
