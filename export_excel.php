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
			<th  style="text-align:center">Nama</th>							
			<th  style="text-align:center">Golongan</th>
			<th  style="text-align:center">Eselon</th>							
			<th  style="text-align:center">Target</th>
			<th  style="text-align:center">Tujuan</th>	
			<th  style="text-align:center">Kegiatan</th> 
			<th  style="text-align:center">Tgl_pergi</th>										
			<th  style="text-align:center">Tgl Pulang</th>
			<th  style="text-align:center">lama</th>
			<th  style="text-align:center">Representasi</th>
			<th  style="text-align:center">Uang Transport</th>
			<th  style="text-align:center">Uang Harian</th>
			<th  style="text-align:center">Penginapan</th>
			<th  style="text-align:center">Kontribusi</th>
			<th  style="text-align:center">Taksi</th>
			<th  style="text-align:center">Lain-lain</th>
			<th  style="text-align:center">Total diterima</th>
			<th  style="text-align:center">Tgl tiket</th>
			<th  style="text-align:center">Maskapai</th>
			<th  style="text-align:center">Dari</th>
			<th  style="text-align:center">Tujuan</th>
			<th  style="text-align:center">no. Tiket</th>
			<th  style="text-align:center">No. Penerbangan</th>
			<th  style="text-align:center">Kode Booking</th>
			<th  style="text-align:center">Harga</th>
			<th  style="text-align:center">Nama hotel/Kota</th>
			<th  style="text-align:center">Tgl_chek in</th>
			<th  style="text-align:center">Tgl_chek Out</th>
			<th  style="text-align:center">Jumlah Hari Menginap</th>
			<th  style="text-align:center">tarif Per malam</th>
			<th  style="text-align:center">Total Biaya Menginap</th>
			
			
		</tr>
		<?php   
		// koneksi database
		//$koneksi = mysqli_connect("localhost","root","P@ssw0rd","rb");  
		require 'koneksi.php';
		//$username=$_SESSION['username'];
		// menampilkan data pegawai
		$data = mysqli_query($link,"select * from kuitansi_baru where tahun >= 2021 order by no_peserta desc");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>    
		<tr>
			<td><?php echo $no++; ?></td>  
			
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['gol_peserta']; ?></td>			
			<td></td>
			<td>No SPT : SPD.<?php echo $d['no_urut']; ?>/PPK-PDL/<?php echo $d['bulan_romawi']; ?>/<?php echo $d['tahun']; ?>,<br> tgl SPT: <?php echo $d['tgl_spt_new']; ?></td>
			
			<td><?php echo $d['lokasi']; ?></td>
			<td><?php echo $d['kegiatan']; ?></td>
			<td><?php echo $d['tgl_pergi_new']; ?></td>
			<td><?php echo $d['tgl_pulang_new']; ?></td>
			<td><?php echo $d['lama']; ?></td>
			<td><?php echo $d['representasi']; ?></td>
			<td><?php echo $d['all_transport']; ?></td>
			<td><?php echo $d['jumlah_uang_harian']; ?></td>
			<td><?php echo $d['total_hotel']; ?></td>			
			<td></td>
			<td><?php echo $d['transport_lokal']; ?></td>
			<td></td>
			<td><?php echo $d['jumlah']; ?></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php echo $d['hari_hotel1']; ?></td>
			<td><?php echo $d['hotel1']; ?></td>
			<td><?php echo $d['hotel1']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>