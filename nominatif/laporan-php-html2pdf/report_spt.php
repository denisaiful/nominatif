<?php

ob_start();
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
include "koneksi.php";
$kode   = $_GET['getKegiatan'];
$sql 	= mysql_query("select * from spt_baru WHERE no_peserta=$kode");

        while ($data = mysql_fetch_array($sql)) {

$bilangan=$data['no_urut']; // Nilai Proses
$no_urut = sprintf("%05d", $bilangan);
	$content ='
	<page >  
	<html> 
	<style>
div.a {
    font-size: 14px;
    text-align: center;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 0 solid #dddddd;
  text-align: left;
  padding: 4px;
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
	
	  <div class="a">
	  
		<span><strong>SURAT TUGAS</strong> <br>
       <strong>Nomor: KP.05.00/'.$no_urut.'/KDL/'.$data['bulan_romawi'].'/'.$data['tahun'].'</strong><br>
       </span>
	</div>	<p>Yang bertanda tangan dibawah ini:</p>
<table border="0">
  <tr>
    <td  width="120">Nama</td>
	<td  >:</td>
	<td  width="380">'.$data['nama_pimpinan1'].'</td>	
  </tr>
  <tr>
   <td  width="120">NIP</td>
	<td  >:</td>
	<td  width="380">'.$data['nip_pimpinan'].'</td>	
  </tr>
<tr>
    <td>Pangkat/Golongan</td>
    <td>:</td>
    <td>'.$data['pangkat_pimpinan'].' - '.$data['gol_pimpinan'].'</td>
  </tr>
   <tr>
    <td valign="top">Jabatan</td>
    <td valign="top">:</td>
    <td width="380" valign="top">'.$data['jab_pimpinan'].'</td>
  </tr>
  <tr>
    <td>Unit Organisasi</td>
    <td>:</td>
    <td>'.$data['unit_kerja_pimpinan'].'</td>
  </tr>
</table>
<p>Dengan ini memberi tugas kepada:</p>
<table border="0">
  <tr>
    <td width="120" >Nama</td>
    <td >:</td>
    <td width="380">'.$data['nama_peserta'].'</td>
  </tr>
  <tr>
    <td>NIP</td>
    <td>:</td>
    <td>'.$data['nip_peserta'].'</td>
  </tr>
  <tr>
    <td>Pangkat/Golongan</td>
    <td>:</td>
    <td>'.$data['pangkat_peserta'].' - '.$data['gol_peserta'].'</td>
  </tr>
   <tr>
    <td valign="top">Jabatan</td>  
    <td valign="top">:</td>
    <td width="450" valign="top">'.$data['jabatan_peserta'].'</td>
  </tr>
  <tr>
    <td valign="top">Unit Organisasi</td>
    <td valign="top">:</td>
    <td valign="top">'.$data['unit_kerja_peserta'].'</td>
  </tr>
  </table>
  <p>Untuk Melaksanakan:</p>
  <table border="0">
  
   <tr>
    <td width="120" valign="top" >Tugas</td>
    <td valign="top">:</td>
    <td width="480" valign="top">'.$data['kegiatan'].'</td>
  </tr>
  <tr>
    <td>Selama</td>
    <td>:</td>
    <td>'.$data['lama'].' Hari</td>
  </tr>
  <tr>
    <td>Lokasi</td>
    <td>:</td>
    <td>'.$data['lokasi'].'</td>
  </tr>
   <tr>
    <td>Tanggal pergi</td>
    <td>:</td>
    <td>'.$data['tanggal_pergi'].' '.$data['bulan_pergi'].' '.$data['tahun'].'</td>
  </tr>
  <tr>
    <td>Tanggal kembali</td>
    <td>:</td>
    <td>'.$data['tanggal_pulang'].' '.$data['bulan_pulang'].' '.$data['tahun'].'</td>
  </tr>
   <tr>
    <td>Sumber dana</td>
    <td>:</td>
    <td>'.$data['sumber_dana'].'</td>  
  </tr>
  </table>
  <p>Demikian, untuk dilaksanakan sebagaimana mestinya.</p>
  <table>
   <tr>
    <td width="300" height="80" ></td>

    <td width="300" align="left"> Jakarta, '.$data['tanggal'].' '.$data['bulan'].' '.$data['tahun'].'<br> '.$data['status'].',</td>
  </tr>
   <tr>
    <td width="200" ></td>  

    <td height="40" > </td>
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
$query  = mysql_query("select * from kuitansi WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
$filename="SPT ".$kode.".pdf"; 
require __DIR__.'/html2pdf_v5.2-master/vendor/autoload.php';
	
	$html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(30, 50, 30, 0), false); 
	$html2pdf->writeHTML($content);
	$html2pdf->output("$filename","D");
	 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>