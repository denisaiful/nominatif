<?php    
   
$server ="localhost";
$username ="root";
$password ="";
$database ="sertifikat";
//$link = mysqli_connect('localhost', 'root', 'P@ssw0rd', 'sertifikat');
$koneksi = mysql_connect($server,$username,$password) or die ('Tidak terhubung ke server');
$db = mysql_select_db($database) or die ('database tidak ditemukan');


    // mysql_connect("192.168.100.53","diklat","diklat");    
    //mysql_select_db("mc_kepegawaianbmkg");    
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
				WHERE idstatus=1 GROUP BY mcpegawai.nip");   
?>