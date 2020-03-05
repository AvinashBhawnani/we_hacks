<!DOCTYPE html>
<html>
<head>

  <title>CAREER GUIDANCE SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">

  <link  rel="stylesheet" href="../css/bootstrap.min.css"/>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/heading.css">
  <link rel="stylesheet" type="text/css" href="../css/footer.css">
  <link rel="stylesheet" type="text/css" href="../css/button.css">
  <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/ulli.css">



</head>
<body style="background-image: none;">

    <h1>CAREER GUIDANCE SYSTEM</h1>

       <ul>
        <li><a href="../test.php?q=1">Home</a></li>    
        <li><a href="../test.php?q=2">History</a></li>
        <li><a href="../college.php">View College</a></li>
        <li><a href="../view.php">Fields Available</a></li>
        <li><a href="../download.php">E-book Download</a></li>
        <li><a href="logout.php?q=test.php">&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
    
      </ul>

      <h4 style="color: orange;margin-top: 8em;margin-bottom: 0;">Results found</h4>

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
    $stmt = $pdo->prepare("SELECT * FROM `college` WHERE `course` LIKE ? OR `name` LIKE ? OR `stream` LIKE ? OR`county` LIKE ?");
    $stmt->execute(["%" . $_POST['search'] . "%", "%" . $_POST['search'] . "%", "%" . $_POST['search'] . "%", "%" . $_POST['search'] . "%"]);
    $results = $stmt->fetchAll();
     ?>
<h2>Search Results</h2>
    <?php
    if (isset($_POST['search'])) {
      if (count($results) > 0) {
        foreach ($results as $r) {

          header("refresh:10;url=search.php");
          printf("<center><h5><div>%s - %s  -  %s</div></h5></center>", $r['course'],$r['name'], $r['stream']);
        }
      } else {
        header("refresh:4;url=search.php");
        echo "<center><h5>No results found</h5></center>";
      }
    }//==================================search for users=====================================
    ?>
</body>
</html>