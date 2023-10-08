<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;

class VehicleTypesController extends Controller
{
    // Display a listing of the vehicle types.
    public function index()
    {
        $data = VehicleType::all();
        return view('vehicle_types.index', compact('data'));
    }

    // Show the form for creating a new vehicle type.
    public function create()
    {
        return view('vehicle_types.create');
    }

    // Store a newly created vehicle type in the database.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
        ]);

        VehicleType::create($validatedData);

        return redirect(route('vehicle_types.index'))->with('success', 'type created successfully.');
    }

    // Display the specified vehicle type.
    public function show(VehicleType $vehicleType)
    {
        return view('vehicle_types.show', compact('vehicleType'));
    }

    // Show the form for editing the specified vehicle type.
    public function edit($id)
    {
        $data = VehicleType::findOrfail($id);
        return response()->json($data);
    }

    // Update the specified vehicle type in the database.
    public function update(Request $request, VehicleType $vehicleType)
    {
        $validatedData = $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
        ]);

        $vehicleType->update($validatedData);

        return redirect(route('vehicle_types.index'))->with('success', 'Vehicle type updated successfully.');
    }

    // Remove the specified vehicle type from the database.
    public function destroy($id)
    {
        $data = VehicleType::fildOrfail($id);
        $data->delete();

        return redirect(route('vehicle_types.index'))->with('success', 'Vehicle type deleted successfully.');
    }
}
