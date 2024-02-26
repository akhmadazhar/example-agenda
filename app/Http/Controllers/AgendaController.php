<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Alur;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Jika user adalah admin (dengan ID 0), maka tampilkan semua agenda
        if ($user->id === 0) {
            $agendas = Agenda::with('user')->get();
        } else {
            // Jika bukan admin, hanya tampilkan agenda yang dimiliki oleh pengguna tersebut
            $agendas = Agenda::where('user_id', $user->id)->where('status', 'diajukan')->get();
        }
        // $agendas->load('alurs');

        return view('agenda.index', compact('agendas'));
    }

    public function detail($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            // Handle jika data tidak ditemukan, contohnya redirect atau menampilkan pesan
            return redirect()->route('index')->with('error', 'Data not found.');
        }
        $alurs = Alur::where('id_agenda', $id)->get();
        return view('agenda.detail', compact('agenda', 'alurs'));
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

        Alur::create([
            'id_agenda' => $agenda->id,
            'pegawai_before' => auth()->user()->name,
            'pegawai_after' => $agenda->user->name,
            'catatan' => null
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

    public function updateStatus($id)
    {
        $agenda = Agenda::findOrFail($id);
        if (!$agenda) {
            // Handle jika data tidak ditemukan, contohnya redirect atau menampilkan pesan
            return redirect()->route('agenda.index')->with('error', 'Data not found.');
        }
        $agenda->update(['status' => 'Selesai']);
        $alurs = Alur::where('id_agenda', $id)->first();
        $alurs->update([
            'pegawai_after' => auth()->user()->name,
            'catatan' => 'Tes',
        ]);
        $agenda->save();

        return redirect()->back()->with('success', 'Agenda berhasil diverifikasi.');
    }
}
