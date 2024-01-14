<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json=  File::get('database/data/cities_lite.json');


        $data = json_decode($json);

        foreach ($data as $city) {
            City::create([
                'id'   => $city->city_id,
                'name_ar' => $city->name_ar,
                'name_en' => $city->name_en,
            ]);
        }
    }
}
