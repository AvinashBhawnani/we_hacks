<?php 

session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>CAREER MANAGEMENT SYSTEM</title>


	<link rel="stylesheet" type="text/css" href="css/form.css">

	<link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/heading.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/button.css">
</head>
<body>

		<h1>CAREER GUIDANCE SYSTEM</h1>

	<?php
	require('config.php');

		$errors = array(); 

	

    // If form submitted, insert values into the database.
    if (isset($_POST['register'])){
    	$firstname = stripslashes($_POST['firstname']); // removes backslashes
		$firstname = mysqli_real_escape_string($db,$firstname);
		$lastname = stripslashes($_POST['lastname']); // removes backslashes
		$lastname = mysqli_real_escape_string($db,$lastname);
		$gender = stripslashes($_POST['gender']); // removes backslashes
		$gender = mysqli_real_escape_string($db,$gender); 		
		$username = stripslashes($_POST['username']); // removes backslashes
		$username = mysqli_real_escape_string($db,$username); //escapes special characters in a string
		$email = stripslashes($_POST['email']);
		$email = mysqli_real_escape_string($db,$email);
		$password = stripslashes($_POST['password']);
		$password = mysqli_real_escape_string($db,$password);
	
		 //check the existence of the username/email in the database
		$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";

        $result = mysqli_query($db, $user_check_query);

        $user = mysqli_fetch_assoc($result);


         if(!preg_match("/^([a-zA-Z' ]+)$/",$firstname . $lastname)){
            	  	array_push($errors, $errors);
            	  	header( "refresh:1;url=register.php" ); 
            	  	echo "<center><script>alert('Invalid firstname or lastname given');</script></center>";


            	  }


		 // if user exists              
            if ($user['username'] == $username ){
            	array_push($errors, $errors);

           		header( "refresh:1;url=register.php" ); 
            	echo "<center><script>alert('Username already exists!');</script></center>";
            }

            if ($user['email'] == $email ){            	
            	array_push($errors, $errors);

            	header( "refresh:1;url=register.php" ); 
            	echo "<center><script>alert('Email already exists!');</script></center>";
            }
         

		if(count($errors)==0){
        $query = "INSERT into users (`firstname`,`lastname`,`gender`,`username`, `email`, `password`) 
        VALUES 
        ('$firstname','$lastname','$gender','$username','$email','".md5($password)."')";
        $result = mysqli_query($db,$query);
          
        echo "<script>alert('Successfully registered.Thank you.');window.location = 'http://localhost/CareerGuidanceSystem/register.php';</script>";
        }
    }else{

?>


	<form action="register.php" method="post" name="">

		<div style="text-align: center;"><h2>Registration</h2></div>

		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="firstname" placeholder="First Name" required="">
		</div>

		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="lastname" placeholder="Last Name" required="">
		</div>

		

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Username" required="">
		</div>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" placeholder="Email" required="">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" minlength="8" maxlength="15" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 to 15 characters" required="">
		</div>

		<div>
			<b style="font-size: 2em;">Gender:</b>

			<div>
			  <input type="radio" name="gender" required="" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"><b style="font-size: 1.5em">Female</b>
			  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"><b style="font-size: 1.5em">Male</b>
			  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"><b style="font-size: 1.5em">Other</b>
			</div>
		</div>

		<div>
			<button type="submit" name="register">Register</button>
		</div>

		<p class="form">Am already registered! <a href="login.php">Login</a></p>

	</form>

<?php } ?>

</body>
</html>