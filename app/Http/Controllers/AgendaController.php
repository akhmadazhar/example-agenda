<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {

        $agendas = Agenda::with('user')->get();
        foreach ($agendas as $agenda) {
            echo optional($agenda->user)->name ?? '';
        }
        // $users = User::with('jabatan')->get();
        // foreach ($users as $user) {
        //     echo optional($user->jabatan)->nama_jabatan ?? '';
        // }

        return view('agenda.index', compact(['agendas']));
    }

    public function detail($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            // Handle jika data tidak ditemukan, contohnya redirect atau menampilkan pesan
            return redirect()->route('index')->with('error', 'Data not found.');
        }

        return view('agenda.detail', compact('agenda'));
    }

    function create()
    {
        $users = User::where('id_jabatan', '!=', 0)->get();

        return view('agenda.create', compact(['users']));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nik' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'start' => 'required',
            'end' => 'required',
            'lokasi' => 'required',

        ]);
        $user = User::where('nik', $request->nik)->first();
        $agenda = Agenda::create([
            'nik' => $request->nik,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'start' => $request->start,
            'end' => $request->end,
            'lokasi' => $request->lokasi,
            'status' => 'Diajukan',
            'user_id' => $user->id // Set user_id ke ID pengguna yang ditemukan
        ]);
        return redirect('/agenda');
    }

    public function edit($id)
    {
        $agenda = Agenda::find($id);
        return view('agenda.edit', compact(['agenda']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'start' => 'required',
            'end' => 'required',
            'lokasi' => 'required',

        ]);
        $agenda = Agenda::find($id);
        $agenda->update([
            'nik' => $request->nik,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'start' => $request->start,
            'end' => $request->end,
            'lokasi' => $request->lokasi,
            'status' => $request->status
        ]);
        return redirect('/agenda');
    }

    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();

        return redirect('/agenda');
    }
}
