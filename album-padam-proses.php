<?php
# memulakan fungsi session
session_start();

# memanggil fail guard-staf.php
include('guard-staf.php');

# menyemak kewujudan data GET kod album
if(!empty($_GET)){

    #memanggil fail connection
    include('connection.php');

    #arahan=untuk memadam data barang berdasarkan kod yang dihantar
    $arahan= "delete from album where kod_album ='".$_GET['kod']."'";

    #melaksanakan arahan dan menguji proses padam rekod
    if(mysqli_query($condb,$arahan)){

        #jika data berjaya dipadam
        echo"<script>alert('Data Erasing sucess !');
        window.location.href='senarai-album.php';</script>";
    }
    else{

        #jika data gagal dipadam
        echo"<script>alert('You failed to erase the data');
        window.location.href='senarai-album.php';</script>";
    }
}
else{
    #jika data GET tidak wujud (empty)
    die("<script>alert('Error! Straight Access');
    window.location.href='senarai-album.php';</script>");
}
?>