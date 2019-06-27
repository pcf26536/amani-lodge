
<?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
			$con = mysqli_connect("localhost","root","");
			if (!$con)
			  {
			  die('Could not connect: ' . mysqli_connect_error());
			  }
			
			mysqli_select_db($con, "argie_tamera");
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysqli_query($con, "DELETE FROM reservation WHERE reservation_id='$id'");
			header("location: cancelindex2.php");
            mysqli_close($con);
			exit();
        }
        header("location: index.php");
?>