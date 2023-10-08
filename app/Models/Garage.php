<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Garage extends Model
{
    use LogsActivity;
    protected $table = 'garage';

    protected $fillable = ['number', 'name_ar', 'name_en', 'address_ar', 'address_en', 'rows', 'columns'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function maintenanceOrders()
    {
        return $this->hasMany(MaintenanceOrder::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
    public function requestItems()
    {
        return $this->hasMany(RequestItem::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Garage') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }
}
