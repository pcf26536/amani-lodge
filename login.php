<?php
	//Start session
	session_start();
	
	//Connect to mysqli server
	$link = mysqli_connect("localhost","root","");
	if(!$link) {
		die('Failed to connect to server: ' . mysqli_connect_error());
	}
	
	//Select database
	$db = mysqli_select_db($link, "argie_tamera");
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str, $con) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($con, $str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['user'], $link);
	$password = clean($_POST['password'], $link);
	
	//Create query
	$qry="SELECT * FROM auth WHERE username='$login' AND password='$password'";
	$result=mysqli_query($link, $qry);
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
			header("location: home_admin.php");
			exit();
			//}
			//else{
			//header("location: front.php");
			//exit();
			//}
		}else {
			
			//Login failed
			header("location: admin_index fail.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>