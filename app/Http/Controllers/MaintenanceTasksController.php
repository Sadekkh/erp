<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceOrder;
use App\Models\MaintenanceTask;
use App\Models\Service;
use Illuminate\Http\Request;

class MaintenanceTasksController extends Controller
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
        $task = MaintenanceTask::findOrfail($id);
        $data = MaintenanceOrder::with('vehicle')->findOrfail($task->maintenance_order_id);
        $service = Service::all();
        return view('maintenance.edittask', compact('task', 'data', 'service'));
    }

    // Update the specified driver in the database.
    public function update(Request $request, $id)
    {

        $data = MaintenanceTask::findOrfail($id);
        $data->update($request->all());
        return redirect()->route('maintenancetask.index')->with('success', 'updated successfully.');
    }

    // Remove the specified driver from the database.
    public function destroy(MaintenanceTask $id)
    {
        $id->delete();

        return redirect(route('driver.index'))->with('success', 'deleted successfully.');
    }
}
