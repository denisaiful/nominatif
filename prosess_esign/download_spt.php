<?php

ob_start();
require_once('../html2pdf/html2pdf.class.php'); 
$no=1;  
$idx = $_POST['idx'];
$query = "select * from spt_baru WHERE kegiatan_peserta=$idx ";
$link = mysqli_connect('localhost', 'webadmin', 'pusdiklatNOMINATIF@&)&@@4', 'sertifikat');
$hasil = mysqli_query($link, $query);
$nik = $_POST['nik'];
$passphrase = $_POST['passphrase'];

include "helper.php";

###########################
// $nik = $_POST['nik'];
$linkQR = 'https://spt-pusdiklat.bmkg.go.id/sertifikat/signed/'; //'https://bmkg.go.id'; //$_POST['linkQR'];
// $passphrase = $_POST['passphrase'];
$tampilan = 'visible'; //$_POST['tampilan'];
$page = 1; //$_POST['page'];
$image = 'false'; //$_POST['image'];
$xAxis = 160; //$_POST['xAxis'];
$yAxis = 150; //$_POST['yAxis'];
$width = 40; //$_POST['width'];
$height = 40; //$_POST['height'];

//$response = CallAPIVerifyNik('GET', '172.19.2.171/api/user/status/'.$nik);
$response = CallAPIVerifyNik('GET', '172.19.0.243/api/user/status/'.$nik);
$json = json_decode($response, true);

$status_code = $json['status_code'];
//echo "<script>alert('".$json."OK'); </script>";


$count_tes = 0;
while ($row = mysqli_fetch_array($hasil)) {		
        // echo $row['nama'];

        // $kode   = $row['no']; //$_GET['getKegiatan']; //kode berita yang akan dikonvert    
        // $query  = "SELECT * from sertifikat_dt WHERE no_peserta='".$kode."' ";
        // $hasil = mysqli_query($link, $query);
        // $data   = mysqli_fetch_array($hasil);
        // $filename="sertifikat ".$kode." - ".$data['nama1'].".pdf";
        // // print_r($query."test");

        // echo $filename;
        // echo $row['no'];

        // testzzz($row['no']);
		
        $filename_pdf = test471($row['no_peserta']);
		
		
				//echo "<script>alert('data berhasil di Input');
 			//window.location='../index3.php?data=kegiatan';</script>";
				
		

        //echo dirname(__FILE__);
        //echo realpath($_SERVER['DOCUMENT_ROOT'])."<br/>";
        //echo realpath($_SERVER['DOCUMENT_ROOT']."/eoffice"."/sertifikat"."/draft"."/".$filename_pdf)."<br/";        
       // echo $filename_pdf."<br/>"."coba"."<br>";
        //echo $_SERVER['DOCUMENT_ROOT']."/eoffice"."/sertifikat"."/draft"."/".$filename_pdf ."<br/>";        
        //echo "<br/><br/>";

        $fullpath_pdf = realpath($_SERVER['DOCUMENT_ROOT']."/sertifikat"."/draft"."/".$filename_pdf);

        $data =
            array(
                'nik' => $nik,
                'linkQR' => $linkQR.$filename_pdf,
                'file' => new CURLFILE($fullpath_pdf, mime_content_type($fullpath_pdf), $filename_pdf),
                //new CURLFILE(realpath($_SERVER['DOCUMENT_ROOT'])."/eoffice"."/sertifikat"."/draft"."/".$filename_pdf), //new CURLFILE('@'.$_SERVER['DOCUMENT_ROOT']."/eoffice"."/sertifikat"."/draft"."/".$filename_pdf),
                // 'imageTTD' => new CURLFILE($imagedata, $imagetype, $imagename),
                'passphrase' => $passphrase,
                'tampilan' => $tampilan,
                'page' => $page,
                'image' => $image,
                'xAxis' => $xAxis,
                'yAxis' => $yAxis,
                'width' => $width,
                'height' => $height,
            );

        
		$Id_peserta = $row['no_peserta'];
		$date = date('Y-m-d H:i:s');
		
	
		
		if ($status_code == 1110) {
	
	
	
		$link = mysqli_connect('localhost', 'webadmin', 'pusdiklatNOMINATIF@&)&@@4', 'sertifikat');
		$update = mysqli_query($link,"update spt_peserta SET 
											status_ttd = 0,
											file_ttd = ''
		WHERE no_peserta=$Id_peserta");	 
		
		//$error_response = 'Terjadi Kesalahan Tanda Tangan';
		$input = mysqli_query($link,"INSERT INTO `sertifikat`.`log_esign` (
									`id` ,
									`id_kegiatan`,
									`id_peserta`,
									`status`,
									`ket`,
									`date`,
									`nik`
									)
									VALUES (
									NULL , 
									'$idx', 
									'$Id_peserta', 
									2, 
									'$status_code', 
									'$date', 
									'$nik'								
									)");	
	
	
echo "<script>alert('NIK belum Terdaftar, silahkan coba lagi');
window.location='../index2a.php?data=esign'; </script>";

	} 

//echo "<script>alert('".$status_code."'); </script>";
if ($status_code == 1111) { 
 
// $response_API = CallAPISign('POST', '172.19.2.171/api/sign/pdf', $data, $filename_pdf);
$response_API = CallAPISign('POST', '172.19.0.243/api/sign/pdf', $data, $filename_pdf);
//echo "<script>alert('".json_encode($response_API)."'); </script>";  
//echo "<script>alert('".$status_code."'); </script>";
		$status_code_api = $response_API[0];
		$filename_ttd = $response_API[1];
		$result_response = json_decode($response_API[2],true);
		
	 if ($status_code_api == 200 ) {
		 
		 //echo "<script>alert('".$status_code."'); </script>";
			$link = mysqli_connect('localhost', 'webadmin', 'pusdiklatNOMINATIF@&)&@@4', 'sertifikat');
			$update = mysqli_query($link,"update spt_peserta SET status_ttd = 1,file_ttd = '$filename_ttd' WHERE no_peserta=$Id_peserta"); 
			 
		$input = mysqli_query($link,"INSERT INTO `sertifikat`.`log_esign` (
									`id` ,
									`id_kegiatan`,
									`id_peserta`,
									`status`,
									`ket`,
									`date`,
									`nik`
									)
									VALUES (
									NULL , 
									'$idx', 
									'$Id_peserta', 
									1, 
									'$status_code', 
									'$date', 
									'$nik'								
									)");	 
			 
			echo "<script>alert('Sertifikat berhasil Ditandatangani');
 			window.location='../index2a.php?data=esign';</script>"; 
		} elseif ( $status_code_api == 400 ){ 
		$link = mysqli_connect('localhost', 'webadmin', 'pusdiklatNOMINATIF@&)&@@4', 'sertifikat');
		
		$update = mysqli_query($link,"update spt_peserta SET 
											status_ttd = 0,
											file_ttd = ''
		WHERE no_peserta=$Id_peserta");	 
		$error_response = 'Terjadi Kesalahan Tanda Tangan';
		$input = mysqli_query($link,"INSERT INTO `sertifikat`.`log_esign` (
									`id` ,
									`id_kegiatan`,
									`id_peserta`,
									`status`,
									`ket`,
									`date`,
									`nik`
									)
									VALUES (
									NULL , 
									'$idx', 
									'$Id_peserta', 
									2, 
									'$status_code', 
									'$date', 
									'$nik'								
									)");	
		
			echo "<script>alert('Passphrase Salah/400');
 			window.location='../index2a.php?data=esign';</script>"; 
			
		
	
    
    // echo "bagus";
	} elseif ( $status_code_api == 401 ){ 
		$link = mysqli_connect('localhost', 'webadmin', 'pusdiklatNOMINATIF@&)&@@4', 'sertifikat');
		
		 $update = mysqli_query($link,"update peserta_diklat SET 
											status_ttd = 0,
											file_ttd = ''
		WHERE no_peserta=$Id_peserta");	 
		$error_response = 'Terjadi Kesalahan Tanda Tangan';
		$input = mysqli_query($link,"INSERT INTO `diklatdb2`.`log_esign` (
									`id` ,
									`id_kegiatan`,
									`id_peserta`,
									`status`,
									`ket`,
									`date`,
									`nik`
									)
									VALUES (
									NULL , 
									'$idx', 
									'$Id_peserta', 
									2, 
									'$status_code', 
									'$date', 
									'$nik'								
									)");	
		
			echo "<script>alert('Sertifikat belum diterbitkan/401');
 			window.location='../index2a.php?data=esign';</script>"; 
			
		
	
    
    // echo "bagus";
	}else { 
$link = mysqli_connect('localhost', 'webadmin', 'pusdiklatNOMINATIF@&)&@@4', 'sertifikat');
$input = mysqli_query($link,"INSERT INTO `diklatdb2`.`log_esign` (
									`id` ,
									`id_kegiatan`,
									`id_peserta`,
									`status`,
									`ket`,
									`date`,
									`nik`
									)
									VALUES (
									NULL , 
									'$idx', 
									0, 
									2, 
									'$status_code', 
									'$date', 
									'$nik'								
									)");	
	
		echo "<script>alert('data GAGAL di Input ".$status_code_api."');
 			window.location='../index2a.php?data=esign';</script>";
    //print_r($response);
} 
    $no++; 
    } 
	
	
		/* else
		
		{
		echo "<script>alert('Sertifikat GAGAL ditandatangani');
 			window.location='../index3.php?data=kegiatan';</script>";
		} */
		$count_tes++;
		echo "<script>alert('OK ".$count_tes."');
 			window.location='../index2a.php?data=esign';</script>";
}



function testz() {
    echo "testz";
}


function test471($getKegiatan) {  

ob_start();
$content = ob_get_clean();

$content = '<page style="font-family: freeserif;   
background-image: url("../bg_sertifikat_teknis.png");  

";  >'.nl2br($content).'</page>';
//include_once("koneksi.php"); //buat koneksi ke database
$link = mysqli_connect('localhost', 'webadmin', 'pusdiklatNOMINATIF@&)&@@4', 'sertifikat');
$kode   = $getKegiatan; //$_GET['getKegiatan']; //kode berita yang akan dikonvert
$query  = mysqli_query($link, "SELECT * FROM spt_baru WHERE kegiatan_peserta='".$kode."' AND status_ttd = 0  ");
$data   = mysqli_fetch_array($query);
$rand = uniqid();
$nama_file="".$kode."-".str_replace(' ', '_', $data['nama_peserta']).".pdf"; 
$filename = $rand."-".$nama_file;  
//
//var_dump($data);
echo $filename;

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
       <strong>Nomor: DL.12.00/'.$no_urut.'/KDL/'.$data['bulan_romawi'].'/'.$data['tahun'].'</strong><br>
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


	try
 {
	 
$kode   = $getKegiatan; //$_GET['getKegiatan']; //kode berita yang akan dikonvert
$query  = mysqli_query($link, "select * from spt_baru WHERE no_peserta='".$kode."'");
$data   = mysqli_fetch_array($query);
// $filename="Nominatif ".$kode.".pdf"; 

	$format =array('215.9','330');
	$html2pdf = new Html2Pdf('P',$format,'fr', true, 'UTF-8', array(20, 10, 0, 0), false); 
	$html2pdf->writeHTML($content);
	// $html2pdf->output("$filename"); // $html2pdf->output("$filename","D");
	$html2pdf->setDefaultFont('bmb');
	$html2pdf->addFont('booksman','','booksman.php');
	
	// $html2pdf->AddFont('roboto', 'normal', 'roboto.php');
  

    // // Tambahan: 2021-06-19 mak
    // https://github.com/spipu/html2pdf/blob/master/doc/output.md
     ob_clean();
	
	//echo "<script>alert('".$_SERVER['DOCUMENT_ROOT']."/sertifikat"."/draft"."/".$filename."'); </script>";
	
    $html2pdf->Output($_SERVER['DOCUMENT_ROOT']."/sertifikat"."/draft"."/".$filename, 'F');
	
	 }
	 
 catch(HTML2PDF_exception $e) { echo $e; }

 return $filename;


}


// function testzzz($getKegiatan) {

//     // session_start();
//     // ob_start();
//     // include_once("koneksi1.php"); //buat koneksi ke database

    

//     $kode   = $getKegiatan; //$_GET['getKegiatan']; //kode berita yang akan dikonvert    
//     $query  = "SELECT * from sertifikat_dt WHERE no_peserta='$kode'";
//     $hasil  = mysqli_query($query);
//     $data   = mysqli_fetctch_array($hasil);
//     $filename="sertifikat ".$kode." - ".$data['nama1'].".pdf";
//     // var_dump($data);

//     echo $kode;

//     echo $filename;

//     $bilangan = $data['no_urut'];
//     $no_urut = sprintf("%05d", $bilangan);
//     $tempatlahir=$data['tempat_lahir'];
//     $lahir=strtolower($tempatlahir);
//     $lahir1=ucwords($lahir);
//     $angka = sprintf("%04d",$bilangan);
//         $selisih=$data['pjg'];
//                     if($selisih >= 35){
//                 $fontsize="16pt";
//                 } else{
//                         $fontsize="12pt"; 
                        
//                 }			

    
//     $content = '
//     <style type="text/css">

//     .uppercase {
//         text-transform: uppercase;
//     }
//     * {
//         font-family: Arial;
//     }

//     p { text-align: justify;}


//     h2 {
//         font-family: booksmanb;
//         font-weight: bold;
//     }
//     h3 {
//         font-family: times;
//     }
//     h1  {
//         font-family: timesbi;
//     };
//     .tabel {border-collapse:collapse; font-size:28px; }
//     .tabel th {padding:5px; background-color: grey }
//     .tabel td {padding:2px; font-family: bmb;  }
//     .tabel tr {font-size:20px; }
//     .tabel1 {border-collapse:collapse; }
//     </style>



//     ';
//     $content .= '
//     <page backimg="bg_sertifikat_teknis.png">


//     <table border="0"> 
//     <tr >
//     <td  width="1050" align="center" valign="bottom" height=140  style="font-size:18pt; font-family: booksmanb;">SERTIFIKAT</td>
//     </tr>
//     <tr >
//     <td  width="1050" align="center" valign="middle" style="font-size:12pt; font-family: Arial;" >Nomor: 09.00/'.$data['subkategori_diklat'].'/'.$no_urut.'/PELATIHAN/'.$data['bulan_keg_romawi'].'/BMKG-'.$data['tahun_keg'].'</td>   
//     </tr>
//     </table><br>

//     <table border="0"   >
//     <tr >
//     <td align="justify" width="1100" style="font-size:12pt;font-family: Arial;line-height:1.5;" >
//     Pusat Pendidikan dan Pelatihan Badan Meteorologi Klimatologi dan Geofisika berdasarkan Undang-Undang Nomor 5 Tahun 2014 Tentang Aparatur Sipil
//     Negara, serta ketentuan pelaksanaannya menyatakan bahwa:</td>

//     </tr>
//     </table>
//     <br> 
//     <table border="0" class="tabel" >
//     <tr >
//         <td rowspan="7" width="180" align="center" ><img src=https://pusdiklat.bmkg.go.id/uploads/image/'.$data['image'].' width=120></td>
//         <td width="100" align="left" style="font-size:12pt; " >Nama</td>
//         <td style="font-size:12pt;">:</td>
//         <td width="570"  align="left" style="font-size:'.$fontsize.'; ">'.$data['nama1'].'</td>
//     </tr>
    
//     <tr >
        
//         <td width="150" align="left" style="font-size:12pt;">Nomor Identitas</td>
//         <td style="font-size:12pt;">:</td>
//         <td  align="left" style="font-size:12pt;">'.$data['nip'].'</td>       
//     </tr>
    
//     <tr >
        
//         <td width="250" align="left" style="font-size:12pt;">Tempat/Tanggal Lahir</td>
//         <td style="font-size:12pt;">:</td>
//         <td  align="left" width="450" style="font-size:12pt;" >'.$lahir1.' / '.$data['tgl_lahir'].' '.$data['bulan_lahir'].' '.$data['tahun_lahir'].'</td>
//     </tr>
    
//     <tr >	
//         <td width="250" align="left" style="font-size:12pt;" >Pangkat/Golongan/Ruang</td>
//         <td style="font-size:12pt;">:</td>
//         <td width="570" align="left" style="font-size:12pt;">'.$data['pangkat_peserta'].' - '.$data['gol_peserta'].'</td>
//     </tr>

//     <tr >	
//         <td width="180" align="left" valign="top" style="font-size:12pt;">Jabatan</td>
//         <td valign="top" style="font-size:12pt;">:</td>
//         <td width="570"  align="left" valign="top" style="font-size:12pt;">'.$data['jabatan_baru'].'</td>
//     </tr>
    
//     <tr  >	
//         <td width="180" align="left" valign="top" style="font-size:12pt;">Unit Kerja</td>
//         <td valign="top" style="font-size:12pt;">:</td>
//         <td width="630"  align="left" valign="top" style="font-size:12pt;">'.$data['unit_kerja_baru'].'</td>
//     </tr>
    
//     <tr  >	
//         <td width="180" align="left" valign="top" style="font-size:12pt;">Keterangan </td>
//         <td valign="top" style="font-size:12pt;">:</td>
//         <td width="570"  align="left" valign="top" style="font-size:12pt;">Telah Mengikuti Pelatihan</td>
//     </tr>
        
//     </table>
//     <br>  
//     <table border="0"> 
//     <tr >
//     <td width="1100"  style="font-size:12pt;font-family: Arial;line-height:1.5;">
//     Pada '.$data['kegiatan'].' Tahun '.$data['tahun_keg'].' yang diselenggarakan oleh Pusat Pendidikan 
//     dan Pelatihan Badan Meteorologi Klimatologi dan Geofisika dari tanggal 
//         '.$data['waktu_awal'].' '.$data['bulan_awal'].'  sampai dengan '.$data['waktu_akhir'].' 
//         '.$data['bulan_akhir'].' '.$data['tahun_keg'].' dengan metode daring (<i>Online</i>) selama '.$data['jp'].' ('.Terbilang($data['jp']). ') jam pelatihan.</td>  
//     </tr> 
//     </table>  
//     <table border="0">
//     <tr >
//         <td width="600" align="center" ></td>
//     <td align="center" valign="bottom" height=40 style="font-size:12pt;">Jakarta, '.$data['tgl_sertifikat'].' '.$data['bln_sertifikat'].' '.$data['tahun_keg'].'</td>
//     </tr>
//     <tr >
//     <td width="600" align="center" ></td>
//     <td align="center" valign="top" height=75 style="font-size:12pt;">KEPALA PUSAT PENDIDIKAN DAN PELATIHAN<br>BADAN METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA,</td>
//     </tr>
//     <tr >
//     <td width="600" align="center" ></td>
//     <td align="center" style="font-size:12pt;"><u>Drs. MAMAN SUDARISMAN, DEA</u><br>NIP. 196202251985031001</td>
//     </tr>
//     <tr >
//     <td width="600" align="center" ></td>
//     <td align="center"  style="font-size:16px;"></td> 
//     </tr>
    
//     </table>

//     </page>
//     '; 

    


//     $content .= '
//     <style>
//     div.a {
//         font-family:booksman;
        
//         font-weight: bold;
//         font-size: 28px;
//         text-align: center;
//     }

//     div.b {
        
//         font-size:20px;
//         text-align: center;
//     }
//     .tabel {border-collapse:collapse; font-size: 52%; font-family: booksmanb;}
//     .tabel th {padding:5px; background-color: #b3b3b3 }

//     .tabel td {padding:3px; font-size: 10px;  }
//     .tabel td span {
//     display: block;
//     white-space: nowrap;
//     width: 100px;
//     overflow: hidden;
    
    
//     }
//     </style>

//     <page>
//     <div><br>
//     <table border="0" >
//         <tr>
//         <td width="1050" style="font-size:24pt; font-family:bmb; text-align: center; ">
//     DAFTAR MATA PELATIHAN
//     </td>
//     </tr>
    
//     </table>
            
//     </div>
//     <br><br>				
//         '; 

//     // $kode   = $getKegiatan; //$_GET['getKegiatan'];
//     $no = 1; 
//     $query  = mysqli_query("SELECT
//     peserta_diklat.Id,
//     kurikulum1.mata_diklat,
//     kurikulum1.nip_peserta
//     FROM
//     peserta_diklat
//     INNER JOIN kurikulum1 ON kurikulum1.kegiatan_peserta = peserta_diklat.id_diklat
//     WHERE peserta_diklat.Id = '".$kode."'");
    
//     while ($data = mysqli_fetch_array($query)) {   
//         $content .= '
        
//         <div >
        
//         <table border="0" >
//         <tr>
//         <td width="30" style="font-size:14pt;">
//     '.$no.'.
//     </td>
//         <td style="font-size:14pt; font-weight: normal;font-family: booksman;">
//     '.$data['mata_diklat'].'
//     </td>
//     </tr>
    
//     </table>
//     </div>
//     '; $no++;
//     } ; 

    

//     // $kode   = $getKegiatan; //$_GET['getKegiatan']; //kode berita yang akan dikonvert
//     $query  = mysqli_query("
//     SELECT * From sertifikat_dt WHERE no_peserta='".$kode."' ");
//     $data   = mysqli_fetch_array($query);
//     $content .= '
        
//     </page>	
//     '; 


    
        
//     // echo "test3";
    

//     $format =array('215.9','330');
//     $html2pdf = new HTML2PDF('L',$format,'en', false, 'ISO-8859-15',array(25, 10, 15, 5));
//     $html2pdf->addFont('booksman','','booksman.php');
    

//     $html2pdf->setDefaultFont('bmb');
//     $html2pdf->pdf->SetDisplayMode('fullpage');
//     $html2pdf->writeHTML($content);
//     // $html2pdf->Output($filename);

//     // Tambahan: 2021-06-19 mak
//     // https://github.com/spipu/html2pdf/blob/master/doc/output.md
//     // ob_clean();
//     $html2pdf->Output($_SERVER['DOCUMENT_ROOT']."/eoffice"."/sertifikat"."/draft"."/".$filename, 'F');

    
//     // //
// }


// // Tambahan: 2021-06-19 mak
// // https://github.com/spipu/html2pdf/blob/master/doc/output.md
// // ob_clean();
// $html2pdf->Output($_SERVER['DOCUMENT_ROOT']."/eoffice"."/sertifikat"."/draft"."/".$filename, 'F');


function Terbilang($x)   
 {   
  $bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");   
  if ($x < 12)   
   return " " .$bilangan[$x];   
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
