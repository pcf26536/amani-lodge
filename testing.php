<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>International Amani Lodge</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<!--sa error trapping-->
<script type="text/javascript">
function validateForm()
{

var y=document.forms["room"]["no_rooms"].value;

if ((y==null || y==""))
  {
  alert("all field are required!");
  return false;
  }

}
</script>
<!--sa minus date-->
<script type="text/javascript">
	// Error checking kept to a minimum for brevity
 
	function setDifference(frm) {
	var dtElem1 = frm.elements['start'];
	var dtElem2 = frm.elements['end'];
	var resultElem = frm.elements['result'];
	 
// Return if no such element exists
	if(!dtElem1 || !dtElem2 || !resultElem) {
return;
	}
	 
	//assuming that the delimiter for dt time picker is a '/'.
	var x = dtElem1.value;
	var y = dtElem2.value;
	var arr1 = x.split('/');
	var arr2 = y.split('/');
	 
// If any problem with input exists, return with an error msg
if(!arr1 || !arr2 || arr1.length != 3 || arr2.length != 3) {
resultElem.value = "Invalid Input";
return;
	}
	 
var dt1 = new Date();
dt1.setFullYear(arr1[2], arr1[1], arr1[0]);
var dt2 = new Date();
dt2.setFullYear(arr2[2], arr2[1], arr2[0]);

resultElem.value = (dt2.getTime() - dt1.getTime()) / (60 * 60 * 24 * 1000);
}
</script>



<!--sa input that accept number only-->
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>

<!--end sa nivo slider--><?php
	
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];	
	
?>

<style type="text/css">
<!--
.style2 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</head>

<body>

<!-- TOP -->
<div id="top1"><a href="index.php"><img src="images/logo.jpg" width="78" border="0" style="margin-top:27px; margin-left:20px;" /></a></div>
<div id="top">

<ul class="menu">
<li class="home"><a href="index.php">Home</a></li>
<li class="about"><a href="about.php">About</a></li>
<li class="contacts"><a href="contact.php">Contacts</a></li>
<li class="renting"><a href="gallery.php">GALLERY</a></li>
<li class="selling"><a href="rates.php">RATES</a></li>


</ul>


</div>




<!-- HEADER -->
<!-- CONTENT -->
<div id="content">

<div id="leftPan">

<div id="services">
<h2>RESERVATION DETAILS </h2>
<p>
  <ul>
      Check In Date :<?php echo $arival; ?><br />
      Check Out Date :<?php echo $departure; ?>  <br />
	  Adults : <?php echo $adults; ?><br />
	  Child :<?php echo $child; ?><br />
	  
 </ul>
    </p>
</p>
</div>

<div id="services">
International Amani Lodge
</div>



</div>
<div id="featured"><br />
 <div>
 <form action="personnalinfo.php" method="post" onsubmit="return validateForm()" name="room">
  <input name="start" type="hidden" value="<?php echo $arival; ?>" />
  <input name="end" type="hidden" value="<?php echo $departure; ?>" />
  <input name="adult" type="hidden" value="<?php echo $adults; ?>" />
  <input name="child" type="hidden" value="<?php echo $child; ?>" />
  <span class="style2">NUMBER OF ROOM/ROOMS:</span> 
  <input id="txtChar" min="1" max="15" value="1" onkeypress="return isNumberKey(event)" type="number" maxlength="2" name="no_rooms" class="ed" required/>
 </div><br />
 <?php
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
    die('Could not connect: ' . mysqli_connect_error());
  }

mysqli_select_db( $con, "argie_tamera");

$result = mysqli_query($con,"SELECT * FROM room");

while($row = mysqli_fetch_array($result))
  {
  $a=$row['room_id'];
  $query = mysqli_query($con,"SELECT sum(qty_reserve) FROM roominventory where arrival >= '$arival'
                                      and departure <= '$departure' and room_id='$a'");
while($rows = mysqli_fetch_array($query))
  {
  $inogbuwin=$rows['sum(qty_reserve)'];
  }
  $angavil = $row['qty'] - $inogbuwin;
    if ( !($adults > $row['max_adult'] && $angavil < 2 ) && !($child > $row['max_child'] && $angavil < 2) ) {
        $minA = ceil($adults/$row['max_adult']);
        $minC = ceil($child/$row['max_child']);
        $min = 1;
        //echo "min A - $minA";
        //echo "min C - $minC";
        $minA > $minC ? $min = $minA : $min = $minC;
        //echo "Min $min";
        echo '<div style="height: 117px;">';
	  echo '<div style="float: left; width: 100px; margin-left: 50px;">';
	  echo "<img width=92 height=72 alt='Unable to View' src='" . $row["image"] . "'>";
	  echo '</div>';
	  echo '<div style="float: right; width: 300px; margin-top: 10px;margin-left: 50px">';
	  echo '<span class="style5">'.'Avalable Rooms: ';
	  if ($angavil > 0){
	                echo "$angavil";
					echo '<input name="roomid" type="radio" value="' .$row["room_id"]. '" required/>';
                    echo '<input id="' .$row["room_id"]. '" type="hidden" value="' .$angavil. '"/>';
					echo '<input type="submit" name="Submit" value="reserve" onclick="setDifference(this.form);"/>';
					}
				if ($angavil <= 0){
				echo '<span class="style5">'.'fully occupied'.'</span>';
				}
        echo '</span>';
	  echo '<br>';		
	  echo '<span class="style5">'.'Room Type: '.$row['type'].'</span><br>';
	  echo '<span class="style5">'.'Room Rate: '.$row['rate'].'</span><br>';
          echo '<span class="style5">'.'Max Child: '.$row['max_child'].'</span><br>';
          echo '<input name="mchild" type="hidden" value="' .$row["max_child"]. '" />';
        echo '<input name="avail" type="hidden" value="' .$angavil. '" />';
	  echo '<span class="style5">'.'Max Adult: '.$row['max_adult'].'</span><br>';
          echo '<input name="madult" type="hidden" value="' .$row["max_adult"]. '" />';
	  echo '<span class="style5">'.'Room Description: '.$row['description'].'</span><br>';
	  echo '</div>';
        echo '</div>';
    }
}
 echo '<input id="min" type="hidden" value="' .$min. '"/>';
mysqli_close($con);
?> 
<input type="hidden" name="result" id="result" />
</form>
</div>
<div class="clear"></div>

</div>

<!-- FOOTER -->

<div id="footer">

Contact us through: 0727827359

<p><a href="index.php">HOME</a> |<a href="about.php"> ABOUT US </a>|<a href="contact.php"> CONTACTS </a>|<a href="gallery.php"> GALLERY </a>|<a href="rates.php"> ROOM RATES </a></p>
</div>

<!-- BOTTOM -->

<div id="bottom">

<p>Copyright &copy; International Amani Lodge. Designed by <a href="#" target="_blank">SHEILA</a></p>
</div>
<script type="text/javascript" src="scripts/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
<script>
    $(document).ready(function () {
        $('input:radio[name="roomid"]').click(function () {
            if ($(this).prop('checked')) {
                //alert($('#' + $(this).val()).val());
                $('#txtChar').attr('max', $('#' + $(this).val()).val());
                $('#txtChar').attr('min', $('#min').val());
                $('#txtChar').val($('#min').val());
            }
        });
    });
</script>
</body>
</html>
