<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kota;
use Session;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function index()
    {
        $kecamatan = Kecamatan::join('kotas','id_kota','=','kotas.id')->select('kecamatans.*','kotas.nama_kota')->get();
        return view('admin.kecamatan.index',compact('kecamatan')); 
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        $kota = Kota::all();
        return view('admin.kecamatan.create',compact('kecamatan','kota'));
    }

    public function store(Request $request)
    {
        $kecamatan = new Kecamatan();
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan')
                ->with(['message'=>'Data Kecamatan Berhasil Di Buat']);
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::join('kotas','id_kota','=','kotas.id')->select('kecamatans.*','kotas.nama_kota')->where('kecamatans.id', $id)->get();
        return view('admin.kecamatan.show',compact('kecamatan'));
    }

    public function edit($id)
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.edit',compact('kecamatan','kota'));
    }

    public function update($id,Request $request)
    {
        // dd($request->all());
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan')
                ->with(['message'=>'Data Kecamatan Berhasil Di Edit']);
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id)->delete();
        return redirect('kecamatan')
                ->with(['message'=>'Data Kecamatan Berhasil Di Hapus']);
    }
}
