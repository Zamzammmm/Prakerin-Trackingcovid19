@extends('layouts.backend')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Edit Data Rw
        </div>
        <div class="card-body">
            <form action="{{ url('rw/update/'.$rw->id ) }}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="nama_kelurahan">Nama Kelurahan</label>
                            <select name="id_kelurahan" class="form-control" required>
                                <option disabled>-- Pilih Kelurahan --</option>
                                @foreach ($kelurahan as $data)
                                    @php $select = '' ;@endphp 
                                    @if($data->id == $rw->id_kelurahan)
                                        @php $select = 'selected'; @endphp
                                    @endif
                                    <option value="{{$data->id}}" {{$select}}>{{$data->nama_kelurahan}}</option> 
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama" class="control-label">Rw</label>
                        <input type="text" name="nama" id="nama" value="{{$rw->nama}}" class="form-control" required>
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