<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
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
        $request->validate([
            'kode_provinsi' => 'required|numeric|unique:provinsis',
            'nama_provinsi' => 'required|regex:/^[a-z A-Z]+$/u|min:3|max:30|unique:provinsis',
        ], [
            'kode_provinsi.required' => 'Kode Provinsi tidak boleh kosong',
            'kode_provinsi.numeric' => 'Kode Provinsi tidak boleh menggunakan huruf abjad.',
            // 'kode_provinsi.max' => 'Kode Maximal 3 karakter',
            'kode_provinsi.unique' => 'Kode Provinsi sudah terdaftar',
            'nama_provinsi.required' => 'Nama Provinsi tidak boleh kosong',
            'nama_provinsi.regex' => 'Nama Provinsi tidak boleh menggunakan angka.',
            'nama_provinsi.min' => 'Kode Minimal 3 karakter',
            'nama_provinsi.max' => 'Kode maximal 30 karakter',
            'nama_provinsi.unique' => 'Nama Provinsi sudah terdaftar'
    ]);

        $provinsi = new Provinsi();
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        Alert::success('Sukses', 'Data Berhasil Disimpan', 'Success');
        return redirect()->route('provinsi');
                
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
        $request->validate([
            'kode_provinsi' => 'required|numeric',
            'nama_provinsi' => 'required|regex:/^[a-z A-Z]+$/u|min:3|max:30',
        ],[
            'kode_provinsi.required' => 'Kode Provinsi tidak boleh kosong',
            'kode_provinsi.numeric' => 'Kode Provinsi tidak boleh menggunakan huruf abjad.',
            // 'kode_provinsi.max' => 'Kode Maximal 3 karakter',
            'nama_provinsi.required' => 'Nama Provinsi tidak boleh kosong',
            'nama_provinsi.regex' => 'Nama Provinsi tidak boleh menggunakan angka.',
            'nama_provinsi.min' => 'Kode Minimal 3 karakter',
            'nama_provinsi.max' => 'Kode Maximal 30 karakter',
    ]);

        // dd($request->all());
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        Alert::success('Sukses', 'Data Berhasil Diedit', 'Success');
        return redirect()->route('provinsi');
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus', 'Success');
        return redirect('provinsi');
    }
}
