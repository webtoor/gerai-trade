<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    protected $table = 'transaction_detail';

    protected $fillable = [
        'transaction_id',
        'produk_id',
        'qty',
        'created_at',
        'updated_at'
    ];

    public function produk(){
        return $this->hasMany('App\Models\Produk', 'id', 'produk_id');
    }
}
