<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CitySeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SettingTableSeeder::class);

    }
}
