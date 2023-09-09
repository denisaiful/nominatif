<?php

/*error_reporting(0);*/

$server ="localhost";
$username ="root";
$password ="P@ssw0rdbmkg2020";
$database ="sertifikat";

$link = mysqli_connect('localhost', 'root', 'P@ssw0rdbmkg2020', 'sertifikat');
$koneksi = mysql_connect($server,$username,$password) or die ('Tidak terhubung ke server');
$db = mysql_select_db($database) or die ('database tidak ditemukan');

/*if ($koneksi>0) {
	
	echo "server tersambung <p>";
	}
if($db>0) {
	
	echo "database ok";
}
*/
?>