<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;



class Product extends Model
{
    use LogsActivity;

    protected $fillable = ['product_name_ar', 'product_name_en', 'description_ar', 'description_en', 'price', 'tax', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Categ::class);
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
    public function media()
    {
        return $this->hasMany(Media::class, 'entity_id')->where('entity_type', 'product');
    }


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Product') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }
}
