<?php

use Illuminate\Database\Seeder;

class UsersTabbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'alien',
            'email' => 'alien@gmail.com',
            'password' => bcrypt ('123456'),
        ]);
    }
}
