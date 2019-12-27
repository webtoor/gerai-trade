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
        'ongkir',
        'total_harga',
        'created_at',
        'updated_at',
        'kirim_at'
    ];

    public function transaction_bukti(){
        return $this->hasOne('App\Models\TransactionBukti', 'kode_id', 'kode');
    }

    public function transaction_detail(){
        return $this->hasMany('App\Models\Transaction_detail', 'transaction_id', 'id');
    }

    public function produk_ulasan(){
        return $this->hasMany('App\Models\ProdukUlasan', 'transaction_id', 'id');
    }
    

}
