<?php

namespace App\Repositories;

use App\Models\Center;

class CenterRepository
{
    public function getAllCenters()
    {
        return Center::all();
    }

    public function getCenterById($id)
    {
        return Center::find($id);
    }

    public function storeCenter($data)
    {
        return Center::create($data);
    }

    public function updateCenter($id, $data)
    {
        $center = Center::find($id);
        $center->update($data);
        return $center;
    }

    public function deleteCenter($id)
    {
        return Center::destroy($id);
    }

    public function getCenterWithGroups($id)
    {
        return Center::with('groups')->find($id);
    }

    public function getCenterWithRegionalUnits($id)
    {
        return Center::with('regionalUnits')->find($id);
    }
}
