<!DOCTYPE html>
<html lang="en">

<?php 

if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda telah habis.. silahkan login kembali...');
 			window.location='page_login.php';</script>";
}else {
/*error_reporting(0);*/
?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

 <!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->


<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">  

    <!-- Sidebar -->
   <?php 
   //include "side_bar.php"
   ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
      
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="fa fa-plus" style='font-size:18px'"></i> Tambah Kordinator TIM</button>
	

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Tambah Kordinator TIM</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>	
	</div>
	 <div class="modal-body">
	 <form action="#" method="post">
	 
	 <div class="form-group">           	
		<label for="message-text" class="control-label">Nama</label>       
        <select name="name"  style="width:100%">
        <option value="0">-Pilih Nama-</option>  
        <?php 
		

    	include "koneksi_136.php";
		$result = mysqli_query($link,"select *, if(UNITKERJA LIKE '%mutu%','Bidang Perencanaan, Pengembangan dan Penjaminan Mutu Pusdiklat',if(UNITKERJA LIKE '%penyelenggaraan%','Bidang penyelenggaran Pusdiklat',UNITKERJA)) AS unitkerja from pegawai_all order by NAMA ASC ");		
   
         
   while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['NAMA'] . '">' . $row['NAMA'] . ' / ' . $row['unitkerja'] . '</option>';    
     
    }      
    ?>      
        </select>
	   </div>
		
          <div class="form-group">           	
		<label for="message-text" class="control-label">TIM</label>       
        <select name="id_tim"  placeholder="Cari Nama Peserta..." style="width:100%">
        <option value="0">-Pilih Nama-</option>  
        <?php 
		

    	include "koneksi.php";
		$result = mysqli_query($koneksi,"select * from tim_kerja order by name ASC ");		
   
         
   while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';    
     
    }      
    ?>      
        </select>
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
              <h6 class="m-0 font-weight-bold text-primary">Data Sumber Dana</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                     <tr>
						<th>No.</th>
						<th>Nama</th>
						<th>TIM</th>
						<th>Update</th>
						<th>Hapus</th>
						
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>TIM</th>
						<th>Update</th>
						<th>Hapus</th> 
						
					</tr>
                  </tfoot>
                  <tbody>
                    <?php
					//$koneksi     = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
					include "koneksi.php";
					$sql      = mysqli_query($koneksi, "SELECT kortim.name AS ketua_tim,tim_kerja.name AS nama_tim FROM kortim join tim_kerja on tim_kerja.id = kortim.id_tim
					
					order by kortim.id desc");
					//$penghasilan = mysqli_query($koneksi, "SELECT hasil_penjualan FROM penjualan WHERE tahun='2016' order by id asc");
					$no = 1;
					while ($r = mysqli_fetch_array($sql)) {
					?>
                    <tr>
					  <td><?php echo  $no; ?></td>
					  <td width="930px"><?php echo  $r['ketua_tim']; ?></td>
					  <td width="930px"><?php echo  $r['nama_tim']; ?></td>	
					  <td>
					  <a type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1<?php echo $r['id']; ?>"><i class="fas fa-edit fa-1x"></i></a>
					  </td>
					  <td><a href="<?php echo "index2a.php?data=hapus_sumber_dana&idx=".$r['id']; ?>"><i class="fas fa-eraser fa-2x" onclick="return deleteconfig()"></i></a>
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
			include "koneksi.php";
			$sql      = mysqli_query($koneksi, "SELECT * FROM kortim ");	
			while ($r = mysqli_fetch_array($sql)) {
				
			?> 

<div class="modal fade bd-example-modal-lg1<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Peserta</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
				 <div class="modal-body">
					<form action="index2a.php?data=edit_kortim" method="POST">				
					
					
				   <input type="hidden" name="idx"  value="<?php echo $r['id']; ?>" class="form-control" readonly>
					  
					  
		<div class="form-group">           	
		<label for="message-text" class="control-label">Nama</label>       
        <select name="name"  style="width:100%">
        <option value="<?php echo $r['name'] ?>"><?php echo $r['name'] ?></option>  
        <?php 
		

    	include "koneksi_136.php";
		$result = mysqli_query($link,"select *, if(UNITKERJA LIKE '%mutu%','Bidang Perencanaan, Pengembangan dan Penjaminan Mutu Pusdiklat',if(UNITKERJA LIKE '%penyelenggaraan%','Bidang penyelenggaran Pusdiklat',UNITKERJA)) AS unitkerja from pegawai_all order by NAMA ASC ");		
   
         
   while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['NAMA'] . '">' . $row['NAMA'] . ' / ' . $row['unitkerja'] . '</option>';    
     
    }      
    ?>      
        </select>
	   </div>
		
        <div class="form-group">           	
		<label for="message-text" class="control-label">TIM</label>       
        <select name="id_tim"  placeholder="Cari Nama Peserta..." style="width:100%">
        <option value="<?php echo $r['id_tim'] ?>"><?php echo $r['id_tim'] ?></option>  
        <?php 
		

    	include "koneksi.php";
		$result = mysqli_query($koneksi,"select * from tim_kerja");		
   
         
   while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';    
     
    }      
    ?>      
        </select>
	   </div>
         	 
		</div>
		 <div class="modal-footer">
          <button class="btn btn-secondary shadow" type="button" data-dismiss="modal">Cancel</button>
          <button name="update" type="submit" value="update" class="btn btn-primary shadow">Update</button>
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
include "koneksi.php"; 
if(isset($_POST['save']))
{   //$no =$_POST['no'];
	$name =$_POST['name'];
	$id_tim =$_POST['id_tim'];
		
	
			$input = mysqli_query($koneksi,"insert into kortim set 
											name ='$name',
											id_tim = '$id_tim'
											");
			
			if($input>0) {				
				echo "<script>alert('data berhasil di Input');
 			window.location='index2a.php?data=kortim';</script>";		
			}
			else {
			echo "<script>alert('data Gagal di Input');
 			window.location='index2a.php?data=kortim';</script>";					
			};	
		
	};  
?>
<?php } ?>
  <!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>

<script type="text/javascript"  src="js/rupiah-rp.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>  

  <!-- Page level custom scripts 
  <script src="js/demo/datatables-demo.js"></script>-->


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
var f=jQuery.noConflict(); 
f(document).ready(function() {
    f('.js-example-basic-single').select2();
});
</script>


<script type="text/javascript">
var f=jQuery.noConflict();
 f(document).ready(function() {
     f('#provinsi').select2();
 });
</script>



<script type="text/javascript">	
var f=jQuery.noConflict(); 	
		f(document).ready(function() {
    f('#example').DataTable();
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
include "koneksi.php"; 
//$koneksi = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
$sql      = mysqli_query($link, "SELECT * FROM sumber_dana ");	
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
		  f('#tgl_spt<?php echo $r['no']; ?>').datepicker({
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