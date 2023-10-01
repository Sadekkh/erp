<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    protected $fillable = [
        'maintenance_orders_id',
        'vehicule_id', // Updated to 'vehicle_id'
        'product_id',
        'stock_employee_id', // Updated to 'stock_employee_id'
        'employee_id',
        'quantity_taken',
        'signature',
        'transaction_date',
    ];

    public function maintenanceOrder()
    {
        return $this->belongsTo(MaintenanceOrder::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicule_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stockEmployee()
    {
        return $this->belongsTo(Employee::class, 'stock_employee_id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
