<?php 
	include ("koneksi.php");
	$id_chart=$_GET['id_chart'];
	$queryupdatetransaksi="delete from tabel_chart where ID_CHART='$id_chart'";
			if(mysqli_query($koneksi,$queryupdatetransaksi)){
				echo "Data has been delete succesfully";
				header ("Location:welcome.php");
			}
			else{
				echo "Error". $queryupdatetransaksi . "<br/>" .mysqli_error($koneksi);
			}
			mysqli_close($koneksi);
	?>
