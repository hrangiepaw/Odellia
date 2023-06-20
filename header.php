<html>
   
   <head>
   <link rel="icon" href="img/small.png" type="image/x-icon">
      <style>
         body {
            color: black;
            font-family: Arial Black;
            font-size: 20px;
         }
         .side-by-side-container {
            display: flex;
            align-items:center;
            padding-left: 5px;
         }
         .header-image{
            align-self: flex-start;
     }
            .menu-options {
   margin-left: 500px;
}
      </style>
   </head>
   <body>
      <div class="side-by-side-container">
         <img src="img/headee8.png" class="header-image" width='40%'>
         <div class="menu-options"> 
           <div class='button'>
<button onclick="openPopup()"><img src='img/button1.png' width='50%'></button></div>

<div class="popup">
  <div class="popup-header">
    <h2>Odellia</h2>



</html>

    <div class='buttonclose'>
    <button onclick="closePopup()" style="border:2px solid black; padding:10px; margin-left: 150px;font-family:'Arial-Black',sans-serif;">X</button></div>
    <hr>
  </div>
  <div class="popup-content">
    <!-- Bahagian menu asas -->
  <?PHP
            
            # Menu staff : dipaparkan  sekiranya staff telah login
            if(!empty($_SESSION['tahap']) and $_SESSION['tahap']=="staff")
            {
               echo"
               <a href='index.php' style='display: inline-block;'><img src='img/home.png' width='9%'>Home</a><br><hr>
               <a href='dashboard-staff.php'style='display: inline-block;'><img src='img/dashboard.png' width='10%'>Menu</a><br><hr>
               <a href='pembeli-pilih.php'style='display: inline-block;'><img src='img/query.png' width='10%'>Comparison</a><br><hr>
               <a href='senarai-pembeli.php'style='display: inline-block;'><img src='img/list.png' width='10%'>Buyer list </a><br><hr>
               <a href='logout.php'style='display: inline-block;'><img src='img/logout.png' width='10%'>Log out</a><hr>
               ";
            }
            # Menu pembeli : dipaparkan sekiranya pembeli telah login
            elseif(!empty($_SESSION['tahap']) and $_SESSION['tahap']=="pembeli"){
               echo"
               <a href='index.php' style='display: inline-block;'><img src='img/home.png' width='9%'>Home</a><br><hr>
               <a href='dashboard-pembeli.php'style='display: inline-block;'><img src='img/dashboard.png' width='10%'>Menu</a><br><hr>
               <a href='pembeli-pilih.php'style='display: inline-block;'><img src='img/query.png' width='10%'>Comparison</a><br><hr>
               <a href='logout.php'style='display: inline-block;'><img src='img/logout.png' width='10%'>Log out</a><hr>
               ";

            }
            else{
               echo"
               <a href='index.php'style='display: inline-block;'><img src='img/home.png' width='10%'>Home</a><br><hr>
               <a href='pembeli-staff-login.php'style='display: inline-block;'><img src='img/login.png' width='10%'>Login</a><br><hr>
               <a href='pembeli-staff-signup.php''style='display: inline-block;'><img src='img/signup.png' width='15%'>Signup</a><br><hr>
               ";
            }
            include('bg-color.php');
            
            ?>
  </div></div></div></div></body>
  </div>
</div>
         </div>
      </div>
   </body>
</html>
<hr>
<style>
   button {
  border: none;
  background-color: transparent;
  margin-left:150px;
  padding: 0;
}


.popup {
  position: fixed;
  z-index: 2;
  top: 0;
  right: -300px;
  width: 300px;
  height: 100%;
  background-color: white;
  transition: all 0.3s ease;
}

.popup.active {
  right: 0;
  transform: translateX(-10px);
  background-color: white;
}

.popup-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  
  background-color: white;
  color: black;
}

.popup-content {
  padding: 10px;
}

</style>
<script>
function openPopup() {
  var popup = document.querySelector('.popup');
  popup.classList.add('active');
}

function closePopup() {
  var popup = document.querySelector('.popup');
  popup.classList.remove('active');
}
</script>
           
      