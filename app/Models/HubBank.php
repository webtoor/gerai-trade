<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HubBank extends Model
{
    protected $table = 'hub_bank';
    public $timestamps = true;

    protected $fillable = [
        'hub_id',
        'nama_bank',
        'pemilik_rekening',
        'no_rekening'
    ];

}
