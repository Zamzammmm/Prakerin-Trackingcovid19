@extends('layouts.backend')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Lihat Data Laporan
        </div>
        <div class="card-body">
                <div class="row">
                    @foreach ($laporan as $data)
                    <div class="form-group col-lg-6">
                        <label for="nama" class="control-label">Rw</label>
                        <input type="text" name="nama" id="nama" value="{{$data->nama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_positif" class="control-label">Jumlah Positif</label>
                        <input type="text" name="jumlah_positif" id="jumlah_positif" value="{{$data->jumlah_positif}}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_sembuh" class="control-label">Jumlah Sembuh</label>
                        <input type="text" name="jumlah_sembuh" id="jumlah_sembuh" value="{{$data->jumlah_sembuh}}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_meninggal" class="control-label">Jumlah Meninggal</label>
                        <input type="text" name="jumlah_meninggal" id="jumlah_meninggal" value="{{$data->jumlah_meninggal}}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="tanggal" class="control-label">Tanggal</label>
                        <input type="text" name="tanggal" id="tanggal" value="{{$data->tanggal}}" class="form-control" readonly>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <a href="{{url()->previous()}}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endSection