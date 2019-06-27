<?php
$con = mysqli_connect("localhost","root","") or die(mysqli_connect_error());
mysqli_select_db($con, "argie_tamera") or die(mysqli_error($con));


	if (!isset($_FILES['image']['tmp_name'])) {
	echo "Shitt";
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
			$type=$_POST['type'];
			$rate=$_POST['rate'];
			$desc=$_POST['desc'];
			$qty=$_POST['qty'];
            $adults=$_POST['max_adult'];
            $children=$_POST['max_child'];

			
			$update=mysqli_query($con, "INSERT INTO room (type, rate, description, image, qty, max_adult, max_child)
VALUES
('$type','$rate','$desc','$location','$qty', '$adults', '$children')") or mysqli_error($con);
			
			
			header("location: home_admin.php?room=" . true);
			exit();
		
			}
	}


?>
