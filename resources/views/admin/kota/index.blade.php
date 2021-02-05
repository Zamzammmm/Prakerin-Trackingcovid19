@extends('layouts.backend')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header bg-primary">
            Form Kota
        </div>
        <div class="card-body">

            <a href="{{route('kota.create')}}" class="btn btn-success mb-3"><i class="fa fa-plus-circle"></i>
                Kota 
            </a>

            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama Provinsi</th>
                        <th>Kode Kota</th>
                        <th>Nama Kota</th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($kota as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nama_provinsi}}</td>
                        <td>{{$data->kode_kota}}</td>
                        <td>{{$data->nama_kota}}</td>
                        <td style="text-align: center;">
                            <form action="{{route('kota.destroy',$data->id)}}" method="POST">
                                @csrf
                                <a href="{{route('kota.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> 
                                <a href="{{route('kota.show',$data->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a> 
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