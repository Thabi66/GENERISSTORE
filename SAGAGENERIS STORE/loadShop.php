<?php

session_start();
if(!isset($_SESSION['email'])){
    header("location:index.php");
}

if(isset($_POST['submit']))
{
    header("location:login.php");
    
    unset($_SESSION['email']);  
    session_destroy(); 
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
		font-size: 25px;
		font-family: Arial;
	}
	table{
	width:90%;
	}
	td{
		font-family: Arial;
		font-size: 25px;
	}
	button{
		width: 20px;
	}

</style>	
</head>

<body>
<!--Website Logo-->
	<div class="Logo">
	<img src="Saga Project.png">
	</div>
<center>
    <p>Logged in as user: <b><?php echo $_SESSION['email']; ?></b> </p>

        <form method="post">
            <input type="submit" name="submit" value="Logout" />
        </form>
    <br>
    <hr>
    <br>
	
<!--Shopping cart div to create the shopping cart-->
<?php
require_once("dbconnect.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tbl_item WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
if(isset($_POST['Check']))
	{
		$Name = $Code = $TotalPrice = $Quantity =  $Price = $Text = "";
		
		foreach ($_SESSION["cart_item"] as $item){
		$Name = $item['name'];				
		$Code = $item['code'];
		$Quantity = $item['quantity'];
		$Price = $item['price'];	
		
		$Text = "Description: $Name, Code: $Code, Quantity: $Quantity, Price: R$Price";
		$filename = "Orders.txt";
		$fh = fopen($filename, "a");
		fputs($fh, $Text."\n");
		fclose($fh);
		}
		
		unset($_SESSION["cart_item"]);
		
		header("location:Checkout.php");
		
	}
?>
		
		<div id="shopping-cart">		
		<span class="login100-form-title">
			<h1>
			Shopping Cart
			</h1>
		</span>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>		
		<center>
			<table border="1" cellspacing="10" cellpadding="1">
				<tr>
					<th style="text-align:left;"><strong>Description</strong></th>
					<th style="text-align:left;"><strong>Item Code</strong></th>
					<th style="text-align:right;"><strong>Quantity</strong></th>
					<th style="text-align:right;"><strong>Item Price</strong></th>
					<th style="text-align:center;"><strong>Action</strong></th>
				</tr>		
				<?php		
					foreach ($_SESSION["cart_item"] as $item){
				?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "R".$item["price"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="loadShop.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove item</a></td>
				</tr>
				<?php
				$item_total += ($item["price"]*$item["quantity"]);
				}
				?>

				<tr>
					<td colspan="5" align=right><strong>Total: <?php echo "R".$item_total; ?></strong></td>
				</tr>	
			</table>
		</center>	
		
		<a id="btnEmpty" href="loadShop.php?action=empty" style="font:22px" align=right>EmptyCart</a>
		<br/>
		<br/>
		  
		 <?php
}
?>
<br/>
<br/>
<span class="login100-form-title">

		<!--Button for checking out the store-->
		<form method="post" action="loadShop.php" >
		<input name="Check" type="submit" value="Check Out" class="login100-form-btn" />
		</form>	
			
		<h1>
		Our Products
		</h1>
		
		</span>	
		
		
		<table border="1" cellspacing="10" cellpadding="1">
		<?php
				// Include the database configuration file
				include('dbconnect.php');

				// Get images from the database
				$sql = "SELECT * FROM tbl_item";
				$query = mysqli_query($connection,$sql);

				if(mysqli_num_rows($query) > 0){
					while($row = mysqli_fetch_assoc($query)){
						$imageURL = $row["image"];
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
					<img src="<?php echo $imageURL; ?>" alt="" />
					</td> 
					<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">
					<p><?php echo "R".$sellprice; ?></p>
					</td>
					<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">
					<input class="product-quantity" type="text" name="quantity" value="1" size="1" align = "center"/>
					<br/>
					<br/>
					<input type="submit" value="Add"  />
					</td>
					</tr>
				</form>	
				<?php }
				} 
				?>
				</table>

</center>


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


