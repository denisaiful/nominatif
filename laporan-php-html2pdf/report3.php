<?php

ob_start();
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
include "koneksi.php";
$kode   = $_GET['getKegiatan'];
        $sql 	= mysqli_query($koneksi,"select * from spt_pimpinan WHERE no=$kode");
       
        while ($r = mysqli_fetch_array($sql)) {


	$content ='
	<page>
	<html> 
	<style>
div.a {
    font-size: 9px;
    text-align: center;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse; 
  border-style: none;

  width: 100%;
}
.tabel th {padding:5px; background-color: #b3b3b3 }

.tabel1 tr, td {
  border-style: none;
}

div.b {
    font-size: 9px;
    text-align: center;
	padding-left: 10px;
	font-family: arial, sans-serif;
}

td, th {
  border: 1px;
  text-align: left;
  padding: 3px;
  font-size: 7px;
  
}

tr:nth-child(even) {
  background-color: #000000;
  
.page_break {
      page-break-before: always;
    }
}
</style>
	
	<body>
	  <div class="a">
		<span>Dartar Nominatif Perjalanan Dinas <br>
        '.$r['kegiatan'].'<br>
        Pusat Pendidikan dan Pelatihan Badan Meteorologi Klimatologi dan Geofisika<br>
        Kode :3342.'.$r['akun2'].'.'.$r['akun'].'.'.$r['akun1'].'.'.$r['kom'].'.'.$r['sub_kom'].'.'.$r['mak'].'</span>
	</div>	<br>
<table border="0" class="tabel" cellspacing="0">  
  <tr>
    <th width="10">No</th>
	<th width="15">No Bukti</th>
    <th width="180">Nama</th>
    
	<th>Pangkat/Gol</th>  
	<th width="30">Asal</th>
	<th width="30">Tujuan</th>
    <th width="30">Tgl SPT</th>  
    <th width="30">Tgl Pergi</th>
    <th width="30">Tgl Kembali</th>
	<th width="20">Lama</th>
	<th>Representasi</th>
	<th >Tiket</th>
	<th >Transport Lokal</th>
    <th >Hotel</th>
    <th >Uang Harian</th>
    <th >Dpr</th>
	<th >Jumlah</th>
  </tr>	

		';		
		};
		$kode   = $_GET['getKegiatan'];
        $sql 	= mysqli_query($koneksi,"select *,
substr(`kuitansi_baru`.`tgl_pergi_new`,9,2) AS `tanggal_pergi`,
(case substr(`kuitansi_baru`.`tgl_pergi_new`,6,2) when 1 
then '01' when 2 
then '02' when 3 
then '03' when 4 
then '04' when 5 
then '05' when 6 
then '06' when 7 
then '07' when 8 
then '08' when 9 
then '09' when 10 
then '10' when 11 
then '11' when 12 
then '12' else '' end) 
AS `bulan_pergi`,
substr(`kuitansi_baru`.`tgl_pergi_new`,1,4) AS `tahun_pergi`,

substr(`kuitansi_baru`.`tgl_pulang_new`,9,2) AS `tanggal_pulang`,
(case substr(`kuitansi_baru`.`tgl_pulang_new`,6,2) when 1 
then '01' when 2 
then '02' when 3 
then '03' when 4 
then '04' when 5 
then '05' when 6 
then '06' when 7 
then '07' when 8 
then '08' when 9 
then '09' when 10 
then '10' when 11 
then '11' when 12   
then '12' else '' end) 
AS `bulan_pulang`,
substr(`kuitansi_baru`.`tgl_pulang_new`,1,4) AS `tahun_pulang`,

substr(`kuitansi_baru`.`tgl_spt_new`,9,2) AS `tanggal_spt`,
(case substr(`kuitansi_baru`.`tgl_spt_new`,6,2) when 1 
then '01' when 2 
then '02' when 3 
then '03' when 4 
then '04' when 5 
then '05' when 6 
then '06' when 7 
then '07' when 8 
then '08' when 9 
then '09' when 10 
then '10' when 11 
then '11' when 12 
then '12' else '' end) 
AS `bulan_spt`,
substr(`kuitansi_baru`.`tgl_spt_new`,1,4) AS `tahun_spt`

		from kuitansi_baru  WHERE no_keg=$kode LIMIT 34 ");
        $no 	= 1;
        while ($r = mysqli_fetch_array($sql)) { 
		$bilangan=$r['no_urut'];
$no_urut = sprintf("%05d", $bilangan);
		$selisih=$r['pjg'];
				  if($selisih >=40){
             $fontsize="6px";
			  } else{
					$fontsize="7px";	
			  }		
		$content .='
  <tr>
	<td width="15">'.$no.' </td>
	<td width="10">'.$no_urut.'</td>
    <td style="font-size:'.$fontsize.'; " width="180">'.$r['nama'].'</td> 
	
	<td width="100">'.$r['pangkat_peserta'].' - '.$r['gol_peserta'].'</td> 
	<td width="70">'.$r['asal'].'</td>
	<td width="70">'.$r['lokasi'].'</td>
	<td width="30">'.$r['tanggal_spt'].'-'.$r['bulan_spt'].'-'.$r['tahun_spt'].'</td>
	<td width="30">'.$r['tanggal_pergi'].'-'.$r['bulan_pergi'].'-'.$r['tahun_pergi'].'</td>
	<td width="30">'.$r['tanggal_pulang'].'-'.$r['bulan_pulang'].'-'.$r['tahun_pulang'].'</td>
	<td width="10" align="center">'.$r['lama_spt'].'</td>
	<td align="right" width="30">'. number_format($r['representasi'],0, ',','.').'</td>
	<td align="right" width="30">'. number_format($r['transport'],0, ',','.').'</td>
	<td align="right" width="30">'. number_format($r['transport_lokal'],0, ',','.').'</td> 	
	<td align="right" width="30">'. number_format($r['total_hotel'],0, ',','.').'</td>
	<td align="right" width="30">'. number_format($r['total_uh'],0, ',','.').'</td>   
	<td align="right" width="30">'. number_format($r['dpr'],0, ',','.').'</td>  
	<td align="right" width="30">'. number_format($r['jumlah'],0, ',','.').'</td>  	
	
  </tr> 
		
		';
		
		$no++;
		};
		
		
$kode   = $_GET['getKegiatan'];	 
$jmlh =  mysqli_query($koneksi,"select count(`kuitansi_baru`.`id_kegiatan`) AS `banyak` from kuitansi_baru WHERE id_kegiatan=$kode"); 
$jumlah = mysqli_fetch_array($jmlh); 
$selisih=$jumlah['banyak'];

if ($selisih >= 38) { $content .=' 




';    } else { 
	
 $getTos=0;
    $getTos1=0;
	$getTos2=0;
	$getTos3=0;
	$getTos4=0;
	$getTos5=0;
	$getTos6=0;
$qry = mysqli_query($koneksi,"select * from kuitansi_baru WHERE no_keg='".$kode."'");
while ($r=mysqli_fetch_array($qry))
 {  

$getTos = $getTos + $r['jumlah']; 
$getTos1 = $getTos1 + $r['dpr'];
$getTos2 = $getTos2 + $r['total_uh']; 
$getTos3 = $getTos3 + $r['total_hotel'];  
$getTos4 = $getTos4 + $r['transport'];  
$getTos5 = $getTos5 + $r['transport_lokal'];
$getTos6 = $getTos6 + $r['representasi'];

}
     $content .='
      <tr>
     <td align="center" colspan="10"> <strong>Jumlah</strong></td>
	 <td align="right"><strong>'.number_format($getTos6,0, ',','.').'</strong></td>
	 <td align="right"><strong>'.number_format($getTos4,0, ',','.').'</strong></td>
	 <td align="right"><strong>'.number_format($getTos5,0, ',','.').'</strong></td>
	 <td align="right"><strong>'.number_format($getTos3,0, ',','.').'</strong></td>	 
	 <td align="right"><strong>'.number_format($getTos2,0, ',','.').'</strong></td>
     <td align="right"><strong>'.number_format($getTos1,0, ',','.').'</strong></td>
     <td align="right"><strong>'.number_format($getTos,0, ',','.').'</strong></td>
	
     </tr>
	 
	 
'; }


	  
	 
$kode   = $_GET['getKegiatan'];
$sql = mysqli_query($koneksi,"SELECT
spt_peserta.kegiatan_peserta,
spt_pimpinan.nama AS nama_pimpinan,
spt_pimpinan.kegiatan,
kortim.`name`,
tim_kerja.`name` AS tim,
substr(`spt_pimpinan`.`tgl_spt_new`,1,4) AS `tahun`,
substr(`spt_pimpinan`.`tgl_spt_new`,9,2) AS `tanggal`,
(case substr(`spt_pimpinan`.`tgl_spt_new`,6,2) when 1 
then 'Januari' when 2 
then 'Februari' when 3 
then 'Maret' when 4 
then 'April' when 5 
then 'Mei' when 6 
then 'Juni' when 7 
then 'Juli' when 8 
then 'Agustus' when 9 
then 'September' when 10 
then 'Oktober' when 11 
then 'November' when 12 
then 'Desember' else '' end) 
AS `bulan`, count(`spt_pimpinan`.`no`) AS `jml`  
FROM
spt_peserta
INNER JOIN spt_pimpinan ON spt_pimpinan.`no` = spt_peserta.kegiatan_peserta
INNER JOIN kortim ON kortim.id = spt_pimpinan.kortim
INNER JOIN tim_kerja ON tim_kerja.id = kortim.id_tim
WHERE
spt_pimpinan.`no` = $kode");                 
                    
$r = mysqli_fetch_array($sql);

	 {  
	 
	$content .='
	</table >
	<br>
	<table>
	<tr>
	<td width="400" style="border-bottom:0px;border-right:0px;border-top:0px;border-left:0px;">	  
	<div class="b">
	<span>Mengetahui,<br>
	Kordinator '.$r['tim'].'<br>
		Pusat Pendidikan dan Pelatihan<br><br><br><br><br><br> <br>
       '.$r['name'].'
       
	   </span>
	</div>
</td>
<td width="300" style="border-bottom:0px;border-right:0px;border-top:0px;">	  
	<div class="b">
	<span>Mengetahui,<br>
	Pejabat Pembuat Komitmen<br>
		Pusat Pendidikan dan Pelatihan<br><br><br><br><br><br> <br>
       KADNAN, M.Si
         
	   </span>
	</div>
</td>
<td width="300" style="border-bottom:0px;border-right:0px;border-top:0px;" >	  
	<div class="b">
	<span>Jakarta, '.$r['tanggal'].' '.$r['bulan'].' '.$r['tahun'].'<br>
	Kuasa Pengguna Anggaran<br>
		Pusat Pendidikan dan Pelatihan<br><br><br><br><br><br> <br>
       '.$r['nama_pimpinan'].'
       
	   </span>
	</div>
</td>
	</tr>
	</table>
	';
	
	
	
	$content .='
	
	<page>
	<table border="0" class="tabel" cellspacing="0">
	<tr>
		 <th width="10">No</th>
	<th width="15">No Bukti</th>
    <th width="180">Nama</th>    
	<th>Pangkat/Gol</th>  
	<th width="30">Asal</th>
	<th width="30">Tujuan</th>
    <th width="30">Tgl SPT</th>  
    <th width="30">Tgl Pergi</th>
    <th width="30">Tgl Kembali</th>
	<th width="20">Lama</th>
	<th>Representasi</th>
	<th >Tiket</th>
	<th >Transport Lokal</th>
    <th >Hotel</th>
    <th >Uang Harian</th>
    <th >Dpr</th>
	<th >Jumlah</th>
	</tr>
	';		
	
		$kode   = $_GET['getKegiatan'];
        $sql 	= mysqli_query($koneksi,"select *,
substr(`kuitansi_baru`.`tgl_pergi_new`,9,2) AS `tanggal_pergi`,
(case substr(`kuitansi_baru`.`tgl_pergi_new`,6,2) when 1 
then '01' when 2 
then '02' when 3 
then '03' when 4 
then '04' when 5 
then '05' when 6 
then '06' when 7 
then '07' when 8 
then '08' when 9 
then '09' when 10 
then '10' when 11 
then '11' when 12 
then '12' else '' end) 
AS `bulan_pergi`,
substr(`kuitansi_baru`.`tgl_pergi_new`,1,4) AS `tahun_pergi`,

substr(`kuitansi_baru`.`tgl_pulang_new`,9,2) AS `tanggal_pulang`,
(case substr(`kuitansi_baru`.`tgl_pulang_new`,6,2) when 1 
then '01' when 2 
then '02' when 3 
then '03' when 4 
then '04' when 5      
then '05' when 6 
then '06' when 7 
then '07' when 8 
then '08' when 9 
then '09' when 10 
then '10' when 11 
then '11' when 12   
then '12' else '' end) 
AS `bulan_pulang`,
substr(`kuitansi_baru`.`tgl_pulang_new`,1,4) AS `tahun_pulang`,

substr(`kuitansi_baru`.`tgl_spt_new`,9,2) AS `tanggal_spt`,
(case substr(`kuitansi_baru`.`tgl_spt_new`,6,2) when 1 
then '01' when 2 
then '02' when 3 
then '03' when 4 
then '04' when 5 
then '05' when 6 
then '06' when 7 
then '07' when 8 
then '08' when 9 
then '09' when 10 
then '10' when 11 
then '11' when 12 
then '12' else '' end) 
AS `bulan_spt`,
substr(`kuitansi_baru`.`tgl_spt_new`,1,4) AS `tahun_spt`

		from kuitansi_baru  WHERE no_keg=$kode LIMIT 34,70 ");
        $no 	= 34;
        while ($r = mysqli_fetch_array($sql)) { 
		$bilangan=$r['no_urut'];
$no_urut = sprintf("%05d", $bilangan);
		$selisih=$r['pjg'];
				  if($selisih >=40){
             $fontsize="6px";
			  } else{
					$fontsize="7px";	
			  }		
		$content .='
  <tr>
	<td width="15">'.$no.' </td>
	<td width="10">'.$no_urut.'</td>
    <td style="font-size:'.$fontsize.'; " width="180">'.$r['nama'].'</td> 
	
	<td width="100">'.$r['pangkat_peserta'].' - '.$r['gol_peserta'].'</td> 
	<td width="70">'.$r['asal'].'</td>
	<td width="70">'.$r['lokasi'].'</td>
	<td width="30">'.$r['tanggal_spt'].'-'.$r['bulan_spt'].'-'.$r['tahun_spt'].'</td>
	<td width="30">'.$r['tanggal_pergi'].'-'.$r['bulan_pergi'].'-'.$r['tahun_pergi'].'</td>
	<td width="30">'.$r['tanggal_pulang'].'-'.$r['bulan_pulang'].'-'.$r['tahun_pulang'].'</td>
	<td width="10" align="center">'.$r['lama_spt'].'</td>
	<td align="right" width="30">'. number_format($r['representasi'],0, ',','.').'</td>
	<td align="right" width="30">'. number_format($r['transport'],0, ',','.').'</td>
	<td align="right" width="30">'. number_format($r['transport_lokal'],0, ',','.').'</td> 	
	<td align="right" width="30">'. number_format($r['total_hotel'],0, ',','.').'</td>
	<td align="right" width="30">'. number_format($r['total_uh'],0, ',','.').'</td>   
	<td align="right" width="30">'. number_format($r['dpr'],0, ',','.').'</td>  
	<td align="right" width="30">'. number_format($r['jumlah'],0, ',','.').'</td>  	
	
  </tr> 
		
		';
		
		$no++;
		}
$kode   = $_GET['getKegiatan'];	 
$jmlh =  mysqli_query($koneksi,"select count(`kuitansi_baru`.`id_kegiatan`) AS `jml` from kuitansi_baru WHERE id_kegiatan=$kode"); 
$jumlah = mysqli_fetch_array($jmlh); 
	
 $getTos=0;
    $getTos1=0;
	$getTos2=0;
	$getTos3=0;
	$getTos4=0;
	$getTos5=0;
	$getTos6=0;
$qry = mysqli_query($koneksi,"select * from kuitansi_baru WHERE no_keg='".$kode."'");
while ($r=mysqli_fetch_array($qry))
 {  

$getTos = $getTos + $r['jumlah']; 
$getTos1 = $getTos1 + $r['dpr'];
$getTos2 = $getTos2 + $r['total_uh']; 
$getTos3 = $getTos3 + $r['total_hotel'];  
$getTos4 = $getTos4 + $r['transport'];  
$getTos5 = $getTos5 + $r['transport_lokal'];
$getTos6 = $getTos6 + $r['representasi'];

}
     $content .='
      <tr>
     <td align="center" colspan="10"> <strong>Jumlah</strong></td>
	 <td align="right"><strong>'.number_format($getTos6,0, ',','.').'</strong></td>
	 <td align="right"><strong>'.number_format($getTos4,0, ',','.').'</strong></td>
	 <td align="right"><strong>'.number_format($getTos5,0, ',','.').'</strong></td>
	 <td align="right"><strong>'.number_format($getTos3,0, ',','.').'</strong></td>	 
	 <td align="right"><strong>'.number_format($getTos2,0, ',','.').'</strong></td>
     <td align="right"><strong>'.number_format($getTos1,0, ',','.').'</strong></td>
     <td align="right"><strong>'.number_format($getTos,0, ',','.').'</strong></td>
	
     </tr>
	 
	
	</table>
	<br>
	';
	
	$content .='
	<table  border="0" class="tabel1" cellspacing="0" >  
	

<tr>

</tr>



	  '; } 
	  
	 
	$content .='
	 </table >
	</page>
	</body>
	</html>
	';
		
ob_end_clean();
	require __DIR__.'/html2pdf_v5.2-master/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	use Spipu\Html2Pdf\Exception\Html2PdfException;
	use Spipu\Html2Pdf\Exception\ExceptionFormatter;

	try
 {
$kode   = $_GET['getKegiatan']; //kode berita yang akan dikonvert
$query  = mysqli_query($koneksi,"select * from kuitansi WHERE no_peserta='".$kode."'");
$data   = mysqli_fetch_array($query);
$filename="Nominatif ".$kode.".pdf"; 
require __DIR__.'/html2pdf_v5.2-master/vendor/autoload.php';
	
	$html2pdf = new Html2Pdf('L','A4','fr', true, 'UTF-8', array(5, 5, 5, 5), false); 
	$html2pdf->writeHTML($content);
	$html2pdf->output("$filename","D");
	 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>