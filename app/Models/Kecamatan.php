<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'districts';
    public $timestamps = false;

    protected $fillable = [
        'regency_id','name'
    ];
}
