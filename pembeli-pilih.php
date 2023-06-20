<?php
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php, dan guard-pembeli.php
include('connection.php');
include('header.php');
include('guard-pembeli-staf.php');
?>
<!--
    Memaparkan perkara yang boleh digunakan untuk membandingkan
    album samada harga,artis, jenis
-->

<div class='container'>
<title>Comparison</title>
<br> 

<?php

#arahan sql untuk memaparkan secara rawak 10 barangan yang ada dalam pangkalan data
$sql_pilihan = "
SELECT * FROM album, jenis
WHERE album.kod_jenis = jenis.kod_jenis
ORDER BY rand() limit 10";
echo" <div style='margin-left: 260px; margin-top:40px;'>
Here is some album that you can compare for : </div>";
# melaksanakan arahan sql pilihan
$laksana_pilihan = mysqli_query($condb,$sql_pilihan);

# jika tiada data yang dijumpai
if(mysqli_num_rows($laksana_pilihan)==0){

    # papar tiada barangan yang telah direkodkan
    echo "<style> body { color: black; } </style>";
    echo "There's no item has been recorded.";
    echo " body {  font-family: 'Marker Felt', sans-serif; } </style>";

}
else{;
    echo "<div class='product-container'>"; # buka div product-container
    # jika terdapat barangan yang ditemui 
    # paparkan dalam bentuk jadual
    
    

    # Pembolehubah $n mengambil data yang ditemui
   while($n=mysqli_fetch_array($laksana_pilihan)){ 
        #memaparkan semula data diambil oleh pembolehubah $n
        echo "
        <div style='margin: 10px;'>
            <form action='album-teliti-website.php' method='GET'>
                <button type='submit' style='width: 200px; border: 2px solid black; height: 200px; background-color: white; color: black; border-radius: 50px; display: flex; flex-direction: column; align-items: center;font-family: Arial,sans-serif;'> 
                    <input type='hidden' name='productId' value='".$n['kod_album']."'>
                    <img width='55%' src='img/".$n['gambar']."'> 
                    <b> ".$n['nama_jenis']." </b><br>
                    ".$n['nama_album']."<br>
                    ".$n['artis']."
                    RM".$n['harga']."
                </button>
            </form>
        </div>
        "; 
    } 
    echo "</div>"; # tutup jadual
    echo ""; # tutup div product-container
}
?></div>
<br> <br> 
<?php 
include('footer.php'); ?>
<style>
.container {
  display: flex !important;
  flex-direction: row !important;
  justify-content: left;
  align-items: left;
  flex-wrap: wrap !important;
  max-width: 1400px; /* Change this value to adjust the width */
  margin: 10px auto; /* Centers the container horizontally */
}

.product-container {
  max-width: 1400px;
  display: flex;
  flex-wrap: wrap;
  margin-left: 250px;
}
</style>
<!DOCTYPE html>

<html>
<head>
	<style type="text/css">
		body {
			margin-left: 10px;
			padding: 0px;
		}
		.side-nav {
			position: absolute;
			top:-400px;
			left: 0;
			height: 40%;
			background-color:  white;
			margin-top: 550px;
			color: #000000;
			padding: 10px;
			width: 230px; /* set the width of the side nav */
  			float: left; /* float the side nav to the left */
		}
		.side-nav input[type="text"] {
			width: 50%;
			padding: 3px;
			margin-top: 10px;
			box-sizing: border-box;
			border: 1px solid #000000;
			border-radius: 0px;
			background-color: #f8f8f8;
			font-size: 16px;
			color: #000000;
		}
		.side-nav button {
			width: 50%;
			background-color: #4CAF50;
			color: #fff;
			padding: 12px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			margin-top: 10px;
			font-size: 16px;
			
		}
		.side-nav label {
		display: flex;
		align-items: center;
		justify-content: flex-start;
		margin-right: auto;
		margin-bottom: 10px;
}

	.side-nav label input[type="checkbox"] {
	margin-right: 5px;
	}
		.side-nav button:hover {
			background-color: #45a049;
		}
		.side-nav form {
			margin-top: 20px;
			display: flex;
			flex-direction: column;
			align-items: left;
		}
		.search-box {
		display: flex;
		align-items: center;
		background-color: #e4e6e5;
		border-radius: 300px;
		padding:0px;
		}
		.search-box input[type="text"] {
		flex-grow: 1;
		border: none;
		background: none;
		font-size: 16px;
		margin-left: 10px;
		}
	.search-box::before {
	content: "";
	display: block;
	width: 20px;
	height: 20px;
	background-image: url(img/searchbar.JPG);
	background-repeat: no-repeat;
	background-size: contain;
	margin-left: 10px;
	}

	</style>
</head>
<body>
	<!-- Query untuk membandingkan album --->
	<div class="side-nav">
	<form action="pembeli-process.php" method="POST">
		<td>Compare by:</td> <br>
		<tr>
		
	
		<td>Price range from:</td>
            <td><input type='text' name='harga_awal'>
			<td>to:</td> 
			<td><input type='text' name='harga_akhir'>
        </tr>
        <tr>
			
		
		<td>Album :<input type='text' name='jenis'>
            <td>
      
            </td>
        </tr>

        <tr>
			
	
		
	<td>Artist:<input type='text' name='artis'>
            <td></td><br>
            <td><input type='submit' value='Search'></td>
        </tr>
    </table>
</form>
</div>
</body>
</form>

</html>