<?php 
require("config.php");
 ?>
  <?php

$query = "SELECT * FROM field";
$result = mysqli_query($db, $query);
if (isset($_POST['export'])) {
  # code...

$num_column = mysqli_num_fields($result);   

$csv_header = '';
for($i=0;$i<$num_column;$i++) {
    $csv_header .= '"' . mysqli_fetch_field_direct($result,$i)->name . '",';
} 
$csv_header .= "\n";

$csv_row ='';
while($row = mysqli_fetch_row($result)) {
  for($i=0;$i<$num_column;$i++) {
    $csv_row .= '"' . $row[$i] . '",';
  }
  $csv_row .= "\n";
} 

/* Download as CSV File */
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=fields_available.csv');
echo $csv_header . $csv_row;
exit;
}
else{
?>
<form method="post" style="margin-top: 15em;background-color: white;">
  <button style="float: left; margin-bottom: 2em;border: 2px solid black;" name="export">Export to CSV</button>
</form>
 
<?php
}
?>
<?php
include_once 'config.php';
session_start();
  if(!(isset($_SESSION['username']))){
header("location:login.php");

}
else
{
$username=$_SESSION['username'];

}
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
  <link rel="stylesheet" type="text/css" href="css/ulli.css">

</head>
<body style="background-image: none;">

    <h1>CAREER GUIDANCE SYSTEM</h1>


       <ul>
        <li><a href="test.php?q=1">Home</a></li>    
        <li><a href="test.php?q=2">History</a></li>
        <li><a href="college.php">View College</a></li>
        <li><a href="view.php">Fields Available</a></li>
        <li><a href="download.php">E-book Download</a></li>
    
      </ul>
       
<!--The page content have to be brief and unambiguas--> 

  <table style="margin-top: 0;width: 50%;margin-left: 25%;">
   <td colspan="4">
        <h4 style="color: orange; margin-top: 0;">Fields Available</h4>
      </td>
    <tr>

      <th>Course</th>
      <th>Fields Available</th>
      
    </tr>

          

<?php

$query ="SELECT * from field";

$results = mysqli_query($db,$query);

while($row = mysqli_fetch_assoc($results)) { 
?>

<tr>
  <td align="center"><?php echo $row["course"]; ?></td>
  <td align="center"><?php echo $row["position"]; ?></td>
    
</tr>

<?php 

} 

?>
    
    
  </table>
  

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