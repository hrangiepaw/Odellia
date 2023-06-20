<?php
#memulakan fungsi  SESSION
session_start();
# memanggil fail connection
include ('connection.php');

#menyemak kewujudan data post
if(!empty($_POST))
{
    # data validation : harga album tidak boleh kurang atau sama dgn rm0
    if($_POST['Price'] <= 0)
    {
        die ("<script>alert ('Error : Your price is wrong!');
        window.history.back(); </script>");
    }

    # Get the original file name
    $gambar = $_FILES['gambar']['name'];

    #arahan query untuk menyimpan data album baru
    $sql_simpan = "insert into album (nama_album, kod_album, harga, ciri, stock, artis, gambar, id_staff,kod_jenis)  
    VALUES ('".$_POST['album']."', '', '".$_POST['Price']."', '".$_POST['detail']."', '".$_POST['quantity']."', '".$_POST['artis']."', '".$_FILES["gambar"]["name"]."', '".$_SESSION['User_Id']."','".$_POST['kod_jenis']."')";
    
    # melaksanakan arahan SQL menyimpan album baru
    $laksana_sql = mysqli_query($condb, $sql_simpan);

    # menyemak proses melaksanakan berjaya atau tidak
    if($laksana_sql)
    {
        # muat naik gambar
        $lokasi = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($lokasi, "img/".$gambar);

        # jika berjaya kembali ke fail senarai-borang.php
        die("<script>alert('Registration Success');
        window.location.href='senarai-album.php'; </script>");
    }
    else
    {
        # jika gagal
        die("<script>alert('Registration Failed');
        window.history.back(); </script>");
    }
}
else
{
    # jika maklumat album di isi tidak lengkap
    die("<script>alert('Fill the form again');
    window.location.href='album-daftar-borang.php' </script>");
}
?>
