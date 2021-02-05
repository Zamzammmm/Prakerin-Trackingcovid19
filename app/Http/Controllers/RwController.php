<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
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
        $request->validate([
            'nama' => 'required|numeric|unique:rws',
        ], [
            'nama.required' => 'Nama Rw tidak boleh kosong',
            'nama.numeric' => 'Kode Provinsi tidak boleh menggunakan huruf abjad.',
            'nama.unique' => 'Nama Rw sudah terdaftar'
    ]);

        $rw = new Rw();
        $rw->nama = $request->nama;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        Alert::success('Sukses', 'Data Berhasil Disimpan', 'Success');
        return redirect()->route('rw');
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
        $request->validate([
            'nama' => 'required|numeric',
        ],[
            'nama.required' => 'Nama Rw tidak boleh kosong',
            'nama.numeric' => 'Kode Provinsi tidak boleh menggunakan huruf abjad.',
    ]);

        // dd($request->all());
        $rw = Rw::findOrFail($id);
        $rw->nama = $request->nama;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        Alert::success('Sukses', 'Data Berhasil Diedit', 'Success');
        return redirect()->route('rw');
    }

    public function destroy($id)
    {
        $rw = Rw::findOrFail($id)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus', 'Success');
        return redirect('rw');
    }
}
