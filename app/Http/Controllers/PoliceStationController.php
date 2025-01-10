<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoliceStationRequest;
use App\Services\CityService;
use App\Services\PoliceStationService;

class PoliceStationController extends Controller
{
    protected $policeStationService;
    protected $cityService;

    public function __construct(PoliceStationService $policeStationService, CityService $cityService)
    {
        $this->policeStationService = $policeStationService;
        $this->cityService = $cityService;
    }


    public function index()
    {
        $policeStations = $this->policeStationService->getAll();
        $cities = $this->cityService->getAllCities();
        return view('policeStations.index', compact('policeStations', 'cities'));
    }
    public function create()
    {
        $cities = $this->cityService->getAllCities();
        return view('policeStations.create', compact('cities'));
    }

    public function store(PoliceStationRequest $request)
    {
        $this->policeStationService->create($request->validated());
        return redirect()->route('policeStations.index')->with('success', 'Comisaria creada correctamente');
    }

    public function edit($id)
    {
        $policeStation = $this->policeStationService->getById($id);
        if (!$policeStation) {
            return redirect()->route('policeStations.index')->with('error', 'Comisaria no encontrada');
        }
        $cities = $this->cityService->getAllCities();
        return view('policeStations.edit', compact('policeStation', 'cities'));
    }

    public function update($id, PoliceStationRequest $request)
    {
        $data = $request->validated();

        $this->policeStationService->update($data, $id);
        return redirect()->route('policeStations.index')->with('success', 'Comisaria actualizada correctamente');
    }

    public function destroy($id)
    {
        $this->policeStationService->delete($id);
        return redirect()->route('policeStations.index')->with('success', 'Comisaria eliminada correctamente');
    }
}
