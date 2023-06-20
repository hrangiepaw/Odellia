<?php
# memulakan fungsi session
session_start();

# menyemak kewujudan data GET nokp pembeli
if(!empty($_GET))
{
    # memanggil fail connection.php
    include('connection.php');

    # arahan untuk memadam data pembeli berdasarkan nokp yang dihantar(GET)
    $arahan     =   "delete from pembeli where id_pembeli='".$_GET['id_pembeli']."'";

    # melaksanakan arahan dan menguji proses padam rekod
    if(mysqli_query($condb,$arahan))
    {
        # jika data berjaya dipadam. papar popup dan buka fail senarai-pembeli.php
        echo "<script>alert('Data was deleted !');
        window.location.href='senarai-pembeli.php';</script>";
    }
    else
    {
        # jika data gagal dipadam.papar popup dan buka fail senarai-pembeli.php 
        echo "<script>alert('Data can't be deleted :(');
        window.location.href='senarai-pembeli.php';</script>";
    }
}
else
{
    # jika data GET tidak wujud (empty). papar popup dan buka fail senarai-pembeli.php
    die("<script>alert('Error : Direct access!');
    window.location.href='senarai-pembeli.php';</script>");
}
?>