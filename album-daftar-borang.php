<?php
#memulakan fungsi session
session_start();

#memanggil fail header.php
include('header.php');
include('connection.php');
include('guard-pembeli-staf.php');
?>
<!-- tajuk antaramuka -->
<title>Album Registration</title> <div style="text-align: center;">
 <h3> Register new album </h3> </div>
   <!--Borang pendaftaran barang baru-->
   <div style="display: flex; justify-content: center;"> 
  
    <form action= 'album-daftar-proses.php' method='POST'
    enctype='multipart/form-data'>
    
    <div style="position: relative; width: 200px; height: 200px;">
  <button type='button' style='position: absolute; top: 0; left: -65; width: 100%; height: 100%; background-color: white; color: white; border: 2px solid black; border-radius: 50px; display: flex; flex-direction: column; align-items: center;'></button>
  <button type='button' style='position: absolute; top: 80; left: -35; width: 70%; height: 20%; font-size:14px; background-color: #01579f; color: white; border:none; border-radius: 50px; display: flex; flex-direction: column; align-items: center; font-family: "Arial Black";'> Upload your image here.</button>
  <input type='file' name='gambar' style='position: absolute; top: 80; left: 150; width: 50%; height: 50%; opacity: 0; cursor: pointer;' accept="img/*">

</div>
    Album name : <input type ='text' name='album' required> <br>
    Artist name : <input  type='text' name='artis' required><br>
    Price : <input type='text' name= 'Price' required> <br>
    Information : <input type='text' name='detail' required><br>
    Quantity : <input type='text' name='quantity' required><br>
    Version code : <select name='kod_jenis'   style=' background-color: #FFFFFF; border: 2px solid black; 
color: black; padding: 5px 10px;  text-decoration: none; 
display: inline-block; font-size: 12px; margin-left: auto; cursor: pointer; 
font-family: Arial, sans-serif; font-weight: bold;' required>
                  <option selected disabled>Please choose your version</option>

<?php
$sql_jenama = "select * from jenis order by nama_jenis";
$laksana_carian = mysqli_query($condb,$sql_jenama);
while($m=mysqli_fetch_array($laksana_carian))
{
echo "<option value='".$m['kod_jenis']."'>".$m['nama_jenis']."</option>";
}

?>
</select> <br>
    <a href='jenis-album-borang.php'>More details</a><br>
    <input type='submit' value='Add' style=' background-color: #FFFFFF; border: 2px solid black; color: black; padding: 16px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin-left: auto; cursor: pointer; font-family: Arial, sans-serif; font-weight: bold;'>
    </div>
</form> 
    </div>

<?php include('footer.php'); ?>
