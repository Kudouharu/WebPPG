<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;

    protected $table = 'orangtua';

    protected $fillable = [
        'id',
        'nama_bapak',
        'hum_bapak',
        'nama_ibu',
        'hum_ibu',
        'alamat',
        'nohp',
        'id_kelompok',
        'created_at',
        'updated_at'
    ];
}
