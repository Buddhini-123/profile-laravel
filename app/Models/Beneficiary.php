<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $table = 'membership.membership_campaign_beneficiary';

    protected $fillable = [
        'reference_campaign',
        'reference_id',
        'email',
        'date_creation',
        'ini_operator',
        'status',
        'date_completed',
    ];
}
