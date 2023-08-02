<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStatus extends Model
{
    use HasFactory;

    protected $table = 'courses.courses_application_status';

    protected $fillable = [
        'application_id',
        'status',
        'reference',
        'valid',
        'operator_id',
        'date_time',
    ];
}
