<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Center;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $centers = Center::all();

        foreach ($centers as $center) {
            Group::create([
                'name' => 'Grupo A de ' . $center->name,
                'center_id' => $center->id,
            ]);
            Group::create([
                'name' => 'Grupo B de ' . $center->name,
                'center_id' => $center->id,
            ]);
        }
    }
}
