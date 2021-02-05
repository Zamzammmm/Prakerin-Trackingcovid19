@extends('layouts.backend')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header bg-primary">
            Form Kecamatan
        </div>
        <div class="card-body">

            <a href="{{route('kecamatan.create')}}" class="btn btn-success mb-3"><i class="fa fa-plus-circle"></i>
                Kecamatan 
            </a>

            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama Kota</th>
                        <th>Kode Kecamatan</th>
                        <th>Nama Kecamatan</th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($kecamatan as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nama_kota}}</td>
                        <td>{{$data->kode_kecamatan}}</td>
                        <td>{{$data->nama_kecamatan}}</td>
                        <td style="text-align: center;">
                            <form action="{{route('kecamatan.destroy',$data->id)}}" method="POST">
                                @csrf
                                <a href="{{route('kecamatan.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> 
                                <a href="{{route('kecamatan.show',$data->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a> 
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