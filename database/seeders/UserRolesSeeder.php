<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_roles')->insert([
            [
                'title' => 'Администратор',
                'type' => '2',
            ],
            [
                'title' => 'Модератор',
                'type' => '1',
            ],
        ]);
    }
}
