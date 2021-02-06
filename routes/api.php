<?php

use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/indonesia', [ProvinsiController::class, 'index']);
Route::get('/positif', [ProvinsiController::class, 'positif']);
Route::get('/sembuh', [ProvinsiController::class, 'sembuh']);
Route::get('/meninggal', [ProvinsiController::class, 'meninggal']);

Route::get('/provinsi', [ProvinsiController::class, 'provinsi']);
Route::get('/provinsi/{id}', [ProvinsiController::class, 'showProvinsi']);

Route::get('/posts', [PostsController::class, 'index']);
Route::post('/posts/store', [PostsController::class, 'store']);
Route::get('/posts/{id}', [PostsController::class, 'show']);
Route::put('/posts/update/{id}', [PostsController::class, 'update']);
Route::delete('/posts/{id?}', [PostsController::class, 'destroy']);
Route::get('/kota', [ProvinsiController::class,'kota']);
Route::get('/kecamatan', [ProvinsiController::class,'kecamatan']);
Route::get('/kelurahan', [ProvinsiController::class,'kelurahan']);
Route::get('/rw', [ProvinsiController::class,'rw']);
Route::get('/global', [ProvinsiController::class,'global']);