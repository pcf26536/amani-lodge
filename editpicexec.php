<?php
mysqli_connect("localhost","root","") or die(mysqli_error());
mysqli_select_db("argie_tamera") or die(mysqli_error());





	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
			
			$location="photos/" . $_FILES["image"]["name"];
			$roomid=$_POST['firstname'];
			
			if(!$update=mysqli_query("UPDATE room SET image = '$location' WHERE room_id='$roomid'")) {
			
				echo mysqli_error();
				
				
			}
			else{
			
			header("location: room.php");
			exit();
			}
			}
	}


?>