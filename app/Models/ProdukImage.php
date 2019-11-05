<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukImage extends Model
{
    protected $table = 'product_images';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'image_path'
    ];
}
