<?php
# Memulakan fungsi sesi
session_start();

#Memanggil fail header php dan fail connection.php
include('header.php');
include('connection.php');
?>
<div class="slideshow-container">
 <div class="mySlides">
    <img src="img/image2.jpg" style="width:110%;">
  </div> 
  <div class="mySlides">
    <img src="img/image3.png" style="width: 110%;">
  </div>
  
  <div class="mySlides">
    <img src="img/image1.jpg" style="width: 110%;">
  </div>
  <div class='prev'>
    <img src='img/arrow-1.png' width="20%">
  </div>
  <div class='next'>
    <img src='img/arrow-2.jpg' width="20%">
  </div>
</div>

  <!-- Dot navigation -->
  <div class="dot-container">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  padding: 25px;
  background-color: white;
  color: black;
  font-size: 25px;
}

.dark-mode {
  background-color: black;
  color: white;
}
</style>
</head>

<hr>
<div class='container'>
	<title>Home</title>
    <br> 
<?php

    #arahan sql untuk memaparkan secara rawak 10 barangan yang ada dalam pangkalan data
    $sql_pilihan = "
    SELECT * FROM album, jenis
    WHERE album.kod_jenis = jenis.kod_jenis
    ORDER BY rand() limit 10";
echo" <div style='margin-left: 260px; margin-top:40px;'>
Here is some album that you can compare for : </div>";
    # melaksanakan arahan sql pilihan
    $laksana_pilihan = mysqli_query($condb,$sql_pilihan);

    # jika tiada data yang dijumpai
    if(mysqli_num_rows($laksana_pilihan)==0){

        # papar tiada barangan yang telah direkodkan
        echo "<style> body { color: black; } </style>";
        echo "There's no item has been recorded.";
        echo " body {  font-family: 'Marker Felt', sans-serif; } </style>";

    }
    else{;
        echo "<div class='product-container'>"; # buka div product-container
        # jika terdapat barangan yang ditemui 
        # paparkan dalam bentuk jadual
        
         


        # Pembolehubah $n mengambil data yang ditemui
       while($n=mysqli_fetch_array($laksana_pilihan)){ 
            #memaparkan semula data diambil oleh pembolehubah $n
            echo "
            <div style='margin: 10px;'>
                <form action='album-teliti-website.php' method='GET'>
                    <button type='submit' style='width: 200px; height: 200px; background-color: white; color: black; border: 2px solid black; border-radius: 50px; display: flex; flex-direction: column; align-items: center;font-family: Arial,sans-serif;'> 
                        <input type='hidden' name='productId' value='".$n['kod_album']."'>
                        <img width='55%' src='img/".$n['gambar']."'> 
                        <b> ".$n['nama_jenis']." </b><br>
                        ".$n['nama_album']."<br>
                        ".$n['artis']."<br>
                        RM".$n['harga']."
                    </button>
                </form>
            </div>
            "; 
        } 
        echo "</div>"; # tutup jadual
        echo ""; # tutup div product-container
    }
?></div>
 <br> <br> 
<?php include('side-nav-index.php');
 include('footer.php'); ?>
<style>
.container {
  display: flex !important;
  flex-direction: row !important;
  justify-content: left;
  align-items: left;
  flex-wrap: wrap !important;
  max-width: 2000px; /* Change this value to adjust the width */
  margin: 10px auto; /* Centers the container horizontally */
}

.product-container {
  max-width: 2000px;
  display: flex;
  flex-wrap: wrap;
  margin-left: 150px;
}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  z-index: 1;
  margin: auto;
  margin-left:100px;
  transition: opacity 1s ease;
}

/* Hide the images by default */
.mySlides {
  display: none;
}
.mySlides.active {
  opacity: 1;
}

/* Next/prev buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: 20%;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  border-radius: 3px 0 0 3px;
  width: 20%;
  margin-left: 1090px;
}

.prev{
  left: -30px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(255, 255, 255, 0);
}


/* The dots/bullets/indicators */
/* Dot styles */
.dot-container {
  text-align: center;
  top: 20px;
}


.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #2c2c2c;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

</style>
<script>
var slideIndex = 1;
var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("dot");
var prev = document.querySelector('.prev');
var next = document.querySelector('.next');
var slideTimer = setInterval(function() { plusSlides(1); }, 5000); // Change image every 5 seconds
showSlides(slideIndex);

prev.addEventListener('click', function() {
  plusSlides(-1);
});

next.addEventListener('click', function() {
  plusSlides(1);
});

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (var i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";

  // Reset timer
  clearInterval(slideTimer);
  slideTimer = setInterval(function() { plusSlides(1); }, 5000); // Change image every 5 seconds

  // Slide effect
  slides[slideIndex-1].style.opacity = 0;
  var op = 0;
  var timer = setInterval(function() {
    if (op >= 1) {
      clearInterval(timer);
      return;
    }
    op += 0.1;
    slides[slideIndex-1].style.opacity = op;
  }, 50);
}
</script>