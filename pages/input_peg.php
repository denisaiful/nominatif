<?php 

if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda sudah habis... silahkan login kembali');
 			window.location='index.php';</script>";
}else {
/*error_reporting(0);*/
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
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
	$view = mysqli_query($koneksi,"select *,(SELECT COUNT(no_peserta) FROM `spt_peserta` WHERE kegiatan_peserta=$idx) AS jumlah,
(case(substr(`spt_pimpinan`.`tgl_spt_new`, 6, 2 )) 
	WHEN 1 THEN
	'Januari' 
	WHEN 2 THEN
	'Februari' 
	WHEN 3 THEN
	'Maret' 
	WHEN 4 THEN
	'April' 
	WHEN 5 THEN
	'Mei' 
	WHEN 6 THEN
	'Juni' 
	WHEN 7 THEN
	'Juli' 
	WHEN 8 THEN
	'Agustus' 
	WHEN 9 THEN
	'September' 
	WHEN 10 THEN
	'Oktober' 
	WHEN 11 THEN
	'November' 
	WHEN 12 THEN
	'Desember' ELSE '' 
END 
	) AS bln_nama,
	substr( `spt_pimpinan`.`tgl_spt_new`, 1,4 ) AS `tahun`,
	substr( `spt_pimpinan`.`tgl_spt_new`, 9,9 ) AS `tanggal`


	from spt_pimpinan where no=$idx");
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
    
    <td>$dt_view[nama]</td>
  </tr>
  <tr>
    <td>NIP</td>
    
    <td>$dt_view[nip]</td>
  </tr>
  
  <tr>
    <td>Jabatan</td>
    
    <td>$dt_view[jab]</td>
  </tr>
  
  <tr>
    <td>Jumlah Peserta</td>
    
    <td>$dt_view[jumlah] Orang</td>
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

<button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target="#myModal">Tambah Pegawai</button>



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
			      	
    <input type="text" id="nip_pegawai" name="nip_pegawai" size="50" class="form-control" readonly>
    <input type="text" id="nama" name="nama_peserta" size="50" class="form-control" readonly>
	<input type="text" id="pangkat" name="pangkat_peserta" size="50"  class="form-control" readonly >
	<input type="text" id="tempat_lahir" name="tempatlahir" size="50"  class="form-control" readonly >
	<input type="text" id="tanggallahir" name="tanggallahir" size="50" class="form-control" readonly> 
	<input type="text" id="gol" name="gol_peserta" size="50"  class="form-control" readonly >

    <input type="text" id="jabatan" name="jabatan_peserta"  size="50"  class="form-control" readonly >
    <input type="text" id="unit_kerja" name="unit_kerja_peserta" size="50"  class="form-control" readonly >    	
	  
	
		<div class="form-group">           	
		<label for="message-text" class="control-label">Nama</label>       
        <select name="nip_peserta" class="js-example-basic-multiple"  multiple="multiple" id="nip" placeholder="Cari Nama Peserta..." style="width:100%">
        <option value="0">-Pilih Nama-</option>  
        <?php 
		

    	include "koneksi_136.php";
		$result = mysqli_query($link,"select *, if(UNITKERJA LIKE '%mutu%','Bidang Perencanaan, Pengembangan dan Penjaminan Mutu Pusdiklat',if(UNITKERJA LIKE '%penyelenggaraan%','Bidang penyelenggaran Pusdiklat',UNITKERJA)) AS unitkerja from pegawai_all
 ");		
   
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
		"',tanggallahir:'".addslashes($row['TGLLAHIR']).
		"',tempat_lahir:'".addslashes($row['TEMPATLAHIR']).
		
		"'};\n";    
    }      
    ?>      
        </select>
	   </div>	   
		   
	  
	    
	   <!--<div class="form-group">           	
		<input type="text"  name="nama_peserta"  size="50"  class="form-control" placeholder="Lokasi Asal" required>
	   </div>
			
        <div class="form-group">           		
       		<input type="text"  name="nip_peserta"  size="50"  class="form-control" placeholder="Lokasi Kegiatan" required>
        </div>-->
		<div class="row">
        <div class="col-md-3">
        <label for="message-text" class="control-label">Lama Hari</label>
            <input type="text" name="lama"  class="form-control" placeholder="(hari)" required>
        </div>		                              
		</div>
        <div class="form-group ">    		
    		<div class="input-daterange input-group" id="datepicker">
        	<input type="text" class="input-sm form-control" autocomplete="off" id="tgl_awal" name="tgl_pergi_new" placeholder="Awal Kegiatan" required  />
        	<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        	<input type="text" class="input-sm form-control" id="tgl_akhir" name="tgl_pulang_new"  placeholder="Akhir Kegiatan" autocomplete="off" required />
            </div>
            </div>
	<div class="form-group ">
    		<div class="input-daterange input-group" id="datepicker">
				<input type="text" class="input-sm form-control" autocomplete="off" id="tgl_kuitansi" name="tgl_kuitansi_new" placeholder="Tgl_kuitansi" required />
        	</div>
            </div>

    
 
                      
		<!-- End Validation Forms -->
        	
                                    
			        
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


if(isset($_POST['save']))
{ 
    
	
	
	$tgl_pergi_new = $_POST['tgl_pergi_new'];
	$tgl_pulang_new = $_POST['tgl_pulang_new'];	
	$tgl_kuitansi_new=$_POST['tgl_kuitansi_new'];
	$lama=$_POST['lama'];
	
	$nama_peserta = $_POST['nama_peserta'];
	$nama_peserta = addslashes($nama_peserta);
	$namaArr = explode("|", $nama_peserta);
	
	$tempat_lahir =$_POST['tempatlahir'];
	$tempat_lahirArr = explode("|", $tempat_lahir);
	
	$tanggallahir =$_POST['tanggallahir'];
	$tanggallahirArr = explode("|", $tanggallahir);

	$nip_peserta =$_POST['nip_pegawai'];
	$nipArr = explode("|", $nip_peserta);

	$pangkat_peserta =$_POST['pangkat_peserta'];
	$pangkatArr = explode("|", $pangkat_peserta);

	$gol_peserta =$_POST['gol_peserta'];
	$golArr = explode("|", $gol_peserta);

	$jabatan_peserta =$_POST['jabatan_peserta'];
	$jabatanArr = explode("|", $jabatan_peserta);

	$unit_kerja_peserta=$_POST['unit_kerja_peserta'];
	$unit_kerja_peserta = addslashes($unit_kerja_peserta);
	$unit_kerjaArr = explode("|", $unit_kerja_peserta);  
	
$allInput = 0; 
	for($i=0; $i<count($nipArr); $i++) {
		
				$query = "INSERT INTO `spt_peserta2` (
						`no_peserta`,
						`nama_peserta`, 
						`nip_peserta`,						
						`tgl_pergi_new`,
						`tgl_pulang_new`,
						`tgl_kuitansi_new`,
						`lama`,						 
						`pangkat_peserta`, 
						`gol_peserta`, 
						`jabatan_peserta`, 
						`unit_kerja_peserta`
						) 

						VALUES 
						(NULL,						
						'$namaArr[$i]', 
						'$nipArr[$i]', 
						'$tgl_pergi_new',
						'$tgl_pulang_new',
						'$tgl_kuitansi_new',
						'$lama',						
						'$pangkatArr[$i]', 
						'$golArr[$i]', 
						'$jabatanArr[$i]', 
						'$unit_kerjaArr[$i]'
						)";
				$input = mysqli_query($koneksi,$query);
				
				//$no_urut +=1;
				$allInput += $input;  
				
			
			
			if($allInput>0) {
				/*echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>".$namaArr[$i]."</strong> Berhasil diinput.
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					  </button>
					</div>";*/
				echo "<script>alert('data berhasil di Input');
 			window.location='index2a.php?data=input_peg&idx=$idx';</script>";
				
			}
			else {
				echo "<script>alert('data GAGAL di Input');
 			window.location='index2a.php?data=input_peg&idx=$idx';</script>";
			}
} } ;
				
?>
  <p>      
  
  

  <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
                <tr>
                       	<th rowspan="2" width="2%">No.</th>                        
                        <th rowspan="2" width="130px">Nomor SPT</th>
                        <th rowspan="2" width="220px" style="text-align:center">Nama</th>
                        <th rowspan="2" width="220px" style="text-align:center">Tujuan</th>
                        <th rowspan="2" style="text-align:center">Tgl Pergi</th>
                        <th rowspan="2" style="text-align:center">Tgl Kembali</th>
						<th rowspan="2" style="text-align:center">Tgl Kuitansi</th>
						<th rowspan="2" style="text-align:center">Lama </th>
                        <th colspan="4" style="text-align:center">Aksi</th>                        
                    </tr>

                    <tr>
						<th>Kuitansi</th>
                        <th>SPT</th>
                        <th>Update</th>
						<th>hapus</th>
                        
                    </tr>
                </thead>
         <tbody>
            <?php
			require 'koneksi.php';			
			$no=1;
			$getKegiatan = $_GET['idx'];			
		    $query = "SELECT *,
			 substr(tgl_pergi_new,9,2) AS tgl_pergi,
			 (case substr(`spt_peserta2`.`tgl_pergi_new`,6,2) when 1 
			then 'Januari' when 2 
			then 'Februari' when 3 
			then 'Maret' when 4 
			then 'April' when 5 
			then 'Mei' when 6 
			then 'Juni' when 7 
			then 'Juli' when 8 
			then 'Agustus' when 9 
			then 'September' when 10 
			then 'Oktober' when 11 
			then 'November' when 12 
			then 'Desember' else '' end) 
			AS `bulan_pergi`, 
			substr(tgl_pergi_new,1,4) AS tahun_pergi,
			substr(tgl_pulang_new,9,2) AS tgl_kembali,
 (case substr(`spt_peserta2`.`tgl_pulang_new`,6,2) when 1 
then 'Januari' when 2 
then 'Februari' when 3 
then 'Maret' when 4 
then 'April' when 5 
then 'Mei' when 6 
then 'Juni' when 7 
then 'Juli' when 8 
then 'Agustus' when 9 
then 'September' when 10 
then 'Oktober' when 11 
then 'November' when 12 
then 'Desember' else '' end) 
AS `bulan_kembali`, 
substr(tgl_pulang_new,1,4) AS tahun_kembali,

substr(tgl_kuitansi_new,9,2) AS tgl_kuitansi,
 (case substr(`spt_peserta2`.`tgl_kuitansi_new`,6,2) when 1 
then 'Januari' when 2 
then 'Februari' when 3 
then 'Maret' when 4 
then 'April' when 5 
then 'Mei' when 6 
then 'Juni' when 7 
then 'Juli' when 8 
then 'Agustus' when 9 
then 'September' when 10 
then 'Oktober' when 11 
then 'November' when 12 
then 'Desember' else '' end) 
AS `bulan_kuitansi`, 
substr(tgl_kuitansi_new,1,4) AS tahun_kuitansi

			FROM spt_peserta2 ORDER BY no_peserta desc ";
		
			
            $hasil = mysqli_query($koneksi, $query);   
			
		
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
                    <td><?php echo $row['no_peserta'] ?></td>
                  <?php echo "<td style='font-size:$fontsize'>" ?><?php echo $row['nama_peserta'] ?></td>                    
                    <td><?php echo $row['nip_peserta'] ?></td>
					<td><?php echo $row['tgl_pergi'] ?> <?php echo $row['bulan_pergi'] ?> <?php echo $row['tahun_pergi'] ?></td>
					<td><?php echo $row['tgl_kembali'] ?> <?php echo $row['bulan_kembali'] ?> <?php echo $row['tahun_kembali'] ?></td>
					<td><?php echo $row['tgl_kuitansi'] ?> <?php echo $row['bulan_kuitansi'] ?> <?php echo $row['tahun_kuitansi'] ?></td>
                    <td><?php echo $row['lama'] ?> Hari</td>
					<td valign="middle" align="center">

					<a href="javascript:void(0);"
							onclick="window.open('laporan-php-html2pdf/kuitansi.php?getKegiatan=<?php echo $row['no_peserta']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">
						<i class="fas fa-print fa-2x"></i>
					</a>
						</td>
					<td align="center"><a href="javascript:void(0);"
					onclick="window.open('laporan-php-html2pdf/report_spt.php?getKegiatan=<?php echo $row['no_peserta']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">  <i class="fas fa-print fa-2x"></i></a>
					</td>
					<td><a href="<?php echo "index2a.php?data=proseseditpeserta&idx=".$row['no_peserta']."&idk=".$getKegiatan; ?>"><i class="fas fa-edit fa-2x"></i></a>
					</td>
					
					<td><a href="<?php echo "index2a.php?data=hapus_peserta&idx=".$row['no_peserta']; ?>"><i class="fas fa-eraser fa-2x" onclick="return deleteconfig()"></i></a>
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