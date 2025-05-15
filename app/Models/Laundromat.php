<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Laundromat extends Model
{
    protected $table='laundromat';
    protected $primaryKey='laundromat_id';
    protected $fillable=[
        'laundromat_name',
        'representative_name',
        'business_email',
        'area',
        'operating_hours',
        'phone',
        'address',
        'price_per_item',
        'avg_ratings'
    ];

    protected $casts=[
        'price_per_item'=>'float',
        'avg_ratings'=>'float'
    ];

    public function LaundryOrders():HasMany 
{
    return $this->hasMany(LaundryOrder::class);
}
}
}
