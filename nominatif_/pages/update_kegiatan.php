<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	
<div class="container-fluid">

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Update Data Kegiatan</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive"> 
<?php
include "koneksi.php";
$idx= $_GET['idx'];

//view
if(isset($_GET['idx'])) {
	$view = mysql_query("select * from spt_pimpinan1 where no=$idx");
	//$dt_view = mysql_fetch_array($view);
	while($dt_view = mysql_fetch_array($view)){
	?>
	   <form action="#" method="post" class="form-horizontal"> 
	   
	   <div class="form-group">
    <label class='col-sm-2 control-label'>Kegiatan</label>
    <div class="col-sm-6">
	<textarea class="form-control" name="kegiatan" id="message-text"><?php echo $dt_view['kegiatan']?></textarea>
    </div> 
    </div>
	   
	   
	<div class="form-group">     
	 <label class="col-sm-6 control-label">Pejabat Penandatangan SPT</label>
	<div class="col-sm-6">	 
        <select name="nip" class="form-control" id="nip" style="width:100%" onchange="changeValue(this.value)" >
        <option value="<?php echo $dt_view['nip'] ?>"><?php echo $dt_view['nama'] ?> / <?php echo $dt_view['nip'] ?></option>
        <?php 
		   
   include "koneksi.php";
    //mysql_connect("202.90.199.106","diklat","diklat");    
    //mysql_select_db("mc_kepegawaianbmkg");   
	
   
		$result = mysql_query("select * from data_peg where nip = '196202251985031001' or nip = '198401242006041002' or nip = '197203221995032001' or  nip = '198510292008122001' ");
	
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysql_fetch_array($result)) {    
        echo '<option value="' . $row['nip'] . '">' . $row['namapegawai'] . ' / ' . $row['nip'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nip'] . "'] = 
		{namapegawai:'" . addslashes($row['nip']) . 
		"',nama:'".addslashes($row['namapegawai']).
		"',jabatan:'".addslashes($row['namajabatan']).
		"',unit_kerja:'".addslashes($row['namaunitkerja']).
		"',pangkat:'".addslashes($row['pangpegawai']).
		"',gol:'".addslashes($row['golpegawai']).
		
		"'};\n";    
    }      
    ?>    
        </select>
	</div> 
	</div> 
	
	<div class="form-group">
    <label class="col-sm-2 control-label">Status</label>
	
    <div class="col-sm-6">
      <select name="status"  class="form-control"  >
	  <option value="<?php echo $dt_view['status']?>"><?php echo $dt_view['status']?></option>
						<option value='Kepala Pusat Pendidikan dan Pelatihan'>Pejabat</option>
                            <option value='Plh.Kepala Pusat Pendidikan dan Pelatihan'>Pelaksana Harian</option>
						
                    
	  </select>
    </div>
	</div>

	<div class="form-group">
  
    <div class="col-sm-6">
      <input name='nama' type="hidden" id="nama" class="form-control" value="<?php echo $dt_view['nama'] ?>" required readonly>
    </div> 
    </div>
	<div class="form-group">
    
    <div class="col-sm-6">
    <input name='pangkat' type="hidden" id='pangkat' class="form-control" value="<?php echo $dt_view['pangkat'] ?>" required readonly>
    </div> 
    </div>
	<div class="form-group">
    
    <div class="col-sm-6">
    <input name="gol" type="hidden" id="gol"  class="form-control" value="<?php echo $dt_view['gol'] ?>" required readonly>
    </div> 
    </div>
	<div class="form-group">
    
    <div class="col-sm-6">
    <input name="jab" type="hidden" id="jabatan" class="form-control"  value="<?php echo $dt_view['jab'] ?>" required readonly>
    </div> 
    </div>
	<div class="form-group">
   
    <div class="col-sm-6">
    <input name="unit_kerja" type="hidden" id="unit_kerja" class="form-control" value="<?php echo $dt_view['unit_kerja']?>" required readonly>
    </div> 
    </div>
	
	<div class="form-group">
    <label class='col-sm-2 control-label'>Tanggal Kegiatan</label>
    <div class="col-sm-2">
    <div class="input-daterange input-group" id="datepicker">
    <input type='text' class='input-sm form-control' id="tgl_spt" name="tgl_spt" value="<?php echo $dt_view['tgl_spt']?>" required />
              
    </div>
    </div>
     
    </div>
 <div class="card">
  <div class="card-body">
  
  	<div class="form-group">  
		<div class="row">
        <div class="col-md-4">
            <label>Akun</label>
            <select name="akun" class="form-control">
                <option value="<?php echo $dt_view['akun']?>" ><?php echo $dt_view['akun']?></option>
                <option value="966">966</option>
                <option value="994">994</option>                         
            </select>
        </div>
        <div class="col-md-4">
            
            <label>Akun</label>
            <select name="akun1" class="form-control">
                <option value="<?php echo $dt_view['akun1']?>" ><?php echo $dt_view['akun1']?></option>
                <option value="001">001</option>
                <option value="002">002</option>                         
            </select>
        </div>
       
        <div class="col-md-4">
            
            <label>MAK</label>
            <select name="mak" class="form-control">
                <option value="<?php echo $dt_view['mak']?>"><?php echo $dt_view['mak']?></option>
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
            
            <select name="komp" class="form-control">
                <option value="<?php echo $dt_view['komp']?>"><?php echo $dt_view['komp']?></option>
                 
                <option value="051">051</option>
                <option value="052">052</option>
                <option value="053">053</option> 
                <option value="054">054</option>
				<option value="-"> - </option> 	                       
            </select>
        </div>
        <div class="col-md-4">
            
            <label>Sub Komponen</label>           
            
            <select name="sub_komp" class="form-control">
                <option value="<?php echo $dt_view['sub_komp']?>"><?php echo $dt_view['sub_komp']?></option>
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
            <label>Sumber Dana</label>              
            <select name="sumber_dana" class="form-control">
                <option value="<?php echo $dt_view['sumber_dana']?>"><?php echo $dt_view['sumber_dana']?></option>
                <?php 
		
		$result = mysql_query("select * from sumber_dana");		
  
         
    while ($row = mysql_fetch_array($result)) {    
        echo '<option value="'.$row['no'].'">'.$row['sumber_dana'].'</option>';         
    }      
    ?>    	                       
            </select>
        </div>
   </div>
    </div>                       
    
	</div>
      
	
	 
	<div class="form-group">	
    <div class="col-sm-offset-2 col-sm-10">
	
    <a href="index2a.php?data=kegiatan" class="btn btn-danger"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Cancel</a>
	<button name="update" type="submit" value="update" class="btn btn-success">Update</button>
    </div>
  </div>
	
	 
</form>

	<?php }
	?>

<?php
include "koneksi.php";
$idx= $_GET['idx'];
//proses update
if(isset($_POST['update'])) {
	$nama =$_POST['nama'];
	$nip =$_POST['nip'];
	$pangkat =$_POST['pangkat'];
	$gol =$_POST['gol'];
	$jab =$_POST['jab'];
	$unit_kerja =$_POST['unit_kerja'];
	$kegiatan =$_POST['kegiatan'];
	$tgl_spt =$_POST['tgl_spt'];
	$status =$_POST['status'];
	$akun =$_POST['akun'];
  	$akun1 =$_POST['akun1'];
  	$mak =$_POST['mak'];
	$komp =$_POST['komp'];
	$sub_komp =$_POST['sub_komp'];
	$sumber_dana =$_POST['sumber_dana'];
	
	
	$update = mysql_query("update spt_pimpinan SET 
											nama ='$nama', 
											nip='$nip', 
											pangkat ='$pangkat' ,
											gol = '$gol',
											jab = '$jab',
											unit_kerja = '$unit_kerja',
											kegiatan = '$kegiatan',
											tgl_spt = '$tgl_spt',
											status = '$status',
											akun ='$akun',
											akun1 ='$akun1',
											mak = '$mak',
											komp = '$komp',
											sub_komp = '$sub_komp',
											sumber_dana = '$sumber_dana'
											WHERE no=$idx ");	
	if($update>0){
		
		echo "<script>alert('data berhasil diUpdate');
 			window.location='index2a.php?data=kegiatan';</script>";} else { echo "<script>alert('data GAGAL di Input');
 			window.location='index2a.php?data=update_kegiatan&idx=$idx';</script>";}
}

	
}
?>
</div>
</div>
</div>
</div>

        <script src="js/bootstrap.min.js"></script>
        <script src="js/dataTables/jquery.dataTables.js"></script>
        <script src="js/dataTables/dataTables.bootstrap.js"></script>
		 <script src="select2/select2.js"></script>
        <script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>      
      

	   <script type="text/javascript">
		var f=jQuery.noConflict();  
            
				 f(document).ready(function () {			
				f('#tgl_awal').datepicker({
                    format: "dd-mm-yyyy",
                    language: "id",
					autoclose:true,
					todayHighlight: true,
					clearBtn: true
                });
				 f('#tgl_akhir').datepicker({
                    format: "dd-mm-yyyy",
                    language: "id",
					autoclose:true,
					todayHighlight: true,
					clearBtn: true
                 });
				 
               
			
   });  
            
        </script>
		<script type="text/javascript" >
		var f=jQuery.noConflict();  
            f(document).ready(function () {
				f('select.select').select2(); 
            });
        </script>
		
			<script type="text/javascript" >
		var f=jQuery.noConflict();  
            f("#tabel").dataTable({
				 "pagingType": "full_numbers"});
            
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
		
		</script> 

</div>
</div>