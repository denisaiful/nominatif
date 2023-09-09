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
       
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="js/dataTables/dataTables.bootstrap.css"/>
    </head>
    <body>
        
		
		
<div id="content-wrapper" class="d-flex flex-column">		
 <div id="content">
  <div class="container-fluid">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Hasil Pencarian </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
        	
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

                    //Data mentah yang ditampilkan ke tabel    
                    include "koneksi.php";
                    $sql = mysqli_query($koneksi,"SELECT * FROM data_spt2 where nama_peserta like'%$_POST[key]%' OR nip_peserta like'%$_POST[key]%' OR tahun1 like'%$_POST[key]%' OR lokasi like'%$_POST[key]%' OR kegiatan like'%$_POST[key]%' order by no_peserta desc");
                    $no = 1;
                    while ($r = mysqli_fetch_array($sql)) {
						
					$bilangan=$r['no_urut']; // Nilai Proses
					$no_urut = sprintf("%05d", $bilangan);
                   // $id_keg = $r['id_keg'];
                    ?>

                    <tr align='left'>
                       <td><?php echo $no ?>.</td>
                    	
                    	<td><?php echo $no_urut ?>/SPT/<?php echo $r['bulan_rom'] ?>/<?php echo $r['tahun1'] ?></td>
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
                    ?>
                </tbody>
            </table>  
			</div>
			</div>
			</div></div></div>
			
			<hr>
            

       

  
  
  
        
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/dataTables/jquery.dataTables.js"></script>
        <script src="js/dataTables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#tabel").dataTable({
				 "pagingType": "full_numbers"});
				 
            });
        </script>
    </body>
	<?php }; ?>
</html>