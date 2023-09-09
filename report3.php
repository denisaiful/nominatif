<?php
include "koneksi.php";
        $getTos = 0;
        $kode   = $_GET['getKegiatan'];
        $sql = mysql_query("select * from kuitansi WHERE kegiatan='".$kode."'");
                    $no = 1;
                    
                    while ($r = mysql_fetch_array($sql)) {  
$content = '
<style>
div.a {
    font-size: 10px;
    text-align: center;
}
.tabel {border-collapse:collapse; font-size: 52%; }
.tabel th {padding:5px; background-color: #b3b3b3 }

.tabel td {padding:3px; font-size:auto-shrink; }
.tabel td span {
  display: block;
  white-space: nowrap;
  width: 100px;
  overflow: hidden;
  font-size: 100%;
 
}
</style>

';
$content .= '
<page>
  <div class="a">
  <span>Dartar Nominatif Perjalanan Dinas <br>
        '.$r['kegiatan'].'<br>
        Pusat Pendidikan dan Pelatihan Badan Meteorologi Klimatologi dan Geofisika<br>
        Kode :3342.'.$r['akun'].'.'.$r['akun1'].'.'.$r['mak'].' </span>
  </div>
<br>
<div align="center" >
<table border="1px" class="tabel">
                       
      <tr >
        <th class="center"> No </th>
        <th width="15">No Bukti</th>
        <th width="140">Nama</th>
        <th width="20">NIP</th>
        <th width="90">Pangkat/ Gol</th>
        <th width="30">Asal</th>
        <th width="30">Tujuan</th>
        <th width="35" align="center">Tgl SPT</th>
        <th width="35" align="center">Tgl Pergi</th>
        <th width="35" align="center">Tgl Kembali</th>
        <th width="10">Lama</th>
		<th width="30" style="font-size=6px";>Representatif</th>
        <th width="20" align="center">Tiket/Transport</th>
        <th width="30" align="center">Hotel</th>
        <th width="30" align="center">Uang Harian</th>
        
        <th width="25" align="center">DPR</th>
        <th width="30" align="center">Jumlah</th>
                            
                          </tr>';}
  include "koneksi.php";
                    $getTos = 0;
                    $kode   = $_GET['getKegiatan'];
                    $sql = mysql_query("select * from kuitansi WHERE kegiatan='".$kode."'");
                    $no = 1;
                    
                    while ($r = mysql_fetch_array($sql)) {  
							$selisih=$r['pjg'];
				  if($selisih >= 30){
             $fontsize="5px";
			  } else{
					$fontsize="6px";
					
			  }			
				
                                    
    $content .= '
    <tr   >
        <td height="1"; width="10">'.$no.'.</td> 
        <td height="1"; width="15">'.$r['no_peserta'].'</td>  
        <td align="left" width="140" style="font-size:'.$fontsize.';">'.$r['nama'].'</td> 
        <td width="70">'.$r['nip_peserta'].'</td> 
        <td align="left" width="90">'.$r['pangkat_peserta'].' - '.$r['gol_peserta'].'</td> 
        <td width="30"><span>'.$r['asal'].'</span></td> 
        <td width="30">'.$r['lokasi'].'</td> 
        <td width="30">'.$r['tgl_spt'].'</td> 
        <td width="30">'.$r['tgl_pergi'].'</td> 
        <td width="30">'.$r['tgl_pulang'].'</td>
        <td width="20">'.$r['lama'].'</td> 
		<td width="35" align="right">'. number_format($r['representasi'],0, ',','.').'</td>
        <td width="30" align="right">'. number_format($r['transport'],0, ',','.').'</td> 
        <td width="30" align="right">'. number_format($r['total_hotel'],0, ',','.').'</td>
        <td width="30" align="right">'. number_format($r['total_uh'],0, ',','.').'</td>   
        <td width="25" align="right">'. number_format($r['dpr'],0, ',','.').'</td>  
        <td width="30" align="right">'. number_format($r['jumlah'],0, ',','.').'</td>  

     </tr>  
       ';$no++;
     } 
    $getTos=0;
    $getTos1=0;
	$getTos2=0;
	$getTos3=0;
	$getTos4=0;
     $qry = mysql_query("select * from kuitansi WHERE kegiatan='".$kode."'");
while ($r=mysql_fetch_array($qry))
 {  
$getTos2 = $getTos2 + $r['total_uh']; 
$getTos = $getTos + $r['jumlah']; 
$getTos1 = $getTos1 + $r['dpr'];
$getTos3 = $getTos3 + $r['total_hotel'];  
$getTos4 = $getTos4 + $r['transport'];  


}
     $content .='
      <tr>
     <td colspan="12"> Jumlah</td>
	 <td align="right"><strong>'.number_format($getTos4,0, ',','.').'</strong></td>
	 <td align="right">'.number_format($getTos3,0, ',','.').'</td>	 
	 <td align="right">'.number_format($getTos2,0, ',','.').'</td>
     <td align="right">'.number_format($getTos1,0, ',','.').'</td>
     <td align="right">'.number_format($getTos,0, ',','.').'</td>
	
     </tr> ';
 
                    $getTos = 0;
                    $kode   = $_GET['getKegiatan'];
                    $sql = mysql_query("select `spt_peserta`.`no_peserta` AS `no_peserta`,
`spt_pimpinan`.`nama` AS `nama_pimpinan`,
substr(`spt_pimpinan`.`tgl_spt`,7) AS `tahun`,
substr(`spt_pimpinan`.`tgl_spt`,1,2) AS `tanggal`,
(case substr(`spt_pimpinan`.`tgl_spt`,4,2) when 1 
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
AS `bulan`
from (`spt_peserta` join `spt_pimpinan` on((`spt_peserta`.`kegiatan_peserta` = `spt_pimpinan`.`no`))) WHERE kegiatan='".$kode."'");
                 
                    
while ($r = mysql_fetch_array($sql)) if($r>=2){
            break;} {  

 $content .= '
   </table >                     
</div>
<br>
<div align="center">
<table border="0" class="tabel">
  <tr>
    <td width="650" ></td>
    <td width="170" ></td>
    <td width="250" align="left" height="30"> Jakarta, '.$r['tanggal'].' '.$r['bulan'].' '.$r['tahun'].'<br>
    Kuasa Pengguna Anggaran<br>
    Pusat Pendidikan dan Pelatihan<br>
    Badan Meteorologi Klimatologi dan Geofisika<br><br><br><br>
    <u>Drs. MAMAN SUDARISMAN, DEA</u><br>NIP. 196202251985031001 </td>
  </tr>
  
    ';

       } 

 $content .= '
  </table>

</div>                
</page>

'; 

$kode   = $_GET['getKegiatan']; //kode berita yang akan dikonvert
$query  = mysql_query("select * from kuitansi WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
$filename="Nominatif ".$kode.".pdf";  
          
require_once('html2pdf/html2pdf.class.php'); 
$html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(5, 5, 5, 5));
$html2pdf->setDefaultFont('Arial');
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->writeHTML($content);
$html2pdf->Output($filename);


//$('location').keypress(function() {
  
  //var textLength = $(this).val().length;
  
  //if(textLength < 20) {
   // Do noting 
 // } else if (textLength < 40) {
  //    $(this).css('font-size', '85%');
  //} else if (textLength > 40) {
  //    $(this).css('font-size', '70%');
  //}
  
 //console.log(textLength);
//});

?>
