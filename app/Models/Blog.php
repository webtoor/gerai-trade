<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'image',
        'user_id'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
