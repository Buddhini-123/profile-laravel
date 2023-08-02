<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $table = 'membership.membership_campaign';

    protected $fillable = [
        'reference',
        'course_id',
        'campaign_year',
        'title_eng',
        'title_fre',
        'title_spa',
        'description_eng',
        'description_fre',
        'description_spa',
        'service',
        'category_excluded',
        'category_included',
        'promotion_rate',
        'button_eng',
        'button_spa',
        'button_fre',
        'promotion_years',
        'promotion_category',
        'promotion_url',
        'promotion_email',
        'last_update',
        'date_creation',
        'ini_operator',
        'display',
        'campaign_start_date',
        'campaign_end_date',
    ];
}
