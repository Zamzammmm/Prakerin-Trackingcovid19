@extends('layouts.backend')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header bg-primary">
            Form Kelurahan
        </div>
        <div class="card-body">

            <a href="{{route('kelurahan.create')}}" class="btn btn-success mb-3"><i class="fa fa-plus-circle"></i>
                Kelurahan
            </a>

            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama Kelurahan / Desa</th>
                        <th>Nama Kecamtan</th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($kelurahan as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nama_kelurahan}}</td>
                        <td>{{$data->nama_kecamatan}}</td>
                        <td style="text-align: center;">
                            <form action="{{route('kelurahan.destroy',$data->id)}}" method="POST">
                                @csrf
                                <a href="{{route('kelurahan.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> 
                                <a href="{{route('kelurahan.show',$data->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a> 
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