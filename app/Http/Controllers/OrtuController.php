<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Ortu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrtuController extends Controller
{
    public function index()
    {
        $orangtua = DB::table('orangtua')
            ->join('kelompok', 'orangtua.id_kelompok', '=', 'kelompok.id')
            ->select('orangtua.*', 'kelompok.nama as nama_kelompok')
            ->get();
        $kelompoks = Kelompok::all();

        // untuk sweat alert hapus
        $title = 'Delete Kelompok!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('orangtua.index', compact('kelompoks', 'orangtua'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namabapak' => 'required',
            'humBapak' => 'required',
            'namaibu' => 'required',
            'humIbu' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'kelompok' => 'required',
        ], [
            'namabapak.required' => 'Nama harus diisi',
            'humBapak.required' => 'Humbapak harus diisi',
            'namaibu.required' => 'Nama harus diisi',
            'humIbu.required' => 'Humbapak harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'nohp.required' => 'No. HP harus diisi',
            'kelompok.required' => 'Kelompok harus diisi',
        ]);

        $orangtua = new Ortu();
        $orangtua->nama_bapak = $request->namabapak;
        $orangtua->hum_bapak = $request->humBapak;
        $orangtua->nama_ibu = $request->namaibu;
        $orangtua->hum_ibu = $request->humIbu;
        $orangtua->alamat = $request->alamat;
        $orangtua->nohp = $request->nohp;
        $orangtua->id_kelompok = $request->kelompok;
        $orangtua->save();

        toast('Orang tua ' . $orangtua->nama_bapak . ' - ' . $orangtua->nama_ibu . ' berhasil ditambahkan', 'success');

        return redirect('/ortu');
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
        $request->validate([
            'namabapak' => 'required',
            'humBapak' => 'required',
            'namaibu' => 'required',
            'humIbu' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'kelompok' => 'required',
        ], [
            'namabapak.required' => 'Nama harus diisi',
            'humBapak.required' => 'Humbapak harus diisi',
            'namaibu.required' => 'Nama harus diisi',
            'humIbu.required' => 'Humbapak harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'nohp.required' => 'No. HP harus diisi',
            'kelompok.required' => 'Kelompok harus diisi',
        ]);

        $orangtua = Ortu::find($id);
        $orangtua->nama_bapak = $request->namabapak;
        $orangtua->hum_bapak = $request->humBapak;
        $orangtua->nama_ibu = $request->namaibu;
        $orangtua->hum_ibu = $request->humIbu;
        $orangtua->alamat = $request->alamat;
        $orangtua->nohp = $request->nohp;
        $orangtua->id_kelompok = $request->kelompok;
        $orangtua->save();

        toast('Orang tua ' . $orangtua->nama_bapak . ' - ' . $orangtua->nama_ibu . ' berhasil diupdate', 'success');

        return redirect('/ortu');
    }

    public function destroy($id)
    {
        $orangtua = Ortu::find($id);
        $orangtua->delete();

        // Sweet alert
        toast('Orang tua ' . $orangtua->nama_bapak . ' - ' . $orangtua->nama_ibu . ' berhasil dihapus', 'success');

        return redirect('/ortu');
    }
}
