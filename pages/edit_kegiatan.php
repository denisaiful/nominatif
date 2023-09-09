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

<?php
include "koneksi.php";
$idx= $_GET['idx'];

//view
if(isset($_GET['idx'])) {
	$view = mysqli_query($koneksi,"SELECT * FROM `spt_pimpinan1` LEFT join kortim on kortim.id = spt_pimpinan1.kortim where `spt_pimpinan1`.`no` = $idx");
	
	while($r = mysqli_fetch_array($view)){
	?>
	   <form action="#" method="post" class="form-horizontal"> 
	
	 <div class="container-fluid">

                    <!-- Page Heading -->
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Kegiatan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                             <div class="form-group">
								<label for="message-text" class="col-form-label">Kegiatan</label>
								<textarea class="form-control" name="kegiatan" id="message-text"><?php echo $r['kegiatan'] ?></textarea>
							  </div>
							   <input type="hidden" name="idx"  value="<?php echo $r['no']; ?>" class="form-control" readonly>
							  <div class="form-group">
					 <label for="recipient-name" class="col-form-label">Pimpinan</label>
					<select name="nip" class="form-control" id="nip" style="width:100%" onchange="changeValue2('<?php echo $r['no']; ?>', this.value)" >
					<option value="<?php echo $r['nip'] ?>"><?php echo $r['nama'] ?></option>
					<?php 
					include "koneksi_136.php";	
										$result = mysqli_query($link,"select *, if(UNITKERJA LIKE '%mutu%','Bidang Perencanaan, Pengembangan dan Penjaminan Mutu Pusdiklat',if(UNITKERJA LIKE '%penyelenggaraan%','Bidang penyelenggaran Pusdiklat',UNITKERJA)) AS unitkerja from pegawai
 WHERE NIP=197203221995032001 or NIP=196910161998032001 or NIP=198401242006041002 or NIP=198510292008122001 or NIP=197102211994031001");
							   
					$jsArray = "var dtMhs = new Array();\n";        
					 while ($row = mysqli_fetch_array($result)) {    
						$selected = $r['nip'] ==  $row['nip'] ? ' selected' : '' ;
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
						   <input type="hidden" id="nama<?php echo $r['no']; ?>" name="nama" size="50" value="<?php echo $r['nama'] ?>" class="form-control" readonly>
						  </div>
						  <div class="form-group">
						  
							<input type="hidden" id="pangkat<?php echo $r['no']; ?>" name="pangkat" size="50" value="<?php echo $r['pangkat'] ?>"  class="form-control" readonly >
						  </div> 
						  <div class="form-group">
						  
						  
							<input type="hidden" id="gol<?php echo $r['no']; ?>" name="gol" size="50" value="<?php echo $r['gol'] ?>"  class="form-control" readonly >
						  </div>
						   <div class="form-group">
								
							<input type="hidden" id="unit_kerja<?php echo $r['no']; ?>" name="unit_kerja" value="<?php echo $r['unit_kerja'] ?>"   size="50"  class="form-control" readonly >
							</div>		 
						   
						  <div class="form-group">
								
						  <input type="hidden" id="jab<?php echo $r['no']; ?>" name="jab"  size="50" value="<?php echo $r['jab'] ?>"  class="form-control"  readonly required >
						  </div>
						  
						  <div class="row">      
									<div class="col-md-6">
									<div class="form-group"> 
									   <label>Status</label>
									   <select name="status" class="form-control" >
											<option value="Kepala Pusat Pendidikan dan Pelatihan" 
													<?php echo $r['status'] == "Kepala Pusat Pendidikan dan Pelatihan" ? " selected" : "" ?>
													>Pejabat</option>
													<option value="Plh.Kepala Pusat Pendidikan dan Pelatihan" 
													<?php echo $r['status'] == "Plh.Kepala Pusat Pendidikan dan Pelatihan" ? " selected" : "" ?>
													>Pelaksana Harian</option>
													<option value="Plh.Kepala Pusat Pendidikan dan Pelatihan" 
													<?php echo $r['status'] == "1" ? " selected" : "" ?>
													><?php echo $r['jab']; ?></option>
											</select>
									</div>   
						</div>
						
							   </div>
							   
							   <div class="row">      
									
						<div class="col-md-6">
									<div class="form-group"> 
									   <label>Kategori Kegiatan</label>
										<select name="kategori" id="select_pendidikan" class="form-control" >
													<option value="<?php echo $r['kategori'] ?>"><?php echo $r['name_kategori'] ?></option>
													 <option value="0">Kategori Kegiatan Utama</option>
													<option value="1">Kategori Kegiatan Turunan</option>
													
												 
											</select>
									</div> 			
							   </div>
							   </div>
<div class="col-md-6">				
<div class="form-group jp"> 
			   <label>Turunan Kegiatan</label>
			   <select name="turunan_keg" class="form-control" required >
				<option value="<?php echo $r['turunan_keg'] ?>"><?php echo $r['turunan_keg'] ?></option>
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
						<div class="form-group" style="width:25%">
							<label>Tgl SPT</label>
							<div class="input-daterange input-group datepicker" >
								<input type="text" class="input-sm form-control" id="tgl_kuitansi" value="<?php echo $r['tgl_spt'] ?>"  name="tgl_spt_new" required />		 
							</div>
						</div>
						
						<div class="form-group">						
							<label>Sumber Dana</label>
								<select name="sumber_dana" class="form-control" style="width:40%">
								  <option value="<?php echo $r['no_sumberdana'] ?>"><?php echo $r['sumber_dana'] ?></option>
									
									<?php
										include "koneksi.php"; 						
										$result = mysqli_query($koneksi,"select * from sumber_dana");						          
										while ($row = mysqli_fetch_array($result)) {    
										echo '<option value="'.$row['no'].'">'.$row['sumber_dana'].'</option>';         
									}      
									?>    		
								</select>							                                
						</div>
						  
						<div class="form-group">	
						<div class="card card-body">
						<div class="row">
        <div class="col-md-4">
            <label>Kordinator TIM</label>
								<select name="kortim" class="form-control" >
								  <option value="<?php echo $r['id_tim'] ?>"><?php echo $r['name'] ?></option>
									
									<?php
										include "koneksi.php"; 						
										$result = mysqli_query($koneksi,"select * from kortim");						          
										while ($row = mysqli_fetch_array($result)) {    
										echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';           
									}      
									?>    		
								</select>	
        </div>
		 <div class="col-md-4">
            <label>Bendahara</label>
								<select name="bendahara" class="form-control" >
									<option value="<?php echo $r['bendahara'] ?>"><?php echo $r['bendahara'] ?></option>
									<?php
										include "koneksi.php"; 						
										$result = mysqli_query($koneksi,"select * from bendahara");						          
										while ($row = mysqli_fetch_array($result)) {    
										echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';           
									}      
									?>   	
								</select>	
        </div>
		
		<div class="col-md-4">
            <label>PPK</label>
								<select name="ppk" class="form-control" >
									<option value="<?php echo $r['ppk'] ?>"><?php echo $r['ppk'] ?></option>
									<?php
										include "koneksi.php"; 						
										$result = mysqli_query($koneksi,"select * from ppk");						          
										while ($row = mysqli_fetch_array($result)) {    
										echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';           
									}      
									?>   
								</select>	
        </div>
		</div>
		
						
						</div>
						</div>
						
						<div class="card card-body">
   	<div class="form-group">  
		<div class="row">
        <div class="col-md-4">
            <label>Akun</label>
             <select name="akun" class="form-control">                
                <option value="996" <?php echo $r['akun'] == "996" ? " selected" : "" ?>>996</option>
                <option value="994" <?php echo $r['akun'] == "994" ? " selected" : "" ?>>994</option>
				<option value="-" <?php echo $r['akun'] == "994" ? " selected" : "" ?>>-</option>
			</select>
        </div>
        <div class="col-md-4">
            
            <label>Akun</label>
            <select name="akun1" class="form-control">               
                <option value="001" <?php echo $r['akun1'] == "001" ? " selected" : "" ?>>001</option>
                <option value="002" <?php echo $r['akun1'] == "002" ? " selected" : "" ?>>002</option> 
				<option value="-" <?php echo $r['akun1'] == "-" ? " selected" : "" ?>>-</option>				
            </select>
        </div>
       
        <div class="col-md-4">
            
            <label>MAK</label>
             <select name="mak" class="form-control">
				<option value="" <?php echo $r['mak'] == "" ? " selected" : "" ?>>-</option>
                <option value="524119" <?php echo $r['mak'] == "524119" ? " selected" : "" ?>>524119</option>
                <option value="524219" <?php echo $r['mak'] == "524219" ? " selected" : "" ?>>524219</option>
                <option value="524114" <?php echo $r['mak'] == "524114" ? " selected" : "" ?>>524114</option> 
                <option value="524111" <?php echo $r['mak'] == "524111" ? " selected" : "" ?>>524111</option>
				
			</select>
        </div>
           </div>                                 
    </div>
	<div class="form-group"> 
	<div class="row">
      
        <div class="col-md-4">
             <label>Komponen</label>
            <select name="kom" class="form-control">
                <option value="" <?php echo $r['kom'] == "" ? " selected" : "" ?>>-</option>
                <option value="051" <?php echo $r['kom'] == "051" ? " selected" : "" ?>>051</option>
                <option value="052" <?php echo $r['kom'] == "052" ? " selected" : "" ?>>052</option>
                <option value="053" <?php echo $r['kom'] == "053" ? " selected" : "" ?>>053</option> 
                <option value="054" <?php echo $r['kom'] == "054" ? " selected" : "" ?>>054</option>
						
            </select>
        </div>
       
       
		<div class="col-md-4">
			<label>Sub Komponen</label>
            <select name="sub_kom" class="form-control">                
				<option value="<?php echo $r['sub_kom'] ?>" selected><?php echo $r['sub_kom'] ?></option>
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
					<select name="akun2" class="form-control" >
					  <option value="<?php echo $r['akun2'] ?>" selected><?php echo $r['akun2'] ?></option>
						
						<option value="EBA">EBA</option>
						<option value="EBC">EBC</option>  
						 
					</select>  
				</div>        
          
		<!--
		<div class="col-md-4">
            <label>Akun</label>
             <select name="akun2" class="form-control">                
                <option value="EBA" <?php echo $r['akun2'] == "EBA" ? " selected" : "" ?>>EBA</option>
                <option value="EBC" <?php echo $r['akun2'] == "EBC" ? " selected" : "" ?>>EBC</option>
			</select>
        </div> -->
		
                                            
    </div>

						 
                            </div>
                        </div>
                   
 </div> </div>
                
                <!-- /.container-fluid -->

           
  
	
	<div class="form-group">
	
    <div class="col-sm-offset-2 col-sm-10">
	
    <a href="index3.php?data=tables2" class="btn btn-danger"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Cancel</a>
	<button name="update" type="submit" value="update" class="btn btn-success">Update</button>
    </div>
  </div>
  </div>
	 </div>
</form> 

<?php } }
	?>
	
<?php				
$idx= $_POST['idx'];
//proses update
if(isset($_POST['update'])) {
	$nama =$_POST['nama'];
	$nip =$_POST['nip'];
	$pangkat =$_POST['pangkat'];
	$gol =$_POST['gol'];
	$jab =$_POST['jab'];
	$unit_kerja =$_POST['unit_kerja'];
	$kegiatan =$_POST['kegiatan'];
	$tgl_spt_new =$_POST['tgl_spt_new'];
	$status =$_POST['status'];
	$akun =$_POST['akun'];
  	$akun1 =$_POST['akun1'];
	$akun2 =$_POST['akun2'];
  	$mak =$_POST['mak'];
	$sub_kom =$_POST['sub_kom'];
  	$kom =$_POST['kom'];
	$sumber_dana =$_POST['sumber_dana'];
	$bendahara =$_POST['bendahara'];
	$ppk =$_POST['ppk'];
	$kortim =$_POST['kortim'];
	$kategori =$_POST['kategori'];
	$turunan_keg =$_POST['turunan_keg']; 	
	if(empty ($nama) 
		//or empty($nip) 
		//or empty($pangkat) 
		//or empty($gol) 
		//or empty($jab) 
		//or empty($unit_kerja)
		//or empty($kegiatan)
		//or empty($tgl_spt)
		//or empty($status)
		
		
	)
	
	{ 
		echo "<script>alert('data ada yang kosong..');
 			window.location='index2a.php?data=tables2';</script>";
				
		}else{
	$update = mysqli_query($koneksi,"update spt_pimpinan SET 
											nama ='$nama', 
											nip='$nip', 
											pangkat ='$pangkat' ,
											gol = '$gol',
											jab = '$jab',
											unit_kerja = '$unit_kerja',
											kegiatan = '$kegiatan',
											tgl_spt_new = '$tgl_spt_new',
											status = '$status',
											akun ='$akun',
											akun1 ='$akun1',
											akun2 ='$akun2',
											mak = '$mak',
											kom = '$kom',
											sub_kom = '$sub_kom',
											sumber_dana ='$sumber_dana',
											bendahara ='$bendahara',
											ppk ='$ppk',  
											kortim ='$kortim',
											kategori ='$kortim',
											turunan_keg ='$turunan_keg'
											WHERE no='$idx'");	
	
	if($update>0){
		echo "<script>alert('data berhasil diUpdate');
 			window.location='index2a.php?data=tables2';</script>";} 
			
			else { echo "<script>alert('data Gagal diUpdate');
 			window.location='index2a.php?data=tables2';</script>";}

}

}	}								
?>


</div>

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