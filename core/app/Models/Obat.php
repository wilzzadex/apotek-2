<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'stok_minimum',
        'kategori_id',
        'golongan_id',
        'harga_jual',
        'keterangan',
    ];

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id','kategori_id');
    }
    public function golongan()
    {
        return $this->hasOne(Golongan::class, 'id','golongan_id');
    }
    public function details(){
    	return $this->hasMany(Detail_pembelian::class,'kode_obat','kode_obat');
    }
    public function satuans(){
    	return $this->hasMany(Satuan_Obat::class,'kode_obat','kode_obat');
    }
    
}
