<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiskusiDetail extends Model
{
    protected $table = 'diskusi_detail';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'email',
        'pesan',
        'diskusi_id',
        'user_id'
    ];
}
