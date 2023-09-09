<!DOCTYPE html>
<?php
session_start();
ob_start();
?>
<html>
<head>
	<title>Export Data Ke Excel </title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=rekap_nominatif.xls");
	?>

	<center>
		<h2>Laporan Nominatif </h2> <br> 
		<h3> <h3>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th  style="text-align:center">Kegiatan</th>							
			<th  style="text-align:center">Dasar Pelaksanaan</th>
			<th  style="text-align:center">Tgl Mulai</th>
			<th  style="text-align:center">Tgl Akhir</th>
			<th  style="text-align:center">Jml Peserta</th>
			<th  style="text-align:center">Tempat Pelaksanaan</th>
			<th  style="text-align:center">Sewa Tempat</th>
			<th  style="text-align:center">Akomodasi</th>
			<th  style="text-align:center">Honor</th>
			
			<th  style="text-align:center">Uang Transpor</th>
			<th  style="text-align:center">Konsumsi</th>
			<th  style="text-align:center">ATK</th>
			<th  style="text-align:center">Lainnya</th>
			<th  style="text-align:center">jumlah</th>
			
		</tr>
		<?php   
		// koneksi database
		//$koneksi = mysqli_connect("localhost","root","P@ssw0rd","rb");  
		require 'koneksi.php';
		//$username=$_SESSION['username'];
		// menampilkan data pegawai
		$data = mysqli_query($link,"SELECT * , COUNT( `spt_peserta`.`no_peserta` ) AS jumlah, SUM( `spt_peserta`.`uang_harian` ) AS jmh_uang_harian, SUM( `spt_peserta`.`transport` ) + SUM( `spt_peserta`.`transport_lokal` ) AS jmh_transport, SUM( `spt_peserta`.`uang_harian` ) + SUM( `spt_peserta`.`transport` ) + SUM( `spt_peserta`.`transport_lokal` ) AS total
FROM spt_pimpinan
LEFT JOIN spt_peserta ON spt_peserta.kegiatan_peserta = spt_pimpinan.`no`
GROUP BY spt_pimpinan.`no`
ORDER BY no DESC");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>    
		<tr>
			<td><?php echo $no++; ?></td>			
			<td><?php echo $d['kegiatan']; ?></td>
			<td></td>
			<td><?php echo $d['tgl_pergi_new']; ?></td>
			<td><?php echo $d['tgl_pulang_new']; ?></td>
			<td><?php echo $d['jumlah']; ?></td>
			<td><?php echo $d['lokasi']; ?></td>
			<td></td>
			<td></td>
			<td><?php echo $d['jmh_uang_harian']; ?></td>
			<td><?php echo $d['jmh_transport']; ?></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td><?php echo $d['total']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>