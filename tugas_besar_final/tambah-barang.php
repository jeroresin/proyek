<?php 
session_start();
	
	if(!isset($_SESSION['LEVEL_ADMIN'])){
		header("Location: loginadmin.php");
	}
include("koneksi.php");
mysql_connect("localhost","root","");
mysql_select_db("tugas_besar");
//Fungsi autonumber
function autonumber($tabel, $kolom, $lebar=0, $awalan='')
{
	$query="select $kolom from $tabel order by $kolom desc limit 1";
	$hasil=mysql_query($query);
	$jumlahrecord = mysql_num_rows($hasil);
	if($jumlahrecord == 0)
		$nomor=1;
	else
	{
		$row=mysql_fetch_array($hasil);
		$nomor=intval(substr($row[0],strlen($awalan)))+1;
	}
	if($lebar>0)
		$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
	else
		$angka = $awalan.$nomor;
	return $angka;
}


?>
<!DOCTYPE html>

<html>
	<head>
	
		<title>Form Tambah Data Barang</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		
	</head>
	<body>
	<script src="selectharga.js"></script>
	
	<h2>Tambah Data Barang</h2>
		<form method="post" enctype="multipart/form-data">
			<table class="table table-stripped">
			<tr>
				<td>ID Barang</td>
				<td>:</td>
				<td><input type="text" name="idbarang" value="<?=autonumber("tabel_barang","ID_barang",3,"fil")?>" ></td>
				</tr>
		
				
				<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" name="namabarang">
	   </td>
				</tr>
				<tr>
				<td>Harga Barang</td>
				<td>:</td>
				<td><input type="number" name="harga"></td>
				</tr>
				<tr>
				<td>Kategori</td>
				<td>:</td>
				<td><select name="kategori">
				<option value="Action">Action</option>
				<option value="Petualangan">Petualangan</option>
				<option value="Horror">Horror</option>
				<option value="Romance">Romance</option>
				<option value="Komedi">Komedi</option>
				</tr>
				<tr>
				<td>Photo</td>
				<td>:</td>
				<td><input type="file" name="namafile"/></td>
				</tr>
				<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td> <textarea name="deskripsi"> </textarea></td>
				</tr>
				
				<tr>
					<td colspan=3 align="center"><input type="submit" name="submit"> </td>					
					</tr>
			</table>
		</form>

		<a href="admin.php"> lihat data </a><br/> 
		<?php 
		$target_dir = "picfilm/";
		$target_file = $target_dir . basename($_FILES["namafile"]["name"]);
			if(isset($_POST['submit'])){
				$idbarang=$_POST['idbarang'];
				$namabarang=$_POST['namabarang'];
				$harga=$_POST['harga'];
				$kategori=$_POST['kategori'];
				$gambar=$_FILES['namafile']['name'];
				$deskripsi=$_POST['deskripsi'];
				move_uploaded_file($_FILES['namafile']['tmp_name'],$target_file);
				
				$queryinserttransaksi= "INSERT INTO `tugas_besar`.`tabel_barang` (`ID_BARANG`, `NAMA_BARANG`, `HARGA_BARANG`, `KATEGORI`,`GAMBAR`,`DESKRIPSI`) VALUES 
				('$idbarang', '$namabarang', '$harga', '$kategori','$gambar','$deskripsi');";
				if(mysqli_query($koneksi,$queryinserttransaksi)){
					echo "New record created succesfully ";		
					header ("Location:admin.php");
				} else {
					echo "Error: ". $queryinserttransaksi . "<br>" . mysqli_error($koneksi);
				}
				
				mysqli_close($koneksi);
			}
			
			?>
	</body>
</html>
				