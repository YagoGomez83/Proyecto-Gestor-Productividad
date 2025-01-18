<?php

namespace App\Repositories;

use App\Models\PoliceMovementCode;
use App\Models\SubPoliceMovementCode;

class PoliceMovementCodeRepository
{

    public function getAll()
    {
        return PoliceMovementCode::all();
    }

    public function getById($id)
    {
        return PoliceMovementCode::find($id);
    }

    public function create($data)
    {
        return PoliceMovementCode::create($data);
    }

    public function update($id, $data)
    {
        $policeMovementCode = PoliceMovementCode::find($id);
        $policeMovementCode->update($data);
        return $policeMovementCode;
    }

    public function delete($id)
    {
        return PoliceMovementCode::destroy($id);
    }
}
