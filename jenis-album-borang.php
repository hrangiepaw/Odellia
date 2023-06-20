<?php
#memulakan fungsi session
session_start();

#memanggil fail header.php
include('guard-pembeli-staf.php');
include('header.php');
?>
 <!-- Tajuk antaramuka -->
 <title>Register album</title>
 <div style="text-align: center;">
 <h3> Detailed Registration for new album </h3>
 <div style="display: flex; justify-content: center;"> 
  <!-- Borang pendaftaran jenis baru-->
 
  <form action="jenis-album-proses.php" method="POST"> 
   Version code : <input type='text' name='kod_jenis' required><br>
   Version name : <input type='text' name='nama_jenis' required><br> 
   <div style='margin:10px;'>
   <input type='submit' value='Register' style=' background-color: #FFFFFF; border: 2px solid black; color: black; padding: 16px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin-left: auto; cursor: pointer; font-family: Arial, sans-serif; font-weight: bold;'>
    </div>


</div>
 </div>
</form>
<?php include('footer.php');?>