<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaans = Pekerjaan::all();

        // untuk sweat alert hapus
        $title = 'Delete Kelompok!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('pekerjaan.index', compact('pekerjaans'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Pekerjaan harus diisi',
            ]
        );

        $pekerjaan = new Pekerjaan();
        $pekerjaan->nama = $request->nama;
        $pekerjaan->save();

        // Sweet alert
        toast('Pekerjaan ' . $pekerjaan->nama . ' berhasil ditambahkan', 'success');

        return redirect('/pekerjaan');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Pekerjaan harus diisi',
            ]
        );

        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->nama = $request->nama;
        $pekerjaan->save();

        // Sweet alert
        toast('Pekerjaan ' . $pekerjaan->nama . ' berhasil diupdate', 'success');

        return redirect('/pekerjaan');
    }

    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->delete();

        // Sweet alert
        toast('Pekerjaan ' . $pekerjaan->nama . ' berhasil dihapus', 'success');

        return redirect('/pekerjaan');
    }
}
