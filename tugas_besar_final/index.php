<!DOCTYPE html>
<?php 
include ("koneksi.php");
session_start();
?>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Comerce Film Download Digital</title>
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
             
			  <?php 
	
	if(!isset($_SESSION['LEVEL'])){
		echo "<li><a href='login.php'>login</a></li>";
	}
	?>
              
            </li>
			
          </ul>
		   <?php
		   
		   	include ("koneksi.php");
		   if($_SESSION['LEVEL']== "member"){
			   echo "
		  <div class='btn-group navbar-form pull-right'>
			<a class='btn btn-primary' href='welcome.php'><i class='icon-user icon-white'></i>" .$_SESSION['NAMA']. "</a> 
			<a class='btn btn-primary dropdown-toggle' data-toggle='dropdown' href='#'><span class='caret'></span></a>
			<ul class='dropdown-menu'>
			<li><a href='logout.php'><i class='icon-off'></i> Logout</a></li>
			</ul>
        </div> ";
		   }
		?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
     <h2>Daftar Film</h2>
        <?php
		
	$no=1;
	$queryselecttransaksi="select * from tabel_barang";
	$resultquery=mysqli_query($koneksi,$queryselecttransaksi);
	while($row=mysqli_fetch_array($resultquery,MYSQLI_ASSOC)){
		echo"<div class='col-xs-6 col-md-3'> <a href='beli.php?id_barang=$row[ID_BARANG]' class='thumbnail'>
				<img src='picfilm/$row[GAMBAR]' style=width:300px;height:400px;'><center>
				".$row['NAMA_BARANG']."</center>
				
					</a>
			</div>";
			
			}
			 
			?>
		</div>
      </div>
	  
  </body>
</html>
