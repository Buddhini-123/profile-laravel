<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses.courses';

    protected $fillable = [
        'title',
        'detail',
        'location',
        'start_date',
        'currency',
        'course_fee',
        'residential_package_fee',
        'reference',
        'language',
        'dt_update',
    ];
}
