<?php 

error_reporting(E_ERROR | E_PARSE);
session_start();
if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda telah habis.. silahkan login kembali...');
 			window.location='page_login.php';</script>";
}else {
/*error_reporting(0);*/
?>


<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- jika menggunakan bootstrap4 gunakan css ini  -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">


<!-- cdn bootstrap4 -->
        
    
  

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <div class="container-fluid">

          <!-- Page Heading -->
         <button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus" style='font-size:18px'"></i> Tambah Kegiatan</button>
	

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
            <textarea class="form-control" name="kegiatan" id="message-text"></textarea>
          </div>
		  
		  <div class="form-group">
		 <label for="recipient-name" class="col-form-label">Pimpinan </label>
		<select name="nip" class="form-control" id="nip" style="width:100%" onchange="changeValue(this.value)" >
        <option value="0">-Pilih-</option>   
        <?php 
	include "koneksi_136.php";	
	$result = mysqli_query($link,"select *, if(UNITKERJA LIKE '%mutu%','Bidang Perencanaan, Pengembangan dan Penjaminan Mutu Pusdiklat',if(UNITKERJA LIKE '%penyelenggaraan%','Bidang penyelenggaran Pusdiklat',UNITKERJA)) AS unitkerja from pegawai
 WHERE NIP=197203221995032001 or NIP=196910161998032001 or NIP=198401242006041002 or NIP=198510292008122001 or NIP=197102211994031001");
   
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['NIP'] . '">' . $row['NAMA'] . ' / ' . $row['unitkerja'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['NIP'] . "'] = 
		{NAMA:'" . addslashes($row['NIP']) . 
		"',nama:'".addslashes($row['NAMA']).
		"',jabatan:'".addslashes($row['NAMAJABATAN']).
		"',unit_kerja:'".addslashes($row['unitkerja']).
		"',pangkat:'".addslashes($row['PANGKAT']).
		"',gol:'".addslashes($row['GOLONGAN']).
		
		"'};\n";    
    }      
    ?>    
        </select>
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
		  
		  <div class="row">      
			<div class="col-md-6">
            <div class="form-group"> 
			   <label>Status</label>
			   <select name="status" class="form-control" >
                    <option value="" selected disabled>Pilih Status Pimpinan</option>
                            <option value="Kepala Pusat Pendidikan dan Pelatihan">Pejabat</option>
                            <option value="Plh.Kepala Pusat Pendidikan dan Pelatihan">Pelaksana Harian</option>
							<option value="1">Kepala Pusat Lain</option>
                         
                    </select>
			</div>   
</div>

	   </div>
	   
	   <div class="row">      
		
<div class="col-md-6">
            <div class="form-group"> 
			   <label>Kategori Kegiatan</label>
			    <select name="kategori" id="select_pendidikan" class="form-control" >
                    <option value="" selected disabled>Pilih Kategori Kegiatan</option>
                            <option value="0">Kategori Kegiatan Utama</option>
                            <option value="1">Kategori Kegiatan Turunan</option>
							
                         
                    </select>
			</div> 			
	   </div>
	   </div>
	   
	   <div class="form-group jp"> 
			   <label>Turunan Kegiatan</label>
			   

			   <select name="turunan_keg" id="kota" style="width:100%" class="form-control" >
					<option value="" selected disabled>Pilih Kegiatan</option>
				<?php 
				include "koneksi.php";
				$result = mysqli_query($koneksi,"select * from spt_pimpinan order by no desc");		
				while ($row = mysqli_fetch_array($result)) {    
				echo '<option value="'.$row['no'].'">'.$row['kegiatan'].'</option>';         
				}      
				?>    		
				</select>
			</div> 
		 
	
	 <div class="form-group" style="width:25%">  
		    <label>Tgl SPT</label>
            <div class="input-daterange input-group datepicker1" id="datepicker">
          <input type="text" class="input-sm form-control" id="tgl_spt" name="tgl_spt_new" placeholder="Awal Kegiatan" required autocomplete="off"  />		 
		 
         </div>
		  </div>
		  
		 		  
		  <div class="form-group">  
		<div class="row">      
			<div class="col-md-6">
            <div class="form-group"> 
			   <label>Sumber Dana</label>
			   <select name="sumber_dana" class="form-control" required >
					<option value="" selected disabled>Pilih Sumber Dana</option>
				<?php 
				include "koneksi.php";
				$result = mysqli_query($koneksi,"select * from sumber_dana order by no desc");		
				while ($row = mysqli_fetch_array($result)) {    
				echo '<option value="'.$row['no'].'">'.$row['sumber_dana'].'</option>';         
				}      
				?>    		
				</select>
			</div>   
</div>
<div class="col-md-6">
            <div class="form-group"> 
			   <label>Kordinator TIM</label>
			   <select name="kortim" class="form-control" required >
					<option value="" selected disabled>Pilih Kordinator TIM</option>
				<?php 
				include "koneksi.php";
				$result = mysqli_query($koneksi,"select * from kortim order by id desc");		
				while ($row = mysqli_fetch_array($result)) {    
				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';         
				}      
				?>    		
				</select>
			</div> 			
	   </div>
	   </div>
<div class="row">      
			<div class="col-md-6">
            
			   <label>Bendahara</label>
			   <select name="bendahara" class="form-control" required >
					<option value="" selected disabled>Pilih Bendahara</option>
				<?php 
				include "koneksi.php";
				$result = mysqli_query($koneksi,"select * from bendahara order by id desc");		
				while ($row = mysqli_fetch_array($result)) {    
				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';         
				}      
				?>    		
				</select>
			</div>   

<div class="col-md-6">
            
			   <label>PPK</label>
			   <select name="ppk" class="form-control" required >
					<option value="" selected disabled>Pilih PPK</option>
				<?php 
				include "koneksi.php";
				$result = mysqli_query($koneksi,"select * from ppk order by id desc");		
				while ($row = mysqli_fetch_array($result)) {    
				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';         
				}      
				?>    		
				</select>
			</div> 			
	   </div> 	   
    </div>
<p>
  <a class="btn btn-danger shadow" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Data Akun Kegiatan
  </a>
  
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   	<div class="form-group">  
		<div class="row">
        <div class="col-md-4">
            <label>Akun</label>
            <select name="akun" class="form-control">
                <option value="" selected disabled>Pilih Akun</option>
                <option value="996">996</option>
                <option value="994">994</option>
				<option value="EAA">EAA</option>
				<option value="EAM">EAm</option> 	
            </select>
        </div>
        <div class="col-md-4">
            
            <label>Akun</label>
            <select name="akun1" class="form-control">
                <option value="" selected disabled>Pilih Akun</option>
                <option value="001">001</option>
                <option value="002">002</option> 
				<option value="-">-</option>				
            </select>
        </div>
       
        <div class="col-md-4">
            
            <label>MAK</label>
            <select name="mak" class="form-control">
                <option value="" selected disabled>Pilih MAK</option>
                <option value="524119">524119</option>
                <option value="524219">524219</option>
                <option value="524114">524114</option> 
                <option value="524111">524111</option>                         
            </select>
        </div>
           </div>                                 
    </div>
	<div class="form-group"> 
	<div class="row">
      
        <div class="col-md-4">
             <label>Komponen</label>
            <select name="kom" class="form-control">
                <option value="" selected disabled>Komp</option>
                <option value="051">051</option>
                <option value="052">052</option>
                <option value="053">053</option> 
                <option value="054">054</option>
				<option value="-"> - </option> 				
            </select>
        </div>
       
       
		<div class="col-md-4">
			<label>Sub Komponen</label>
            <select name="sub_kom" class="form-control">
                <option value="" selected disabled>Sub Komp</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option> 
                <option value="D">D</option>  
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option> 
                <option value="H">H</option>  	
				<option value="I">I</option>
                <option value="J">J</option>
                <option value="K">K</option> 
                <option value="L">L</option>  
                <option value="M">M</option>
                <option value="N">N</option>
                <option value="O">O</option> 
                <option value="P">P</option>  
				<option value="Q">Q</option> 
                <option value="R">R</option>
				<option value="S">S</option> 
                <option value="T">T</option>  
                <option value="U">U</option>
                <option value="V">V</option>
                <option value="W">W</option> 
                <option value="X">X</option>  
				<option value="Y">Y</option> 
                <option value="Z">Z</option>
				<option value="AA">AA</option>
                <option value="AB">AB</option>
                <option value="AC">AC</option> 
                <option value="AD">AD</option>  
                <option value="AE">AE</option>
                <option value="AF">AF</option>
                <option value="AG">AG</option> 
                <option value="AH">AH</option>  	
				<option value="AI">AI</option>
                <option value="AJ">AJ</option>
                <option value="AK">AK</option> 
                <option value="AL">AL</option>  
                <option value="AM">AM</option>
                <option value="AN">AN</option>
                <option value="AO">AO</option> 
                <option value="AP">AP</option>  
				<option value="AQ">AQ</option> 
                <option value="AR">AR</option>
				<option value="AS">AS</option> 
                <option value="AT">AT</option>  
                <option value="AU">AU</option>
                <option value="AV">AV</option>
                <option value="AW">AW</option> 
                <option value="AX">AX</option>  
				<option value="AY">AY</option> 
                <option value="AZ">AZ</option>			  
				<option value="-">-</option>					
            </select>
        </div>
		<div class="col-md-4">
            <label>Akun Lagi</label>
            <select name="akun2" class="form-control">
                <option value="" selected disabled>Pilih Akun Lagi</option>
                <option value="EBA">EBA</option>
                <option value="EBC">EBC</option>
					
            </select>  
        </div>
		
                                            
    </div>
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

	
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kegiatan <?php echo $_SESSION['nama']?></h6>
            </div>
			
            <div class="card-body">
			<p><a target="_blank" href="export_excel1.php">EXPORT KE EXCEL <i class="bi bi-file-earmark-excel" ></i></a></p>
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="example" width="100%" cellspacing="0">  
                  <thead>
                     <tr>
						<th>No.</th>
						<th align="center">Kegiatan</th>
						<th align="center">Tgl SPT</th>
						<th align="center">Qty</th>
						<th align="center">Sudah TTD</th>
						<th align="center">Belum TTD</th>
						<th align="center">Penandatangan SPT</th>
						<th align="center">ttd SPT</th>						
						<th>Nominatif</th>
						
						<th>Update</th>
						<th>Hapus</th>
						
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No.</th>
						<th align="center">Kegiatan</th>
						<th align="center">Tgl SPT</th>
						<th align="center">Qty</th>
						<th align="center">Sudah TTD</th>
						<th align="center">Belum TTD</th>
						<th align="center">Penandatangan SPT</th>
						<th align="center">ttd SPT</th>
						<th align="center">Nominatif</th>
						 
						<th>Update</th>
						<th>Hapus</th>
						
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
					  <td width="460px"><a href="<?php echo "index2a.php?data=prosesreg1&idx=".$r['no']; ?>"><?php echo  $r['kegiatan']; ?></a></td>
					  <td width="120px"><?php echo  TanggalIndo($r['tgl_spt_new']); ?></td>
					   <td><?php echo  $r['jumlah']; ?></td>
					    <td><?php echo  $r['berhasil']; ?></td>
					    <td><?php echo  $r['gagal']; ?></td>
					  <td><?php echo  $r['nama']; ?></td>
					  
					   <td>  <!--<button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus" style='font-size:18px'"></i> Tambah Kegiatan</button>-->
					    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo  $r['no']; ?>">
    <i class="fas fa-solid fa-signature"></i>
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
					   
					<td  align="center">
					   					   
						<a href="javascript:void(0);"
					onclick="window.open('laporan-php-html2pdf/report4.php?getKegiatan=<?php echo  $r['no']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">
					<i class="fas fa-print fa-2x"></i></a>
					</td>
					  
					  <td>
					  <a href="<?php echo "index2a.php?data=edit_kegiatan&idx=".$r['no']?>"><span class="green">
												<i class="fas fa-edit fa-2x"></i></span></a>
					  </td>
					  <td><a href="<?php echo "index2a.php?data=hapus_kegiatan&idx=".$r['no']; ?>"><i class="fas fa-eraser fa-2x" onclick="return deleteconfig()"></i></a>
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
	$kategori =$_POST['kategori'];
	$kom=$_POST['kom'];  
	$sub_kom=$_POST['sub_kom'];
	$sumber_dana = $_POST['sumber_dana'];  
	$kortim = $_POST['kortim']; 
	$bendahara = $_POST['bendahara'];
	$ppk = $_POST['ppk']; 
	$turunan_keg = $_POST['turunan_keg'];	
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
	`kortim`,
	`bendahara`,
	`ppk`,
	`kategori`,
	`turunan_keg`) 
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
	'$kortim',
	'$bendahara',
	'$ppk',
	'$kategori',
	'$turunan_keg'
	);");
			
			if($input>0) {				
				echo "<script>alert('data berhasil di Input');
 			window.location='index2a.php?data=tables2';</script>";		
			}
			else {
			echo "<script>alert('data Gagal di Input');
 			window.location='index2a.php?data=tables2';</script>";					
			}			;
	};
?>  
<?php } ?>
  <!-- Bootstrap core JavaScript
  
  https://code.jquery.com/jquery-3.7.0.js
https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js
https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js
<script src="vendor/jquery/jquery.min.js"></script>-->

<script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript"  src="js/rupiah-rp.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>



</body>

<script>
 //var f=jQuery.noConflict();
	f(document).ready(function () {
		f("#kota").select2({
			theme: 'bootstrap4',
			placeholder: "Please Select"
		});
	});
</script>

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

<script>
		 var f=jQuery.noConflict(); 
        f(document).ready(function() {
            f('.jp').hide();
            f('.jp2').hide();

            f("#select_pendidikan").change(function() {
                // alert($(this).val());
                if (f(this).val() == 1)
                    f('.jp').show();
                else
                    f('.jp').hide();

            });

        });
    </script>

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
$koneksi = mysqli_connect("localhost", "root", "", "sertifikat");
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