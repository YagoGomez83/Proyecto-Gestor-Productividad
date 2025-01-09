<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository
{

    public function store(array $data)
    {
        Service::create($data);
    }

    public function update(int $id, array $data)
    {
        $service = $this->find($id);
        $service->update($data);
    }

    public function find(int $id)
    {
        return Service::findOrFail($id);
    }

    public function delete(int $id)
    {
        $service = $this->find($id);
        $service->delete();
    }

    public function getAll()
    {
        return Service::all();
    }

    public function getAllServiceByUser($userId)
    {
        return Service::where('user_id', $userId)->get();
    }

    public function getAllServicesByGroup($groupId)
    {
        return Service::where('group_id', $groupId)->get();
    }

    public function getAllServiceByStatus($status)
    {
        return Service::where('status', $status)->get();
    }
}
