<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'description', 'category_id', 'brand_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function totalQuantity()
    {
        return $this->stock()->selectRaw('product_id,sum(stocked_quantity) as totalstock')->groupBy('product_id');
    }
    public function totalleftQuantity()
    {
        return $this->stock()->selectRaw('product_id,sum(used_quantity ) as totalLeftstock')->groupBy('product_id');
    }
    public function requestItems()
    {
        return $this->hasMany(RequestItem::class);
    }

    public function stockTransactions()
    {
        return $this->hasMany(StockTransaction::class);
    }
}
