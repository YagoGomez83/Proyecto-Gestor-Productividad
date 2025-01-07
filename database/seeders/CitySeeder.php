<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\RegionalUnit;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regionalUnits = RegionalUnit::all();

        foreach ($regionalUnits as $unit) {
            City::create([
                'name' => 'Ciudad Principal ' . $unit->name,
                'regional_unit_id' => $unit->id,
            ]);
            City::create([
                'name' => 'Ciudad Secundaria ' . $unit->name,
                'regional_unit_id' => $unit->id,
            ]);
        }
    }
}
