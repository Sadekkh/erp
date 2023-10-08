<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class MaintenanceOrder extends Model
{
    use LogsActivity;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Garage') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }
    protected $fillable = ['vehicle_id', 'diagnostic_emp', 'driver_id', 'garage_id', 'status', 'entry_time', 'leaving_time'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function diagnosticEmployee()
    {
        return $this->belongsTo(Employee::class, 'diagnostic_emp');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function garage()
    {
        return $this->belongsTo(Garage::class);
    }

    public function maintenanceTasks()
    {
        return $this->hasMany(MaintenanceTask::class);
    }
}
