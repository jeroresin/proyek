<?php 
$id_barang=$_GET['id_barang'];
session_start();
	
	if(!isset($_SESSION['LEVEL'])){
		header("Location: login.php");
	}
include("koneksi.php");
mysql_connect("localhost","root","");
mysql_select_db("tugas_besar");
//Fungsi autonumber
function autonumber($tabel, $kolom, $lebar=0, $awalan='')
{
	$query="select $kolom from $tabel order by $kolom desc limit 1";
	$hasil=mysql_query($query);
	$jumlahrecord = mysql_num_rows($hasil);
	if($jumlahrecord == 0)
		$nomor=1;
	else
	{
		$row=mysql_fetch_array($hasil);
		$nomor=intval(substr($row[0],strlen($awalan)))+1;
	}
	if($lebar>0)
		$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
	else
		$angka = $awalan.$nomor;
	return $angka;
}


?>
<!DOCTYPE html>

<html>
	<head>
	
		<title>Form Tambah Data transaksi</title>
		<<link href="css/bootstrap.min.css" rel="stylesheet">
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
	<div class="container theme-showcase" role="main">
	<script src="selectharga.js"></script>
	
	<h2>Tambah Data transaksi</h2>
		<form method="post" class="form-search">
		<?php	
			$queryselectfilm="select *from tabel_barang where ID_BARANG='$id_barang'";
			$resultfilm= mysqli_query($koneksi,$queryselectfilm);
			$row = mysqli_fetch_array($resultfilm, MYSQLI_ASSOC);
			
			if(mysqli_num_rows($resultfilm)== 0){
				echo '<center><h2><font color="red">Data  tidak ditemukan</font></h2></center>';
			}else {	
			
			?>
		<h3> Form Edit Data</h3>
		<table class="table hovered">
			<tr>
				<td>ID transaksi</td>
				<td>:</td>
				<td><input type="text" name="idchart" readonly value="<?=autonumber("tabel_chart","ID_CHART",3,"CHART")?>" style='color:grey' ></td>
				</tr>
				<tr>
				<td>ID Barang</td>
				<td>:</td>
				<td><input type="text" name="idbarang" readonly value="<?php echo $row['ID_BARANG'] ?>" style='color:grey' /></td>
				</tr>
				<tr>
				<td>Nama </td>
				<td>:</td>
				<td><input type="text" name="namabarang" readonly value="<?php echo $row['NAMA_BARANG'] ?>" style='color:grey' /></td>
				</tr>
				<tr>
				<td>Total</td>
				<td>:</td>
				<td><input type="text" name="total" readonly value="<?php echo $row['HARGA_BARANG']?> " style='color:grey' /></div></td>
				</tr>
				<tr>
				<td>Tanggal Order</td>
				<td>:</td>
				<td><input type="text" name="tanggalorder" readonly value="<?php
				date_default_timezone_set('Asia/Jakarta');
				$tanggal= mktime(date("m"),date("d"),date("Y"));
				$tglsekarang = date("Y-m-d", $tanggal);
				echo $tglsekarang;
				?>" style='color:grey' /></td>
				</tr>
				
				
				<tr>
					<td colspan=3 align="center"><input type="submit" name="submit" class="btn"> <a class="btn"
href="welcome.php">Back</a>  </td>					
					</tr>
					
			
			</table>
		</form>	
		
		
		<a href="welcome.php"> lihat data </a><br/> 
		<?php 
			}
			if(isset($_POST['submit'])){
				$idchart=$_POST['idchart'];
				$iduser=$_SESSION['USERNAME_PEMBELI'];
				$idbarang=$_POST['idbarang'];
				$tanggal=$_POST['tanggalorder'];
				$total=$_POST['total'];
				
				
				$queryinserttransaksi= "INSERT INTO tabel_chart (`ID_CHART`, `USERNAME_PEMBELI`, `ID_BARANG`, `USERNAME_ADMIN`, `TOTAL_BELANJA`, `STATUS`, `TANGGAL_ORDER`)
				VALUES ('$idchart', '$iduser', '$idbarang', 'siro_gane', '$total', 'belum lunas', '$tanggal');";
				if(mysqli_query($koneksi,$queryinserttransaksi)){
					echo "New record created succesfully ";
					echo '<meta http-equiv="refresh" content="0; url=welcome.php">';
				} else {
					echo "Error: ". $queryinserttransaksi . "<br>" . mysqli_error($koneksi);
				}
				mysqli_close($koneksi);
			}
			
			?>
			</div>
	</body>
</html>
				