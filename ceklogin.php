<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
	
	$usr = mysqli_real_escape_string($koneksi, $_POST['usr']);
	$pass = mysqli_real_escape_string($koneksi,md5($_POST['pass']));
	$nama =mysqli_real_escape_string($koneksi,$_POST['nama']);
	$cek = mysqli_query($koneksi,"select * from users where username='$usr' AND password='$pass' ");
	
	$hitung = mysqli_num_rows($cek);
	
	$data = mysqli_fetch_array($cek);
	
	if($hitung>0){
		
		$_SESSION['username'] = $usr;
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['password'] = $pass;
		$_SESSION['level'] = $data['level'];
		
		header('location:index2a.php');
		
	}else
	{
		echo "<script>alert('username/password salah');
 			window.location='page_login.php';</script>";
		
	}
}
?>