<?php

namespace App\Http\Controllers\Api;
use App\Models\kasus;
use App\Models\provinsi;
use App\Models\kelurahan;
use App\Models\kecamatan;
use App\Models\rw;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function index()
    {
    $positif = DB::table('rws')
                ->select('kasus2s.jumlah_positif',
                'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                ->sum('kasus2s.jumlah_positif');
    
    $sembuh = DB::table('rws')
                ->select('kasus2s.jumlah_positif',
                'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                ->sum('kasus2s.jumlah_sembuh');

    $meninggal = DB::table('rws')
                ->select('kasus2s.jumlah_positif',
                'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                ->sum('kasus2s.jumlah_meninggal');


    $res = [
        'success' => true,
        'data' => 'Data Kasus Indonesia',
        'jumlah_positif' => $positif,
        'jumlah_sembuh' => $sembuh,
        'jumlah_meninggal' => $meninggal,
        'message' => 'Data Kasus Ditampilkan'
    ];
    return response()->json($res,200);
}
  public function provinsi($id){
    $positif = DB::table('provinsis')
    ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
    ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
    ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
    ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
    ->join('kasus2s', 'kasus2s.id_rw', '=', 'rws.id')
    ->select('kasus2s.jumlah_positif')
    ->where('provinsis.id',$id)
    ->sum('kasus2s.jumlah_positif');

     $sembuh = DB::table('provinsis')
     ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
     ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
     ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
     ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
     ->join('kasus2s', 'kasus2s.id_rw', '=', 'rws.id')
     ->select('kasus2s.jumlah_sembuh')
     ->where('provinsis.id',$id)
     ->sum('kasus2s.jumlah_sembuh');

     $meninggal = DB::table('provinsis')
     ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
     ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
     ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
     ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
     ->join('kasus2s', 'kasus2s.id_rw', '=', 'rws.id')
     ->select('kasus2s.meninggal')
     ->where('provinsis.id',$id)
     ->sum('kasus2s.jumlah_meninggal');

     $provinsi = Provinsi::whereId($id)->first();

    $res = [
        'success' => true,
        'nama_provinsi' => $provinsi['nama_provinsi'],
        'jumlah_positif' => $positif,
        'jumlah_sembuh' => $sembuh,
        'jumlah_meninggal' => $meninggal,
        'message' => 'Data Berhasil DItampilkan'
    ];
    return response()->json($res, 200);
}

public function provinsikasus(){
    $var = DB::table('provinsis')
    ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
    ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
    ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
    ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
    ->join('kasus2s', 'kasus2s.id_rw', 'rws.id')
    ->select('nama_provinsi',
        DB::raw('sum(kasus2s.jumlah_positif) as jumlah_Positif'),
        DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
        DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'),
    )
    ->groupBy('nama_provinsi')
    ->get();

$data = [
    'status' => true,
    'message' => 'Menampilkan Provinsi',
    'data' => $var,
];

return response()->json($data, 200);
}
}
   
