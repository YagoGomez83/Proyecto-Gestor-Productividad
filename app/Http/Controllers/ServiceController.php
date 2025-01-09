<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;
use App\Services\ServiceService;

class ServiceController extends Controller
{
    // Constructor único que recibe el servicio
    protected $serviceService;
    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }
    public function store(ServiceRequest $request)
    {
        $this->serviceService->store($request->validated());
        return redirect()->route('services.index')->with('success', 'Service created successfully');
    }

    public function edit($id)
    {
        $service = $this->serviceService->find($id);
        if (!$service) {
            return redirect()->route('services.index')->with('error', 'Service not found');
        }
        return view('services.edit', compact('service'));
    }

    public function update($id, ServiceRequest $request)
    {
        $this->serviceService->update($id, $request->validated());
        return redirect()->route('services.index')->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $this->serviceService->delete($id);
        return redirect()->route('services.index')->with('success', 'Service deleted successfully');
    }
}
