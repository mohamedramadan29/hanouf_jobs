<?php

namespace Database\Seeders;

use App\Models\admin\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class citySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = new City();
        $city->create([
            'name' => 'Alex'
        ]);
        $city->create([
            'name' => 'Cairo'
        ]);
        $city->create([
            'name' => 'Behera'
        ]);
        $city->create([
            'name' => 'tanta'
        ]);
    }
}
