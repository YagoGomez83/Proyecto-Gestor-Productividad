<?php

namespace App\Repositories;

use App\Models\Center;
use Illuminate\Support\Facades\DB;

class CenterRepository
{
    public function getAllCenters()
    {
        return Center::where('is_active', true)->get();
    }

    public function getCenterById($id)
    {
        return Center::where('id', $id)->where('is_active', true)->firstOrFail();
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

    public function find($id)
    {
        return Center::where('id', $id)->where('is_active', true)->firstOrFail();
    }

    public function deleteCenter($id)
    {
        return DB::transaction(function () use ($id) {
            $center = $this->find($id);
            $center->is_active = false;
            $result = $center->save();

            if ($result) {
                $center->services()->update(['is_active' => false]);
                $center->groups()->update(['is_active' => false]);
                $center->regionalUnits()->update(['is_active' => false]);
            }

            return $result;
        });
    }

    public function restoreCenter($id)
    {
        return DB::transaction(function () use ($id) {
            $center = $this->find($id);

            // Restaurar el centro
            $center->is_active = true;
            $result = $center->save();

            if ($result) {
                // Restaurar las entidades relacionadas
                $center->services()->update(['is_active' => true]);
                $center->groups()->update(['is_active' => true]);
                $center->regionalUnits()->update(['is_active' => true]);
            }

            return $result;
        });
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
