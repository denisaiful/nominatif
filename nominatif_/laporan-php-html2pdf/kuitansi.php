<?php

ob_start();
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
include "koneksi.php";
$kode   = $_GET['getKegiatan'];
$sql 	= mysql_query("select * from kuitansi_baru WHERE no_peserta=$kode");

        while ($data = mysql_fetch_array($sql)) {

$bilangan=$data['no_urut']; // Nilai Proses
$no_urut = sprintf("%05d", $bilangan);
	$content ='
	<page >  
	<html> 
	<style>
.tabel {border-collapse:collapse; padding:5px; };
.tabel th {padding:5px; background-color: grey };
.tabel td {padding:5px;  };
.tabel1 {border-collapse:collapse; };

</style>
	
	<body>
	
	 
<table border="0" class="tabel">
 <tr>
    <td  align="center" width="430" >BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA </td>
    <td colspan="3"></td>
  </tr>
                    
  <tr>
    <td  align="center" >JL. ANGKASA I / 2  KEMAYORAN  </td>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td align="center"><u>J A K A R T A</u></td>
    <td colspan="3" style="border-bottom:1px"> </td>  
  </tr>
  
   <tr>
    <td style="border-right:1px";></td>
    <td style="border-right:1px; border-bottom:1px">Tahun Anggaran</td>
    <td style="border-right:1px; border-bottom:1px">:</td>
    <td style="border-right:1px; border-bottom:1px">'.$data['tahun'].'</td>
  </tr>
  <tr>
    <td style="border-right:1px";></td>
    <td style="border-right:1px; border-bottom:1px">nomor Bukti</td>
    <td style="border-right:1px; border-bottom:1px">: </td>
    <td style="border-right:1px; border-bottom:1px">'.$no_urut.' </td>
  </tr>
   <tr>
    <td style="border-right:1px";></td>
    <td style="border-right:1px; border-bottom:1px">MAK</td>
    <td style="border-right:1px; border-bottom:1px">: </td>
    <td style="border-right:1px; border-bottom:1px">3342.'.$data['akun2'].'.'.$data['akun'].'.'.$data['akun1'].'.'.$data['kom'].'.'.$data['sub_kom'].'.'.$data['mak'].'</td>
  </tr>
  </table >

  <table border="0" class="tabel" > 
  <tr>
    <td colspan="3" align="center" width="700" height="50" ><strong><h2><u>K U I T A N S I</u></h2></strong></td>
  </tr> 
  <tr>
    <td width="250" >Sudah Terima Dari</td>
    <td >:</td>
    <td >KUASA PENGGUNA ANGGARAN</td>
  </tr>   
  <tr>
    <td ></td>
    <td></td>
    <td>PUSAT PENDIDIKAN DAN PELATIHAN</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA</td>
  </tr>   
  <tr>
    <td>Uang Sebesar</td>
    <td>:</td>
    <td>Rp. '. number_format($data['jumlah'],0, ',','.').' </td>
  </tr>    
  <tr>
    <td valign="top">Terbilang</td>
    <td valign="top">:</td>
    <td style="background-color:grey" width="300" ><i>'.terbilang($data['jumlah']).' Rupiah </i></td>
  </tr>    
  <tr>
    <td valign="top">Untuk Pembayaran</td>
    <td valign="top">:</td>
    <td width="320" >Biaya Perjalanan Dinas '.$data['asal'].' - '.$data['lokasi'].' PP  </td>
  </tr>   
  <tr>
    <td>Surat Perintah Dari</td>
    <td>:</td>
    <td >Kepala Pusat Pendidikan dan Pelatihan BMKG </td>
  </tr>   
  <tr>
    <td>Berdasarkan Nomor</td>
    <td>:</td>
    <td >SPD.'.$data['no_urut'].'/PPK-PDL/'.$data['bulan_romawi'].'/ '.$data['tahun'].' </td>
  </tr> 
  <tr>
    <td>Tanggal</td>
    <td>:</td>
    <td >'.$data['tanggal'].' '.$data['bulan'].' '.$data['tahun'].' </td>
  </tr>      
  <tr>
    <td>Untuk perjalanan dinas dari </td>
    <td>:</td>
    <td >'.$data['asal'].' Ke '.$data['lokasi'].' </td>
  </tr> 
  <tr>
    <td>Atas nama</td>
    <td>:</td>
    <td >'.$data['nama'].' </td>
  </tr>  
  <tr>
    <td>Pangkat</td>
    <td>:</td>
    <td >'.$data['pangkat_peserta'].' - '.$data['gol_peserta'].' </td>
  </tr>    
         

  </table><br>
  <br>
  <table border="0" >
  <tr>
    <td width="250" ></td>
    <td width="170" ></td>
    <td width="250" align="center" height="30"> Jakarta, '.$data['tanggal_kuitansi'].' '.$data['bulan_tgl_kuitansi_new'].' '.$data['tahun'].'</td>
  </tr>
  
  <tr>
    <td width="250"  ></td>
    <td width="170" ></td>
    <td width="250" align="center"> Yang Menerima,</td>
  </tr>
  
  <tr>
    <td height="80" valign="bottom"></td>
    <td width="170" ></td>
    <td valign="bottom" align="center"><u>'.$data['nama'].'</u><br>NIP.'.$data['nip_peserta'].'</td>
  </tr>
 
  
		';	
		
		
	
	$content .='
	</table>
</page>

'; 

$content .= '
<page>
<table border="0"  >
  <tr >
   <td  width="750" align="center" valign="middle"><u><strong>RINCIAN PERJALANAN DINAS</strong></u>
   </td>
  </tr>
</table><br>
<table border="0"  >
  <tr >
   <td  width="150" align="left" valign="middle">Lampiran SPD Nomor</td>
   <td  align="left" valign="middle">:</td>
   <td  align="left" valign="middle">SPD.'.$no_urut.'/PPK-PDL/'.$data['bulan_romawi'].'/ '.$data['tahun'].'</td>
  </tr>
   <tr >
   <td  width="150" align="left" valign="middle">Tanggal</td>
   <td  align="left" valign="middle">:</td>
   <td  align="left" valign="middle">'.$data['tanggal'].' '.$data['bulan'].' '.$data['tahun'].'</td>
  </tr> 
</table><br>


<table border="1px" class="tabel" >                     
<tr>
  
  <td  align="center" width="350"><strong>PERINCIAN BIAYA</strong></td>
  <td colspan="2" align="center"><strong>JUMLAH</strong></td>
  <td align="center"  width="150"><strong>KETERANGAN</strong></td>
</tr>
<tr>
  
  <td style="border-bottom:0px;"><b>Biaya transport kendaraan umum</b></td>
  <td colspan="2" style="border-bottom:0px;"></td>
  <td align="center" style="border-bottom:0px;"></td>
</tr>';
                          
$query  = mysql_query("select * From kuitansi_baru  WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $transport =$data['transport'];
    if ($transport==0)
      { $content .= '

';}else{
$content .= '  
  <tr>
  
  <td style="border-bottom:0px;">- Biaya Transport (Tiket)</td>
  <td style="border-bottom:0px;border-right:0px;">Rp.</td>
  <td align="right" width="80"style="border-bottom:0px;">'. number_format($data['transport'],0, ',','.').'</td>
  <td style="border-bottom:0px;"></td>
</tr>
   ';
  };
    
   $content .= ' 

<tr>
 
  <td style="border-bottom:0px;">- Biaya Transport Lainnya (DPR)</td>
  <td style="border-right:0px; border-bottom:0px;">Rp.</td>
  <td style="border-bottom:0px;" align="right">'. number_format($data['dpr'],0, ',','.').'</td>
  <td style="border-bottom:0px;" ></td>
</tr>

';
  
$query  = mysql_query("select * From kuitansi_baru  WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $uang_harian =$data['uang_harian'];
    if ($uang_harian==0)
      { $content .= '

';}else{
$content .= '  

 <tr>  
  <td  style="border-bottom:0px;border-top:1px;"><b>Uang harian selama '.$data['lama_spt'] .' ('.terbilang($data['lama_spt']).' ) hari :</b></td>
  <td colspan="2" style="border-bottom:0px;"></td>
  <td style="border-bottom:0px;"></td>
</tr>

<tr>  
  <td style="border-bottom:0px;">'.$data['lama_uh'].' hari x Rp. '. number_format($data['uang_harian'],0, ',','.').' </td>
  <td style="border-right:0px;border-bottom:0px;">Rp.</td>
  <td style="border-bottom:0px;" align="right" >'. number_format($data['jumlah_uang_harian'],0, ',','.').'</td>
  <td style="border-bottom:0px;"></td>
</tr>

';
                  };        
				  
$query  = mysql_query("select * From kuitansi_baru  WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $fullboard =$data['fullboard'];
    if ($fullboard==0)
      { $content .= '

';}else{
$content .= '  

 

<tr>  
  <td style="border-bottom:0px;">'.$data['lama_fullboard_hotel'].' hari Fullboard x Rp. '. number_format($data['fullboard'],0, ',','.').' </td>
  <td style="border-right:0px;border-bottom:0px;">Rp.</td>
  <td style="border-bottom:0px;" align="right" >'. number_format($data['jumlah_uang_fullboard'],0, ',','.').'</td>
  <td style="border-bottom:0px;"></td>
</tr>

';
                  };  				  
				  
				  
				  
$query  = mysql_query("select * From kuitansi_new  WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $fullboard =$data['fullboard'];
    if ($fullboard==0)
      { $content .= '
<tr>
  <td style="border-bottom:0px;"> </td>
  <td style="border-right:0px;border-bottom:0px;"></td>
  <td style="border-bottom:0px;" align="right" ></td>
  <td style="border-bottom:0px;"></td>
</tr>
';}else{
$content .= '  
<tr>
 
  <td style="border-bottom:0px;">'. number_format($data['hari_fullboad'],0, ',','.').' hari x Rp. '. number_format($data['fullboard'],0, ',','.').' (fullboard Meeting)</td>
  <td style="border-right:0px;border-bottom:0px;">Rp.</td>
  <td style="border-bottom:0px;" align="right">'. number_format($data['jumlah_uang_fullboard'],0, ',','.').'</td>
  <td style="border-bottom:0px;" ></td>
</tr>
   ';
  };
    
   $content .= ' 
';
                          
$query  = mysql_query("select * From kuitansi_baru  WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $hotel =$data['hotel'];
    if ($hotel==0)
      { $content .= '

';}else{
$content .= '  
<tr>
  <td style="border-bottom:0px;"><b>Biaya Penginapan '.$data['lama_hotel'].' ('.terbilang($data['lama_hotel']).' ) malam  </b></td>
  <td style="border-right:0px;border-bottom:0px;"></td>
  <td style="border-bottom:0px;" align="right" ></td>
  <td style="border-bottom:0px;" ></td>
</tr>
<tr>
  <td style="border-bottom:0px;">'.$data['lama_hotel_biasa'].' Malam x Rp. '. number_format($data['hotel'],0, ',','.').' </td>
  <td style="border-right:0px;border-bottom:0px;">Rp.</td>
  <td style="border-bottom:0px;"align="right" >'. number_format($data['jumlah_hotel'],0, ',','.').'</td>
  <td style="border-bottom:0px;"></td>
</tr>

';
  };
    
   $content .= ' 
';
                          
$query  = mysql_query("select * From kuitansi_baru  WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $lama_hotel2 =$data['lama_hotel2'];
    if ($lama_hotel2==0)
      { $content .= '

';}else{
$content .= '  

<tr>
  <td style="border-bottom:0px;">'.$data['lama_hotel2'].' Malam x Rp. '. number_format($data['harga_hotel2'],0, ',','.').' </td>
  <td style="border-right:0px;border-bottom:0px;">Rp.</td>
  <td style="border-bottom:0px;"align="right" >'. number_format($data['total_hotel2'],0, ',','.').'</td>
  <td style="border-bottom:0px;"></td>
</tr>

   ';
  };  
   
  $content .= ' 
';
                          
$query  = mysql_query("select * From kuitansi_baru  WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $lama_fullboard_hotel =$data['lama_fullboard_hotel'];
    if ($lama_fullboard_hotel==0)
      { $content .= '

';}else{
$content .= '  

<tr>
  <td style="border-bottom:0px;">'.$data['lama_fullboard_hotel'].' Malam x Rp. '. number_format($data['harga_lama_fullboard_hotel'],0, ',','.').' (Fullboard Meeting) </td>
  <td style="border-right:0px;border-bottom:0px;">Rp. </td>
  <td style="border-bottom:0px;"align="right" >'. number_format($data['total_hotel_fullboard'],0, ',','.').'</td>
  <td style="border-bottom:0px;"></td>
</tr>
   ';
  };        
   
 $content .= '   

';
                          
$query  = mysql_query("select * From kuitansi_baru  WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $hari_hotel1 =$data['hari_hotel1'];
    if ($hari_hotel1==0)
      { $content .= '
<tr>
  <td style="border-bottom:1px;"> </td>
  <td style="border-right:0px;border-bottom:1px;"></td>
  <td style="border-bottom:1px;" align="right" ></td>
  <td style="border-bottom:1px;"></td>
</tr>
';}else{
$content .= '  
<tr>  
  <td >'. number_format($data['hari_hotel1'],0, ',','.').' Malam x Rp. '. number_format($data['hotel1'],0, ',','.').' </td>
  <td style="border-right:0px;">Rp.</td>
  <td align="right">'. number_format($data['hotel2'],0, ',','.').'</td>
  <td ></td>
</tr>



   ';
  };

   $content .= ' 
';
                          
$query  = mysql_query("select * From kuitansi_baru  WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $representasi =$data['representasi'];
    if ($representasi==0)
      { $content .= '
    <tr>   
    <td ><strong>Jumlah</strong></td>
    <td style="border-right:0px;">Rp.</td>
    <td align="right" ><strong>'. number_format($data['jumlah'],0, ',','.').'</strong></td>
    <td ></td>
  </tr>

';}else{
$content .= '  
    <tr>
    <td >Representatif</td>
    <td style="border-right:0px;border-top:0px;">Rp.</td>
    <td align="right" >'. number_format($data['representasi'],0, ',','.').'</td>
    <td ></td>
  </tr>
   <tr>
    <td  ><strong>Jumlah</strong></td>
    <td style="border-right:0px;"><strong>Rp.</strong></td>
    <td align="right" ><strong>'. number_format($data['jumlah'],0, ',','.').'</strong></td>
    <td ></td>
  </tr>';
  };
    
   $content .= ' 
  
  <tr>
    <td colspan="4" ><strong>Terbilang :'.terbilang($data['jumlah']).' Rupiah</strong></td>
  </tr>
  </table><br>
  <table border="0" style="border-bottom:1px;  border-right:0px; border-left:0px;font-size: 12px" >
  <tr>
    <td width="250" ></td>
    <td width="170" ></td>
    <td width="250" align="left"> Jakarta, '.$data['tanggal_kuitansi'].' '.$data['bulan_tgl_kuitansi_new'].' '.$data['tahun'].'</td>
  </tr>
  
  <tr>
    <td width="250" align="left">Telah Dibayarkan sejumlah </td>
    <td width="170" ></td>
    <td width="250" align="left"> Telah menerima jumlah uang sebesar</td>
  </tr>
  
  <tr>
    <td width="250" align="left">Rp. '. number_format($data['jumlah'],0, ',','.').'</td>
    <td width="170" ></td>
    <td width="250" align="left">Rp. '. number_format($data['jumlah'],0, ',','.').'</td>
  </tr>
   <tr>
    <td height="80"width="250" align="center"  >Bendahara Pengeluaran, </td>
    <td width="170" ></td>
    <td height="80" align="center"  >Yang menerima, </td>
  </tr>
  
  ';
$query  = mysql_query("select * From kuitansi_baru WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $date =$data['date1'];   
	$date2 ="2020-12-31";
    if ($date>$date2)
      { $content .= '
  <tr>
    <td align="center" ><u>NURSAMSIDAH</u> <br>NIP. 197306121998032001</td>
    <td width="170" ></td>
    <td align="center"><u>'.$data['nama'].'</u><br>NIP.'.$data['nip_peserta'].'</td>
  </tr>
  ';}elseif ($date<$date2){
$content .= '
<tr>
    <td align="center" ><u>AMALIA SOLICHA, S.KOM, MTI</u> <br>NIP. 198510292008122001</td>
    <td width="170" ></td>
    <td align="center"><u>'.$data['nama'].'</u><br>NIP.'.$data['nip_peserta'].'</td>
  </tr>
';}

$content .= '
  
  </table>
  <br>
<table>
  <tr>
    <td width="700" align="center" height=30 valign="middle"><strong>PERHITUNGAN SPD RAMPUNG</strong></td>
  </tr>
  </table>
  <br>
  <table style="border-bottom:0px;  border-right:0px; border-left:0px;">
  <tr>
    <td width="150" >Ditetapkan sejumlah</td>
  <td width="20" >Rp. </td>
  <td width="150" >'. number_format($data['jumlah'],0, ',','.').' </td>
    <td width="250" align="left"> </td>
  </tr>
  <tr>
    <td width="200" >Yang telah dibayarkan semula </td>
  <td width="20" >Rp. </td>
  <td width="150" >'. number_format($data['jumlah'],0, ',','.').' </td>
    <td width="250" align="left"> </td>
  </tr>
   <tr>
    <td width="150" >Sisa kurang lebih </td>
  <td width="20" >Rp. </td>
  <td width="150" >0 </td>
    <td width="250" align="left"> </td>
  </tr>
   <tr>
    <td width="150" ></td>
  <td width="20" > </td>
  <td width="150" ></td>
    <td width="250" align="center"> Pejabat Pembuat Komitmen</td>
  </tr>
  <tr>
    <td width="150" ></td>
  <td width="20" > </td>
  <td width="150" ></td>
    <td width="250" align="center"> Pusat Pendidikan dan Pelatihan</td>
  </tr>
   <tr>
    <td width="150" ></td>
  <td width="20" > </td>
  <td width="150" ></td>
    <td width="300" align="center"> Badan Meteorologi Klimatologi dan Geofisika</td>
  </tr>
  <tr>
    <td width="150" ></td>
  <td width="20" > </td>
  <td width="150" ></td>
  
    ';
$query  = mysql_query("select * From kuitansi_baru WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $date =$data['date1'];
	$date2 ="2019-12-31";
    if ($date>$date2)
      { $content .= '
  
    <td width="300" height="80" align="center" valign="bottom"><u>KADNAN, M.Si </u><br> NIP. 197905042006041007</td>
   ';}elseif ($date<$date2){
$content .= '

<td width="300" height="80" align="center" valign="bottom"><u> KADNAN, M.Si </u><br> NIP. 197905042006041007</td>
';}

$content .= '  
  </tr> 
                          ';
                   
 $content .= '
   </table >      
  </page>
  
  
  '; 

$content .= '
<page>
<table>
                       
  <tr>
    <td width="380">PUSAT PENDIDIKAN DAN PELATIHAN </td>
    <td>Lampiran IX</td>
  </tr>                  
  <tr>
    <td>JL. ANGKASA I / 2  KEMAYORAN  </td>
    <td>Peraturan Menteri Keuangan Republik Indonesia</td>
  </tr>
  <tr>
    <td>J A K A R T A</td>
    <td>Nomor:113/PMK.05/2012 </td>
  </tr>
  <tr>
    <td></td>
    <td>Tentang</td>
  </tr>
  <tr>
    <td></td>
    <td>Perjalanan Dinas Jabatan Dalam Negeri Bagi Pejabat </td>
  </tr>
   <tr>
    <td></td>
    <td>Negara, Pegawai Negeri, dan Pegawai Tidak Tetap</td>
  </tr>
  </table >
  
   <br><br><br><br><br>
  <table style="border-bottom:1px";>
   <tr>
    <td align="center" width="700" ><strong><h3>DAFTAR PENGELUARAN RIIL</h3></strong></td>
  </tr>
  </table>
  <br><br>
  <table width="700">
  <tr>
    <td colspan="3" height="30">Yang bertanda tangan dibawah ini :</td>
  </tr>
  <tr>
    <td width="50">Nama</td>
    <td>:</td>
    <td>'.$data['nama'].'</td>
  </tr>
  <tr>
    <td>NIP</td>
    <td>:</td>
    <td>'.$data['nip_peserta'].'</td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td>:</td>
    <td>'.$data['jabata_peserta'].'</td>
  </tr>
  <tr>
    <td colspan="3" height="40">Berdasarkan Surat Perjalanan Dinas (SPD) No: SPD.'.$no_urut.'/PPK-PDL/'.$data['bulan_romawi'].'/ '.$data['tahun'].' tanggal '.$data['tanggal'].' '.$data['bulan'].' '.$data['tahun'].', dengan ini kami menyatakan dengan sesungguhnya bahwa: </td>
  </tr>
  </table>
  <br>
<table>
   <tr>
    <td height="20" valign="top">1. </td>
    <td width="680" >Biaya transport pegawai dan/atau biaya penginapan di bawah ini tidak dapat diperoleh bukti-bukti pengeluarannya, pengeluarannya, meliputi :</td>
  </tr>
</table>
  <br>
  <table border="1px" class="tabel" padding:5px; >
  <tr>
    <td align="center" width="20" >No.</td>
    <td  align="center" width="450">Uraian</td>
    <td colspan="2" align="center">JUMLAH</td>
   
  </tr>
  
  <tr>
    <td align="center" style="border-bottom:1px;" height="50">1.</td>
    <td style="border-bottom:1px;">Biaya Transport dalam kota PP</td>
    <td style="border-bottom:1px;border-right:0px;">Rp.</td>
    <td align="right" width="80"style="border-bottom:1px;">'. number_format($data['dpr'],0, ',','.').'</td>
    
  </tr>
  <tr>
    <td colspan="2" align="center">Jumlah Total :</td>
    <td style="border-right:0px;">Rp.</td>
    <td align="right">'. number_format($data['dpr'],0, ',','.').'</td>
  </tr>
  </table > <br> 
  <table >  
  <tr>
    <td height="20" valign="top">2. </td>
    <td width="680" >Jumlah uang tersebut pada angka 1  di atas benar-benar dikeluarkan untuk pelaksanaan Perjalanan Dinas dimaksud dan apabila dikemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke Kas Negara</td>
  </tr>    
   <tr>
    <td></td>
    <td>Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya</td>
  </tr>              
</table><br>
 <table border="0" >
  <tr>
    <td width="250" ></td>
    <td width="170" ></td>
    <td width="250" align="left" height="30"> Jakarta, '.$data['tanggal_kuitansi'].' '.$data['bulan_tgl_kuitansi_new'].' '.$data['tahun'].'</td>
  </tr>
  
  <tr>
    <td width="250" align="left" >Mengetahui / Menyetujui </td>
    <td width="170" ></td>
    <td width="250" align="left"> Pejabat Negara / Pegawai Negeri yang</td>
  </tr>
  
  <tr>
    <td width="250" align="left">Pejabat Pembuat Komitmen</td>
    <td width="170" ></td>
    <td width="250" align="left">melakukan Perjalanan Dinas</td>
  </tr>
  <tr>
  ';
$query  = mysql_query("select * From kuitansi_baru WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $date =$data['date1'];
	$date2 ="2019-12-31";
    if ($date>$date2)
      { $content .= '
  
    <td height="80" valign="bottom"><u>KADNAN, M.Si</u> <br>NIP. 197905042006041007</td>
	 ';}elseif ($date<$date2){
$content .= '
	<td height="80" valign="bottom"><u>KADNAN, M.Si </u><br> NIP. 197905042006041007</td>
';}

$content .= '  	
    <td width="170" ></td>
    <td valign="bottom"><u>'.$data['nama'].'</u><br>NIP.'.$data['nip_peserta'].'</td>
  </tr>
                                    
                          ';                 
 $content .= '
   </table >                                        
</page>
'; 

$content .= '
<page>

<table border="0" class="tabel1">
  <tr>
    <td  align="center" width="370" >BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA </td>
    <td colspan="3">Lampiran I</td>
  </tr>
                    
  <tr>
    <td  align="center" >JL. ANGKASA I / 2  KEMAYORAN  </td>
    <td colspan="3">Peraturan Menteri Keuangan Republik Indonesia</td>
  </tr>
  <tr>
    <td align="center"><u>J A K A R T A</u></td>
    <td colspan="3" >Nomor: 113/PMK.05/2012 </td>  
  </tr>
  <tr>
    <td > </td>
  <td colspan="3" >tentang</td>
  </tr>
  <tr>
    <td></td>
  <td colspan="3">Perjalanan Dinas Jabatan Dalam Negeri Bagi Pejabat</td>
  </tr>
   <tr>
    <td></td>
    <td colspan="3">Negara, Pegawai Negeri, dan Pegawai Tidak Tetap <br><br></td> 
  </tr>
   <tr >
    <td></td>
    <td  >Lembar Ke</td>
    <td>: </td>
  <td>II </td>
  </tr>
  <tr>
    <td></td>
    <td >Kode No.</td>
    <td>: </td>
  <td>'.$no_urut.' </td>
  </tr>
   <tr>
    <td></td>
    <td >Nomor</td>
    <td>: </td>
    <td>SPD.'.$no_urut.'/PPK-PDL/'.$data['bulan_romawi'].'/ '.$data['tahun'].'</td>
  </tr></table><br>
  <table>
  <tr>
    <td width="750" align="center" height=30 valign="middle"><strong>SURAT PERJALANAN DINAS</strong></td>
  </tr>
  </table>
  <br>
  
  <table style="border::1px; border-collapse:collapse; ">
  <tr>
    <td width="10" style="border-bottom:1px;  border-right:1px; border-left:1px; border-top:1px;padding:5px;"  >1.</td>
    <td  width="300" style="border-bottom:1px;  border-right:1px;border-top:1px; padding:5px;">Pejabat Pembuat Komitmen </td>
    <td colspan="3" style="border-bottom:1px;  border-right:1px;border-top:1px; padding:5px;" > KADNAN, M.Si </td>
  </tr>
  <tr>
    <td  style="  border-right:1px; border-left:1px; padding:5px;" >2.</td>
    <td style=" border-right:1px; padding:5px;">Nama/NIP Pegawai yang diperintahkan</td>
    <td colspan="3" style=" border-right:1px;border-top:1px; padding:5px;">'.$data['nama'].'</td> 
  </tr>
  
  <tr>
    <td  style=" border-bottom:1px; border-right:1px; border-left:1px; padding:5px;"></td>
    <td  style=" border-bottom:1px; border-right:1px; border-left:1px; padding:5px;" ></td>
    <td style=" border-bottom:1px; border-right:1px; border-left:1px; padding:5px;" ; colspan="3">'.$data['nip_peserta'].'</td>
  
  </tr>
   <tr>
    <td style="  border-right:1px; border-left:1px; padding:5px;" >3. </td>
    <td style="  border-right:1px; padding:5px;" >a. '.$data['gol_peserta'].'</td>
    <td style="  border-left:1px; padding:5px;" >a.</td>
    <td style="  border-right:1px; border-left:1px; padding:5px;" colspan="2"> '.$data['pangkat_peserta'].'</td>
  </tr>
  <tr>
    <td  style=" border-right:1px; border-left:1px; padding:5px;"></td>
    <td  style=" border-right:1px;  padding:5px;">b. Jabatan/Instansi</td>
    <td  style=" border-left:1px; padding:5px;">b. </td>
    <td  style=" border-right:1px; border-left:1px; padding:5px;" colspan="2"  width="300">'.$data['jabata_peserta'].' </td>
  </tr>
   <tr>
    <td  style=" border-right:1px; border-left:1px; padding:5px;"></td>
    <td style=" border-right:1px;  padding:5px;"></td>
    <td style=" border-left:1px; padding:5px;"> </td>
  <td  style=" border-right:1px; border-left:1px; padding:5px;" colspan="2">Badan Meteorologi Klimatologi dan Geofisika </td>
  </tr>
   <tr >
    <td style=" border-right:1px; border-bottom:1px;  border-left:1px; padding:5px;"></td>
    <td style=" border-right:1px; border-bottom:1px; padding:5px;">c. Tingkat Biaya Perjalanan Dinas</td>
    <td style="  border-bottom:1px; padding:5px;"> c.</td>
    <td style=" border-right:1px; border-bottom:1px; padding:5px;" colspan="2" width="300">'.$data['type_perjalanan'].'</td>
  </tr>
   <tr >
    <td style=" border-right:1px; border-bottom:1px;  border-left:1px; padding:5px;">4.</td>
    <td style=" border-bottom:1px; border-right:1px;  padding:5px;">Maksud Perjalanan Dinas</td>
    <td style=" border-right:1px; border-bottom:1px;  border-left:1px; padding:5px;"colspan="3"  width="300"> '.$data['kegiatan'].'</td>
  
  </tr>
  <tr >
    <td style=" border-right:1px; border-bottom:1px;  border-left:1px; padding:5px;">5.</td>
    <td style=" border-bottom:1px; border-right:1px;  padding:5px;">Alat Angkutan yang dipergunakan</td>
    <td style=" border-right:1px; border-bottom:1px;  border-left:1px; padding:5px;"colspan="3">Kendaraan Umum</td>
  </tr>
   <tr >
    <td style="  border-right:1px; border-left:1px; padding:5px;">6.</td>
    <td style="  border-right:1px; padding:5px;">a. Tempat Berangkat </td>
    <td style="  border-right:1px; border-left:1px; padding:5px;"colspan="3">'.$data['asal'].'</td>
  </tr>
   <tr >
    <td style="  border-right:1px; border-bottom:1px;  border-left:1px; padding:5px;"></td>
    <td style="  border-right:1px; border-bottom:1px; padding:5px;">b. Tempat Tujuan </td>
    <td style="  border-right:1px; border-bottom:1px; border-left:1px; padding:5px;"colspan="3">'.$data['lokasi'].'</td>
  </tr>
  <tr >
    <td style="  border-right:1px; border-left:1px; padding:5px;">7.</td>
    <td style="  border-right:1px; padding:5px;">a. Lamanya Perjalanan </td>
    <td style="  border-left:1px; padding:5px;">a.</td>
    <td colspan="2" style="  border-right:1px; border-left:1px; padding:5px;">'.$data['lama_spt'].' Hari</td>
  </tr>
  <tr >
    <td style="  border-right:1px; border-left:1px; padding:5px;"></td>
    <td style="  border-right:1px; padding:5px;">b. Tanggal Berangkat </td>
    <td style="  border-left:1px; padding:5px;">b.</td>
  <td colspan="2" style="  border-right:1px; border-left:1px; padding:5px;">'.$data['tanggal_pergi'].' '.$data['bulan_pergi'].' '.$data['tahun'].'</td>
  </tr>
  <tr >
    <td style="  border-right:1px;border-bottom:1px;border-left:1px; padding:5px;"></td>
    <td style="  border-right:1px;border-bottom:1px; padding:5px;">c. Tanggal Kembali </td>
    <td width="10"style="  border-left:1px; border-bottom:1px;padding:5px;">c.</td>
    <td style="  border-bottom:1px; border-left:1px; padding:5px;">'.$data['tanggal_pulang'].' '.$data['bulan_pulang'].' '.$data['tahun'].' </td>
    <td style="  border-right:1px;border-bottom:1px; padding:5px;"></td>
  </tr>
  <tr >
    <td style="  border-right:1px;border-bottom:1px;border-left:1px; padding:5px;" height="40" valign="top">8.</td>
    <td style="  border-right:1px;border-bottom:1px;border-left:1px; padding:5px;" valign="top">Pengikut </td>
    <td style="  border-right:1px;border-bottom:1px;border-left:1px; padding:5px;"colspan="2" align="center" valign="top"  >Tanggal Lahir</td>
    <td style="  border-right:1px;border-bottom:1px;border-left:1px; padding:5px;"align="center" valign="top" >Keterangan</td>
  </tr>
   <tr >
    <td style="  border-right:1px; border-left:1px; padding:5px;">9.</td>
    <td style="  border-right:1px;  padding:5px;">Pembebanan Anggaran </td>
    <td style="  border-right:1px;  border-left:1px; padding:5px;" colspan="3"  ></td>
  
  </tr>
  <tr >
    <td style="  border-right:1px; border-left:1px; padding:5px;"></td>
    <td style="  border-right:1px; padding:5px;">a. Institusi</td>
    <td style="  border-left:1px; padding:5px;">a.</td>
  <td colspan="2" style="  border-right:1px; border-left:1px; padding:5px;"  >Pusat Pendidikan dan Pelatihan BMKG</td>
  </tr>
  <tr >
    <td style="  border-right:1px; border-left:1px;border-bottom:1px;padding:5px;"></td>
    <td style="  border-right:1px;border-bottom:1px; padding:5px;">b. Mata Anggaran</td>
    <td style="  border-left:1px;border-bottom:1px; padding:5px;">b.</td>
    <td colspan="2" style="  border-right:1px;border-bottom:1px; border-left:1px; padding:5px;"  >
	3342.'.$data['akun2'].'.'.$data['akun'].'.'.$data['akun1'].'.'.$data['kom'].'.'.$data['sub_kom'].'.'.$data['mak'].'</td>
  </tr>
  <tr >
    <td style="  border-right:1px; border-bottom:1px;border-left:1px; padding:5px;" height="30" valign="top">10.</td>
    <td style="  border-right:1px; border-bottom:1px; padding:5px;" valign="top">Keterangan Lain - lain</td>
    <td style="  border-right:1px; border-bottom:1px; border-left:1px; padding:5px;" colspan="3" ></td>
  </tr>  
  </table > 
  
  <br>
  <table > 
  <tr>
    <td width="380">*) Coret yang tidak perlu</td>
    <td >Dikeluarkan di</td>
    <td >:</td>
    <td >Jakarta</td>
  </tr> 
  <tr>
    <td></td>
    <td>Tanggal</td>
    <td>:</td>
    <td>'.$data['tanggal_kuitansi'].' '.$data['bulan_tgl_kuitansi_new'].' '.$data['tahun'].'</td>
  </tr>     
  <tr>
    <td ></td>
    <td colspan="3" align="center" width="300" height="30" valign="bottom">Pejabat Pembuat Komitmen</td>
  </tr>  
   <tr>
    <td ></td>
    <td colspan="3" align="center">Pusat Pendidikan dan Pelatihan</td>
  </tr>  
   <tr>
    <td ></td>
    <td colspan="3" align="center">Badan Meteorologi Klimatologi dan Geofisika</td>
  </tr>  
 <tr>
 
 ';
$query  = mysql_query("select * From kuitansi_baru WHERE no_peserta='".$kode."'");
$data   = mysql_fetch_array($query);
    $date =$data['date1'];
	$date2 ="2019-12-31";
    if ($date>$date2)
      { $content .= '
 
 
    <td ></td>
    <td colspan="3" align="center" width="300" height="50" valign="bottom"><u>KADNAN, M.Si</u></td>
  </tr>
  <tr>
    <td ></td>
    <td colspan="3" align="center">NIP.197905042006041007
	</td>
	 ';}elseif ($date<$date2){
$content .= '
	
	  <td ></td>
    <td colspan="3" align="center" width="300" height="50" valign="bottom"><u>KADNAN, M.Si</u></td>
  </tr>
  <tr>
    <td ></td>
    <td colspan="3" align="center">NIP.197905042006041007
	</td>
';}

$content .= ' 

	
  </tr>                         
  
   </table >                
  
	</body>
	</page>
	</html>
	</page>
		';

		};
		
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
$filename="Nominatif ".$kode.".pdf"; 
require __DIR__.'/html2pdf_v5.2-master/vendor/autoload.php';

	
	$html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(10, 10, 0, 0), false); 
	
	$html2pdf->writeHTML($content);
	$html2pdf->output("$filename","D");
	 }
 catch(HTML2PDF_exception $e) { echo $e; }
 
 function Terbilang($x)   
 {   
  $bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");   
  if ($x < 12)   
   return " " . $bilangan[$x];   
  elseif ($x < 20)   
   return Terbilang($x - 10) . " belas";   
  elseif ($x < 100)   
   return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);   
  elseif ($x < 200)   
   return " seratus" . Terbilang($x - 100);   
  elseif ($x < 1000)   
   return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);   
  elseif ($x < 2000)   
   return " seribu" . Terbilang($x - 1000);   
  elseif ($x < 1000000)   
   return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);   
  elseif ($x < 1000000000)   
   return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);    
 } 
 
?>