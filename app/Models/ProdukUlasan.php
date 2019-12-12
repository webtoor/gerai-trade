<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukUlasan extends Model
{
    protected $table = 'product_ulasans';

    protected $fillable = [
        'produk_id',
        'user_id',
        'rating',
        'ulasan',
        'created_at',
        'updated_at'
    ];
}
