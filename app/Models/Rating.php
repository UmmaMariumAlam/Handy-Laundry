<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'ratings';

    // Primary key column (if different from 'id')
    protected $primaryKey = 'rating_id';

    // Fields that are mass assignable
    protected $fillable = [
        'customer_id',
        'laundromat_id',
        'ratings',
    ];

    // Relationships

    // A rating belongs to a customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    // A rating belongs to a laundromat
    public function laundromat()
    {
        return $this->belongsTo(Laundromat::class, 'laundromat_id');
    }
}
