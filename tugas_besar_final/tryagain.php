<?php
session_start();
include ("koneksi.php");
?>
<!DOctype Html>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron">
       <a class= "btn" href="tambah-transaksi.php"><h1>Beli Sekarang?</h1></a>
	
		
</div>
        <?php
		
	$no=1;
	$queryselecttransaksi="select * from tabel_barang";
	$resultquery=mysqli_query($koneksi,$queryselecttransaksi);
	while($row=mysqli_fetch_array($resultquery,MYSQLI_ASSOC)){
				
				
				echo"<div class='col-xs-6 col-md-3'>
    <a href='beli.php?id_barang=$row[ID_BARANG]' class='thumbnail'>
      <img src='picfilm/$row[GAMBAR].jpg' >
	 ".$row['NAMA_BARANG']."
    </a>
	
  </div>";
				
			
				

				
			}
			?>
		
		
      </div>
</body>
</html>
