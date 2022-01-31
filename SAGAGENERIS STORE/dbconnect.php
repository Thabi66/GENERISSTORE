<?php


if(!class_exists('DBController'))
{
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "SagagenerisStore";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
}

$db_host="localhost";
$db_username="root";
$db_password="";
$db_name="SagagenerisStore";

$connection = mysqli_connect($db_host, $db_username, $db_password);
// Check connection
if (mysqli_connect_error())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$selectDB = mysqli_select_db($connection,$db_name);
//echo "<h1>Connected!</h1>";
if ($selectDB === FALSE) {
$sql = "CREATE DATABASE SagagenerisStore";
mysqli_query($connection, $sql);  
echo "Database ".$db_name." succesfully created";
} else {
//echo "Database already exsist"."<br>";
}
$selectDB = mysqli_select_db($connection,$db_name);
//mysqli_close($connection);


?>



