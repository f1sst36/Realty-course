<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('order_structures')->insert([
            [
                'structure' => 'Склады',
            ],
            [
                'structure' => 'Квартиры',
            ],
            [
                'structure' => 'Офисы',
            ],
            [
                'structure' => 'Ангары',
            ],
            [
                'structure' => 'Комнаты',
            ],
            [
                'structure' => 'Дома',
            ],
        ]);
    }
}
