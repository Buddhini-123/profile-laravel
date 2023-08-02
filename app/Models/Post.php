<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'membership.post';

    protected $fillable = [
        'type',
        'slug',
        'title',
        'sub_title',
        'content',
        'url',
        'status',
        'dateCreated',
        'image',
    ];
}
