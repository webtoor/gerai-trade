<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesanDetail extends Model
{
    protected $table = 'pesan_details';
    protected $fillable = [
        'pesan_id',
        'pesan',
        'admin_id',
        'created_at',
        'updated_at'
    ];
}
