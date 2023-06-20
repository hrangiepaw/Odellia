<?php
#memulakan fungsi session
session_start();
#memasukkan fail header.php, connection.php, guard-staf.php
include('header.php');
include('connection.php');
include('guard-pembeli-staf.php');
?>
<!-- Tajuk laman sesawang -->
<title>Album List</title>
<!-- Borang untuk mencari jenama, dropdown list-->
<form action='' method='POST'>
   Browse registered album:
   <select name='jenama' style=' background-color: #FFFFFF; border: 2px solid black; 
color: black; padding: 5px 10px;  text-decoration: none; 
display: inline-block; font-size: 12px; margin-left: auto; cursor: pointer; 
font-family: Arial, sans-serif; font-weight: bold;'>
      <option selected disabled>Choose the version</option>
      <?php
      $sql_jenama = "SELECT * FROM jenis ORDER BY kod_jenis";
      $laksana_carian = mysqli_query($condb, $sql_jenama);
      while ($m = mysqli_fetch_array($laksana_carian)) {
         echo "<option value='" . $m['kod_jenis'] . "'>" . $m['nama_jenis'] . "</option>";
      }
      ?>
   </select> 
   <input type='submit' value='Show results' style=' background-color: #FFFFFF; border: 2px solid black; 
color: black; padding: 5px 10px; text-align: center; text-decoration: none; 
display: inline-block; font-size: 12px; margin-left: auto; cursor: pointer; 
font-family: Arial, sans-serif; font-weight: bold;'> 
<!-- Button cetak : untuk mencetak keputusan -->
   <button onclick="window.print()"style=' background-color: #FFFFFF; border: 2px solid black; 
color: black; padding: 5px 10px; text-align: center; text-decoration: none; 
display: inline-block; font-size: 12px; margin-left: auto; cursor: pointer; 
font-family: Arial, sans-serif; font-weight: bold;'>Print</button>
</form>
<!-- Senarai album-->
<p>List of albums that have been registered:</p>

<table border="1" id='saiz' style='background-color: white'>
   </div>

<!-- Arahan sql mencari album mengikut drop down list jenis -->
   <?php
   $tambahan = "";
   if (!empty($_POST['jenama'])) {
      $tambahan = "AND jenis.kod_jenis = '" . $_POST['jenama'] . "'";
   }

   $arahan_papar = "SELECT * FROM album, jenis, staff
                    WHERE album.kod_jenis = jenis.kod_jenis
                    AND album.id_staff = staff.id_staff
                    $tambahan
                    ORDER BY album.kod_album DESC";
# laksanakan arahan mencari data barang
   $laksana = mysqli_query($condb, $arahan_papar);
#Memaparkan output jika tiada barang yang sesuai dengan jenis-->
   if (mysqli_num_rows($laksana) <= 0) {
      echo "<br>No data found";
   }

   while ($m = mysqli_fetch_array($laksana)) {
             # umpukkan data kepada tatasusunan bagi tujuan kemaskini barang
      $data_get = array(
         'nama_album' => $m['nama_album'],
         'jenis_album' => $m['nama_jenis'],
         'harga' => $m['harga'],
         'ciri' => $m['ciri'],
         'gambar' => $m['gambar'],
         'kod_album' => $m['kod_album'],
         'artis' => $m['artis'],
         'stok' => $m['stock']
      );

# memaparkan senarai nama dalam jadual 
      echo "<tr>
               <td><img width='50%' src='img/" . $m['gambar'] . "'></td>
               <td>
                  <b>Version: " . $m['nama_jenis'] . "</b><br>
                  Album name: " . $m['nama_album'] . "<br>
                  Artist: " . $m['artis'] . "<br>
                  Price: RM " . $m['harga'] . "<br>
                  Registered by: " . $m['nama_staff'] . "<br>
                  Stock at our store: " . $m['stock'] . "
               </td>
               <td>
                  <br>
                  <a href='album-kemaskini-borang.php?" . http_build_query($data_get) . "'>Update</a> |
                  <a href='album-padam-proses.php?kod=" . $m['kod_album'] . "' onClick=\"return confirm('Do you want to erase this data?')\">Erase</a>
               </td>
            </tr>";
   }
   ?>

</table>

<?php include('footer.php'); ?>
