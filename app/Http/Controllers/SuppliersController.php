<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SuppliersController extends Controller
{
    // Display a listing of the suppliers.
    public function index()
    {
        $data = Supplier::all();
        return view('suppliers.index', compact('data'));
    }

    // Show the form for creating a new supplier.
    public function create()
    {
        return view('suppliers.create');
    }

    // Store a newly created supplier in the database.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'supplier_name_ar' => 'required|string',
            'supplier_name_en' => 'required|string',
            'phone' => 'nullable|string',
            'address_ar' => 'nullable|string',
            'address_en' => 'nullable|string',
        ]);

        Supplier::create($validatedData);

        return redirect(route('suppliers.index'))->with('success', 'created successfully.');
    }

    // Display the specified supplier.
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    // Show the form for editing the specified supplier.
    public function edit($id)
    {
        $data = Supplier::findOrFail($id);

        return response()->json($data);
    }

    // Update the specified supplier in the database.
    public function update(Request $request, Supplier $supplier)
    {
        $validatedData = $request->validate([
            'supplier_name_ar' => 'required|string',
            'supplier_name_en' => 'required|string',
            'phone' => 'nullable|string',
            'address_ar' => 'nullable|string',
            'address_en' => 'nullable|string',
        ]);

        $supplier->update($validatedData);

        return redirect(route('suppliers.index'))->with('success', 'updated successfully.');
    }

    // Remove the specified supplier from the database.
    public function destroy($id)
    {
        $data = Supplier::findOrfail($id);
        $data->delete();

        return redirect(route('suppliers.index'))->with('success', 'deleted successfully.');
    }
}
