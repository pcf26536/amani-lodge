<?php
	require_once('auth.php');
	if ( (isset($_GET['out']))) {
	    ?>
        <script>alert('Check out success!');</script>
        <?php
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>admin</title>
<input type="button" onClick="window.print()" value="print">
 <input type="button" onClick="clear.print()" value="exit">
<link href="css/styles.css" rel="stylesheet" type="text/css" />
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
<link rel="stylesheet" href="./febe/style.css" type="text/css" media="screen" charset="utf-8">
    
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
.style1 {
    font-size: 12px;
    font-weight: bold;
}
</style>
</head>

<body>
<div id="apDiv1">
<?php
require_once 'admin_menu.php';
 ?></div>
<div style="width:600px; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%;">
  <br /><label style="margin-left:12px;">search</label> <input type="text" name="filter" value="" id="filter" />&nbsp;&nbsp;&nbsp;
  <?php
  $con = mysqli_connect("localhost", "root", "");
  if (!$con)
  {
      die('Could not connect: ' . mysqli_connect_error());
  }

  mysqli_select_db($con, "argie_tamera");

    $data = mysqli_fetch_array(mysqli_query($con,"select sum(payable) from reservation where status !='out'"));
    $total = $data['sum(payable)'];
    echo "<span class='style1'>Total Refundable Amount = Ksh $total /=</span>";
  ?>
  <table cellpadding="1" cellspacing="1" id="resultTable">
          <thead>
            <tr bgcolor="#33FF00" style="margin-bottom:10px;">
              			  <table id="mytable" cellspacing="0">
  <tr>
    <td width="191" id="label">Name</td>
    <td width="73" id="label">Email</td>
    <td width="73" id="label">Phone</td>
    <td width="73" id="label">Arrival</td>
    <td width="85" id="label">Departure</td>
    <td width="60" id="label">Rooms</td>
    <td width="60" id="label">Paid</td>
    <td width="96" id="label">Room Type </td>
    <td width="60" id="label">No. of Nights</td>
       
    <td width="90" id="label">Action</td></thead>
  </tr>
          
          
          
          
             <?php
             $query = "SELECT users.firstname as firstname, users.email as email, users.lastname as lastname, users.contact as contact, reservation.reservation_id as reservation_id,
                  reservation.arrival as arrival, reservation.departure as departure, reservation.confirmation as confirmation,
                   reservation.payable as payable, reservation.result as result, reservation.room_id as room_id, reservation.no_room as no_room  
                   FROM reservation JOIN users ON reservation.user_id = users.user_id 
                   where reservation.status != 'out'";
								$result2 = mysqli_query($con, $query);
								
								
								while($row = mysqli_fetch_array($result2))
								  {
								 echo '<tr>';
    								echo '<td class="contacts">'.$row['firstname'].' ' .$row['lastname'].'</td>';
    								echo '<td class="contacts">'.$row['email'].'</td>';
									echo '<td class="contacts">'.$row['contact'].'</td>';
										echo '<td class="contacts">'.$row['arrival'].'</td>';
									
									echo '<td class="contacts">'.$row['departure'].'</td>';
                                    echo '<td class="contacts">'.$row['no_room'].'</td>';
									echo '<td class="contacts">'.$row['payable'].'</td>';
									echo '<td class="contacts">';
									$r=$row['room_id'];
									$result1 = mysqli_query($con, "SELECT * FROM room WHERE room_id = '$r'");
			while($row1 = mysqli_fetch_array($result1))
			{
			echo $row1['type'];
			}
            echo '</td>';
            echo '<td class="contacts">'.$row['result'].'</td>';
            echo '<td class="contacts">'.'<a href=out.php?id=' . $row["reservation_id"] . '>' . 'Check Out' . '</a>'.'</td>';
            echo '</tr>';

          }
			  
			  ?>
			  
			  
			  </table>

          </tbody>
  </table>
  
  
</div>
</body>
</html>
