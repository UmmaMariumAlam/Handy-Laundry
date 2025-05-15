<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $table='customer';
    protected $primaryKey='customer_id';
    protected $fillable = [
        'name',
        'email',
        'password', 
        'phone',
        'address'
    ];
    protected $hidden=['password'];

    public function laundry_orders(): HasMany 
{
    return $this->hasMany(Laundry_order::class);
}
}

