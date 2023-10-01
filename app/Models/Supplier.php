<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['supplier_name', 'contact_info'];

    public function requestItems()
    {
        return $this->hasMany(RequestItem::class);
    }
}
