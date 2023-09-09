<?php
include "koneksi.php";

				
$idx= $_POST['idx'];
//proses update
if(isset($_POST['update'])) {
	$name =$_POST['name'];
	$id_tim =$_POST['id_tim'];
	
	
	$update = mysqli_query($koneksi,"update kortim SET 
											name ='$name',
											id_tim = '$id_tim'
											
											WHERE id='$idx'");	
	
	if($update>0){
		echo "<script>alert('data berhasil diUpdate');
 			window.location='index2a.php?data=kortim';</script>";} 
			
			else { echo "<script>alert('data Gagal diUpdate');
 			window.location='index2a.php?data=kortim';</script>";}

}

											
?>


</div>