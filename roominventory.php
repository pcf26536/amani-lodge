<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>International Amani Lodge</title>
<link href="febe/style.css" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>

  <!--sa validate from-->
<script type="text/javascript">
function validateForm()
{

var y=document.forms["login"]["user"].value;
var a=document.forms["login"]["password"].value;
if ((y==null || y==""))
  {
  alert("you must enter your username");
  return false;
  }
  if ((a==null || a==""))
  {
  alert("you must enter your password");
  return false;
  }
 

}
</script>
<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" charset="utf-8">
    
    <script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/application.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css">
#apDiv1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 383px;
	top: 11px;
}
</style>
</head>

<body>
  <div id="apDiv1">
  <?php
    require_once 'admin_menu.php';
 ?> </div>
 <div style="width:600px; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%;">
  <br />
  <label style="margin-left:12px;">search</label> <input type="text" name="filter" value="" id="filter" /><br />
  
  <table cellpadding="1" cellspacing="1" id="resultTable">
          <thead>
            <tr bgcolor="#33FF00" style="margin-bottom:10px;">
              		<th>Arrival</th>
					<th>Departure</th>
					<th>Quantity Reserve</th>
					<th>Room Type</th>
					
                                        <th>Status</th>
            </tr>
          </thead>
          <tbody>
         <?php
			   $con = mysqli_connect("localhost","root","");
								if (!$con)
								  {
								  die('Could not connect: ' . mysqli_connect_error());
								  }
								
								mysqli_select_db($con, "argie_tamera");
								
								$result3 = mysqli_query($con, "SELECT * FROM reservation");
								
								
								while($row3 = mysqli_fetch_array($result3))
								  {
								 echo '<tr>';
									echo '<td>'.$row3['arrival'].'</td>';
									echo '<td>'.$row3['departure'].'</td>';
									echo '<td>'.$row3['no_room'].'</td>';
									
									echo '<td>';
                                                               $ro=$row3['room_id'];
                                                             $result4 = mysqli_query($con, "SELECT * FROM room where room_id='$ro'");
								
								
								while($row4 = mysqli_fetch_array($result4))
								  {
echo $row4['type'];
                                                                  }


									echo '</td>';
                                                                        
                                                                        echo '<td>'.$row3['status'].'</td>';
								 echo '</tr>';





								  }




         $result5 = mysqli_query($con,"SELECT sum(no_room) FROM reservation where  room_id='12'");
         $data1 = mysqli_fetch_array(mysqli_query($con,"SELECT sum(payable) FROM reservation where  room_id='12'"));
         while($row5 = mysqli_fetch_array($result5))
         {
             echo 'Total reserve Room of Tent:     ';
             echo $row5['sum(no_room)'] ? $row5['sum(no_room)'] : "0";
             echo " Rooms";
             echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Collected: Ksh ';
             echo $data1['sum(payable)'] ? $data1['sum(payable)'] : "0";
             echo '<br>';
         }
         $result6 = mysqli_query($con,"SELECT sum(no_room) FROM reservation where  room_id='11'");
         $data2 = mysqli_fetch_array(mysqli_query($con,"SELECT sum(payable) FROM reservation where  room_id='11'"));
         while($row6 = mysqli_fetch_array($result6))
         {
             echo 'Total reserve Room of Standard: ';
             echo $row6['sum(no_room)'] ? $row6['sum(no_room)'] : "0";
             echo " Rooms";
             echo '&nbsp;&nbsp;&nbsp;Total Collected: Ksh ';
             echo $data2['sum(payable)'] ? $data2['sum(payable)'] : "0";
             echo '<br>';
         }
         $result7 = mysqli_query($con,"SELECT sum(no_room) FROM reservation where  room_id='10'");
         $data3 = mysqli_fetch_array(mysqli_query($con,"SELECT sum(payable) FROM reservation where  room_id='10'"));
         //while($row6 = mysqli_fetch_array($result6))
         while($row7 = mysqli_fetch_array($result7))
         {
             echo 'Total reserve Room of Deluxe:   ';
             echo $row7['sum(no_room)'] ? $row7['sum(no_room)'] : "0";
             echo " Rooms";
             echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Collected: Ksh ';
             echo $data3['sum(payable)'] ? $data3['sum(payable)'] : "0";
             echo '<br>';
         }
         $result8 = mysqli_query($con,"SELECT sum(no_room) FROM reservation where  room_id='9'");
         $data4 = mysqli_fetch_array(mysqli_query($con,"SELECT sum(payable) FROM reservation where  room_id='9'"));
         while($row8 = mysqli_fetch_array($result8))
         {
             echo 'Total reserve Room of Superior: ';
             echo $row8['sum(no_room)'] ? $row8['sum(no_room)'] : "0";
             echo " Rooms";
             echo '&nbsp;&nbsp;&nbsp;&nbsp;Total Collected: Ksh ';
             echo $data4['sum(payable)'] ? $data4['sum(payable)'] : "0";
             echo '<br>';
             echo '<br>';
        }

         $data5 = mysqli_fetch_array(mysqli_query($con,"SELECT sum(payable) FROM reservation"));
         echo 'Total Amount: Ksh ';
         echo $data5['sum(payable)'] ? $data5['sum(payable)'] : "0";

         echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Refundable: Ksh ';
         echo mysqli_fetch_array(mysqli_query($con,"SELECT sum(payable) FROM reservation where status != 'out'"))['sum(payable)'];

         echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assets: Ksh ';
         echo mysqli_fetch_array(mysqli_query($con,"SELECT sum(payable) FROM reservation where status = 'out'"))['sum(payable)'];
			  
			  ?>
          </tbody>
       </table>
  
  
</div>
</body>
</html>
