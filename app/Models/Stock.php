<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Stock extends Model
{
    use LogsActivity;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Garage') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }
    protected $table = 'stock';
    protected $fillable = ['garage_id', 'product_id', 'supplier_id', 'request_id', 'price', 'tax', 'stocked_quantity', 'used_quantity', 'serial_num', 'rows', 'columns', 'reference', 'purchase_date', 'expiry_date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function garage()
    {
        return $this->belongsTo(garage::class);
    }

    public function requested()
    {
        return $this->belongsTo(RequestItem::class);
    }

    public function stockTransactions()
    {
        return $this->hasMany(StockTransaction::class);
    }
}
