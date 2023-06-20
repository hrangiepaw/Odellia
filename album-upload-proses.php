<?php
session_start();
if (isset($_POST['btn-upload'])) {
    // memanggil fail connection
    include('connection.php');

    // mengambil nama sementara fail
    $namafailsementara = $_FILES["data_album"]["tmp_name"];

    // mengambil nama fail
    $namafail = $_FILES['data_album']['name'];

    // mengambil jenis fail
    $jenisfail = pathinfo($namafail, PATHINFO_EXTENSION);

    // menguji jenis fail dan saiz fail
    if ($_FILES["data_album"]["size"] > 0 && $jenisfail == "txt") {
        // membuka fail yang diambil
        $fail_data_staff = fopen($namafailsementara, "r");

        // mendapatkan data dari fail baris demi baris
        while (!feof($fail_data_staff)) {
            // mengambil data sebaris sahaja bagi setiap pusingan
            $ambilbarisdata = fgets($fail_data_staff);

            // memecahkan baris data mengikut tanda pipe
            $pecahkanbaris = explode("|", $ambilbarisdata);

            // memasukkan data ke dalam pembolehubah
            list($nama_album, $kod_jenis,$nama_jenis, $artis, $harga, $ciri, $gambar, $stock) = $pecahkanbaris;

            // arahan SQL untuk menyimpan data ke dalam jenis table
            $arahan_sql_jenis = "INSERT INTO jenis (kod_jenis, nama_jenis) VALUES ('$kod_jenis', '$nama_jenis')";


            // arahan SQL untuk menyimpan data ke dalam album table
            $arahan_sql_simpan = "INSERT INTO album (nama_album, kod_jenis, artis, harga, ciri, gambar, id_staff, stock) 
            VALUES ('$nama_album', '$kod_jenis', '$artis', '$harga', '$ciri', '$gambar', '".$_SESSION['User_Id']."', '$stock')";

            // memasukkan data ke dalam jadual jenis
            $laksana_arahan_jenis = mysqli_query($condb, $arahan_sql_jenis);
            if (!$laksana_arahan_jenis) {
                echo "<script>alert('Error in inserting jenis data.');</script>";
            }

            // memasukkan data ke dalam jadual album
            $laksana_arahan_simpan = mysqli_query($condb, $arahan_sql_simpan);
            if ($laksana_arahan_simpan) {
                echo "<script>alert('Import data file done');
                window.location.href='senarai-album.php';</script>";
            } else {
                echo "<script>alert('Error in inserting album data.');</script>";
            }
        }
        fclose($fail_data_staff);
    } else {
        echo "<script>alert('Only file formatted txt is allowed');</script>";
    }
} else {
    die("<script>alert('Error: Direct Access!');
    window.location.href='album-upload-borang.php';</script>");
}
?>
