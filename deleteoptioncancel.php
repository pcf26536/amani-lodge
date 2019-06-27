<?php
				  if (isset($_POST['yes']))
	{
			$con = mysqli_connect("localhost","root","");
			if (!$con)
			  {
			  die('Could not connect: ' . mysqli_error());
			  }
			
			mysqli_select_db("argie_tamera", $con);
			$email = $_POST['email'];
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysqli_query("DELETE FROM reservation WHERE email='$email'");
			header("location: cancelindex2.php");
			exit();
			
			mysqli_close($con);
			 if (isset($_POST['no']))
	{
			
			header("location: index.php");
			exit();
		
			}}
			?>