<?php 
	include ("koneksi.php");
	$id_chart=$_GET['id_chart'];
	session_start();
	
	if(!isset($_SESSION['LEVEL_ADMIN'])){
		header("Location: loginadmin.php");
	}
	?>
<!DOCTYPE html>
<html>	
	<head>
		<title>Form Edit Data Chart</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WELCOME Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</head>
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
		<form method="post" class="form-search">
		<?php	
			$queryselectchart="select * from tabel_chart where ID_CHART='$id_chart';";
			$resultchart= mysqli_query($koneksi,$queryselectchart);
			$row = mysqli_fetch_array($resultchart, MYSQLI_ASSOC);
			
			if(mysqli_num_rows($resultchart)== 0){
				echo '<center><h2><font color="red">Data  tidak ditemukan</font></h2></center>';
			}else {	
			
			?>
		<h3> Form Edit Data</h3>
		<table class="table">
			<tr>
				<td>Id chart</td>
				<td>:</td>
				<td><input type="text" name="idchart" disabled value="<?php echo $row['ID_CHART'] ?>" /></td>
				</tr>
				<tr>
				<td>Status</td>
				<td>:</td>
				<td><select name="status">
					<option value="lunas">lunas</option>
					<option value="belum lunas">Belum Lunas</option>
					</select>
				</td>
				</tr>
				
				
				
				<tr>
				<td colspan=3 ><input type="submit" name="submit" class="btn"> <a href="data-transaksi.php" class="btn btn-warning">Back</a> </td>	
					
					</tr>
			</table>
		</form>	
		
		<?php
			}
			if(isset($_POST['submit'])){
				$idchart=$_POST['idchart'];
				$status=$_POST['status'];
				
				
				$queryupdatechart="UPDATE tabel_chart SET STATUS = '$status' WHERE ID_CHART = '$id_chart';" ;
			if(mysqli_query($koneksi,$queryupdatechart)){
				echo "Data has been update Succesfully";
				header ("Location: data-transaksi.php");
			}
			else{
				echo "Error". $queryupdatechart . "<br/>". mysqli_error($koneksi);
			}
			mysqli_close($koneksi);
			}
		?>
		</div>
	</body>
</html>