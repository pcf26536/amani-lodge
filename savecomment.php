<?php

	$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }

mysqli_select_db($con, "argie_tamera");

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];	

	
	$sql=mysqli_query($con,"INSERT INTO comment (name, email, content) VALUES ('$name','$email','$message')");
  header("location: contact.php?success");
mysqli_close($con);

	
?>

