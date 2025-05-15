<?php
// app/Models/Admin.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;  // Import Authenticatable
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable  // Extend Authenticatable
{
    use HasFactory, Notifiable;

    // Specify the primary key column if not using the default `id`
    protected $primaryKey = 'admin_id';

    // If the primary key is not auto-incrementing
    public $incrementing = true;

    // Define the fillable fields
    protected $fillable = ['name', 'email', 'password', 'phone', 'address'];

    protected $hidden = ['password'];
}
