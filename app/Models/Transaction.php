<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    public $timestamps = true;

    protected $fillable = [
        'kode',
        'user_id',
        'hub_id',
        'alamat_penerima',
        'ekspedisi',
        'service',
        'no_resi',
        'status_id',
        'total_ongkir',
        'total_pembayaran',
        'created_at',
        'updated_at'
    ];

}
