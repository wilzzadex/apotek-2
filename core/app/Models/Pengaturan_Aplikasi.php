<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan_Aplikasi extends Model
{
    protected $table = 'app_setup';
    protected $fillable = [
        'nama_aplikasi',
        'logo_aplikasi',
        'alamat_aplikasi',
        'icon_aplikasi',
    ];
}
