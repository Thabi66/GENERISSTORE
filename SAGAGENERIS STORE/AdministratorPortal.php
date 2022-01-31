<!--Script zone-->
<?php
				// Include the database configuration file
				include('dbconnect.php');
?>

<!--Site content-->

<html>
	<head>
		<title>SAGAGENERIS</title>
		<link rel="stylesheet" type="text/css" href="css\style.css"/>
		
	<!--Styling-->
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
	</style>
	</head>
	
	<body>
	<!--Website Logo-->
	<div style="padding-top:60px">
	<img src="Saga Project.png">
	</div>
	
	<h1>ADMINISTRATOR PORTAL</h1>

		<!--Table for the content stored in the database-->
		<br>
		<center>
			<table style="width:65%" border="1">
				<th>Name</th>
				<th>Code</th>
				<th>Price</th>
				<th>Update</th>
				<th>Delete</th>
		<?php
				// Include the database configuration file
				include('dbconnect.php');

				// Get images from the database
				$sql = "SELECT * FROM tbl_item";
				$query = mysqli_query($connection,$sql);

				if(mysqli_num_rows($query) > 0){
					while($row = mysqli_fetch_assoc($query)){

						$imageDesc = $row["name"];
						$sellprice = $row["price"];
						$code = $row["code"];
				?>
				<form method="post" action="loadShop.php?action=add&code=<?php echo $code; ?>">
					<tr>
					<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">
					<p><?php echo $imageDesc; ?></p>
					</td>
					<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">
					<p><?php echo $code; ?></p>
					</td>
					<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">
					<p><?php echo "R".$sellprice; ?></p>
					</td>
					<!---->
					<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">
					<a href="">Update</a>
					</td>
					<td  style="text-align:center;border-bottom:#F0F0F0 1px solid;">
					<a href="">Delete</a>
					</td>
					</tr>
				</form>	
				<?php }
				} 
				?>
				</table>
		</center>
		<br>
		
	<!--Buttons to be used for addition of new products-->
	<button class="AdminPath" onclick="NewIA()">Add New Item</button>
	
	<script>
	function NewIA() {
	window.open("NewItemAddition.php");
	window.close();
	}
	</script>
 
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