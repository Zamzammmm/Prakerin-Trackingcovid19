@extends('layouts.backend')
@section('title')
Dashboard
@endsection
@section('active')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('content')
<div class="container">
    <p><h1> <center>Tracking Covid-19 Indonesia</center></h1></p><br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary"> <center><h4><b>Total Positif</b></h4></center> </div>
                <div class="card-body">
                    <p>
                        <h2><b>{{number_format($jumlah_positif)}}</b></h2>
                        <h5> Orang</h5>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary"> <center><h4><b>Total Sembuh</b></h4></center> </div>
                <div class="card-body">
                    <p>
                        <h2><b>{{number_format($jumlah_sembuh)}}</b></h2>
                        <h5> Orang</h5>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary"> <center><h4><b>Total Meninggal</b></h4></center> </div>
                <div class="card-body">
                    <p>
                        <h2><b>{{number_format($jumlah_meninggal)}}</b></h2>
                        <h5> Orang</h5>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col text-center">
        <h6><p>Update terakhir : {{ $tanggal }}</p></h6>
    </div> 
</div>
@endsection
