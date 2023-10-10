<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\Models\Garage;
use App\Models\Media;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ProductsController extends Controller
{
    // Display a listing of the products.
    public function index()
    {
        $category = Category::all();
        $data = Product::with('media')->get();
        return view('products.index', compact('data', 'category'));
    }

    // Show the form for creating a new garage.
    public function create()
    {
        return view('products.create');
    }

    // Store a newly created garage in the database.
    public function store(Request $request)
    {
        $garage = new Product([
            'number' => $request->input('number'),
            'product_name_ar' => $request->input('product_name_ar'),
            'product_name_en' => $request->input('product_name_en'),
            'description_ar' => $request->input('description_ar'),
            'description_en' => $request->input('description_en'),
            'price' => $request->input('price'),
            'tax' => 17,

            'category_id' => $request->input('category_id'),
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
                    'entity_type' => 'product',

                ]);
            }
        }

        return redirect(route('products.index'))->with('success', 'created successfully.');
    }

    // Display the specified garage.
    public function show($id)
    {
        return view('products.show', compact('garage'));
    }

    // Show the form for editing the specified garage.
    public function edit($id)
    {
        $category = Category::all();

        $data = Product::findOrFail($id);
        $images = Media::where('entity_id', $id)->where('entity_type', 'product')->get();
        return view('products.edit', compact('data', 'category', 'images'));
    }

    // Update the specified garage in the database.
    public function update(Request $request, $id)
    {
        $validatedData = $request->all();
        $data = Product::findOrFail($id);

        $data->update($validatedData);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $timestamp = now()->getTimestampMs();

                $uniqueFileName = $timestamp . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/products/'), $uniqueFileName);
                Media::insert([
                    'file_name' => $uniqueFileName,
                    'entity_id' => $id,
                    'entity_type' => 'product',

                ]);
            }
        }
        return redirect(route('products.index'))->with('success', 'updated successfully.');
    }

    // Remove the specified garage from the database.
    public function destroy($id)
    {
        $data = Product::findOrfail($id);
        $data->delete();

        return redirect(route('products.index'))->with('success', 'deleted successfully.');
    }
    public function destroyimages($id)
    {
        $data = Media::findOrfail($id);
        $data->delete();

        return redirect()->back()->with('success', 'deleted successfully.');
    }
    public function generateQRCode($id)
    {
        try {
            // Find the product by its ID
            $product = Product::findOrFail($id);

            // Generate a QR code with product information
            $response = QrCode::size(200)->generate("Product_id: {$product->id}");
            return $response;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error generating QR code: ' . $e->getMessage()], 500);
        }
    }
    public function print()
    {
        $data = Product::with('media')->get();
        return view('products.print', compact('data'));
    }
}
