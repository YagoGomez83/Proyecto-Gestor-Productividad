<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = Group::all();

        foreach ($groups as $group) {
            User::create([
                'name' => 'Operator ' . $group->name,
                'last_name' => 'User',
                'email' => 'operator' . $group->id . '@example.com',
                'password' => Hash::make('password'),
                'role' => UserRole::OPERATOR,
                'group_id' => $group->id,
                'address' => '123 Main St',
                'phone_number' => '555-555-5555',
                'city_id' => $group->center->regionalUnits->first()->cities->first()->id ?? null,
                'is_active' => true,
            ]);

            User::create([
                'name' => 'Supervisor ' . $group->name,
                'last_name' => 'User',
                'email' => 'supervisor' . $group->id . '@example.com',
                'password' => Hash::make('password'),
                'role' => UserRole::SUPERVISOR,
                'group_id' => $group->id,
                'address' => '456 Main St',
                'phone_number' => '555-555-5556',
                'city_id' => $group->center->regionalUnits->first()->cities->first()->id ?? null,
                'is_active' => true,
            ]);

            User::create([
                'name' => 'Coordinator ' . $group->name,
                'last_name' => 'User',
                'email' => 'coordinator' . $group->id . '@example.com',
                'password' => Hash::make('password'),
                'role' => UserRole::COORDINATOR,
                'group_id' => $group->id,
                'address' => '789 Main St',
                'phone_number' => '555-555-5557',
                'city_id' => $group->center->regionalUnits->first()->cities->first()->id ?? null,
                'is_active' => true,
            ]);
        }
    }
}
