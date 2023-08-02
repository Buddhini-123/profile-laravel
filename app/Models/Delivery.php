<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'identity.address';
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'postal_code',
        'city',
        'state',
        'country',
        'is_default',
    ];
}
