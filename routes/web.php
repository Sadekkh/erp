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
use App\Http\Controllers\MaintenanceOrdersController;
use App\Http\Controllers\MaintenanceTasksController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RequestItemsController;
use App\Http\Controllers\StockTransactionsController;
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
        Route::resource('maintenance', MaintenanceOrdersController::class);
        Route::resource('maintenancetask', MaintenanceTasksController::class);
        Route::resource('stocktransaction', StockTransactionsController::class);
        Route::get('/maintenance-controle', [MaintenanceOrdersController::class, 'car_enter'])->name('maintenance-control');
        Route::get('print-maintenance/{id}', [MaintenanceOrdersController::class, 'print'])->name('print-maintenance');
        Route::post('/maintenance/entry/store', [MaintenanceOrdersController::class, 'entrystore'])->name('maintenance.entry.store');
        Route::get('/getemployee/{id}', [MaintenanceOrdersController::class, 'getemployee']);

        Route::delete('/delete_image/{id}', [ProductsController::class, 'destroyimages'])->name('products.destroyimages');
        Route::get('/suggestions/{id}', [RequestItemsController::class, 'suggestions']);
        Route::get('/print/all', [RequestItemsController::class, 'printall']);
        Route::get('/print/stock', [stockController::class, 'printall']);
        Route::get('/products/qrcode/{id}', [ProductsController::class, 'generateQRCode']);
        Route::get('/print/products', [ProductsController::class, 'print']);
    }
);
