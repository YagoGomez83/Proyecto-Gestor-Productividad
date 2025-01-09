<?php

namespace App\Services;

use App\Repositories\CityRepository;

class CityService
{
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function getAllCities()
    {
        return $this->cityRepository->getAllCities();
    }

    public function getCityById($cityId)
    {
        return $this->cityRepository->getCityById($cityId);
    }

    public function createCity($data)
    {
        return $this->cityRepository->storeCity($data);
    }

    public function updateCity($cityId, $data)
    {
        return $this->cityRepository->updateCity($cityId, $data);
    }

    public function deleteCity($cityId)
    {
        return $this->cityRepository->deleteCity($cityId);
    }

    public function getCitiesByRegionalUnit($regionalUnitId)
    {
        return $this->cityRepository->getCitiesByRegionalUnit($regionalUnitId);
    }
}
