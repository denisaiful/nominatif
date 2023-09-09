<?php

/*error_reporting(0);*/

$server ="localhost";
$username ="root";
$password ="";
$database ="sertifikat";
$link = mysqli_connect('localhost', 'webadmin', 'pusdiklatNOMINATIF@&)&@@4', 'sertifikat');
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