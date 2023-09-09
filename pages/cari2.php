<!doctype html>
<html>
<?php 

if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda telah habis.. silahkan login kembali...');
 			window.location='page_login.php';</script>";
}else {
/*error_reporting(0);*/
?>
    <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="js/dataTables/dataTables.bootstrap.css"/>
    </head>
    <body>
        
		
		
<div id="content-wrapper" class="d-flex flex-column">		
 <div id="content">
  <div class="container-fluid">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Pencarian </h6>
            </div>
            <div class="card-body">
			 <?php
            include "koneksi.php";
        ?>
			<form action="index2a.php?data=cari2" method="post" name="postform" >
			<table  border='0' cellpadding='0' class='table'>

	</div>
	  <tr>
    <td>Nama</td>
    
    <td><input type="text" name="nama_peserta"  class="form-control" placeholder="nama pegawai" ></td>
  </tr> 
	
 <tr>
    <td>Tanggal </td>
    
    <td><div class="input-daterange input-group" id="datepicker">
        	<input type="text" class="input-sm form-control" autocomplete="off" id="tgl_awal" name="tgl_pergi_new" placeholder="Awal Kegiatan" required  />
        	<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        	<input type="text" class="input-sm form-control" id="tgl_akhir" name="tgl_pulang_new"  placeholder="Akhir Kegiatan" autocomplete="off" required />
            </div></td>
  </tr>
  <tr>
    <td>Unit Kerja</td>
    
    <td><input type="text" name="unit_kerja_peserta"  class="form-control" placeholder="Unit kerja" ></td>
  </tr> 
   <tr>  
    <td></td>
    
    <td><button name="pencarian" type="submit" value="pencarian" class="shadow p-2 mb-4 rounded btn btn-success">Search...</button></td>
  </tr> 


</table>
</form>
 <p>
               <?php
            //proses jika sudah klik tombol pencarian data
            if(isset($_POST['pencarian'])){
            //menangkap nilai form
            $tgl_pergi_new=$_POST['tgl_pergi_new'];
            $tgl_pulang_new=$_POST['tgl_pulang_new'];
			$unit_kerja_peserta=$_POST['unit_kerja_peserta']; 
			$nama_peserta=$_POST['nama_peserta'];
			//$kategori_diklat=$_POST['kategori_diklat'];
            if(empty($tgl_pergi_new) || empty($tgl_pulang_new)){
            //jika data tanggal kosong
            ?>
            <script language="JavaScript">
                alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                document.location='index2a.php?data=cari2';
            </script>
            <?php
            }else{  
            ?>
            <?php
            $query=mysqli_query($koneksi,"select * from data_spt2 where tgl_pergi_new between '$tgl_pergi_new' AND '$tgl_pulang_new'   AND nama_peserta  LIKE '%$nama_peserta%' AND unit_kerja_peserta  LIKE '%$unit_kerja_peserta%' ORDER BY no_peserta DESC  ");
            }
        ?>
		
		<table id="tabel" class="table table-bordered">
                <thead>
                
                <tr>
                       	<th width="2%">No.</th>                		
                		<th width="16%">No. SPT </th>
						<th width="25%" >Nama </th>
                		<th width="45%">Kegiatan</th>
                		<th >Tujuan</th>                		
						<th width="15%" >Tgl Kegiatan</th>
						<th width="10%" >SPT</th>
                 
               </tr>

                   
                </thead>
                <tbody>
                    <?php
            //menampilkan pencarian data
			$no=1;
            while($r=mysqli_fetch_array($query)){
            ?>

                    <tr align='left'>
                       <td><?php echo $no ?>.</td>
                    	
                    	<td><?php echo $r['no_urut'] ?>/SPT/<?php echo $r['bulan_rom'] ?>/<?php echo $r['tahun1'] ?></td>
						<td><?php echo $r['nama_peserta'] ?></td>
                    	<td><?php echo $r['kegiatan'] ?></td>
                    	<td><?php echo $r['lokasi'] ?></td>                    	
						<td><?php echo $r['tgl4'] ?> <?php echo $r['tahun1'] ?></td>
						<td align="center">
						
						<?php 
						if ($r['status_ttd'] == 1 ) { ?> 
						<a href="javascript:void(0);"
						onclick="window.open('../sertifikat/signed/<?php echo $r['file_ttd']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">						
						<i class="fas fa-print fa-2x"></i></a>  <?php			
						
						} 
						else {echo "belum ditandatangani";};

						?>	
						
						<!--<a href="javascript:void(0);"
					onclick="window.open('laporan-php-html2pdf/report_spt.php?getKegiatan=<?php echo $r['no_peserta']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">  <i class="fas fa-print fa-2x"></i></a>-->
					</td>
                    </tr>
                    <?php
                    $no++;
                    }
			}
                    ?>
                </tbody>
            </table>  
			</div>
			</div></div></div>
			
			<hr>
            

       

  
  
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
        <script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/dataTables/jquery.dataTables.js"></script>
        <script src="js/dataTables/dataTables.bootstrap.js"></script>
        
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
    </body>
	<?php }; ?>
</html>