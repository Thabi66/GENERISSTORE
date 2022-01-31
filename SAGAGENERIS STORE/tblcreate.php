<?php

$selectDB = mysqli_select_db($connection,$db_name);

$sql1 = "CREATE TABLE IF NOT EXISTS `tbl_item` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`))";

$sql2 = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";

if (!mysqli_query($connection, $sql1)) {
    echo "Tables created successfully"."<br>";
} else {
    echo mysqli_error($connection);
}

if (!mysqli_query($connection, $sql2)) {
    echo "Tables created successfully"."<br>";
} else {
    echo mysqli_error($connection);
}

$selectDB = mysqli_select_db($connection,$db_name);

$sql = "SELECT * FROM users";
$result = mysqli_query($connection,$sql);

if ((mysqli_num_rows($result)) > 0)
{
    
}
else
{
    $load1= mysqli_query($connection,"LOAD DATA LOCAL INFILE 'items.txt' INTO TABLE tbl_item FIELDS TERMINATED BY ',' (name, code, image ,price)");
	$load2= mysqli_query($connection,"LOAD DATA LOCAL INFILE 'UserData.txt' INTO TABLE users FIELDS TERMINATED BY ',' (email, password, name)");
	
    if(($load1 !== FALSE) || ($load2 !== FALSE))
    {
        echo "The data has been successfully loaded"."<br>";
    }
    else
    {
    echo "The data has not been loaded."."<br>";
    }

    
}

//mysqli_close($connection);

?>



