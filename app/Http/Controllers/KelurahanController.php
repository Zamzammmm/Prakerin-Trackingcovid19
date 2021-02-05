<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
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
        $request->validate([
            'nama_kelurahan' => 'required|regex:/^[a-z A-Z]+$/u|min:4|max:28|unique:kelurahans',
        ], [
            'nama_kelurahan.required' => 'Nama Kelurahan tidak boleh kosong',
            'nama_kelurahan.regex' => 'Nama Kelurahan tidak boleh menggunakan angka.',
            'nama_kelurahan.min' => 'Kode Minimal 4 karakter',
            'nama_kelurahan.max' => 'Kode maximal 28 karakter',
            'nama_kelurahan.unique' => 'Nama Kelurahan sudah terdaftar'
    ]);

        $kelurahan = new Kelurahan();
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        Alert::success('Sukses', 'Data Berhasil Disimpan', 'Success');
        return redirect()->route('kelurahan');
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
        $request->validate([
            'nama_kelurahan' => 'required|regex:/^[a-z A-Z]+$/u|min:4|max:28',
        ],[
            'nama_kelurahan.required' => 'Nama Kelurahan tidak boleh kosong',
            'nama_kelurahan.regex' => 'Nama Kelurahan tidak boleh menggunakan angka.',
            'nama_kelurahan.min' => 'Kode Minimal 4 karakter',
            'nama_kelurahan.max' => 'Kode Maximal 28 karakter',
    ]);

        // dd($request->all());
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        Alert::success('Sukses', 'Data Berhasil Diedit', 'Success');
        return redirect()->route('kelurahan');
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus', 'Success');
        return redirect('kelurahan');
    }
}