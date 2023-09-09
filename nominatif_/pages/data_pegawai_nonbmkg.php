<!DOCTYPE html>
<html lang="en">

<?php 

if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda telah habis.. silahkan login kembali...');
 			window.location='page_login.php';</script>";
}else {
/*error_reporting(0);*/
?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <div class="container-fluid">

          <!-- Page Heading -->
         <button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="fa fa-plus" style='font-size:18px'"></i> Tambah Peserta</button>
	

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Tambah Peserta</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>	
	</div>
	 <div class="modal-body">
	 <form action="#" method="post">
		
          <div class="form-group">
            <label for="message-text" class="col-form-label">NIP/ID/Passport:</label>
			<input type="text" class="form-control" placeholder="Nama" name="nip" required>          
          </div>
		  
		  <div class="form-group">
            <label for="message-text" class="col-form-label">Nama Lengkap dan Gelar:</label>
			<input type="text" class="form-control" placeholder="Nama" name="namapegawai" required>          
          </div>
		  
		<div class="row">
        <div class="col-md-8">
            <label for="message-text" class="col-form-label">Tempat Lahir:</label>
            <input type="text" name="tempatlahir"  class="form-control" >                            
        </div>
        <div class="col-md-4">
			<label for="message-text" class="col-form-label">Tanggal Lahir:</label>	
             <div class="input-daterange input-group datepicker1" id="datepicker">
          <input type="text" class="input-sm form-control" id="tgl_spt" name="tanggallahir" placeholder="Tanggal Lahir"  autocomplete="off"  />		 
		 
         </div>   
        </div>                                 
		</div>
		  
		<div class="row">
        <div class="col-md-8">
            <label for="message-text" class="col-form-label">Pangkat:</label>
            <input type="text" name="pangpegawai"  placeholder="Pangkat" class="form-control" >                           
        </div>
        <div class="col-md-4">
			<label for="message-text" class="col-form-label">Golongan:</label>            
          <input type="text" name="golpegawai" placeholder="Golongan" class="form-control" >	 
		   
        </div>                                 
		</div>
		
		<div class="row">
        <div class="col-md-8">
            <label for="message-text" class="col-form-label">Jabatan:</label>
            <input type="text" name="namajabatan" placeholder="Jabatan" class="form-control" >                           
        </div>
        <div class="col-md-4">
			   
        </div>                                 
		</div>
		
		<div class="row">
        <div class="col-md-8">
            <label for="message-text" class="col-form-label">Unit Kerja:</label>
            <input type="text" name="namaunitkerja" placeholder="Unit Kerja" class="form-control" >                           
        </div>
        <div class="col-md-4">
		<label for="message-text" class="col-form-label">Email:</label>
			<input type="text" class="form-control" placeholder="email" name="email">   
        </div>                                 
		</div>
		 
		 <p>


  <div class="modal-footer">
          <button class="btn btn-secondary shadow" type="button" data-dismiss="modal">Cancel</button>
          <button name="save" type="submit" value="Simpan" class="btn btn-primary shadow">Input</button>
                </div>

	 </form>	
	</div>
    </div>
  </div>
</div>

	
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pegawai Non BMKG</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                     <tr>
						<th>No.</th>
						<th>id</th>
						<th>Nama</th>
						<th>TTL</th>
						<th>Pangkat/Gol</th>
						<th>Jabatan</th>
						<th>unit Kerja</th>
						<th>Update</th>
						<th>Hapus</th>
						
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No.</th>
						<th>Id</th>
						<th>Nama</th>
						<th>TTL</th>
						<th>Pangkat/Gol</th>
						<th>Jabatan</th>
						<th>unit Kerja</th>
						<th>Update</th>
						<th>Hapus</th>
						
					</tr>
                  </tfoot>
                  <tbody>
                    <?php
					//$koneksi     = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
					include "koneksi_136.php";
					$sql      = mysqli_query($link, "SELECT * FROM spt_peserta_nonbmkg1 ORDER BY nip desc");
					//$penghasilan = mysqli_query($koneksi, "SELECT hasil_penjualan FROM penjualan WHERE tahun='2016' order by id asc");
					$no = 1;
					while ($r = mysqli_fetch_array($sql)) {
					?>
                    <tr>
					  <td><?php echo  $no; ?></td>
					  <td width="100px"><?php echo  $r['nip']; ?></td>
					  <td width="100px"><?php echo  $r['namapegawai']; ?></td>
					  <td><?php echo  $r['tempatlahir']; ?> / <?php echo  TanggalIndo($r['tanggallahir']); ?> </td>
					  <td><?php echo  $r['pangpegawai']; ?> / <?php echo  $r['golpegawai']; ?> </td>
					  <td><?php echo  $r['namajabatan']; ?></td>
					  <td><?php echo  $r['namaunitkerja']; ?></td>
					  <td>
					  <a type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1<?php echo $r['nip']; ?>"><i class="fas fa-edit fa-1x"></i></a>
					  </td>
					  <td><a href="<?php echo "index2a.php?data=hapus_pegawai_nonbmkg&idx=".$r['nip']; ?>"><i class="fas fa-eraser fa-2x" onclick="return deleteconfig()"></i></a>
					</td>
					 
					</tr>
                    <?php
                    $no++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
 </div>
  </div>
  
<?php
			//$koneksi = mysqli_connect("202.90.198.136", "root", "P@ssw0rdbmkg2020", "diklatdb2");
			include "koneksi_136.php";
			$sql      = mysqli_query($link, "SELECT * FROM spt_peserta_nonbmkg1 ");	
			while ($r = mysqli_fetch_array($sql)) {
				
			?> 

<div class="modal fade bd-example-modal-lg1<?php echo $r['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Peserta</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
				 <div class="modal-body">
					<form action="index2a.php?data=edit_peserta_nonbmkg" method="POST">
					
				   <input type="hidden" name="idx"  value="<?php echo $r['nip']; ?>" class="form-control" readonly>
					  
					  
		
		
        <label for="message-text" class="col-form-label">Nama:</label>
           <input type="text" id="namapegawai<?php echo $r['nip']; ?>" name="namapegawai" size="50" value="<?php echo $r['namapegawai'] ?>" class="form-control" >
         
		  
         
          <label for="message-text" class="col-form-label">NIP:</label>
            <input type="text" id="nip<?php echo $r['nip']; ?>" name="nip" size="50" value="<?php echo $r['nip'] ?>"  class="form-control"  >
          
		 
		  <div class="row">
        <div class="col-md-8">
            <label for="message-text" class="col-form-label">Tempat Lahir:</label>
            <input type="text" name="tempatlahir" id="tempatlahir<?php echo $r['nip']; ?>" value="<?php echo $r['tempatlahir'] ?>" class="form-control" >                            
        </div>
        <div class="col-md-4">
			<label for="message-text" class="col-form-label">Tanggal Lahir:</label>	
             <div class="input-daterange input-group datepicker1" id="datepicker">
          <input type="text" class="input-sm form-control" id="tgl_spt<?php echo $r['nip'] ?>" name="tanggallahir" placeholder="Tanggal Lahir" value="<?php echo $r['tanggallahir'] ?>"  autocomplete="off"  />		 
		 
         </div>   
        </div>                                 
		</div>
		
		 
		
		  <div class="row">
        <div class="col-md-8">
            <label for="message-text" class="col-form-label">Pangkat:</label>
            <input type="text" id="pangkat<?php echo $r['nip']; ?>" name="pangpegawai" value="<?php echo $r['pangpegawai'] ?>"  placeholder="Pangkat" class="form-control" >                           
        </div>
        <div class="col-md-4">
			<label for="message-text" class="col-form-label">Golongan:</label>            
          <input type="text" id="gol<?php echo $r['nip']; ?>" name="golpegawai" value="<?php echo $r['golpegawai'] ?>" placeholder="Golongan" class="form-control" >	 
		 </div>  
        </div>                                 
		
		  <div class="row">
        <div class="col-md-6">         	 
           
      
        	<label for="message-text" class="col-form-label">Jabatan:</label>	
          <input type="text" id="jab<?php echo $r['nip']; ?>" name="namajabatan"  size="50" value="<?php echo $r['namajabatan'] ?>"  class="form-control"    >
        </div> 
		  
		<div class="col-md-6"> 
          	<label for="message-text" class="col-form-label">Unit Kerja:</label>	
       		<input type="text" id="unit_kerja<?php echo $r['nip']; ?>" name="namaunitkerja" value="<?php echo $r['namaunitkerja'] ?>"   size="50"  class="form-control"  >
		</div> 	
		</div>

 <div class="row">
        <div class="col-md-6">         	 
           
      
        	<label for="message-text" class="col-form-label">Email:</label>	
          <input type="text" id="email<?php echo $r['nip']; ?>" name="email"  size="50" value="<?php echo $r['email'] ?>"  class="form-control"    >
        </div> 
		  
		<div class="col-md-6"> 
          	
		</div> 	
		</div>		
         
		 
		
		
	 
		</div>
		 <div class="modal-footer">
          <button class="btn btn-secondary shadow p-2 mb-4 rounded" type="button" data-dismiss="modal">Cancel</button>
          <button name="update" type="submit" value="update" class="btn btn-primary shadow p-2 mb-4 rounded">Update</button>
         </div>
		  
		  </form>
		  		  
    </div>
  </div>
</div>

			<?php };
			?>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="page_login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>-->

<?php
include "koneksi_136.php"; 
if(isset($_POST['save']))
{   //$no =$_POST['no'];
	$nip =$_POST['nip'];
	$namapegawai =$_POST['namapegawai'];
	$namapegawai1 = addslashes($namapegawai);
	$pangpegawai =$_POST['pangpegawai'];
	$golpegawai =$_POST['golpegawai'];
	$namajabatan =$_POST['namajabatan'];
	$namaunitkerja =$_POST['namaunitkerja'];
	$namaunitkerja1 =addslashes($namaunitkerja);
	$tempatlahir =$_POST['tempatlahir'];
	$tanggallahir =$_POST['tanggallahir'];
	$email =$_POST['email'];
	
	$cekdulu= "select * from spt_peserta_nonbmkg1 where nip='$_POST[nip]'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
	$prosescek= mysql_query($cekdulu);
	
	if(mysql_num_rows($prosescek)>0)
	
	{
		echo "<script>alert('Maaf.. Data Sudah Ada');
 			window.location='index2a.php?data=data_pegawai_nonbmkg';</script>";
				
		}else{
			$input = mysql_query("insert into spt_peserta_nonbmkg1 set 
											nip ='$nip', 
											namapegawai='$namapegawai1', 
											pangpegawai='$pangpegawai', 
											golpegawai ='$golpegawai' ,
											namajabatan ='$namajabatan' ,
											namaunitkerja ='$namaunitkerja1' ,
											tempatlahir = '$tempatlahir',
											tanggallahir = '$tanggallahir',
											email = '$email'
											");
			
			if($input>0) {				
				echo "<script>alert('data berhasil di Input');
 			window.location='index2a.php?data=data_pegawai_nonbmkg';</script>";		
			}
			else {
			echo "<script>alert('data Gagal di Input');
 			window.location='index2a.php?data=data_pegawai_nonbmkg';</script>";					
			};	
		}
	};
?>
<?php } ?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
<script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript"  src="js/rupiah-rp.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


</body>
<?php
function TanggalIndo($date){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);

	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
	return($result);
}

?>
<script type="text/javascript">		
		$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
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
<?php
include "koneksi_136.php"; 
//$koneksi = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
$sql      = mysqli_query($link, "SELECT * FROM spt_peserta_nonbmkg1 ");	
while ($r = mysqli_fetch_array($sql)) {
	
?>




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
		  f('#tgl_spt<?php echo $r['nip']; ?>').datepicker({
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
	<?php }; ?>	
		<script type="text/javascript"> 	  
		<?php echo $jsArray; ?>  
		function changeValue(nip){  
		document.getElementById('nama').value = dtMhs[nip].nama;  
		document.getElementById('jabatan').value = dtMhs[nip].jabatan; 
		document.getElementById('unit_kerja').value = dtMhs[nip].unit_kerja; 
		document.getElementById('pangkat').value = dtMhs[nip].pangkat; 
		document.getElementById('gol').value = dtMhs[nip].gol; 
		document.getElementById('email').value = dtMhs[nip].gol; 			
		};  
		
		function changeValue2(no, nip){  
		document.getElementById('nama'+no).value = dtMhs[nip].nama;  
		document.getElementById('jab'+no).value = dtMhs[nip].jabatan; 
		document.getElementById('unit_kerja'+no).value = dtMhs[nip].unit_kerja; 
		document.getElementById('pangkat'+no).value = dtMhs[nip].pangkat; 
		document.getElementById('gol'+no).value = dtMhs[nip].gol; 
		document.getElementById('email'+no).value = dtMhs[nip].gol; 		
		};  
		
		</script> 