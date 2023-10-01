<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['name', 'model', 'year', 'number_wheels', 'oil_change', 'vehicle_type_id', 'vin', 'mileage'];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function maintenanceOrders()
    {
        return $this->hasMany(MaintenanceOrder::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
