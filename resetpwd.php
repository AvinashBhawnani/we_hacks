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
  <link rel="stylesheet" type="text/css" href="css/others.css">


</head>
<body>
	<h1>CAREER GUIDANCE SYSTEM</h1>


<div>
	
	<?php
	require('config.php');

		$errors = array(); 

	

    // If form submitted, insert values into the database.
    if (isset($_POST['resetpwd'])){
    	$firstname = stripslashes($_POST['firstname']); // removes backslashes
		$firstname = mysqli_real_escape_string($db,$firstname);		
		$email = stripslashes($_POST['email']);
		$email = mysqli_real_escape_string($db,$email);
		$password = stripslashes($_POST['password']);
		$password = mysqli_real_escape_string($db,$password);
		$confirm = stripslashes($_POST['confirm']);
		$confirm = mysqli_real_escape_string($db,$confirm);
	
		 //check the existence of the email in the database
		$user_check_query = "SELECT * FROM users WHERE email='$email'";

        $result = mysqli_query($db, $user_check_query);

        $user = mysqli_fetch_assoc($result);

		 // if user exists              
          

            if ($user['email'] != $email ){            	
            	array_push($errors, $errors);

            	header( "refresh:3;url=resetpwd.php" ); 
            	echo "<center><h3>Email doesn't exists!</h3></center>";
            }
             if ($password != $confirm) {
            	array_push($errors, $errors);
            	echo "<center><h3>No match for password!</h3></center>";
            	header( "refresh:3;url=resetpwd.php" ); 

            }
         

		if(count($errors)==0){

		$password = md5($confirm);//encrypt the password before saving in the database

        $query = "update users set password='".$password."' where email='".$email."'";
        $result = mysqli_query($db,$query);
          
        echo "<script>alert('Password changed successfully.Thank you.');window.location = 'http://localhost/CareerGuidanceSystem/login.php';</script>";
        }
    }else{

?>

<form method="post" action=""name=""style="margin-top: 20em;">


		<div id="loginheder"><h2>Password Recovery</h2></div>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value=""required="">
		</div>
		<div class="input-group">
			<label>New Password</label>
			<input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 to 15 characters" minlength="8" maxlength="15" value=""required="">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="confirm" required="">
		
		
		<div>
			<button type="submit" name="resetpwd">Submit</button><a href="login.php"><button  class="btn">Back</button></a> 
 
	
		</div>
	
	</form>
	<?php 
      
     }

	 ?>
</div>
</body>
</html>