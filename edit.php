<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$nama_barang = mysqli_real_escape_string($mysqli, $_POST['nama_barang']);
	$stok = mysqli_real_escape_string($mysqli, $_POST['stok']);
	$harga = mysqli_real_escape_string($mysqli, $_POST['harga']);	
	
	// checking empty fields
	if(empty($nama_barang) || empty($harga) || empty($stok)) {	
			
		if(empty($nama_barang)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($harga)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($stok)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE barang SET nama_barang='$nama_barang',stok='$stok',harga='$harga' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM barang WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nama_barang = $res['nama_barang'];
	$stok = $res['stok'];
	$harga = $res['harga'];
}
?>
<html>
<head>	
	<title>Edit Data Barang</title>
    <link href="./style.css" rel="stylesheet">
</head>

<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="#">Point of Sales</a>
        <a href="#">Laporan</a>
    </div>
	
	<form name="form-edit-barang" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nama Barang</td>
				<td><input type="text" name="nama_barang" value="<?php echo $nama_barang;?>"></td>
			</tr>
			<tr> 
				<td>Stok</td>
				<td><input type="number" name="stok" value="<?php echo $stok;?>"></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input type="number" name="harga" value="<?php echo $harga;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>