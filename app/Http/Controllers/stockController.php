<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\Product;
use App\Models\RequestItem;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;



class stockController extends Controller
{
    public function index()
    {

        $data = Stock::with('product', 'supplier', 'garage')->get();
        return view('stock.index', compact('data'));
    }

    public function show($id)
    {
        $garage = Garage::all();
        $supplier = Supplier::all();
        $product = Product::all();
        $data = RequestItem::findOrfail($id);
        return view('stock.create', compact('product', 'supplier', 'data', 'garage'));
    }
    public function store(Request $request)
    {

        $used_quantity = $request->input('stocked_quantity');
        $req = $request->input('request_id');

        Stock::create($request->all() + ['used_quantity' => $used_quantity] + ['tax' => 17]);
        $data = RequestItem::findOrfail($req);
        $data->quantity_given = $request->input('stocked_quantity');
        $data->state = 'done';

        return redirect()->route('stock.index')->with('success', 'Product created successfully');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->all();
        $data = Stock::finOrfail($id);
        $data->update($validatedData);


        $used_quantity = $request->input('stocked_quantity');
        $req = $request->input('request_id');
        $data = RequestItem::findOrfail($req);
        $data->quantity_given = $request->input('stocked_quantity');
        $data->save();

        return redirect()->route('stock.index')->with('success', 'Product created successfully');
    }
    public function edit($id)
    {
        $garage = Garage::all();
        $supplier = Supplier::all();
        $product = Product::all();
        $data = Stock::findOrfail($id);
        return view('stock.edit', compact('product', 'supplier', 'data', 'garage'));
    }
    public function printall()
    {

        $data = Stock::with('product', 'supplier', 'garage')->get();
        return view('stock.print', compact('data'));
    }
    public function destroy($id)
    {
        $data = Stock::finOrfail($id);
        $data->delete();

        return redirect(route('services.index'))->with('success', 'Service deleted successfully.');
    }
}
// {
//     // Show the list of all products
//     public function index()
//     {
//         $product = Product::with('stock')->all();
//         return view('products.index', compact('product'));
//     }

//     // Show the form to create a new product
//     public function create()
//     {
//         $product = Product::all();
//         $supplier = Supplier::all();

//         return view('management.addstock', compact('product', 'supplier'));
//     }

//     // Store a newly created product in the database
//     public function store(Request $request)
//     {

//         $used_quantity = $request->input('stocked_quantity');

//         Stock::create($request->all() + ['used_quantity' => $used_quantity]);

//         return redirect()->route('stock.create')->with('success', 'Product created successfully');
//     }
//     public function stockneed()
//     {


//         $product = Product::with('category', 'brand', 'totalQuantity', 'totalleftQuantity')
//             ->whereHas('stock', function ($query) {
//                 $query->selectRaw('product_id, sum(used_quantity) as totalLeftstock')
//                     ->groupBy('product_id')
//                     ->havingRaw('totalLeftstock < ?', [100]);
//             })
//             ->get();
//         return view('management.stockneed', compact('product'));
//     }
//     public function stockrequest()
//     {

//         $product = Product::all();
//         $supplier = Supplier::all();

//         return view('management.request', compact('product', 'supplier'));
//     }
//     public function stockrequestStore(Request $request)
//     {
//         RequestItem::create($request->all());

//         return redirect()->route('stock.stockrequest')->with('success', 'Product created successfully');
//     }
//     public function stockrequestList()
//     {
//         $product = RequestItem::with('product', 'supplier')->get();
//         return view('management.stockrequestList', compact('product'));
//     }
//     public function accept($id)
//     {
//         $product = RequestItem::findOrFail($id);

//         $product->state = "confirmed";
//         $product->save();
//         return redirect()->route('stock.request.List')->with('success', 'Product created successfully');
//     }
//     public function refuse($id)
//     {
//         $product = RequestItem::findorfail($id);
//         $product->state = "cancelled";
//         $product->save();
//         return view('management.stockrequestList', compact('product'));
//     }
//     public function done($id)
//     {
//         $product = RequestItem::findorfail($id);
//         $product->state = "done";
//         return view('management.stockrequestList', compact('product'));
//     }

//     public function show($id)
//     {
//         $product = Product::findOrFail($id);
//         return view('products.show', compact('product'));
//     }

//     // Show the form to edit a product
//     public function edit($id)
//     {
//         $product = Product::findOrFail($id);
//         return view('products.edit', compact('product'));
//     }

//     // Update the specified product in the database
//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'product_name' => 'required|string',
//             'description' => 'nullable|string',
//             'category_id' => 'required|exists:categories,id',
//             'brand_id' => 'required|exists:brands,id',
//         ]);

//         $product = Product::findOrFail($id);
//         $product->update($request->all());

//         return redirect()->route('products.index')->with('success', 'Product updated successfully');
//     }

//     // Delete a specific product from the database
//     public function destroy($id)
//     {
//         $product = Product::findOrFail($id);
//         $product->delete();

//         return redirect()->route('products.index')->with('success', 'Product deleted successfully');
//     }
// }
