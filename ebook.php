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
echo '<span style="float:right;margin:10em;margin-bottom:2em; margin-right:1em;color:orange;
text-decoration:none;font-size:20px;">
&nbsp;Hello, 
<a href="#" style="text-decoration:none;">'.$username.'</a>&nbsp;|||&nbsp;
<a href="logout.php" style="text-decoration:none;">&nbsp;Signout</a>
</span>';


}?>

<div id="main">



<!--The page content have to be brief and unambiguas--> 


<form action="upload.php" method="post" enctype="multipart/form-data" style="margin-top:20em;">

    <div id="loginheder"><h2>Upload Ebook</h2></div>

    <div class="input-group">
    <label>Select E-Book to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" required="">
    </div>
    <button type="submit" value="Upload" name="submit">Submit</button>
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