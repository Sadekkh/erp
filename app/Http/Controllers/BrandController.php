<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Models\Brands;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brands::all();
        return view('brands.index', ['brands' => $brands]);
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands',
        ]);

        Brands::create($request->all());

        return redirect()->route('categories')->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $brand = Brands::findOrFail($id);
        return view('brands.edit', ['brand' => $brand]);
    }

    public function update(Request $request, $id)
    {
        $brand = Brands::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:brands,name,' . $brand->id,
        ]);

        $brand->update($request->all());

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully');
    }

    public function destroy($id)
    {
        $brand = Brands::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully');
    }
}
