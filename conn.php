<?php
$host = "localhost";
$username = "root";
$pass = "admin";
$dbname = "lotifxyz_wellwisher";
if(!$connObj=mysqli_connect($host, $username, $pass, $dbname)){
echo "Cann't connect to database";
}
else
{
	$connObj=mysqli_connect($host, $username, $pass, $dbname);
}
 ?>
