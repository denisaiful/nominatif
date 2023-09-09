<?php
include "koneksi.php";

				
$idx= $_POST['idx'];
//proses update
if(isset($_POST['update'])) {
	$nip =$_POST['nip'];
	$namapegawai =$_POST['namapegawai'];
	$namapegawai1 = addslashes($namapegawai);
	$pangpegawai =$_POST['pangpegawai'];
	$golpegawai =$_POST['golpegawai'];
	$namajabatan =$_POST['namajabatan'];
	$namaunitkerja =$_POST['namaunitkerja'];
	$namaunitkerja1 =addslashes($namaunitkerja);
	$tempatlahir =$_POST['tempatlahir'];
	$tanggallahir =$_POST['tanggallahir'];
	
	
	if(empty ($namapegawai1) 
		//or empty($nip) 
		//or empty($pangkat) 
		//or empty($gol) 
		//or empty($jab) 
		//or empty($unit_kerja)
		//or empty($kegiatan)
		//or empty($tgl_spt)
		//or empty($status)
		
		
	)
	
	{ 
		echo "<script>alert('data ada yang kosong..');
 			window.location='index2a.php?data=data_pegawai_ppnpn';</script>";
				
		}else{
	$update = mysql_query("update spt_peserta_eksternal SET 
											nip ='$nip', 
											namapegawai='$namapegawai1', 
											pangpegawai='$pangpegawai', 
											golpegawai ='$golpegawai' ,
											namajabatan ='$namajabatan' ,
											namaunitkerja ='$namaunitkerja1' ,
											tempatlahir = '$tempatlahir',
											tanggallahir = '$tanggallahir'
											WHERE nip='$idx'");	
	
	if($update>0){
		echo "<script>alert('data berhasil diUpdate');
 			window.location='index2a.php?data=data_pegawai_ppnpn';</script>";} 
			
			else { echo "<script>alert('data Gagal diUpdate');
 			window.location='index2a.php?data=data_pegawai_ppnpn';</script>";}

}

		}									
?>


</div>