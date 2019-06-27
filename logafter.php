
<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$email = clean($_POST['email']);
	$password = clean($_POST['password']);
	
	//Input Validations
	if($email == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index2.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM reservation WHERE email='$email' AND password='$password'";
	$result=mysqli_query($qry);
	//Create query
	$qry1="SELECT * FROM reservation WHERE email='$email' AND password='$password'";
	$result=mysqli_query($qry1);
	
	//Check whether the query was successful or not
	if($result1) {
		if(mysqli_num_rows($result1) == 1) {
			//Login Successful
			session_regenerate_id();
			$reservation = mysqli_fetch_assoc($result);
			$_SESSION['SESS_FIRST_NAME'] = $reservation['firstname'];
			$_SESSION['SESS_LASTNAME'] = $reservation['lastname'];
			
			session_write_close();
			header("location: index2.php");
			exit();
		}else {
			//Login failed
			header("location: log.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>
