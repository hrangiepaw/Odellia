<title> Buyer page </title>
<?php
session_start();
include('header.php');
include('side-nav.php');

// Check if the user is logged in
if(isset($_SESSION['User_Id']) && isset($_SESSION['tahap'])){
  $user_id = $_SESSION['User_Id'];
  $user_type = $_SESSION['tahap'];

  // Display the user information based on user type
  if($user_type === "pembeli"){
    // Retrieve buyer information from the database based on user ID
    include('connection.php');
    $sql = "SELECT nama_pembeli FROM pembeli WHERE id_pembeli = '$user_id'";
    $result = mysqli_query($condb, $sql);
    $buyer = mysqli_fetch_assoc($result);

    // Display buyer information
    echo "<div class='greeting'> Hi ".$buyer['nama_pembeli'].", these are our latest product for you to compare : </div>";
?>
    <!-- Include the purchase history file here -->
    <?php include('album-history-pembeli.php'); ?>
<?php
  }
  else{
    // User is not logged in, redirect to login page
    header("Location: pembeli-staff-login.php");
    exit();
  }
}
?>
<div style='margin-left:250px;'>
<?php include('footer.php');?> </div>
 <style>
 .greeting {
      text-align: left;
      margin-left: 300px;
    }  
    </style>