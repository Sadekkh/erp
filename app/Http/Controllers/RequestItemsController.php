<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\Product;
use App\Models\RequestItem;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class RequestItemsController extends Controller
{
    // Display a listing of the requests.
    public function index()
    {
        $garage = Garage::all();
        $supplier = Supplier::all();
        $product = Product::all();
        $data = RequestItem::with('garage', 'product', 'supplier')->get();
        return view('requests.index', compact('product', 'supplier', 'data', 'garage'));
    }

    // Show the form for creating a new supplier.
    public function create()
    {
        return view('requests.create');
    }

    // Store a newly created supplier in the database.
    public function store(Request $request)
    {
        $validatedData = $request->all();
        RequestItem::create($validatedData);

        return redirect(route('requests.index'))->with('success', 'created successfully.');
    }

    // Display the specified supplier.
    public function show(Supplier $supplier)
    {
        return view('requests.show', compact('supplier'));
    }

    // Show the form for editing the specified supplier.
    public function edit($id)
    {
        $supplier = Supplier::all();
        $data = RequestItem::with('garage', 'product', 'supplier')->findOrfail($id);
        return view('requests.edit', compact('supplier', 'data'));
    }
    public function suggestions($id)
    {
        $data = Stock::with('supplier')->where('product_id', $id)->orderBy('created_at', 'desc')->limit(5)->get();
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

        return redirect(route('requests.index'))->with('success', 'updated successfully.');
    }

    // Remove the specified supplier from the database.
    public function destroy($id)
    {
        $data = Supplier::findOrfail($id);
        $data->delete();

        return redirect(route('requests.index'))->with('success', 'deleted successfully.');
    }
    public function printall()
    {
        $data = Garage::with('requestItems', 'requestItems.product', 'requestItems.supplier')->whereHas('requestItems', function ($query) {
            $query->selectRaw('id')
                ->where('state',  'confirmed');
        })
            ->get();

        return view('requests.print', compact('data'));
    }
}
