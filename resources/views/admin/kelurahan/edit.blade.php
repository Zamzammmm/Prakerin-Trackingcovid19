@extends('layouts.backend')
@section('active')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Edit Kelurahan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Kelurahan</li>
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
            Form Edit Data Kelurahan
        </div>
        <div class="card-body">
            <form action="{{ url('kelurahan/update/'.$kelurahan->id ) }}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="nama_kecamatan">Nama Kecamatan</label>
                            <select name="id_kecamatan" class="form-control">
                                <option disabled>-- Pilih Kecamatan --</option>
                                @foreach ($kecamatan as $data)
                                    @php $select = '' ;@endphp 
                                    @if($data->id == $kelurahan->id_kecamatan)
                                        @php $select = 'selected'; @endphp
                                    @endif
                                    <option value="{{$data->id}}" {{$select}}>{{$data->nama_kecamatan}}</option> 
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_kelurahan" class="control-label">Nama Kelurahan</label>
                        <input type="text" name="nama_kelurahan" id="nama_kelurahan" value="{{$kelurahan->nama_kelurahan}}" class="form-control @error('nama_kelurahan') is-invalid @enderror" value="{{ old('nama_kelurahan')}}" autofocus>
                        @error('nama_kelurahan')
                        <div class="invalid_feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection