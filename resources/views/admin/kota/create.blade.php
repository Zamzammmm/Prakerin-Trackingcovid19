@extends('layouts.backend')
@section('active')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Tambah Kota</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Kota</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
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
                        <select name="id_provinsi" id="id_provinsi" class="form-control">
                            @foreach ($provinsi as $data)
                            <option value="{{$data->id}}">{{$data->nama_provinsi}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="kode_kota" class="control-label">Kode Kota</label>
                        <input type="text" name="kode_kota" id="kode_kota" class="form-control @error('kode_kota') is-invalid @enderror" value="{{ old('kode_kota')}}" autofocus>
                        @error('kode_kota')
                        <div class="invalid_feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_kota" class="control-label">Nama Kota</label>
                        <input type="text" name="nama_kota" id="nama_kota" class="form-control @error('kode_kota') is-invalid @enderror" value="{{ old('nama_kota')}}">
                        @error('nama_kota')
                        <div class="invalid_feedback" style="color:red">{{ $message }}</div>
                        @enderror
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