<?php
 

 $host = "localhost";
 $dbusername = "root";
 $dbpassword = "";
 $dbname = "TCS";

// create connection

$conn = mysqli_connect($host, $dbusername, $dbpassword,$dbname);
$dbconfig = mysqli_select_db($conn,$dbname);
if($dbconfig)
{
	echo "DB Connected";
}

else{
	echo "fail to connect";
}