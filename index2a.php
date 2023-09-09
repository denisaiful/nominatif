<?php
session_start();
if (@!$_SESSION['level']==1) {
	echo"<script>alert('maaf session anda telah habis.. silahkan login kembali...');
 			window.location='page_login.php';</script>";
}else {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nominatif Online Pusdiklat</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
	

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php
		include "side_bar1.php";
		?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php
		include "top_bar1.php";
		?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                 <?php
		
		$pages_dir = 'pages';
		if(!empty($_GET['data'])){
			$pages = scandir($pages_dir, 0);
			unset($pages[0], $pages[1]);
 
			$p = $_GET['data'];  
			if(in_array($p.'.php', $pages)){
				include($pages_dir.'/'.$p.'.php');
			} else {
				include($pages_dir.'/page_not_found.php');
			}
		} elseif (@$_SESSION['level']=='1') {
			include($pages_dir.'/tables2.php'); 
			
		} elseif (@$_SESSION['level']=='2') { 
		
			include($pages_dir.'/pegawai.php');
		
		}
		elseif (@$_SESSION['level']=='7') { 
		
			include($pages_dir.'/esign.php');
		
		}
		?>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
		include "footer1.php";
		?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    </div>
	<?php } ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="js/rupiah-rp.js"></script>

		
		
		
    <!-- Custom scripts for all pages-->
		


<script type="text/javascript" >
		var f=jQuery.noConflict();  
            f(document).ready(function () {
				f('.js-example-basic-multiple').select2(); 
            }).on("select2:selecting", function(e) {
            	changeValue(e.params.args.data.id);
			});
</script>
		
	
		
		<script type="text/javascript" >
		var f=jQuery.noConflict();  
            f("#tabel").dataTable({
				 "pagingType": "full_numbers",
				 "scrollCollapse": true,});  
        </script>
	
	        <script type="text/javascript">
		var f=jQuery.noConflict();
				f('#tgl_spt').datepicker({
                    format: "yyyy-mm-dd",
                    language: "id",
					autoclose:true,
					todayHighlight: true,
					clearBtn: true
                 });

				
				 <?php
				// $koneksi = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
                include "koneksi.php";  
				$sql      = mysqli_query($koneksi, "SELECT * FROM spt_pimpinan_new ");				
				$no = 1;
				while ($r = mysqli_fetch_array($sql)) {
				?>
				  f('#tgl_spt_edit<?php echo $r['no']; ?>').datepicker({
                    format: "yyyy-mm-dd",
                    
					autoclose:true,
					todayHighlight: true,
					clearBtn: true
											}); <?php } ?>
        </script>    
		
		

</body>

</html>