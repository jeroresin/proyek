<?php 
	session_start();
	include ("koneksi.php");
	if(!isset($_SESSION['LEVEL_ADMIN'])){
		header("Location: loginadmin.php");
	}
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WELCOME Admin</title>
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
		   if($_SESSION['LEVEL_ADMIN']== "admin"){
			    echo '
				 <a class="navbar-brand" href="#">Halaman Admin</a>
			   <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu Admin <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">edit profil</a></li>
                <li><a href="tambah-barang.php">tambah barang</a></li>
                <li><a href="totalpenjualan.php">total penjualan</a></li>
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

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
	  <script src="selectdosen.js"></script>
	  <h1>Data Penjualan</h1>
        <table class="table table-bordered table-hover">
		<tr align="center">
		<td align="center">No.</td>
		<td align="center">Username pembeli</td>
		<td align="center">Total Penjualan</td>
		
		
		</tr>
		Keterangan: Username yang telah Lunas
		<br/>
		
        <?php
		
	$no=1;
	$queryselecttransaksi="select USERNAME_PEMBELI,sum(TOTAL_BELANJA) from tabel_chart where status='lunas' group by USERNAME_PEMBELI";
	$resultquery=mysqli_query($koneksi,$queryselecttransaksi);
	while($row=mysqli_fetch_array($resultquery,MYSQLI_ASSOC)){
				echo"<tr align='center'>";
				echo"<td>".$no."</td>";
				echo"<td>". $row['USERNAME_PEMBELI'] . "</td>";
				echo"<td>". $row['sum(TOTAL_BELANJA)'] . "</td>";
				
				

				$no++;
			}
			?>
		
		</table>
		 <div id="txtHint"></div>
      </div>
  </body>
</html>
