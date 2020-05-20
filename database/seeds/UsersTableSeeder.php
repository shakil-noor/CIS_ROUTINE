<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Shakil',
                'username' => 'shakil_noor',
                'email' =>'shakil@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'MD. Jaharul Bablu',
                'username' => 'Bablu',
                'email' =>'bablu@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Nayeema Rahman',
                'username' => 'nayeema_rahman',
                'email' =>'nayeema@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Test Admin',
                'username' => 'admin',
                'email' =>'admin@gmail.com',
                'password' => bcrypt('123456'),
            ]
    ]);

    }
}
