<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['vehicle_id', 'filename'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
