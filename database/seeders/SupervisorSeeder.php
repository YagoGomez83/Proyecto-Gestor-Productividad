<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run(): void
    {
        // Obtener el grupo y ciudad relacionados
        $group = Group::where('name', 'Grupo-A-CCCSL')->first();
        $city = City::where('name', 'San Luis')->first();

        // Validar que el grupo y la ciudad existan
        if (!$group || !$city) {
            $this->command->error('El grupo o la ciudad no existen. Asegúrate de haber ejecutado los seeders de grupos y ciudades.');
            return;
        }

        // Crear el usuario
        User::create([
            'name' => 'Supervisor',
            'last_name' => 'Prueba',
            'email' => 'supervisor@example.com',
            'password' => Hash::make('password'), // Contraseña encriptada
            'role' => 'supervisor', // Rol asignado
            'group_id' => $group->id, // Grupo relacionado
            'city_id' => $city->id, // Ciudad relacionada
            'address' => 'Dirección de ejemplo',
            'phone_number' => '123456789',
        ]);

        $this->command->info('Usuario Supervisor creado exitosamente.');
    }
}
