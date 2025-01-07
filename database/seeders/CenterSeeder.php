<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Center;

class CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Center::create(['name' => 'CCCSL']);
        Center::create(['name' => 'CCCVM']);
        Center::create(['name' => 'CCCME']);
        Center::create(['name' => 'IGE4.0']);
    }
}
