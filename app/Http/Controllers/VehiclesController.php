<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleType;

class VehiclesController extends Controller
{
    // Display a listing of the vehicles.
    public function index()
    {
        $data = Vehicle::with('vehicleType')->get();
        $vehicleTypes = VehicleType::all();
        return view('vehicles.index', compact('data', 'vehicleTypes'));
    }

    // Show the form for creating a new vehicle.
    public function create()
    {
        $vehicleTypes = VehicleType::all();
        return view('vehicles.create', compact('vehicleTypes'));
    }

    // Store a newly created vehicle in the database.
    public function store(Request $request)
    {

        $garage = new Vehicle([
            'vehicle_type_id' => $request->input('vehicle_type_id'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'number_wheels' => $request->input('number_wheels'),
            'oil_change' => $request->input('oil_change'),
            'vin' => $request->input('vin'),
            'mileage' => $request->input('mileage'),

        ]);
        $garage->save();


        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $timestamp = now()->getTimestampMs();

                // Create a unique filename using the timestamp
                $uniqueFileName = $timestamp . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/products/'), $uniqueFileName);
                Media::insert([
                    'file_name' => $uniqueFileName,
                    'entity_id' => $garage->id,
                    'entity_type' => 'vehicle',

                ]);
            }
        }
        return redirect(route('vehicle.index'))->with('success', 'Vehicle created successfully.');
    }

    // Display the specified vehicle.
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    // Show the form for editing the specified vehicle.
    public function edit($id)
    {
        $vehicletype = VehicleType::all();

        $data = Vehicle::findOrFail($id);
        $images = Media::where('entity_id', $id)->where('entity_type', 'vehicle')->get();
        return view('vehicles.edit', compact('data', 'vehicletype', 'images'));
    }

    // Update the specified vehicle in the database.
    public function update(Request $request, $id)
    {
        $validatedData = $request->all();
        $data = Vehicle::findOrFail($id);

        $data->update($validatedData);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $timestamp = now()->getTimestampMs();

                $uniqueFileName = $timestamp . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/products/'), $uniqueFileName);
                Media::insert([
                    'file_name' => $uniqueFileName,
                    'entity_id' => $id,
                    'entity_type' => 'vehicle',

                ]);
            }
        }
        return redirect(route('vehicle.index'))->with('success', 'Vehicle updated successfully.');
    }

    // Remove the specified vehicle from the database.
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect(route('vehicle.index'))->with('success', 'Vehicle deleted successfully.');
    }
}
