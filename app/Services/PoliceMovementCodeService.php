<?php

namespace App\Services;

use App\Repositories\PoliceMovementCodeRepository;

class PoliceMovementCodeService
{
    protected $policeMovementCodeRepository;
    public function __construct(PoliceMovementCodeRepository $policeMovementCodeRepository)
    {
        $this->policeMovementCodeRepository = $policeMovementCodeRepository;
    }
    public function getAll()
    {
        return $this->policeMovementCodeRepository->getAll();
    }
    public function getById($id)
    {
        return $this->policeMovementCodeRepository->getById($id);
    }
    public function create($data)
    {
        return $this->policeMovementCodeRepository->create($data);
    }
    public function update($data, $id)
    {
        return $this->policeMovementCodeRepository->update($data, $id);
    }
    public function delete($id)
    {
        return $this->policeMovementCodeRepository->delete($id);
    }
}
