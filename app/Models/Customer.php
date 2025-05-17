<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{   
    use HasFactory;
    protected $table='customers';
    protected $primaryKey='customer_id';
    protected $fillable = [
        'name',
        'email',
        'password', 
        'phone',
        'address'
    ];
    protected $hidden=['password'];

    public function laundryOrders(): hasmany
{
    return $this->hasMany(LaundryOrder::class);
}
}

