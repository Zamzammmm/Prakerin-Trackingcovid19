<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\RW;
use App\Models\Laporan;

class ApiController extends Controller
{
    public function indonesia()
    {
        $hariini = Carbon::now()->format('d-m-y'); 
    	$data_skrg = DB::table('laporans')
                    ->select(DB::raw('SUM(jumlah_positif) as Jumlah_Positif'), 
                             DB::raw('SUM(jumlah_sembuh) as Jumlah_Sembuh'), 
                             DB::raw('SUM(jumlah_meninggal) as Jumlah_Meninggal'),
                             DB::raw('MAX(tanggal) as Tanggal'))
	    			->whereDay('tanggal', '=' , $hariini)
	    			->get();
        $data = DB::table('laporans')
                    ->select(DB::raw('SUM(jumlah_positif) as Jumlah_Positif'), 
                             DB::raw('SUM(jumlah_sembuh) as Jumlah_Sembuh'), 
                             DB::raw('SUM(jumlah_meninggal) as Jumlah_Meninggal'))
    				->get();
    	$rest = [
    		'success' => true,
    		'data' => [
                'hari_ini' => $data_skrg, 
                'Total' => $data
            ],
    		'message' => 'Data Kasus Seluruh Indonesia Ditampilkan'
    	];
    	return response()->json($rest, 200);
    }
    public function provinsi_index()
    {
        $hariini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('laporans')
                ->select(DB::raw('provinsis.Id'),
                         DB::raw('provinsis.Nama_provinsi'),
                         DB::raw('SUM(laporans.jumlah_positif) as Jumlah_Positif'),
                         DB::raw('SUM(laporans.jumlah_sembuh) as Jumlah_Sembuh'),
                         DB::raw('SUM(laporans.jumlah_meninggal) as Jumlah_Meninggal'),
                         DB::raw('MAX(tanggal) as Tanggal'))
                         ->whereDay('tanggal', '=' , $hariini)
                ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('kecamatans' ,'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                ->join('provinsis' ,'kotas.id_provinsi', '=', 'provinsis.id')
                ->whereDate('laporans.tanggal', date('Y-m-d'))
                ->groupby('provinsis.id')
                ->get();

        $data = DB::table('laporans')
                ->select(DB::raw('provinsis.nama_provinsi as Provinsi'), 
                         DB::raw('SUM(laporans.jumlah_positif) as Jumlah_Positif'), 
                         DB::raw('SUM(laporans.jumlah_meninggal) as Jumlah_Meninggal'),
                         DB::raw('SUM(laporans.jumlah_sembuh) as Jumlah_Sembuh')) 
                ->join('rws', 'rws.id', '=', 'laporans.id_rw')
                ->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
                ->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                ->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
                ->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
                ->groupBy('provinsis.nama_provinsi')
            ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }

    public function showprovinsi($id)
    {
        $data_skrg = DB::table('laporans')
                ->select('jumlah_positif', 'jumlah_sembuh', 'jumlah_meninggal')
                ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('kecamatans' ,'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                ->join('provinsis' ,'kotas.id_provinsi', '=', 'provinsis.id')
                ->where('provinsis.id', $id)
                ->where('laporans.tanggal', date('Y-m-d'))
                ->get();

        $data = DB::table('laporans')
                ->select(DB::raw('provinsis.nama_provinsi as Provinsi'), 
                         DB::raw('SUM(laporans.jumlah_positif) as jumlah_positif'), 
                         DB::raw('SUM(laporans.jumlah_meninggal) as jumlah_meninggal'),
                         DB::raw('SUM(laporans.jumlah_sembuh) as jumlah_sembuh')) 
                ->join('rws', 'rws.id', '=', 'laporans.id_rw')
                ->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
                ->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                ->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
                ->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
                ->where('provinsis.id', $id)
                ->groupBy('provinsis.nama_provinsi')
            ->get();
            
        $data_skrg = [
            'Jumlah_Positif' =>$data_skrg->sum('jumlah_positif'),
            'Jumlah_Sembuh' =>$data_skrg->sum('jumlah_sembuh'),
            'Jumlah_Meninggal' =>$data_skrg->sum('jumlah_meninggal'),
        ];
        
        $data = [
            'Jumlah_Positif' =>$data->sum('jumlah_positif'),
            'Jumlah_Sembuh' =>$data->sum('jumlah_sembuh'),
            'Jumlah_Meninggal' =>$data->sum('jumlah_meninggal'),
        ];
        
        $rest = [
            'status' => 200,
            'data' => [
                'Hari Ini' => $data_skrg,
                'Total' => $data
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        
        return response()->json($rest, 200);
    }
}
