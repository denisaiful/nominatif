<?php 

if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda sudah habis... silahkan login kembali');
 			window.location='index.php';</script>";
}else {
/*error_reporting(0);*/
?>

<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">-->
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
	$view = mysqli_query($koneksi,"select * FROM data_spt2 where no_peserta=$idx");
	$dt_view = mysqli_fetch_array($view);
	
	echo "

<table  border='0' cellpadding='4' class='table'>

	</div>
	  <tr>
    <td>Kegiatan</td>
    
    <td>$dt_view[kegiatan]</td>
  </tr> 
	
 <tr>
    <td>PIMPINAN</td>
    
    <td>$dt_view[nama_peserta]</td>
  </tr>
  <tr>
    <td>NIP</td>
    
    <td>$dt_view[nip_peserta]</td>
  </tr>
  
  <tr>
    <td>Lama Kegiatan</td>
    
    <td>$dt_view[lama] Hari</td>
  </tr>
  
  <tr>
    <td>Waktu Kegiatan</td>
    
    <td>$dt_view[tanggal_pergi] - $dt_view[bulan_pergi] - $dt_view[tahun_pergi] s/d $dt_view[tanggal_pulang] - $dt_view[bulan_pulang] - $dt_view[tahun_pulang]</td>
  </tr>
  
  
   
  
 <tr>
    <td>Tanggal SPT</td>
    
    <td>$dt_view[tanggal] $dt_view[bln_nama] $dt_view[tahun]  </td>
  </tr>  
  


</table> <p>";
	
}

//update


?>
</div>
<hr>


<!-- Input Moda -->

<button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target="#myModal">Tambah Bukti</button>



<!--<button type="button" rel="pulse-shrink" class="btn-u btn-u-blue pulse-shrink" data-toggle="modal" data-target="#myModal">
<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Tambah Data</button>-->
<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         
		 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Bukti</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
         <div class="modal-body">  
         <form action="#" method="post" enctype="multipart/form-data"> 
			<?php
        // ambil data dari database
		require 'koneksi.php';
		$idx= $_GET['idx'];
		//$link = mysqli_connect('localhost', 'root', 'P@ssw0rdbmkg2020', 'sertifikat');
        $query = "select * from spt_peserta where no_peserta=$idx";
        $hasil = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($hasil)) {
                            ?>             
        <input value="<?php echo $row['no_peserta'] ?>" name="kegiatan_peserta" type="hidden"  class="form-control" readonly>
                           
                            <?php
                        }
                        ?>       	
       		<?php
            // ambil data dari database
			require 'koneksi.php';
			$idx= $_GET['idx'];
			//$link = mysqli_connect('localhost', 'root', 'P@ssw0rdbmkg2020', 'sertifikat');
            $query = "select * from spt_pimpinan where no=$idx";
            $hasil = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_array($hasil)) {
                ?>                    
          <input value="<?php echo $row['kegiatan'] ?>"  type="hidden"  class="form-control" readonly>
            
                            <?php
                        }
                        ?>    
					 
	  
	
	
	    
	   <div class="form-group">           	
		<input type="text"  name="asal"  size="50"  class="form-control" placeholder="Keterangan" required>
	   </div>
	   
	   
		
		<div class="form-group">
			<label for="message-text" class="control-label">Upload Bukti</label>
       		 <div class="custom-file">
		   
		   <input class="form-control" type="file" id="formFile" name="file">
		</div>
        </div>
		
                
		<div class="row">
        <div class="col-md-3">
        <label for="message-text" class="control-label">Biaya</label>
         <input type="text" name="transport_lokal"    class="form-control" placeholder=" (Rp)" onkeyup="convertToRupiah(this);" >
        </div>		                              
		</div>
<br>
					
			<div class="form-group ">
			 <label for="message-text" class="control-label">Tanggal Kuitansi</label>
    		<div class="input-daterange input-group" id="datepicker">
				<input type="text" class="input-sm form-control" autocomplete="off" id="tgl_kuitansi" name="tgl_kuitansi_new" placeholder="Tgl_kuitansi" required />
        	</div>
            </div>
    
                      
		<!-- End Validation Forms -->
        	
                                    
			<input type="hidden" id="gol" name="gol_peserta" size="50"  class="form-control" readonly >
			<input type="hidden" name="no_urut[]">
       		<input type="hidden" id="jabatan" name="jabatan_peserta"  size="50"  class="form-control" readonly >
            <input type="hidden" id="unit_kerja" name="unit_kerja_peserta" size="50"  class="form-control" readonly >        
			</div>
           <div class="modal-footer">
           <button name="reset" type="reset" value="Reset" class="shadow p-2 mb-4 rounded btn btn-danger">Reset</Button>
            <button name="save" type="submit" value="Simpan" class="shadow p-2 mb-4 rounded btn btn-success">Input</button>
         </div>
		 </form> 
      </div>  
  </div>
  </div>                 


<!--End Input Moda --> 

<?php
include "koneksi.php";
$idx= $_GET['idx'];

if(isset($_POST['save']))
{ 
    
	
	$tgl_kuitansi_new =$_POST['tgl_kuitansi_new'];	
	$kegiatan_peserta =$_POST['kegiatan_peserta'];
	$asal = $_POST['asal'];
	$transport_lokal=$_POST['transport_lokal'];
	$transport_lokal_new = str_replace(".", "", $transport_lokal);
	
		 	
	$acak = rand(000000,999999);			
	$file_name = $acak.".".$_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];		  					
	move_uploaded_file($tmp_name, "files/".$file_name);
	$file = $file_name; 								
			
				
	$query = "INSERT INTO `sertifikat`.`bukti` (
			`no_peserta`,
			`kegiatan_peserta`,									
			`asal`,									
			`tgl_kuitansi_new`,									
			`transport_lokal`,
			`file`			
			)
			VALUES (
			NULL , 
			'$kegiatan_peserta', 									
			'$asal',
			'$tgl_kuitansi_new',
			'$transport_lokal_new',
			'$file'
									
									)";
				mysqli_query($koneksi, $query) or die(mysqli_error($koneksi)); // baru ditambah

				$input = mysqli_affected_rows($koneksi); // baru ditambah
				
				$no_urut +=1;
				
				
			
			
			if($input>0) {
				/*echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>".$namaArr[$i]."</strong> Berhasil diinput.
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					  </button>
					</div>";*/
				echo "<script>alert('data berhasil di Input');
 			window.location='index2a.php?data=bukti&idx=$idx';</script>";
				
			}
			else {
				echo "<script>alert('data GAGAL di Input');
 			window.location='index2a.php?data=bukti&idx=$idx';</script>";
			}
			
} ;
				
?>
  <p>      
  
  

  <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
                <tr>
                       	<th width="2%">No.</th>                        
                        <th width="130px">Keterangan</th>
						<th width="130px">Jumlah</th>
                        <th style="text-align:center">Tgl Bukti</th>
                        <th style="text-align:center">File</th>
						<th style="text-align:center">Edit</th>
						<th style="text-align:center">Hapus</th>
                        
						                       
                    </tr>

                    
                </thead>
         <tbody>
            <?php
			require 'koneksi.php';			
			$no=1;
			$getKegiatan = $_GET['idx'];			
		    $query = "SELECT * FROM bukti ";
			//$link = mysqli_connect('localhost', 'root', 'P@ssw0rdbmkg2020', 'sertifikat');
			   
            $hasil = mysqli_query($koneksi, $query);   
			
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
                    
					<td><?php echo $row['asal'] ?></td>                  
                    <td align="right"><?php echo number_format($row['transport_lokal'],0,',','.') ?></td>   
					<td><?php echo $row['tgl_kuitansi_new'] ?></td>
					<td><a href="javascript:void(0);"
						onclick="window.open('../file/<?php echo $row['file']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">						
						<i class="fas fa-print fa-2x"></i></a> 
					
					
					<!--<a href="" target="_blank">
						<i class="fas fa-file fa-2x"></i></a> -->
						</td>
					
					<td>
					<a href="<?php echo "index2a.php?data=proseseditpeserta&idx=".$row['no_peserta']."&idk=".$getKegiatan; ?>"><i class="fas fa-edit fa-2x"></i></a>
					</td>
					
					<td>
					
					
					
					<a href="<?php echo "index2a.php?data=hapus_bukti_keg&idx=".$row['no_peserta']; ?>"><i class="fas fa-eraser fa-2x" onclick="return deleteconfig()"></i></a>
					</td>
                        
                </tr>
                <?php
            $no++; }
			
            ?>
            </tbody>
        </table>
 </div>
  <a href="index2a.php?data=tables2" class="btn btn-danger shadow p-2 mb-4">
  <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Kembali</a><p>
</div>
</div>
</div>
</div>
<?php }; ?>
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
		
		<script type="text/javascript"> 	  
		<?php echo $jsArray; ?>  
		function changeValue(nip_ppnpn){  
			nips = document.getElementById('nip_pegawai').value;
			console.log(nips);
			if (nips == "") {
				nips = nip_ppnpn.toString();
			} else {
				nips += "|" + nip_ppnpn.toString();
			}
			document.getElementById('nip_pegawai').value = nips;
			

			tempat_lahir = document.getElementById('tempat_lahir').value;
			if (tempat_lahir == "") {
				tempat_lahir = dtMhs[nip_ppnpn].tempat_lahir;
			} else {
				tempat_lahir += "|" + dtMhs[nip_ppnpn].tempat_lahir;
			}
			document.getElementById('tempat_lahir').value = tempat_lahir;
			
			nama = document.getElementById('nama').value;
			if (nama == "") {
				nama = dtMhs[nip_ppnpn].nama;
			} else {
				nama += "|" + dtMhs[nip_ppnpn].nama;
			}
			document.getElementById('nama').value = nama;
			
			jabatan = document.getElementById('jabatan').value;
			if (jabatan == "") {
				jabatan = dtMhs[nip_ppnpn].jabatan;
			} else {
				jabatan += "|" + dtMhs[nip_ppnpn].jabatan;
			}
			document.getElementById('jabatan').value = jabatan;
			
			unit_kerja = document.getElementById('unit_kerja').value;
			if (unit_kerja == "") {
				unit_kerja = dtMhs[nip_ppnpn].unit_kerja;
			} else {
				unit_kerja += "|" + dtMhs[nip_ppnpn].unit_kerja;
			}
			document.getElementById('unit_kerja').value = unit_kerja;
			
			pangkat = document.getElementById('pangkat').value;
			if (pangkat == "") {
				pangkat = dtMhs[nip_ppnpn].pangkat;
			} else {
				pangkat += "|" + dtMhs[nip_ppnpn].pangkat;
			}
			document.getElementById('pangkat').value = pangkat;
			
		
			
			gol = document.getElementById('gol').value;
			if (gol == "") {
				gol = dtMhs[nip_ppnpn].gol;
			} else {
				gol += "|" + dtMhs[nip_ppnpn].gol;
			}
			document.getElementById('gol').value = gol;	
			
			tanggallahir = document.getElementById('tanggallahir').value;
			if (tanggallahir == "") {
				tanggallahir = dtMhs[nip_ppnpn].tanggallahir;
			} else {
				tanggallahir += "|" + dtMhs[nip_ppnpn].tanggallahir;
			}
			document.getElementById('tanggallahir').value = tanggallahir;	
		};  
		
		</script> 
		

</div>
