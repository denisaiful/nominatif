 <?php
include ('koneksi.php');
$idx= $_GET['idx'];
$no_peserta = mysqli_query($koneksi,"SELECT kegiatan_peserta FROM spt_peserta WHERE no_peserta=$idx ");
$no_pesertas = mysqli_fetch_array($no_peserta);

$hapus=mysqli_query($koneksi,"delete from spt_peserta where no_peserta='$_GET[idx]' ") or die ("gagal hapus");
echo "<script>alert('data telah di hapus');document.location='index2a.php?data=prosesreg1&idx=$no_pesertas[0]' </script> ";
?>