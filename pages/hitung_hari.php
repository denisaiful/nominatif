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

<button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="fa fa-plus" style='font-size:18px'"></i> Tanggal Cuti</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Tanggal Cuti <?php echo $_SESSION['nama']?></h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>	
	</div>
	 <div class="modal-body">
	 <form action="#" method="post">
		
            
		  
		  
		<div class="row">
        <div class="col-md-4">
			<label for="message-text" class="col-form-label">Tanggal Mulai Cuti:</label>	
             <div class="input-daterange input-group datepicker1" id="datepicker">
          <input type="text" class="input-sm form-control" id="tgl_awal" name="tgl_awal" placeholder="Tanggal Lahir"  autocomplete="off"  />		 
		 
         </div>   
        </div> 
        <div class="col-md-4">
			<label for="message-text" class="col-form-label">Tanggal Akhir Cuti:</label>	
             <div class="input-daterange input-group datepicker1" id="datepicker">
          <input type="text" class="input-sm form-control" id="tgl_akhir" name="tgl_selesai" placeholder="Tanggal Lahir"  autocomplete="off"  />		 
		 
         </div>   
        </div>                                 
		</div>
		  
		 <p>


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
//error_reporting(0);
function selisihHari($tglAwal, $tglAkhir){
    // list tanggal merah selain hari minggu
	include "koneksi.php";
	$sql      = mysqli_query($link, "SELECT * FROM hari_libur ");
	$tglLibur = Array ();
	while ($r = mysqli_fetch_array($sql)) { 
	array_push ($tglLibur,$r["hari_libur"]);
	//$tglLibur = $r["hari_libur"];
	}
    //$tglLibur = Array("2022-02-07","2022-02-08","2022-02-09");
 
    $pecah1 = explode("-", $tglAwal);
    $date1 = $pecah1[2];
    $month1 = $pecah1[1];
    $year1 = $pecah1[0];
 
    // memecah string tanggal akhir untuk mendapatkan
    // tanggal, bulan, tahun
    $pecah2 = explode("-", $tglAkhir);
    $date2 = $pecah2[2];
    $month2 = $pecah2[1];
    $year2 =  $pecah2[0];
 
    // mencari selisih hari dari tanggal awal dan akhir
    $jd1 = GregorianToJD($month1, $date1, $year1);
    $jd2 = GregorianToJD($month2, $date2, $year2);
 
    $selisih = $jd2 - $jd1;
 
    // proses menghitung tanggal merah dan hari minggu
    // di antara tanggal awal dan akhir
    for($i=1; $i<=$selisih; $i++){
        // menentukan tanggal pada hari ke-i dari tanggal awal
        $tanggal = mktime(0, 0, 0, $month1, $date1+$i, $year1);
        $tglstr = date("Y-m-d", $tanggal);
 
        // menghitung jumlah tanggal pada hari ke-i
        // yang masuk dalam daftar tanggal merah selain minggu
        if (in_array($tglstr, $tglLibur)){
           $libur1++;
        }
 
        // menghitung jumlah tanggal pada hari ke-i
        // yang merupakan hari minggu
        if ((date("N", $tanggal) == 7)){
           $libur2++;
        }
		  // menghitung jumlah tanggal pada hari ke-i
        // yang merupakan hari sabtu
        if ((date("N", $tanggal) == 6)){
           $libur3++;
        }
    }
 
    // menghitung selisih hari yang bukan tanggal merah dan hari minggu
    return $selisih-$libur1-$libur2-$libur3 + 1;
}

 
$tgl_awal = "2022-02-01"; // Setting Tanggal Mulai disini
$tgl_selesai = "2022-02-04";

 
// output -> "Selisih hari dari tanggal 2013-01-01 dan 2013-01-31 adalah: 23 hari"


include "koneksi.php"; 
if(isset($_POST['save']))
{   //$no =$_POST['no'];
	$tgl_awal =$_POST['tgl_awal'];  
	$tgl_selesai =$_POST['tgl_selesai'];
	$username = $_SESSION['username'];
	$jml = selisihHari($tgl_awal, $tgl_selesai);
	
			$input = mysql_query("insert into cuti set 
											tgl_awal ='$tgl_awal', 
											tgl_selesai='$tgl_selesai',
											username='$username',
											jml = '$jml'
											");
			
			if($input>0) {				
				echo "<script>alert('data berhasil di Input');
 			window.location='index2a.php?data=hitung_hari';</script>";		
			}
			else {
			echo "<script>alert('data Gagal di Input');
 			window.location='index2a.php?data=hitung_hari';</script>";					
			};	
		
	}; 
	
	echo "<br>Selisih hari dari tanggal ".$tgl_awal." dan ".$tgl_selesai." adalah: ".selisihHari($tgl_awal, $tgl_selesai)." hari";
	
?>


 
</div>
</div>
</div>
</div>



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