@extends('layouts.backend')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Tambah Data Kota
        </div>
        <div class="card-body">
            <form action="{{route('kota.store')}}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="id_provinsi">Nama Provinsi</label>
                        <select name="id_provinsi" id="id_provinsi" class="form-control" required>
                            @foreach ($provinsi as $data)
                            <option value="{{$data->id}}">{{$data->nama_provinsi}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="kode_kota" class="control-label">Kode Kota</label>
                        <input type="text" name="kode_kota" id="kode_kota" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_kota" class="control-label">Nama Kota</label>
                        <input type="text" name="nama_kota" id="nama_kota" class="form-control" required>
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