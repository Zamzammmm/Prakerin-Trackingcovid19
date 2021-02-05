<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
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
        $request->validate([
            'kode_kota' => 'required|numeric|unique:kotas',
            'nama_kota' => 'required|regex:/^[a-z A-Z]+$/u|min:4|max:28|unique:kotas',
        ], [
            'kode_kota.required' => 'Kode Kota tidak boleh kosong',
            'kode_kota.numeric' => 'Kode Kota tidak boleh menggunakan huruf abjad.',
            // 'kode_kota.max' => 'Kode Maximal 7 karakter',
            'kode_kota.unique' => 'Kode Kota sudah terdaftar',
            'nama_kota.required' => 'Nama Kota tidak boleh kosong',
            'nama_kota.regex' => 'Nama Kota tidak boleh menggunakan angka.',
            'nama_kota.min' => 'Kode Minimal 4 karakter',
            'nama_kota.max' => 'Kode maximal 28 karakter',
            'nama_kota.unique' => 'Nama Kota sudah terdaftar'
    ]);

        $kota = new Kota();
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        Alert::success('Sukses', 'Data Berhasil Disimpan', 'Success');
        return redirect()->route('kota');
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
        $request->validate([
            'kode_kota' => 'required|numeric',
            'nama_kota' => 'required|regex:/^[a-z A-Z]+$/u|min:4|max:28',
        ],[
            'kode_kota.required' => 'Kode Kota tidak boleh kosong',
            'kode_kota.numeric' => 'Kode Kota tidak boleh menggunakan huruf abjad.',
            // 'kode_kota.max' => 'Kode Maximal 7 karakter',
            'nama_kota.required' => 'Nama Kota tidak boleh kosong',
            'nama_kota.regex' => 'Nama Kota tidak boleh menggunakan angka.',
            'nama_kota.min' => 'Kode Minimal 4 karakter',
            'nama_kota.max' => 'Kode Maximal 28 karakter',
    ]);

        // dd($request->all());
        $kota = Kota::findOrFail($id);
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        Alert::success('Sukses', 'Data Berhasil Diedit', 'Success');
        return redirect()->route('kota');
    }

    public function destroy($id)
    {
        $kota = Kota::findOrFail($id)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus', 'Success');
        return redirect('kota');
    }
}