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
  
</head>
<body style="background-color: #c2c2c2;">

    <h1>CAREER GUIDANCE SYSTEM</h1>

  

<div id="mySidenav" class="sidenav">
  <img src="images/bgpic1.jpg">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="" class="pic_name">Administator</a>
  <a href="dashboard.php" class="current">Manage Users</a>
  <a href="search.php">Search</a>

 
</div>

<div id="main">

<div class="openNav">
  <span onclick="openNav()">&#9776; Menu</span>
</div>

<!--The page content have to be brief and unambiguas--> 
<?php 
require("config.php");

$id=$_REQUEST['id'];
$query = "SELECT * from users where id='".$id."'"; 
$results = mysqli_query($db, $query) or die ( mysqli_error($db));
$row = mysqli_fetch_assoc($results);

if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$firstname =$_REQUEST['firstname'];
$lastname =$_REQUEST['lastname'];
$gender =$_REQUEST['gender'];

$update="update users set firstname='".$firstname."',lastname='".$lastname."',gender='".$gender."' where id='".$id."'";
mysqli_query($db, $update) or die(mysqli_error($db));
echo "<center><h6><strong>Successfully modified.</strong></h6></center>";
header("refresh:3,url=dashboard.php");

}else {


 ?>
  <form action="" method="post" name="" style="margin-top: 0;">
    <h2 style="margin-top: 0; color: #000;">User Profile</h2>

    <input type="hidden" name="new" value="1" />


    <input name="id" type="hidden" value="<?php echo $row['id'];?>" />

     <div class="input-group">
      <label>Full Name</label>
      <input type="text" name="firstname" placeholder="Full Name" required value="<?php echo $row['firstname'];?>">
    </div>

    <div class="input-group">
      <label>Last Name</label>
      <input type="text" name="lastname" placeholder="Last Name" required value="<?php echo $row['lastname'];?>">
    </div>

    <div>
      <b style="font-size: 2em;">Gender:</b>

      <div>
        <input type="radio" name="gender" required="" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"><b style="font-size: 1.5em">Female</b>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"><b style="font-size: 1.5em">Male</b>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"><b style="font-size: 1.5em">Other</b>
      </div>
    
    <div>
      <button type="submit" name="submit">Submit</button>
    </div>


  </form>

<?php } ?>

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