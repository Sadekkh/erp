<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Employee extends Model
{
    use LogsActivity;
    protected $table = 'employees';

    protected $fillable = ['name_ar', 'name_en', 'phone', 'cin', 'service_id', 'garage_id'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Garage') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function garage()
    {
        return $this->belongsTo(Garage::class);
    }

    public function maintenanceOrders()
    {
        return $this->hasMany(MaintenanceOrder::class, 'diagnostic_emp');
    }

    public function maintenanceTasks()
    {
        return $this->hasMany(MaintenanceTask::class, 'worker_id');
    }
}
