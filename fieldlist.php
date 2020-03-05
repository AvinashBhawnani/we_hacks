<?php
session_start();
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
  <link rel="stylesheet" type="text/css" href="css/ulli.css">


</head>
<body style="background-image: none;" >

    <h1>CAREER GUIDANCE SYSTEM</h1>


        <ul>
        <li><a href="dash.php?q=0">Home</a></li>
        <li><a href="ebook.php">E-book Upload</a></li> 
        <li><a href="infoupload.php">College Update</a></li> 
        <li><a href="field.php">Field Update</a></li> 
        <li><a href="dash.php?q=2">Ranking</a></li>
        <li><a href="#">Quiz</a>
          <ul>
            <li><a href="dash.php?q=4">Add Quiz</a></li>
            <li><a href="dash.php?q=5">Remove Quiz</a></li>     
          </ul>
        </li>   
      </ul>
       
<!--The page content have to be brief and unambiguas--> 

  <table style="margin-top: 8em; width: 40%;margin-right: 30%; margin-left: 30%;">

        <td colspan="4">
        <h3 style="margin-top: 0;color: orange">Available field</h3>
        </td>
    <tr>

      <th>Courses</th>
      <th>Fields</th>
      <th>Delete</th>
      
    </tr>

          

<?php

$query ="SELECT * from field ORDER by id desc ";

$results = mysqli_query($db,$query);

while($row = mysqli_fetch_assoc($results)) { 
?>

<tr>
  <td align="center"><?php echo $row["course"]; ?></td>
  <td align="center"><?php echo $row["position"]; ?></td>
  <td align="center"><a href="delfield.php?id=<?php echo $row["id"]; ?>"onclick="return confirm('Are you sure?!')" style="margin:0px;background:red;text-decoration: none;font-weight: bold;padding: 5px;color: white;">Delete</a></td>

  
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