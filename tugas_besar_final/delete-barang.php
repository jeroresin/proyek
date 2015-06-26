<?php 
	include ("koneksi.php");
	$id_barang=$_GET['id_barang'];
	$queryupdatebarang="delete from tabel_barang where ID_BARANG='$id_barang'";
			if(mysqli_query($koneksi,$queryupdatebarang)){
				echo "Data has been delete succesfully";
				header ("Location:admin.php");
			}
			else{
				echo "Error". $queryupdatebarang . "<br/>" .mysqli_error($koneksi);
			}
			mysqli_close($koneksi);
	?>
