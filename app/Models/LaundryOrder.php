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

    public function laundromat():BelongsTo
    {
        return $this->belongsTo(Laundromat::class,'laundromat_id');
    }
    protected $appends = ['total_amount'];

    public function getTotalAmountAttribute()
    {
        return $this->cloth_qty * $this->item_price;
    }

    protected $casts = ['cloth_qty'=>'integer',
        'item_price'=>'float'
    ];
    public function scopePending($query)
    {
        return $query->where('order_status','pending');
    }

    public function scopeProcessing($query)
    {
        return $query->where('order_status','processing');
    }

    public function scopeCompleted($query)
    {
        return $query->where('order_status','complete');
    }
}
