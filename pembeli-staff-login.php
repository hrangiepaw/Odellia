<?php

#Memulakan fungsi session
session_start();

#Memanggil fail header.php 
include('header.php');
?>

<!--borang daftar masuk(login/signin)-->
<title>Login</title>
<div class="side-by-side-container">
  <img src="img/login1.jpg" width='30%' height="30%">
  <div class='margin-left:50px;'>
   <form action='pembeli-staff-login-process.php' method='POST'>
    User Id : <input type='text' name='User_Id'><br>
    Password : <input type='password' name='password'><br>

User type : <select name="user_type" id="user_type"> <br> 
    <option value="staff">Staff</option>
    <option value="pembeli">Buyer</option>
     <label for="user_type">User Type:</label>
</select> </div> </div>
<div class='meme'>
<input type='submit' value='Login' style=' background-color: #FFFFFF; border: 2px solid black; 
color: black; padding: 16px 32px; text-align: center; text-decoration: none; 
display: inline-block; font-size: 16px; margin-left: auto; cursor: pointer; 
font-family: Arial, sans-serif; font-weight: bold;'>

  </div></form>

<head>
  <style>
    .side-by-side-container {
      display: absolute;
      margin-left: 10px;

    }
    .meme{
      display: flex;
      align-items: left;
      margin-top: -20px;
      margin-right: 200px;
    }
  </style>
</head>

<?php 
include('footer.php'); ?>