@extends('layouts.backend')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header bg-primary">
            Form Provinsi
        </div>
        <div class="card-body">

            <a href="{{route('provinsi.create')}}" class="btn btn-success mb-3"><i class="fa fa-plus-circle"></i>
                Provinsi 
            </a>

            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Kode Provinsi</th>
                        <th>Nama Provinsi</th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($provinsi as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->kode_provinsi}}</td>
                        <td>{{$data->nama_provinsi}}</td>
                        <td style="text-align: center;">
                            <form action="{{route('provinsi.destroy',$data->id)}}" method="POST">
                                @csrf
                                <a href="{{route('provinsi.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> 
                                <a href="{{route('provinsi.show',$data->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a> 
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