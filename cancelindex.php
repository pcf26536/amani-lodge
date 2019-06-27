<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>International Amani Lodge</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<!--sa error trapping-->
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


<style type="text/css">
.style3 {font-size: 16px}
</style>
    <script type="text/javascript">
        function validateForm()
        {

            var b=document.forms["contact"]["email"].value;
            if (b==null || b==="")
            {
                alert("Pls. Enter your Email");
                return false;
            }

            var atpos=b.indexOf("@");
            var dotpos=b.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
            {
                alert("Not a valid e-mail address");
                return false;
            }
        }
    </script>
<script type="text/javascript">
function validateForm1()
{

var b=document.forms["contact"]["email"].value;
if (b==null || b==="")
  {
  alert("Pls. Enter your Email");
  return false;
  }

var atpos=b.indexOf("@");
var dotpos=b.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
}
</script>
</head>

<body>

<!-- TOP -->
<div id="top1"><a href="index.php"><img src="images/logo.jpg" border="0" style="margin-top:27px; margin-left:20px;" /></a></div>
<div id="top">

<ul class="menu">
<li class="home"><a href="index.php">H</a></li>
<li class="about"><a href="about.php">About</a></li>
<li class="contacts"><a href="contact.php" class="contacts">Contacts</a></li>
<li class="renting"><a href="gallery.php">GALLERY</a></li>
<li class="selling"><a href="rates.php">RATES</a></li>
</ul>


</div>




<!-- HEADER -->
<!-- CONTENT -->
<div id="content">


    <h4 style="width:600px; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%; height: 350px;">

<?php
    if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
        ?>
    <table cellpadding="1" cellspacing="1" id="resultTable">
    <thead>
    <tr bgcolor="#33FF00" style="margin-bottom:10px;">

        <h2><?php echo "$email"; ?> - Your Reservations </h2>
        <br>

        <?php
        $con = mysqli_connect("localhost", "root", "");
        if (!$con) {
            die('Could not connect: ' . mysqli_connect_error());
        }

        mysqli_select_db($con, "argie_tamera");

        $query = "SELECT users.firstname as firstname, users.lastname as lastname, users.contact as contact, reservation.reservation_id as reservation_id,
                  reservation.arrival as arrival, reservation.departure as departure, reservation.confirmation as confirmation,
                   reservation.payable as payable, reservation.result as result, reservation.room_id as room_id  
                   FROM users JOIN reservation ON reservation.user_id = users.user_id 
                   where users.email = '$email' and users.password ='$pass'";

        $result2 = mysqli_query($con, $query) or die(mysqli_error($con));

        /*$data = mysqli_fetch_array($result2);
        $rows = mysqli_num_rows($result2);
        echo "$rows";*/

        if ($result2) {
        ?>
                <table id="mytable" cellspacing="0">
                    <thead>
                    <tr>
                        <td width="191" id="label">Name</td>
                        <td width="73" id="label">Phone</td>
                        <td width="73" id="label">Arrival</td>
                        <td width="85" id="label">Departure</td>
                        <td width="60" id="label">confirmation number</td>
                        <td width="60" id="label">Paid</td>
                        <td width="96" id="label">Room Type</td>
                        <td width="60" id="label">No. of Nights</td>

                        <td width="90" id="label">Action</td>

                    </tr>
                    </thead>

                    <tbody>
                    <?php

                    while ($row = mysqli_fetch_array($result2)) {
                        echo '<tr>';
                        echo '<td class="contacts">' . $row['firstname'] . ' ' . $row['lastname'] . '</td>';
                        echo '<td class="contacts">' . $row['contact'] . '</td>';
                        echo '<td class="contacts">' . $row['arrival'] . '</td>';
                        echo '<td class="contacts">' . $row['departure'] . '</td>';
                        echo '<td class="contacts">' . $row['confirmation'] . '</td>';
                        echo '<td class="contacts">' . $row['payable'] . '</td>';
                        echo '<td class="contacts">';
                        $r = $row['room_id'];
                        $result1 = mysqli_query($con, "SELECT * FROM room WHERE room_id = '$r'");
                        while ($row1 = mysqli_fetch_array($result1)) {
                            echo $row1['type'];
                        }
                        echo '</td>';
                        echo '<td class="contacts">' . $row['result'] . '</td>';
                        echo '<td class="contacts">' . '<a href="cancelindex-exec.php?id=' . $row["reservation_id"] . '">' . 'Cancel' . '</a>' . '</td>';
                        echo '</tr>';

                    }

                    ?>

                    </tbody>
                </table>

        <?php
        } else {

                    ?>
                    <br />
                    <h4 style="align-content: center">YOU HAVE NO RESERVATIONS MADE YET</h4>
                    <br />
                    <input type="button" onClick="javascript:history.go(-1)" value="Go Back">
            <?php
        }
        ?>

    </table>
    <?php

    } else {
        ?>
    <form action="cancelindex-exec.php" method="post" onsubmit="return validateForm1()" name="contact">



    Email Address:<br />
    <input name="email" type="text" class="ed" />
    <br />

    <input name="Input" type="submit" value="cancel" id="button1" />

    </form>
</div>
        <?php
    }
?>
</div>
<!-- FOOTER -->

<div id="footer">

Contact us through: 0727827359 <br><a href="http://www.gmail.com">internationalamanilodge@gmail.com</a>

<p><a href="index.php">HOME</a> |<a href="about.php"> ABOUT US </a>|<a href="contact.php"> CONTACTS </a>|<a href="gallery.php"> GALLERY </a>|<a href="rates.php"> ROOM RATES </a> |<a href="terms.php">TERMS AND CONDITIONS</a></p>
</div>

<!-- BOTTOM -->

<div id="bottom">

<p>Copyright &copy; International Amani Lodge.</p>
</div>
</body>
</html>
