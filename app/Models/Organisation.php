<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $table = 'identity.organizations';
    use HasFactory;

    protected $fillable = [
        'account_name',
        'phone',
        'ceo',
        'type',
        'website',
        'geographic_area_of _nterest',
        'cautions',
        'description',
        'primary_contact',
        'common_area_of_interest',
        'billing_country',
        'billing_street',
        'billing_city',
        'billing_state',
        'billing_postal_code',
    ];
}
