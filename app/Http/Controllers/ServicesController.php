<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    // Display a listing of the service.
    public function index()
    {
        $data = Service::all();
        return view('service.index', compact('data'));
    }

    // Show the form for creating a new garage.
    public function create()
    {
        return view('service.create');
    }

    // Store a newly created garage in the database.
    public function store(Request $request)
    {
        $data = new Service([

            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),

        ]);
        $data->save();



        return redirect(route('service.index'))->with('success', 'created successfully.');
    }

    // Display the specified garage.
    public function show($id)
    {
        return view('service.show', compact('garage'));
    }

    // Show the form for editing the specified garage.
    public function edit($id)
    {
        $data = Service::findOrFail($id);

        return response()->json($data);
    }

    // Update the specified garage in the database.
    public function update(Request $request, $id)
    {
        $validatedData = $request->all();
        $data = Service::findOrFail($id);

        $data->update($validatedData);

        return redirect(route('service.index'))->with('success', 'updated successfully.');
    }

    // Remove the specified garage from the database.
    public function destroy($id)
    {
        $data = Service::findOrfail($id);
        $data->delete();

        return redirect(route('service.index'))->with('success', 'deleted successfully.');
    }
}
