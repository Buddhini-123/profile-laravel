<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'journal.item_list';

    protected $fillable = [
        'id',
        'product_id',
        'description',
        'price',
        'order_id',
        'status',
        'operator',
    ];
}
