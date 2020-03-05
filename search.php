<?php 
require("config.php");
 ?>

<!DOCTYPE html>
<html>
<head>

  <title>CAREER GUIDANCE SYSTEM</title>
    
    <link rel="stylesheet" type="text/css" href="css/form.css">

  <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/heading.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/button.css">
  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  <link rel="stylesheet" type="text/css" href="css/table.css">

</head>
<body style="background-color: #c2c2c2;">

    <h1>CAREER GUIDANCE SYSTEM</h1>



<?php
include_once 'config.php';
?>


<?php
include_once 'config.php';
session_start();
  if(!(isset($_SESSION['username']))){
header("location:index.php");

}
else
{
$username=$_SESSION['username'];

include_once 'config.php';

}?>
 

<div id="mySidenav" class="sidenav">
  <img src="images/bgpic1.jpg">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="" class="pic_name">Administator</a>
  <a href="dashboard.php">Manage Users</a>
  <a href="search.php" class="current">Search</a>

  </div>

  <div id="main">
    
<div class ="logout">
  <a href="logout.php">Logout</a>
</div>

<div class ="openNav">
  <span onclick="openNav()">&#9776; Menu</span>
</div>


    <form method="post" action="trycatch.php" name="" style="margin-top: 3em;">
      		<div class="input-group"><label for="">Enter name/email</label>
      <input type="text" name="search" placeholder="Enter name/email" required/>
  </div>
      <button type="submit" value="Search">Search</button>
    </form>


</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>

</body>
</html>

