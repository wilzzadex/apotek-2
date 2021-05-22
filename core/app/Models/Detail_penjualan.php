<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_penjualan extends Model
{
    protected $table = 'detail_penjualan_obat';

    public function obat()
    {
        return $this->hasOne(Obat::class,'kode_obat','kode_obat');
    }
    public function unit()
    {
        return $this->hasOne(Unit::class,'id','unit_id');
    }
}
