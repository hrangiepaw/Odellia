<!DOCTYPE html>

<html>
<head>	

<!-- style untuk mencantikkan LAMAN-->
	<style type="text/css">
		body {
			margin-left: 10px;
			padding: 0px;
		}
		.side-nav {
			position: absolute;
			top:250px;
			left: 0;
			height: 40%;
			background-color:  white;
			margin-top: 550px;
			color: #000000;
			padding: 10px;
			width: 230px; /* set the width of the side nav */
  			float: left; /* float the side nav to the left */
		}
		.side-nav input[type="text"] {
			width: 50%;
			padding: 3px;
			margin-top: 10px;
			box-sizing: border-box;
			border: 1px solid #000000;
			border-radius: 0px;
			background-color: #f8f8f8;
			font-size: 16px;
			color: #000000;
		}
		.side-nav button {
			width: 50%;
			background-color: #4CAF50;
			color: #fff;
			padding: 12px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			margin-top: 10px;
			font-size: 16px;
			
		}
		.side-nav label {
		display: flex;
		align-items: center;
		justify-content: flex-start;
		margin-right: auto;
		margin-bottom: 10px;
}

	.side-nav label input[type="checkbox"] {
	margin-right: 5px;
	}
		.side-nav button:hover {
			background-color: #45a049;
		}
		.side-nav form {
			margin-top: 20px;
			display: flex;
			flex-direction: column;
			align-items: left;
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

	</style>
</head>
<body>
<div class="side-nav">
		<form action="pembeli-process.php" method="POST">
		<!-- Form content here -->
		<td>Compare by:</td> <br>
		<tr>
			<td>Price range from:</td>
			<td><input type="text" name="harga_awal" <?php echo isset($_SESSION['tahap']) ? '' : 'disabled'; ?>></td>
			<td>to:</td> 
			<td><input type="text" name="harga_akhir" <?php echo isset($_SESSION['tahap']) ? '' : 'disabled'; ?>></td>
		</tr>
		<tr>
			<td>Album :</td>
			<td><input type="text" name="jenis" <?php echo isset($_SESSION['tahap']) ? '' : 'disabled'; ?>></td>
		</tr>
		<tr>
			<td>Artist:</td>
			<td><input type="text" name="artis" <?php echo isset($_SESSION['tahap']) ? '' : 'disabled'; ?>></td><br>
			<td><input type="submit" value="Search" <?php echo isset($_SESSION['tahap']) ? '' : 'disabled';?>></td> 
		</tr>
	</form>
</div>
