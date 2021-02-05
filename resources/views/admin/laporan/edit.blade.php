@extends('layouts.backend')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Edit Data Laporan
        </div>
        <div class="card-body">
            <form action="{{ url('laporan/update/'.$laporan->id ) }}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="nama_provinsi">Nama Provinsi</label>
                            <select name="id_provinsi" class="form-control" required>
                                <option disabled>-- Pilih Provinsi --</option>
                                @foreach ($provinsi as $data)
                                    @php $select = '' ;@endphp 
                                    @if($data->id == $laporan->rw->kelurahan->kecamatan->kota->id_provinsi)
                                        @php $select = 'selected'; @endphp
                                    @endif
                                    <option value="{{$data->id}}" {{$select}}>{{$data->nama_provinsi}}</option> 
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_kota">Nama Kota</label>
                            <select name="id_kota" class="form-control" required>
                                <option disabled>-- Pilih Kota --</option>
                                @foreach ($kota as $data)
                                    @php $select = '' ;@endphp 
                                    @if($data->id == $laporan->rw->kelurahan->kecamatan->id_kota)
                                        @php $select = 'selected'; @endphp
                                    @endif
                                    <option value="{{$data->id}}" {{$select}}>{{$data->nama_kota}}</option> 
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_kecamatan">Nama Kecamatan</label>
                            <select name="id_kecamatan" class="form-control" required>
                                <option disabled>-- Pilih Kecamatan --</option>
                                @foreach ($kecamatan as $data)
                                    @php $select = '' ;@endphp 
                                    @if($data->id == $laporan->rw->kelurahan->id_kecamatan)
                                        @php $select = 'selected'; @endphp
                                    @endif
                                    <option value="{{$data->id}}" {{$select}}>{{$data->nama_kecamatan}}</option> 
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_kelurahan">Nama Kelurahan</label>
                            <select name="id_kelurahan" class="form-control" required>
                                <option disabled>-- Pilih Kelurahan --</option>
                                @foreach ($kelurahan as $data)
                                    @php $select = '' ;@endphp 
                                    @if($data->id == $laporan->rw->id_kelurahan)
                                        @php $select = 'selected'; @endphp
                                    @endif
                                    <option value="{{$data->id}}" {{$select}}>{{$data->nama_kelurahan}}</option> 
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama">Rw</label>
                            <select name="id_rw" class="form-control" required>
                                <option disabled>-- Pilih Rw --</option>
                                @foreach ($rw as $data)
                                    @php $select = '' ;@endphp 
                                    @if($data->id == $laporan->id_rw)
                                        @php $select = 'selected'; @endphp
                                    @endif
                                    <option value="{{$data->id}}" {{$select}}>{{$data->nama}}</option> 
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_positif" class="control-label">Jumlah Positif</label>
                        <input type="text" name="jumlah_positif" id="jumlah_positif" value="{{$laporan->jumlah_positif}}" class="form-control @error('jumlah_sembuh') is-invalid @enderror" value="{{ old('jumlah_sembuh')}}" autofocus>
                        @error('jumlah_positif')
                        <div class="invalid_feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_sembuh" class="control-label">Jumlah Sembuh</label>
                        <input type="text" name="jumlah_sembuh" id="jumlah_sembuh" value="{{$laporan->jumlah_sembuh}}" class="form-control @error('jumlah_sembuh') is-invalid @enderror" value="{{ old('jumlah_sembuh')}}">
                        @error('jumlah_sembuh')
                        <div class="invalid_feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jumlah_meninggal" class="control-label">Jumlah Meninggal</label>
                        <input type="text" name="jumlah_meninggal" id="jumlah_meninggal" value="{{$laporan->jumlah_meninggal}}" class="form-control  @error('jumlah_meninggal') is-invalid @enderror" value="{{ old('jumlah_meninggal')}}">
                        @error('jumlah_meninggal')
                        <div class="invalid_feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="tanggal" class="control-label">Tanggal</label>
                        <input type="text" name="tanggal" id="tanggal" value="{{$laporan->tanggal}}" class="form-control" required>
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