<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Media extends Model
{
    use LogsActivity;

    protected $fillable = [
        'file_name',

        'entity_id',
        'entity_type', 'maintenance_orders_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(vehicle::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Garage') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }
}
