<?php
	$server ="localhost"
	$username="root";
	$password= "";
	$dbname="TCS";
	$conn = mysql_connect($server,$username,$password,$dbname);
	if(!$conn){
		die("Connection Failed:".mysqli_connect_error());
	}
	?>