<?php require_once('auth.php');?>
<?php
				  if (isset($_GET['id']))
	{
	
	echo '<form action="editroomexec.php" method="post">';
	
	//echo "<img width=200 height=180 alt='Unable to View' src='" . $row1["image"] . "'>";
	echo '<br>';
	echo '<input type="hidden" name="firstname" value="'. $_GET['id'] .'">';
			$con = mysqli_connect("localhost","root","");
			if (!$con)
  			{
  			die('Could not connect: ' . mysqli_connect_error());
  			}

			mysqli_select_db($con, "argie_tamera");
		
			$id=$_GET['id'];
			$result = mysqli_query($con, "SELECT * FROM room WHERE room_id = $id");

			while($row = mysqli_fetch_array($result))
  			{
			echo '<input type="hidden" name="roomid" value="'. $row['room_id'] .'">'; 
  			echo'room type: '.'<input type="text" name="roomtype" value="'. $row['type'] .'">'; 
			   echo '<br>';
			  echo'room rate: '.'<input type="text" name="roomrate" value="'. $row['rate'] .'">';
			  echo '<br>';
			  echo'room description: '.'<input type="text" name="description" value="'. $row['description'] .'">'; 
			   echo '<br>';
			  echo'Quantity: '.'<input type="text" name="qty" value="'. $row['qty'] .'">';
			   echo '<br>';
			  echo '<input name="" type="submit" value="Save" />';
  			}
	echo '</form>';
			}
			?>
			
			
