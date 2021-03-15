@extends('layouts.backend')
@section('active')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Lihat Kelurahan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Kelurahan</li>
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
            Form Lihat Data Kelurahan
        </div>
        <div class="card-body">
                <div class="row">
                    @foreach ($kelurahan as $data)
                    <div class="form-group col-lg-6">
                        <label for="nama_kecamatan" class="control-label">Nama Kecamatan</label>
                        <input type="text" name="nama_kecamatan" id="nama_kecamatan" value="{{$data->nama_kecamatan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_kelurahan" class="control-label">Nama Kelurahan</label>
                        <input type="text" name="nama_kelurahan" id="nama_kelurahan" value="{{$data->nama_kelurahan}}" class="form-control" readonly>
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