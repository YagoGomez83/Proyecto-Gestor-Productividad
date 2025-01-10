<?php

namespace App\Services;

use App\Repositories\PoliceStationRepository;

class PoliceStationService
{
    protected $policeStationRepository;

    public function __construct(PoliceStationRepository $policeStationRepository)
    {
        $this->policeStationRepository = $policeStationRepository;
    }

    public function getAll()
    {
        return $this->policeStationRepository->getAll();
    }

    public function getById($id)
    {
        return $this->policeStationRepository->getById($id);
    }

    public function create($data)
    {
        return $this->policeStationRepository->create($data);
    }

    public function update($data, $id)
    {

        return $this->policeStationRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->policeStationRepository->delete($id);
    }

    public function getPoliceStationByCity($city_id)
    {
        return $this->policeStationRepository->getPoliceStationByCity($city_id);
    }
}
