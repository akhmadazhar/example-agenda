<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $users = User::with('jabatan')->get();

        return view('pegawai.index', compact(['users']));
    }

    public function create()
    {
        $jabatans = Jabatan::all();
        return view('pegawai.create', compact(['jabatans']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jabatan' => 'required',
            'nik' => 'required',
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => 'required',
            'password' => 'required', 'confirmed',
        ]);

        User::create([
            'id_jabatan' => $request->id_jabatan,
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/pegawai');
    }
}
