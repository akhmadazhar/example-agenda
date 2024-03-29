<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FullCalenderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'admin'])->group(function () {
    // Rute yang ingin Anda batasi aksesnya hanya untuk admin di sini
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);
    // Rute Agenda Admin
    Route::post('/agenda', [\App\Http\Controllers\AgendaController::class, 'store']);
    Route::get('/agenda/create', [\App\Http\Controllers\AgendaController::class, 'create']);
    Route::get('/agenda/edit/{id}', [\App\Http\Controllers\AgendaController::class, 'edit'])->name('agenda.edit');
    Route::put('/agenda/{id}', [\App\Http\Controllers\AgendaController::class, 'update']);
    Route::delete('/agenda/{id}', [\App\Http\Controllers\AgendaController::class, 'destroy']);
    // Rute Jabatan Admin
    Route::get('/jabatan', [\App\Http\Controllers\JabatanController::class, 'index']);
    Route::post('/jabatan', [\App\Http\Controllers\JabatanController::class, 'store']);
    Route::get('/jabatan/create', [\App\Http\Controllers\JabatanController::class, 'create']);
    // Rute Pegawai Admin
    Route::get('/pegawai', [\App\Http\Controllers\PegawaiController::class, 'index']);
    Route::post('/pegawai', [\App\Http\Controllers\PegawaiController::class, 'store']);
    Route::get('/pegawai/create', [\App\Http\Controllers\PegawaiController::class, 'create']);
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/agenda', [\App\Http\Controllers\AgendaController::class, 'index']);
Route::get('/agenda/detail/{id}', [\App\Http\Controllers\AgendaController::class, 'detail'])->name('agenda.detail');


Route::get('event/list', [FullCalenderController::class, 'listEvent'])->name('events.list');
Route::resource('event', FullCalenderController::class);

Route::get('dashboard/list', [DashboardController::class, 'listEvent'])->name('agendas.list');
Route::resource('dashboard', DashboardController::class);

//New Update Status
Route::put('/agenda/{id}/update-status', [AgendaController::class, 'updateStatus'])->name('agenda.updateStatus');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
