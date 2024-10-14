<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    public function index()
    {
        $daerah = Daerah::all();

        return view('daerah.index', compact('daerah'));
    }
}
