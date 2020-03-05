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
    $name = stripslashes($_POST['name']); // removes backslashes
    $name = mysqli_real_escape_string($db,$name);
    $stream = stripslashes($_POST['stream']); // removes backslashes
    $stream = mysqli_real_escape_string($db,$stream);
    $county = stripslashes($_POST['county']); // removes backslashes
    $county = mysqli_real_escape_string($db,$county);     
    $course = stripslashes($_POST['course']); // removes backslashes
    $course = mysqli_real_escape_string($db,$course); //escapes special characters in a string
  
  
            

        //check the existence of the college info in the database

        $user_check_query = "SELECT * FROM college WHERE name='$name'";

        $result = mysqli_query($db, $user_check_query);

        $user = mysqli_fetch_assoc($result);

        if ($user['name'] == $name ){
              array_push($errors, $errors);
              header( "refresh:3;url=infoupload.php" ); 
              echo "<center><h3>College/University name already exists!</h3></center>";
            }

            if(!preg_match("/^([a-zA-Z' ]+)$/",$name)){
                  array_push($errors, $errors);
                  header( "refresh:3;url=infoupload.php" ); 
                  echo "<center><h3>Invalid College name given.</h3></center>";
                }      

    if(count($errors)==0){
        $query = "INSERT into college (`name`,`stream`,`county`,`course`)VALUES('$name','$stream','$county','$course')";
        $result = mysqli_query($db,$query);
        header( "refresh:3;url=col.php" );

        echo "<center><h3>Information uploaded successfully.</h3></center>";
        }
    }else{

?>

<form method="post" name="" action="infoupload.php" style="margin-top: 20em">

  <div id="loginheder"><h2>College Information Uplaods</h2></div>
    <div class="input-group">
      <label>College Name</label>
      <input type="text" name="name" placeholder="College Name" required="" style="width: 90%;">
    </div>

    <div class="input-group">
      <label>Stream</label>
      <select type="text" name="stream" placeholder="Select Stream" required="">
        <option value="">Stream</option>
        <option value="Certificate">Certificate</option>
        <option value="Diploma">Diploma</option>
        <option value="Degree">Degree</option>
        <option value="Certificate,Diploma">Certificate and diploma</option>
        <option value="Diploma,Degree">Diploma and degree</option>
        <option value="Certificate,Diploma,Degree">All Of the above</option>


        </select>
    </div>
    <div class="input-group">
      <label>County</label>
      <select type="text" name="county" placeholder="Select County" required="" >
        <option value="">County</option>
        <option value="Nakuru">Nakuru</option>
        <option value="Nairobi">Nairobi</option>
        <option value="Kiambu">Kiambu</option>
        <option value="Uasin Gishu">Uasin Gishu</option>
        <option value="Nyanza">Nyanza</option>
        <option value="Kakamega">Kakamega</option>
        <option value="lamu">lamu</option>
        <option value="Taita taveta">Taita taveta</option>
        <option value="Machakos">Machakos</option>
        <option value="Kiriyaga">Kiriyaga</option>
        <option value="Muranga">Muranga</option>
        <option value="Narok">Narok</option>
        <option value="Nyeri">Nyeri</option>
        <option value="All counties">From county 1 to 47</option>


        </select>
    </div>
    <div class="input-group">
      <label>Course</label>
      <select type="text" name="course" placeholder="Select Course" required="">
        <option value="">Course</option>
        <option value="commerce,business administration,business management">Business courses</option>
        <option value="Computer Science">Computer Science</option>
        <option value="Applied Computer Computer">Applied Computer Science</option>
        <option value="Aviation">Aviation</option>
        <option value="Civil,Mecahnic">Enginering</option>
        <option value="Media,Journalist,Presenter,Editor">Communication</option>
        <option value="Accouting,Finance">Finance</option>

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