<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubPoliceMovementCodeService;

class SubPoliceMovementCodeController extends Controller
{
    protected $subPoliceMovementCodeService;

    public function __construct(SubPoliceMovementCodeService $service)
    {
        $this->subPoliceMovementCodeService = $service;
    }

    public function index($policeMovementCodeId)
    {
        $subCodes = $this->subPoliceMovementCodeService->getSubPoliceMovementCodesByPoliceMovementCode($policeMovementCodeId);

        return view('subPoliceMovementCodes.index', compact('subCodes',    'policeMovementCodeId'));
    }


    public function create($policeMovementCodeId)
    {
        return view('subPoliceMovementCodes.create', compact('policeMovementCodeId'));
    }


    public function store(Request $request)
    {
        $subCode = $this->subPoliceMovementCodeService->create($request->all());
        return redirect()->route('subPoliceMovementCodes.index', ['policeMovementCode' => $subCode->police_movement_code_id])
            ->with('success', 'Subcódigo creado con éxito.');
    }

    public function edit($id)
    {
        $subCode = $this->subPoliceMovementCodeService->getById($id);

        return view('subPoliceMovementCodes.edit', compact('subCode'));
    }

    public function update(Request $request, $id)
    {
        // Recuperar el subcódigo existente con el ID
        $subCode = $this->subPoliceMovementCodeService->getById($id);

        // Actualizar los datos del subcódigo
        $this->subPoliceMovementCodeService->update($id, $request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->route('subPoliceMovementCodes.index', ['policeMovementCode' => $subCode->police_movement_code_id])
            ->with('success', 'Subcódigo actualizado con éxito.');
    }



    public function destroy($id)
    {
        $subCode = $this->subPoliceMovementCodeService->getById($id);
        $this->subPoliceMovementCodeService->delete($id);
        return redirect()->route('subPoliceMovementCodes.index', ['policeMovementCode' => $subCode->police_movement_code_id])->with('success', 'Subcódigo eliminado con éxito.');
    }
}
