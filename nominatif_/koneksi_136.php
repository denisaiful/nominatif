<?php

/*error_reporting(0);*/

$server ="202.90.198.136";
$username ="root";
$password ="P@ssw0rdbmkg2020";
$database ="diklatdb2";

$link = mysqli_connect($server, 'root', 'P@ssw0rdbmkg2020', 'diklatdb2');
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