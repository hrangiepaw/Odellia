<div class='container'>
<title> Result </title>
<?php
session_start();
include('header.php');
include('connection.php');

$tambahan = "";

# memeriksa jika terdapat carian  
if(!empty($_POST['jenis'])){
    $tambahan .= " AND album.nama_album = '".$_POST['jenis']."'";
}
  
if(!empty($_POST['harga_awal']) && !empty($_POST['harga_akhir'])){
    $tambahan .= " AND album.harga BETWEEN ".$_POST['harga_awal']." AND ".$_POST['harga_akhir']."";
}
  
if(!empty($_POST['artis'])){
    $tambahan .= " AND album.artis = '".$_POST['artis']."'";
   
}
  

# arahan sql jika query untuk memilih barang berdasarkan syarat yang ditetapkan
$sql_pilihan = "SELECT * FROM album INNER JOIN jenis ON album.kod_jenis = jenis.kod_jenis WHERE 1=1 $tambahan ORDER BY album.harga";

# Melaksanakan proses carian berdasarkan arahan sql di atas
$laksana_pilihan = mysqli_query($condb,$sql_pilihan);

# jika proses carian tidak menemui data yang sepadan 
if(mysqli_num_rows($laksana_pilihan)==0){
    # papar carian tidak ditemui
    echo "<div style='margin-left:250px;'> We don't find anything here!</div> ";
} else {
    # jika proses carian menemui data yang sepadan 
    # papar data barangan tersebut
    echo "<div class='greeting'> 
Here is the result: <br> <br> </div>
";
  ?>  <div class='product-container'>
<?php
    # pemboleh ubah $n mengambil data yang ditemui 
    while($n=mysqli_fetch_array($laksana_pilihan)){
        # dan memaparkan dalam bentuk jadual
        echo "<div style='margin: 10px;'>
        <form action='album-teliti-website.php' method='GET'>
        <button type='submit' style='width: 200px; border: 2px solid black; height: 200px; 
		background-color: white; color: black; border-radius: 50px; display: flex; 
		flex-direction: column; align-items: center;font-family: Arial,sans-serif;'> 
        <input type='hidden' name='productId' value='".$n['kod_album']."'>
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
  
    echo "</div>"; 
    
     
}include('side-nav-index.php');
?> </div> </div><br> <br> <br>
<style>
	.container {
  display: flex !important;
  flex-direction: row !important;
  justify-content: left;
  align-items: left;
  flex-wrap: wrap !important;
  max-width: 2000px; /* Change this value to adjust the width */
  margin: 10px auto; /* Centers the container horizontally */
}
   .greeting {
      text-align: left;
      margin-left: 300px;
    }   
.product-container {
    
  max-width: 1400px;
  display: flex;
  flex-wrap: wrap;
  margin-left: 300px;
}

</style>
<div style='margin-left:250px;'>
<?php
include('footer.php');
?></div>
<html>
<head>
	<style type="text/css">
		body {
			margin-left: 10px;
			padding: 0px;
		}
		.side-nav {
			position: absolute;
			top:-415px;
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