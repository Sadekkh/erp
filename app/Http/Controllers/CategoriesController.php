<?php

namespace App\Http\Controllers;

use App\models\Categ;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Display a listing of the category.
    public function index()
    {
        $data = Categ::all();
        return view('category.index', compact('data'));
    }

    // Show the form for creating a new garage.
    public function create()
    {
        return view('category.create');
    }

    // Store a newly created garage in the database.
    public function store(Request $request)
    {
        $data = new Categ([

            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),

        ]);
        $data->save();



        return redirect(route('category.index'))->with('success', 'created successfully.');
    }

    // Display the specified garage.
    public function show($id)
    {
        return view('category.show', compact('garage'));
    }

    // Show the form for editing the specified garage.
    public function edit($id)
    {
        $data = Categ::findOrFail($id);

        return response()->json($data);
    }

    // Update the specified garage in the database.
    public function update(Request $request, $id)
    {
        $validatedData = $request->all();
        $data = Categ::findOrFail($id);

        $data->update($validatedData);

        return redirect(route('category.index'))->with('success', 'updated successfully.');
    }

    // Remove the specified garage from the database.
    public function destroy($id)
    {
        $data = Categ::findOrfail($id);
        $data->delete();

        return redirect(route('category.index'))->with('success', 'deleted successfully.');
    }
}
