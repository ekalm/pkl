<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('index', function (){
   // return view('layouts.admin.index');
// });

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('home');
use App\Http\Controllers\ProvinsiController;
Route::resource('provinsi', ProvinsiController::class);
use App\Http\Controllers\KotaController;
Route::resource('kota', KotaController::class);
use App\Http\Controllers\KecamatanController;
Route::resource('kecamatan',KecamatanController::class);
use App\Http\Controllers\KelurahanController;
Route::resource('kelurahan',KelurahanController::class);
use App\Http\Controllers\RwController;
Route::resource('rw',RwController::class);
use App\Http\Controllers\KasusController;
Route::resource('kasus',KasusController::class);
Route::view('city','livewire.home');
// Route::get('provinsi', function (){
//     return view('admin.provinsi.index');
// });

// Route::get('kota', function (){
//     return view('admin.kota.index');
// });
// Route::get('kecamatan', function (){
//     return view('admin.kecamatan.index');
// });
// Route::get('kelurahan', function (){
//     return view('admin.kelurahan.index');
// });
// Route::get('rw', function (){
//     return view('admin.rw.index');
// });
// Route::get('laporan', function (){
//     return view('admin.laporan.index');
// });