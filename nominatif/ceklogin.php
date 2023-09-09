<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
	
	$usr = $_POST['usr'];
	$pass = md5($_POST['pass']);
	$nama =$_POST['nama'];
	$cek = mysql_query("select * from users where username='$usr' AND password='$pass' ");
	
	$hitung = mysql_num_rows($cek);
	
	$data = mysql_fetch_array($cek);
	
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