<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses_application extends Model
{
    protected $table = 'Courses.courses_application';
    protected $fillable = ['title','course_id','sponsor_status','knowledge_read','knowledge_spoken','knowledge_written','challenges_you_face_1','challenges_you_face_2','challenges_you_face_3','billing_id','cv_file','supporting_file','share_emails'];
    use HasFactory;
}
