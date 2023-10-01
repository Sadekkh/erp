<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'driver';
    protected $fillable = ['cin', 'name', 'phone', 'address'];

    public function maintenanceOrders()
    {
        return $this->hasMany(MaintenanceOrder::class);
    }
}
