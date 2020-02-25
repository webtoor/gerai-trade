<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    protected $table = 'diskusi';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'email',
        'pesan',
    ];
}
