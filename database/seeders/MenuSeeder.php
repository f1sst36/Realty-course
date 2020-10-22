<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menus')->insert([
            [
                'title' => 'Главная',
                'type' => 1,
                'material_id' => 4,
                'slug' => 'glavnaya',
                'order' => 1,
                'homepage' => 1,
            ],
            [
                'title' => 'О компании',
                'type' => 1,
                'material_id' => 3,
                'slug' => 'glavnaya',
                'order' => 1,
                'homepage' => 1,
            ],
            [
                'title' => 'Главная',
                'type' => 0,
                'slug' => 'glavnaya',
                'order' => 1,
                'homepage' => 1,
            ],
            [
                'title' => 'Главная',
                'type' => 0,
                'slug' => 'glavnaya',
                'order' => 1,
                'homepage' => 1,
            ],
            [
                'title' => 'Главная',
                'type' => 0,
                'slug' => 'glavnaya',
                'order' => 1,
                'homepage' => 1,
            ],
            [
                'title' => 'Главная',
                'type' => 0,
                'slug' => 'glavnaya',
                'order' => 1,
                'homepage' => 1,
            ],
            [
                'title' => 'Главная',
                'type' => 0,
                'slug' => 'glavnaya',
                'order' => 1,
                'homepage' => 1,
            ],
        ]);
    }
}
