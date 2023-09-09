<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">	
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="select2/select2.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="container-fluid">

                    <!-- Page Heading -->
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
	include "koneksi.php";	
	//include "db_peg.php";
	$result = mysql_query("select * from data_peg where nip = '196202251985031001' or nip = '198401242006041002' or nip = '197203221995032001' or  nip = '198510292008122001' ");

    /* mysql_connect("36.67.176.42","diklat","diklat");    
    mysql_select_db("mc_kepegawaianbmkg");    
	
	$result = mysql_query("select mcpegawai.nip, 
				mcpegawai.nama AS namapegawai, 
				refjabatan.nama AS namajabatan, 
				mcpegawai.tempatlahir AS tempatlahir,
				mcpegawai.tanggallahir AS tanggallahir,
				refunitkerja.nama AS namaunitkerja, 
				refgolongan.golongan AS golpegawai, 
				refgolongan.pangkat AS pangpegawai 
				FROM mcpegawai INNER JOIN mcperubahan on mcpegawai.nip=mcperubahan.nip 
				inner join refjabatan ON mcperubahan.idjabatan=refjabatan.id 
				OR 
				mcperubahan.idjabatan='' 
				INNER JOIN refunitkerja ON mcpegawai.idunitkerja=refunitkerja.id 
				INNER JOIN mckepangkatan on mcpegawai.nip=mckepangkatan.nip 
				INNER JOIN (select mckepangkatan.nip, max(mckepangkatan.idgolongan) 
				as maxid from mckepangkatan group by mckepangkatan.nip) 
				AS b on (mcpegawai.nip=b.nip and mckepangkatan.idgolongan=b.maxid)
				INNER JOIN refgolongan ON mckepangkatan.idgolongan=refgolongan.id 
				WHERE idstatus=1 GROUP BY mcpegawai.nip");  */ 
   
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
          <input type="text" class="input-sm form-control" id="tgl_spt" name="tgl_spt" placeholder="Awal Kegiatan" required />		 
		 
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
	
	<div class="form-group">  
		<div class="row">
      
		<div class="col-md-8">
            
           <label>Sumber Dana</label>
           <select name="sumber_dana" class="form-control" >
                <option value="" selected disabled>Pilih Sumber Dana</option>
                <?php 
		
		$result = mysql_query("select * from sumber_dana");		
   include "koneksi.php";  
         
    while ($row = mysql_fetch_array($result)) {    
        echo '<option value="'.$row['no'].'">'.$row['sumber_dana'].'</option>';         
    }      
    ?>    		
            </select>
        </div>
        
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
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kegiatan</th>
                                            <th>Tgl Keg</th>
                                            <th>Pimpinan</th>
											<th>Nominatif</th>
											<th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kegiatan</th>
                                            <th>Tgl Keg</th>
                                            <th>Pimpinan</th>
											<th  align="center">Nominatif</th>
											<th>Action</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         <?php
										// include "koneksi.php";	
										$koneksi = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
											$sql      = mysqli_query($link, "SELECT * FROM spt_pimpinan order by no desc ");				
											$no = 1;
											while ($r = mysqli_fetch_array($sql)) {
											$getKegiatan = $r['no'];
											?>
											<tr>
											  <td><?php echo  $no; ?></td>
											  <td><a href="<?php echo "index2a.php?data=prosesreg1&idx=".$r['no']; ?>"><?php echo  $r['kegiatan']; ?></a></td>
											  <td><?php echo  $r['tgl_spt']; ?></td>
											  <td><?php echo  $r['nama']; ?></td>
											   <td  align="center">
											   
											    <a href="javascript:void(0);"
                            onclick="window.open('laporan-php-html2pdf/report3.php?getKegiatan=<?php echo $getKegiatan; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">
                            <i class="fas fa-print fa-2x"></i></a>
											</td>
											  
											  <td>
											  <a href="<?php echo "index2a.php?data=edit_kegiatan&idx=".$r['no']; ?>"	 type="button" class="btn btn-primary shadow p-2 mb-4 rounded" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $r['no']; ?>">Edit</a>
											  <!--
											  <a href="<?php echo "index2a.php?data=update_kegiatan&idx=".$r['no']; ?>"	 type="button" class="btn btn-primary shadow p-2 mb-4 rounded">update</a>-->
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
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
			<?php
			$koneksi = mysqli_connect("localhost", "root", "P@ssw0rdbmkg2020", "sertifikat");
			$sql      = mysqli_query($koneksi, "SELECT * FROM spt_pimpinan1 order by no desc ");	
			while ($r = mysqli_fetch_array($sql)) {
				
			?>
			<div class="modal fade bd-example-modal-lg<?php echo $r['no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal<?php echo $r['no']; ?>">
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
	//include "koneksi.php";	
	include "db_peg.php";
	$result = mysql_query("select * from data_peg where nip = '196202251985031001' or nip = '198401242006041002' or nip = '197203221995032001' or  nip = '198510292008122001' ");
   
   
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysql_fetch_array($result)) {    
		$selected = $r['nip'] ==  $row['nip'] ? ' selected' : '' ;
        echo '<option value="' . $row['nip'] . '"'.$selected.'>' . $row['namapegawai'] . ' / ' . $row['nip'] . '</option>';    
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
            <select name="komp" class="form-control">
               
                <option value="051" <?php echo $r['komp'] == "051" ? " selected" : "" ?>>051</option>
                <option value="052" <?php echo $r['komp'] == "052" ? " selected" : "" ?>>052</option>
                <option value="053" <?php echo $r['komp'] == "053" ? " selected" : "" ?>>053</option> 
                <option value="054" <?php echo $r['komp'] == "054" ? " selected" : "" ?>>054</option>
						
            </select>
        </div>
       
       
		<div class="col-md-4">
			<label>Sub Komponen</label>
            <select name="sub_komp" class="form-control">
                <option value="<?php echo $r['sub_komp'] ?>" selected><?php echo $r['sub_komp'] ?></option>
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
	
	<div class="form-group">  
		<div class="row">      
		<div class="col-md-8">
            
           <label>Sumber Dana</label>
           <select name="sumber_dana" class="form-control" >
                <option value="<?php echo $r['sumber_dana'] ?>"><?php echo $r['sumber_dana'] ?></option>
                <?php 
		
		$result = mysql_query("select * from sumber_dana");		
   include "koneksi.php";  
         
    while ($row = mysql_fetch_array($result)) {    
		$selected = $r['sumber_dana']==$row['sumber_dana'] ? ' selected' : '';
        echo '<option value="'.$row['no'].'"'.$selected.'>'.$row['sumber_dana'].'</option>';         
    }      
    ?>    		
            </select>
        </div>
        
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
			
			<?php
											$no++;
											}
											?>
			
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
	$kategori =$_POST['kategori'];
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
		echo "<script>alert('Input Data Salah');
 			window.location='index2a.php?data=kegiatan';</script>";
				
		}else{
			
			$input = mysql_query(" insert into spt_pimpinan value
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
			'$kategori',
			'$sumber_dana',
			'$kom',
			'$sub_kom')");
			
			if($input>0) {
				
				echo "<script>alert('data berhasil di Input');
 			window.location='index2a.php?data=kegiatan';</script>";
				
			}
			else {
				echo "<script>alert('data GAGAL di Input');
 			window.location='index2a.php?data=kegiatan';</script>";
			}
			};	
	};
?>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	
<script type="text/javascript">
var f=jQuery.noConflict(); 
f(document).ready(function() {
    f('#example').DataTable();
} );
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
