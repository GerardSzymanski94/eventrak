<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'admin',
            'email' => 'g.szymanski@netoholics.net',
            'admin' => 1,
            'password' => Hash::make('123qwe')
        ]);
    }
}
