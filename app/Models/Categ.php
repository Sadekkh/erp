<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Categ extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'categories';
    protected $fillable = [
        'name_ar', 'name_en'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('category') // Corrected method name for log name
            ->logAll(); // Log all attributes when changes occur
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
