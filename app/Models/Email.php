<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = 'membership.email_template';

    protected $fillable = [
        'title_identifier',
        'email_identifier',
        'sender_email',
        'type',
        'login',
        'title_eng',
        'title_fre',
        'title_spa',
        'body_eng',
        'body_fre',
        'body_spa',
        'sender_eng',
        'sender_fre',
        'sender_spa',
        'footer_eng',
        'footer_spa',
        'footer_fre',
        'banner',
        'cc',
        'bcc',
        'reply_to',
        'attachment',
        'status',
    ];
}
