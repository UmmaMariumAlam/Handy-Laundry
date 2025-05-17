<?php

// Review.php (Model)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'review_id';

    protected $fillable = [
        'customer_id',
        'laundromat_id',
        'review',
        'date',
        'ratings_id',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function laundromat(): BelongsTo
    {
        return $this->belongsTo(Laundromat::class, 'laundromat_id');
    }

    public function rating(): BelongsTo
    {
        return $this->belongsTo(Rating::class, 'ratings_id');
    }
}