<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Session;

class KelurahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function index()
    {
        $kelurahan = Kelurahan::join('kecamatans','id_kecamatan','=','kecamatans.id')->select('kelurahans.*','kecamatans.nama_kecamatan')->get();
        return view('admin.kelurahan.index',compact('kelurahan')); 
    }

    public function create()
    {
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        return view('admin.kelurahan.create',compact('kelurahan','kecamatan'));
    }

    public function store(Request $request)
    {
        $kelurahan = new Kelurahan();
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan')
                ->with(['message'=>'Data Kelurahan Berhasil Di Buat']);
    }

    public function show($id)
    {
        $kelurahan = kelurahan::join('kecamatans','id_kecamatan','=','kecamatans.id')->select('kelurahans.*','kecamatans.nama_kecamatan')->where('kelurahans.id', $id)->get();
        return view('admin.kelurahan.show',compact('kelurahan'));
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::findOrFail($id);
        return view('admin.kelurahan.edit',compact('kelurahan','kecamatan'));
    }

    public function update($id,Request $request)
    {
        // dd($request->all());
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan')
                ->with(['message'=>'Data Kelurahan Berhasil Di Edit']);
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id)->delete();
        return redirect('kelurahan')
                ->with(['message'=>'Data Kelurahan Berhasil Di Hapus']);
    }
}