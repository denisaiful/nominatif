<?php 

if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda telah habis.. silahkan login kembali...');
 			window.location='page_login.php';</script>";
}else {
/*error_reporting(0);*/
?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container-fluid">

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Petugas SPT</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive"> 
 
<div id="HTMLtoPDF"> 
<?php
include "koneksi.php";
$idx= $_GET['idx'];

//view
if(isset($_GET['idx'])) {
	$view = mysql_query("select * from spt_pimpinan where no=$idx");
	$dt_view = mysql_fetch_array($view);
	
	echo "

<table  border='0' cellpadding='4' class='table'>

	</div>
	  <tr>
    <td>Kegiatan</td>
    
    <td>$dt_view[kegiatan]</td>
  </tr> 
	
 <tr>
    <td>PIMPINAN</td>
    
    <td>$dt_view[nama]</td>
  </tr>
  <tr>
    <td>NIP</td>
    
    <td>$dt_view[nip]</td>
  </tr>
  
  <tr>
    <td>Tempat Kegiatan</td>
    
    <td>$dt_view[jab]</td>
  </tr>
  <tr>
    <td>Jumlah Peserta</td>
    
    <td>$dt_view[unit_kerja] orang</td>
  </tr>
  
  
 <tr>
    <td>Tanggal SPT</td>
    
    <td>$dt_view[tgl_spt]</td>
  </tr>  
  


</table> <p>";
	
}

//update


?>
</div>
<hr>


<!-- Input Moda -->

<button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target="#myModal">Tambah Pegawai</button>



<!--<button type="button" rel="pulse-shrink" class="btn-u btn-u-blue pulse-shrink" data-toggle="modal" data-target="#myModal">
<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Tambah Data</button>-->
<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         
		 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
         <div class="modal-body">  
         <form action="#" method="post"> 
			<?php
        // ambil data dari database
		require 'koneksi.php';
		$idx= $_GET['idx'];
		//$link = mysqli_connect('localhost', 'root', 'P@ssw0rdbmkg2020', 'sertifikat');
        $query = "select * from spt_pimpinan where no=$idx";
        $hasil = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($hasil)) {
                            ?>             
        <input value="<?php echo $row['no'] ?>"name="kegiatan_peserta" type="hidden"  class="form-control" readonly>
                           
                            <?php
                        }
                        ?>       	
       		<?php
            // ambil data dari database
			require 'koneksi.php';
			$idx= $_GET['idx'];
			//$link = mysqli_connect('localhost', 'root', 'P@ssw0rdbmkg2020', 'sertifikat');
            $query = "select * from spt_pimpinan where no=$idx";
            $hasil = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($hasil)) {
                ?>                    
          <input value="<?php echo $row['kegiatan'] ?>"  type="hidden"  class="form-control" readonly>
            
                            <?php
                        }
                        ?>    
	<div class="form-group">	
		<label for="message-text" class="control-label">Nama</label>       
        <select name="nip_peserta" class="js-example-basic-multiple"  multiple="multiple" id="nip" placeholder="Cari Nama Peserta..." style="width:100%">
        <option value="0">-Pilih-</option>
        <?php 
		

    	include "koneksi.php";
		$result = mysql_query("select * from spt_peserta_eksternal

");		
   
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysql_fetch_array($result)) {    
        echo '<option value="' . $row['nip'] . '">' . $row['namapegawai'] . ' / ' . $row['namaunitkerja'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nip'] . "'] = 
		{NAMA:'" . addslashes($row['nip']) . 
		"',nama:'".addslashes($row['namapegawai']).
		"',tempat_lahir:'".addslashes($row['tempatlahir']).
		"',tanggallahir:'".addslashes($row['tanggallahir']).
		"',jabatan:'".addslashes($row['namajabatan']).
		"',unit_kerja:'".addslashes($row['namaunitkerja']).
		"',pangkat:'".addslashes($row['pangpegawai']).
		"',gol:'".addslashes($row['golpegawai']).
		
		"'};\n";    
    }      
    ?>    
        </select>
	</div>
	
	<input type="hidden" id="nip_pegawai" name="nip_pegawai" size="50" class="form-control" readonly>
    <input type="hidden" id="nama" name="nama_peserta" size="50" class="form-control" readonly>
	<input type="hidden" id="pangkat" name="pangkat_peserta" size="50"  class="form-control" readonly >
	<input type="hidden" id="tempat_lahir" name="tempatlahir" size="50"  class="form-control" readonly >
	<input type="hidden" id="tanggallahir" name="tanggallahir" size="50" class="form-control" readonly>    
		  
      
	   <div class="form-group">           	
		<input type="text"  name="asal"  size="50"  class="form-control" placeholder="Lokasi Asal" required>
	   </div>
			
        <div class="form-group">           		
       		<input type="text"  name="lokasi"  size="50"  class="form-control" placeholder="Lokasi Kegiatan" required>
        </div>
        
		<div class="row">
        <div class="col-md-3">
        <label for="message-text" class="control-label">Lama Hari</label>
            <input type="text" name="lama"  class="form-control" placeholder="(hari)" required>
        </div>		                              
		</div>
<br>
		

		<div class="form-group ">    		
    		<div class="input-daterange input-group" id="datepicker">
        	<input type="text" class="input-sm form-control" autocomplete="off" id="tgl_awal" name="tgl_pergi_new" placeholder="Awal Kegiatan" required  />
        	<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        	<input type="text" class="input-sm form-control" id="tgl_akhir" name="tgl_pulang_new"  placeholder="Akhir Kegiatan" autocomplete="off" required />
            </div>
            </div>
			
			<div class="form-group ">
    		<div class="input-daterange input-group" id="datepicker">
				<input type="text" class="input-sm form-control" autocomplete="off" id="tgl_kuitansi" name="tgl_kuitansi_new" placeholder="Tgl_kuitansi" required />
        	</div>
            </div>

                        <!-- End Datepicker Forms -->

                        <!-- Validation Forms -->
      
			<div class="form-group">
			<div class="row">
			<div class="col-md-3">
			 <label for="message-text" class="control-label">Type Perjalanan</label>
				<select name="type_perjalanan" class="form-control">
					<option value="" selected disabled>Pilih Type</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>                           
				</select>
			</div>
		
		<div class="col-md-3">
		<label for="message-text" class="control-label">Uang Harian</label>
           
           <input type="text" name="uang_harian" class="form-control" placeholder=" (Rp)" onkeyup="convertToRupiah(this);" >
        </div>
		
		<div class="col-md-3">
           <label for="message-text" class="control-label">Lama UH</label> 
          
           <input type="text" name="lama_uh"    class="form-control" placeholder=" (hari)" >
        </div> 
        </div>	
		</div>	        
		
		<div class="row">
        <div class="col-md-3">
           <label for="message-text" class="control-label">Tiket</label>	
          
           <input type="text" name="transport"    class="form-control" placeholder=" (Rp)" onkeyup="convertToRupiah(this);" >
        </div>       
		 <div class="col-md-3">  
		   <label for="message-text" class="control-label">Representatif</label> 
			
			<input type="text" name="representasi" class="form-control" placeholder=" (Rp)" onkeyup="convertToRupiah(this);">
        </div>
		
		 <div class="col-md-3"> 
		  <label for="message-text" class="control-label">DPR</label> 
		
			<input type="text" name="dpr"   class="form-control" placeholder="(Rp)" onkeyup="convertToRupiah(this);" >
        </div>
                                            
    </div>
	
	 <div class="row"> 	   
	   <div class="col-md-3">    
 <label for="message-text" class="control-label">Lama Hotel</label> 	   
      
            <input type="text" name="lama_hotel" class="form-control" placeholder="(malam)">
        </div>
        <div class="col-md-3">
		<label for="message-text" class="control-label">Harga Hotel</label>
		
           <input type="text" name="hotel" class="form-control" placeholder=" (Rp)" onkeyup="convertToRupiah(this);">
        </div>	                                
    </div>
	
	<div class="row"> 	 
		  <div class="col-md-3">
		  <label for="message-text" class="control-label">Lama Hotel 30%</label>
          
           <input type="text" name="hari_hotel1"    class="form-control" placeholder="(Malam)" >
        </div>
        <div class="col-md-3">
        <label for="message-text" class="control-label">Harga Hotel 30%</label>  
        
        <input type="text" name="hotel1"  class="form-control" placeholder="(Rp)" onkeyup="convertToRupiah(this);">
        </div>                                  
    </div>
	 <div class="row">
	 <div class="col-md-3"> 
 <label for="message-text" class="control-label">Lama Fullboard</label> 	 
       
         	<input type="text" name="hari_fullboad"  size="50"  class="form-control" placeholder="(Hari)" >
        </div>

        <div class="col-md-3"> 
<label for="message-text" class="control-label">Fullboard</label> 		
       
         <input type="text" name="fullboard"  class="form-control" placeholder="(Rp)" onkeyup="convertToRupiah(this);" >
        </div>				                               
		</div>
	
	 <div class="row">	 
	 <div class="col-md-3">    
<label for="message-text" class="control-label">Lama Hotel Fullboard</label>	 
       
         	<input type="text" name="lama_fullboard_hotel"  size="50"  class="form-control" placeholder="(Hari)" >
        </div>
        <div class="col-md-3">
<label for="message-text" class="control-label">Biaya hotel Fullboard</label>			
     
         <input type="text" name="harga_lama_fullboard_hotel"  class="form-control" placeholder="(Rp)" onkeyup="convertToRupiah(this);" >
        </div>		                               
    </div>
                      
		<!-- End Validation Forms -->
        	
                                    
			<input type="hidden" id="gol" name="gol_peserta" size="50"  class="form-control" readonly >  
				
			<input type="hidden" name="no_urut[]">				
			        
       		<input type="hidden" id="jabatan" name="jabatan_peserta"  size="50"  class="form-control" readonly >          
                 
            <input type="hidden" id="unit_kerja" name="unit_kerja_peserta" size="50"  class="form-control" readonly >        
		  </div>
           <div class="modal-footer">
           <button name="reset" type="reset" value="Reset" class="btn btn-success">Reset</Button>
            <button name="save" type="submit" value="Simpan" class="btn btn-success">Input</button>
         </div>
		 </form> 
      </div>  
  </div>
  </div>                 


<!--End Input Moda --> 

<?php
include "koneksi.php";
$idx= $_GET['idx'];
$tahun = date('Y');



$cek = mysql_fetch_array(mysql_query("SELECT no_urut FROM spt_peserta WHERE tahun_buat LIKE '$tahun' ORDER BY no_peserta DESC LIMIT 1 "));
$no_urut = 1;

if ($cek) { 
	$no_urut =$cek[0]+1;  
}

if(isset($_POST['save']))
{ 
    
	$nama_peserta = $_POST['nama_peserta'];
	$nama_peserta = addslashes($nama_peserta);
	$namaArr = explode("|", $nama_peserta);
	
	$tempat_lahir =$_POST['tempatlahir'];
	$tempat_lahirArr = explode("|", $tempat_lahir);
	
	$tanggallahir =$_POST['tanggallahir'];
	$tanggallahirArr = explode("|", $tanggallahir);

	$nip_peserta =$_POST['nip_pegawai'];
	$nipArr = explode("|", $nip_peserta);

	$pangkat_peserta =$_POST['pangkat_peserta'];
	$pangkatArr = explode("|", $pangkat_peserta);

	$gol_peserta =$_POST['gol_peserta'];
	$golArr = explode("|", $gol_peserta);

	$jabatan_peserta =$_POST['jabatan_peserta'];
	$jabatanArr = explode("|", $jabatan_peserta);

	$unit_kerja_peserta=$_POST['unit_kerja_peserta'];
	$unit_kerja_peserta = addslashes($unit_kerja_peserta);
	$unit_kerjaArr = explode("|", $unit_kerja_peserta);

	$kegiatan_peserta =$_POST['kegiatan_peserta'];
	$lokasi = $_POST['lokasi'];
	$asal = $_POST['asal'];
	$lama = $_POST['lama'];
	$tgl_pergi_new = $_POST['tgl_pergi_new'];
	$tgl_pulang_new = $_POST['tgl_pulang_new'];
	$spt='SPT';
	$uang_harian=$_POST['uang_harian'];
	$harga_new = str_replace(".", "", $uang_harian);
	$transport=$_POST['transport'];
	$transport_new = str_replace(".", "", $transport);
	$hotel=$_POST['hotel'];
	$hotel_new = str_replace(".", "", $hotel);
	$lama_hotel=$_POST['lama_hotel'];
	$dpr=$_POST['dpr'];
	$dpr_new = str_replace(".", "", $dpr);
	$representasi=$_POST['representasi'];
	$representasi_new = str_replace(".", "", $representasi);
	$type_perjalanan=isset( $_POST['type_perjalanan'])? $_POST['type_perjalanan']:'';
	$hotel1=$_POST['hotel1'];
	$hotel1_new = str_replace(".", "", $hotel1);
	$hari_hotel1=$_POST['hari_hotel1'];
	$fullboard=$_POST['fullboard'];
	$fullboard_new = str_replace(".", "", $fullboard);
	$hari_fullboad=$_POST['hari_fullboad']; 
	$lama_uh=$_POST['lama_uh'];
	$tgl_kuitansi_new=$_POST['tgl_kuitansi_new'];
	$harga_lama_fullboard_hotel=$_POST['harga_lama_fullboard_hotel'];
	$harga_lama_fullboard_hotel_new = str_replace(".", "", $harga_lama_fullboard_hotel);
	$lama_fullboard_hotel=$_POST['lama_fullboard_hotel'];	
	$no_urut=$no_urut;
	//$no_spt=$_POST['no_spt'];
	
	$allInput = 0;
			for($i=0; $i<count($nipArr); $i++) {
				
				$cekdulu= "select * from spt_peserta where nip_peserta='$nipArr[$i]' AND (tgl_pergi_new <='$tgl_pulang_new' AND tgl_pulang_new >= '$tgl_pergi_new')";				
				
				$prosescek= mysql_query($cekdulu);
				
				while ($row = mysql_fetch_assoc($prosescek)) {
								
				echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					  <strong>".$row['nama_peserta']."</strong> sudah ada kegiatan pada tanggal tersebut.
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					  </button>
					</div>";
				break;
				}
				
				if(mysql_num_rows($prosescek)==0)
		
	{
	
	
	if(empty ($kegiatan_peserta)
		or count($namaArr) == 0
		or count($tempat_lahirArr) == 0
		or count($tanggallahir) == 0
		or count($nipArr) == 0
		or count($pangkatArr) == 0 
		or count($golArr) == 0 
		or count($jabatanArr) == 0 
		or count($unit_kerjaArr) == 0 
		
		)
	{
		echo "<script>alert('Data ada yang belum diisi');
 			window.location='index2a.php?data=prosesreg1&idx=$idx';</script>";
				
		}else{
			
			
				$query = "INSERT INTO `sertifikat`.`spt_peserta` (
									`no_peserta` ,
									`kegiatan_peserta` ,
									`nama_peserta` ,
									`tempatlahir` ,
									`tanggallahir` ,
									`nip_peserta` ,
									`pangkat_peserta` ,
									`gol_peserta` ,
									`jabatan_peserta` ,
									`unit_kerja_peserta` ,
									`lokasi` ,
									`asal` ,
									`lama` ,
									`tgl_pergi_new` ,
									`tgl_pulang_new`,
									`spt`,
									`uang_harian`,
									`transport`,
									`hotel`,									
									`dpr`,
									`representasi`,
									`type_perjalanan`,
									`hotel1`,
									`hari_hotel1`,
									`fullboard`,
									`hari_fullboad`,
									`lama_hotel`,
									`lama_uh`,
									`tgl_kuitansi_new`,
									`lama_fullboard_hotel`,
									`harga_lama_fullboard_hotel`,
									`no_urut`,
									`tahun_buat`
									
									)
									VALUES (
									NULL , 
									'$kegiatan_peserta', 
									'$namaArr[$i]', 
									'$tempat_lahirArr[$i]', 
									'$tanggallahirArr[$i]', 
									'$nipArr[$i]', 
									'$pangkatArr[$i]', 
									'$golArr[$i]', 
									'$jabatanArr[$i]', 
									'$unit_kerjaArr[$i]', 
									'$lokasi', 
									'$asal',
									'$lama', 
									'$tgl_pergi_new', 
									'$tgl_pulang_new',
									'$spt',
									'$harga_new',
									'$transport_new',
									'$hotel_new',
									'$dpr_new',
									'$representasi_new',
									'$type_perjalanan',
									'$hotel1_new',									
									'$hari_hotel1',
									'$fullboard_new',
									'$hari_fullboad',
									'$lama_hotel',
									'$lama_uh',
									'$tgl_kuitansi_new',
									'$lama_fullboard_hotel',
									'$harga_lama_fullboard_hotel_new',
									'$no_urut',
									'$tahun'
									
									)";
				
				$input = mysql_query($query);
				$no_urut +=1;
				$allInput += $input;
				
			}
			
			if($allInput>0) {
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>".$namaArr[$i]."</strong> Berhasil diinput.
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					  </button>
					</div>";
				//echo "<script>alert('data berhasil di Input');
 			//window.location='index2a.php?data=prosesreg1&idx=$idx';</script>";
				
			}
			else {
				//echo "<script>alert('data GAGAL di Input');
 			//window.location='index2a.php?data=prosesreg1&idx=$idx';</script>";
			}
			}
} };
				
?>
  <p>      
  
  

  <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
                <tr>
                       	<th rowspan="2" width="2%">No.</th>                        
                        <th rowspan="2" width="130px">Nomor SPT</th>
                        <th rowspan="2" width="220px" style="text-align:center">Nama</th>
                        <th rowspan="2" width="220px" style="text-align:center">Tujuan</th>
                        <th rowspan="2" style="text-align:center">Tgl Pergi</th>
                        <th rowspan="2" style="text-align:center">Tgl Kembali</th>
						<th rowspan="2" style="text-align:center">Tgl Kuitansi</th>
						<th rowspan="2" style="text-align:center">Lama </th>
                        <th colspan="4" style="text-align:center">Aksi</th>                        
                    </tr>

                    <tr>
						<th>Kuitansi</th>
                        <th>SPT</th>
                        <th>Edit</th>
						<th>hapus</th>
                        
                    </tr>
                </thead>
         <tbody>
            <?php
			require 'koneksi.php';			
			$no=1;
			$getKegiatan = $_GET['idx'];			
		    $query = "SELECT CONCAT_WS( ' / ', no_urut,
spt,(case substr(tgl_spt_new,6,2) 
 when 1 then 'I' 
 when 2 then 'II' 
 when 3 then 'III' 
 when 4 then 'IV' 
 when 5 then 'V' 
 when 6 then 'VI' 
 when 7 then 'VII' 
 when 8 then 'VIII' 
 when 9 then 'IX' 
 when 10 then 'X' 
 when 11 then 'XI' 
 when 12 then 'XII' else '' end), 
 substr(tgl_spt_new,1,4)  ) AS no_spt, 
 no_peserta,
 nama_peserta, 
 LENGTH(nama_peserta) as pjg,
 lama, kegiatan, 
 lokasi,
 tgl_pergi_new,
 tgl_pulang_new,
 tgl_kuitansi_new,
 (`spt_peserta`.`lama`)+(`spt_peserta`.`hari_hotel1`) AS `total_lama` 
 FROM spt_peserta INNER JOIN spt_pimpinan 
						ON kegiatan_peserta = no WHERE no ='$getKegiatan' ORDER BY no_peserta desc ";
			//$link = mysqli_connect('localhost', 'root', 'P@ssw0rdbmkg2020', 'sertifikat');
			
            $hasil = mysqli_query($link, $query);
			
			//var_dump(mysqli_fetch_array($hasil));
            while ($row = mysqli_fetch_array($hasil)) {
				
				$selisih=$row['pjg'];
				  if($selisih >=30){
             $fontsize="9px";
			  } else{
					$fontsize="14px";	
			  }
                ?>
				
                <tr>
                	<td><?php echo $no ?>.</td>
                    <td><?php echo $row['no_spt'] ?></td>
                  <?php echo "<td style='font-size:$fontsize'>" ?><?php echo $row['nama_peserta'] ?></td>                    
                    <td><?php echo $row['lokasi'] ?></td>
					<td><?php echo $row['tgl_pergi_new'] ?></td>
					<td><?php echo $row['tgl_pulang_new'] ?></td>
					<td><?php echo $row['tgl_kuitansi_new'] ?></td>
                    <td><?php echo $row['lama'] ?> Hari</td>
					<td valign="middle" align="center">

					<a href="javascript:void(0);"
							onclick="window.open('laporan-php-html2pdf/kuitansi.php?getKegiatan=<?php echo $row['no_peserta']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">
						<i class="fas fa-print fa-2x"></i>
					</a>
						</td>
					<td align="center"><a href="javascript:void(0);"
					onclick="window.open('laporan-php-html2pdf/report_spt.php?getKegiatan=<?php echo $row['no_peserta']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">  <i class="fas fa-print fa-2x"></i></a>
					</td>
					<td><a href="<?php echo "index2a.php?data=proseseditpeserta&idx=".$row['no_peserta']."&idk=".$getKegiatan; ?>"><i class="fas fa-edit fa-2x"></i></a>
					</td>
					
					<td><a href="<?php echo "index2a.php?data=hapus_peserta&idx=".$row['no_peserta']; ?>"><i class="fas fa-eraser fa-2x" onclick="return deleteconfig()"></i></a>
					</td>
                        
                </tr>
                <?php
            $no++; }
			
            ?>
            </tbody>
        </table>
 </div>
  <a href="index2a.php?data=ppnpn" class="btn btn-danger shadow p-2 mb-4">
  <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Kembali</a><p>
</div>
</div>
</div>
</div>
<?php } ?>
<script src="vendor/jquery/jquery.min.js"></script>


<!--<script src="js/dataTables/jquery.dataTables.js"></script>
<script src="js/dataTables/dataTables.bootstrap.js"></script>-->
<script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript"  src="js/rupiah-rp.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>


  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  
  <script type="text/javascript">
        function deleteconfig(){
        var tujuan=$(this).attr('idx');
        var hapusin=confirm("Apakah Anda yakin ingin menghapus data ini?");
        if(hapusin==true){
            window.location.href=tujuan;
            }
            else{
            alert("Data Batal dihapus");
            }
            return hapusin;
            }
        </script>
		
<script type="text/javascript">		
		$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script type="text/javascript">
var f=jQuery.noConflict();  
	f(document).ready(function () {					 
		f('#tgl_awal').datepicker({
			format: "yyyy-mm-dd",
			language: "id",
			autoclose:true,
			todayHighlight: true,
			clearBtn: true,
			setStartDate:true
		 });
		 f('#tgl_akhir').datepicker({
			format: "yyyy-mm-dd",
			language: "id",
			autoclose:true,
			todayHighlight: true,
			clearBtn: true,
			setEndDate: true
		 });
		 f('#tgl_kuitansi').datepicker({
			format: "yyyy-mm-dd",
			language: "id",
			autoclose:true,
			todayHighlight: true,
			clearBtn: true
		 });
		 });
</script>


		

		
<script type="text/javascript">
var f=jQuery.noConflict(); 


    f(document).ready(function() {
        window.setTimeout(function() {
            f(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 10000);
    });    
</script>
		
		 <script type="text/javascript"> 	  
		<?php echo $jsArray; ?>  
		function changeValue(nip){  
			nips = document.getElementById('nip_pegawai').value;
			console.log(nips);
			if (nips == "") {
				nips = nip.toString();
			} else {
				nips += "|" + nip.toString();
			}
			document.getElementById('nip_pegawai').value = nips;
			

			tempat_lahir = document.getElementById('tempat_lahir').value;
			if (tempat_lahir == "") {
				tempat_lahir = dtMhs[nip].tempat_lahir;
			} else {
				tempat_lahir += "|" + dtMhs[nip].tempat_lahir;
			}
			document.getElementById('tempat_lahir').value = tempat_lahir;
			
			nama = document.getElementById('nama').value;
			if (nama == "") {
				nama = dtMhs[nip].nama;
			} else {
				nama += "|" + dtMhs[nip].nama;
			}
			document.getElementById('nama').value = nama;
			
			jabatan = document.getElementById('jabatan').value;
			if (jabatan == "") {
				jabatan = dtMhs[nip].jabatan;
			} else {
				jabatan += "|" + dtMhs[nip].jabatan;
			}
			document.getElementById('jabatan').value = jabatan;
			
			unit_kerja = document.getElementById('unit_kerja').value;
			if (unit_kerja == "") {
				unit_kerja = dtMhs[nip].unit_kerja;
			} else {
				unit_kerja += "|" + dtMhs[nip].unit_kerja;
			}
			document.getElementById('unit_kerja').value = unit_kerja;
			
			pangkat = document.getElementById('pangkat').value;
			if (pangkat == "") {
				pangkat = dtMhs[nip].pangkat;
			} else {
				pangkat += "|" + dtMhs[nip].pangkat;
			}
			document.getElementById('pangkat').value = pangkat;
			
		
			
			gol = document.getElementById('gol').value;
			if (gol == "") {
				gol = dtMhs[nip].gol;
			} else {
				gol += "|" + dtMhs[nip].gol;
			}
			document.getElementById('gol').value = gol;	
			
			tanggallahir = document.getElementById('tanggallahir').value;
			if (tanggallahir == "") {
				tanggallahir = dtMhs[nip].tanggallahir;
			} else {
				tanggallahir += "|" + dtMhs[nip].tanggallahir;
			}
			document.getElementById('tanggallahir').value = tanggallahir;	
		};  
		
		</script> 
		

</div>