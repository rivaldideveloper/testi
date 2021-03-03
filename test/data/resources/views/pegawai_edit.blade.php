<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
        <title>EDIT DATA KARYAWAN</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                   <strong>EDIT DATA KARYAWAN</strong>
                </div>
                <div class="card-body">
                    <br/>
                    <br/>
                    
@foreach($pegawai as $p)
                    <form method="post" action="/test/pegawai/update/{{ $p->id_karyawan }}">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_karyawan" class="form-control" placeholder="Nama pegawai .." value=" {{ $p->nama_karyawan }}">

                            @if($errors->has('nama_karyawan'))
                                <div class="text-danger">
                                    {{ $errors->first(nama_karyawan)}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat pegawai .."> {{ $p->alamat }} </textarea>

                             @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif

                        </div>
						<div class="form-group">
                            <label>Nomor KTP</label>
                            <input type="text" name="nomor_ktp" class="form-control" placeholder="Nomor KTP.." value=" {{ $p->nomor_ktp }}">

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
<?php
$pendidikan = DB::table('child_karyawan_pendidikan')->where('id_karyawan',$p->id_karyawan)->get();
$loop=0;
foreach($pendidikan as $didik){
$loop++;		echo"	
			<tr id='tr_".$loop."'>
			<td><input type='text'	 class='form-control' id='didik_instansi_".$loop."' required value='".$didik->instansi."' name='didik[".$loop."][instansi]' ></td>
			<td><input type='text'	 class='form-control' id='didik_jurusan_".$loop."' required  value='".$didik->jurusan."' name='didik[".$loop."][jurusan]' ></td>
			<td><input type='text'	 class='form-control' id='didik_thnmasuk_".$loop."' required value='".$didik->thn_masuk."' name='didik[".$loop."][thn_masuk]' ></td>
			<td><input type='text'	 class='form-control' id='didik_thnlulus_".$loop."' required value='".$didik->thn_lulus."' name='dt[".$loop."][thn_lulus]' ></td>
			<td><button type='button' class='btn btn-sm btn-danger' title='Hapus Data' data-role='qtip' onClick='return HapusSekolah(".$loop.");'>X</button></td></tr>
		";
}
?>
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
<?php
$pekerjaan = DB::table('child_karyawan_pekerjaan')->where('id_karyawan',$p->id_karyawan)->get();
$loop=0;
foreach($pekerjaan as $kerja){
$loop++;		echo"	
		<tr id='tr_".$loop."'>
			<td><input type='text'	 class='form-control' id='kerja_perusahaan_".$loop."' value='".$didik->perusahaan."' required name='kerja[".$loop."][perusahaan]' ></td>
			<td><input type='text'	 class='form-control' id='kerja_jabatan_".$loop."'    value='".$didik->jabatan."' required name='kerja[".$loop."][jabatan]' ></td>
			<td><input type='text'	 class='form-control' id='kerja_thnmasuk_".$loop."' value='".$didik->thnmasuk."' required name='kerja[".$loop."][thn_masuk]' ></td>
			<td><input type='text'	 class='form-control' id='kerja_keterangan_".$loop."' value='".$didik->keterangan."' required name='kerja[".$loop."][keterangan]' ></td>
			<td><button type='button' class='btn btn-sm btn-danger' title='Hapus Data' data-role='qtip' onClick='return HapusPekerjaan(".$loop.");'>X</button></td>
			</tr>";
}
?>
			</tbody>
			</table>
		</div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
							<a href="/test" class="btn btn-primary">Kembali</a>
                        </div>

                    </form>
 @endforeach
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