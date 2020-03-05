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

}?>
 

<div id="mySidenav" class="sidenav">
  <img src="images/bgpic1.jpg">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="" class="pic_name">Administator</a>
  <a href="dashboard.php">Manage Users</a>
  <a href="search.php" class="current">Search</a>

  </div>

  <div id="main">


<div class ="openNav">
  <span onclick="openNav()">&#9776; Menu</span>
</div>
<h4 style="color: orange;margin-top: 0;">Results found</h4>

<?php//===============================search for users-======================================
if (isset($_POST['search'])) {
  require "config.php";
}
 ?>

    <!-- user foreach to gather information from the input-->
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'career');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
try {
  $pdo = new PDO(
    "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
    DB_USER, DB_PASSWORD, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false ]
  );
} catch (Exception $ex) {
  die($ex->getMessage());
}
    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `firstname` LIKE ? OR `username` LIKE ? OR `lastname` LIKE ? OR`email` LIKE ?");
    $stmt->execute(["%" . $_POST['search'] . "%", "%" . $_POST['search'] . "%", "%" . $_POST['search'] . "%", "%" . $_POST['search'] . "%"]);
    $results = $stmt->fetchAll();
     ?>
<h2 style="margin-top: 0;">Search Results</h2>
    <?php
    if (isset($_POST['search'])) {
      if (count($results) > 0) {
        foreach ($results as $r) {

          header("refresh:10;url=search.php");
          printf("<center><h5><div>%s - %s  -  %s</div></h5></center>", $r['firstname'],$r['lastname'], $r['email']);
        }
      } else {
        header("refresh:4;url=search.php");
        echo "<center><h5>No results found</h5></center>";
      }
    }//==================================search for users=====================================
    ?>

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