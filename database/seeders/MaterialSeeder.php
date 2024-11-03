<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //START CLASS 7

        //LESSON 1 GREETINGS
        $greatings = [
            'hello' => ['Hello', 'Hallo'],
            'good_morning' => ['Good Morning', 'Selamat Pagi'],
            'good_afternoon' => ['Good Afternoon', 'Selamat Siang'],
            'good_evening' => ['Good Evening', 'Selamat Malam'],
            'good_bye' => ['Good Bye', 'Selamat Tinggal'],
            'please' => ['Please', 'Tolong'],
            'thank_you' => ['Thank You', 'Terima Kasih'],
            'how_are_you' => ['How Are You?', 'Apa Kabar?'],
            'fine_thank_you' => ['Fine, Thank You', 'Baik, Terima Kasih'],
            'what_is_your_name' => ['What is your name?', 'Siapa nama kamu?']
        ];

        $order = 1;

        foreach ($greatings as $key => $texts) {
            Material::create([
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

        //END LESSON 1 GREETINGS

        //LESSONS 2 NUMBERS
        $numbers = [
            '1' => ['One', 'Satu'],
            '2' => ['Two', 'Dua'],
            '3' => ['Three', 'Tiga'],
            '4' => ['Four', 'Empat'],
            '5' => ['Five', 'Lima'],
            '6' => ['Six', 'Enam'],
            '7' => ['Seven', 'Tujuh'],
            '8' => ['Eight', 'Delapan'],
            '9' => ['Nine', 'Sembilan'],
            '10' => ['Ten', 'Sepuluh']
        ];

        $order = 1;

        foreach ($numbers as $key => $texts) {
            Material::create([
                'id_lesson' => 2,
                'order' => $order,
                'cover' => $key . '.png',
                'head_pic' => $key . '.png',
                'ilustration' => 'ASL_' . strtolower($texts[0]) . '.png',
                'video' => $key . '.mp4',
                'material_name' => $texts[0],
                'text_en' => $texts[0],
                'text_id' => $texts[1],
                'text_illustration' => '',
            ]);
            $order++;
        }
        //END LESSONS 2 NUMBER

        //LESSONS 3 ALFABET
        $alphabet = range('a', 'z');
        foreach ($alphabet as $index => $letter) {
            Material::create([
                'id_lesson' => 3,
                'order' => $index + 1,
                'cover' => $letter . '.png',
                'head_pic' => $letter . '.png',
                'ilustration' => 'ASL_' . $letter . '.png',
                'video' => $letter . '.mp4',
                'material_name' => strtoupper($letter),
                'text_en' => strtoupper($letter),
                'text_id' => strtoupper($letter),
                'text_illustration' => '',
            ]);
        }
        //END LESSONS 3 ALFABET

        //LESSONS 4 TIME
        $time = [
            'time' => ['Time', 'Waktu'],
            'morning' => ['Morning', 'Pagi'],
            'afternoon' => ['Afternoon', 'Siang'],
            'evening' => ['Evening', 'Sore'],
            'now' => ['Now', 'Sekarang'],
            'later' => ['Later', 'Nanti'],
            'just_now' => ['Just Now', 'Baru Saja'],
            'tomorrow' => ['Tomorrow', 'Besok'],
            'yesterday' => ['Yesterday', 'Kemarin'],
            'day_after_tomorrow' => ['Day After Tomorrow', 'Lusa'],
        ];

        $order = 1;
        foreach ($time as $key => $texts) {
            Material::create([
                'id_lesson' => 4,
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
        //END LESSONS 4 TIME

        //LESSONS 5 DAY OF WEEK
        $day = [
            'sunday' => ['Sunday', 'Minggu'],
            'monday' => ['Monday', 'Senin'],
            'tuesday' => ['Tuesday', 'Selasa'],
            'wednesday' => ['Wednesday', 'Rabu'],
            'thursday' => ['Thursday', 'Kamis'],
            'friday' => ['Friday', 'Jumat'],
            'saturday' => ['Saturday', 'Sabtu'],
        ];

        $order = 1;
        foreach ($day as $key => $texts) {
            Material::create([
                'id_lesson' => 5,
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
        //END LESSONS 5 DAY OF WEEK

        //LESSONS 6 PART OF THE BODY
        $body = [
            'head' => ['Head', 'Kepala'],
            'hair' => ['Hair', 'Rambut'],
            'eyes' => ['Eyes', 'Mata'],
            'ear' => ['Ear', 'Telinga'],
            'nose' => ['Nose', 'Hidung'],
            'lip' => ['Lip', 'Bibir'],
            'hand' => ['Hand', 'Tangan'],
            'chest' => ['Chest', 'Dada'],
            'stomach' => ['Stomach', 'Perut'],
            'thigh' => ['Thigh', 'Paha'],
            'leg' => ['Leg', 'Kaki'],
        ];

        $order = 1;
        foreach ($body as $key => $texts) {
            Material::create([
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
        //END LESSONS 6 PART OF BODY

        //LESSONS 7 SCHOOL SUPPLIES
        $schoolSupplies = [
            'book' => ['Book', 'Buku'],
            'scissor' => ['Scissor', 'Gunting'],
            'bag' => ['Bag', 'Tas'],
            'pencil' => ['Pencil', 'Pensil'],
            'pen' => ['Pen', 'Pulpen'],
            'ruler' => ['Ruler', 'Penggaris'],
            'eraser' => ['Eraser', 'Penghapus'],
            'paper' => ['Paper', 'Kertas'],
            'glue' => ['Glue', 'Lem'],
            'sharpener' => ['Sharpener', 'Rautan']
        ];

        $order = 1;

        foreach ($schoolSupplies as $key => $texts) {
            Material::create([
                'id_lesson' => 7,
                'order' => $order,
                'material_name' => $texts[0],
                'cover' => $key . '.png',
                'head_pic' => $key . '.png',
                'text_en' => $texts[0],
                'text_id' => $texts[1],
                'ilustration' => 'ASL_' . ucfirst($key) . '.png',
                'video' => $key . '.mp4',
                'text_illustration' => $texts[0],
            ]);
            $order++;
        }
        //END LESSONS 7 SCHOOL SUPPLIES

        //LESSONS 8 FAMILY
        $family = [
            'family' => ['Family', 'Keluarga'],
            'father' => ['Father', 'Ayah'],
            'mother' => ['Mother', 'Ibu'],
            'child' => ['Child', 'Anak'],
            'baby' => ['Baby', 'Bayi'],
            'brother' => ['Brother', 'Saudara Laki-laki'],
            'sister' => ['Sister', 'Saudara Perempuan'],
            'husband' => ['Husband', 'Suami'],
            'wife' => ['Wife', 'Istri'],
            'aunt' => ['Aunt', 'Bibi'],
            'uncle' => ['Uncle', 'Paman'],
            'grandfather' => ['Grandfather', 'Kakek'],
            'grandmother' => ['Grandmother', 'Nenek'],
        ];

        $order = 1;
        foreach ($family as $key => $texts) {
            Material::create([
                'id_lesson' => 8,
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
        //END LESSONS 8 FAMILY

        //LESSONS 9 IN THE BEDROOM
        $bedroom = [
            'pillow' => ['Pillow', 'Bantal'],
            'window' => ['Window', 'Jendela'],
            'watch' => ['Watch', 'Jam Tangan'],
            'chair' => ['Chair', 'Kursi'],
            'fan' => ['Fan', 'Kipas Angin'],
            'lamp' => ['Lamp', 'Lampu'],
            'floor' => ['Floor', 'Lantai'],
            'table' => ['Table', 'Meja'],
            'door' => ['Door', 'Pintu'],
            'blanket' => ['Blanket', 'Selimut'],
        ];

        $order = 1;
        foreach ($bedroom as $key => $texts) {
            Material::create([
                'id_lesson' => 9,
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
        //END LESSONS 9 IN THE BEDROOM

        //LESSONS 10 IN THE BATHROOM
        $bathroom = [
            'mirror' => ['Mirror', 'Cermin'],
            'towel' => ['Towel', 'Handuk'],
            'soap' => ['Soap', 'Sabun'],
            'shampoo' => ['Shampoo', 'Sampo'],
            'toothbrush' => ['Toothbrush', 'Sikat Gigi'],
            'comb' => ['Comb', 'Sisir'],
            'toothpaste' => ['Toothpaste', 'Pasta Gigi'],
            'shower' => ['Shower', 'Pancuran'],
            'bathtub' => ['Bathtub', 'Bak Mandi'],
            'toilet' => ['Toilet', 'Toilet'],
        ];

        $order = 1;
        foreach ($bathroom as $key => $texts) {
            Material::create([
                'id_lesson' => 10,
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
        //END LESSONS 10 IN THE BATHROOM

        //LESSONS 11 IN THE KITCHEN
        $kitchen = [
            'cup' => ['Cup', 'Cangkir'],
            'fork' => ['Fork', 'Garpu'],
            'pan' => ['Pan', 'Wajan'],
            'plate' => ['Plate', 'Piring'],
            'knife' => ['Knife', 'Pisau'],
            'spoon' => ['Spoon', 'Sendok'],
            'bottle' => ['Bottle', 'Botol'],
            'stove' => ['Stove', 'Kompor'],
            'bowl' => ['Bowl', 'Mangkuk'],
            'glass' => ['Glass', 'Gelas'],
        ];

        $order = 1;
        foreach ($kitchen as $key => $texts) {
            Material::create([
                'id_lesson' => 11,
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
        //END LESSONS 11 IN THE KITCHEN

        //END CLASS 7

        //START CLASS 8

        //LESSONS 12 INTRODUCTION
        $introduction = [
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
        foreach ($introduction as $key => $texts) {
             Material::create([
                'id_lesson' => 12,
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
        //END LESSONS 12 INTRODUCTION

        //LESSONS 13 NUMBERS
        $numbers8 = [
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

        foreach ($numbers8 as $number => $texts) {
             Material::create([
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
        //END LESSONS 13 NUMBERS

        //LESSONS 14 COLORS
        $colors = [
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
        foreach ($colors as $key => $texts) {
             Material::create([
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
        //END LESSONS 14 COLORS

        //LESSONS 15 CLOTHES
        $clothes = [
            'clothe' => ['Clothe', 'Pakaian'],
            'shirt' => ['Shirt', 'Kemeja'],
            'underwear' => ['Underwear', 'Pakaian Dalam'],
            'dress' => ['Dress', 'Gaun'],
            'short_pants' => ['Short Pants', 'Celana Pendek'],
            'jacket' => ['Jacket', 'Jaket'],
            'skirt' => ['Skirt', 'Rok'],
            'slipper' => ['Slipper', 'Sandal'],
            'shoes' => ['Shoes', 'Sepatu'],
            'hat' => ['Hat', 'Topi'],
        ];

        $order = 1;
        foreach ($clothes as $key => $texts) {
             Material::create([
                'id_lesson' => 15,
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
        //END LESSONS 15 CLOTHES

        //LESSONS 16 FRUITS
        $fruits = [
            'fruits' => ['Fruits', 'Buah-buahan'],
            'grape' => ['Grape', 'Anggur'],
            'mango' => ['Mango', 'Mangga'],
            'apple' => ['Apple', 'Apel'],
            'banana' => ['Banana', 'Pisang'],
            'pineapple' => ['Pineapple', 'Nanas'],
            'watermelon' => ['Watermelon', 'Semangka'],
            'strawberry' => ['Strawberry', 'Stroberi'],
            'orange' => ['Orange', 'Jeruk'],
            'lemon' => ['Lemon', 'Lemon'],
        ];

        $order = 1;
        foreach ($fruits as $key => $texts) {
             Material::create([
                'id_lesson' => 16,
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
        //END LESSONS 16 FRUITS

        //LESSONS 17 VEGETABLES
        $vegetables = [
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
        foreach ($vegetables as $key => $texts) {
             Material::create([
                'id_lesson' => 17,
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
        //END LESSONS 17 VEGETABLES

        //LESSONS 18 PETS
        $pets = [
            'animal' => ['Animal', 'Hewan'],
            'dog' => ['Dog', 'Anjing'],
            'chicken' => ['Chicken', 'Ayam'],
            'pig' => ['Pig', 'Babi'],
            'duck' => ['Duck', 'Bebek'],
            'sheep' => ['Sheep', 'Domba'],
            'bird' => ['Bird', 'Burung'],
            'fish' => ['Fish', 'Ikan'],
            'rabbit' => ['Rabbit', 'Kelinci'],
            'cat' => ['Cat', 'Kucing'],
            'horse' => ['Horse', 'Kuda'],
            'cow' => ['Cow', 'Sapi'],
            'rat' => ['Rat', 'Tikus'],
            'turtle' => ['Turtle', 'Kura-kura'],
        ];

        $order = 1;
        foreach ($pets as $key => $texts) {
             Material::create([
                'id_lesson' => 18,
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
        //END LESSONS 18 PETS

        //LESSONS 19 WILD ANIMALS
        $wildAnimal8 = [
            'crocodile' => ['Crocodile', 'Buaya'],
            'elephant' => ['Elephant', 'Gajah'],
            'tiger' => ['Tiger', 'Harimau'],
            'giraffe' => ['Giraffe', 'Jerapah'],
            'monkey' => ['Monkey', 'Monyet'],
            'lion' => ['Lion', 'Singa'],
            'snake' => ['Snake', 'Ular'],
            'zebra' => ['Zebra', 'Zebra'],
            'bear' => ['Bear', 'Beruang'],
        ];

        $order = 1;
        foreach ($wildAnimal8 as $key => $texts) {
             Material::create([
                'id_lesson' => 19,
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
        //END LESSONS 19 WILD ANIMALS

        //LESSONS 20 HOBBIES
        $hobbies = [
            'what_is_your_hobby' => ['What is your hobby?', 'Apa hobi Anda?'],
            'painting' => ['Painting', 'Melukis'],
            'swimming' => ['Swimming', 'Berenang'],
            'cooking' => ['Cooking', 'Memasak'],
            'dancing' => ['Dancing', 'Menari'],
            'reading' => ['Reading', 'Membaca'],
            'gardening' => ['Gardening', 'Berkebun'],
            'traveling' => ['Traveling', 'Bepergian'],
            'photography' => ['Photography', 'Fotografi'],
            'singing' => ['Singing', 'Bernyanyi'],
            'fishing' => ['Fishing', 'Memancing'],
            'watching' => ['Watching', 'Menonton'],
            'writing' => ['Writing', 'Menulis'],
        ];

        $order = 1;
        foreach ($hobbies as $key => $texts) {
             Material::create([
                'id_lesson' => 20,
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
        //END LESSONS 20 HOBBIES

        //LESSONS 21 SCHOOL ENVIRONMENT
        $schoolEnv = [
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
        foreach ($schoolEnv as $key => $texts) {
             Material::create([
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
        //END LESSONS 21 SCHOOL ENVIRONMENT

        //LESSONS 22 ACTION VERBS
        $actionVerbs = [
            'to_eat' => ['To eat', 'Makan', ''],
            'to_drink' => ['To drink', 'Minum', ''],
            'to_bath' => ['To bath', 'Mandi', ''],
            'to_pee' => ['To pee', 'Kencing', ''],
            'to_poop' => ['To poop', 'Buang air besar', ''],
            'to_brushing' => ['To brushing (teeth)', 'Menyikat (gigi)', ''],
            'to_cry' => ['To cry', 'Menangis', ''],
            'to_sleep' => ['To sleep', 'Tidur', ''],
            'to_laugh' => ['To laugh', 'Tertawa', ''],
            'i_eat_an_apple' => ['I eat an apple.', 'Saya makan apel.', 'I Eat Apple I'],
            'i_drink_water' => ['I drink water.', 'Saya minum air.', 'I Drink Water I'],
            'she_sleep' => ['She sleep', 'Dia tidur', "She Sleep She"],
        ];

        $order = 1;
        foreach ($actionVerbs as $key => $texts) {
             Material::create([
                'id_lesson' => 22,
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
        //END LESSONS 22 ACTION VERBS

        //END CLASS 8

        //START CLASS 9

        //LESSONS 23 NUMBER
        $numbers9 = [
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
        foreach ($numbers9 as $number => $texts) {
            Material::create([
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
        //END LESSONS 23 NUMBER

        //LESSONS 24 FEELINGS
        $feelings = [
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
        foreach ($feelings as $key => $texts) {
            Material::create([
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
        //END LESSONS 24 FEELINGS

        //LESSONS 25 YES/NO QUESTIONS
        $ysQuestion = [
            'are_you_hungry' => ['Are you hungry?', 'Apakah kamu lapar?'],
            'are_you_thirsty' => ['Are you thirsty?', 'Apakah kamu haus?'],
            'are_you_happy' => ['Are you happy?', 'Apakah kamu bahagia?'],
            'are_you_sad' => ['Are you sad?', 'Apakah kamu sedih?'],
            'are_you_angry' => ['Are you angry?', 'Apakah kamu marah?'],
            'are_you_sick_sleepy' => ['Are you sick? Are you sleepy?', 'Apakah kamu sakit? Apakah kamu mengantuk?'],
            'are_you_tired' => ['Are you tired?', 'Apakah kamu lelah?'],
            'are_you_worried' => ['Are you worried?', 'Apakah kamu khawatir?'],
            'are_you_cold' => ['Are you cold?', 'Apakah kamu kedinginan?'],
        ];

        $order = 1;
        foreach ($ysQuestion as $key => $texts) {
            Material::create([
                'id_lesson' => 25,
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
        //END LESSONS 25 YES/NO QUESTIONS

        //LESSONS 26 WH QUESTIONS
        $whQuestions = [
            'what_is_your_name' => ['What is your name?', 'Siapa namamu?'],
            'who_is_he' => ['Who is he?', 'Siapa dia?'],
            'who_is_she' => ['Who is she?', 'Siapa dia?'],
            'where_do_you_live' => ['Where do you live?', 'Di mana kamu tinggal?'],
            'where_is_surya' => ['Where is Surya?', 'Di mana Surya?'],
            'where_is_aditya' => ['Where is Aditya?', 'Di mana Aditya?'],
            'when_is_your_birthday' => ['When is your birthday?', 'Kapan ulang tahunmu?'],
            'why_are_you_crying' => ['Why are you crying?', 'Mengapa kamu menangis?'],
        ];

        $order = 1;
        foreach ($whQuestions as $key => $texts) {
            Material::create([
                'id_lesson' => 26,
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
        //END LESSONS 26 WH QUESTIONS

        //LESSONS 27 DAILY ACTIVITIES
        $activity = [
            'wake_up' =>  ['Wake up', 'Bangun tidur'],
            'shower' => ['Shower', 'Mandi'],
            'study' => ['Study', 'Belajar'],
            'read' => ['Read', 'Membaca'],
            'play' => ['Play', 'Bermain'],
            'cook' => ['Cook', 'Memasak'],
            'i_wake_up_in_the_morning' => ['I wake up in the morning', 'Saya bangun di pagi hari'],
            'she_is_reading' => ['She is reading', 'Dia sedang membaca'],
            'my_mom_is_cooking' => ['My mom is cooking', 'Ibu saya sedang memasak'],
        ];

        $order = 1;
        foreach ($activity as $key => $texts) {
            Material::create([
                'id_lesson' => 27,
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
        //END LESSONS 27 DAILY ACTIVITIES

        //LESSONS 28 TRANSPORTATION
        $trasportation = [
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
        foreach ($trasportation as $key => $texts) {
            Material::create([
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
        //END LESSONS 28 TRANSPORTATION

        //LESSONS 29 PROFESSION
        $profession = [
            'teacher' => ['Teacher', 'Guru'],
            'police' => ['Police', 'Polisi'],
            'pilot' => ['Pilot', 'Pilot'],
            'driver' => ['Driver', 'Supir'],
            'army' => ['Army', 'Tentara'],
            'doctor' => ['Doctor', 'Dokter'],
            'fisherman' => ['Fisherman', 'Nelayan'],
            'farmer' => ['Farmer', 'Petani'],
            'my_father_is_a_teacher' => ['My father is a teacher', 'Ayah saya adalah seorang guru'],
            'my_mother_is_a_police' => ['My mother is a police', 'Ibu saya adalah seorang polisi'],
            'my_brother_is_an_army' => ['My brother is an army', 'Saudara saya adalah seorang tentara'],
        ];

        $order = 1;
        foreach ($profession as $key => $texts) {
            Material::create([
                'id_lesson' => 29,
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
        //END LESSONS 29 PROFESSION

        //LESSONS 30 SPORT
        $sport = [
            'basketball' => ['Basketball', 'Bola Basket'],
            'football' => ['Football', 'Sepak Bola'],
            'run' => ['Run', 'Lari'],
            'volleyball' => ['Volleyball', 'Bola Voli'],
            'swimming' => ['Swimming', 'Renang'],
            'tennis' => ['Tennis', 'Tenis'],
            'karate' => ['Karate', 'Karate'],
            'jump' => ['Jump', 'Melompat'],
            'i_play_basketball' => ['I play basketball.', 'Saya bermain bola basket.'],
            'i_play_tennis' => ['I play tennis.', 'Saya bermain tenis.'],
            'i_play_volleyball' => ['I play volleyball.', 'Saya bermain bola voli.'],
        ];

        $order = 1;
        foreach ($sport as $key => $texts) {
            Material::create([
                'id_lesson' => 30,
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
        //END LESSONS 30 SPORT

        //LESSONS 31 WILD ANIMALS
        $wildAnimals9 = [
            'tiger' => ['Tiger', 'Harimau'],
            'crocodile' => ['Crocodile', 'Buaya'],
            'lion' => ['Lion', 'Singa'],
            'snake' => ['Snake', 'Ular'],
            'shark' => ['Shark', 'Hiu'],
            'whale' => ['Whale', 'Paus'],
            'gorilla' => ['Gorilla', 'Gorila'],
            'bear' => ['Bear', 'Beruang'],
            'wolf' => ['Wolf', 'Serigala'],
            'eagle' => ['Eagle', 'Elang'],
            'komodo' => ['Komodo', 'Komodo'],
            'leopard' => ['Leopard', 'Macan Tutul'],
            'bull' => ['Bull', 'Banteng'],
            'rhinoceros' => ['Rhinoceros', 'Badak'],
            'elephant' => ['Elephant', 'Gajah'],
            'giraffe' => ['Giraffe', 'Jerapah'],
            'monkey' => ['Monkey', 'Monyet'],
            'zebra' => ['Zebra', 'Zebra'],
            'i_see_a_monkey' => ['I see a monkey.', 'Saya melihat monyet.'],
            'i_see_an_elephant' => ['I see an elephant.', 'Saya melihat gajah.'],
        ];

        $order = 1;
        foreach ($wildAnimals9 as $key => $texts) {
            Material::create([
                'id_lesson' => 31,
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
        //END LESSONS 31 WILD ANIMALS

        //LESSONS 32 DESCRIBING PEOPLE
        $discPeople = [
            'beautiful' => ['Beautiful', 'Cantik'],
            'handsome' => ['Handsome', 'Tampan'],
            'tall' => ['Tall', 'Tinggi'],
            'short' => ['Short', 'Pendek'],
            'thin' => ['Thin', 'Kurus'],
            'fat' => ['Fat', 'Gemuk'],
            'old' => ['Old', 'Tua'],
            'young' => ['Young', 'Muda'],
            'bald' => ['Bald', 'Botak'],
            'curly' => ['Curly', 'Keriting'],
        ];

        $order = 1;
        foreach ($discPeople as $key => $texts) {
            Material::create([
                'id_lesson' => 32,
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
        //END LESSONS 32 DESCRIBING PEOPLE

        //END CLASS 9
    }
}
