<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    protected $fillable = ['price', 'stocked_quantity', 'used_quantity', 'location', 'serial_num', 'reference', 'purchase_date', 'expiry_date', 'product_id', 'supplier_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stockTransactions()
    {
        return $this->hasMany(StockTransaction::class);
    }
}
