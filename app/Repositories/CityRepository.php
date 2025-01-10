<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository
{
    public function getAllCities()
    {
        return City::with('regionalUnit')
            ->join('regional_units', 'cities.regional_unit_id', '=', 'regional_units.id')
            ->orderBy('regional_units.name')
            ->orderBy('cities.name')
            ->get(['cities.*']); // Select only city columns
    }

    public function getCityById($id)
    {
        return City::find($id);
    }


    public function storeCity($data)
    {
        return City::create($data);
    }

    public function updateCity($id, $data)
    {
        $city = City::find($id);
        $city->update($data);
        return $city;
    }

    public function deleteCity($id)
    {
        return City::destroy($id);
    }

    public function getCitiesByRegionalUnit($regional_unit_id)
    {
        return City::where('regional_unit_id', $regional_unit_id)->get();
    }
}
