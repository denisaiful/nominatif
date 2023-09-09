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

	
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Data</h6>
            </div>
			
            <div class="card-body"><p>
			<a target="_blank" href="export_excel.php">EXPORT KE EXCEL</a></p>
              <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                     <tr>
						<th width="2%">No.</th>                		
                		<th width="15%">No. SPT </th>
						<th >Nama </th>
                		<th >Kegiatan</th>
                		<th >Tujuan</th>                		
						<th width="15%" >Tgl Kegiatan</th>
						   
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th width="2%">No.</th>                		
                		<th width="15%">No. SPT </th>
						<th >Nama </th>
                		<th >Kegiatan</th>
                		<th >Tujuan</th>                		
						<th width="15%" >Tgl Kegiatan</th>
						
					</tr>
                  </tfoot>
                  <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
					//$koneksi = mysqli_connect("localhost", "webadmin", "pusdiklatNOMINATIF@&)&@@4", "sertifikat");
                    include "koneksi.php";  
                    $sql = mysqli_query($koneksi,"SELECT * FROM data_spt2 order by no_peserta desc");
                    $no = 1;
                    while ($r = mysqli_fetch_array($sql)) {
						
					$bilangan = $r['no_urut']; // Nilai Proses
					$no_urut = sprintf("%05d", $bilangan);
                   // $id_keg = $r['id_keg'];
                    ?>

                    <tr align='left'>
                       <td><?php echo $no ?>.</td>                    	
                    	<td><?php echo $no_urut ?> / SPT / <?php echo $r['bulan_rom'] ?> / <?php echo $r['tahun_new'] ?></td>
						<td><?php echo $r['nama_peserta'] ?></td>
                    	<td><?php echo $r['kegiatan'] ?></td>
                    	<td><?php echo $r['lokasi'] ?></td>                     	
						<td><?php echo $r['tgl4'] ?> <?php echo $r['tahun1'] ?></td>
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
			$sql      = mysqli_query($koneksi, "SELECT * FROM sumber_dana ");	
			while ($r = mysqli_fetch_array($sql)) {
				
			?> 

<div class="modal fade bd-example-modal-lg1<?php echo $r['no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Peserta</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
				 <div class="modal-body">
					<form action="index2a.php?data=edit_sumber_dana" method="POST">
					
				   <input type="hidden" name="idx"  value="<?php echo $r['no']; ?>" class="form-control" readonly>
					  
					  
		
		
        <label for="message-text" class="col-form-label">Sumber Dana:</label>
           <input type="text" id="namapegawai<?php echo $r['no']; ?>" name="sumber_dana" size="50" value="<?php echo $r['sumber_dana'] ?>" class="form-control" >
         	 
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