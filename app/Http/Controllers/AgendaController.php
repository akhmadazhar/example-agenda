<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::all();

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
        return view('agenda.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nik_pegawai' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'status' => 'required',
        ]);

        Agenda::create([
            'nik_pegawai' => $request->nik_pegawai,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'status' => $request->status
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
            'nik_pegawai' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'status' => 'required',
        ]);
        $agenda = Agenda::find($id);
        $agenda->update([
            'nik_pegawai' => $request->nik_pegawai,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
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
