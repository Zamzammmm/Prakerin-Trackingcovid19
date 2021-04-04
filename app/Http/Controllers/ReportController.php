<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Laporan;
use PDF;

class ReportController extends Controller
{
    public function getReportProvinsi()
    {
        return view('admin.reports.provinsi');
    }

     public function ReportProvinsi(Request $request)
    {
        $awal = $request->awal;
        $akhir = $request->akhir;
        if ($awal < $akhir) {

            $provinsi = Provinsi::select('provinsis.id', 'provinsis.kode_provinsi', 'provinsis.nama_provinsi', 'laporans.jumlah_positif', 'laporans.jumlah_sembuh', 'laporans.jumlah_meninggal', 'laporans.tanggal')
                ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
                ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                ->join('laporans', 'rws.id', '=', 'laporans.id_rw')
                ->whereBetween('laporans.tanggal', [$awal, $akhir])
                ->get();
            return view('admin.reports.provinsi', compact('provinsi'));
        } elseif ($awal > $akhir) {
            return redirect()->back()->with(['error' => 'Tanggal yang dimasukkan tidak valid']);
        }
    }

    public function Report()
    {
        $laporan = Laporan::with('RW')->get();
        $pdf = PDF::loadview('admin/reports.laporan', compact('laporan'));
        return $pdf->download('Report-laporan.pdf');
    }
}