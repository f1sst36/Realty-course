<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'name' => 'admin',
                'phone' => '000',
                //'email' => 'admin@mail.ru',
                'password' => 'admin',
                'role_id' => '1',
                'created_at' => date('Y-m-d H:i:s', time() + 3 * 3600),
            ],
            [
                'name' => 'moderator',
                'phone' => '000',
                //'email' => 'moderator@mail.ru',
                'password' => 'moderator',
                'role_id' => '2',
                'created_at' => date('Y-m-d H:i:s', time() + 3 * 3600),
            ],
        ]);
    }
}
