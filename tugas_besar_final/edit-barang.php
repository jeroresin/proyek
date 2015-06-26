<?php 
	include ("koneksi.php");
	$id_barang=$_GET['id_barang'];
	session_start();
	if(!isset($_SESSION['LEVEL_ADMIN'])){
		header("Location: loginadmin.php");
	}
	
	?>
<!DOCTYPE html>
<html>	
	<head>
		<title>Form Edit Data Barang</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="metro.min.css" media="screen">
	</head>
	<body>
	
		<form method="post" class="form-search" enctype="multipart/form-data">
		<?php	
			$queryselectbarang="select * from tabel_barang where ID_BARANG='$id_barang';";
			$resultbarang= mysqli_query($koneksi,$queryselectbarang);
			$row = mysqli_fetch_array($resultbarang, MYSQLI_ASSOC);
			
			if(mysqli_num_rows($resultbarang)== 0){
				echo '<center><h2><font color="red">Data Barang tidak ditemukan</font></h2></center>';
			}else {	
			
			?>
		<h3> Form Edit Data</h3>
		<table class="table table-hover">
			<tr>
				<td>Id barang</td>
				<td>:</td>
				<td><input type="text" name="idbarang"  value="<?php echo $row['ID_BARANG'] ?>" /></td>
				</tr>
				<tr>
				<td>Judul</td>
				<td>:</td>
				<td><input type="text" name="namabarang" value="<?php echo $row['NAMA_BARANG'] ?>"/></td>
				</tr>
				<tr>
				<td>Harga</td>
				<td>:</td>
				<td><input type="number" name="harga" value="<?php echo $row['HARGA_BARANG'] ?>" /></td>
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
				<td><input type="file" name="namafile" value="<?php echo $row['GAMBAR']?>"> </td>
				</tr>
				<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td> <textarea name="deskripsi" value="<?php echo $row['DESKRIPSI']?>"> </textarea></td>
				</tr>
					
								
				<tr>
					<td colspan=3 align="center"><input type="submit" name="submit" class="btn"> <a class="btn" href="admin.php">Back</a> </td>	
						
					</tr>
			</table>
		</form>	
		
		<?php
			}
			
			if(isset($_POST['submit'])){
				$target_dir = "picfilm/";
			$target_file = $target_dir . basename($_FILES["namafile"]["name"]);
				$idbarang=$_POST['idbarang'];
				$namabarang=$_POST['namabarang'];
				$harga=$_POST['harga'];
				$kategori=$_POST['kategori'];
				$gambar=$_FILES['namafile']['name'];
				$deskripsi=$_POST['deskripsi'];
				move_uploaded_file($_FILES['namafile']['tmp_name'],$target_file);
				$queryupdatebarang="update tabel_barang set NAMA_BARANG='$namabarang',HARGA_BARANG=$harga,KATEGORI='$kategori',GAMBAR='$gambar',DESKRIPSI='$deskripsi'
				where ID_BARANG='$idbarang'" ;
			if(mysqli_query($koneksi,$queryupdatebarang)){
				echo "Data has been update Succesfully";
				header ("Location: admin.php");
			}
			else{
				echo "Error". $queryupdatebarang . "<br/>". mysqli_error($koneksi);
			}
			mysqli_close($koneksi);
			}
		?>
	</body>
</html>