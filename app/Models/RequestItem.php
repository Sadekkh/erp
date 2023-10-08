<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class RequestItem extends Model
{
    use LogsActivity;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Garage') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }
    protected $fillable = [
        'garage_id',
        'product_id',
        'supplier_id',
        'quantity_requested',
        'quantity_given',
        'state',

        'manager_decision',
        'accounts_decision'
    ];

    public function garage()
    {
        return $this->belongsTo(Garage::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function stock()
    {
        return $this->hasMany(stock::class);
    }
}
