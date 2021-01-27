@extends('layouts.backend')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Tambah Data Rw
        </div>
        <div class="card-body">
            <form action="{{route('rw.store')}}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="id_kelurahan">Nama Kelurahan</label>
                        <select name="id_kelurahan" id="id_kelurahan" class="form-control" required>
                            @foreach ($kelurahan as $data)
                            <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama" class="control-label">Rw</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
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