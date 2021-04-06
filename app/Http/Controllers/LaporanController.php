<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Rw;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Session;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function index()
    {
        $laporan = Laporan::with('rw.kelurahan.kecamatan.kota.provinsi')->get();
        return view('admin.laporan.index',compact('laporan')); 
    }

    public function create()
    {
        $laporan = Laporan::all();
        $provinsi = Provinsi::all();
        return view('admin.laporan.create',compact('laporan','provinsi'));
    }

    public function store(Request $request)
    {
        $positif = (int)$request->jumlah_positif;
        $meninggal = $request->jumlah_positif-$request->jumlah_sembuh;
        $request->validate([
            'jumlah_positif' => 'required|numeric|min:1',
            'jumlah_sembuh' => "required|numeric|min:1|max:$positif",
            'jumlah_meninggal' => "required||numeric|min:1|max:$meninggal",
        ], [
            'jumlah_positif.required' => 'Data tidak boleh kosong',
            'jumlah_positif.min' => 'Jumlah positif tidak boleh kurang dari 1',
            'jumlah_sembuh.required' => 'Data tidak boleh kosong',
            'jumlah_sembuh.min' => 'Jumlah sembuh tidak boleh kurang dari 1',
            'jumlah_sembuh.max' => 'Jumlah sembuh tidak boleh melebihi jumlah Positif',
            'jumlah_meninggal.required' => 'Data tidak boleh kosong',
            'jumlah_meninggal.min' => 'Jumlah meninggal tidak boleh kurang dari 1',
            'jumlah_meninggal.max' => 'Jumlah meninggal tidak boleh melebihi jumlah Positif dan Sembuh ',
        ]);
        $laporan = new Laporan();
        $laporan->jumlah_positif = $request->jumlah_positif;
        $laporan->jumlah_sembuh = $request->jumlah_sembuh;
        $laporan->jumlah_meninggal = $request->jumlah_meninggal;
        $laporan->tanggal = date('Y-m-d');
        $laporan->id_rw = $request->id_rw;
        $laporan->save();
        Alert::success('Sukses', 'Data Berhasil Disimpan', 'Success');
        return redirect()->route('laporan');
    }

    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.laporan.show',compact('laporan'));
    }

    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        $rw = Rw::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        return view('admin.laporan.edit',compact('laporan','rw','provinsi','kota','kecamatan','kelurahan'));
    }

    public function update($id,Request $request)
    {

        $positif = (int)$request->jumlah_positif;
        $meninggal = $request->jumlah_positif-$request->jumlah_sembuh;
        $request->validate([
            'jumlah_positif' => 'required|numeric|min:1',
            'jumlah_sembuh' => "required|numeric|min:1|max:$positif",
            'jumlah_meninggal' => "required|numeric|min:1|max:$meninggal",
        ], [
            'jumlah_positif.required' => 'Data tidak boleh kosong',
            'jumlah_positif.min' => 'Jumlah positif tidak boleh kurang dari 1',
            'jumlah_sembuh.required' => 'Data tidak boleh kosong',
            'jumlah_sembuh.min' => 'Jumlah sembuh tidak boleh kurang dari 1',
            'jumlah_sembuh.max' => 'Jumlah sembuh tidak boleh melebihi jumlah Positif',
            'jumlah_meninggal.required' => 'Data tidak boleh kosong',
            'jumlah_meninggal.min' => 'Jumlah meninggal tidak boleh kurang dari 1',
            'jumlah_meninggal.max' => 'Jumlah meninggal tidak boleh melebihi jumlah Positif dan Sembuh ',
        ]);
        
        // dd($request->all());
        $laporan = Laporan::findOrFail($id);
        $laporan->jumlah_positif = $request->jumlah_positif;
        $laporan->jumlah_sembuh = $request->jumlah_sembuh;
        $laporan->jumlah_meninggal = $request->jumlah_meninggal;
        $laporan->tanggal = date('Y-m-d');
        $laporan->id_rw = $request->id_rw;
        $laporan->save();
        Alert::success('Sukses', 'Data Berhasil Diedit', 'Success');
        return redirect()->route('laporan');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus', 'Success');
        return redirect('laporan');
    }
    public function get_kota($id)
    {
        $kota = Kota::where('id_provinsi',$id)->get();
        $html = '';
        $html .= '<option selected disabled>-- Pilih Kota --</option>';
        foreach ($kota as $data) {
            $html .= '<option value="'.$data->id.'">'.$data->nama_kota.'</option>';
        }
        return response()->json(['html' => $html]);
        
    }
    public function get_kecamatan($id)
    {
        $kecamatan = Kecamatan::where('id_kota',$id)->get();
        $html = '';
        $html .= '<option selected disabled>-- Pilih Kecamatan --</option>';
        foreach ($kecamatan as $data) {
            $html .= '<option value="'.$data->id.'">'.$data->nama_kecamatan.'</option>';
        }
        return response()->json(['html' => $html]);
        
    }

    public function get_kelurahan($id)
    {
        $kelurahan = Kelurahan::where('id_kecamatan',$id)->get();
        $html = '';
        $html .= '<option selected disabled>-- Pilih Kelurahan --</option>';
        foreach ($kelurahan as $data) {
            $html .= '<option value="'.$data->id.'">'.$data->nama_kelurahan.'</option>';
        }
        return response()->json(['html' => $html]);
        
    }

    public function get_rw($id)
    {
        $rw = Rw::where('id_kelurahan',$id)->get();
        $html = '';
        $html .= '<option selected disabled>-- Pilih Rw --</option>';
        foreach ($rw as $data) {
            $html .= '<option value="'.$data->id.'">'.$data->nama.'</option>';
        }
        return response()->json(['html' => $html]);
        
    }
    
}