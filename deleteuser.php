<?php
require("config.php");

$id=$_REQUEST['id'];

$query = "DELETE FROM users WHERE id=$id"; 

mysqli_query($db,$query) or die ( mysqli_error($db));

header("Location: dashboard.php"); 
?>