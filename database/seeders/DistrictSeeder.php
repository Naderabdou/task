<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json=  File::get('database/data/districts_lite.json');

        $data = json_decode($json);

        foreach ($data as $district) {
            District::create([
                'city_id' => $district->city_id,
                'name_ar' => $district->name_ar,
                'name_en' => $district->name_en,
            ]);
        }
    }
}
