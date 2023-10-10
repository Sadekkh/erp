<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Vehicle extends Model
{
    use LogsActivity;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Garage') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }
    protected $fillable = ['model', 'year', 'number_wheels', 'oil_change', 'vehicle_type_id', 'vin', 'mileage', 'last_check', 'next_check'];

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
        return $this->morphMany(Media::class, 'entity');
    }
}
