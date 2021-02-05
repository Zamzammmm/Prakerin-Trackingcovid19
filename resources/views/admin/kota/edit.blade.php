@extends('layouts.backend')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Edit Data Kota
        </div>
        <div class="card-body">
            <form action="{{ url('kota/update/'.$kota->id ) }}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="nama_provinsi">Nama Provinsi</label>
                            <select name="id_provinsi" class="form-control">
                                <option disabled>-- Pilih Provinsi --</option>
                                @foreach ($provinsi as $data)
                                    @php $select = '' ;@endphp 
                                    @if($data->id == $kota->id_provinsi)
                                        @php $select = 'selected'; @endphp
                                    @endif
                                    <option value="{{$data->id}}" {{$select}}>{{$data->nama_provinsi}}</option> 
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="kode_kota" class="control-label">Kode Kota</label>
                        <input type="text" name="kode_kota" id="kode_kota" value="{{$kota->kode_kota}}" class="form-control class="form-control @error('kode_kota') is-invalid @enderror" value="{{ old('kode_kota')}}" autofocus>
                        @error('kode_kota')
                        <div class="invalid_feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_kota" class="control-label">Nama Kota</label>
                        <input type="text" name="nama_kota" id="nama_kota" value="{{$kota->nama_kota}}" class="form-control class="form-control @error('nama_kota') is-invalid @enderror" value="{{ old('nama_kota')}}">
                        @error('nama_kota')
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