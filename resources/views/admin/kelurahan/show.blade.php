@extends('layouts.backend')

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