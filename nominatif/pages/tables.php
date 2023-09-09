
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	


  

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Kegiatan</h6>
            </div>
            <div class="card-body">
			
			
			
	
	<!-- Large modal -->
			<button type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Kegiatan</button>

			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			  
				<div class="modal-content">
				<div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
				 <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
		   <div class="form-group">
		    <label>Date of Birth:</label>
            <div class="input-daterange input-group" id="datepicker">
          <input type="text" class="input-sm form-control" id="tgl_awal" name="tgl_awal_keg" placeholder="Awal Kegiatan" required />
		   <span class="input-group-addon"> s/d</span>
		  <input type="text" class="input-sm form-control" name="tgl_akhir_keg" id="tgl_akhir" placeholder="Akhir Kegiatan" required/>
         </div>
		  </div>
		  
        </form>
      </div>
				</div>
			  </div>
			</div>

			
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kegiatan</th>
                      <th>Evaluasi Penyelenggaraan</th>
                      <th>Evaluasi Pengajar</th>
                     
                    </tr>
                  </thead>                 
				  
                  <tbody>
				  <?php
					$koneksi = mysqli_connect("localhost", "root", "", "sertifikat");
					$sql      = mysqli_query($koneksi, "SELECT * FROM spt_pimpinan1 ");				
					$no = 1;
					while ($r = mysqli_fetch_array($sql)) {
					?>
                    <tr>
                      <td><?php echo  $no; ?></td>
                      <td><?php echo  $r['kegiatan']; ?></td>
                      <td><?php echo  $r['tgl_spt']; ?></td>
                      <td><?php echo  $r['nama']; ?></td>
                     
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                  </tbody>
				  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Kegiatan</th>
                      <th>Evaluasi Penyelenggaraan</th>
                      <th>Evaluasi Pengajar</th>                      
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

            </div>
      </div>
      <!-- End of Main Content -->

  <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
 

  <!-- Logout Modal-->
  

  <!-- Bootstrap core JavaScript-->
  
  <!-- Core plugin JavaScript-->
  
  <!-- Custom scripts for all pages-->
  
<!-- 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>-->


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>



    <!-- Custom scripts for all pages-->
   
	
	        <script type="text/javascript">
		var f=jQuery.noConflict();
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
        </script>    

<script type="text/javascript">
var f=jQuery.noConflict(); 
f(document).ready(function() {
    f('#example').DataTable();
} );
</script>	



