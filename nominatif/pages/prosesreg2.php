<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	
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
<?php
include "koneksi.php";
$idx= $_GET['idx'];

//view
if(isset($_GET['idx'])) {
	$view = mysql_query("select * from spt_pimpinan_new where no=$idx");
	$dt_view = mysql_fetch_array($view);
	
	echo "

<table  border='0' cellpadding='4' class='table'>

	</div>
	  <tr>
    <td>Kegiatan</td>
    
    <td>$dt_view[kegiatan]</td>
  </tr> 
	
 <tr>
    <td>PIMPINAN</td>
    
    <td>$dt_view[nama]</td>
  </tr>
  <tr>
    <td>NIP</td>
    
    <td>$dt_view[nip]</td>
  </tr>
  
  <tr>
    <td>Tempat Kegiatan</td>
    
    <td>$dt_view[jab]</td>
  </tr>
  <tr>
    <td>Jumlah Peserta</td>
    
    <td>$dt_view[unit_kerja] orang</td>
  </tr>
  
  
 <tr>
    <td>Tanggal SPT</td>
    
    <td>$dt_view[tgl_spt]</td>
  </tr>  
  


</table> <p>";
	
}

//update


?>

<hr>
          <!-- Page Heading -->
         <button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Pegawai</button>
	

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>	
	</div>
	 <div class="modal-body">
	 <form action="#" method="post">
	 <?php
	 require 'koneksi.php';
		$idx= $_GET['idx'];
		$link = mysqli_connect('localhost', 'root', 'P@ssw0rdbmkg2020', 'sertifikat');
        $query = "select * from spt_pimpinan_new where no=$idx";
        $hasil = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($hasil)) {
                            ?>             
        <input value="<?php echo $row['no'] ?>"name="kegiatan_peserta" type="hidden"  class="form-control" readonly>
                           
                            <?php
                        }
                        ?>       	
       		<?php
            // ambil data dari database
			require 'koneksi.php';
			$idx= $_GET['idx'];
			$link = mysqli_connect('localhost', 'root', 'P@ssw0rdbmkg2020', 'sertifikat');
            $query = "select * from spt_pimpinan_new where no=$idx";
            $hasil = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($hasil)) {
                ?>                    
          <input value="<?php echo $row['kegiatan'] ?>"  type="hidden"  class="form-control" readonly>
            
                            <?php
                        }
                        ?>    
		
          <div class="form-group">
            <label for="message-text" class="col-form-label">Kegiatan:</label>
            <textarea class="form-control" name="kegiatan" id="message-text"></textarea>
          </div>
		  
		  <div class="form-group">
		 <label for="recipient-name" class="col-form-label">Pimpinan</label>
		<select name="nip" class="form-control" id="nip" style="width:100%" onchange="changeValue(this.value)" >
        <option value="0">-Pilih-</option>
        <?php 

	include "koneksi_sdm.php";	
	$result = mysql_query("select * from tbl_sdm_diklat
 WHERE NIP=196202251985031001 or NIP=197203221995032001 or NIP=198401242006041002 or NIP=198510292008122001");
   
    $jsArray = "var dtMhs = new Array();\n";        
     while ($row = mysql_fetch_array($result)) {    
        echo '<option value="' . $row['NIP'] . '">' . $row['NAMA'] . ' / ' . $row['NIP'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['NIP'] . "'] = 
		{NAMA:'" . addslashes($row['NIP']) . 
		"',nama:'".addslashes($row['NAMA']).
		"',jabatan:'".addslashes($row['NAMAJABATAN']).
		"',unit_kerja:'".addslashes($row['UNITKERJA']).
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
            <div class="input-daterange input-group" id="datepicker">
          <input type="text" class="input-sm form-control" id="tgl_spt" name="tgl_spt" placeholder="Awal Kegiatan" required autocomplete="off"  />		 
		 
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
                <option value="966">966</option>
                <option value="994">994</option>                         
            </select>
        </div>
        <div class="col-md-4">
            
            <label>Akun</label>
            <select name="akun1" class="form-control">
                <option value="" selected disabled>Pilih Akun</option>
                <option value="001">001</option>
                <option value="002">002</option>                         
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
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>  <tr>
                       	<th rowspan="2" width="2%">No.</th>                        
                        <th rowspan="2" width="150px">Nomor SPT</th>
                        <th rowspan="2" width="350px" style="text-align:center">Nama</th>
                        <th rowspan="2" style="text-align:center">Lokasi</th>
                        <th rowspan="2" style="text-align:center">Tgl Pergi</th>
                        <th rowspan="2" style="text-align:center">Tgl Kembali</th>
						<th rowspan="2" style="text-align:center">Tgl Kuitansi</th>
						<th rowspan="2" style="text-align:center">Lama </th>
                        <th colspan="3" style="text-align:center">Aksi</th>                        
                    </tr>

                    <tr>
						<th>Kuitansi</th>
                        <th>SPT</th>
                        <th>Edit</th>
                        
                    </tr>
                  </tfoot>
                  <tbody>
                   <?php
			require 'koneksi.php';			
			$no=1;
			$getKegiatan = $_GET['idx'];			
		    $query = "SELECT CONCAT_WS( ' / ', no_urut,
spt,(case substr(tgl_spt,4,2) 
 when 1 then 'I' 
 when 2 then 'II' 
 when 3 then 'III' 
 when 4 then 'IV' 
 when 5 then 'V' 
 when 6 then 'VI' 
 when 7 then 'VII' 
 when 8 then 'VIII' 
 when 9 then 'IX' 
 when 10 then 'X' 
 when 11 then 'XI' 
 when 12 then 'XII' else '' end), 
 substr(tgl_spt,7)  ) AS no_spt, 
 no_peserta,
 nama_peserta, 
 LENGTH(nama_peserta) as pjg,
 lama, kegiatan, 
 lokasi,
 tgl_pergi,
 tgl_pulang,
 tgl_kuitansi,
 (`spt_peserta_new`.`lama`)+(`spt_peserta_new`.`hari_hotel1`) AS `total_lama` 
 FROM spt_peserta_new INNER JOIN spt_pimpinan_new 
						ON kegiatan_peserta = no WHERE no ='$getKegiatan' ORDER BY no_peserta desc ";
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
                    <td><?php echo $row['no_spt'] ?></td>
                  <?php echo "<td style='font-size:$fontsize'>" ?><?php echo $row['nama_peserta'] ?></td>                    
                    <td><?php echo $row['lokasi'] ?></td>
					<td><?php echo $row['tgl_pergi'] ?></td>
					<td><?php echo $row['tgl_pulang'] ?></td>
					<td><?php echo $row['tgl_kuitansi'] ?></td>
                    <td><?php echo $row['lama'] ?> Hari</td>
					<td valign="middle" align="center">

					<a href="javascript:void(0);"
							onclick="window.open('report4.php?getKegiatan=<?php echo $row['no_peserta']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">
						<i class="icon-custom icon-sm rounded icon-bg-u icon-line icon-printer"></i>
					</a>
						</td>
					<td align="center"><a href="javascript:void(0);"
					onclick="window.open('report1.php?getKegiatan=<?php echo $row['no_peserta']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">  <i class="icon-custom icon-sm rounded icon-bg-u icon-line icon-printer"></i></a>
					</td>
					<td><a href="<?php echo "index3.php?data=proseseditpeserta&idx=".$row['no_peserta']; ?>"><i class="icon-custom icon-sm icon-bg-u fa fa-pencil"></i></a></td>
                        
                </tr>
                <?php
            $no++; }
			
			/* $jumlahkarakter=30;
			$cetak = substr($nama_peserta,$jumlahkarakter,1);
			if($cetak !=" "){
			while($cetak !=" "){
			$i=1;
			$jumlahkarakter=$jumlahkarakter+$i;
			
			$cetak = substr($nama_peserta,$jumlahkarakter,1);
			}
			}
			$cetak = substr($nama_peserta,0,$jumlahkarakter); */
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
			$koneksi = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
			$sql      = mysqli_query($koneksi, "SELECT * FROM spt_pimpinan_new ");	
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
					include "koneksi_sdm.php";	
										$result = mysql_query("select * from tbl_sdm_diklat
									WHERE NIP=196202251985031001 or NIP=197203221995032001 or NIP=198401242006041002 or NIP=198510292008122001");
							   
					$jsArray = "var dtMhs = new Array();\n";        
					 while ($row = mysql_fetch_array($result)) {    
						$selected = $r['nip'] ==  $row['NIP'] ? ' selected' : '' ;
					   echo '<option value="' . $row['NIP'] . '"'.$selected.'>' . $row['NAMA'] . ' / ' . $row['NIP'] . '</option>';   
						$jsArray .= "dtMhs['" . $row['NIP'] . "'] = 
						{NAMA:'" . addslashes($row['NIP']) . 
						"',nama:'".addslashes($row['NAMA']).
						"',jabatan:'".addslashes($row['NAMAJABATAN']).
						"',unit_kerja:'".addslashes($row['UNITKERJA']).
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
            <div class="input-daterange input-group" id="datepicker">
				<input type="text" class="input-sm form-control" id="tgl_spt_edit<?php echo $r['no'] ?>" value="<?php echo $r['tgl_spt'] ?>"  name="tgl_spt" required />		 
			</div>
		</div>
		
		<div class="form-group">  
			<div class="row">      
				<div class="col-md-8">
				<label>Sumber Dana</label>
					<select name="sumber_dana" class="form-control" >
					  <option value="<?php echo $r['sumber_dana'] ?>"><?php echo $r['sumber_dana'] ?></option>
						
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
                <option value="966" <?php echo $r['akun'] == "966" ? " selected" : "" ?>>966</option>
                <option value="994" <?php echo $r['akun'] == "994" ? " selected" : "" ?>>994</option>
			</select>
        </div>
        <div class="col-md-4">
            
            <label>Akun</label>
            <select name="akun1" class="form-control">               
                <option value="001" <?php echo $r['akun1'] == "001" ? " selected" : "" ?>>001</option>
                <option value="002" <?php echo $r['akun1'] == "002" ? " selected" : "" ?>>002</option>       
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
	$tgl_spt =$_POST['tgl_spt'];
	$status =$_POST['status'];
	$akun =$_POST['akun'];
	$akun1 =$_POST['akun1'];
	$mak =$_POST['mak'];
	//$kategori =$_POST['kategori'];
	$kom=$_POST['kom'];
	$sub_kom=$_POST['sub_kom'];
	$sumber_dana=$_POST['sumber_dana'];
	
	if(empty ($nama) 
		or empty($nip) 
		or empty($pangkat) 
		or empty($gol) 
		or empty($jab) 
		or empty($unit_kerja)
		or empty($kegiatan)
		or empty($tgl_spt)
		or empty($status)
		)
	{
		echo "<script>alert('Data Masih ada yang belum masuk');
 			window.location='index2a.php?data=tables2';</script>";
				
		}else{			
			$input = mysql_query(" insert into spt_pimpinan_new
 
									VALUES
									(null,
									'$nama',
									'$nip',
									'$pangkat',
									'$gol',
									'$jab',
									'$unit_kerja',
									'$kegiatan',
									'$tgl_spt',
									'$status',
									'$akun',
									'$akun1',
									'$mak',
									'$kom',
									'$sub_kom',
									'$sumber_dana')");
			
			if($input>0) {				
				echo "<script>alert('data berhasil di Input');
 			window.location='index2a.php?data=tables2';</script>";		
			}
			else {
			echo "<script>alert('data Gagal di Input');
 			window.location='index2a.php?data=tables2';</script>";					
			}
			};	
	};
?>

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