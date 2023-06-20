<!DOCTYPE html>

<html>
<head>
	<style type="text/css">
			body {
			margin-left: 10px;
			padding: 0px;
		}
		.side-nav {
			position: absolute;
			top:150px;
			left: 0;
			height: 40%;
			background-color:  white;
			
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
		<td>Compare by:</td> <br>
		<tr>
		
	
		<td>Price range from:</td>
            <td><input type='text' name='harga_awal'>
			<td>to:</td> 
			<td><input type='text' name='harga_akhir'>
        </tr>
        <tr>
			
		
		<td>Album :<input type='text' name='jenis'>
            <td>
      
            </td>
        </tr>

        <tr>
			
	
		
	<td>Artist:<input type='text' name='artis'>
            <td></td><br>
            <td><input type='submit' value='Search'></td>
        </tr>
    </table>
</form>
</div>
</body>
</form>

</html>