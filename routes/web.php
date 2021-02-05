<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\LaporanController;

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function(){
    return view('layouts.backend');
});

// Provinsi
Route::get('/provinsi',[ProvinsiController::class, 'index'])->name('provinsi');
Route::get('/provinsi/create',[ProvinsiController::class,'create'])->name('provinsi.create');
Route::post('/provinsi/store',[ProvinsiController::class,'store'])->name('provinsi.store');
Route::get('/provinsi/edit/{id}',[ProvinsiController::class, 'edit'])->name('provinsi.edit');
Route::get('/provinsi/show/{id}',[ProvinsiController::class, 'show'])->name('provinsi.show');
Route::post('/provinsi/update/{id}',[ProvinsiController::class, 'update'])->name('provinsi.update');
Route::post('/provinsi/destroy/{id}',[ProvinsiController::class,'destroy'])->name('provinsi.destroy');

// Kota
Route::get('/kota',[KotaController::class, 'index'])->name('kota');
Route::get('/kota/create',[KotaController::class,'create'])->name('kota.create');
Route::post('/kota/store',[KotaController::class,'store'])->name('kota.store');
Route::get('/kota/edit/{id}',[KotaController::class, 'edit'])->name('kota.edit');
Route::get('/kota/show/{id}',[KotaController::class, 'show'])->name('kota.show');
Route::post('/kota/update/{id}',[KotaController::class, 'update'])->name('kota.update');
Route::post('/kota/destroy/{id}',[KotaController::class,'destroy'])->name('kota.destroy');

// Kecamatan
Route::get('/kecamatan',[KecamatanController::class, 'index'])->name('kecamatan');
Route::get('/kecamatan/create',[KecamatanController::class,'create'])->name('kecamatan.create');
Route::post('/kecamatan/store',[KecamatanController::class,'store'])->name('kecamatan.store');
Route::get('/kecamatan/edit/{id}',[KecamatanController::class, 'edit'])->name('kecamatan.edit');
Route::get('/kecamatan/show/{id}',[KecamatanController::class, 'show'])->name('kecamatan.show');
Route::post('/kecamatan/update/{id}',[KecamatanController::class, 'update'])->name('kecamatan.update');
Route::post('/kecamatan/destroy/{id}',[KecamatanController::class,'destroy'])->name('kecamatan.destroy');

// Kelurahan
Route::get('/kelurahan',[KelurahanController::class, 'index'])->name('kelurahan');
Route::get('/kelurahan/create',[KelurahanController::class,'create'])->name('kelurahan.create');
Route::post('/kelurahan/store',[KelurahanController::class,'store'])->name('kelurahan.store');
Route::get('/kelurahan/edit/{id}',[KelurahanController::class, 'edit'])->name('kelurahan.edit');
Route::get('/kelurahan/show/{id}',[KelurahanController::class, 'show'])->name('kelurahan.show');
Route::post('/kelurahan/update/{id}',[KelurahanController::class, 'update'])->name('kelurahan.update');
Route::post('/kelurahan/destroy/{id}',[KelurahanController::class,'destroy'])->name('kelurahan.destroy');

// Rw
Route::get('/rw',[RwController::class, 'index'])->name('rw');
Route::get('/rw/create',[RwController::class,'create'])->name('rw.create');
Route::post('/rw/store',[RwController::class,'store'])->name('rw.store');
Route::get('/rw/edit/{id}',[RwController::class, 'edit'])->name('rw.edit');
Route::get('/rw/show/{id}',[RwController::class, 'show'])->name('rw.show');
Route::post('/rw/update/{id}',[RwController::class, 'update'])->name('rw.update');
Route::post('/rw/destroy/{id}',[RwController::class,'destroy'])->name('rw.destroy');

// Laporan 
Route::get('/laporan',[LaporanController::class, 'index'])->name('laporan');
Route::get('/laporan/create',[LaporanController::class,'create'])->name('laporan.create');
Route::post('/laporan/store',[LaporanController::class,'store'])->name('laporan.store');
Route::get('/laporan/edit/{id}',[LaporanController::class, 'edit'])->name('laporan.edit');
Route::get('/laporan/show/{id}',[LaporanController::class, 'show'])->name('laporan.show');
Route::post('/laporan/update/{id}',[LaporanController::class, 'update'])->name('laporan.update');
Route::post('/laporan/destroy/{id}',[LaporanController::class,'destroy'])->name('laporan.destroy');

Route::get('/get_kota/{id}',[LaporanController::class,'get_kota']);
Route::get('/get_kecamatan/{id}',[LaporanController::class,'get_kecamatan']);
Route::get('/get_kelurahan/{id}',[LaporanController::class,'get_kelurahan']);
Route::get('/get_rw/{id}',[LaporanController::class,'get_rw']);