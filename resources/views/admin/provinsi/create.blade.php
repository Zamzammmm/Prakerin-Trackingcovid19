@extends('layouts.backend')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Tambah Data Provinsi
        </div>
        <div class="card-body">
            <form action="{{route('provinsi.store')}}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="kode_provinsi" class="control-label">Kode Provinsi</label>
                        <input type="text" name="kode_provinsi" id="kode_provinsi" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_provinsi" class="control-label">Nama Provinsi</label>
                        <input type="text" name="nama_provinsi" id="nama_provinsi" class="form-control" required>
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