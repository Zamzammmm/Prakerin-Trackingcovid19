@extends('layouts.backend')
@section('active')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Tambah Rw</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Rw</li>
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
            Form Tambah Data Rw
        </div>
        <div class="card-body">
            <form action="{{route('rw.store')}}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="id_kelurahan">Nama Kelurahan</label>
                        <select name="id_kelurahan" id="id_kelurahan" class="form-control">
                            @foreach ($kelurahan as $data)
                            <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama" class="control-label">Rw</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama')}}" autofocus>
                        @error('nama')
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