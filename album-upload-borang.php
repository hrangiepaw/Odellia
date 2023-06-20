<?php
#memulakan fungsi session
session_start();

# memanggila fail header,guard-staff
include('header.php');
?>
<title> Upload album data </title>
 <!-- Tajuk laman web-->
 <h3> Upload Album's data </h3>

 <!-- Borang untuk memuat naik fail -->
 <form action='album-upload-proses.php' method='POST' enctype="multipart/form-data">

 <h3><b>Please choose your preferred txt file that you want to upload</b></h3>
 <input type='file' name='data_album'>
 <button type='submit' name='btn-upload'style=' background-color: #FFFFFF; border: 2px solid black; color: black; 
 padding: 16px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; 
 margin-left: auto; cursor: pointer; 
 font-family: Arial, sans-serif; font-weight: bold;'>Upload</button>
 
 </form>
 <?php include('footer.php'); ?>