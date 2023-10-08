<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Category extends Model
{
    use LogsActivity;

    protected $fillable = [
        'name_ar', 'name_en'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('category') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }
}
