<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionalUnitRequest;
use App\Services\CenterService;
use App\Services\RegionalUnitService;


class RegionalUnitController extends Controller
{
    protected $regionalUnitService;
    protected $centerService;

    public function __construct(RegionalUnitService $regionalUnitService, CenterService $centerService)
    {
        $this->regionalUnitService = $regionalUnitService;
        $this->centerService = $centerService;
    }

    public function index()
    {
        $regionalUnits = $this->regionalUnitService->getAllRegionalUnits();
        return view('regional_units.index', compact('regionalUnits'));
    }

    public function create()
    {
        $centers = $this->centerService->getAllCenters();

        return view('regional_units.create', compact('centers'));
    }

    public function store(RegionalUnitRequest $request)
    {
        $this->regionalUnitService->createRegionalUnit($request->validated());
        return redirect()->route('regional_units.index')->with('success', 'Regional Unit created successfully.');
    }

    public function edit($id)
    {
        $centers = $this->centerService->getAllCenters();
        $regionalUnit = $this->regionalUnitService->getRegionalUnitById($id);
        if (!$regionalUnit) {
            return redirect()->route('regional_units.index')->with('error', 'Regional Unit not found.');
        }
        return view('regional_units.edit', compact('regionalUnit', 'centers'));
    }

    public function update(RegionalUnitRequest $request, $id)
    {
        $this->regionalUnitService->updateRegionalUnit($id, $request->validated());
        return redirect()->route('regional_units.index')->with('success', 'Regional Unit updated successfully.');
    }

    public function destroy($id)
    {
        $this->regionalUnitService->deleteRegionalUnit($id);
        return redirect()->route('regional_units.index')->with('success', 'Regional Unit deleted successfully.');
    }
}
