<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceTask extends Model
{
    protected $fillable = ['maintenance_order_id', 'worker_id', 'service_id', 'status', 'description'];

    public function maintenanceOrder()
    {
        return $this->belongsTo(MaintenanceOrder::class);
    }

    public function worker()
    {
        return $this->belongsTo(Employee::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
