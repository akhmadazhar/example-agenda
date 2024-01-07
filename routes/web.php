<?php

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

Route::controller(FullCalenderController::class)->group(function () {
    Route::get('/event', 'index');
    Route::post('fullcalenderAjax', 'ajax');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/agenda', [\App\Http\Controllers\AgendaController::class, 'index']);
    Route::post('/agenda', [\App\Http\Controllers\AgendaController::class, 'store']);
    Route::get('/agenda/create', [\App\Http\Controllers\AgendaController::class, 'create']);
    Route::get('/agenda/edit/{id}', [\App\Http\Controllers\AgendaController::class, 'edit'])->name('agenda.edit');
    Route::put('/agenda/{id}', [\App\Http\Controllers\AgendaController::class, 'update']);
    Route::delete('/agenda/{id}', [\App\Http\Controllers\AgendaController::class, 'destroy']);

    Route::get('/jabatan', [\App\Http\Controllers\JabatanController::class, 'index']);
    Route::post('/jabatan', [\App\Http\Controllers\JabatanController::class, 'store']);
    Route::get('/jabatan/create', [\App\Http\Controllers\JabatanController::class, 'create']);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');