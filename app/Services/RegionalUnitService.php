<?php

namespace App\Services;

use App\Repositories\RegionalUnitRepository;

class RegionalUnitService
{
    protected $regionalUnitRepository;

    public function __construct(RegionalUnitRepository $regionalUnitRepository)
    {
        $this->regionalUnitRepository = $regionalUnitRepository;
    }

    public function getAllRegionalUnits()
    {
        return $this->regionalUnitRepository->getAll();
    }

    public function getRegionalUnitsByCenter($centerId)
    {
        return $this->regionalUnitRepository->getRegionalUnitsByCenter($centerId);
    }

    public function getRegionalUnitById($regionalUnitId)
    {
        return $this->regionalUnitRepository->find($regionalUnitId);
    }

    public function createRegionalUnit($data)
    {
        $this->regionalUnitRepository->store($data);
    }

    public function updateRegionalUnit($regionalUnitId, $data)
    {
        $this->regionalUnitRepository->update($regionalUnitId, $data);
    }

    public function deleteRegionalUnit($regionalUnitId)
    {
        $this->regionalUnitRepository->delete($regionalUnitId);
    }
}
