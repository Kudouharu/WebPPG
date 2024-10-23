<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jamaah extends Model
{
    use HasFactory;

    protected $table = 'jamaah';

    protected $fillable = [
        'id',
        'nama',
        'username',
        'nik',
        'tgllahir',
        'gender',
        'id_pekerjaan',
        'mubalight',
        'haji',
        'agniya',
        'duafa',
        'yatim',
        'mahasiswa',
        'sarjana',
        'id_kelas',
        'id_orangtua',
        'foto',
        'created_at',
        'updated_at'
    ];

}
