<?php 
$q=$_GET["q"];
include ("koneksi.php");
$sql= "select USERNAME_PEMBELI,sum(TOTAL_BELANJA) from tabel_chart where status='lunas' and month(TANGGAL_ORDER)='".$q."' group by USERNAME_PEMBELI";
$result= mysqli_query($koneksi,$sql);

echo "<table class='table table-bordered table-hover'>
	<thead>	
		<tr>
		<th>Username</th>
		<th>Total</th>
		</tr>
	</thead>
";
while($row= mysqli_fetch_array($result)){
	echo"<tbody><tr>";
	echo "<td>". $row['USERNAME_PEMBELI']."</td>";
	echo "<td>". $row['sum(TOTAL_BELANJA)']."</td>";
	echo"</tr></tbody>";

	}
	echo "</table>";
?>