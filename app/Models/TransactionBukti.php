<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionBukti extends Model
{
    protected $table = 'transaction_bukti';
    public $timestamps = true;

    protected $fillable = [
        'kode_id',
        'img_path',
        'jumlah_transfer',
        'nama_bank',
        'nama_pengirim',
        'status',
        'created_at',
        'updated_at'
    ];

    public function transaction(){
        return $this->hasMany('App\Models\Transaction', 'kode', 'kode_id');
    }
}
