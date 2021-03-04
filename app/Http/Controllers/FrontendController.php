<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DB;
use App\Http\Models\Provinsi;
use App\Http\Models\Kota;
use App\Http\Models\Kecamatan;
use App\Http\Models\Kelurahan;
use App\Http\Models\RW;
use App\Http\Models\Laporan;
use carbon\carbon;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlah_positif = DB::table('rws')->select('laporans.jumlah_positif',
                    'laporans.jumlah_sembuh','laporans.jumlah_meninggal')
                    ->join('laporans','rws.id','=','laporans.id_rw')
                    ->sum('laporans.jumlah_positif');
        $jumlah_sembuh = DB::table('rws')->select('laporans.jumlah_positif',
                    'laporans.jumlah_sembuh','laporans.jumlah_meninggal')
                    ->join('laporans','rws.id','=','laporans.id_rw')
                    ->sum('laporans.jumlah_sembuh');
        $jumlah_meninggal = DB::table('rws')->select('laporans.jumlah_positif',
                    'laporans.jumlah_sembuh','laporans.jumlah_meninggal')
                    ->join('laporans','rws.id','=','laporans.id_rw')
                    ->sum('laporans.jumlah_meninggal');
        $global = file_get_contents('https://api.kawalcorona.com/positif');
        $posglobal = json_decode($global, TRUE);

        // Date
        $tanggal = Carbon::now()->format('D d-M-Y h:i:s');

        // Table Provinsi
        $data = DB::table('provinsis')
                  ->join('kotas','kotas.id_provinsi','=','provinsis.id')
                  ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                  ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
                  ->join('rws','rws.id_kelurahan','=','kelurahans.id')
                  ->join('laporans','laporans.id_rw','=','rws.id')
                  ->select('nama_provinsi',
                          DB::raw('sum(laporans.jumlah_positif) as jumlah_positif'),
                          DB::raw('sum(laporans.jumlah_sembuh) as jumlah_sembuh'),
                          DB::raw('sum(laporans.jumlah_meninggal) as jumlah_meninggal'))
                  ->groupBy('nama_provinsi')->orderBy('nama_provinsi','ASC')
                  ->get();     
                  
        // Table Global
        $datadunia= file_get_contents("https://api.kawalcorona.com/");
        $dunia = json_decode($datadunia, TRUE);       
        return view('frontend',compact('jumlah_positif','jumlah_sembuh','jumlah_meninggal','posglobal','tanggal' ,'data', 'dunia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
