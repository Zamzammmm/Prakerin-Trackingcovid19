@extends('layouts.backend')
@section('active')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Tambah Kasus Local</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Kasus Local</li>
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
            Form Tambah Data Kasus Local
        </div>
        <div class="card-body">
            <form action="{{route('laporan.store')}}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="id_provinsi">Nama Provinsi</label>
                        <select name="id_provinsi" id="id_provinsi" class="form-control">
                            <option selected disabled>-- Pilih Provinsi -- </option>
                            @foreach ($provinsi as $data)
                            <option value="{{$data->id}}">{{$data->nama_provinsi}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="id_kota">Nama Kota / Kabupaten</label>
                        <select name="id_kota" id="id_kota" class="form-control">
                            <option selected disabled>-- Pilih Kota -- </option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="id_kecamatan">Nama Kecamatan</label>
                        <select name="id_kecamatan" id="id_kecamatan" class="form-control">
                            <option selected disabled>-- Pilih Kecamatan -- </option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="id_kelurahan">Nama Kelurahan</label>
                        <select name="id_kelurahan" id="id_kelurahan" class="form-control">
                            <option selected disabled>-- Pilih Kelurahan -- </option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="id_rw">Rw</label>
                        <select name="id_rw" id="id_rw" class="form-control">
                            <option selected disabled>-- Pilih RW -- </option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_positif" class="control-label">Jumlah Positif</label>
                        <input type="number" name="jumlah_positif" id="jumlah_positif" class="form-control @error('jumlah_positif') is-invalid @enderror" value="{{ old('jumlah_positif')}}" autofocus>
                        @error('jumlah_positif')
                        <div class="invalid_feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_sembuh" class="control-label">Jumlah Sembuh</label>
                        <input type="number" name="jumlah_sembuh" id="jumlah_sembuh" class="form-control @error('jumlah_sembuh') is-invalid @enderror" value="{{ old('jumlah_sembuh')}}">
                        @error('jumlah_sembuh')
                        <div class="invalid_feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_meninggal" class="control-label">Jumlah Meninggal</label>
                        <input type="number" name="jumlah_meninggal" id="jumlah_meninggal" class="form-control @error('jumlah_meninggal') is-invalid @enderror" value="{{ old('jumlah_meninggal')}}">
                        @error('jumlah_meninggal')
                        <div class="invalid_feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="tanggal" class="control-label">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal')}}">
                        @error('jumlah_meninggal')
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
@section('js')
<script text="javascript">
    $(document).ready(function(){
        $('#id_provinsi').change(function(){
            var id_provinsi = $(this).val();
            $.ajax({
                url: '/get_kota/'+id_provinsi,
                type: 'GET',
                // data: {'id_prov':id_provinsi},
                // dataType: 'json',
                success:function(data){
                    $('#id_kota').html(data.html);
                }
            })
        })

        $('#id_kota').change(function(){
            var id_kota = $(this).val();
            $.ajax({
                url: '/get_kecamatan/'+id_kota,
                type: 'GET',
                data: {'id_kota':id_kota},
                // dataType: 'json',
                success:function(data){
                    $('#id_kecamatan').html(data.html);
                }
            })
        })

        $('#id_kecamatan').change(function(){
            var id_kecamatan = $(this).val();
            $.ajax({
                url: '/get_kelurahan/'+id_kecamatan,
                type: 'GET',
                data: {'id_kecamatan':id_kecamatan},
                // dataType: 'json',
                success:function(data){
                    $('#id_kelurahan').html(data.html);
                }
            })
        })

        $('#id_kelurahan').change(function(){
            var id_kelurahan = $(this).val();
            $.ajax({
                url: '/get_rw/'+id_kelurahan,
                type: 'GET',
                data: {'id_kelurahan':id_kelurahan},
                // dataType: 'json',
                success:function(data){
                    $('#id_rw').html(data.html);
                }
            })
        })
    })
</script>
@endsection