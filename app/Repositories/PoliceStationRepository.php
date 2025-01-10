<?php

namespace App\Repositories;

use App\Models\PoliceStation;

class PoliceStationRepository
{

    public function getAll()
    {
        return PoliceStation::all();
    }

    public function getById($id)
    {
        return PoliceStation::find($id);
    }

    public function create($data)
    {
        return PoliceStation::create($data);
    }

    public function update(array $data, $id)
    {

        return PoliceStation::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return PoliceStation::destroy($id);
    }

    public function getPoliceStationByCity($city_id)
    {
        return PoliceStation::where('city_id', $city_id)->get();
    }
}
