<?php

namespace App\Repositories;

use App\Models\RegionalUnit;

class RegionalUnitRepository
{
    public function store(array $data)
    {
        RegionalUnit::create($data);
    }

    public function update(int $id, array $data)
    {
        $regionalUnit = $this->find($id);
        $regionalUnit->update($data);
    }

    public function find(int $id)
    {
        return RegionalUnit::findOrFail($id);
    }

    public function delete(int $id)
    {
        $regionalUnit = $this->find($id);
        $regionalUnit->delete();
    }

    public function getAll()
    {
        return RegionalUnit::all();
    }

    public function getRegionalUnitsByCenter(int $centerId)
    {
        return RegionalUnit::where('center_id', $centerId)->get();
    }
}
