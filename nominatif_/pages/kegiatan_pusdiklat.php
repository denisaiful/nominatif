<?php 

if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda telah habis.. silahkan login kembali...');
 			window.location='page_login.php';</script>";
}else {
/*error_reporting(0);*/
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container-fluid">

<button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" style='font-size:18px'"></i> Tambah Kegiatan</button>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data Kegiatan</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive"> 
 
<div id="HTMLtoPDF">   
<?php
include "koneksi.php";  
$idx= $_GET['idx'];

//update


?>
</div>

<!-- Input Moda -->




<!--<button type="button" rel="pulse-shrink" class="btn-u btn-u-blue pulse-shrink" data-toggle="modal" data-target="#myModal">
<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Tambah Data</button>-->
<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         
		 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
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
		 <label for="recipient-name" class="col-form-label">Pimpinan</label>
		<select name="nip" class="form-control" id="nip" style="width:100%" onchange="changeValue(this.value)" >
        <option value="0">-Pilih-</option>   
        <?php 
	include "koneksi_136.php";	
	$result = mysql_query("select * from user
 WHERE nip=196202251985031001 or nip=197203221995032001 or nip=198401242006041002 or nip=198510292008122001");
   
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysql_fetch_array($result)) {    
        echo '<option value="' . $row['nip'] . '">' . $row['nama'] . ' / ' . $row['unit_kerja'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nip'] . "'] = 
		{NAMA:'" . addslashes($row['nip']) . 
		"',nama:'".addslashes($row['nama']).
		"',jabatan:'".addslashes($row['jabatan']).
		"',unit_kerja:'".addslashes($row['unit_kerja']).
		"',pangkat:'".addslashes($row['pangkat']).
		"',gol:'".addslashes($row['golongan']).
		
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
		  
      <div class="form-group">
           <label for="message-text" class="control-label">Status</label>		            
                 <select name="status" class="form-control" >
                    <option value="" selected disabled>Pilih Status Pimpinan</option>
                            <option value="Kepala Pusat Pendidikan dan Pelatihan">Pejabat</option>
                            <option value="Plh.Kepala Pusat Pendidikan dan Pelatihan">Pelaksana Harian</option>
                         
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
			<div class="col-md-8">
            
			   <label>Sumber Dana</label>
			   <select name="sumber_dana" class="form-control" required >
					<option value="" selected disabled>Pilih Sumber Dana</option>
				<?php 
				include "koneksi.php";
				$result = mysql_query("select * from sumber_dana");		
				while ($row = mysql_fetch_array($result)) {    
				echo '<option value="'.$row['no'].'">'.$row['sumber_dana'].'</option>';         
				}      
				?>    		
				</select>
			</div>        
	   </div>                                 
    </div>
			
       <p>
  <a class="btn btn-danger shadow p-2 mb-4 rounded" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
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

<!--End Input Moda --> 

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
	$sumber_dana=$_POST['sumber_dana'];
	
			
			$input = mysqli_query($link,"INSERT INTO `sertifikat`.`spt_pimpinan` SET 
											nama ='$nama', 
											nip='$nip', 
											pangkat ='$pangkat',
											gol ='$gol',
											jab ='$jab',
											unit_kerja = '$unit_kerja',
											kegiatan = '$kegiatan',
											tgl_spt_new = '$tgl_spt_new',
											status = '$status',
											akun = '$akun',
											akun1 ='$akun1',
											akun2 ='$akun2',
											mak='$mak',
											kom='$kom',
											sub_kom='$sub_kom',
											sumber_dana = '$sumber_dana'
											");
			
			if($input>0) {				
				echo "<script>alert('data berhasil di Input');
 			window.location='index2a.php?data=kegiatan_pusdiklat';</script>";		
			}
			else {
			echo "<script>alert('data Gagal di Input');
 			window.location='index2a.php?data=kegiatan_pusdiklat';</script>";					
			}			;	
	};
?>
  <p>      
  
  

  <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
                <tr>
                       	<th rowspan="2" width="2%">No.</th>                        
                        <th rowspan="2" width="460px">kegiatan</th>
                        <th rowspan="2" width="80px" style="text-align:center">Tanggal</th>                      
						<th rowspan="2" style="text-align:center">Pimpinan</th>						
                        <th colspan="3" style="text-align:center">Aksi</th>                        
                </tr>

				<tr>
					<th>Nominatif</th>
					<th>Edit</th>
					<th>hapus</th>                        
				</tr>
                </thead>
         <tbody>
            <?php
			require 'koneksi.php';			
			$no=1;
			$getKegiatan = $_GET['idx'];			
		    $query = "SELECT * FROM spt_pimpinan ORDER BY no desc ";
			//$link = mysqli_connect('localhost', 'root', 'P@ssw0rdbmkg2020', 'sertifikat');
			
            $hasil = mysqli_query($link, $query);   
			
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
                    <td><a href="<?php echo "index2a.php?data=prosesreg1&idx=".$row['no']; ?>"><?php echo  $row['kegiatan']; ?></a></td>
                  <td><?php echo $row['tgl_spt_new'] ?></td>
                    
					<td><?php echo $row['nama'] ?> </td>
                  
					<td align="center"><a href="javascript:void(0);"
					onclick="window.open('laporan-php-html2pdf/report_spt.php?getKegiatan=<?php echo $row['no_peserta']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">  <i class="fas fa-print fa-2x"></i></a>
					</td>
					<td>
					
		
					
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $row['no']; ?>"><i class="fas fa-edit fa-1x"></i></button>
<!--
					<a href="<?php echo "index2a.php?data=proseseditpeserta&idx=".$row['no']."&idk=".$getKegiatan; ?>"><i class="fas fa-edit fa-2x"></i></a>-->
					</td>
					
					<td><a href="<?php echo "index2a.php?data=hapus_peserta&idx=".$row['no']; ?>"><i class="fas fa-eraser fa-2x" onclick="return deleteconfig()"></i></a>
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
<?php
$koneksi = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
$sql      = mysqli_query($koneksi, "SELECT * FROM spt_pimpinan1 ");	
while ($r = mysqli_fetch_array($sql)) {
	
?> 

<div class="modal fade bd-example-modal-lg1<?php echo $r['no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
				 <div class="modal-body">
					<form action="index2a.php?data=edit_kegiatan" method="POST">
					
				   <input type="hidden" name="idx"  value="<?php echo $r['no']; ?>" class="form-control" readonly>
					  <div class="form-group">
						<label for="message-text" class="col-form-label">Kegiatan:</label>
						<textarea class="form-control" name="kegiatan" id="message-text"><?php echo $r['kegiatan'] ?></textarea>
					  </div>
					  
					  <div class="form-group">
					 <label for="recipient-name" class="col-form-label">Pimpinan</label>
					<select name="nip" class="form-control" id="nip" style="width:100%" onchange="changeValue2('<?php echo $r['no']; ?>', this.value)" >
					<?php 
					include "koneksi_136.php";	
										$result = mysql_query("select * from user
									WHERE nip=196202251985031001 or nip=197203221995032001 or nip=198401242006041002 or nip=198510292008122001");
							   
					$jsArray = "var dtMhs = new Array();\n";        
					 while ($row = mysql_fetch_array($result)) {    
						$selected = $r['nip'] ==  $row['nip'] ? ' selected' : '' ;
					   echo '<option value="' . $row['nip'] . '"'.$selected.'>' . $row['nama'] . ' / ' . $row['unit_kerja'] . '</option>';   
						$jsArray .= "dtMhs['" . $row['nip'] . "'] = 
						{NAMA:'" . addslashes($row['nip']) . 
						"',nama:'".addslashes($row['nama']).
						"',jabatan:'".addslashes($row['jabatan']).
						"',unit_kerja:'".addslashes($row['unit_kerja']).
						"',pangkat:'".addslashes($row['pangkat']).
						"',gol:'".addslashes($row['golongan']).
						
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
		 
		 <div class="form-group">
           <label for="message-text" class="control-label">Status</label>		            
                 <select name="status" class="form-control" >
                            <option value="Kepala Pusat Pendidikan dan Pelatihan" 
							<?php echo $r['status'] == "Kepala Pusat Pendidikan dan Pelatihan" ? " selected" : "" ?>
							>Pejabat</option>
                            <option value="Plh.Kepala Pusat Pendidikan dan Pelatihan" 
							<?php echo $r['status'] == "Plh.Kepala Pusat Pendidikan dan Pelatihan" ? " selected" : "" ?>
							>Pelaksana Harian</option>
                         
                    </select>
		</div>
		<div class="form-group" style="width:25%">
		    <label>Tgl SPT</label>
            <div class="input-daterange input-group datepicker" id="datepicker">
				<input type="text" class="input-sm form-control" id="tgl_spt<?php echo $r['no'] ?>" value="<?php echo $r['tgl_spt'] ?>"  name="tgl_spt_new" required />		 
			</div>
		</div>
		
		<div class="form-group">  
			<div class="row">      
				<div class="col-md-8">
				<label>Sumber Dana</label>
					<select name="sumber_dana" class="form-control" >
					  <option value="<?php echo $r['no_sumberdana'] ?>"><?php echo $r['sumber_dana'] ?></option>
						
						<?php
							include "koneksi.php"; 						
							$result = mysql_query("select * from sumber_dana");		          
							while ($row = mysql_fetch_array($result)) {    
							echo '<option value="'.$row['no'].'">'.$row['sumber_dana'].'</option>';         
						}      
						?>    		
					</select>
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
<?php } ?>
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
<?php
$koneksi = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
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
<?php };
			?>

		

		
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
		

</div>