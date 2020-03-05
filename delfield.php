
<?php
require("config.php");

$id=$_REQUEST['id'];

$query = "DELETE FROM field WHERE id=$id"; 

mysqli_query($db,$query) or die ( mysqli_error($db));

header("Location: fieldlist.php"); 
?>