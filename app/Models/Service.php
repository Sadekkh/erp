<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Service extends Model
{
    use LogsActivity;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Garage') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }
    protected $fillable = ['name_ar', 'name_en'];

    public function maintenanceTasks()
    {
        return $this->hasMany(MaintenanceTask::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
