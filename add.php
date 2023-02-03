<html>
<head>
	<title>Add Data Barang</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$nama_barang = mysqli_real_escape_string($mysqli, $_POST['nama_barang']);
	$stok = mysqli_real_escape_string($mysqli, $_POST['stok']);
	$harga = mysqli_real_escape_string($mysqli, $_POST['harga']);
		
    // Validation form
	if(empty($nama_barang) || empty($stok) || empty($harga)) {
				
		if(empty($nama_barang)) {
			echo "<font color='red'>Nama Barang field is empty.</font><br/>";
		}
		
		if(empty($stok)) {
			echo "<font color='red'>Stok field is empty.</font><br/>";
		}
		
		if(empty($harga)) {
			echo "<font color='red'>Harga field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO barang(nama_barang,stok,harga) VALUES('$nama_barang','$stok','$harga')");
		
        if ($result) {
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: index.php?alert=2');
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: index.php?alert=1');
        }
	}
}
?>
</body>
</html>