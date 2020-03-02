<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new \App\City();
        $city->name = "Hà Nội";
        $city->save();
        
        $city = new \App\City();
        $city->name = "Sài Gòn";
        $city->save();
    }
}
