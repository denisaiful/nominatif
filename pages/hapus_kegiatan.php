 <?php
include ('koneksi.php');
$idx= $_GET['idx'];
$no = mysqli_query($koneksi,"SELECT kegiatan FROM spt_pimpinan WHERE no=$idx ");
//$no_pesertas = mysql_fetch_array($no_peserta);

$hapus=mysqli_query($koneksi,"delete from spt_pimpinan where no='$_GET[idx]' ") or die ("gagal hapus");
echo "<script>alert('data telah di hapus');document.location='index2a.php?data=tables2' </script> ";
?>