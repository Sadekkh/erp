<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Driver extends Model
{
    use LogsActivity;
    protected $table = 'driver';
    protected $fillable = ['cin', 'name_ar', 'name_en', 'phone'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Garage') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }


    public function maintenanceOrders()
    {
        return $this->hasMany(MaintenanceOrder::class);
    }
}
