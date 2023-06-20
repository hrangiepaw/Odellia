<!DOCTYPE html>
<html>
<head>
<!-- style untuk mencantikkan fail-->
  <link rel="stylesheet" href="styles.css">
  <style type="text/css">
    body {
      margin-left: 10px;
      padding: 0px;
    }
    .side-nav {
      position: absolute;
      top:150px;
      left: 0;
      height: 150%;
      background-color: white;
      color: #000000;
      padding: 10px;
      width: 250px;
      float: left;
    }
    .search-box {
      display: flex;
      align-items: center;
      background-color: #e4e6e5;
      border-radius: 300px;
      padding:0px;
    }
    .search-box input[type="text"] {
      flex-grow: 1;
      border: none;
      background: none;
      font-size: 16px;
      margin-left: 10px;
    }
    .search-box::before {
      content: "";
      display: block;
      width: 20px;
      height: 20px;
      background-image: url(img/searchbar.JPG);
      background-repeat: no-repeat;
      background-size: contain;
      margin-left: 10px;
    }
    .greeting {
      text-align: center;
      margin-top: 20px;
    } 
  
  </style>
</head>
<body>
  <div class="side-nav">
    <!-- membuat link untuk pergi ke laman lain (embed link)-->
    <a href='album-daftar-borang.php'>Register new album /</a>
    <a href='senarai-album.php'>Check status / </a> <br>
    <a href='album-upload-borang.php'>Upload new album </a>
    <form action="search.php" method="POST">
      <!-- untuk memudahkan staff untuk mencari barang yang telah direkodkan-->
  <label>Search:</label>
  <div class="search-box">
    <input id="search-input" type="text" name="query" placeholder=" "></div>
    
    </form>
    <div id="search-results"></div>
  </div>
  
</body>
</html>
