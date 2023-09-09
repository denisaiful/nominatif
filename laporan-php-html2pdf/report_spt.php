<?php

ob_start();
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
include "koneksi.php";
$kode   = $_GET['getKegiatan'];
$sql 	= mysqli_query($koneksi,"select * from spt_baru WHERE no_peserta=$kode");

        while ($data = mysqli_fetch_array($sql)) {

$bilangan=$data['no_urut']; // Nilai Proses
$no_urut = sprintf("%05d", $bilangan);
	$content ='
	<page  > 
	<html> 
	<style>

div.a {
    font-size: 14px;
    text-align: center;
	width: 100%;
}


table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 0 solid #dddddd;
  text-align: left;
 
  font-size: 14px;
}

tr:nth-child(even) {
  background-color: #dddddd;
  
.page_break {
      page-break-before: always;
    }
}
</style>
	
	<body>
	<img src="../img/kopsuratpusdiklat.jpg " style="width:820px;"/>
	<br><br><br>
	  <div class="a">
	  
		<span><strong>
		
		SURAT TUGAS</strong> <br>
	
       <strong>Nomor: DL.12.00/'.$no_urut.'/KDL/'.$data['bulan_romawi'].'/'.$data['tahun'].'</strong><br>
       </span>
	</div>	
	
	<p>
	<table border="0">
  <tr>
    <td  width="700" style="padding-left:50">Yang bertanda tangan dibawah ini:</td>
	
	</tr>
	
	</table>
	</p>
	
	
<table border="0">
  <tr>
    <td  width="120"; style="padding-left:50">Nama</td>
	<td  >:</td>
	<td  width="380">'.$data['nama_pimpinan1'].'</td>	
  </tr>
  <tr>
   <td  width="120" style="padding-left:50">NIP</td>
	<td  >:</td>
	<td  width="380">'.$data['nip_pimpinan'].'</td>	
  </tr>
<tr>
    <td style="padding-left:50">Pangkat/Golongan</td>
    <td>:</td>
    <td>'.$data['pangkat_pimpinan'].' - '.$data['gol_pimpinan'].'</td>
  </tr>
   <tr>
    <td valign="top" style="padding-left:50">Jabatan</td>
    <td valign="top">:</td>
    <td width="380" valign="top">'.$data['jab_pimpinan'].'</td>
  </tr>
  <tr>
    <td style="padding-left:50">Unit Organisasi</td>
    <td>:</td>
    <td>'.$data['unit_kerja_pimpinan'].'</td>
  </tr>
  <tr>
    <td style="padding-left:50" colspan="3" height="40" >Dengan ini memberi tugas kepada:</td>
   
  </tr>
</table>



<table border="0">
  <tr>
    <td width="120" style="padding-left:50" >Nama</td>
    <td >:</td>
    <td width="380">'.$data['nama_peserta'].'</td>
  </tr>
  <tr>
    <td style="padding-left:50">NIP</td>
    <td>:</td>
    <td>'.$data['nip_peserta'].'</td>
  </tr>
  <tr>
    <td style="padding-left:50">Pangkat/Golongan</td>
    <td>:</td>
    <td>'.$data['pangkat_peserta'].' - '.$data['gol_peserta'].'</td>
  </tr>
   <tr>
    <td valign="top" style="padding-left:50">Jabatan</td>  
    <td valign="top">:</td>
    <td width="450" valign="top">'.$data['jabatan_peserta'].'</td>
  </tr>
  <tr>
    <td valign="top" style="padding-left:50">Unit Organisasi</td>
    <td valign="top">:</td>
    <td valign="top">'.$data['unit_kerja_peserta'].'</td>
  </tr>
  <tr>
    <td style="padding-left:50" colspan="3" height="40" >Untuk Melaksanakan:</td>
   
  </tr>
  </table>
  
  <table border="0">
  
   <tr>
    <td width="120" valign="top" style="padding-left:50" >Tugas</td>
    <td valign="top">:</td>
    <td width="480" valign="top">'.$data['kegiatan'].'</td>
  </tr>
  <tr>
    <td style="padding-left:50">Selama</td>
    <td>:</td>
    <td>'.$data['lama'].' Hari</td>
  </tr>
  <tr>
    <td style="padding-left:50">Lokasi</td>
    <td>:</td>
    <td>'.$data['lokasi'].'</td>
  </tr>
   <tr>
    <td style="padding-left:50">Tanggal pergi</td>
    <td>:</td>
    <td>'.$data['tanggal_pergi'].' '.$data['bulan_pergi'].' '.$data['tahun'].'</td>
  </tr>
  <tr>
    <td style="padding-left:50">Tanggal kembali</td>
    <td>:</td>
    <td>'.$data['tanggal_pulang'].' '.$data['bulan_pulang'].' '.$data['tahun'].'</td>
  </tr>
   <tr>
    <td style="padding-left:50">Sumber dana</td>
    <td>:</td>
    <td>'.$data['sumber_dana'].'</td>  
  </tr>
  <tr>
    <td style="padding-left:50" colspan="3" height="40" >Demikian, untuk dilaksanakan sebagaimana mestinya.</td>
   
  </tr>
  </table>
  
  <table>
   <tr>
    <td width="400" height="80" ></td>

    <td width="400" align="left"> Jakarta, '.$data['tanggal'].' '.$data['bulan'].' '.$data['tahun'].'<br> '.$data['status'].',</td>
  </tr>
   <tr>
    <td width="200" ></td>  

    <td height="50" > </td>
  </tr>
  <tr>
    <td></td>
    
    <td align="left">'.$data['nama_pimpinan4'].'</td>
  </tr>
 
  
		';	};
	
	$content .='  
	</table>

	</body>
	</page>
	</html>
	</page>
		';

		
		
ob_end_clean();
	require __DIR__.'/html2pdf_v5.2-master/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	use Spipu\Html2Pdf\Exception\Html2PdfException;
	use Spipu\Html2Pdf\Exception\ExceptionFormatter;

	try
 {
$kode   = $_GET['getKegiatan']; //kode berita yang akan dikonvert
$query  = mysqli_query($koneksi,"select * from kuitansi_baru WHERE no_peserta='".$kode."'");
$data   = mysqli_fetch_array($query);
$nama = $data['nama'];
$filename="SPT ".$kode."-".$nama.".pdf";
require __DIR__.'/html2pdf_v5.2-master/vendor/autoload.php';
	
	$html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(0, 0, 5, 0), false); 
	$html2pdf->writeHTML($content);
	$html2pdf->output("$filename","D");
	 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>