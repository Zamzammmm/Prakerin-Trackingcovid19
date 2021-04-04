<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
            <div class="col">
                <div class="row">
                    <h1>Data Kasus Local</h1>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th><center>Lokasi</center></th>
                                    <th>Rw</th>
                                    <th>Jumlah Positif</th>
                                    <th>Jumlah Sembuh</th>
                                    <th>Jumlah Meninggal</th>
                                    <th>Tgl</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                    @foreach($laporan as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>
                                            KELURAHAN : {{ $data->rw->kelurahan->nama_kelurahan }} <br>
                                            KECAMATAN : {{ $data->rw->kelurahan->kecamatan->nama_kecamatan }} <br>
                                            KOTA : {{ $data->rw->kelurahan->kecamatan->kota->nama_kota }} <br>
                                            PROVINSI : {{ $data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi }}
                                        </td>
                                        <td>{{$data->rw->nama}}</td>
                                        <td>{{$data->jumlah_positif}} Orang</td>
                                        <td>{{$data->jumlah_sembuh}} Orang</td>
                                        <td>{{$data->jumlah_meninggal}} Orang</td>
                                        <td>{{$data->tanggal}}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>