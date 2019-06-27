<?php
				  if (isset($_GET['id']))
	{
			$con = mysqli_connect("localhost", "root", "");
			if (!$con)
			  {
			  die('Could not connect: ' . mysqli_error());
			  }
			
			mysqli_select_db("argie_tamera", $con);
			$messages_id = $_GET['id'];
			$result = mysqli_query("SELECT * FROM amenities WHERE amenities_id = $messages_id");
			while($row = mysqli_fetch_array($result))
			{
			echo '<div style="width: 280px;" align="center">';
			echo "<img alt='Unable to View' src='" . $row["pic"] . "'>";
			echo '</div>';
			echo '<div style="width: 280px;" align="justify">';
			echo $row['des'];
			echo '</div>';
			}
			
			mysqli_close($con);
			}
			?>