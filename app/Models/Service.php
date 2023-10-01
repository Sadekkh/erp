<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name'];

    public function maintenanceTasks()
    {
        return $this->hasMany(MaintenanceTask::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
