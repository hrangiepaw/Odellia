<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=odellia', 'root', '');

// Query the database for the album history for this staff member
$stmt = $pdo->prepare('SELECT * FROM album WHERE id_staff = :id_staff');
$stmt->execute(['id_staff' => $_SESSION['User_Id']]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class='product-container'>
<?php foreach ($products as $product): ?>
  <div class='product-item'>
    <button type='button' style='width: 200px; height: 200px;  background-color: white; color: black; border: 2px solid black; border-radius: 50px; display: flex; flex-direction: column; align-items: center;font-family: Arial,sans-serif;'>
      <img src='img/<?= $product['gambar'] ?>' alt='<?= $product['nama_album'] ?>' style='width: 100px; height: 100px; border-radius: 50%;'>
      <div style='margin-top: 10px; font-size: 18px; font-weight: bold;'><?= $product['nama_album'] ?></div>
      <div style='margin-top: 5px; font-size: 14px;'><?= $product['artis'] ?></div>
      <div style='margin-top: 5px; font-size: 16px;'>RM<?= $product['harga'] ?></div>
    </button>
  </div>
<?php endforeach; ?>
</div>

<style>
  .product-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    margin: 20px auto;
    max-width: 1000px;
  }

  .product-container .product-item {
    margin: 10px;
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



