@extends('layouts.backend')
@section('title')
Report Provinsi
@endsection
@section('active')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Report Provinsi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Report Provinsi</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        Data Laporan Provinsi
                    </div>
                    <div class="card-body">
                        <form action="{{ url('report-provinsi') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Tanggal Awal</label>
                                        <input type="date" name="awal" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Tanggal Akhir</label>
                                        <input type="date" name="akhir" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" style="padding: 10px;">
                                        <br>
                                        <button class="btn btn-success btn-outline"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th width="10px">No</th>
                                        <th>Provinsi</th>
                                        <th>Jumlah Positif</th>
                                        <th>Jumlah Sembuh</th>
                                        <th>Jumlah Meninggal</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($provinsi)
                                        @php $no =1; @endphp
                                        @foreach ($provinsi as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nama_provinsi }}</td>
                                                <td>{{ $data->jumlah_positif }}</td>
                                                <td>{{ $data->jumlah_sembuh }}</td>
                                                <td>{{ $data->jumlah_meninggal }}</td>
                                                <td>{{ date('d M Y', strtotime($data->tanggal)) }}</td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection