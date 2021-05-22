<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan_Obat extends Model
{
    protected $table = 'penjualan_obat';

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class,'id','pelanggan_id');
    }
}
