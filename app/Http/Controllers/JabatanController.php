<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::All();
        return view('jabatan.index', compact(['jabatans']));
    }

    function create()
    {
        return view('jabatan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required',
            'level' => 'required',
        ]);

        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
            'level' => $request->level
        ]);

        return redirect('/jabatan');
    }
}
