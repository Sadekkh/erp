<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Employee;
use App\Models\MaintenanceOrder;
use App\Models\MaintenanceTask;
use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class maintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicle = Vehicle::all();
        $driver = Driver::all();
        return view('maintenance.entry', compact('vehicle', 'driver'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicle = Vehicle::with('maintenanceOrders')->whereHas('maintenanceOrders', function ($query) {
            $query->selectRaw('id')
                ->where('status', 'pending');
        })
            ->get();
        return view('maintenance.diagnostic', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        MaintenanceOrder::create($request->all());
        return redirect()->route('maintenance')->with('success', 'created successfully');
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
        $vehicle = Vehicle::with('maintenanceOrders')->whereHas('maintenanceOrders', function ($query) {
            $query->selectRaw('id')
                ->where('status', '!=', 'complet');
        })
            ->get();
        $data = Vehicle::findOrfail($id);
        $main = MaintenanceOrder::where('vehicle_id', $id)->where('status', '!=', 'complet')->get();
        $service = Service::all();
        $tasks = MaintenanceOrder::with('maintenanceTasks.worker', 'maintenanceTasks.service')->where('id', $id)->get();
        return view('maintenance.diagnostic2', compact('vehicle', 'data', 'main', 'service'));
    }
    public function getemployee(string $id)
    {
        $employee = Employee::where('service_id', $id)->get();
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicle_id = $request->input('vehicle_id');
        $mileage = $request->input('mileage');
        $service_id = $request->input('service_id');
        $employee_id = $request->input('employee_id');
        $desc = $request->input('description');
        $v = Vehicle::findOrfail($vehicle_id);
        $v->mileage = $mileage;
        $v->save();
        $order = MaintenanceOrder::findOrfail($id);
        $order->status = 'in_progress';
        $order->save();
        MaintenanceTask::create(['maintenance_order_id' => $id, 'worker_id' => $employee_id, 'service_id' => $service_id, 'description' => $desc]);
        return redirect()->back()->with('success', 'created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
