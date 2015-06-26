<?php 
session_start();
	
	if(!isset($_SESSION['LEVEL'])){
		header("Location: login.php");
	}
	include ("koneksi.php");
	$id_user=$_GET['id_user'];
	
	?>
<!DOCTYPE html>
<html>	
	<head>
		<title>Form Edit Data Profil</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
                <li><a href='tambah-transaksi.php'>Tambah Transaksi</a></li>
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

		<form method="post" class="form-search">
		<?php	
			$queryselectfilm="select * from tabel_user where USERNAME_PEMBELI='$id_user';";
			$resultfilm= mysqli_query($koneksi,$queryselectfilm);
			$row = mysqli_fetch_array($resultfilm, MYSQLI_ASSOC);
			
			if(mysqli_num_rows($resultfilm)== 0){
				echo '<center><h2><font color="red">Data  tidak ditemukan</font></h2></center>';
			}else {	
			
			?>
		<h3> Form Edit Data</h3>
		<table class="table hovered">
			<tr>
				<td>USERNAME</td>
				<td>:</td>
				<td><input type="text" name="username" value="<?php echo $row['USERNAME_PEMBELI'] ?>" /></td>
				</tr>
				<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?php echo $row['NAMA'] ?>"/></td>
				</tr>
				<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="Password" name="password" value="<?php echo $row['PASSWORD'] ?>"/></td>
				</tr>
				<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat" value="<?php echo $row['ALAMAT'] ?>" /></td>
				</tr>
				<tr >
				<td>No HP</td>
				<td>:</td>
				<td>
					<input type ="text" name="nohp" value="<?php echo $row['NO_HP'] ?>" />
					</td>
				</tr>
				
				<tr>
					<td colspan=3 align="center"><input type="submit" name="submit" class="btn"> <a class="btn"
href="welcome.php">Back</a>  </td>					
					</tr>
					
			</table>
		</form>	
		
		<?php
			}
			if(isset($_POST['submit'])){
				$username=$_POST['username'];
				$password= md5($_POST['password']);
				$nama=$_POST['nama'];
				$alamat=$_POST['alamat'];
				$nohp=$_POST['nohp'];
				
				
				$queryupdateuser="update tabel_user set USERNAME_PEMBELI='$username',NAMA='$nama',PASSWORD='$password',ALAMAT='$alamat',NO_HP='$nohp'
				where USERNAME_PEMBELI='$username'" ;
			if(mysqli_query($koneksi,$queryupdateuser)){
				echo "Data has been update Succesfully";
				header ("Location: welcome.php");
			}
			else{
				echo "Error". $queryupdateuser . "<br/>". mysqli_error($koneksi);
			}
			mysqli_close($koneksi);
			}
		?>
	</body>
</html>