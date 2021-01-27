@extends('layouts.backend')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Edit Data Provinsi
        </div>
        <div class="card-body">
            <form action="{{ url('provinsi/update/'.$provinsi->id ) }}" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="kode_provinsi" class="control-label">Kode Provinsi</label>
                        <input type="text" name="kode_provinsi" id="kode_provinsi" value="{{$provinsi->kode_provinsi}}" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_provinsi">Nama Provinsi</label>
                            <select name="nama_provinsi" class="form-control" required>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                                <option value="Jawa Barat">Jawa Barat</option>  
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Banten">Banten</option>  
                                <option value="Bali">Bali</option>
                                <option value="Sulawesi Selatan">Sulawesi Selatan</option>  
                                <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                                <option value="Kalimantan Selatan">Kalimantan Selatan</option>  
                                <option value="Papua">Papua</option>
                                <option value="Sumatera Selatan">Sumatera Selatan</option>  
                                <option value="Sulawesi Utara">Sulawesi Utara</option>
                                <option value="Kalimantan Tengah">Kalimantan Tengah</option>  
                                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                <option value="Lampung">Lampung</option>  
                                <option value="Aceh">Aceh</option>
                                <option value="Kepulauan Riau">Kepulauan Riau</option> 
                                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                <option value="Sulawesi Tengah">Sulawesi Tengah</option>  
                                <option value="Kalimantan Utara">Kalimantan Utara</option>
                                <option value="Papua Barat">Papua Barat</option>  
                                <option value="Maluku">Maluku</option>
                            </select>
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