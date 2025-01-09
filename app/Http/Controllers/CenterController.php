<?php

namespace App\Http\Controllers;

use App\Http\Requests\CenterRequest;
use App\Services\CenterService;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    private $centerService;

    public function __construct(CenterService $centerService)
    {
        $this->centerService = $centerService;
    }

    public function index(Request $request)
    {
        $centers = $this->centerService->getAllCenters();
        return view('center.index', compact('centers'));
    }

    public function create()
    {
        return view('center.create');
    }

    public function store(CenterRequest $request)
    {
        $this->centerService->createCenter($request->validated());
        return redirect()->route('centers.index')->with('success', 'Center created successfully');
    }

    public function edit($id)
    {
        $center = $this->centerService->getCenterById($id);
        if (!$center) {
            return redirect()->route('centers.index')->with('error', 'Center not found');
        }
        return view('center.edit', compact('center'));
    }

    public function update(CenterRequest $request, $id)
    {
        $this->centerService->updateCenter($id, $request->validated());
        return redirect()->route('centers.index')->with('success', 'Center updated successfully');
    }

    public function destroy($id)
    {
        $this->centerService->deleteCenter($id);
        return redirect()->route('centers.index')->with('success', 'Center deleted successfully');
    }

    public function showGroups($id)
    {
        $center = $this->centerService->getCenterWithGroups($id);
        if (!$center) {
            return redirect()->route('centers.index')->with('error', 'Center not found');
        }
        return view('center.groups.index', compact('center'));
    }

    public function showRegionalUnits($id)
    {
        $center = $this->centerService->getCenterWithRegionalUnits($id);
        if (!$center) {
            return redirect()->route('centers.index')->with('error', 'Center not found');
        }
        return view('center.Regional_Units.index', compact('center'));
    }
}
