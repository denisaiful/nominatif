<!doctype html>
<html>
<?php 

if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda telah habis.. silahkan login kembali...');
 			window.location='page_login.php';</script>";
}else {
/*error_reporting(0);*/
?>
  <head>
  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- jika menggunakan bootstrap4 gunakan css ini  -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
        <!-- cdn bootstrap4 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
       
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="js/dataTables/dataTables.bootstrap.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	
	
    <link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
    <link rel="stylesheet" href="assets/plugins/hover-effects/css/custom-hover-effects.css">
    <link href="select2/select2.css" rel="stylesheet"/>
	
       
     <script src="js/jquery-1.11.3.min.js"></script>
	
    </head>
    
  <body>
        <div class="container">
       <div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Petugas SPT</h6>
	</div>
	<div class="card-body">
 
<div id="HTMLtoPDF"> 
<?php
include "koneksi.php";
$idx= $_GET['idx'];

//view
if(isset($_GET['idx'])) {
	$view = mysqli_query($koneksi,"select * from spt_peserta INNER JOIN spt_pimpinan
	on spt_peserta.kegiatan_peserta = spt_pimpinan.no 
	where no_peserta=$idx");
	//$dt_view = mysql_fetch_array($view);
	while($dt_view = mysqli_fetch_array($view)){
	?>
	
	<form action='#' method='post' class='form-horizontal' >
	
	<!--<div class='form-group'>
    <label class='col-sm-2 control-label'>No. SPT</label>
    <div class='col-sm-6'>
    <input name='no_urut' type='text' class='form-control' value="<?php echo $dt_view['no_urut'] ?>" >
    </div> 
    </div>-->
	
	<div class='form-group'>
	<div class="form-row">
    <div class="col-md-6 mb-3">
	<label >Nama Lengkap</label>	
      <input name='nama_peserta' type='text' class='form-control' value="<?php echo $dt_view['nama_peserta'] ?>" required >
    </div>	 
	<div class="col-md-6 mb-3">
	<label >NIP</label>	
      <input name='nip_peserta' type='text' class='form-control' value="<?php echo $dt_view['nip_peserta'] ?>" required >
    </div>	 
	
  </div>
</div>	
	
	
	<div class='form-group'>
	 <div class="form-row">
	  <div class="col-md-6 mb-3">
    		<label >Pangkat</label>					
			<div>
				 <input name='pangkat_peserta' type='text' class='form-control' value="<?php echo $dt_view['pangkat_peserta'] ?>" required >
				</div>   	      
		</div>
		
		<div class="col-md-6 mb-3">
    		<label >Gol Ruang</label>    	
			<div>
				 <input name='gol_peserta' type='text' class='form-control' value="<?php echo $dt_view['gol_peserta'] ?>" required >
				</div>      
		</div>		
		</div>
	</div>
<div class='form-group'>
	<div class="form-row">
    <div class="col-md-6 mb-3">
	<label >Jabatan</label>	
      <input name='jabatan_peserta' type='text' class='form-control' value="<?php echo $dt_view['jabatan_peserta'] ?>" required >
    </div>	 
	<div class="col-md-6 mb-3">
	<label >Unit Kerja</label>	
      <input name='unit_kerja_peserta' type='text' class='form-control' value="<?php echo $dt_view['unit_kerja_peserta'] ?>" required >
    </div>	 
	
  </div>
</div>		




    <input name='tempatlahir' type='hidden' id='tempat_lahir' class='form-control' value="<?php echo $dt_view['tempatlahir'] ?>" required readonly>

    <input name='tanggallahir' type='hidden' id='tanggallahir' class='form-control' value="<?php echo $dt_view['tanggallahir'] ?>" required readonly>

    <!--<input name='gol_peserta' type='hidden' id='gol'  class='form-control' value="<?php echo $dt_view['gol_peserta'] ?>" required readonly>-->
   
	
	<div class='form-group'>
	 <div class="form-row">
	  <div class="col-md-6 mb-3">
    		<label >Lokasi Asal</label>					
			<div>
				 <input name='asal' type='text' class='form-control' value="<?php echo $dt_view['asal'] ?>" required >
				</div>   	      
		</div>
		
		<div class="col-md-6 mb-3">
    		<label >Lokasi Tujuan</label>    	
			<div>
				 <input name='lokasi' type='text' class='form-control' value="<?php echo $dt_view['lokasi'] ?>" required >
				</div>      
		</div>		
		</div>
	</div>

	<div class='form-group'>
	 <div class="form-row">
	  <div class="col-md-3 mb-3">
    		<label >Tanggal Mulai</label>
			<div class='input-daterange input-group' id='datepicker'>
				<input type='text' class='input-sm form-control' id='tgl_awal' name='tgl_pergi_new'  value="<?php echo $dt_view['tgl_pergi_new'] ?>" autocomplete="off" >
				</div>   	
		</div>
		
		<div class="col-md-3 mb-3">
    		<label >Tanggal Selesai</label>
    	
			<div class='input-daterange input-group' id='datepicker'>
				<input type='text' class='input-sm form-control' id='tgl_akhir' name='tgl_pulang_new'  value="<?php echo $dt_view['tgl_pulang_new'] ?>" autocomplete="off" >
				</div>
      
		</div>
		 <div class="col-md-3 mb-3">
    		<label >Tanggal Kwitansi</label>
    	
			<div class='input-daterange input-group' id='datepicker'>
				<input type='text' class='input-sm form-control' id='tgl_kuitansi' name='tgl_kuitansi_new'  value="<?php echo $dt_view['tgl_kuitansi_new'] ?>" autocomplete="off">
				</div>
		</div>
		<div class="col-md-3 mb-3">
    		<label >Lama SPT</label>
			<div >
				<input name='lama' type='text' class='form-control' value="<?php echo $dt_view['lama'] ?>"   required >
				</div>
		</div>
		</div>
	</div>
	
	<div class='form-group'>
	<div class="form-row">
    <div class="col-md-9 mb-3">
	<label >Ganti Kegiatan</label>	
	
	
	
	
     <select id="kota" name="kegiatan_peserta" class="form-control">
                    <option value="<?php echo $dt_view['kegiatan_peserta'] ?>"><?php echo $dt_view['kegiatan'] ?></option>
                            <?php 
	include "koneksi.php";  	   
    $result = mysqli_query($koneksi,"select * from spt_pimpinan order by no desc");	
    
         
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="'.$row['no'].'">'.$row['kegiatan'].'</option>';         
    }      
    ?>                         
                    </select>
    </div>	  
	
  </div>
</div>	
	
	<p>
  <a class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Data Kwitansi
  </a>
  
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
  
  <div class='form-group'>
	 <div class="form-row">
    <div class="col-md-2 mb-3">
      <label for="validationCustom01">Uang Harian</label>
      <input type="text" class="form-control" id="validationCustom01" name="uang_harian" placeholder="First name" value="<?php echo $dt_view['uang_harian'] ?>" onkeyup="convertToRupiah(this);" >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationCustom02">Lama Uang Harian</label>
     <input type="text" name="lama_uh"  size="50"  class="form-control" value="<?php echo $dt_view['lama_uh'] ?>"  placeholder="Rp"  >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
   
	 
  </div>
  
  <div class="form-row">    
 <div class="col-md-2 mb-3">
      <label for="validationCustom02">Harga Hotel</label>
     <input type="text" name="hotel"  size="50"  class="form-control" value="<?php echo $dt_view['hotel'] ?>"  placeholder="Rp" onkeyup="convertToRupiah(this);">
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
	 <div class="col-md-2 mb-3">
      <label for="validationCustom02">Lama Hotel</label>
     <input type="text" name="lama_hotel"  size="50"  class="form-control" value="<?php echo $dt_view['lama_hotel'] ?>"  placeholder="Rp" >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  
   <div class="form-row">    
  <div class="col-md-2 mb-3">
      <label for="validationCustomUsername">Tiket</label>
      <input type="text" name="transport"  size="50"  class="form-control" value="<?php echo $dt_view['transport'] ?>"  placeholder="Rp" onkeyup="convertToRupiah(this);" >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
	 <div class="col-md-2 mb-3">
      <label for="validationCustom02">Transport Lokal</label>
     <input type="text" name="transport_lokal"  size="50"  class="form-control" value="<?php echo $dt_view['transport_lokal'] ?>"  placeholder="Rp" onkeyup="convertToRupiah(this);">
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  
  <div class="form-row">    
 <div class="col-md-2 mb-3">
      <label for="validationCustom01">Biaya Hotel Lain</label>
     <input type="text" name="harga_hotel2"  size="50"  class="form-control" value="<?php echo $dt_view['harga_hotel2'] ?>" placeholder="Rp" onkeyup="convertToRupiah(this);" >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationCustom02">Lama Hotel Lain</label>
     <input type="text" name="lama_hotel2"  size="50"  class="form-control" value="<?php echo $dt_view['lama_hotel2'] ?>" placeholder="Rp" >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
</div>
  
    <div class='form-group'>
	 <div class="form-row">
    <div class="col-md-2 mb-3">
      <label for="validationCustom01">Tipe Perjalanan</label>
     	            
                 <select name="type_perjalanan" class="form-control">
                    <option value="<?php echo $dt_view['type_perjalanan'] ?>"><?php echo $dt_view['type_perjalanan'] ?></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
							<option value="E">E</option>  							
                    </select>
    
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationCustom02">DPR</label>
     <input type="text" name="dpr"  size="50"  class="form-control" value="<?php echo $dt_view['dpr'] ?>"  placeholder="Rp" onkeyup="convertToRupiah(this);" >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationCustomUsername">Uang Representatif</label>
      <input type="text" name="representasi"  size="50"  class="form-control" value="<?php echo $dt_view['representasi'] ?>"  placeholder="Rp" onkeyup="convertToRupiah(this);" >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
	
  </div>
</div>
	

<div class='form-group'>
	 <div class="form-row">
    
    <div class="col-md-2 mb-3">
      <label for="validationCustomUsername">Hotel 30%</label>
      <input type="text" name="hotel1" onkeyup="convertToRupiah(this);"  size="50"  class="form-control"  value="<?php echo $dt_view['hotel1'] ?>"  >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
	 <div class="col-md-2 mb-3">
      <label for="validationCustom02">Lama Hotel 30%</label>
   <input type="text" name="hari_hotel1"  size="50"  class="form-control"  value="<?php echo $dt_view['hari_hotel1'] ?>"  >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
	
  </div>
</div>
	
<div class='form-group'>
	 <div class="form-row">
    <div class="col-md-2 mb-3">
      <label for="validationCustom01">Honor Fullboard </label>
     <input type="text" name="fullboard" onkeyup="convertToRupiah(this);"  size="50"  class="form-control"  value="<?php echo $dt_view['fullboard'] ?>"  >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationCustom02">Hari Fullboard </label>
    	<input type="text" name="hari_fullboad"  size="50"  class="form-control"  value="<?php echo $dt_view['hari_fullboad'] ?>"  >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-2 mb-3">
       <label for="validationCustom02">Hotel Fullboard </label>
    	<input type="text" name="harga_lama_fullboard_hotel" onkeyup="convertToRupiah(this);"  size="50"  class="form-control"  value="<?php echo $dt_view['harga_lama_fullboard_hotel'] ?>"  >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
	 <div class="col-md-2 mb-3">
      <label for="validationCustomUsername">Lama Hotel Fullboard</label>
      <input type="text" name="lama_fullboard_hotel"  size="50"  class="form-control"  value="<?php echo $dt_view['lama_fullboard_hotel'] ?>"  >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>	
  </div>
</div>	

<div class='form-group'>
	 <div class="form-row">
    <div class="col-md-2 mb-3">
      <label for="validationCustom01">Lumpsum</label>
     <input type="text" name="lumsum" onkeyup="convertToRupiah(this);"  size="50"  class="form-control"  value="<?php echo $dt_view['lumsum'] ?>"  >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  
  </div>
</div>

  </div>
</div>
	<br>
	
<div class='form-group'>
	<div class="form-row">
	
    <div class="col-md-2 mb-3">
      <a href='index2a.php?data=prosesreg1&idx=<?php echo $_GET["idk"]; ?>' class='btn btn-danger shadow p-2 mb-4 rounded'><span class='glyphicon glyphicon-circle-arrow-left' aria-hidden='true'></span> Cancel</a>
	<button name='update' type='submit' value='update' class='btn btn-success shadow p-2 mb-4 rounded'>Update</button>
    </div>	 
	
  </div>
</div>	
	
</form>
<?php }
	?>
</div>
</div>
</div>
</div>

	
<?php
include "koneksi.php";
$idx= $_GET['idx'];

// test ajy
$no_peserta = mysqli_query($koneksi,"SELECT kegiatan_peserta FROM spt_peserta WHERE no_peserta=$idx ");
$no_pesertas = mysqli_fetch_array($no_peserta);

//proses update
if(isset($_POST['update'])) {
	$nama_peserta =$_POST['nama_peserta'];
	$nama_peserta = addslashes($nama_peserta);
	$nip_peserta =$_POST['nip_peserta'];
	$pangkat_peserta =$_POST['pangkat_peserta'];
	$tempat_lahir =$_POST['tempatlahir'];
	$tanggallahir =$_POST['tanggallahir'];
	$gol_peserta =$_POST['gol_peserta'];
	$jabatan_peserta =$_POST['jabatan_peserta'];
	$unit_kerja_peserta =$_POST['unit_kerja_peserta'];
	$unit_kerja_peserta = addslashes($unit_kerja_peserta);
	$tgl_pergi_new =$_POST['tgl_pergi_new'];	
	$tgl_pulang_new =$_POST['tgl_pulang_new'];
	$asal =$_POST['asal'];
	$lokasi =$_POST['lokasi'];
	$lama =$_POST['lama'];
	$uang_harian=$_POST['uang_harian'];
	$uang_harian_new = str_replace(".", "", $uang_harian);
	$transport=$_POST['transport'];
	$transport_new = str_replace(".", "", $transport);
	$transport_lokal=$_POST['transport_lokal'];
	$transport_lokal_new = str_replace(".", "", $transport_lokal);
	$hotel=$_POST['hotel'];
	$hotel_new = str_replace(".", "", $hotel);
	$lama_hotel=$_POST['lama_hotel'];
	$dpr=$_POST['dpr'];
	$dpr_new = str_replace(".", "", $dpr);
	$representasi=$_POST['representasi'];
	$representasi_new = str_replace(".", "", $representasi);
	$type_perjalanan=$_POST['type_perjalanan'];
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
	$kegiatan_peserta=$_POST['kegiatan_peserta'];
	$no_spt=$_POST['no_spt'];
	$lumsum=$_POST['lumsum'];
	$lama_hotel2=$_POST['lama_hotel2'];
	$harga_hotel2=$_POST['harga_hotel2'];
	$harga_hotel2_new = str_replace(".", "", $harga_hotel2);
	
	$lumsum_new = str_replace(".", "", $lumsum);
	$update = mysqli_query($koneksi,"UPDATE `sertifikat`.`spt_peserta` SET nama_peserta ='$nama_peserta', 
											nip_peserta ='$nip_peserta' ,
											pangkat_peserta ='$pangkat_peserta' ,
											tempatlahir ='$tempat_lahir' ,
											tanggallahir ='$tanggallahir' ,
											gol_peserta = '$gol_peserta',
											jabatan_peserta = '$jabatan_peserta',
											unit_kerja_peserta = '$unit_kerja_peserta',
											tgl_pergi_new = '$tgl_pergi_new',
											tgl_pulang_new = '$tgl_pulang_new',
											lama = '$lama',
											asal = '$asal',
											lokasi = '$lokasi',
											uang_harian ='$uang_harian_new',
											transport = '$transport_new',
											hotel = '$hotel_new',
											dpr ='$dpr_new',
											representasi ='$representasi_new',
											type_perjalanan = '$type_perjalanan',
											hotel1 = '$hotel1_new',
											hari_hotel1 = '$hari_hotel1',
											fullboard = '$fullboard_new',
											hari_fullboad = '$hari_fullboad',
											lama_hotel = '$lama_hotel',
											lama_uh = '$lama_uh',
											tgl_kuitansi_new = '$tgl_kuitansi_new',
											lama_fullboard_hotel ='$lama_fullboard_hotel',
											harga_lama_fullboard_hotel ='$harga_lama_fullboard_hotel_new',
											kegiatan_peserta ='$kegiatan_peserta',
											no_spt ='$no_spt',
											lama_hotel2 ='$lama_hotel2',
											harga_hotel2 ='$harga_hotel2_new',
											lumsum ='$lumsum_new',
											transport_lokal='$transport_lokal_new',
											status_ttd = 0
									
											WHERE  no_peserta =$idx ");	
	if($update>0){
		
		echo "<script>alert('data berhasil di Update');
 			window.location='index2a.php?data=prosesreg1&idx=$no_pesertas[0]';</script>";} else 
				{
				echo "<script>alert('data GAGAL di Input');
 			window.location='index2a.php?data=prosesreg1&idx=$no_pesertas[0]';</script>";
			}
}
  
//delete  

}
?>
</div><?php } ?>

 <script src="js/bootstrap.min.js"></script>
        <script src="js/dataTables/jquery.dataTables.js"></script>
        <script src="js/dataTables/dataTables.bootstrap.js"></script>
		 <script src="select2/select2.js"></script>
        <script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>      
		
        <script type="text/javascript"  src="js/rupiah-rp.js"></script>
		
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
		var f=jQuery.noConflict();  
            f(document).ready(function () {
                f("#kota").select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select"
                });
    
                f("#kota2").select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select"
                });
            });
        </script>

	   <script type="text/javascript">
		var f=jQuery.noConflict();  
            
				 f(document).ready(function () {			
				f('#tgl_awal').datepicker({
                    format: "yyyy-mm-dd",
                    language: "id",
					autoclose:true,
					todayHighlight: true,
					clearBtn: true
                });
				 f('#tgl_akhir').datepicker({
                    format: "yyyy-mm-dd",
                    language: "id",
					autoclose:true,
					todayHighlight: true,
					clearBtn: true
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
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join(',');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
		
		<script type="text/javascript" >
		var f=jQuery.noConflict();  
            f(document).ready(function () {
				f('select.select').select2(); 
            });
        </script>
		
			<script type="text/javascript" >
		var f=jQuery.noConflict();  
            f("#tabel").dataTable({
				 "pagingType": "full_numbers"});
            
        </script>
		 <script type="text/javascript"> 	  
		<?php echo $jsArray; ?>  
		function changeValue(nip){  
		document.getElementById('nama').value = dtMhs[nip].nama;  
		document.getElementById('tempat_lahir').value = dtMhs[nip].tempat_lahir; 
		document.getElementById('tanggallahir').value = dtMhs[nip].tanggallahir; 
		document.getElementById('jabatan').value = dtMhs[nip].jabatan; 
		document.getElementById('unit_kerja').value = dtMhs[nip].unit_kerja; 
		document.getElementById('pangkat').value = dtMhs[nip].pangkat; 
		document.getElementById('gol').value = dtMhs[nip].gol; 		
		};  
		
		</script> 

</body>
</html>
