<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use Session;

class ProvinsiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('admin.provinsi.index',compact('provinsi')); 
    }

    public function create()
    {
        $provinsi = Provinsi::all();
        return view('admin.provinsi.create',compact('provinsi'));
    }

    public function store(Request $request)
    {
        $provinsi = new Provinsi();
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi')
                ->with(['message'=>'Data Provinsi Berhasil Di Buat']);
    }

    public function show($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.show',compact('provinsi'));
    }

    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.edit',compact('provinsi'));
    }

    public function update($id,Request $request)
    {
        // dd($request->all());
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi')
                ->with(['message'=>'Data Provinsi Berhasil Di Edit']);
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id)->delete();
        return redirect('provinsi')->with(['message'=>'Data Provinsi Berhasil Di Hapus']);
    }
}
