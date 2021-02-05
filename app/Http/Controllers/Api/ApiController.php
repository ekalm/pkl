<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use Carbon\Carbon;
use DB;
class ProvinsiController extends Controller
{
    public function provinsi()
    {
        $allDay = DB::table('provinsis')
                    ->select('provinsis.nama_provinsi', 'provinsis.kode_provinsi', 
                    DB::raw('SUM(kasuses.jumlah_positif) as Positif'), 
                    DB::raw('SUM(kasuses.jumlah_sembuh) as Sembuh'), 
                    DB::raw('SUM(kasuses.jumlah_meninggal) as Meninggal'))
                        ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                        ->groupBy('provinsis.id')
                        ->get();

        $today = DB::table('provinsis')
                    ->select('provinsis.nama_provinsi', 'provinsis.kode_provinsi', 
                    DB::raw('SUM(kasuses.jumlah_positif) as Positif'), 
                    DB::raw('SUM(kasuses.jumlah_sembuh) as Sembuh'), 
                    DB::raw('SUM(kasuses.jumlah_meninggal) as Meninggal'))
                        ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw') 
                        ->whereDate('kasuses.tanggal', Carbon::today()) 
                        ->groupBy('provinsis.id')
                        ->get();

            $positif = DB::table('rws')->select('kasuses.jumlah_positif', 'kasuses.jumlah_sembuh', 'kasuses.jumlah_meninggal')
                    ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                    ->sum('kasuses.jumlah_positif');
            $sembuh = DB::table('rws')->select('kasuses.jumlah_sembuh', 'kasuses.jumlah_sembuh', 'kasuses.jumlah_meninggal')
                    ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                    ->sum('kasuses.jumlah_sembuh');
            $meninggal = DB::table('rws')->select('kasuses.jumlah_meninggal', 'kasuses.jumlah_sembuh', 'kasuses.jumlah_meninggal')
                    ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                    ->sum('kasuses.jumlah_meninggal');
            
        $data = [
                'success' => true,
                'Data' => [
                    ['Hari ini' => $today,
                    'Semua' => $allDay],
                ],
                'Total' => [
                    'Positif' => $positif,
                    'Sembuh' => $sembuh,
                    'Meninggal' => $meninggal
                ],
        ];    
        return response()->json($data, 200);        
    }


    public function showProvinsi($id)
    {   
        $show = DB::table('provinsis')
        ->select('provinsis.nama_provinsi', 'provinsis.kode_provinsi', 
        DB::raw('SUM(kasuses.jumlah_positif) as positif'), 
        DB::raw('SUM(kasuses.jumlah_sembuh) as sembuh'), 
        DB::raw('SUM(kasuses.jumlah_meninggal) as meninggal'))
            ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
            ->where('provinsis.id', $id)
            ->groupBy('provinsis.id')
            ->get();
            if ($show) {
                return response()->json([
                    'success' => true,
                    'data'    => $show
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan!',
                ], 404);
            }
    }
    public function kota()
    {
        //Data Kota 
        $data = DB::table('kotas')
        ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
        ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->select('nama_kota',
        DB::raw('sum(kasuses.jumlah_positif) as positif'),
        DB::raw('sum(kasuses.jumlah_meninggal) as meninggal'),
        DB::raw('sum(kasuses.jumlah_sembuh) as sembuh'))
        ->groupBy('nama_kota')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function kecamatan()
    {
        //Data Kota 
        $data = DB::table('kecamatans')
        ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
        ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->select('nama_kecamatan',
        DB::raw('sum(kasuses.jumlah_positif) as positif'),
        DB::raw('sum(kasuses.jumlah_meninggal) as meninggal'),
        DB::raw('sum(kasuses.jumlah_sembuh) as sembuh'))
        ->groupBy('nama_kecamatan')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function kelurahan()
    {
        //Data Kota 
        $data = DB::table('kelurahans')
        ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->select('nama_kelurahan',
        DB::raw('sum(kasuses.jumlah_positif) as positif'),
        DB::raw('sum(kasuses.jumlah_meninggal) as meninggal'),
        DB::raw('sum(kasuses.jumlah_sembuh) as sembuh'))
        ->groupBy('nama_kelurahan')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }
    public function rw()
    {
        //Data Kota 
        $data = DB::table('rws')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->select('rws.nama_rw',
        DB::raw('sum(kasuses.jumlah_positif) as positif'),
        DB::raw('sum(kasuses.jumlah_meninggal) as meninggal'),
        DB::raw('sum(kasuses.jumlah_sembuh) as sembuh'))
        ->groupBy('nama_rw')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }
    

   // MENAMPILKAN DATA SELURUH INDONESIA
   public function index()
   {
       $positif = DB::table('rws')->select('kasuses.jumlah_positif','kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
           ->join ('kasuses','rws.id','=','kasuses.id_rw')
           ->sum('kasuses.jumlah_positif');
          
          
           $sembuh = DB::table('rws')->select('kasuses.jumlah_positif','kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
           ->join ('kasuses','rws.id','=','kasuses.id_rw')
           ->sum('kasuses.jumlah_sembuh');

           $meninggal = DB::table('rws')->select('kasuses.jumlah_positif','kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
           ->join ('kasuses','rws.id','=','kasuses.id_rw')
           ->sum('kasuses.jumlah_meninggal');


           $res = [
               'success' => true,
               'Data' => 'Data Kasus Indonesia',
               'jumlah Positif' => $positif,
               'Jumlah Sembuh' => $sembuh,
               'jumlah Meninggal' => $meninggal,
               'message' => 'Data Kasus Di tampilkan'
           ];
       return response()->json($res,200);
   }

    public function positif()
    {
        $positif = DB::table('rws')->select('kasuses.jumlah_positif', 'kasuses.jumlah_sembuh', 'kasuses.jumlah_meninggal')
                    ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                    ->sum('kasuses.jumlah_positif');
        $indonesia = [
            'success' => true,
            'data' => [
                    'name' => 'Jumlah Positif',
                    'value' => $positif
                ],
                    'message' => 'Berhasil',
            ];
            return response()->json($indonesia, 200);            
    }

    public function sembuh()
    {
        $sembuh = DB::table('rws')->select('kasuses.jumlah_sembuh', 'kasuses.jumlah_sembuh', 'kasuses.jumlah_meninggal')
                    ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                    ->sum('kasuses.jumlah_sembuh');
        $indonesia = [
            'success' => true,
            'data' => [
                    'name' => 'Jumlah Sembuh',
                    'value' => $sembuh
                ],
                    'message' => 'Berhasil',
            ];
            return response()->json($indonesia, 200);            
    }

    public function meninggal()
    {
        $meninggal = DB::table('rws')->select('kasuses.jumlah_meninggal', 'kasuses.jumlah_sembuh', 'kasuses.jumlah_meninggal')
                    ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                    ->sum('kasuses.jumlah_meninggal');
        $indonesia = [
            'success' => true,
            'data' => [
                    'name' => 'Jumlah Meninggal',
                    'value' => $meninggal
                ],
                    'message' => 'Berhasil',
            ];
            return response()->json($indonesia, 200);            
    }

    
}