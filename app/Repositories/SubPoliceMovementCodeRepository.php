<?php

namespace App\Repositories;

use App\Models\SubPoliceMovementCode;

class SubPoliceMovementCodeRepository
{
    public function getAll()
    {
        return SubPoliceMovementCode::all();
    }

    public function getById($id)
    {
        return SubPoliceMovementCode::find($id);
    }

    public function create($data)
    {
        return SubPoliceMovementCode::create($data);
    }

    public function update($id, $data)
    {
        $subPoliceMovementCode = SubPoliceMovementCode::find($id);
        $subPoliceMovementCode->update($data);
        return $subPoliceMovementCode;
    }

    public function delete($id)
    {
        return SubPoliceMovementCode::destroy($id);
    }

    public function getSubPoliceMovementCodesByPoliceMovementCode($police_movement_code_id)
    {
        return SubPoliceMovementCode::where('police_movement_code_id', $police_movement_code_id)->get();
    }
}
