<?php
	// Include the database configuration file
	include('dbconnect.php');
?>

<html>
	<head>
		<title>SAGAGENERIS</title>
		<link rel="stylesheet" type="text/css" href="css\style.css"/>
	
	<style>
		.AdminPath{
		border: none;
		color: green;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		border-radius: 8px;}
	</style></head>	

	<body>
		<!--Website Logo-->
	<div style="padding-top:60px">
	<img src="Saga Project.png">
	</div>
	</body>
	<h1>
	INVENTORY UPDATES
	</h1>

<form method="post">
		<div class="input-group" style="text-align:center">
		<b><label style="text-align:center" style="border-radius: 2px">Item Name</label></b>
		<input type="name" name = "email"   style="width:700px">
		<p style="font-size:16px"><b>NB:</b>
		<br>- Maximum 30 Characters
		</p>
		</div>
		<div class="input-group">
		<b><label style="text-align:center" style="border-radius: 2px">Item Code</label></b>
		<input type="name" name = "pass" style="width:700px" >
		<p style="font-size:16px"><b>NB:</b>
		<br>- Maximum (5) characters
		<br>- Letters and Numbers Only
		</p>
		</div>
		<div class="input-group">
		<b><label style="text-align:center" style="border-radius: 2px">Item Price</label></b>
		<input type="name" name = "pass" style="width:700px" >	
		<p style="font-size:16px"><b>NB:</b> 
		<br>- Type in amount without decimal point
		<br>- Leave out currency type</p>
		</div>
	</form>
		<br>
		<button class="AdminPath" onclick="NewIA2()">Add New Item</button>
		
			<script>
	function NewIA2() {
	window.open("AdministratorPortal.php");
	window.close();
	}
	</script>
	<!--footer setting and layout-->
	<footer class="FooterStraits" >
	<h1>
	SAGAGENERIS
	</h1>
	<p>
	"Connosieurs of High-End street fashion"
	<br>
	Copyright © Tribeca Studios 2020. All right reserved.
	</p>
	</footer>
</html>