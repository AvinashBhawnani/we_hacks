<DOCTYPE html>
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
<body >

    <h1>CAREER GUIDANCE SYSTEM</h1>

  

 <ul>
        <li><a href="dash.php?q=0">Home</a></li>
        <li><a href="ebook.php">E-book Upload</a></li> 
        <li><a href="infoupload.php">College Update</a></li> 
        <li><a href="dash.php?q=2">Ranking</a></li>
        <li><a href="#">Quiz</a>
          <ul>
            <li><a href="dash.php?q=4">Add Quiz</a></li>
            <li><a href="dash.php?q=5">Remove Quiz</a></li>     
          </ul>
        </li>
        <li><a href="logout.php">&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
    
      </ul>

<div id="main">


<!--The page content have to be brief and unambiguas--> 

<?php

require("config.php");

$target_dir = "e-books/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$documentFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename=$_FILES["fileToUpload"]["name"];
$filesize=$_FILES["fileToUpload"]["size"];
$new_size = $filesize/1024;  




// Check if selected file is a actual document or fake document

// Check if file already exists
if (file_exists($target_file)) {
  header( "refresh:3;url=ebook.php" ); 
    echo "<center><h6>Sorry,e-book already exists.</h6></center>";
    $uploadOk = 0;
}
//Posting to the datebase

// Check file size

// Allow certain file formats
if($documentFileType != "pdf" && $documentFileType != "docx" && $documentFileType != "doc" && $documentFileType != "ppt") {

  header( "refresh:3;url=ebook.php" ); 
    echo "<center><h6>Sorry, only PDF,PPT,DOC & DOCX files are allowed.</h6></center>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  header( "refresh:3;url=ebook.php" ); 
// if everything is ok, try to upload file
} else {        


  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
       
        $sql = "INSERT INTO ebook (`location`,`filename`,`size`) VALUES ('$target_file','$filename','$new_size')";

        if(mysqli_query($db,$sql)){        
        header( "refresh:3;url=ebook.php" );
        echo "<center><h6>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h6></center>";
      }
    } else {
        header( "refresh:3;url=ebook.php" );
        echo "<center><h6>Sorry, there was an error uploading your file.</h6></center";
    }
}
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