<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;
use App\Models\Provinsi;
use Session;

class KotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function index()
    {
        $kota = Kota::join('provinsis','id_provinsi','=','provinsis.id')->select('kotas.*','provinsis.nama_provinsi')->get();
        return view('admin.kota.index',compact('kota')); 
    }

    public function create()
    {
        $kota = Kota::all();
        $provinsi = Provinsi::all();
        return view('admin.kota.create',compact('kota','provinsi'));
    }

    public function store(Request $request)
    {
        $kota = new Kota();
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota')
                ->with(['message'=>'Data Kota Berhasil Di Buat']);
    }

    public function show($id)
    {
        $kota = Kota::join('provinsis','id_provinsi','=','provinsis.id')->select('kotas.*','provinsis.nama_provinsi')->where('kotas.id', $id)->get();
        return view('admin.kota.show',compact('kota'));
    }

    public function edit($id)
    {
        $provinsi = Provinsi::all();
        $kota = Kota::findOrFail($id);
        return view('admin.kota.edit',compact('kota','provinsi'));
    }

    public function update($id,Request $request)
    {
        // dd($request->all());
        $kota = Kota::findOrFail($id);
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota')
                ->with(['message'=>'Data Kota Berhasil Di Edit']);
    }

    public function destroy($id)
    {
        $kota = Kota::findOrFail($id)->delete();
        return redirect('kota')
                ->with(['message'=>'Data Kota Berhasil Di Hapus']);
    }
}