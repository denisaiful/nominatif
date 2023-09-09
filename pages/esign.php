<?php 
session_start();
if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda telah habis.. silahkan login kembali...');
 			window.location='page_login.php';</script>";
}else {
/*error_reporting(0);*/
?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <div class="container-fluid">

          <!-- Page Heading -->
        
	



	
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kegiatan <?php echo $_SESSION['nama']?></h6>
            </div>
			
            <div class="card-body">
			<p><a target="_blank" href="export_excel1.php">EXPORT KE EXCEL <i class="bi bi-file-earmark-excel" ></i></a></p>
              <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                     <tr>
						<th width="10px">No.</th>
						<th align="center">Kegiatan</th>
						<th align="center">Tgl SPT</th>
						<th align="center">Sudah Ttd</th>	
						<th align="center">Belum Ttd</th>
						<th align="center">jumlah</th>
						<th>Proses TTD</th>
						
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No.</th>
						<th align="center">Kegiatan</th>
						<th align="center">Tgl SPT</th>
						<th align="center">Sudah Ttd</th>
						<th align="center">Belum Ttd</th>
						<th align="center">jumlah</th>
						<th>Proses TTD</th>
						
					</tr>
                  </tfoot>
                  <tbody>
                    <?php
					//$koneksi     = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
					include "koneksi.php";
					$sql      = mysqli_query($koneksi, "SELECT *,COUNT(`spt_peserta`.`no_peserta`) AS jumlah,

COUNT(if(status_ttd=1,1,null)) as berhasil,
COUNT(if(status_ttd=0,0,null)) as gagal					
FROM spt_pimpinan LEFT JOIN spt_peserta ON spt_peserta.kegiatan_peserta = spt_pimpinan.`no` GROUP BY spt_pimpinan.`no` order by no desc");
					//$penghasilan = mysqli_query($koneksi, "SELECT hasil_penjualan FROM penjualan WHERE tahun='2016' order by id asc");
					$no = 1;
					while ($r = mysqli_fetch_array($sql)) {
						$getKegiatan = $r['no'];
					?>
                    <tr>
					  <td><?php echo  $no; ?></td>
					  <td width="460px"><a href="<?php echo "index2a.php?data=prosesreg_esign&idx=".$r['no']; ?>"><?php echo  $r['kegiatan']; ?></a></td>
					  <td width="120px"><?php echo  TanggalIndo($r['tgl_spt_new']); ?></td>
					   <td><?php echo  $r['berhasil']; ?></td>
					    <td><?php echo  $r['gagal']; ?></td>
					 	 <td><?php echo  $r['jumlah']; ?></td>				  
					  
					  <td>  <!--<button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus" style='font-size:18px'"></i> Tambah Kegiatan</button>-->
					   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo  $r['no']; ?>">
    Proses Esign
  </button>

 <div class="modal fade" id="myModal<?php echo  $r['no']; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         
		  <h6 class="modal-title">Masukkan NIK dan Passphrase Kegiatan <?php echo  $r['kegiatan']; ?></h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		<form action="prosess_esign/download_sertifikat_draft.php" method="POST" id="formdownload-<?php echo $r['no']; ?>" autocomplete="off">
		<input type="hidden" name="idx" value="<?php echo $r['no']; ?>">
        <div class="modal-body">
          <div class="form-group">
				  
		<input type="text" name="nik" size="50" class="form-control" placeholder="Masukkan NIK" autocomplete="off" required>
	   </div>
			
        <div class="form-group">           		
       		<input type="password"  name="passphrase"  size="50"  class="form-control" placeholder="Passphrase" autocomplete="off" required>
        </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-secondary shadow" type="button" data-dismiss="modal">Cancel</button>
          <button name="save" type="submit" value="Simpan" class="btn btn-primary shadow">Input</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
					</td>
					 
					</tr>
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus" style='font-size:18px'"></i> Tambah Kegiatan</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>	
	</div>
	 <div class="modal-body">
	 <form action="#" method="post">
		
          <div class="form-group">
            <label for="message-text" class="col-form-label">Kegiatan:</label>
			<input type="text" id="nama" name="nama" size="50" class="form-control" >
            
          </div>
		 
		  <div class="form-group">
        
           <input type="hidden" id="nama" name="nama" size="50" class="form-control" readonly>
          </div>
          <div class="form-group">
          
            <input type="hidden" id="pangkat" name="pangkat" size="50"  class="form-control" readonly >
          </div> 
		  <div class="form-group">
		  
          
            <input type="hidden" id="gol" name="gol" size="50"  class="form-control" readonly >
          </div>
           <div class="form-group">
          		
       		<input type="hidden" id="unit_kerja" name="unit_kerja"  size="50"  class="form-control" readonly >
            </div>		 
           
          <div class="form-group">
        		
          <input type="hidden" name="jab" id="jabatan"  size="50"  class="form-control"  readonly required >
          </div>
		 
		 		  
		 		  
		  <div class="form-group">  
		                                
    </div>
		  
	<p>
  
  
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   	
	<div class="form-group"> 

	</div> 
	  
	
	
  </div>
</div>
  <div class="modal-footer">
          <button class="btn btn-secondary shadow" type="button" data-dismiss="modal">Cancel</button>
          <button name="save" type="submit" value="Simpan" class="btn btn-primary shadow">Input</button>
  </div>

	 </form>	
	</div>
    </div>
  </div>
</div>

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
	$nama =$_POST['nama'];
	$nama = addslashes($nama);
	$nip =$_POST['nip'];
	$pangkat =$_POST['pangkat'];
	$gol =$_POST['gol'];
	$jab =$_POST['jab'];        
	$unit_kerja =$_POST['unit_kerja'];
	$unit_kerja = addslashes($unit_kerja);
	$kegiatan =$_POST['kegiatan'];
	$tgl_spt_new =$_POST['tgl_spt_new'];
	$status =$_POST['status'];
	$akun =$_POST['akun'];
	$akun1 =$_POST['akun1'];  
	$akun2 =$_POST['akun2'];
	$mak =$_POST['mak'];
	//$kategori =$_POST['kategori'];
	$kom=$_POST['kom'];  
	$sub_kom=$_POST['sub_kom'];
	$sumber_dana = $_POST['sumber_dana'];  
	$kortim = $_POST['kortim']; 
	//$koneksi = mysqli_connect('localhost', 'webadmin', 'pusdiklatNOMINATIF@&)&@@4', 'sertifikat');
	
	$input = mysqli_query($koneksi,"INSERT INTO `spt_pimpinan` 
	(`no`,
	`nama`,
	`nip`,
	`pangkat`,
	`gol`,
	`jab`,
	`unit_kerja`,
	`kegiatan`,
	`tgl_spt`,
	`status`,
	`akun`,
	`akun1`,
	`akun2`,
	`mak`,
	`kom`,
	`sub_kom`,
	`sumber_dana`,
	`tgl_spt_new`,
	`kortim`) 
	VALUES 
	(NULL, 
	'$nama', 
	'$nip',
	'$pangkat',
	'$gol',
	'$jab',
	'$unit_kerja',
	'$kegiatan',
	'',
	'$status',
	'$akun',
	'$akun1',
	'$akun2',
	'$mak',
	'$kom',
	'$sub_kom',
	'$sumber_dana',
	'$tgl_spt_new',
	'$kortim'
	);");
			
			if($input>0) {				
				echo "<script>alert('data berhasil di Input');
 			window.location='index2a.php?data=esign';</script>";		
			}
			else {
			echo "<script>alert('data Gagal di Input');
 			window.location='index2a.php?data=esign';</script>";					
			}			;   
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
$koneksi = mysqli_connect("localhost", "webadmin", "pusdiklatNOMINATIF@&)&@@4", "sertifikat");
$sql      = mysqli_query($koneksi, "SELECT * FROM spt_pimpinan1 ");	
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
		};  
		
		function changeValue2(no, nip){  
		document.getElementById('nama'+no).value = dtMhs[nip].nama;  
		document.getElementById('jab'+no).value = dtMhs[nip].jabatan; 
		document.getElementById('unit_kerja'+no).value = dtMhs[nip].unit_kerja; 
		document.getElementById('pangkat'+no).value = dtMhs[nip].pangkat; 
		document.getElementById('gol'+no).value = dtMhs[nip].gol; 		
		};  
		
		</script> 