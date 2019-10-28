<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rf_provinsi extends Model
{
    protected $table = 'rf_provinsies';
    public $timestamps = false;

    protected $fillable = [
        'provinsi'
    ];
}
