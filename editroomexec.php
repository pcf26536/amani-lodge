<?php
session_start();

$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }

mysqli_select_db($con, "argie_tamera");
$roomid = $_POST['roomid'];
$roomtype=$_POST['roomtype'];
$roomrate=$_POST['roomrate'];
$description=$_POST['description'];
$qty=$_POST['qty'];

mysqli_query($con, "UPDATE room SET type='$roomtype', rate='$roomrate', description='$description', qty='$qty' WHERE room_id='$roomid'");
header("location: room.php");
mysqli_close($con);
?> 