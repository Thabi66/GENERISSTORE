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
	<h1>ADMIN LOGIN</h1>
	<!--Form for the insertion of login details to login user-->
	<form method="post">
		<div class="input-group" style="text-align:center">
		<b><label style="text-align:center" style="border-radius: 2px">Username</label></b>
		<input type="Username" name = "Username" style="width:700px">
		</div>
		<br>
		<div class="input-group">
		<b><label style="text-align:center" style="border-radius: 2px">Password</label></b>
		<input type="password" name = "Password" style="width:700px" >
		</div>
		<br>
		<div class="input-group">
		<button class="AdminPath" onclick="AdminLoginProcess()">Login</button>
		</div>
	</form>
	
	<script>
	function AdminLoginProcess(){
	window.open("AdministratorPortal.php");	
	}
	</script>
</html>