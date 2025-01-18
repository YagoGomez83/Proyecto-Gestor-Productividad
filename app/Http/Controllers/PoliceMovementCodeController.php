<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoliceMovementCodeRequest;
use Illuminate\Http\Request;
use App\Services\PoliceMovementCodeService;

class PoliceMovementCodeController extends Controller
{
    protected $policeMovementCodeService;

    public function __construct(PoliceMovementCodeService $service)
    {
        $this->policeMovementCodeService = $service;
    }

    public function index()
    {
        $codes = $this->policeMovementCodeService->getAll();
        return view('policeMovementCodes.index', compact('codes'));
    }

    public function create()
    {
        return view('policeMovementCodes.create');
    }

    public function store(PoliceMovementCodeRequest $request)
    {
        $this->policeMovementCodeService->create($request->validated());
        return redirect()->route('policeMovementCodes.index')->with('success', 'Código creado con éxito.');
    }

    public function edit($id)
    {
        $code = $this->policeMovementCodeService->getById($id);
        return view('policeMovementCodes.edit', compact('code'));
    }

    public function update(PoliceMovementCodeRequest $request, $id)
    {
        $this->policeMovementCodeService->update($request->validated(), $id);
        return redirect()->route('policeMovementCodes.index')->with('success', 'Código actualizado con éxito.');
    }

    public function destroy($id)
    {
        $this->policeMovementCodeService->delete($id);
        return redirect()->route('policeMovementCodes.index')->with('success', 'Código eliminado con éxito.');
    }
}
