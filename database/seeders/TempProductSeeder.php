<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TempProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            'apple' => [
                'name' => 'Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'apricot' => [
                'name' => 'Apricot',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'avocado' => [
                'name' => 'Avocado',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'banana' => [
                'name' => 'Banana',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'blackberry' => [
                'name' => 'Blackberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'blueberry' => [
                'name' => 'Blueberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'boysenberry' => [
                'name' => 'Boysenberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'breadfruit' => [
                'name' => 'Breadfruit',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'cantaloupe' => [
                'name' => 'Cantaloupe',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'cherry' => [
                'name' => 'Cherry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'coconut' => [
                'name' => 'Coconut',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'cranberry' => [
                'name' => 'Cranberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'currant' => [
                'name' => 'Currant',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'date' => [
                'name' => 'Date',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'dragonfruit' => [
                'name' => 'Dragonfruit',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'durian' => [
                'name' => 'Durian',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'elderberry' => [
                'name' => 'Elderberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'fig' => [
                'name' => 'Fig',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'gooseberry' => [
                'name' => 'Gooseberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'grapes' => [
                'name' => 'Grapes',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'grapefruit' => [
                'name' => 'Grapefruit',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'guava' => [
                'name' => 'Guava',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'jackfruit' => [
                'name' => 'Jackfruit',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'jujube' => [
                'name' => 'Jujube',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'kiwi' => [
                'name' => 'Kiwi',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'kumquat' => [
                'name' => 'Kumquat',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'lemon' => [
                'name' => 'Lemon',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'lime' => [
                'name' => 'Lime',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'lychee' => [
                'name' => 'Lychee',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'mandarin' => [
                'name' => 'Mandarin',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'mango' => [
                'name' => 'Mango',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'mangosteen' => [
                'name' => 'Mangosteen',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'mulberry' => [
                'name' => 'Mulberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'nectarine' => [
                'name' => 'Nectarine',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'olive' => [
                'name' => 'Olive',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'orange' => [
                'name' => 'Orange',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'papaya' => [
                'name' => 'Papaya',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'passionfruit' => [
                'name' => 'Passionfruit',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'peach' => [
                'name' => 'Peach',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'pear' => [
                'name' => 'Pear',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'persimmon' => [
                'name' => 'Persimmon',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'pineapple' => [
                'name' => 'Pineapple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'plum' => [
                'name' => 'Plum',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'pomegranate' => [
                'name' => 'Pomegranate',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'pomelo' => [
                'name' => 'Pomelo',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'quince' => [
                'name' => 'Quince',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'raspberry' => [
                'name' => 'Raspberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'starfruit' => [
                'name' => 'Starfruit',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'strawberry' => [
                'name' => 'Strawberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'tangerine' => [
                'name' => 'Tangerine',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'watermelon' => [
                'name' => 'Watermelon',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'longan' => [
                'name' => 'Longan',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'rambutan' => [
                'name' => 'Rambutan',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'salak' => [
                'name' => 'Salak',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'sapodilla' => [
                'name' => 'Sapodilla',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'soursop' => [
                'name' => 'Soursop',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'custardapple' => [
                'name' => 'Custardapple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'cherimoya' => [
                'name' => 'Cherimoya',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'feijoa' => [
                'name' => 'Feijoa',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'loquat' => [
                'name' => 'Loquat',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            'miraclefruit' => [
                'name' => 'Miraclefruit',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'jabuticaba' => [
                'name' => 'Jabuticaba',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'langsat' => [
                'name' => 'Langsat',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'ackee' => [
                'name' => 'Ackee',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'bilberry' => [
                'name' => 'Bilberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'cloudberry' => [
                'name' => 'Cloudberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'huckleberry' => [
                'name' => 'Huckleberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'lingonberry' => [
                'name' => 'Lingonberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'marionberry' => [
                'name' => 'Marionberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'youngberry' => [
                'name' => 'Youngberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'rowanberry' => [
                'name' => 'Rowanberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'serviceberry' => [
                'name' => 'Serviceberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'aronia' => [
                'name' => 'Aronia',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'barberry' => [
                'name' => 'Barberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'sea_buckthorn' => [
                'name' => 'Sea Buckthorn',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'medlar' => [
                'name' => 'Medlar',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'damson' => [
                'name' => 'Damson',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'greengage' => [
                'name' => 'Greengage',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'mirabelle' => [
                'name' => 'Mirabelle',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'tayberry' => [
                'name' => 'Tayberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'surinam_cherry' => [
                'name' => 'Surinam Cherry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'acerola' => [
                'name' => 'Acerola',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'barbados_cherry' => [
                'name' => 'Barbados Cherry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'pitanga' => [
                'name' => 'Pitanga',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'camu_camu' => [
                'name' => 'Camu Camu',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'naranjilla' => [
                'name' => 'Naranjilla',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'tamarillo' => [
                'name' => 'Tamarillo',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'pepino' => [
                'name' => 'Pepino',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'physalis' => [
                'name' => 'Physalis',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'ground_cherry' => [
                'name' => 'Ground Cherry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'ugli_fruit' => [
                'name' => 'Ugli Fruit',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'yuzu' => [
                'name' => 'Yuzu',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'sudachi' => [
                'name' => 'Sudachi',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'kabosu' => [
                'name' => 'Kabosu',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'calamansi' => [
                'name' => 'Calamansi',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'finger_lime' => [
                'name' => 'Finger Lime',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'buddhas_hand' => [
                'name' => 'Buddhas Hand',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'citron' => [
                'name' => 'Citron',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'bergamot' => [
                'name' => 'Bergamot',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'blood_orange' => [
                'name' => 'Blood Orange',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'clementine' => [
                'name' => 'Clementine',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'satsuma' => [
                'name' => 'Satsuma',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'tangelo' => [
                'name' => 'Tangelo',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'minneola' => [
                'name' => 'Minneola',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'dewberry' => [
                'name' => 'Dewberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'wineberry' => [
                'name' => 'Wineberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'hackberry' => [
                'name' => 'Hackberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'mayapple' => [
                'name' => 'Mayapple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'pawpaw' => [
                'name' => 'Pawpaw',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'bael' => [
                'name' => 'Bael',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'wood_apple' => [
                'name' => 'Wood Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'hog_plum' => [
                'name' => 'Hog Plum',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'ambarella' => [
                'name' => 'Ambarella',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'mammee_apple' => [
                'name' => 'Mammee Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'mamey_sapote' => [
                'name' => 'Mamey Sapote',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'canistel' => [
                'name' => 'Canistel',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'black_sapote' => [
                'name' => 'Black Sapote',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'white_sapote' => [
                'name' => 'White Sapote',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'star_apple' => [
                'name' => 'Star Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'abiu' => [
                'name' => 'Abiu',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'cupuacu' => [
                'name' => 'Cupuacu',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'bacuri' => [
                'name' => 'Bacuri',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'grumichama' => [
                'name' => 'Grumichama',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'cocoplum' => [
                'name' => 'Cocoplum',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'monstera_fruit' => [
                'name' => 'Monstera Fruit',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'ice_cream_bean' => [
                'name' => 'Ice Cream Bean',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'genip' => [
                'name' => 'Genip',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'lucuma' => [
                'name' => 'Lucuma',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'pequi' => [
                'name' => 'Pequi',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'pitomba' => [
                'name' => 'Pitomba',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'santol' => [
                'name' => 'Santol',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'wampee' => [
                'name' => 'Wampee',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'mangaba' => [
                'name' => 'Mangaba',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'imbu' => [
                'name' => 'Imbu',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'umbu' => [
                'name' => 'Umbu',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'cajá' => [
                'name' => 'Cajá',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'caju' => [
                'name' => 'Caju',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'rose_apple' => [
                'name' => 'Rose Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'wax_apple' => [
                'name' => 'Wax Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'java_apple' => [
                'name' => 'Java Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'mountain_apple' => [
                'name' => 'Mountain Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'water_apple' => [
                'name' => 'Water Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'velvet_apple' => [
                'name' => 'Velvet Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'ketembilla' => [
                'name' => 'Ketembilla',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'kei_apple' => [
                'name' => 'Kei Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'ilama' => [
                'name' => 'Ilama',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'atemoya' => [
                'name' => 'Atemoya',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'biriba' => [
                'name' => 'Biriba',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'soncoya' => [
                'name' => 'Soncoya',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'marang' => [
                'name' => 'Marang',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'pulasan' => [
                'name' => 'Pulasan',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'durian_cempedak' => [
                'name' => 'Durian Cempedak',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'cempedak' => [
                'name' => 'Cempedak',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'breadnut' => [
                'name' => 'Breadnut',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'gac' => [
                'name' => 'Gac',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'noni' => [
                'name' => 'Noni',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'tamarind' => [
                'name' => 'Tamarind',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'carob' => [
                'name' => 'Carob',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'goji_berry' => [
                'name' => 'Goji Berry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'schisandra' => [
                'name' => 'Schisandra',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'maqui' => [
                'name' => 'Maqui',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'elder' => [
                'name' => 'Elder',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'mulberry_red' => [
                'name' => 'Mulberry Red',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'mulberry_white' => [
                'name' => 'Mulberry White',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'mulberry_black' => [
                'name' => 'Mulberry Black',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg',
            ],

            'prickly_pear' => [
                'name' => 'Prickly Pear',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'tuna_fruit' => [
                'name' => 'Tuna Fruit',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'dragon_plum' => [
                'name' => 'Dragon Plum',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'desert_lime' => [
                'name' => 'Desert Lime',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'muntries' => [
                'name' => 'Muntries',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'davidsons_plum' => [
                'name' => 'Davidsons Plum',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'riberry' => [
                'name' => 'Riberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'illawarra_plum' => [
                'name' => 'Illawarra Plum',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'native_currant' => [
                'name' => 'Native Currant',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'lilly_pilly' => [
                'name' => 'Lilly Pilly',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'pepperberry' => [
                'name' => 'Pepperberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'sea_grape' => [
                'name' => 'Sea Grape',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'cocoplum_red' => [
                'name' => 'Cocoplum Red',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'otaheite_gooseberry' => [
                'name' => 'Otaheite Gooseberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'governors_plum' => [
                'name' => 'Governors Plum',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'mamoncillo' => [
                'name' => 'Mamoncillo',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'quenepa' => [
                'name' => 'Quenepa',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'genova_fruit' => [
                'name' => 'Genova Fruit',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'spanish_lime' => [
                'name' => 'Spanish Lime',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'langra_mango' => [
                'name' => 'Langra Mango',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'alphonso_mango' => [
                'name' => 'Alphonso Mango',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'kesar_mango' => [
                'name' => 'Kesar Mango',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'totapuri_mango' => [
                'name' => 'Totapuri Mango',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'chaunsa_mango' => [
                'name' => 'Chaunsa Mango',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'anwar_ratol' => [
                'name' => 'Anwar Ratol',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'sugar_apple' => [
                'name' => 'Sugar Apple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'pineberry' => [
                'name' => 'Pineberry',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'cranapple' => [
                'name' => 'Cranapple',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'red_banana' => [
                'name' => 'Red Banana',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'plantain' => [
                'name' => 'Plantain',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'muscadine' => [
                'name' => 'Muscadine',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'concord_grape' => [
                'name' => 'Concord Grape',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'moon_drop_grape' => [
                'name' => 'Moon Drop Grape',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'cotton_candy_grape' => [
                'name' => 'Cotton Candy Grape',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 0,
                'unit' => 'kg'
            ],

            'melon' => [
                'name' => 'Melon',
                'category_name' => 'fruit',
                'price' => 100,
                'image_path' => "assets/web/img/products/",
                'status' => 1,
                'unit' => 'kg'
            ],

            // vegetabels

            'potato' => [
                'name' => 'Potato',
                'category_name' => 'vegetable',
                'price' => 80,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'onion' => [
                'name' => 'Onion',
                'category_name' => 'vegetable',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'tomato' => [
                'name' => 'Tomato',
                'category_name' => 'vegetable',
                'price' => 150,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'carrot' => [
                'name' => 'Carrot',
                'category_name' => 'vegetable',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'cucumber' => [
                'name' => 'Cucumber',
                'category_name' => 'vegetable',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'cabbage' => [
                'name' => 'Cabbage',
                'category_name' => 'vegetable',
                'price' => 100,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'cauliflower' => [
                'name' => 'Cauliflower',
                'category_name' => 'vegetable',
                'price' => 140,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'spinach' => [
                'name' => 'Spinach',
                'category_name' => 'vegetable',
                'price' => 60,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'lettuce' => [
                'name' => 'Lettuce',
                'category_name' => 'vegetable',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'piece'
            ],
            'eggplant' => [
                'name' => 'Eggplant',
                'category_name' => 'vegetable',
                'price' => 130,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'okra' => [
                'name' => 'Okra',
                'category_name' => 'vegetable',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'peas' => [
                'name' => 'Peas',
                'category_name' => 'vegetable',
                'price' => 250,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'green_beans' => [
                'name' => 'Green Beans',
                'category_name' => 'vegetable',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'capsicum' => [
                'name' => 'Capsicum',
                'category_name' => 'vegetable',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'green_chili' => [
                'name' => 'Green Chili',
                'category_name' => 'vegetable',
                'price' => 300,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'red_chili' => [
                'name' => 'Red Chili',
                'category_name' => 'vegetable',
                'price' => 350,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'garlic' => [
                'name' => 'Garlic',
                'category_name' => 'vegetable',
                'price' => 400,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'ginger' => [
                'name' => 'Ginger',
                'category_name' => 'vegetable',
                'price' => 450,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'turnip' => [
                'name' => 'Turnip',
                'category_name' => 'vegetable',
                'price' => 100,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'radish' => [
                'name' => 'Radish',
                'category_name' => 'vegetable',
                'price' => 90,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'beetroot' => [
                'name' => 'Beetroot',
                'category_name' => 'vegetable',
                'price' => 150,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'sweet_potato' => [
                'name' => 'Sweet Potato',
                'category_name' => 'vegetable',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'zucchini' => [
                'name' => 'Zucchini',
                'category_name' => 'vegetable',
                'price' => 250,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'broccoli' => [
                'name' => 'Broccoli',
                'category_name' => 'vegetable',
                'price' => 300,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'piece'
            ],
            'celery' => [
                'name' => 'Celery',
                'category_name' => 'vegetable',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'asparagus' => [
                'name' => 'Asparagus',
                'category_name' => 'vegetable',
                'price' => 600,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'leek' => [
                'name' => 'Leek',
                'category_name' => 'vegetable',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'spring_onion' => [
                'name' => 'Spring Onion',
                'category_name' => 'vegetable',
                'price' => 80,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'parsley' => [
                'name' => 'Parsley',
                'category_name' => 'vegetable',
                'price' => 60,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'coriander' => [
                'name' => 'Coriander',
                'category_name' => 'vegetable',
                'price' => 50,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'mint' => [
                'name' => 'Mint',
                'category_name' => 'vegetable',
                'price' => 50,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'fenugreek' => [
                'name' => 'Fenugreek Leaves',
                'category_name' => 'vegetable',
                'price' => 70,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'mustard_greens' => [
                'name' => 'Mustard Greens',
                'category_name' => 'vegetable',
                'price' => 70,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'bitter_gourd' => [
                'name' => 'Bitter Gourd',
                'category_name' => 'vegetable',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'ridge_gourd' => [
                'name' => 'Ridge Gourd',
                'category_name' => 'vegetable',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'bottle_gourd' => [
                'name' => 'Bottle Gourd',
                'category_name' => 'vegetable',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'piece'
            ],
            'pumpkin' => [
                'name' => 'Pumpkin',
                'category_name' => 'vegetable',
                'price' => 100,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'drumstick' => [
                'name' => 'Drumstick',
                'category_name' => 'vegetable',
                'price' => 250,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'artichoke' => [
                'name' => 'Artichoke',
                'category_name' => 'vegetable',
                'price' => 450,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'piece'
            ],
            'kale' => [
                'name' => 'Kale',
                'category_name' => 'vegetable',
                'price' => 250,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'bok_choy' => [
                'name' => 'Bok Choy',
                'category_name' => 'vegetable',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'piece'
            ],
            'chayote' => [
                'name' => 'Chayote',
                'category_name' => 'vegetable',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'yam' => [
                'name' => 'Yam',
                'category_name' => 'vegetable',
                'price' => 200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'taro_root' => [
                'name' => 'Taro Root',
                'category_name' => 'vegetable',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'watercress' => [
                'name' => 'Watercress',
                'category_name' => 'vegetable',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'brussels_sprouts' => [
                'name' => 'Brussels Sprouts',
                'category_name' => 'vegetable',
                'price' => 450,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'fennel' => [
                'name' => 'Fennel',
                'category_name' => 'vegetable',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'piece'
            ],
            'collard_greens' => [
                'name' => 'Collard Greens',
                'category_name' => 'vegetable',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'arugula' => [
                'name' => 'Arugula',
                'category_name' => 'vegetable',
                'price' => 200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bunch'
            ],
            'snake_gourd' => [
                'name' => 'Snake Gourd',
                'category_name' => 'vegetable',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],
            'pointed_gourd' => [
                'name' => 'Pointed Gourd',
                'category_name' => 'vegetable',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg'
            ],

            // meat products

            'chicken' => [
                'name' => 'Chicken',
                'price' => 650,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'whole_chicken' => [
                'name' => 'Whole Chicken',
                'price' => 600,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'chicken_breast' => [
                'name' => 'Chicken Breast',
                'price' => 850,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'chicken_thigh' => [
                'name' => 'Chicken Thigh',
                'price' => 750,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'chicken_wings' => [
                'name' => 'Chicken Wings',
                'price' => 700,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'chicken_drumsticks' => [
                'name' => 'Chicken Drumsticks',
                'price' => 700,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'chicken_mince' => [
                'name' => 'Chicken Mince',
                'price' => 850,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'mutton' => [
                'name' => 'Mutton',
                'price' => 2400,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'mutton_chops' => [
                'name' => 'Mutton Chops',
                'price' => 2600,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'mutton_ribs' => [
                'name' => 'Mutton Ribs',
                'price' => 2500,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'mutton_mince' => [
                'name' => 'Mutton Mince',
                'price' => 2500,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'goat_meat' => [
                'name' => 'Goat Meat',
                'price' => 2300,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'lamb' => [
                'name' => 'Lamb',
                'price' => 2600,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'lamb_chops' => [
                'name' => 'Lamb Chops',
                'price' => 2800,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'beef' => [
                'name' => 'Beef',
                'price' => 1400,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'beef_boneless' => [
                'name' => 'Beef Boneless',
                'price' => 1700,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'beef_mince' => [
                'name' => 'Beef Mince',
                'price' => 1600,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'beef_steak' => [
                'name' => 'Beef Steak',
                'price' => 2200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'beef_ribs' => [
                'name' => 'Beef Ribs',
                'price' => 1800,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'veal' => [
                'name' => 'Veal',
                'price' => 2200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'turkey' => [
                'name' => 'Turkey',
                'price' => 1200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'turkey_breast' => [
                'name' => 'Turkey Breast',
                'price' => 1500,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'duck' => [
                'name' => 'Duck',
                'price' => 1600,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'duck_breast' => [
                'name' => 'Duck Breast',
                'price' => 2200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'quail' => [
                'name' => 'Quail',
                'price' => 1800,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'piece',
                'category_name' => 'meat'
            ],
            'rabbit_meat' => [
                'name' => 'Rabbit Meat',
                'price' => 2000,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'venison' => [
                'name' => 'Venison',
                'price' => 3500,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'bison' => [
                'name' => 'Bison',
                'price' => 4200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'camel_meat' => [
                'name' => 'Camel Meat',
                'price' => 1800,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],
            'ostrich_meat' => [
                'name' => 'Ostrich Meat',
                'price' => 4500,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'meat'
            ],

            // drinks

            'water' => [
                'name' => 'Water',
                'price' => 50,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'mineral_water' => [
                'name' => 'Mineral Water',
                'price' => 80,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'sparkling_water' => [
                'name' => 'Sparkling Water',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'cola' => [
                'name' => 'Cola',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'can',
                'category_name' => 'drinks'
            ],
            'diet_cola' => [
                'name' => 'Diet Cola',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'can',
                'category_name' => 'drinks'
            ],
            'lemon_lime_soda' => [
                'name' => 'Lemon Lime Soda',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'can',
                'category_name' => 'drinks'
            ],
            'orange_soda' => [
                'name' => 'Orange Soda',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'can',
                'category_name' => 'drinks'
            ],
            'mango_juice' => [
                'name' => 'Mango Juice',
                'price' => 150,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'apple_juice' => [
                'name' => 'Apple Juice',
                'price' => 150,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'orange_juice' => [
                'name' => 'Orange Juice',
                'price' => 150,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'pineapple_juice' => [
                'name' => 'Pineapple Juice',
                'price' => 160,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'grape_juice' => [
                'name' => 'Grape Juice',
                'price' => 160,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'strawberry_juice' => [
                'name' => 'Strawberry Juice',
                'price' => 160,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'energy_drink' => [
                'name' => 'Energy Drink',
                'price' => 200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'can',
                'category_name' => 'drinks'
            ],
            'sports_drink' => [
                'name' => 'Sports Drink',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'iced_tea' => [
                'name' => 'Iced Tea',
                'price' => 140,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'green_tea_cold' => [
                'name' => 'Cold Green Tea',
                'price' => 140,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'drinks'
            ],
            'milk_shake_vanilla' => [
                'name' => 'Vanilla Milk Shake',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'glass',
                'category_name' => 'drinks'
            ],
            'milk_shake_chocolate' => [
                'name' => 'Chocolate Milk Shake',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'glass',
                'category_name' => 'drinks'
            ],
            'lassi_sweet' => [
                'name' => 'Sweet Lassi',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'glass',
                'category_name' => 'drinks'
            ],
            'lassi_salted' => [
                'name' => 'Salted Lassi',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'glass',
                'category_name' => 'drinks'
            ],
            'coffee_cold' => [
                'name' => 'Cold Coffee',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'glass',
                'category_name' => 'drinks'
            ],
            'espresso_cold' => [
                'name' => 'Cold Espresso',
                'price' => 200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'cup',
                'category_name' => 'drinks'
            ],
            'lemonade' => [
                'name' => 'Lemonade',
                'price' => 100,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'glass',
                'category_name' => 'drinks'
            ],

            // grocery

            'rice' => [
                'name' => 'Rice',
                'price' => 280,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'wheat_flour' => [
                'name' => 'Wheat Flour',
                'price' => 160,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'sugar' => [
                'name' => 'Sugar',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'salt' => [
                'name' => 'Salt',
                'price' => 60,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'cooking_oil' => [
                'name' => 'Cooking Oil',
                'price' => 650,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'liter',
                'category_name' => 'grocery'
            ],
            'ghee' => [
                'name' => 'Ghee',
                'price' => 750,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'butter' => [
                'name' => 'Butter',
                'price' => 900,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],
            'eggs' => [
                'name' => 'Eggs',
                'price' => 300,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'dozen',
                'category_name' => 'grocery'
            ],
            'milk' => [
                'name' => 'Milk',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'liter',
                'category_name' => 'grocery'
            ],
            'yogurt' => [
                'name' => 'Yogurt',
                'price' => 200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'cheese' => [
                'name' => 'Cheese',
                'price' => 1200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],
            'tea_leaves' => [
                'name' => 'Tea Leaves',
                'price' => 450,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],
            'coffee' => [
                'name' => 'Coffee',
                'price' => 500,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'jar',
                'category_name' => 'grocery'
            ],
            'pasta' => [
                'name' => 'Pasta',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],
            'noodles' => [
                'name' => 'Noodles',
                'price' => 120,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],
            'spaghetti' => [
                'name' => 'Spaghetti',
                'price' => 250,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],
            'baking_flour' => [
                'name' => 'Baking Flour',
                'price' => 200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'baking_powder' => [
                'name' => 'Baking Powder',
                'price' => 150,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],
            'vinegar' => [
                'name' => 'Vinegar',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'grocery'
            ],
            'soy_sauce' => [
                'name' => 'Soy Sauce',
                'price' => 220,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'grocery'
            ],
            'ketchup' => [
                'name' => 'Ketchup',
                'price' => 200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'grocery'
            ],
            'mayonnaise' => [
                'name' => 'Mayonnaise',
                'price' => 250,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'jar',
                'category_name' => 'grocery'
            ],
            'mustard_sauce' => [
                'name' => 'Mustard Sauce',
                'price' => 180,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'bottle',
                'category_name' => 'grocery'
            ],
            'jam' => [
                'name' => 'Jam',
                'price' => 300,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'jar',
                'category_name' => 'grocery'
            ],
            'honey' => [
                'name' => 'Honey',
                'price' => 600,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'jar',
                'category_name' => 'grocery'
            ],
            'corn_flakes' => [
                'name' => 'Corn Flakes',
                'price' => 450,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],
            'oats' => [
                'name' => 'Oats',
                'price' => 350,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],
            'lentils_masoor' => [
                'name' => 'Masoor Lentils',
                'price' => 260,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'lentils_moong' => [
                'name' => 'Moong Lentils',
                'price' => 280,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'lentils_chana' => [
                'name' => 'Chana Lentils',
                'price' => 240,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'beans_kidney' => [
                'name' => 'Kidney Beans',
                'price' => 320,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'beans_white' => [
                'name' => 'White Beans',
                'price' => 300,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'grocery'
            ],
            'spices_mixed' => [
                'name' => 'Mixed Spices',
                'price' => 500,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],
            'black_pepper' => [
                'name' => 'Black Pepper',
                'price' => 700,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],
            'cinnamon' => [
                'name' => 'Cinnamon',
                'price' => 650,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'pack',
                'category_name' => 'grocery'
            ],

            // seafood


            'fish' => [
                'name' => 'Fish',
                'price' => 900,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'salmon' => [
                'name' => 'Salmon',
                'price' => 2500,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'tuna' => [
                'name' => 'Tuna',
                'price' => 1800,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'prawns' => [
                'name' => 'Prawns',
                'price' => 2200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'shrimp' => [
                'name' => 'Shrimp',
                'price' => 2400,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'crab' => [
                'name' => 'Crab',
                'price' => 2600,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'lobster' => [
                'name' => 'Lobster',
                'price' => 6000,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'piece',
                'category_name' => 'seafood'
            ],
            'squid' => [
                'name' => 'Squid',
                'price' => 1800,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'octopus' => [
                'name' => 'Octopus',
                'price' => 3200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'mussels' => [
                'name' => 'Mussels',
                'price' => 1500,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'oysters' => [
                'name' => 'Oysters',
                'price' => 3500,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'dozen',
                'category_name' => 'seafood'
            ],
            'tilapia' => [
                'name' => 'Tilapia',
                'price' => 850,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'pomfret' => [
                'name' => 'Pomfret',
                'price' => 1600,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'mackerel' => [
                'name' => 'Mackerel',
                'price' => 1100,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'sardines' => [
                'name' => 'Sardines',
                'price' => 700,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'catfish' => [
                'name' => 'Catfish',
                'price' => 950,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'hilsa' => [
                'name' => 'Hilsa Fish',
                'price' => 2800,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'red_snapper' => [
                'name' => 'Red Snapper',
                'price' => 2200,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'king_fish' => [
                'name' => 'King Fish',
                'price' => 2000,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'barramundi' => [
                'name' => 'Barramundi',
                'price' => 1900,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'anchovy' => [
                'name' => 'Anchovy',
                'price' => 600,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ],
            'eel' => [
                'name' => 'Eel',
                'price' => 3000,
                'image_path' => 'assets/web/img/products/',
                'status' => 1,
                'unit' => 'kg',
                'category_name' => 'seafood'
            ]

        ];

        foreach ($products as $key => $product) {
            DB::table('temp_products')->insertOrIgnore([
                'name'       => $product['name'],
                'slug'       => str_replace(' ', '', strtolower($product['name'])),
                'price'      => $product['price'],
                'unit'       => $product['unit'],
                'image_path'      => $product['image_path'] . '/' . $product['category_name'],
                'status'     => $product['status'],
                'category_name' => $product['category_name'],
            ]);
        }
    }
}
