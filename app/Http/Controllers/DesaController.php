<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
        $desa = Desa::all();

        // untuk sweat alert hapus
        $title = 'Delete Desa!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('desa.index', compact('desa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $desa = new Desa();
        $desa->nama = $request->nama;
        $desa->alamat = $request->alamat;
        $desa->id_daerah = 1;
        $desa->save();

        // sweat alert
        toast('Desa '. $desa->nama .' berhasil ditambahkan', 'success');

        return redirect('/desa');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $desa = Desa::find($id);
        $desa->nama = $request->nama;
        $desa->alamat = $request->alamat;
        $desa->save();

        // sweat alert
        toast('Desa '. $desa->nama .' berhasil diupdate', 'success');

        return redirect('/desa');
    }

    public function destroy($id)
    {
        $desa = Desa::find($id);
        $desa->delete();

        // sweat alert
        toast('Desa '. $desa->nama .' berhasil dihapus', 'success');

        return redirect('/desa');
    }
}
