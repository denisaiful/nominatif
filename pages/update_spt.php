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
	
	<form action='#' method='post' class='form-horizontal'  enctype="multipart/form-data"  >
	
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
      <input name='nama_peserta' type='text' class='form-control' value="<?php echo $dt_view['nama_peserta'] ?>" disabled >
    </div>	 
	 
  </div>
  <div class="custom-file">
 
    <input type="file"  name="file_ttd" class="form-control-file" id="exampleFormControlFile1">
</div>
</div>	


	
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
	//$modul1=$_POST['modul1'];
	$file_ttd = $_FILES['file_ttd']['name'];
	$tmp = $_FILES['file_ttd']['tmp_name'];
	$acak = rand(000000,999999);
	$fotobaru = $acak.'.'.$file_ttd;
	$path = "sertifikat/signed/".$fotobaru;	
	move_uploaded_file($tmp, $path);   
	
	
	$update = mysqli_query($koneksi,"UPDATE `sertifikat`.`spt_peserta` SET 
											file_ttd ='$fotobaru',
											status_ttd =1
											WHERE  no_peserta =$idx ");	
	if($update>0){
		
		echo "<script>alert('data berhasil di Update');
 			window.location='index2a.php?data=prosesreg1&idx=$no_pesertas[0]';</script>";} else 
				{
				echo "<script>alert('data GAGAL di Input');
 			window.location='index2a.php?data=prosesreg1&idx=$no_pesertas[0]';</script>";
			}

}

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
