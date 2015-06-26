<?php 
	session_start();
	include ("koneksi.php");
	if(!isset($_SESSION['LEVEL_ADMIN'])){
		header("Location: loginadmin.php");
	}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Data transaksi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WELCOME Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="metro.min.css" media="screen">
<body>

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
		   if($_SESSION['LEVEL_ADMIN']== "admin"){
			    echo '
				 <a class="navbar-brand" href="admin.php">Halaman Admin</a>
			   <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu Admin <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">edit profil</a></li>
                <li><a href="tambah-barang.php">tambah barang</a></li>
                <li><a href="totalpenjualan.php">Total Belanja</a></li>
              </ul>
              
            </li>
			 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Data User <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="data-transaksi.php">Data Transaksi</a></li>
                
              </ul>
              
            </li>
			   ';
		   } 
            
			?>
          </ul>
		 <div class="btn-group navbar-form pull-right">
			<a class="btn btn-primary" href="#"><i class="icon-user icon-white"></i>ADMIN <?php echo $_SESSION['USERNAME_ADMIN'];?></a> 
			<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
			</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="container theme-showcase" role="main">
	 <div class="jumbotron">
	<h1>Daftar Nama transaksi:</h1>
	
	
	<table class="table table-bordered">
		<tr align="center">
		<td align="center">No.</td>
		<td align="center">id chart</td>
		<td align="center">Username Pembeli</td>
		<td align="center">Nama Barang</td>
		<td align="center">Usename Admin</td>
		<td align="center">Total Belanja</td>
		<td align="center">Status</td>
		<td align="center">Tanggal</td>
		
		
		<td colspan="2" align="center">Action</td>
		</tr>
	<?php
	$no=1;
	$queryselecttransaksi="sELECT I.ID_CHART,A.USERNAME_PEMBELI,B.USERNAME_ADMIN,C.NAMA_BARANG, TOTAL_BELANJA,STATUS,TANGGAL_ORDER FROM tabel_chart I,tabel_user A,tabel_admin B,tabel_barang C 
	where A.USERNAME_PEMBELI=I.USERNAME_PEMBELI AND B.USERNAME_ADMIN=I.USERNAME_ADMIN AND C.ID_BARANG=I.ID_BARANG order by TANGGAL_ORDER desc";
	$resultquery=mysqli_query($koneksi,$queryselecttransaksi);
	while($row=mysqli_fetch_array($resultquery,MYSQLI_ASSOC)){
				echo"<tr align='center'>";
				echo"<td>".$no."</td>";
				echo"<td>". $row['ID_CHART'] . "</td>";
				echo"<td>". $row['USERNAME_PEMBELI'] . "</td>";
				echo"<td>". $row['NAMA_BARANG'] . "</td>";
				echo"<td>". $row['USERNAME_ADMIN'] . "</td>";
				echo"<td>". $row['TOTAL_BELANJA'] . "</td>";
				echo"<td>". $row['STATUS'] . "</td>";
				echo"<td>". $row['TANGGAL_ORDER'] . "</td>";
				
				
				echo "<td><a href='edit-transaksi.php?id_chart=$row[ID_CHART]'><img src='icon_modul_5/edit.png'style='width:30px;height:30px'/></a></td> </tr>";
				$no++;
			}
	
	?>
	</tr>
	</table>
	</div>
	</div>
	</body>
	</html>

		