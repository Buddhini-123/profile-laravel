<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'membership.coupon_codes';

    protected $fillable = [
        'code',
        'course_id',
        'reference',
        'tag',
        'email',
        'start_date',
        'end_date',
        'is_used',
        'used_date',
        'is_active',
        'membership_start',
        'membership_end',
    ];
}
