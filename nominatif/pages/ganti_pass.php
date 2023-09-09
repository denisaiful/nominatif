<!DOCTYPE html>
<html lang="en">
<?php 

if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda telah habis.. silahkan login kembali...');
 			window.location='page_login.php';</script>";
}else {
/*error_reporting(0);*/
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>;
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>
<div id="content-wrapper" class="d-flex flex-column">		
 <div id="content">
  <div class="container-fluid">
        
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
	
	<?php
	require 'koneksi.php';
	//mengatasi error notice dan warning
	//error ini biasa muncul jika dijalankan di localhost, jika online tidak ada masalah
	//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
	//koneksi ke database
	$conn = $link ; //new mysqli("localhost", "root", "P@ssw0rd", "sertifikat"); 
	if ($conn->connect_error) {
		echo die("Failed to connect to MySQL: " . $conn->connect_error);
	}
	
	//proses jika tombol rubah di klik
	if(isset($_POST['submit'])){
		//membuat variabel untuk menyimpan data inputan yang di isikan di form
		//$password				= $_SESSION['password'];
		$password_lama			= $_POST['password'];
		$password_baru			= $_POST['password_baru'];
		$konfirmasi_password	= $_POST['konfirmasi_password'];
		
		//cek dahulu ke database dengan query SELECT
		//kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
		//encrypt -> md5($password_lama)
		$password_lama	= md5($password_lama);
		$cek 			= $conn->query("SELECT *  FROM users  WHERE password='$password_lama'");
		
		//echo $password_lama;
		//$test = $cek->fetch_assoc();
		//echo var_dump($test);
		
		
		if($cek->num_rows){
			//kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
			//membuat kondisi minimal password adalah 5 karakter
			if(strlen($password_baru) >= 5){
				//jika password baru sudah 5 atau lebih, maka lanjut ke bawah
				//membuat kondisi jika password baru harus sama dengan konfirmasi password
				if($password_baru == $konfirmasi_password){
					//jika semua kondisi sudah benar, maka melakukan update kedatabase
					//query UPDATE SET password = encrypt md5 password_baru
					//kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
					$id_user_db = $cek->fetch_assoc()['id'];
					$password_baru 	= md5($password_baru);
					#$id_user 		= $_SESSION['id']; //ini dari session saat login
					
					$update 		= $conn->query("UPDATE users SET password='$password_baru' WHERE id='$id_user_db'");
					if($update){
						//kondisi jika proses query UPDATE berhasil
						echo '<script>
								Swal.fire("Selamat :)", "Password Sudah Berhasil diUpdate", "success");
							</script>
';
					}else{
						//kondisi jika proses query gagal
						echo 'Gagal merubah password';
					}					
				}else{
					//kondisi jika password baru beda dengan konfirmasi password
					
					

					
					echo '<script>

						Swal.fire({
							  icon: "error",
							  title: "Oops...",
							  text: "Konfirmasi Password Tidak Sesuai!",
							  footer: "Silahkan Coba Lagi...."
							})

						</script>';
				}
			}else{
				//kondisi jika password baru yang dimasukkan kurang dari 5 karakter
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Maaf!</strong> Minimal Password 5 karakter.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
			}
		}else{
			//kondisi jika password lama tidak cocok dengan data yang ada di database
			echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Maaf!</strong> Password lama tidak sesuai.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
		}
	}
	?>
	
	<!-- mulai form rubah password -->
	<form method="post" action="" class="form-horizontal" >
	
	<div class="form-group">
    <label class="col-sm-2 control-label"><strong>Password Lama</strong></label>
    <div class="col-sm-6">
      <input name="password" type="password" class="form-control" placeholder="Masukan Password Lama" required>
    </div> 
    </div>
	
	<div class="form-group">
    <label class="col-sm-2 control-label"><strong>Password Baru</strong></label>
    <div class="col-sm-6">
      <input name="password_baru" type="password" class="form-control" placeholder="Masukan Password Baru" required>
    </div> 
    </div>
	
	<div class="form-group">
    <label class="col-sm-4 control-label"><strong>Konfirmasi Password Baru</strong></label>
    <div class="col-sm-6">
      <input name="konfirmasi_password" type="password" class="form-control" placeholder="Konfirmasi password baru" required>
    </div> 
    </div>
	
	<div class="form-group">
	
    <div class="col-sm-offset-2 col-sm-10">
	<button name="reset" type="reset" value="Reset" class="btn btn-danger shadow-lg p-2 mb-4 rounded">Reset</Button>
    <button name="submit" type="submit" value="Rubah" class="btn btn-success shadow-lg p-2 mb-4 rounded">Update</button>
    </div>
  </div>
		
	</form>
	
	</div>
	</div>
	</div>
	</div>
	</div>
	</div></div>
	<!-- selesai form rubah password -->
</body>
<?php }; ?>
</html>