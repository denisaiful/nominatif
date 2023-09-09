<?php

/*error_reporting(0);*/

$server ="localhost";
$username ="root";
$password ="";
$database ="sertifikat";

//$link = mysqli_connect($server, 'root', 'P@ssw0rdbmkg2020', 'diklatdb2');
$koneksi = mysqli_connect($server,$username,$password,$database) or die ('Tidak terhubung ke server');
//$db = mysqli_select_db($database) or die ('database tidak ditemukan');

/*if ($koneksi>0) {
	
	echo "server tersambung <p>";
	}
if($db>0) {
	
	echo "database ok";
}
*/
?>