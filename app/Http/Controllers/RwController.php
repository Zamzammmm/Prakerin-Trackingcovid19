<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rw;
use App\Models\Kelurahan;
use Session;

class RwController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function index()
    {
        $rw = Rw::join('kelurahans','id_kelurahan','=','kelurahans.id')->select('rws.*','kelurahans.nama_kelurahan')->get();
        return view('admin.rw.index',compact('rw')); 
    }

    public function create()
    {
        $rw = Rw::all();
        $kelurahan = Kelurahan::all();
        return view('admin.rw.create',compact('rw','kelurahan'));
    }

    public function store(Request $request)
    {
        $rw = new Rw();
        $rw->nama = $request->nama;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw')
                ->with(['message'=>'Data Rw Berhasil Di Buat']);
    }

    public function show($id)
    {
        $rw = Rw::join('kelurahans','id_kelurahan','=','kelurahans.id')->select('rws.*','kelurahans.nama_kelurahan')->where('rws.id', $id)->get();
        return view('admin.rw.show',compact('rw'));
    }

    public function edit($id)
    {
        $kelurahan = Kelurahan::all();
        $rw = rw::findOrFail($id);
        return view('admin.rw.edit',compact('rw','kelurahan'));
    }

    public function update($id,Request $request)
    {
        // dd($request->all());
        $rw = Rw::findOrFail($id);
        $rw->nama = $request->nama;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw')
                ->with(['message'=>'Data Rw Berhasil Di Edit']);
    }

    public function destroy($id)
    {
        $rw = Rw::findOrFail($id)->delete();
        return redirect('rw')
                ->with(['message'=>'Data Rw Berhasil Di Hapus']);
    }
}
