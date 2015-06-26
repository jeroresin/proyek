<?php 
$q=$_GET["q"];
include ("koneksi.php");
$sql= "select HARGA_BARANG FROM tabel_barang where ID_BARANG='".$q."'";
$result= mysqli_query($koneksi,$sql);


while($row= mysqli_fetch_array($result)){
	
	echo "<input type='text' name='total' value=". $row['HARGA_BARANG'].">";
	

	}
	
?>