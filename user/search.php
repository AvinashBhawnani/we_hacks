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
<body >

    <h1>CAREER GUIDANCE SYSTEM</h1>

       <ul>
        <li><a href="../test.php?q=1">Home</a></li>    
        <li><a href="../test.php?q=2">History</a></li>
        <li><a href="../college.php">View College</a></li>
        <li><a href="../view.php">Fields Available</a></li>
        <li><a href="../download.php">E-book Download</a></li>
        <li><a href="logout.php?q=test.php">&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
    
      </ul>


  <form method="post" action="trycatch.php" name="" style="margin-top: 20em;">
      		<div class="input-group"><label for="">Enter college/course name</label>
      <input type="text" name="search" placeholder="Enter college/course name" required/>
  </div>
      <button type="submit" value="Search">Search</button>
    </form>
</body>
</html>