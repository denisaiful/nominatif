 <?php
include "koneksi.php";
$idx= $_GET['idx'];
//$no_peserta = mysqli_query($link,"SELECT kegiatan_peserta FROM spt_peserta_nonbmkg1 WHERE nip=$idx ");
//$no_pesertas = mysqli_fetch_array($no_peserta);

$hapus=mysqli_query($link,"delete from spt_peserta_eksternal where nip='$_GET[idx]' ") or die ("gagal hapus");
echo "<script>alert('data telah di hapus');document.location='index2a.php?data=data_pegawai_ppnpn' </script> ";
?>