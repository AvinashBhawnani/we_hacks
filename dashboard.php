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
<body style="background-image: none;">

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
echo '<span style="float:right;margin-top:7em;margin-bottom:2em; margin-right:1em;color:orange;
text-decoration:none;font-size:20px;position:abolute;">
&nbsp;Hello, 
<a href="#" style="text-decoration:none;">'.$username.'</a>&nbsp;|||&nbsp;
<a href="logout.php" style="text-decoration:none;">&nbsp;Signout</a>
</span>';

}?>
 

<div id="mySidenav" class="sidenav">
  <img src="images/bgpic1.jpg">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="" class="pic_name">Administator</a>
  <a href="dashboard.php" class="current">Manage Users</a>
  <a href="search.php">Search</a>

  </div>

<div id="main">

<div class ="openNav">
  <span onclick="openNav()">&#9776; Menu</span>
</div>

  <table style="margin-top: 0;width: 90%;margin-left: 5%;">
   <td colspan="7">
        <h4 style="margin-top: 0;color: orange">User Management</h4>
      </td>
    <tr>

      <th>Firstname</th>
      <th>Lastname</th>
      <th>Gender</th>
      <th>Username</th>
      <th>Email</th>
      <th>Modify</th>
      <th>Delete</th>

    </tr>

          

<?php

$query ="SELECT * from users ORDER by reg_date desc ";

$results = mysqli_query($db,$query);

while($row = mysqli_fetch_assoc($results)) { 
?>

<tr>
  <td align="center"><?php echo $row["firstname"]; ?></td>
  <td align="center"><?php echo $row["lastname"]; ?></td>
  <td align="center"><?php echo $row["gender"]; ?></td>
  <td align="center"><?php echo $row["username"]; ?></td>
  <td align="center"><?php echo $row["email"]; ?></td>
  <td align="center"><a href="modify.php?id=<?php echo $row["id"]; ?>"style="margin:0px;background:purple; color: white; text-decoration: none;font-weight: bold;padding: 5px;">Edit</a></td>
  <td align="center"><a href="deleteuser.php?id=<?php echo $row["id"]; ?>"onclick="return confirm('Are you sure about <?php echo $row["firstname"]; ?> <?php echo $row["lastname"]; ?>.')" style="margin:0px;background:red;text-decoration: none;font-weight: bold;padding: 5px;">Delete</a></td>

  
</tr>

<?php 

} 

?>
    
    
  </table>
  
  

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
