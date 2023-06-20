<?php
session_start();

if(isset($_POST['user_type']) && $_POST['user_type'] === "staff"){
    //staff login process
    #memanggil fail connection
    include('connection.php');

    //Arahan sql untuk membandingkan data yang 
    //dimasukkan wujud di pangkalan data atau tidak
    $query_login="select* from staff
    where 
        id_staff = '".$_POST['User_Id']."'
    and katalaluan_staff = '".$_POST['password']."' ";
    # melaksanakan arahan membandingkan data
    $laksana_query = mysqli_query($condb,$query_login);

    #jika terdapat 1 data yang sepadan , login berjaya
    if(mysqli_num_rows($laksana_query) == 1){
        #mengambil data yang ditemui
        $m= mysqli_fetch_array($laksana_query);

        #mengumpulkan kepada pemboleh ubah session
        $_SESSION['User_Id'] = $m['id_staff'];
        $_SESSION['tahap'] ="staff";

        // Retrieve the staff name from the database based on the ID received from the client
        $id = $_POST['User_Id'];
        $sql = "SELECT  nama_staff FROM staff WHERE nama_staff = '$id'";
        $result = $condb->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['nama_staff'] = $row['nama_staff'];
        }

        #membuka laman dashboard-staff.php
        echo"<script>window.location.href='dashboard-staff.php';</script>";
    }
    else{
        #login gagal. kembali ke laman pembeli-staff-login.php
        die("<script>alert('Failed to log in.');
        window.location.href='pembeli-staff-login.php';</script>");
    }
}

    if(isset($_POST['user_type']) && $_POST['user_type'] === "pembeli"){
        
        //Arahan sql untuk membandingkan data yang 
        //dimasukkan wujud di pangkalan data atau tidak
        include('connection.php');
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
        $_SESSION['User_Id'] = $m['id_pembeli'];
        $_SESSION['tahap'] = "pembeli";

        #membuka laman index.php
        echo"<script>alert('You have succeed to login to your account !');
        window.location.href='dashboard-pembeli.php';</script>";
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