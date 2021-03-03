<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PegawaiController extends Controller
{

    public function index()
    {
     $pegawai = DB::table('pegawai')->get();
     return view('pegawai',['pegawai' => $pegawai]);
 
    }

    public function tambah()
    {
    	return view('pegawai_tambah');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama_karyawan' => 'required',
    		'alamat' => 'required',
			'nomor_ktp' => 'required'
    	]);
		$date  = Carbon::now('Y');
		$tahun = $date->year;
		$price = DB::table('pegawai')->max('id_karyawan');
		$urutan = (int) substr($price, 7, 4);
		$jml = $urutan+1;
		$digit = sprintf("%04s", $jml);
		$kode = "KR".$tahun.$digit;
		DB::table('pegawai')->insert([
			'id_karyawan'	=> $kode,
    		'nama_karyawan' => $request->nama_karyawan,
    		'alamat'	 	=> $request->alamat,
			'nomor_ktp' 	=> $request->nomor_ktp,
			'thn_input'		=> $date->year
    	]);
		if(empty($request->didik)){
		}else{
		$numb =0;
		foreach($request->didik as $ddk){
		$numb++;
				$dataSet[] = [
					'id_karyawan'=>$kode,
					'instansi'=>$ddk->instansi,
					'jurusan'=>$ddk->jurusan,
					'thn_masuk' => $ddk->thn_masuk,
					'thn_lulus' => $ddk->thn_lulus
				];
				DB::table('child_karyawan_pendidikan')->insert($dataSet);
		    }
		}
		if(empty($request->kerja)){
		}else{
		$numb1 =0;
		foreach($request->kerja as $krj){
		$numb1 ++;
				$dataSet2[] = [
					'id_karyawan'=>$kode,
					'perusahaan'=>$krj->perusahaan,
					'jabatan'=>$krj->jabatan,
					'thn_masuk' => $krj->thn_masuk,
					'keterangan' => $krj->keterangan
				];
				DB::table('child_karyawan_pekerjaan')->insert($dataSet2);
		    }
		}
    	return redirect('');
    }

    public function edit($id)
    {
		$pegawai = DB::table('pegawai')->where('id_karyawan',$id)->get();
		
		$pekerjaan = DB::table('child_karyawan_pekerjaan')->where('id_karyawan',$id)->get();
    		return view('pegawai_edit', ['pegawai' => $pegawai]);
    }		

     public function update($id, Request $request)
    {
	$kode = $srequest->id;	
	DB::table('child_karyawan_pendidikan')->where('id_karyawan',$kode)->delete();
	DB::table('child_karyawan_pekerjaan')->where('id_karyawan',$kode)->delete();
    		$this->validate($request,[
	    		'nama_karyawan' => 'required',
	    		'alamat' => 'required',
				'nomor_ktp' => 'required',
	    	]);

    		 DB::table('pegawai')->where('id_karyawan',$request->id)->update([
			 'nama_karyawan' 	=> 	$request->nama_karyawan,
			 'alamat' 			=> 	$request->alamat,
			 'nomor_ktp' 		=> 	$request->nomor_ktp,
			 ]);
    	
			if(empty($request->didik)){
		}else{
		$numb =0;
		foreach($request->didik as $ddk){
		$numb++;
				$dataSet[] = [
					'id_karyawan'=>$request->id,
					'instansi'=>$ddk->instansi,
					'jurusan'=>$ddk->jurusan,
					'thn_masuk' => $ddk->thn_masuk,
					'thn_lulus' => $ddk->thn_lulus
				];
				DB::table('child_karyawan_pendidikan')->insert($dataSet);
		    }
		}
		if(empty($request->kerja)){
		}else{
		$numb1 =0;
		foreach($request->kerja as $krj){
		$numb1 ++;
				$dataSet2[] = [
					'id_karyawan'=>$request->id,
					'perusahaan'=>$krj->perusahaan,
					'jabatan'=>$krj->jabatan,
					'thn_masuk' => $krj->thn_masuk,
					'keterangan' => $krj->keterangan
				];
				DB::table('child_karyawan_pekerjaan')->insert($dataSet2);
		    }
		}
	return redirect('');
    }
	public function AddPendidikan()
    {
		$jumlah = $_GET['jumlah'];
		$loop = $jumlah+1;
    		echo"
			<tr id='tr_".$loop."'>
			<td><input type='text'	 class='form-control' id='didik_instansi_".$loop."' required name='didik[".$loop."][instansi]' ></td>
			<td><input type='text'	 class='form-control' id='didik_jurusan_".$loop."' required name='didik[".$loop."][jurusan]' ></td>
			<td><input type='text'	 class='form-control' id='didik_thnmasuk_".$loop."' required name='didik[".$loop."][thn_masuk]' ></td>
			<td><input type='text'	 class='form-control' id='didik_thnlulus_".$loop."' required name='dt[".$loop."][thn_lulus]' ></td>
			<td><button type='button' class='btn btn-sm btn-danger' title='Hapus Data' data-role='qtip' onClick='return HapusSekolah(".$loop.");'>X</button></td></tr>
			";
			
    }
		public function AddPengalaman()
    {
		$jumlah = $_GET['jumlah'];
		$loop = $jumlah+1;
    		echo"
			<tr id='tr_".$loop."'>
			<td><input type='text'	 class='form-control' id='kerja_perusahaan_".$loop."' required name='kerja[".$loop."][perusahaan]' ></td>
			<td><input type='text'	 class='form-control' id='kerja_jabatan_".$loop."' required name='kerja[".$loop."][jabatan]' ></td>
			<td><input type='text'	 class='form-control' id='kerja_thnmasuk_".$loop."' required name='kerja[".$loop."][thn_masuk]' ></td>
			<td><input type='text'	 class='form-control' id='kerja_keterangan_".$loop."' required name='kerja[".$loop."][keterangan]' ></td>
			<td><button type='button' class='btn btn-sm btn-danger' title='Hapus Data' data-role='qtip' onClick='return HapusPekerjaan(".$loop.");'>X</button></td>
			</tr>
			";
			
    }

     public function delete($id)
    {
    		DB::table('pegawai')->where('id_karyawan',$id)->delete();
			return redirect('');
    }

}
