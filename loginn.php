 <?php
 session_start();
	  $email =@ $_POST['email'];
	$password = @$_POST['password'];
	$log =@ $_POST['login'];
$con = mysqli_connect("localhost","root","");
if($log){
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

mysqli_select_db("argie_tamera", $con);
	
	

$query="SELECT * FROM reservation WHERE email='$email'and password='$password'";
$query=mysqli_query($query);
if($query)
	 {
		if(mysqli_num_rows($query) > 0) 
			{ echo "login successful";
			
				header("location: payment1.php");
			exit();
			//}
			//else{
			//header("location: front.php");
			//exit();
			//}
		    }
		else
			 { echo "login failed";
			//Login failed
			header("location: personnalinfo.php");
			exit();
			}
	}
			
	else    {
		die(mysqli_error());
	         }
}
?>
    