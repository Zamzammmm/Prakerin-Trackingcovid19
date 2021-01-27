<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Rw;
use Session;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function index()
    {
        $laporan = Laporan::join('rws','id_rw','=','rws.id')->select('laporans.*','rws.nama')->get();
        return view('admin.laporan.index',compact('laporan')); 
    }

    public function create()
    {
        $laporan = Laporan::all();
        $rw = Rw::all();
        return view('admin.laporan.create',compact('laporan','rw'));
    }

    public function store(Request $request)
    {
        $laporan = new Laporan();
        $laporan->jumlah_positif = $request->jumlah_positif;
        $laporan->jumlah_sembuh = $request->jumlah_sembuh;
        $laporan->jumlah_meninggal = $request->jumlah_meninggal;
        $laporan->tanggal = $request->tanggal;
        $laporan->id_rw = $request->id_rw;
        $laporan->save();
        return redirect()->route('laporan')
                ->with(['message'=>'Data Laporan Berhasil Di Buat']);
    }

    public function show($id)
    {
        $laporan = Laporan::join('rws','id_rw','=','rws.id')->select('laporans.*','rws.nama')->where('laporans.id', $id)->get();
        return view('admin.laporan.show',compact('laporan'));
    }

    public function edit($id)
    {
        $rw = Rw::all();
        $laporan = Laporan::findOrFail($id);
        return view('admin.laporan.edit',compact('laporan','rw'));
    }

    public function update($id,Request $request)
    {
        // dd($request->all());
        $laporan = Laporan::findOrFail($id);
        $laporan->jumlah_positif = $request->jumlah_positif;
        $laporan->jumlah_sembuh = $request->jumlah_sembuh;
        $laporan->jumlah_meninggal = $request->jumlah_meninggal;
        $laporan->tanggal = $request->tanggal;
        $laporan->id_rw = $request->id_rw;
        $laporan->save();
        return redirect()->route('laporan')
                ->with(['message'=>'Data Laporan Berhasil Di Edit']);
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id)->delete();
        return redirect('laporan')
                ->with(['message'=>'Data Laporan Berhasil Di Hapus']);
    }
}