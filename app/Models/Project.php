<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'images',
        'url',
        'github_url',
        'technologies',
        'featured',
        'order',
    ];

    protected $casts = [
        'images' => 'array',
        'technologies' => 'array',
        'featured' => 'boolean',
    ];
}
