<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RegionalUnit;
use App\Models\Center;

class RegionalUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $centers = Center::all();

        foreach ($centers as $center) {
            RegionalUnit::create([
                'name' => 'Unidad Regional ' . $center->name,
                'center_id' => $center->id,
            ]);
        }
    }
}
