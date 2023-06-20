<?php
session_start();
include('connection.php');

// Semak jika borang sudah disi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //  Mengambil data borang
  $username = $_POST['Username'];
  $user_id = $_POST['User_Id'];
  $password = $_POST['Password'];
  $user_type = $_POST['User_type'];

  // Merekodkan pengguna baru di jadual yang sepatutnya penggguna tersebut patut berada
  if ($user_type == 'pembeli') {
    $query = "INSERT INTO pembeli (nama_pembeli, id_pembeli, katalaluan_pembeli) VALUES (?, ?, ?)";
  } else {
    $query = "INSERT INTO staff (nama_staff, id_staff, katalaluan_staff) VALUES (?, ?, ?)";
  }

  // Jalankan operasi SQL
  $stmt = $condb->prepare($query);
  $stmt->bind_param("sss", $username, $user_id, $password);
  $result = $stmt->execute();

  // Periksa jika query berjaya
  if ($result) {
    // Membawa pengguna ke login page jika berjaya
    $_SESSION['signup_success'] = true;
    echo"<script>alert('You have succeed to signup to your account ! Please login to complete the registeration.');
    window.location.href='pembeli-staff-login.php';</script>";
}
    exit();
  } else {
    // Membawa pengguna ke signup page jika gagal.
    $_SESSION['signup_error'] = true;
    echo"<script>alert('Failed to signup. Please try again !');
    window.location.href='pembeli-staff-signup.php';</script>";
    exit();
  }

?>
