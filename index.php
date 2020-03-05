<?php 
session_start();
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
</head>
<body>

		<h1>CAREER GUIDANCE SYSTEM</h1>


	<marquee direction="left" loop="10" scrollamount="10" class="animation" ><h4>Administrative Panel</h4></marquee>

<div>
	
	<?php 
	require("config.php");

	if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($db,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($db,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM admin WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($db,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
        	while($row = mysqli_fetch_array($result)) {
            }
             $_SESSION["username"] = $username;
            
			header("Location: dashboard.php"); // Redirect user to dashboard.php
            }else{
				header( "refresh:3;url=index.php" ); 
                echo "<script>alert('Your password or username is incorrect.');window.location = 'http://localhost/CareerGuidanceSystem/index.php';</script>";
				}
    }else{

	 ?>
	<form action="" method="post" name="" style="margin-top: 8em;">
		<div id="loginheder"><h2>Administrative login</h2></div>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Username" required="">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="Password" id="myInput" required="">
		</div>

		<input type="checkbox" onclick="myFunction()" name="">  

		<b style="font-size: 1.5em;margin-left: .5em;">Show Password</b>

        <script>
         function myFunction() {
         var x = document.getElementById("myInput");
         if (x.type === "password") {
         x.type = "text";
         } 
         else {
           x.type = "password";
          }
            }
        </script>

		<div>
			<button type="submit" name="login">Login</button>		
		</div>

		

	</form>
	<?php 
      
     }

	 ?>
</div>

<!--Footer start-->
<footer>

<a href="#" target="" data-toggle="modal" data-target="#aboutus">About_us</a>
<a href="registrar.php">Registrar_Login</a></div>

<a  href="login.php">User Login</a></div>



</footer>

<!--footer end-->


<!-- Modal For Developers-->
<div class="modal fade title1" id="developer">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 12em;background-color: #212529;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:#fff; text-decoration: none;font-size: 32px;">Developers</span></h4>
      </div>
	  
      <div class="modal-body" style="background-color: white;padding: 2em;">
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="images/bgpic3.jpg" width=100 height=100 alt="Winnie the scientist" >
		 </div>
		<h5 style="float: left;"><b>Name:</b>Winnie Waweru</h5>
		<h5 style="float: left;"><b>Email:</b>winnie@gmail.com</h5>
		<h5 style="float: left;"><b>Education:</b>Egerton University,Kenya</h5></div>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal For about us-->
<div class="modal fade title1" id="aboutus">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 12em;background-color: #212529;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:#fff; text-decoration: none;font-size: 32px;">About Us</span></h4>
      </div>
	  
      <div class="modal-body" style="background-color: white;padding: 2em;">
        <p>
		<div class="row">
		<h5 style="float: left;"><b>Aptitude test:</b>This part contains a series of tests that are of general questions which a user is expected to take.After test completion a score is calculated for each test. Based on those results the system manipulates and calculates the best career for that user.</h5>
	    </div>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>