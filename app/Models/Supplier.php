<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Supplier extends Model
{
    use LogsActivity;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Garage') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }
    protected $fillable = ['supplier_name_ar', 'supplier_name_en', 'phone', 'address_ar', 'address_en'];

    public function requestItems()
    {
        return $this->hasMany(RequestItem::class);
    }
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

}
