<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }

mysqli_select_db("argie_tamera", $con);

		$email = $_POST['email'];
		$user = $_POST['user'];
		$result1 = mysqli_query($con,"SELECT * FROM user where username='$user'");
while($row = mysqli_fetch_array($result1))
  {
  $password=$row['password'];
  }
$mail_To = $email;
                $mail_Subject = "Recovered Password from Mara lodge";
                $mail_Body = "Password: $password";
                mail($mail_To, $mail_Subject, $mail_Body);
		
		header('Location: admin_index.php');
?>