@extends('layouts.backend')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Edit Data Kecamatan
        </div>
        <div class="card-body">
            <form action="{{ url('kecamatan/update/'.$kecamatan->id ) }}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="nama_kota">Nama Kota</label>
                            <select name="id_kota" class="form-control">
                                <option disabled>-- Pilih Kota --</option>
                                @foreach ($kota as $data)
                                    @php $select = '' ;@endphp 
                                    @if($data->id == $kecamatan->id_kota)
                                        @php $select = 'selected'; @endphp
                                    @endif
                                    <option value="{{$data->id}}" {{$select}}>{{$data->nama_kota}}</option> 
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="kode_kecamatan" class="control-label">Kode Kecamatan</label>
                        <input type="text" name="kode_kecamatan" id="kode_kecamatan" value="{{$kecamatan->kode_kecamatan}}" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_kecamatan" class="control-label">Nama Kecamatan</label>
                        <input type="text" name="nama_kecamatan" id="nama_kecamatan" value="{{$kecamatan->nama_kecamatan}}" class="form-control" required>
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