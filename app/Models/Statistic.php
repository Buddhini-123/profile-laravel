<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $table = 'membership.saved_statistics';

    protected $fillable = [
        'user_id',
        'role_id',
        'title',
        'project',
        'year',
        'order_by',
        'task',
        'status',
        'sql',
        'selection',
        'icon',
        'comment',
    ];
}
