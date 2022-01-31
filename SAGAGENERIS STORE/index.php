<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:login.php");
}
if(isset($_POST['submit'])){
    header("location:login.php");   
    unset($_SESSION['email']);  
    session_destroy(); 
}
if(isset($_POST['shop'])){
    header("location:loadShop.php");
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>SAGAGENERIS</title>
		<link rel="stylesheet" type="text/css" href="css\style.css"/>
	<style> 
	input[type=submit]{
	background-color: green;
	border: none;
	color: white;
	font-size: 20px;
	padding: 15px 35px;
	text-decoration: none;
	margin: 4px 2px;
	cursor: pointer;
	text-align: center;
	border-radius: 8px;
	}
	p{
		font-size: 20px;
		font-family: Arial;
	}

</style>
	</head>
	<body >
		<!--Website Logo-->
	<div class="Logo">
		<img src="Saga Project.png">
	</div>
	
		<p style="text-align:center" style="size:50px" style=font-family="Arial" >What it DO! Welocome 
		<b><?php echo $_SESSION['email']; ?></b>
		You have successfully logged in!!!
		<br>
		<br>
		A Warm welcome to the SAGAGENERIS Store,the number one
		retailer when coming to your street fashion needs. Since the 
		inception of our brand we have worked our hardest to ensure 
		that we created a bridge between the international market and all 
		Southern-Africa street fashion consumers in order to give users based 
		in the Southern-Africa region had access to all these fashion items without
		hassle.
		</p>
		<br>
		<form method="post">
		<input type="submit" name="shop" value="Start Shopping"/>
		<input type="submit" name="submit" value="Logout" />
		</form>
		
	</body>
	
	<!--footer setting and layout-->
	<footer class="FooterStraits" >
	<br>
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



