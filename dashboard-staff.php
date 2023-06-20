<?php
session_start();
include('header.php');
include('side-nav-staff.php');

// Check if the user is logged in
if(isset($_SESSION['User_Id']) && isset($_SESSION['tahap'])){
  $user_id = $_SESSION['User_Id'];
  $user_type = $_SESSION['tahap'];

  // Display the user information based on user type
  if($user_type === "staff"){
    // Retrieve staff information from the database based on user ID
    include('connection.php');
    $sql = "SELECT nama_staff FROM staff WHERE id_staff = '$user_id'";
    $result = mysqli_query($condb, $sql);
    $staff = mysqli_fetch_assoc($result);

    // Check if there are any products in the album history
    $pdo = new PDO('mysql:host=localhost;dbname=odellia', 'root', ''); // Establish database connection
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM album WHERE id_staff = :id_staff');
    $stmt->execute(['id_staff' => $user_id]);
    $productCount = $stmt->fetchColumn();

    // Display appropriate message based on product history
    if($productCount > 0){
      // Display existing product history
      echo "<div class='greeting'> Hi ".$staff['nama_staff'].", these are the products you added:</div>";
      include('album-history.php');
    } else {
      // Display message for new staff without product history
      echo "<div class='greeting'> Hi ".$staff['nama_staff'].", you are new. Add a product now.</div>";
    }
  }
  else{
    // User is not logged in, redirect to login page
    header("Location: pembeli-staff-login.php");
    exit();
  }
}
?>
<div style='margin-left:300px;'>
<?php include('footer.php'); ?>
</div>
<style>
.greeting {
  text-align: left;
  margin-left: 300px;
}
</style>
