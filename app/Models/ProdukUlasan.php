<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukUlasan extends Model
{
    protected $table = 'product_ulasans';

    protected $fillable = [
        'transaction_id',
        'produk_id',
        'user_id',
        'rating',
        'ulasan',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
