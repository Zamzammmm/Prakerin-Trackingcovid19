@extends('layouts.backend')

@section('content')

<div class="container">
    @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message')}}
            </div>
        @endif
    <div class="card">
        <div class="card-header bg-primary">
            Form Laporan Korban
        </div>
        <div class="card-body">

            <a href="{{route('laporan.create')}}" class="btn btn-success mb-3"><i class="fa fa-plus-circle"></i>
                Laporan
            </a>

            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th width="10px">No</th>
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
                        <td>{{$data->nama}}</td>
                        <td>{{$data->jumlah_positif}}</td>
                        <td>{{$data->jumlah_sembuh}}</td>
                        <td>{{$data->jumlah_meninggal}}</td>
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