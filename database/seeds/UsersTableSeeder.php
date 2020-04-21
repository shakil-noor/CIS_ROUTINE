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
            'name' => 'Shakil',
            'username' => 'shakil_noor',
            'email' =>'shakil@gmail.com',
            'password' => bcrypt('123456'),
            'admin_role' => 1,
        ]);
    }
}
