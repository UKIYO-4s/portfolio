<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'category',
        'featured',
        'order',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];
}
