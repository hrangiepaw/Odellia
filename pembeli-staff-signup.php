<?php
#memulakan fungsi session
session_start();

#memanggil fail header.php
include('header.php');
?>

<!--Borang pendaftaran pembeli baru-->
<div class="side-by-side-container">
  <img src="img/login1.jpg" width='30%' height="30%">
  <form action="pembeli-staff-signup-proses.php" method="POST">
  <label for="user_id">User Id:</label>
   <input type='text' id="user_id" name='User_Id'><br>
    <label for="username">Username:</label>
    <input type='text' id="nama" name='Username' required><br>
    <label for="password">Password:</label>
    <input type='password' id="password" name='Password' required><br>
    <label for="user_type">User type:</label>
    <select id="user_type" name='User_type'>
      <option value="pembeli">Buyer</option>
      <option value="staff">Staff</option>
    </select><br></div>
    <div class='meme'>
    <input type='submit' value='Signup' style=' background-color: #FFFFFF; border: 2px solid black; 
    color: black; padding: 16px 32px; text-align: center; text-decoration: none; display: inline-block; 
    -size: 16px; margin-left: auto; cursor: pointer; font-family: Arial, sans-serif; font-weight: bold;'>
    </div></form>


<head>
  <style>
    .side-by-side-container {
      display: flex;
    }
    .meme{
      display: flex;
      align-items: left;
      margin-top: -20px;
      margin-right: 200px;
    }
  </style>
</head>

<?php include('footer.php');?>