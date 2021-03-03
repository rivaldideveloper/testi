<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Tutorial Laravel #21 : CRUD Eloquent Laravel - www.malasngoding.com</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    DATA KARYAWAN
                </div>
                <div class="card-body">
                    <a href="/test/pegawai/tambah" class="btn btn-primary">Input KARYAWAN</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama Karyawan</th>
                                <th>Alamat</th>
								<th>No KTP</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $p)
                            <tr>
                                <td>{{ $p->nama_karyawan }}</td>
                                <td>{{ $p->alamat }}</td>
								<td>{{ $p->nomor_ktp }}</td>
                                <td>
                                    <a href="/test/pegawai/edit/{{ $p->id_karyawan }}" class="btn btn-warning">Edit</a>
                                    <a href="/test/pegawai/hapus/{{ $p->id_karyawan }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
