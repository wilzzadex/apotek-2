<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temp_Pembelian_Obat extends Model
{
    protected $table = 'temp_pembelian_obat';
    protected $fillable = [
        'kode_obat',
        'no_batch',
        'jumlah_obat',
        'unit_id',
        'tgl_exp',
        'harga_beli',
        'diskon',
        'margin_jual',
        'user_id',
    ];

    public function obat()
    {
        return $this->hasOne(Obat::class, 'kode_obat','kode_obat');
    }

    public function unit()
    {
        return $this->hasOne(Unit::class, 'id','unit_id');
    }
}
