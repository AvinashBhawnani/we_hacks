
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
        <li><a href="test.php?q=1" >Amplitude test</a></li>    
        <li><a href="test.php?q=2">History</a></li>
        <li><a href="">View College</a></li>
        <li><a href="">Fields Available</a></li>
        <li><a href="download.php">E-book Download</a></li>   
  </ul>


   <table style="width: 50%;margin-left: 25%;">
    <tr>
      <td colspan="6">
        <h4 style="color: orange;margin-bottom: 2em;">Ebook Download</h4 style="color: orange;margin-bottom: 2em;">
      </td>
    <tr>
    <tr>
      <td>Ebook</td>
      <td>Size(KB)</td>
      <td>Download</td>
    
    </tr>
<?php

require("config.php");


$query ="SELECT * from ebook";

$results = mysqli_query($db,$query);

while($row = mysqli_fetch_assoc($results)) { 
?>

<tr>
  
 
  <td align="center"><?php echo $row["filename"]; ?></td>
  <td align="center"><?php echo $row["size"];?></td>
  <td><a href="<?php echo $row['location'] ?>" target="">view file</a></td>


</tr>

<?php 

} 

?>
    
    
  </table>

</body>
</html>  
