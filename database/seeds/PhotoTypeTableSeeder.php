<?php

use Illuminate\Database\Seeder;

class PhotoTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PhotoType::create([
            'name' => 'Elewacje'
        ]);
        \App\PhotoType::create([
            'name' => 'Otoczenie sklepu'
        ]);
        \App\PhotoType::create([
            'name' => 'Wejście do sklepu'
        ]);
        \App\PhotoType::create([
            'name' => 'Półka 1'
        ]);
        \App\PhotoType::create([
            'name' => 'Półka 2'
        ]);
    }
}
