<?php
#memulakan fungsi session
session_start();

#menyemak kewujudan data post
if(!empty($_POST)){
    include("connection.php");

    # prepare the SQL statement
    $stmt = $condb->prepare("INSERT INTO jenis (kod_jenis, nama_jenis) VALUES (?, ?)");

    # bind parameters to the prepared statement
    $stmt->bind_param("ss", $_POST['kod_jenis'], $_POST['nama_jenis']);

    # execute the prepared statement
    if ($stmt->execute()) {
        # registration successful
        die("<script>alert('Registration success!');
        window.location.href='album-daftar-borang.php';</script>");
    } else {
        # registration failed
        die("<script>alert('Registration failed!');
        window.history.back();</script>");
    }

    # close the statement and database connection
    $stmt->close();
    $condb->close();
}
else{
    #DATA post tidak wujud
    die("<script>alert('Please fill in incomplete information');
    window.location.href='jenis-album-borang.php';</script>");
}
?>
