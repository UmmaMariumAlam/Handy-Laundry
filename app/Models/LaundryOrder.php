<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaundryOrder extends Model
{   
    protected $table='laundryorders';
    protected $primaryKey='order_id'; 
    protected $fillable=[
        'customer_id',
        'laundromat_id',
        'laundromat_name',
        'service_type',
        'cloth_type',
        'cloth_qty',
        'special_instructions',
        'last_delivery_date',
        'order_status',
        'item_price',
        'pickup_method'
        ];

    public function customers():BelongsTo
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function laundromats():BelongsTo
    {
        return $this->belongsTo(Laundromat::class,'laundromat_id');
    }
}
