<?php
				  if (isset($_GET['id']))
	{
			$con = mysqli_connect("localhost","root","");
			if (!$con)
			  {
			  die('Could not connect: ' . mysqli_connect_error());
			  }
			
			mysqli_select_db( $con, "argie_tamera");
			$messages_id = $_GET['id'];
            $result3 = mysqli_query($con, "SELECT * FROM reservation where confirmation ='$messages_id'");
								
								
								while($row3 = mysqli_fetch_array($result3))
								  {
            //$res=$row3['reservation_id'];
                                                                   }
			$update1=mysqli_query($con, "UPDATE reservation SET status ='out' WHERE reservation_id ='$messages_id'");
                        $update3=mysqli_query($con, "UPDATE payment_notification SET status ='CompletedOut' WHERE item_number ='$messages_id'");
                        $update2=mysqli_query($con, "UPDATE roominventory SET status ='out' WHERE confirmation = '$messages_id'");
            header("location: home_admin.php?out=" . true );
            mysqli_close($con);
			exit();
			}
			?>