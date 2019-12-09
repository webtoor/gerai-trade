<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{

    use Sluggable;
    protected $table = 'blogs';
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'image',
        'user_id',
        'status',
        'dtapproved',
        'created_at',
        'updated_at'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function user(){
        return $this->hasOne('App\Models\User','id', 'user_id') ;
    }
}
