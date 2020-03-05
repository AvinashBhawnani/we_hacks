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
  <link rel="stylesheet" type="text/css" href="css/ulli.css">
  <link rel="stylesheet" type="text/css" href="css/table.css">

</head>
<body >

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

<?php
include_once 'config.php';
?>


<?php
include_once 'config.php';
session_start();
  if(!(isset($_SESSION['username']))){
header("location:registrar.php");

}
else
{
$username=$_SESSION['username'];


include_once 'config.php';

}?>

<div id="main">

<!--The page content have to be brief and unambiguas--> 

<?php
  require('config.php');
  $errors = array();
 

    $errors = array(); 

  

    // If form submitted, insert values into the database.
    if (isset($_POST['update'])){
    $course = stripslashes($_POST['course']); // removes backslashes
    $course = mysqli_real_escape_string($db,$course);
    $position = stripslashes($_POST['position']); // removes backslashes
    $position = mysqli_real_escape_string($db,$position);

            

        //check the existence of the college info in the database

        $user_check_query = "SELECT * FROM field WHERE course='$course'";

        $result = mysqli_query($db, $user_check_query);

        $user = mysqli_fetch_assoc($result);

        if ($user['course'] == $course ){
              array_push($errors, $errors);
              header( "refresh:3;url=field.php" ); 

              echo "<center><h3>Course already exists!</h3></center>";
            }

            if(!preg_match("/^([a-zA-Z' ]+)$/",$course)){
                  array_push($errors, $errors);
                  header( "refresh:3;url=field.php" ); 
                  echo "<center><h3>Invalid course name given.</h3></center>";
                }      

    if(count($errors)==0){
        $query = "INSERT into field (`course`,`position`)VALUES('$course','$position')";
        $result = mysqli_query($db,$query);
        header( "refresh:3;url=fieldlist.php" );

        echo "<center><h3>Field added successfully.</h3></center>";
        }
    }else{

?>

<form method="post" name="" action="" style="margin-top: 20em;">

  <div id="loginheder"><h2>Field Update</h2></div>
    <div class="input-group">
      <label>Course</label>
      <input type="text" name="course" placeholder="course" required="" style="width: 90%;">
    </div>

    <div class="input-group">
      <label>Position</label>
      <select type="text" name="position" placeholder="Select Position" required="">
        <option value="">Position</option>
        <option value="Accountant">Acountant</option>
        <option value="Cashier">Cashier</option>
        <option value="Mass Media">Mass Media</option>
        <option value="Editor">Editor</option>
        <option value="Architecture">Architecture</option>
        <option value="Manager">Manager</option>
        <option value="Secretary">Secretary</option>
        <option value="Presenter">Presenter</option>
        <option value="Journalist">Journalist</option>
        <option value="Engineer">Engineer</option>
        <option value="Technician">Technician</option>
        <option value="Programmer,Web programmer">Programmer</option>
        <option value="Accountant,Cashier">Accountant and cashier</option>



        </select>
    </div>  

    <div>
      <button type="submit" name="update">Submit</button>
    </div></form>

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