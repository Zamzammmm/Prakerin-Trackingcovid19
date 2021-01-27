@extends('layouts.backend')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Tambah Data Laporan
        </div>
        <div class="card-body">
            <form action="{{route('laporan.store')}}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="id_rw">Rw</label>
                        <select name="id_rw" id="id_rw" class="form-control" required>
                            @foreach ($rw as $data)
                            <option value="{{$data->id}}">{{$data->nama}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_positif" class="control-label">Jumlah Positif</label>
                        <input type="text" name="jumlah_positif" id="jumlah_positif" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_sembuh" class="control-label">Jumlah Sembuh</label>
                        <input type="text" name="jumlah_sembuh" id="jumlah_sembuh" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_meninggal" class="control-label">Jumlah Meninggal</label>
                        <input type="text" name="jumlah_meninggal" id="jumlah_meninggal" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="tanggal" class="control-label">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endSection