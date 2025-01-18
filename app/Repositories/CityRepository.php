<?php

namespace App\Repositories;

use App\Models\City;
use Illuminate\Support\Facades\DB;

class CityRepository
{
    public function getAllCities()
    {
        return City::with('regionalUnit')
            ->where('cities.is_active', true)
            ->join('regional_units', 'cities.regional_unit_id', '=', 'regional_units.id')
            ->orderBy('regional_units.name')
            ->orderBy('cities.name')
            ->get(['cities.*']); // Select only city columns
    }

    public function getCityById($id)
    {
        return City::find($id)->where('is_active', true)->firstOrFail();
    }


    public function storeCity($data)
    {
        return City::create($data);
    }

    public function updateCity($id, $data)
    {
        $city = City::find($id)->where('is_active', true)->firstOrFail();
        $city->update($data);
        return $city;
    }

    public function deleteCity($id)
    {
        return DB::transaction(function () use ($id) {
            $city = City::findOrFail($id);
            $city->is_active = false;
            $result = $city->save();

            if ($result) {
                $city->policeStations()->update(['is_active' => false]);
                $city->cameras()->update(['is_active' => false]);
            }

            return $result;
        });
    }

    public function restoreCity($id)
    {
        return DB::transaction(function () use ($id) {
            $city = City::findOrFail($id);
            $city->is_active = true;
            $result = $city->save();

            if ($result) {
                $city->policeStations()->update(['is_active' => true]);
                $city->cameras()->update(['is_active' => true]);
            }

            return $result;
        });
    }

    public function getCitiesByRegionalUnit($regional_unit_id)
    {
        return City::where('regional_unit_id', $regional_unit_id)
            ->where('is_active', true)
            ->get();
    }
}
