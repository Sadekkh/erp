<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\maintenanceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\vehiclesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RequestItemsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\VehicleTypesController;
use Illuminate\Support\Facades\App;
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
    return view('auth.login');
});
Auth::routes();
Route::middleware(['auth'])->group(
    function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');


        Route::get('/change_locale/{locale}', function ($locale) {
            App::setLocale($locale);
            session()->put('locale', $locale);
            return redirect()->back();
        })->name('change_locale');


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

        Route::resource('services', ServicesController::class);
        Route::resource('garages', GarageController::class);
        Route::resource('products', ProductsController::class);
        Route::resource('category', CategoriesController::class);
        Route::resource('suppliers', SuppliersController::class);
        Route::resource('requests', RequestItemsController::class);
        Route::resource('stock', stockController::class);
        Route::resource('vehicle_types', VehicleTypesController::class);
        Route::resource('vehicle', vehiclesController::class);
        Route::resource('driver', DriversController::class);
        Route::resource('employee', EmployeesController::class);
        Route::resource('service', ServicesController::class);
        Route::delete('/delete_image/{id}', [ProductsController::class, 'destroyimages'])->name('products.destroyimages');
        Route::get('/suggestions/{id}', [RequestItemsController::class, 'suggestions']);
        Route::get('/print/all', [RequestItemsController::class, 'printall']);
        Route::get('/print/stock', [stockController::class, 'printall']);
        Route::get('/products/qrcode/{id}', [ProductsController::class, 'generateQRCode']);
        Route::get('/print/products', [ProductsController::class, 'print']);





        // Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        // Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        // Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        // Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        // Route::get('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        // Route::post('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


        // Route::get('/product', [ProductController::class, 'index'])->name('product');
        // Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        // Route::get('/seller/create', [ProductController::class, 'sellerCreate'])->name('seller.create');
        // Route::post('/seller/store', [ProductController::class, 'sellerStore'])->name('seller.store');
        // Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
        // Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        // Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
        // Route::get('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
        // Route::post('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/product/qrcode/{id}', [ProductController::class, 'generateQRCode'])->name('product.qrcode');



        // Route::get('/vehicle', [vehiclesController::class, 'index'])->name('vehicle');
        // Route::get('/vehicletype', [vehiclesController::class, 'vehicletypeindex'])->name('vehicletype');
        // Route::get('/driver', [vehiclesController::class, 'driver'])->name('driver');
        // Route::get('/services', [vehiclesController::class, 'service'])->name('services');
        // Route::get('/employee', [vehiclesController::class, 'employee'])->name('employee');
        // Route::get('/vehicle/create', [vehiclesController::class, 'create'])->name('vehicle.create');
        // Route::post('/vehicletype/store', [vehiclesController::class, 'vehicletypestore'])->name('vehicletype.store');
        // Route::post('/vehicle/store', [vehiclesController::class, 'store'])->name('vehicle.store');
        // Route::post('/driver/store', [vehiclesController::class, 'driverstore'])->name('driver.store');
        // Route::post('/services/store', [vehiclesController::class, 'servicestore'])->name('service.store');
        // Route::post('/employee/store', [vehiclesController::class, 'employeestore'])->name('employee.store');
        // Route::get('/vehicle/edit/{id}', [vehiclesController::class, 'edit'])->name('vehicle.edit');
        // Route::get('/vehicle/update/{id}', [vehiclesController::class, 'update'])->name('vehicle.update');
        // Route::post('/vehicle/destroy/{id}', [vehiclesController::class, 'destroy'])->name('vehicle.destroy');


        Route::get('/maintenance', [maintenanceController::class, 'index'])->name('maintenance');
        Route::get('/maintenance/create', [maintenanceController::class, 'create'])->name('maintenance.create');
        Route::post('/maintenance/store', [maintenanceController::class, 'store'])->name('maintenance.store');
        Route::get('/maintenance/edit/{id}', [maintenanceController::class, 'edit'])->name('maintenance.edit');
        Route::get('/getemployee/{id}', [maintenanceController::class, 'getemployee']);
        Route::post('/maintenance/update/{id}', [maintenanceController::class, 'update'])->name('maintenance.update');
        Route::post('/maintenance/destroy/{id}', [maintenanceController::class, 'destroy'])->name('maintenance.destroy');
    }
);
