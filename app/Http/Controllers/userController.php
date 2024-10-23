<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class userController extends Controller
{
    public function index()
    {
        $users = User::all();
        $desas = Desa::all();
        $kelompoks = Kelompok::all();

        // untuk sweat alert hapus
        $title = 'Delete Kelompok!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view("user/index", compact("users", "desas", "kelompoks"));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|email', // menambahkan validasi email
                'password' => 'required|min:6', // menambahkan validasi panjang password
                'jabatan' => 'required',
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password minimal 6 karakter',
                'jabatan.required' => 'Jabatan harus diisi',
            ]
        );

        try {
            $user = new User();
            $user->nama = $request->nama; // Perbaiki dari $request->nama ke $request->name
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->jabatan = $request->jabatan;
            $user->id_daerah = 1; // Sesuaikan dengan logika Anda
            $user->id_desa = $request->desa ?? null; // Menggunakan null jika tidak ada
            $user->id_kelompok = $request->kelompok ?? null; // Menggunakan null jika tidak ada
            $user->foto = 'logo.png';
            $user->save();

            // Sweat alert
            toast('User ' . $user->name . ' berhasil ditambahkan', 'success');

            return redirect('/user');
        } catch (\Exception $e) {
            // Log kesalahan
            Log::error('Error saat menambahkan user: ' . $e->getMessage());

            toast('User gagal ditambahkan: ' . $e->getMessage(), 'error');
            return redirect('/user')->withInput(); // Mengembalikan input agar pengguna tidak kehilangan data yang diisi
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|email', // menambahkan validasi email
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Format email tidak valid',
            ]
        );

        $user = User::find($id);
        $user->nama = $request->nama; // Perbaiki dari $request->nama ke $request->name
        $user->email = $request->email;
        $user->jabatan = $request->jabatan;
        $user->save();

        // Sweet alert
        toast('User ' . $user->name . ' berhasil diupdate', 'success');

        return redirect('/user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        // Sweet alert
        toast('User ' . $user->name . ' berhasil dihapus', 'success');

        return redirect('/user');
    }
}
