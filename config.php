<?php

/*====================database settings===================================*/
 
$server ="localhost";
$username = "root";
$password = "";
$database = "career";

$db = mysqli_connect("localhost","root","","career");

/*====================check connection=======================================*/
if (mysqli_connect_errno()) 
{

	echo "Failed to connect to database".mysqli_connect_error();
	# code...
}
?>
