<!DOCTYPE html>
<?php
session_start();
include('header.php');
?>
<html>
<head>
  <title>Search Results</title>
</head>
<body>
  <h1>Search Results</h1>
  <?php
  include('connection.php');

  $tambahan = "";
  if (!empty($_POST['query'])) {
    $tambahan = "WHERE nama_album LIKE '%" . $_POST['query'] . "%'";
  }

  # arahan query untuk mencari senarai nama pembeli 
  $arahan_papar = "SELECT * FROM album $tambahan";

  # laksanakan arahan mencari data pembeli 
  $laksana = mysqli_query($condb, $arahan_papar);

  if (mysqli_num_rows($laksana) > 0) {
    echo "<div class='greeting'> Here is the result : </div>";
    echo "<div class='product-container'>";
    while ($m = mysqli_fetch_array($laksana)) {
      echo "
      <form action='album-teliti-website.php' method='GET'>
        <div class='product-item'>
          <button type='submit'>
            <input type='hidden' name='productId' value='".$m['kod_album']."'>
            <img width='55%' src='img/".$m['gambar']."'> 
            <div class='product-name'>".$m['nama_album']."</div>
            <div class='artist-name'>".$m['artis']."</div>
            <div class='price'>RM".$m['harga']."</div>
          </button>
        </div>
      </form>";
    }
    echo "</div>";
  } else {
    echo "<p>No results found.</p>";
  }
  include('footer.php');
  ?>
</body>
<style>
  .product-container {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-wrap: wrap;
    margin: 20px auto;
    max-width: 1000px;
  }

  .product-container .product-item {
    margin: 10px;
    flex: 0 0 auto;
  }

  .product-container button {
    width: 200px;
    height: 200px;
    background-color: white;
    color: black;
    border: 2px solid black;
    border-radius: 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-family: Arial, sans-serif;
  }

  .product-container img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
  }

  .product-container .product-name {
    margin-top: 10px;
    font-size: 18px;
    font-weight: bold;
  }

  .product-container .artist-name {
    margin-top: 5px;
    font-size: 14px;
  }

  .product-container .price {
    margin-top: 5px;
    font-size: 16px;
  }
</style>
</html>
