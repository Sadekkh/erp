<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class vehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Vehicle::with('vehicleType')->get();
        $vehicletype = VehicleType::all();
        return view('services.vehicle.vehicle', compact('types', 'vehicletype'));
    }
    public function vehicletypeindex()
    {
        $types = VehicleType::all();
        return view('services.vehicle.vehicletype', compact('types'));
    }
    public function driver()
    {
        $driver = Driver::all();
        return view('services.vehicle.driver', compact('driver'));
    }
    public function service()
    {
        $service = Service::all();
        return view('services.vehicle.service', compact('service'));
    }
    public function employee()
    {
        $service = Service::all();
        $employee = Employee::with('service')->get();
        return view('services.vehicle.employee', compact('employee', 'service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Vehicle::create($request->all());

        return redirect()->route('vehicle')->with('success', 'Product created successfully');
    }
    public function vehicletypestore(Request $request)
    {
        VehicleType::create($request->all());

        return redirect()->route('vehicletype')->with('success', 'Product created successfully');
    }
    public function driverstore(Request $request)
    {
        Driver::create($request->all());

        return redirect()->route('driver')->with('success', 'Product created successfully');
    }
    public function servicestore(Request $request)
    {
        Service::create($request->all());

        return redirect()->route('services')->with('success', 'Product created successfully');
    }
    public function employeestore(Request $request)
    {
        Employee::create($request->all());

        return redirect()->route('employee')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
