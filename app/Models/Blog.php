<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    //
        use HasFactory;
    protected $fillable = [
        'admin_id',

        'title',
        'featured_image',
        'order',
        'slug',
        'status',
        'category_id',
        'views',
        'likes',
        'description',
        'reading_time',
        'meta_title',
        'meta_description',
        'img_alt',
        'keywords'

    ];
}
