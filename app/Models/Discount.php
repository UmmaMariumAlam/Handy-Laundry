<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    // Define the table name (optional if it’s not the plural form of the model name)
    protected $table = 'discount'; 
     protected $primaryKey = 'discount_id';
    // Allow mass assignment for these fields
    protected $fillable = [
        'code', 'expiry_date', 'discount_rate', 'min_order_price',
    ];
}
