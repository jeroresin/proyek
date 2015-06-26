<?php 
	session_start();
	
	if(!isset($_SESSION['LEVEL'])){
		header("Location: login.php");
	}
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil User</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
           <?php
		   	include ("koneksi.php");
			$queryselectuser="SELECT * FROM tabel_user";
			$resultquery=mysqli_query($koneksi,$queryselectuser);
			$row=mysqli_fetch_array($resultquery,MYSQLI_ASSOC);
			
		   if($_SESSION['LEVEL']== "member"){
			   echo "
			     <a class='navbar-brand' href='index.php'>Halaman Member</a>
			   <li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>Menu Utama User<span class='caret'></span></a>
              <ul class='dropdown-menu' role='menu'>
                <li><a href='film.php'>Tambah Transaksi</a></li>
                <li><a href='edit-profil.php?id_user=$_SESSION[USERNAME_PEMBELI]'>Edit Profil</a></li>
                
              </ul>
              
            </li>
			   ";
		   } 
           
			?>
          </ul>
		 <div class="btn-group navbar-form pull-right">
			<a class="btn btn-primary" href="#"><i class="icon-user icon-white"></i><?php echo $_SESSION['NAMA'];?></a> 
			<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
			</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Transaksi Anda</h1> Segera Lunasi Transaksi yang Belum Lunas
		<script>
		function delet(ID_CHART,NAMA_BARANG){
		tanya = confirm("Yakin delete dengan nama: "+NAMA_BARANG);
		if(tanya == 1){
        window.location.href="delete-transaksi.php?id_chart="+ID_CHART;
			}
		}
		</script>
		<table class="table table-bordered table-hover">
		<tr align="center">
		<td align="center">No.</td>
		<td align="center">id transaksi</td>
		<td align="center">nama barang</td>
		<td align="center">total belanja</td>
		<td align="center">Status</td>
		<td align="center">tanggal</td>
		<td align="center">Link Download</td>
		<td align="center">Batalkan</td>
		<?php
		$user= $_SESSION['NAMA'];
	$no=1;
	$queryselecttransaksi="select A.ID_CHART,B.NAMA,c.NAMA_BARANG,TOTAL_BELANJA,STATUS,TANGGAL_ORDER FROM tabel_chart A, tabel_user B,tabel_barang c where A.USERNAME_PEMBELI=B.USERNAME_PEMBELI and C.ID_Barang=A.ID_BARANG and B.NAMA='$user' order by ID_CHART";
	$resultquery=mysqli_query($koneksi,$queryselecttransaksi);
	
	while($row=mysqli_fetch_array($resultquery,MYSQLI_ASSOC)){
				echo"<tr align='center'>";
				echo"<td>".$no."</td>";
				echo"<td>". $row['ID_CHART'] . "</td>";
				echo"<td>". $row['NAMA_BARANG'] . "</td>";
				echo"<td>". $row['TOTAL_BELANJA'] . "</td>";
				echo"<td>". $row['STATUS'] . "</td>";
				echo"<td>". $row['TANGGAL_ORDER'] . "</td>";
				if($row['STATUS']=='lunas'){
					echo "<td><a href='download.php?id_chart=$row[ID_CHART]'>Download</a></td>";
				}
				else{
					echo "<td>Lakukan Pelunasan</td>";
				}
				if($row['STATUS']=='lunas'){
					echo "<td></td>";
				}
				else{
					echo "<td><a href=\"javascript: delet('".$row['ID_CHART']."','".$row['NAMA_BARANG']."')\"><img src='icon_modul_5/delete.png'style='width:30px;height:30px'/></a></td>";
				}
				
				

				$no++;
			}
			?>
		
		
		
		</tr>
      </div>
	  </div>
  </body>
</html>
