<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelurahanDesa extends Model
{
    protected $table = 'villages';
    public $timestamps = false;

    protected $fillable = [
        'district_id','name'
    ];
}
