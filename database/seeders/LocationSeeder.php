<?php

namespace Database\Seeders;

use App\models\City;
use App\models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        City::factory()->count(300)->create();
        Country::factory()->count(120)->create();    
    }
}
