<!DOCTYPE html>
<html lang="en">
<?php 

if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda telah habis.. silahkan login kembali...');
 			window.location='page_login.php';</script>";
}else {
/*error_reporting(0);*/
?>
<?php
session_start();

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="select2/select2.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

          <!-- Page Heading 
         <button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Kegiatan</button>-->
	


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pegawai BMKG</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
						<th>No.</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>TTL</th>
						<th>Pangkat/Gol</th>
						<th>Jabatan</th>
						<th>Unit Kerja</th>
						
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No.</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>TTL</th>
						<th>Pangkat/Gol</th>
						<th>Jabatan</th>
						<th>Unit Kerja</th>
						
					</tr>
                  </tfoot>
                  <tbody>
                    <?php
					//$koneksi     = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
					$servername = "202.90.198.136";
					$username = "root";
					$password = "P@ssw0rdbmkg2020";
					$dbname = "diklatdb2";
					
					$koneksi_sdm = mysqli_connect($servername,$username,$password,$dbname) or die ('Tidak terhubung ke server');
					$sql      = mysqli_query($koneksi_sdm, "SELECT * FROM pegawai WHERE substr( `pegawai`.`NIP`, 1, 3 ) != '120' and LENGTH(NIP) >10 order by NAMA ASC");
					//$penghasilan = mysqli_query($koneksi, "SELECT hasil_penjualan FROM penjualan WHERE tahun='2016' order by id asc");
					$no = 1;
					while ($r = mysqli_fetch_array($sql)) {
					?>
                    <tr>
					  <td><?php echo  $no; ?></td>
					  <td width="100px"><?php echo  $r['NIP']; ?></a></td>
					  <td><?php echo  $r['NAMA']; ?></td>
					  <td><?php echo  $r['TEMPATLAHIR']; ?> / <?php echo TanggalIndo($r['TGLLAHIR']) ?></td>
					   <td><?php echo $r['PANGKAT'] ?> - <?php echo $r['GOLONGAN'] ?></td>					  
					  <td><?php echo $r['NAMAJABATAN'] ?></td>
					  <td><?php echo $r['UNITKERJA'] ?></td>
					 
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

  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  

  <!-- Core plugin JavaScript-->
  

  <!-- Custom scripts for all pages-->
 

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


</body>
<?php }; ?>
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
		<?php echo $jsArray; ?>  
		function changeValue(nip){  
		document.getElementById('nama').value = dtMhs[nip].nama;  
		document.getElementById('jabatan').value = dtMhs[nip].jabatan; 
		document.getElementById('unit_kerja').value = dtMhs[nip].unit_kerja; 
		document.getElementById('pangkat').value = dtMhs[nip].pangkat; 
		document.getElementById('gol').value = dtMhs[nip].gol; 		
		};  
		
		function changeValue2(no, nip){  
		document.getElementById('nama'+no).value = dtMhs[nip].nama;  
		document.getElementById('jab'+no).value = dtMhs[nip].jabatan; 
		document.getElementById('unit_kerja'+no).value = dtMhs[nip].unit_kerja; 
		document.getElementById('pangkat'+no).value = dtMhs[nip].pangkat; 
		document.getElementById('gol'+no).value = dtMhs[nip].gol; 		
		};  
		
		</script> 