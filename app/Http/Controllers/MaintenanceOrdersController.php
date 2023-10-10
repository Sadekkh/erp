<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Employee;
use App\Models\MaintenanceOrder;
use App\Models\MaintenanceTask;
use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class MaintenanceOrdersController extends Controller
{
    public function index()
    {
        $data = MaintenanceOrder::with('vehicle', 'garage', 'driver')->get();

        return view('maintenance.index', compact('data'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->all();

        MaintenanceOrder::create($validatedData);

        return redirect(route('driver.index'))->with('success', 'created successfully.');
    }

    // Display the specified driver.
    public function show($id)
    {
        $data = MaintenanceOrder::with('vehicle', 'garage', 'driver')->findOrfail($id);
        $service = Service::all();

        return view('maintenance.show', compact('driver'));
    }

    // Show the form for editing the specified driver.
    public function edit($id)
    {
        $data = MaintenanceOrder::with('vehicle', 'garage', 'maintenanceTasks', 'maintenanceTasks.worker', 'maintenanceTasks.service')->findOrfail($id);
        $service = Service::all();
        return view('maintenance.show', compact('data', 'service'));
    }

    // Update the specified driver in the database.
    public function update(Request $request, $id)
    {

        $mileage = $request->input('mileage');
        $service = $request->input('service_id');
        $employee = $request->input('employee_id');

        MaintenanceTask::create([
            "maintenance_order_id" => $id,
            "worker_id" => $employee,
            "service_id" => $service
        ]);
        $v = MaintenanceOrder::findOrfail($id);
        $s = Vehicle::findOrfail($v);
        $s->mileage = $mileage;
        $s->save();
        return redirect()->back()->with('success', 'updated successfully.');
    }

    // Remove the specified driver from the database.
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect(route('driver.index'))->with('success', 'deleted successfully.');
    }
    public function car_enter()
    {
        $vehicle = Vehicle::all();
        $driver = Driver::all();

        return view('maintenance.entry', compact('vehicle', 'driver'));
    }


    public function entrystore(Request $request)
    {
        $data = $request->all();
        MaintenanceOrder::create($data + ["garage_id" => Auth::user()->garage_id]);
        return redirect()->route('maintenance-control');
    }
    public function getemployee(string $id)
    {
        $employee = Employee::where('service_id', $id)->get();
        return response()->json($employee);
    }
    public function print($id)
    {
        $data = MaintenanceOrder::with('vehicle', 'garage', 'driver')->findOrfail($id);
        $qr = QrCode::size(200)->generate("maintenanceOrder: {$data->id}");
        return view('maintenance.print', compact('data', 'qr'));
    }
}
