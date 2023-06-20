<?php
#memulakan fungsi session
session_start();

#menyemak kewujudan data post
if(!empty($_POST['User_Id']) and !empty($_POST['password'])){

    #memanggil fail connection
    include('connection.php');

        //Arahan sql untuk membandingkan data yang 
        //dimasukkan wujud di pangkalan data atau tidak
            $query_login="select* from pembeli
            where 
                id_pembeli = '".$_POST['User_Id']."'
            and katalaluan_pembeli = '".$_POST['password']."' ";
    # melaksanakan arahan membandingkan data
    $laksana_query = mysqli_query($condb,$query_login);

    #jika terdapat 1 data yang sepadan , login berjaya
    if(mysqli_num_rows($laksana_query) == 1){
        #mengambil data yang ditemui
        $m= mysqli_fetch_array($laksana_query);

        #mengumpukan kepada pemboleh ubah session
        $_SESSION['User_Id'] == $m['id_pembeli'];
        $_SESSION['tahap'] == "pembeli";

        #membuka laman index.php
        echo"<script>window.location.href='index.php';</script>";
    }
    else{
        #login gagal. kembali ke laman pembeli-staff-login.php
        die("<script>alert('Failed to log in.');
        window.location.href='pembeli-staff-login.php';</script>");
    }
}
else{
    #data yang dihantar dari laman pembeli-staff login borang.php kosong
    die("<script>alert('Please login first !');
    window.location.href='pembeli-staff-login.php';</script>");
}
?>
