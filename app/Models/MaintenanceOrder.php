<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceOrder extends Model
{
    protected $fillable = ['vehicle_id', 'diagnostic_emp', 'driver_id', 'status'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function diagnosticEmployee()
    {
        return $this->belongsTo(User::class, 'diagnostic_emp');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function maintenanceTasks()
    {
        return $this->hasMany(MaintenanceTask::class);
    }
}
