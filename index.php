<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM barang "); // using mysqli_query instead
?>

<html>
    <head>	
        <title>Homepage</title>
        <link href="./style.css" rel="stylesheet">
    </head>

    <body>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="#">Point of Sales</a>
            <a href="#">Laporan</a>
        </div>
        <a href="add.html">Add New Data</a><br/><br/>

        <table width='100%' border="2">
            <tr>
                <td>No</td>
                <td>Nama Barang</td>
                <td>Stok</td>
                <td>Harga</td>
                <td>Action</td>
            </tr>
            <?php 
            $i = 1;
            //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
            while($res = mysqli_fetch_array($result)) { 		
                echo "<tr>";
                echo "<td>".$i++."</td>";
                echo "<td>".$res['nama_barang']."</td>";
                echo "<td>".$res['stok']."</td>";
                echo "<td>".$res['harga']."</td>";	
                echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>