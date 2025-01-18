<?php
// UserRepository.php
namespace App\Repositories;

use App\Models\City;
use App\Models\User;
use App\Models\Group;
use App\Models\Center;

class UserRepository
{
    public function store(array $data)
    {

        User::create($data);
    }

    public function getUsersByGroup($groupId)
    {
        return User::where('group_id', $groupId)->where('role', 'operator')->where('is_active', true)->get();
    }
    public function getAllusers()
    {
        return User::where('is_active', true)->get();
    }

    public function find($id)
    {
        return User::where('id', $id)->where('is_active', true)->firstOrFail();
    }

    public function update($id, array $data)
    {
        $user = $this->find($id);
        $user->update($data);
    }

    public function delete($id)
    {
        $user = $this->find($id);
        $user->deleteUser();  // Llamar al método deleteUser() en lugar de eliminar físicamente
    }

    //usar los repositorios de cada entidad
    public function getServicesByUser($userId)
    {
        return User::find($userId)->services;
    }

    public function getAllCities()
    {
        return City::all();
    }

    public function getAllGroups()
    {
        return Group::all();
    }

    public function getAllCenters()
    {
        return Center::all();
    }
}
