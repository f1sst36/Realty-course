<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class access_usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for($i = 1; $i <= 19; $i++){
            $data[] = [
                'role_id' => 1,
                'section_id' => $i
            ];
        }

        \DB::table('access_users')->insert($data);
    }
}
