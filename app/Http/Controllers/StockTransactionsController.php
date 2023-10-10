<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceOrder;
use App\Models\Product;
use Illuminate\Http\Request;

class StockTransactionsController extends Controller
{
    public function index()
    {
        $maintenance = MaintenanceOrder::all();
        $product = Product::all();
        return view('stocktransaction.index', compact('maintenance', 'product'));
    }
}
