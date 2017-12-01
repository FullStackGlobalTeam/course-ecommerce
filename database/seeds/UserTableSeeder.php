<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Peter',
            'email' => 'peter@monoforms.com',
            'password' =>  bcrypt('password')
        ]);
    }
}
