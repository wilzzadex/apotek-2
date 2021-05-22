<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Satuan_Obat extends Model
{
    protected $table = 'satuan_obat';
    protected $fillable = [
        'kode_obat',
        'unit_id',
        'unit_id_sama_dengan',
        'jumlah_satuan',
        'stok',
        'harga_jual',
    ];


    public function unit()
    {
        return $this->hasOne(Unit::class, 'id','unit_id');
    }

    public function satuanParent()
    {
        return $this->hasOne(Satuan_Obat::class, 'unit_id' ,'unit_id_sama_dengan');
    }

    public function obat()
    {
        return $this->hasOne(Obat::class, 'kode_obat' ,'kode_obat');
    }

    // public function sama_dengan()
    // {
    //     return $this->hasOne( 'id' ,'sama_dengan');
    // }
}
