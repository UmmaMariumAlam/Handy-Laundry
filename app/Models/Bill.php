<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bill extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id',
        'customer_id',
        'laundry_id',
        'payment_method',
        'total_price',
        'status',
    ];
    
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function laundromat(): BelongsTo
    {
        return $this->belongsTo(Laundromat::class, 'laundry_id');
    }
}
