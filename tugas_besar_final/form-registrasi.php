<!DOCTYPE html>
<html>
	<head>
		<title>Praktikum 12 Pemrograman Web</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
      
      <div class="hero-unit">
       <h2>Form Pendaftaran</h2>
	   <form class="form-horizontal" method="post">
	   <div class="control-group">
			<label class="control-label>">Username</label>
			<div class="control"><input type="text" name="username" placeholder="Username"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Password</label>
			<div class="control"><input type="password" name="password" placeholder="Password"></div>
		</div>
	   <div class="control-group">
			<label class="control-label>">Nama</label>
			<div class="control"><input type="text" name="nama" placeholder="Nama"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Alamat</label>
			<div class="control"><input type="text" name="alamat" placeholder="Alamat"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">No HP</label>
			<div class="control"><input type="text" name="nohp" placeholder="Alamat"></div>
		</div>
		
		
		
		<div class="control-group">
			<div class="control">
			<button type="submit" class="btn btn-info" name="submit">Submit</button> <a href="login.php">Login</a>
			
			</div>
		</div>
	</form>
      </div>
	
	<?php
		include("koneksi.php");
		
		if(isset($_POST['submit'])){
			$nama=$_POST['nama'];
			$alamat=$_POST['alamat'];
			$username=$_POST['username'];
			$password=md5($_POST['password']);
		$nohp=$_POST['nohp'];
		
		
			
			$sqlinsert="INSERT INTO tabel_user (`USERNAME_PEMBELI`, `NAMA`, `PASSWORD`, `ALAMAT`, `NO_HP`, `LEVEL`) VALUES ('$username', '$nama ', '$password', '$alamat', '$nohp', 'member')";
			if(mysqli_query($koneksi,$sqlinsert)){
				echo "New Record created succesfully";
				echo '<META http-equiv="refresh" content="1;URL=form-registrasi.php">';
			}
		
				else{
					echo "Error:". $sqlinsert . "<br>" . mysqli_error($koneksi);
				}
				mysqli_close($koneksi);
			
		}		
	?>
	</div> 
	<div>
      <hr>
      <footer>
        <p>Praktikum 12 Pemrograman Web &copy; 2015</p>
      </footer>
    </div>
	</body>
	
</html>
