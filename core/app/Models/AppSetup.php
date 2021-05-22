<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetup extends Model
{
    protected $table = 'app_setup';
    protected $fillable = [
        'flag',
        'content',
    ];
}
