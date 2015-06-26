<html>
<body>
<form method="post" enctype="multipart/form-data">
			Pilih Gambar:
			<input type="file" name="namafile"/>
			<input type="submit" value="Upload" name="submit"/>
		</form>
		<?php 
		$target_dir = "picfilm/";
		$target_file = $target_dir . basename($_FILES["namafile"]["name"]);
			if(isset($_POST["submit"])){
				
				
				move_uploaded_file($_FILES['namafile']['tmp_name'],$target_file);//code tambahan
				echo "<img src='$target_file' width='100px' height='100px'/>";
			}
		?>
		</body>
		</html>