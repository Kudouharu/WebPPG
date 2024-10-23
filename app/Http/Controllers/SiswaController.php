<?php

namespace App\Http\Controllers;

use App\Models\jamaah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        $jamaah = DB::table('jamaah')
            ->join('kelas', 'jamaah.id_kelas', '=', 'kelas.id')
            ->join('kelompok', 'jamaah.id_kelompok', '=', 'kelompok.id')
            ->select('jamaah.*', 'kelas.nama as kelas', 'kelompok.nama as kelompok')
            ->get();
            
        return view('siswa.index', compact('jamaah'));
    }
}
