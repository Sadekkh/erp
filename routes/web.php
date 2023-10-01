<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\vehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('menus.main');
});
Route::get('/stocks', function () {
    return view('menus.stock');
});
Route::get('/service', function () {
    return view('menus.service');
});
Route::get('/vehiclelist', function () {
    return view('menus.vehicle');
});
Route::get('/service_employee', function () {
    return view('menus.serv_emp');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::get('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/brands', [BrandController::class, 'index'])->name('brands');
Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands/edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
Route::get('/brands/update/{id}', [BrandController::class, 'update'])->name('brands.update');
Route::post('/brands/destroy/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/seller/create', [ProductController::class, 'sellerCreate'])->name('seller.create');
Route::post('/seller/store', [ProductController::class, 'sellerStore'])->name('seller.store');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
Route::get('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/qrcode/{id}', [ProductController::class, 'generateQRCode'])->name('product.qrcode');

Route::get('/stock', [stockController::class, 'index'])->name('stock');
Route::get('/stock/create', [stockController::class, 'create'])->name('stock.create');
Route::post('/stock/store', [stockController::class, 'store'])->name('stock.store');
Route::get('/stock/stockneed', [stockController::class, 'stockneed'])->name('stock.stockneed');
Route::get('/stock/stockrequest', [stockController::class, 'stockrequest'])->name('stock.stockrequest');
Route::post('/stock/stockrequestStore', [stockController::class, 'stockrequestStore'])->name('stock.request.store');
Route::get('/stock/stockrequestList', [stockController::class, 'stockrequestList'])->name('stock.request.List');
Route::post('/stock/accept/{id}', [stockController::class, 'accept'])->name('stock.request.accept');
Route::post('/stock/refuse/{id}', [stockController::class, 'refuse'])->name('stock.request.refuse');
Route::post('/stock/done/{id}', [stockController::class, 'done'])->name('stock.request.done');
Route::get('/stock/edit/{id}', [stockController::class, 'edit'])->name('stock.edit');
Route::get('/stock/update/{id}', [stockController::class, 'update'])->name('stock.update');
Route::post('/stock/destroy/{id}', [stockController::class, 'destroy'])->name('stock.destroy');


Route::get('/vehicle', [vehicleController::class, 'index'])->name('vehicle');
Route::get('/vehicletype', [vehicleController::class, 'vehicletypeindex'])->name('vehicletype');
Route::get('/driver', [vehicleController::class, 'driver'])->name('driver');
Route::get('/vehicle/create', [vehicleController::class, 'create'])->name('vehicle.create');
Route::post('/vehicletype/store', [vehicleController::class, 'vehicletypestore'])->name('vehicletype.store');
Route::post('/vehicle/store', [vehicleController::class, 'store'])->name('vehicle.store');
Route::post('/driver/store', [vehicleController::class, 'driverstore'])->name('driver.store');
Route::get('/vehicle/edit/{id}', [vehicleController::class, 'edit'])->name('vehicle.edit');
Route::get('/vehicle/update/{id}', [vehicleController::class, 'update'])->name('vehicle.update');
Route::post('/vehicle/destroy/{id}', [vehicleController::class, 'destroy'])->name('vehicle.destroy');
