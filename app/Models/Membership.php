<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $primaryKey = 'membership_id';

    protected $table = 'membership.membership';

    protected $fillable = [
        'membership_id',
        'membership_renewal_type',
        'membership_renewal_category',
        'membership_history',
        'skype',
        'about_yourself',
        'quantity_paper_journal',
        'prop_working_groups',
        'reference',
        'origin',
        'renewal_status',
        'validity_status',
        'payment_source_tag',
        'current_membership_category',
        'share_profile_agreed',
        'membership_status',
        'updated_at',
        'date_creation',
    ];
}
