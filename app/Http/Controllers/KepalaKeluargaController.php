<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepalaKeluargaController extends Controller
{
    public function index()
    {
        return view('kepalakeluarga.view');
    }
}
