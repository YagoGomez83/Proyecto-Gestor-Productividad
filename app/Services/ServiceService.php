<?php

namespace App\Services;

use App\Repositories\ServiceRepository;

class ServiceService
{
    private $serviceRepository;
    public function __construct()
    {
        $this->serviceRepository = new ServiceRepository();
    }

    public function store(array $data)
    {
        $this->serviceRepository->store($data);
    }

    public function update(int $id, array $data)
    {
        $this->serviceRepository->update($id, $data);
    }

    public function find(int $id)
    {
        return $this->serviceRepository->find($id);
    }

    public function delete(int $id)
    {
        $this->serviceRepository->delete($id);
    }

    public function getAll()
    {
        return $this->serviceRepository->getAll();
    }

    public function getAllServiceByUser($userId)
    {
        return $this->serviceRepository->getAllServiceByUser($userId);
    }

    public function getAllServiceByCenter($groupId)
    {
        return $this->serviceRepository->getAllServicesByGroup($groupId);
    }

    public function getAllServiceByStatus($status)
    {
        return $this->serviceRepository->getAllServiceByStatus($status);
    }
}
