<!--Script zone-->
<?php  
$n = 5; 
$result = bin2hex(random_bytes($n));  
?>  

<!--Site content-->

<html>
	<head>
		<title>SAGAGENERIS</title>
		<link rel="stylesheet" type="text/css" href="css\style.css"/>
		
	<!--Styling-->
	<style>

	</style>
	
	</head>
	
	<body>
	<!--Website Logo-->
	<div style="padding-top:60px" style="align:Center">
	<img src="Saga Project.png">
	</div>
	
	<h1>Your order has been placed!</h1>
	<h2>YOUR ORDER NUMBER IS: <?php echo $result ?></h2>
	<br>
	<br>
	<br>
	<p style="font-size:20px">
	Thank You for shopping at the SAGA-GENERIS Store we will be in touch 
	via E-Mail with the details of your order.
	<br>
	We hope you enjoyed your experience and found our array of clothing items 
	to be satisfactory to your needs and that you will return for our new additions 
	to the collection.
	</p>
	</body>
	
	<!--footer setting and layout-->
	<footer class="FooterStraits" >
	<br>
	<h1>
	SAGAGENERIS
	</h1>
	<p style="font-size:20px">
	"Connosieurs of High-End street fashion"
	<br>
	Copyright © Tribeca Studios 2020. All right reserved.
	</p>
	</footer>

</html>