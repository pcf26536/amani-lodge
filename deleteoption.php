<?php
				  if (isset($_POST['yes']))
	{
			$con = mysqli_connect("localhost","root","");
			if (!$con)
			  {
			  die('Could not connect: ' . mysqli_error());
			  }
			
			mysqli_select_db($con, "argie_tamera");
			$messages_id = $_POST['id'];
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysqli_query($con,"DELETE FROM room WHERE room_id='$messages_id'");
            mysqli_close($con);
			header("location: room.php");
			exit();
			}
			 if (isset($_POST['no']))
	{
			
			header("location: room.php");
			exit();
		
			}
			?>