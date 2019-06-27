<?php
	//Start session
	session_start();
	
	//Connect to mysqli server
	$link = mysqli_connect("localhost","root","");
	if(!$link) {
		die('Failed to connect to server: ' . mysqli_error());
	}
	
	//Select database
	$db = mysqli_select_db("argie_tamera", $link);
	if(!$db) {
		die("Unable to select database");
	}
	
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
	
	//Create query
	$qry="SELECT * FROM reservation WHERE email='$email' AND password='$password'";
	$result=mysqli_query($qry);
	//while($row = mysqli_fetch_array($result))
//  {
//  $level=$row['position'];
//  }
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['user_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['position'];
			session_write_close();
			//if ($level="admin"){
			header("location: payment1.php");
			exit();
			//}
			//else{
			//header("location: front.php");
			//exit();
			//}
		}else {
			//Login failed
			header("location: personnalinfo.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>