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
        'produk_id'
    ];


    public function diskusi_detail(){
        return $this->hasMany('App\Models\DiskusiDetail', 'diskusi_id', 'id');
    }
}
