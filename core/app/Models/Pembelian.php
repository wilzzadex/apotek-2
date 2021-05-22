<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian_obat';
    protected $fillable = [
        'no_faktur',
        'suplier_id',
        'tgl_faktur',
        'pajak',
        'biaya_lain',
        'jenis',
        'jatuh_tempo',
        'user_id',
        'jumlah_tagihan',
        'status_tagihan'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }

    public function suplier()
    {
        return $this->hasOne(Suplier::class, 'id','suplier_id');
    }
}
