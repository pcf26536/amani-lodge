<?php
				  if (isset($_GET['id']))
	{
			$con = mysqli_connect("localhost","root","");
			if (!$con)
			  {
			  die('Could not connect: ' . mysqli_connect_error());
			  }
			
			mysqli_select_db("argie_tamera", $con);
			$messages_id = $_GET['id'];
			$result2 = mysqli_query($con,"SELECT * FROM comment where comment_id ='$messages_id'");
								
								
								while($row = mysqli_fetch_array($result2))
								  {
								  echo $row['content'];
								  }
			
			}
			?>

</body>
</html>
