
    <?php
    include('dbconnect.php');
    $output = NULL;
    $username = $email = $pass =  $rpass = "";

    if(isset($_POST['submit']))
    {
    
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $rpass = $_POST['rpass'];
        
        
        $query2 = "SELECT * FROM users WHERE email = '$email' OR name = '$username'";
    
        $result = mysqli_query($connection,$query2);
        
        if(empty($username) || empty($email) || empty($pass) || empty($rpass))
        {
            $output = "Fields cannot be empty";
        }
        elseif(filter_var($email, FILTER_VALIDATE_EMAIL) != true)
        {
            $output = "Invliad Email address";
        }
        elseif(mysqli_num_rows($result) == 1)
        {
            $output = "User already exsists";
        }

        elseif($pass != $rpass)
        {
            $output = "Passwords do not match";
        }
        elseif(strlen($pass) < 5)
        {
            $output = "The Password is too short"; 
        }
        else
        {
            $pass = md5($pass);
            $query1 = "INSERT INTO users (name, email, password) VALUES ('$username','$email','$pass')";
            $result = mysqli_query($connection,$query1);
            if ($result == true) 
            {
                $output = "You have Sucessfully been Registered";
            }
        }
    
    
    }
    ?>

<!DOCTYPE html>
<htm>
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
	width:15px;
	margin: 4px 2px;
	cursor: pointer;
	text-align: center;
	border-radius: 8px;
	padding: 12px 20px;
	}
	p{
		font-size: 25px;
		font-family: Arial;
	}
	label{
		font-family: arial;
	}
</style>
    </head>
    
<body>
		<!--Website Logo-->
	<div class="Logo">
		<img src="Saga Project.png">
	</div>
    <center>
        <br>
        <br>
        <br>
    
    <form method="post">
	<div class="input-group" style="text-align:center">
                <label style="text-align:center" >User Name</label>
                <input type="text" name = "username"  style="width:700px"  minlength="3" maxlength="20" value = "<?php echo $username; ?>" >
                <label style="text-align:center" >Email</label>
                <input type="email" name = "email"  style="width:700px"   value = "<?php echo $email; ?>">
                <label style="text-align:center" >Password</label>
                <input type="password" name = "pass"  style="width:700px" >
                <label style="text-align:center" >Confirm Password</label>
                <input type="password" name = "rpass"  style="width:700px" ></br>
                <input type="submit" name="submit" value="Register" style="width:80px" style="padding-top:10px" style="margin-top:10px">
				</div>
    </form>
    <?php
    echo "<br>";
    echo $output;
    ?>
        
        <p>Already have an Account : Click here to <a href="index.php">Login</a></p> 
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