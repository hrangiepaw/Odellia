<title> Update Album</title>
<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header
include('header.php');
include('connection.php');
include('guard-pembeli-staf.php');

# Menyemak kewujudan data GET, jika data GET empty, buka fail senarai-barang
if(empty($_GET)){
    die("<script>window.location.href='senarai-album.php';</script>");
}
?><div style="text-align: center;">
<h3> Update Album's data </h3>
<!-- menghiaskan borang mengggunakan css -->
<style>
    input[type="submit"] {
      background-color: #FFFFFF; 
      border: none; 
      color: black; 
      padding: 16px 32px; 
      text-align: center; 
      text-decoration: none; 
      display: inline-block; 
      font-size: 16px; 
      margin: auto ; 
      font-family: Arial Black,sans-serif;
    }
  </style>
<!--
    Borang yang akan digunakan untuk menukar maklumat barang.
    Pada setiap input pengguna akan diumpukkan  kepada value
    yang akan diambil dari data GET yang telah dihantar dari 
    fail senarai-album.php
-->
<div style="display: flex; justify-content: center;">
<form action='album-kemaskini-proses.php?kod_album_lama=<?=$_GET['kod_album']?>' method="POST"> 

<div style="position: relative; width: 200px; height: 200px;">
<button type='button' style='position: absolute; top: 0; left: -75; border:2px solid black; width: 100%; height: 100%; background-color: white; color: white; border-radius: 50px; display: flex; flex-direction: column; align-items: center;'></button>
  <button type='button' style='position: absolute; top: 80; left: -45; width: 70%; height: 20%; background-color: #01579f; color: white; border:none; border-radius: 50px; display: flex; flex-direction: column; align-items: center; font-size:12px; font-family: "Arial Black";'> Upload your image here.</button>
  <input type='file' name='gambar' style='position: absolute; top: 80; left: 65; width: 50%; height: 50%; opacity: 0; cursor: pointer;' accept="img/*">
</div>
 Album name :<input type= 'text' name='nama_album' value='<?=$_GET['nama_album']?>'required><br>
 Description:
<textarea name="ciri" style="width: 80%; height: 150px; background-color: #FFFFFF; border: 2px solid black; 
color: black; padding: 5px 10px; text-align: center; text-decoration: none; 
display: inline-block; font-size: 12px; margin-left: auto; cursor: pointer; 
font-family: Arial, sans-serif; font-weight: bold;'" required><?=$_GET['ciri']?></textarea> <br>


Price : <input type= 'text' name='harga' value='<?=$_GET['harga']?>'required><br>

<input type='submit' value='Update' style=' background-color: #FFFFFF; border: 2px solid black; color: black; padding: 16px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin-top: 10px; margin-left: auto; cursor: pointer; font-family: Arial, sans-serif; font-weight: bold;'>
</div>
</form>
  </div>
<?php include('footer.php');?>