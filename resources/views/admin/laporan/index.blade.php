@extends('layouts.backend')
@section('active')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Kasus Local</h1>
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

<div class="container">
    <div class="card">
        <div class="card-header bg-primary">
            Form Kasus Local
        </div>
        <div class="card-body">

            <a href="{{route('laporan.create')}}" class="btn btn-success mb-3"><i class="fa fa-plus-circle"></i>
                Kasus Local
            </a>

            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th><center>Lokasi</center></th>
                        <th>Rw</th>
                        <th>Jumlah Positif</th>
                        <th>Jumlah Sembuh</th>
                        <th>Jumlah Meninggal</th>
                        <th>Tanggal</th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($laporan as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>
                            KELURAHAN : {{ $data->rw->kelurahan->nama_kelurahan }} <br>
                            KECAMATAN : {{ $data->rw->kelurahan->kecamatan->nama_kecamatan }} <br>
                            KOTA : {{ $data->rw->kelurahan->kecamatan->kota->nama_kota }} <br>
                            PROVINSI : {{ $data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi }}
                        </td>
                        <td>{{$data->rw->nama}}</td>
                        <td>{{$data->jumlah_positif}} Orang</td>
                        <td>{{$data->jumlah_sembuh}} Orang</td>
                        <td>{{$data->jumlah_meninggal}} Orang</td>
                        <td>{{$data->tanggal}}</td>
                        <td style="text-align: center;">
                            <form action="{{route('laporan.destroy',$data->id)}}" method="POST">
                                @csrf
                                <a href="{{route('laporan.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> 
                                <a href="{{route('laporan.show',$data->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a> 
                                <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
