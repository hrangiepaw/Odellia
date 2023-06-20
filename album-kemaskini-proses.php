<?php
#memlukan fungsi ession
session_start();

# memanggil fail guard-staff.php
include('guard-pembeli-staf.php');

# menyemak kewujudan data POST
if(!empty($_POST)){

    # memanggil fail connection.php
    include('connection.php');

    #pengesahan ketelusan data
    if($_POST['harga'] <=0){
        die("<script>alert('Information error');
        window.history.back();</script>");
    }

    # arahan sql (query) untuk kemas kini maklumat barang
    $arahan = "UPDATE album, jenis SET
    harga = '".$_POST['harga']."',
    id_staff = '".$_SESSION['User_Id']."',
    ciri = '".$_POST['ciri']."',
    gambar = '".$_POST['gambar']."'
    WHERE
    kod_album = '".$_GET['kod_album_lama']."'";


    #melaksanakan dan menyemak proses kemaskini
    if(mysqli_query($condb,$arahan)){
        #kemaskini berjaya
        echo"<script>alert('Update has been sucessful');
        window.location.href='senarai-album.php';</script>";
    }
    else{
        #kemaskini gagal
        echo"<script>alert('Update has been failed :(');
        window.history.back();</script>";
    }
}
else{

    #data POST empty
    die("<script> alert('sila lengkapkan data');
    window.location.href='senarai-album.php';</script>");
}
?>