<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('order_types')->insert([
            [
                'type' => 'Коммерческая',
            ],
            [
                'type' => 'Некоммерческая',
            ],
        ]);
    }
}
