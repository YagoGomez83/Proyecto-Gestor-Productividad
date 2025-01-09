<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CityService;
use App\Http\Requests\CityRequest;
use App\Services\RegionalUnitService;

class CityController extends Controller
{

    protected $CityService;
    protected $regionalUnitService;

    public function __construct(CityService $CityService, RegionalUnitService $regionalUnitService)
    {
        $this->CityService = $CityService;
        $this->regionalUnitService = $regionalUnitService;
    }

    public function index()
    {
        $cities = $this->CityService->getAllCities();
        return view('city.index', compact('cities'));
    }
    public function create()
    {
        $regionalUnits = $this->regionalUnitService->getAllRegionalUnits();
        return view('city.create', compact('regionalUnits'));
    }

    public function store(CityRequest $request)
    {
        $this->CityService->createCity($request->validated());
        return redirect()->route('cities.index')->with('success', 'City created successfully');
    }

    public function edit($id)
    {
        $city = $this->CityService->getCityById($id);
        if (!$city) {
            return redirect()->route('cities.index')->with('error', 'City not found');
        }
        $regionalUnits = $this->regionalUnitService->getAllRegionalUnits();
        return view('city.edit', compact('city', 'regionalUnits'));
    }

    public function update($id, CityRequest $request)
    {
        $this->CityService->updateCity($id, $request->validated());
        return redirect()->route('cities.index')->with('success', 'City updated successfully');
    }

    public function destroy($id)
    {
        $this->CityService->deleteCity($id);
        return redirect()->route('cities.index')->with('success', 'City deleted successfully');
    }

    public function showCitiesByRegionalUnit($regionalUnitId)
    {
        $cities = $this->CityService->getCitiesByRegionalUnit($regionalUnitId);
        return view('city.index', compact('cities'));
    }
}
