<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
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
        $request->validate([
            'kode_kecamatan' => 'required|numeric|unique:kecamatans',
            'nama_kecamatan' => 'required|regex:/^[a-z A-Z]+$/u|min:4|max:28|unique:kecamatans',
        ], [
            'kode_kecamatan.required' => 'Kode Kecamatan tidak boleh kosong',
            'kode_kecamatan.numeric' => 'Kode Kecamatan tidak boleh menggunakan huruf abjad.',
            // 'kode_kecamatan.max' => 'Kode Maximal 9 karakter',
            'kode_kecamatan.unique' => 'Kode Kecamatan sudah terdaftar',
            'nama_kecamatan.required' => 'Nama Kecamatan tidak boleh kosong',
            'nama_kecamatan.regex' => 'Nama Kecamatan tidak boleh menggunakan angka.',
            'nama_kecamatan.min' => 'Kode Minimal 4 karakter',
            'nama_kecamatan.max' => 'Kode maximal 28 karakter',
            'nama_kecamatan.unique' => 'Nama Kecamatan sudah terdaftar'
    ]);

        $kecamatan = new Kecamatan();
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        Alert::success('Sukses', 'Data Berhasil Disimpan', 'Success');
        return redirect()->route('kecamatan');
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
        $request->validate([
            'kode_kecamatan' => 'required|numeric',
            'nama_kecamatan' => 'required|regex:/^[a-z A-Z]+$/u|min:4|max:28',
        ],[
            'kode_kecamatan.required' => 'Kode Kecamatan tidak boleh kosong',
            'kode_kecamatan.numeric' => 'Kode Kecamatan tidak boleh menggunakan huruf abjad.',
            // 'kode_kecamatan.max' => 'Kode Maximal 9 karakter',
            'nama_kecamatan.required' => 'Nama Kecamatan tidak boleh kosong',
            'nama_kecamatan.regex' => 'Nama Kecamatan tidak boleh menggunakan angka.',
            'nama_kecamatan.min' => 'Kode Minimal 4 karakter',
            'nama_kecamatan.max' => 'Kode Maximal 28 karakter',
    ]);

        // dd($request->all());
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        Alert::success('Sukses', 'Data Berhasil Diedit', 'Success');
        return redirect()->route('kecamatan');
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus', 'Success');
        return redirect('kecamatan');
    }
}
