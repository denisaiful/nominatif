

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Kegiatan</h6>
            </div>
            <div class="card-body">
			
			
			
	
	
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
                   <input type="text" class="form-control" id="datepicker">   
		  </div>
		  
        </form>
      </div>
				</div>
			  </div>
			</div>

			
            
            </div>
  


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>



    <!-- Custom scripts for all pages-->
   
	
	        <script type="text/javascript">
		
            $('#datepicker').datepicker({
                    format: "dd-mm-yyyy",
                    language: "id",
					autoclose:true,
					todayHighlight: true,
					clearBtn: true
                 });
        </script>    




