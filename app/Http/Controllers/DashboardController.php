<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $agendas = Agenda::all();
        return view('dashboard.index', compact('agendas'));
    }
    public function listEvent(Request $request)
    {

        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));


        $data = Agenda::whereDate('start', '>=', $start)
            ->whereDate('end',   '<=', $end)
            ->get()
            ->map(fn ($item) => [
                'title' => $item->judul,
                'desc' => '/agenda/detail/' . $item->id . '',
                'start' => $item->start,
                'end' => $item->end,
                'location' => $item->lokasi,
                'status' => $item->status,

            ]);

        return response()->json($data);
    }
}
