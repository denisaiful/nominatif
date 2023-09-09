<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['no'];
$nama = $_GET['nama'];
$kegiatan = $_GET['kegiatan'];

//query update
$query = "UPDATE spt_pimpinan SET nama='$nama' , kegiatan='$kegiatan' WHERE no='$id' ";

if (mysql_query($query)) {
 # credirect ke page index
 header("location:edit_boostrap.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysql_error();
 die()
}

//mysql_close($host);
?>