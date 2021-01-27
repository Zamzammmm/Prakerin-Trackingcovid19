@extends('layouts.backend')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Tambah Data Kecamatan
        </div>
        <div class="card-body">
            <form action="{{route('kecamatan.store')}}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="id_kota">Nama Kota</label>
                        <select name="id_kota" id="id_kota" class="form-control" required>
                            @foreach ($kota as $data)
                            <option value="{{$data->id}}">{{$data->nama_kota}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="kode_kecamatan" class="control-label">Kode Kecamatan</label>
                        <input type="text" name="kode_kecamatan" id="kode_kecamatan" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_kecamatan" class="control-label">Nama Kecamatan</label>
                        <input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control" required>
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