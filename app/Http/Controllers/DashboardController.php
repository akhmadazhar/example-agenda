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
}
