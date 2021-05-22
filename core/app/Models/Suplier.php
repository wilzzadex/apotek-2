<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $table = 'suplier';
    protected $fillable = [
        'nama_suplier',
        'alamat',
        'penanggung_jawab',
        'no_telp',
        'jumlah_satuan_terkecil',
    ];
}
