<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrukController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PermintaanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('awal');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('admin/truk', TrukController::class);

Route::resource('admin/jenis', JenisController::class);

Route::resource('admin/permintaan', PermintaanController::class);
