<?php
session_start();
unset($_SESSION['email']);  
include('dbconnect.php');
include_once('tblcreate.php');
$output = NULL;
$email = $pass = "";
if(isset($_POST['submit']))
{
$_SESSION['email'] = $_POST['email'];
$email = stripslashes($_POST['email']);
$pass = stripslashes($_POST['pass']);
$pass = md5($pass);
$query = "SELECT email, password FROM users WHERE email = '$email' AND password = '$pass'";
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_array($result);
$x = $row['email'];
$y = $row['password'];
if(empty($email && $pass)){
$output = "Please eneter details";
}
else { 
if($x == $email && $y == $pass) 
{
 header("location:index.php");}
else {
$output = "Incorrect Username\Password";}
}

if(empty($email)){
$output = "Please eneter email";
}elseif (mysqli_num_rows($result) != 1)
{
$output = "Incorrect Username / Password";
}else {
header("location:index.php");}
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
	text-decoration: none;
	width:20px;
	cursor: pointer;
	text-align: center;
	border-radius: 8px;

	}
	p{
		font-size: 20px;
		font-family: Arial;
	}
	label{
		font-family: arial;
	}

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
	border-radius: 8px;
	}
	
</style>
	</head>
	<body>

	<!--Website Logo-->
	<div class="Logo">
		<img src="Saga Project.png">
	</div>

	<!--Form for the insertion of login details to login user-->
	<form method="post">
		<div class="input-group" style="text-align:center">
		<b><label style="text-align:center" style="border-radius: 2px">Email</label></b>
		<input type="email" name = "email"  value = "<?php echo $email; ?>" style="width:700px">
		</div>
		<br>
		<div class="input-group">
		<b><label style="text-align:center" style="border-radius: 2px">Password</label></b>
		<input type="password" name = "pass" style="width:700px" >
		</div>
		<br>
		<div class="input-group">
		<input type="submit" name="submit" value="Login" style="width:80px" style="padding-top:10px" style="margin-top:10px">
		</div>
		
	</form>
	<p></p>
	<?php
	echo $output;
	?>
	
	<p style="text-align:center">No Account?  Click here to <b><a href="registration.php">Register</a></b></p> 
	</body>
	
	<br>
	<a href="AdminLogin.php">
	<!--Administrator Domain Login Button-->
	<button class="AdminPath">Administrator Domain</button>
	</a>
	
</html>