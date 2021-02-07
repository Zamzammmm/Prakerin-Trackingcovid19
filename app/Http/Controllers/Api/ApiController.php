<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
    public function dataGlobal()
    {
    	$http =  Http::get('https://api.kawalcorona.com/')->json();
    	$data = [];
    	foreach ($http as $key => $value) {
    		$raw = $value['attributes'];
    		$res = [
    			'Nama Negara' => $raw['Country_Region'],
    			'Jumlah Positif' => $raw['Confirmed'],
    			'Jumlah Meninggal' => $raw['Deaths'],
    			'Jumlah Sembuh' => $raw['Recovered']
    		];
    		array_push($data, $res);
    	}

    	$rest = [
    		'success' => true,
    		'data' => $data,
    		'message' => 'Data Kasus Global Ditampilkan'
    	];

    	return response()->json($rest, 200);
    }

    public function indonesia()
    {
        $hariini = Carbon::now()->format('d-m-y'); 
    	$data_skrg = DB::table('laporans')
                    ->select(DB::raw('SUM(jumlah_positif) as Jumlah_Positif'), 
                             DB::raw('SUM(jumlah_sembuh) as Jumlah_Sembuh'), 
                             DB::raw('SUM(jumlah_meninggal) as Jumlah_Meninggal'),
                             DB::raw('MAX(tanggal) as tanggal'))
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
                ->select(DB::raw('provinsis.id'),
                         DB::raw('provinsis.nama_provinsi'),
                         DB::raw('SUM(laporans.jumlah_positif) as jumlah_positif'),
                         DB::raw('SUM(laporans.jumlah_sembuh) as jumlah_sembuh'),
                         DB::raw('SUM(laporans.jumlah_meninggal) as jumlah_meninggal'),
                         DB::raw('MAX(tanggal) as tanggal'))
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
                ->select(DB::raw('provinsis.id'),
                         DB::raw('provinsis.nama_provinsi as provinsi'), 
                         DB::raw('SUM(laporans.jumlah_positif) as jumlah_positif'), 
                         DB::raw('SUM(laporans.jumlah_meninggal) as jumlah_peninggal'),
                         DB::raw('SUM(laporans.jumlah_sembuh) as jumlah_sembuh')) 
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
                ->select(DB::raw('provinsis.nama_provinsi as provinsi'), 
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
            'jumlah_positif' =>$data_skrg->sum('jumlah_positif'),
            'jumlah_sembuh' =>$data_skrg->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$data_skrg->sum('jumlah_meninggal'),
        ];
        
        $data = [
            'jumlah_positif' =>$data->sum('jumlah_positif'),
            'jumlah_sembuh' =>$data->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$data->sum('jumlah_meninggal'),
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

    public function kota_index()
    {
        $hariini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('laporans')
                    ->select(DB::raw('kotas.id'),
                             DB::raw('kotas.nama_kota'),
                             DB::raw('SUM(laporans.jumlah_positif) as jumlah_positif'),
                             DB::raw('SUM(laporans.jumlah_sembuh) as jumlah_sembuh'),
                             DB::raw('SUM(laporans.jumlah_meninggal) as jumlah_meninggal'),
                             DB::raw('MAX(tanggal) as tanggal'))
                             ->whereDay('tanggal', '=' , $hariini)
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->whereDate('laporans.tanggal', date('Y-m-d'))
                    ->groupby('kotas.id')
                    ->get();

        $data = DB::table('laporans')
                    ->select(DB::raw('kotas.id'),
                             DB::raw('kotas.nama_kota'),
                             DB::raw('SUM(laporans.jumlah_positif) as jumlah_positif'),
                             DB::raw('SUM(laporans.jumlah_sembuh) as jumlah_sembuh'),
                             DB::raw('SUM(laporans.jumlah_meninggal) as jumlah_meninggal'))
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->groupby('kotas.id')
                    ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$data_skrg],
            'Total' =>[$data]
            ],
            'message' => 'Data Kasus Kota Ditampilkan'
        ];
        return response()->json($rest, 200);
    }

    public function showkota($id)
    {
        $data_skrg = DB::table('laporans')
                    ->select('jumlah_positif', 'jumlah_sembuh', 'jumlah_meninggal')
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->where('kotas.id', $id)
                    ->where('laporans.tanggal', date('Y-m-d'))
                    ->get();

        $data = DB::table('laporans')
                    ->select('jumlah_positif', 'jumlah_sembuh', 'jumlah_meninggal')
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->where('kotas.id', $id)
                    ->get();
        
        $data_skrg = [
            'jumlah_positif' =>$data_skrg->sum('jumlah_positif'),
            'jumlah_sembuh' =>$data_skrg->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$data_skrg->sum('jumlah_meninggal'),
        ];

        $data = [
            'jumlah_positif' =>$data->sum('jumlah_positif'),
            'jumlah_sembuh' =>$data->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$data->sum('jumlah_meninggal'),
        ];
        
        $rest = [
            'status' => 200,
            'data' => [
                'Hari Ini' => $data_skrg,
                'total' => $data
            ],
            'message' => 'Data Kasus Kota Ditampilkan'
        ];
        
        return response()->json($rest, 200);
    }

    public function kecamatan_index()
    {
        $hariini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('laporans')
                    ->select(DB::raw('kecamatans.id'),
                             DB::raw('kecamatans.nama_kecamatan'),
                             DB::raw('SUM(laporans.jumlah_positif) as jumlah_positif'),
                             DB::raw('SUM(laporans.jumlah_sembuh) as jumlah_sembuh'),
                             DB::raw('SUM(laporans.jumlah_meninggal) as jumlah_meninggal'),
                             DB::raw('MAX(tanggal) as tanggal'))
                             ->whereDay('tanggal', '=' , $hariini)
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                    ->whereDate('laporans.tanggal', date('Y-m-d'))
                    ->groupby('kecamatans.id')
                    ->get();

        $data = DB::table('laporans')
                    ->select(DB::raw('kecamatans.id'),
                             DB::raw('kecamatans.nama_kecamatan'),
                             DB::raw('SUM(laporans.jumlah_positif) as jumlah_positif'),
                             DB::raw('SUM(laporans.jumlah_sembuh) as jumlah_sembuh'),
                             DB::raw('SUM(laporans.jumlah_meninggal) as jumlah_meninggal'))
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                    ->groupby('kecamatans.id')
                    ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$data_skrg],
            'Total' =>[$data]
            ],
            'message' => 'Data Kasus Kecamatan Ditampilkan'
        ];
        return response()->json($rest, 200);
    }

    public function showkecamatan($id)
    {
        $data_skrg = DB::table('laporans')
                    ->select('jumlah_positif', 'jumlah_sembuh', 'jumlah_meninggal')
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                    ->where('kecamatans.id', $id)
                    ->where('laporans.tanggal', date('Y-m-d'))
                    ->get();

        $data = DB::table('laporans')
                    ->select('jumlah_positif', 'jumlah_sembuh', 'jumlah_meninggal')
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                    ->where('kecamatans.id', $id)
                    ->get();
        
        $data_skrg = [
            'jumlah_positif' =>$data_skrg->sum('jumlah_positif'),
            'jumlah_sembuh' =>$data_skrg->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$data_skrg->sum('jumlah_meninggal'),
        ];

        $data = [
            'jumlah_positif' =>$data->sum('jumlah_positif'),
            'jumlah_sembuh' =>$data->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$data->sum('jumlah_meninggal'),
        ];

        $rest = [
            'status' => 200,
            'data' => [
                'Hari Ini' => $data_skrg,
                'total' => $data
            ],
            'message' => 'Data Kasus Kecamatan Ditampilkan'
        ];
        
        return response()->json($rest, 200);
    }

    public function kelurahan_index()
    {
        $hariini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('laporans')
                    ->select(DB::raw('kelurahans.id'),
                             DB::raw('kelurahans.nama_kelurahan'),
                             DB::raw('SUM(laporans.jumlah_positif) as jumlah_positif'),
                             DB::raw('SUM(laporans.jumlah_sembuh) as jumlah_sembuh'),
                             DB::raw('SUM(laporans.jumlah_meninggal) as jumlah_meninggal'),
                             DB::raw('MAX(tanggal) as tanggal'))
                             ->whereDay('tanggal', '=' , $hariini)
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->whereDate('laporans.tanggal', date('Y-m-d'))
                    ->groupby('kelurahans.id')
                    ->get();

        $data = DB::table('laporans')
                    ->select(DB::raw('kelurahans.id'),
                             DB::raw('kelurahans.nama_kelurahan'),
                             DB::raw('SUM(laporans.jumlah_positif) as jumlah_positif'),
                             DB::raw('SUM(laporans.jumlah_sembuh) as jumlah_sembuh'),
                             DB::raw('SUM(laporans.jumlah_meninggal) as jumlah_meninggal'))
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->groupby('kelurahans.id')
                    ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$data_skrg],
            'Total' =>[$data]
            ],
            'message' => 'Data Kasus Kelurahan Ditampilkan'
        ];
        return response()->json($rest, 200);
    }

    public function showkelurahan($id)
    {
        $data_skrg = DB::table('laporans')
                    ->select('jumlah_positif', 'jumlah_sembuh', 'jumlah_meninggal')
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->where('kelurahans.id', $id)
                    ->where('laporans.tanggal', date('Y-m-d'))
                    ->get();

        $data = DB::table('laporans')
                    ->select('jumlah_positif', 'jumlah_sembuh', 'jumlah_meninggal')
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->where('kelurahans.id', $id)
                    ->get();
        $data_skrg = [
            'jumlah_positif' =>$data_skrg->sum('jumlah_positif'),
            'jumlah_sembuh' =>$data_skrg->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$data_skrg->sum('jumlah_meninggal'),
        ];

        $data = [
            'jumlah_positif' =>$data->sum('jumlah_positif'),
            'jumlah_sembuh' =>$data->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$data->sum('jumlah_meninggal'),
        ];
        
        $rest = [
            'status' => 200,
            'data' => [
                'Hari Ini' => $data_skrg,
                'total' => $data
            ],
            'message' => 'Data Kasus Kelurahan Ditampilkan'
        ];
        
        return response()->json($rest, 200);
    }

    public function rw_index()
    {
        $hariini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('laporans')
                    ->select(DB::raw('rws.id'),
                             DB::raw('rws.nama'),
                             DB::raw('SUM(laporans.jumlah_positif) as jumlah_positif'),
                             DB::raw('SUM(laporans.jumlah_sembuh) as jumlah_sembuh'),
                             DB::raw('SUM(laporans.jumlah_meninggal) as jumlah_meninggal'),
                             DB::raw('MAX(tanggal) as tanggal'))
                             ->whereDay('tanggal', '=' , $hariini)
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->whereDate('laporans.tanggal', date('Y-m-d'))
                    ->groupby('rws.id')
                    ->get();

        $data = DB::table('laporans')
                    ->select(DB::raw('rws.id'),
                             DB::raw('rws.nama'),
                             DB::raw('SUM(laporans.jumlah_positif) as jumlah_positif'),
                             DB::raw('SUM(laporans.jumlah_sembuh) as jumlah_sembuh'),
                             DB::raw('SUM(laporans.jumlah_meninggal) as jumlah_meninggal'))
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->groupby('rws.id')
                    ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
            'Hari Ini' =>[$data_skrg],
            'Total' =>[$data]
            ],
            'message' => 'Data Kasus Rw Ditampilkan'
        ];
        return response()->json($rest, 200);
    }

    public function showrw($id)
    {
        $data_skrg = DB::table('laporans')
                    ->select('jumlah_positif', 'jumlah_sembuh', 'jumlah_meninggal')
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->where('rws.id', $id)
                    ->where('laporans.tanggal', date('Y-m-d'))
                    ->get();

        $data = DB::table('laporans')
                    ->select('jumlah_positif', 'jumlah_sembuh', 'jumlah_meninggal')
                    ->join('rws' ,'laporans.id_rw', '=', 'rws.id')
                    ->where('rws.id', $id)
                    ->get();
        
        $data_skrg = [
            'jumlah_positif' =>$data_skrg->sum('jumlah_positif'),
            'jumlah_sembuh' =>$data_skrg->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$data_skrg->sum('jumlah_meninggal'),
        ];

        $data = [
            'jumlah_positif' =>$data->sum('jumlah_positif'),
            'jumlah_sembuh' =>$data->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$data->sum('jumlah_meninggal'),
        ];
        $rest = [
            'status' => 200,
            'data' => [
                'Hari Ini' => $data_skrg,
                'total' => $data
            ],
            'message' => 'Data Kasus Rw Ditampilkan'
        ];
        
        return response()->json($rest, 200);
    }
}
