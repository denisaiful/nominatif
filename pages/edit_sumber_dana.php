<?php
include "koneksi.php";

				
$idx= $_POST['idx'];
//proses update
if(isset($_POST['update'])) {
	$sumber_dana =$_POST['sumber_dana'];
	
	
	
	if(empty ($sumber_dana) 
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
 			window.location='index2a.php?data=sumber_dana';</script>";
				
		}else{
	$update = mysqli_query($koneksi,"update sumber_dana SET 
											sumber_dana ='$sumber_dana' 
											
											WHERE no='$idx'");	
	
	if($update>0){
		echo "<script>alert('data berhasil diUpdate');
 			window.location='index2a.php?data=sumber_dana';</script>";} 
			
			else { echo "<script>alert('data Gagal diUpdate');
 			window.location='index2a.php?data=sumber_dana';</script>";}

}

		}									
?>


</div>