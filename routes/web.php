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
Route::get('admin/truk/qrcode/{id}', [TrukController::class,'indexqrcode']);

Route::resource('admin/jenis', JenisController::class);
Route::get('admin/jenis/qrcode/{id}', [JenisController::class,'indexqrcode']);

Route::resource('admin/permintaan', PermintaanController::class);
Route::get('admin/permintaan/qrcode/{id}', [PermintaanController::class,'indexqrcode']);
Route::get('admin/permintaan/acc/{id}', [PermintaanController::class,'accpermintaan']);
route::get('client/permintaan',[PermintaanController::class,'indexclient']);
route::get('client/riwayat',[PermintaanController::class,'riwayatclient']);
