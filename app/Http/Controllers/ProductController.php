<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\models\Category;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller
{
    // Show the list of all products
    public function index()
    {
        $product = Product::with('category', 'brand', 'stock')->get();
        return view('management.allstock', compact('product'));
    }

    // Show the form to create a new product
    public function create()
    {
        $brand = Brands::all();
        $category = Category::all();
        return view('management.addprod', compact('brand', 'category'));
    }
    public function sellerCreate()
    {
        $supplier = Supplier::all();

        return view('management.seller', compact('supplier'));
    }

    // Store a newly created product in the database
    public function sellerStore(Request $request)
    {

        try {
            Supplier::create($request->all());
        } catch (Exception $e) {

            return redirect('insert')->with('failed', "الرجاء إعادة المحاولة لاحقا");
        }
        return redirect()->route('seller.create')->with('success', 'Product created successfully');
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'description' => '',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);
        try {
            Product::create($request->all());
        } catch (Exception $e) {

            return redirect('insert')->with('failed', "الرجاء إعادة المحاولة لاحقا");
        }
        return redirect()->route('product.create')->with('success', 'Product created successfully');
    }

    // Show the details of a specific product
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Show the form to edit a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Update the specified product in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    // Delete a specific product from the database
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
    public function generateQRCode($id)
    {
        try {
            // Find the product by its ID
            $product = Stock::findOrFail($id);

            // Generate a QR code with product information
            $response = QrCode::size(200)->generate("Product: {$product->id}, Price: {$product->serial_num}");



            return $response;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error generating QR code: ' . $e->getMessage()], 500);
        }
    }
}
