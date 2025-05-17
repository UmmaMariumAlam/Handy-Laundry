<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Laundromat extends Authenticatable
{
    use HasFactory;
    protected $table='laundromats';
    protected $primaryKey='laundromat_id';
    protected $fillable=[
        'laundromat_name',
        'representative_name',
        'business_email',
        'password',
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

    public function Orders():HasMany 
{
    return $this->hasMany(Order::class);

}
public function reviews()
{
    return $this->hasMany(Review::class, 'laundromat_id');
}

}
