<!-- Tajuk page -->
<title>Album detail</title>
<?php
#Memulakan fungsi session dan memasukkan fail connection dan header
session_start();
include ("header.php");
include ("connection.php");

#Menggambil id_album dari fail index.php apabila pengguna menekan sesuatu album 
$n = $_GET['productId'];
#melakukan query untuk mencari id_album yang berada di jadual album, dan menunjukkannya.
$sql = "SELECT * FROM album WHERE kod_album = $n";
$result = mysqli_query($condb, $sql);

while($row = mysqli_fetch_array($result))
{
  #memaparkan output hasil query
    echo "
    <div style='margin: 10px;'>
    <div style='display: flex; flex-direction: row; align-items: center;'>
    <button style='background-color: white; border-radius: 50px; width: 600px; height: 300px; border: 2px solid black;'>
    <img style='width: 50%;' src='img/".$row['gambar']."'>
</button>
     <div style='margin-left: 20px; margin-top:10px;'>
     <b>{$row['nama_album']}</b><br>
     <b>Artist:</b> {$row['artis']}<br>
     <b>Price: RM</b> {$row['harga']}<br>
     <b>Stock at Our shop:</b> {$row['stock']}<br>
     <b>Description:</b><br>
     <span style='margin-bottom: 10px;'>{$row['ciri']}</span><br>
     <form action='pembeli-pilih.php'>
     <input type='submit' value='Compare' style=' background-color: #FFFFFF; border: 2px solid black; color: black; padding: 16px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin-left: auto; cursor: pointer; font-family: Arial, sans-serif; font-weight: bold;'>
</form>
</div> 
</div>";

}

mysqli_close($condb);
#memasukkan fail footer.php

include ("footer.php");
?>
<!-- mencantikkan tab-->
<style>
.container {
  display: flex;
  flex-direction: row;
  justify-content: left;
  align-items: left;
  flex-wrap: wrap;
  max-width: 1200px; /* Change this value to adjust the width */
  margin: 10px auto; /* Centers the container horizontally */
}

.product-container {
  margin-left: 250px; /* Adjust this value based on the width of your side nav */
}
</style>