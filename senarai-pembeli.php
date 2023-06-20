<?php 
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan guard-staff.php
include('header.php');
include('connection.php');

?>
<title> Buyer namelist</title>
<h3 >Buyer namelist</h3>
<!-- Boarang carian nama pembeli -->
<form action='' method='POST'>
    Browse with buyer name  <br>
    Buyer name :    <input type='text' style=' background-color: #FFFFFF; border: 2px solid black; 
color: black; padding: 5px 10px; 
display: inline-block; font-size: 12px; margin-left: auto; cursor: pointer; 
font-family: Arial, sans-serif; font-weight: bold;' name='nama'>
                    <input type='submit' style=' background-color: #FFFFFF; border: 2px solid black; 
color: black; padding: 5px 10px; text-align: center; text-decoration: none; 
display: inline-block; font-size: 12px; margin-left: auto; cursor: pointer; 
font-family: Arial, sans-serif; font-weight: bold;' value='Search'>
</form>

<!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan -->

<!-- Header bagi jadual untuk memaparkan senarai pembeli -->
<table width='100%' border='1' id='saiz'> 
    <tr> 
        <td>Name</td> 
        <td>Id</td> 
        <td>Password</td> 
        <td>Action</td>
    </tr> 

<?php 

# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai pembeli
$tambahan="";
if(!empty($_POST['nama']))
{
    $tambahan= "where nama_pembeli like '%".$_POST['nama']."%'";
}

# arahan query untuk mencari senarai nama pembeli 
$arahan_papar="select* from pembeli $tambahan "; 

# laksanakan arahan mencari data pembeli 
$laksana = mysqli_query($condb,$arahan_papar); 

# Mengambil data yang ditemui 
while($m = mysqli_fetch_array($laksana)) 
{ 
    # memaparkan senarai nama dalam jadual 
    echo"<tr> 
    <td>".$m['nama_pembeli']."</td> 
    <td>".$m['id_pembeli']."</td> 
    <td>".$m['katalaluan_pembeli']."</td> ";
    
    # memaparkan navigasi untuk hapus data pembeli
    echo"<td>

    |<a href='pembeli-padam-proses.php?id_pembeli=".$m['id_pembeli']."'    
     onClick=\"return confirm(Are you sure to delete this data?')\">
    Delete</a>|

    </td>
    </tr>"; 
}

?> 
</table>
<?php include ('footer.php'); ?>