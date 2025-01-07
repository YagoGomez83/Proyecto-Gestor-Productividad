<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionalUnitRequest;
use App\Services\RegionalUnitService;


class RegionalUnitController extends Controller
{
    protected $regionalUnitService;

    public function __construct(RegionalUnitService $regionalUnitService)
    {
        $this->regionalUnitService = $regionalUnitService;
    }

    public function index()
    {
        $regionalUnits = $this->regionalUnitService->getAllRegionalUnits();
        return view('regional_units.index', compact('regionalUnits'));
    }

    public function create()
    {

        return view('regional_units.create');
    }

    public function store(RegionalUnitRequest $request)
    {
        $this->regionalUnitService->createRegionalUnit($request->validated());
        return redirect()->route('regional_units.index')->with('success', 'Regional Unit created successfully.');
    }

    public function edit($id)
    {
        $regionalUnit = $this->regionalUnitService->getRegionalUnitById($id);
        if (!$regionalUnit) {
            return redirect()->route('regional_units.index')->with('error', 'Regional Unit not found.');
        }
        return view('regional_units.edit', compact('regionalUnit'));
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
