<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewporst" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
        <title>TAMBAH DATA KARYAWAN</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                   <strong>TAMBAH DATA KARYAWAN</strong>
                </div>
                <div class="card-body">
                    <form method="post" action="/test/pegawai/store">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan ..">

                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat pegawai .."></textarea>

                             @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif

                        </div>

						<div class="form-group">
                            <label>Nomor KTP</label>
							<input type="text" name="nomor_ktp" class="form-control" placeholder="Nomor KTP  ..">

                             @if($errors->has('nomor_ktp'))
                                <div class="text-danger">
                                    {{ $errors->first('nomor_ktp')}}
                                </div>
                            @endif

                        </div>


		<div class="form-group">
				<button type='button' class='btn btn-sm btn-success' title='Ambil' id='tbh_ata' data-role='qtip' onClick='add_pendidikan();'>Tambah</button>
		</div>
		Pendidikan Terakhir
		<div class="form-group " >
			<table class='table table-bordered table-striped'>
			<thead>
			<tr class='bg-blue'>
			<th >Universitas / Sekolah</th>
			<th >Jurusan</th>
			<th >Tahun Masuk</th>
			<th >Tahun Lulus</th>
			<th >#</th>
			</tr>
			</thead>
			<tbody id="formsekolah">

			</tbody>
			</table>
		</div>
				<div class="form-group">
				<button type='button' class='btn btn-sm btn-success' title='Ambil' id='tbh_ata' data-role='qtip' onClick='add_pengalaman();'>Tambah</button>
		</div>
		Pengalaman Kerja
		<div class="form-group " >
			<table class='table table-bordered table-striped'>
			<thead>
			<tr class='bg-blue'>
			<th >Perusahaan</th>
			<th >Jabatan</th>
			<th >Tahun</th>
			<th >Keterangan</th>
			<th >#</th>
			</tr>
			</thead>
			<tbody id="formpekerjaan">

			</tbody>
			</table>
		</div>
		
		                <div class="form-group">
                            <input type="submit" class="btnbtn-sm  btn-success" value="Simpan">
							 <a href="/test" class="btn btn-sm  btn-primary">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
function add_pendidikan(){ 
	var jumlah	=$('#formsekolah').find('tr').length;
		$.ajax({
            type:"GET",
            url:'/test/pegawai/AddPendidikan',
            data:"jumlah="+jumlah,
            success:function(html){
               $("#formsekolah").append(html);
            }
        });
    }
function add_pengalaman(){ 
	var jumlah	=$('#formpekerjaan').find('tr').length;
		$.ajax({
            type:"GET",
            url:'/test/pegawai/AddPengalaman',
            data:"jumlah="+jumlah,
            success:function(html){
               $("#formpekerjaan").append(html);
            }
        });
    }
function HapusSekolah(id){
		$('#formsekolah #tr_'+id).remove();
		
	}
function HapusPekerjaan(id){
		$('#formpekerjaan #tr_'+id).remove();
		
	}
</script>