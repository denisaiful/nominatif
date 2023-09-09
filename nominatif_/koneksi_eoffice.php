<?php

/*error_reporting(0);*/

$server ="localhost";
$username ="root";
$password ="P@ssw0rdbmkg2020";
$database ="eoffice4";
$link = mysqli_connect('172.19.2.180', 'root', 'P@ssw0rdbmkg2020', 'eoffice4');
$link1 = mysqli_connect('localhost', 'root', 'P@ssw0rdbmkg2020', 'eoffice4');
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
