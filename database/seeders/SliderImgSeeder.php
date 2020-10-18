<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SliderImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('slider_imgs')->insert([
            [
                'path' => 'img/slider/1592565938OKGcFOs6in.jpg',
            ],
            [
                'path' => 'img/slider/1592565938ou6V8tzirB.jpg',
            ],
            [
                'path' => 'img/slider/1592813662P2d74sY5Lc.jpg',
            ],
        ]);
    }
}
