<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>International Amani Lodge.</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<?php
if (!isset($_POST['submit'])) {

    $errmsg_arr = array();

    $errflag = false;

    $con = mysqli_connect("localhost", "root", "");
    if (!$con) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    mysqli_select_db($con, "argie_tamera");

    function createRandomPassword()
    {


        $chars = "abcdefghijkmnopqrstuvwxyz023456789";

        srand((double)microtime() * 1000000);

        $i = 0;

        $pass = '';


        while ($i <= 7) {

            $num = rand() % 33;

            $tmp = substr($chars, $num, 1);

            $pass = $pass . $tmp;

            $i++;

        }


        return $pass;


    }
$confirmation = createRandomPassword();
    //echo "$confirmation";

    $arival = $_POST['start'];
    $departure = $_POST['end'];
    $adults = $_POST['adult'];
    $child = $_POST['child'];
    $nroom = $_POST['n_room'];
    $stat = 'Active';
    $roomid = $_POST['rm_id'];
    $nights = $_POST['result'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $code = $_POST['code'];
    //echo "$email $password";
    $query = "SELECT * from users where email = '$email' and password ='$password'";
    $result5 = mysqli_query($con, $query);
    //echo ;
    $error = null;
    if (mysqli_num_rows($result5)) {
        $user = mysqli_fetch_array($result5);
        $user_id = $user['user_id'];
        $name = $user['firstname'];
        $last = $user['lastname'];
        $address = $user['address'];
        $city = $user['city'];
        $cnumber = $user['contact'];
        $country = $user['country'];

        $result1 = mysqli_query($con, "SELECT * FROM room where room_id='$roomid'");
        $row = mysqli_fetch_array($result1);
        $rate = $row['rate'];
        $type = $row['type'];

        $payable = $rate * $nights * $nroom;

        $result = mysqli_query($con, "SELECT * FROM room WHERE room_id='$roomid'");

        $roomtype = mysqli_fetch_array($result)['type'];

        $num = mysqli_num_rows($result);

        $sql = "INSERT INTO reservation (user_id, arrival, departure, adults, child, result, room_id, no_room, payable, confirmation, status, code)
                VALUES
                ('$user_id', '$arival','$departure','$adults','$child','$nights','$roomid','$nroom','$payable','$confirmation', '', '$code')";


        mysqli_query($con, "INSERT INTO roominventory (arrival, departure, qty_reserve, room_id, confirmation, status) VALUES ('$arival','$departure','$nroom','$roomid','$confirmation','$stat')");
        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        }
    } else {
        $error = "User Does not exist!";
    }
    mysqli_close($con);
    }
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>International Amani Lodge.</title>
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
<!--sa error trapping-->

<script type="text/javascript">
function validateForm()
{

var y=document.forms["personal"]["name"].value;
var a=document.forms["personal"]["last"].value;
var b=document.forms["personal"]["address"].value;
var c=document.forms["personal"]["city"].value;
var d=document.forms["personal"]["zip"].value;
var e=document.forms["personal"]["country"].value;
var f=document.forms["personal"]["email"].value;
var g=document.forms["personal"]["cemail"].value;
var x=document.forms["personal"]["cnumber"].value;
var i=document.forms["personal"]["password"].value;

var code=document.forms["personal"]["codetype"].value;
var codetype=document.forms["personal"]["codetypecopy"].value;

var atpos=f.indexOf("@");
var dotpos=f.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=f.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }

if( codetype != code ) {
alert("Invalid Code Pls. try again........ thank you");
  return false;
}



if( f != g ) {
alert("email does not match");
  return false;
} 
if ((a=="Lastname" || a=="") || (b=="Address" || b=="") || (c=="City" || c=="") || (d=="ZIP Code" || d=="") || (e=="Country" || e=="") || (f=="Email" || f=="") || (g=="Confirm Email" || g=="")|| (x=="Contact Number" || x=="") || (y=="Firstname" || y=="") || (i=="Password" || i==""))
  {
  alert("all field are required!");
  return false;
  }
 
if (document.personal.condition.checked == false)
{
alert ('pls. agree the term and condition of this hotel');
return false;
}
else
{
return true;
}
}
</script>
<script type="text/javascript">
function validateForm1()
{
var r=document.forms["log"]["email"].value;
var g=document.forms["log"]["password"].value;
var atpos=r.indexOf("@");
var dotpos=r.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=r.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }  

if ((a==null || a==""))
  {
  alert("pls.enter your password");
  return false;
  }
}
</script>

<!--sa input that accept number only-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    
    //called when key is pressed in textbox
	$("#zip").keypress(function (e)  
	{ 
	  //if the letter is not digit then display error and don't type anything
	  if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
	  {
		//display error message
		$("#errmsg").html("Number Only").show().fadeOut("slow"); 
	    return false;
      }	
	});
	$("#cnumber").keypress(function (a)  
	{ 
	  //if the letter is not digit then display error and don't type anything
	  if( a.which!=8 && a.which!=0 && (a.which<48 || a.which>57))
	  {
		//display error message
		$("#errmsg1").html("Number Only").show().fadeOut("slow"); 
	    return false;
      }	
	});

  });
  </script>

</script>


 <script type="text/javascript">

   //Created / Generates the captcha function    
    function DrawCaptcha()
    {
        var a = Math.ceil(Math.random() * 10)+ '';
        var b = Math.ceil(Math.random() * 10)+ '';       
        var c = Math.ceil(Math.random() * 10)+ '';  
        var d = Math.ceil(Math.random() * 10)+ '';  
        var e = Math.ceil(Math.random() * 10)+ '';  
        var f = Math.ceil(Math.random() * 10)+ '';  
        var g = Math.ceil(Math.random() * 10)+ '';  
        var code = a + b +  c +  d +  e +  f +  g;
        document.getElementById("txtCaptcha").value = code
    }

    
 
    </script>
 <style type="text/css">
#Layer1 {
	position:absolute;
	width:249px;
	height:27px;
	z-index:1;
	top: 327px;
	margin-left:3px;
}
.style1 {
	font-size: 14px;
	font-weight: bold;
}
.style3 {
    font-size: 16px;
    font-weight: bold;
}
 </style>

</head>

<body onload="DrawCaptcha();">

<!-- TOP -->
<div id="top1"><a href="index.php"><img src="images/logo.jpg" width="74" border="0" style="margin-top:27px; margin-left:20px;" /></a></div>
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
<div id="content"><input type="button" onClick="window.print()" value="print">
 <input type="button" onClick="clear.print()" value="exit">
<div id="leftPan">

<div id="services">
<h2>RESERVATION DETAILS </h2>
<p>
  <ul>
      
 </ul>
    </p>
</p>
</div>

<div id="services">
International Amani Lodge.
</div>



</div><br /><br /><br />
<div id="featured">
  
  <br />
    <?php
        if ($error) {
            echo "<div class='style1'>$error</div>";
            ?>
            <div> </div>
            <input type="button" onClick="javascript:history.go(-1)" value="Go Back">
            <?php
            //header("location: index.php");
            //http_redirect("location: index.php");
        }
        else {
    ?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr"  method="post">
        <!-- the cmd parameter is set to _xclick for a Buy Now button -->
        <table width="460" border="0">
  <tr>
    <td colspan="2"><div align="center" class="style1">RESERVATION DETAILS </div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"></div></td>
  </tr>
  <tr>
    <td width="140"><div align="right">Check In Date </div></td>
    <td width="304"><?php echo $arival; ?></td>
  </tr>
  <tr>
    <td><div align="right">Check Out Date</div></td>
    <td><?php echo $departure; ?></td>
  </tr>
  <tr>
    <td><div align="right">Adults</div></td>
    <td><?php echo $adults; ?></td>
  </tr>
  <tr>
    <td><div align="right">Child</div></td>
    <td><?php echo $child; ?></td>
  </tr>
  <tr>
    <td><div align="right">Number of Rooms</div></td>
    <td><?php echo $nroom; ?></td>
  </tr>
  <tr>
    <td><div align="right">Room ID</div></td>
    <td><?php echo $roomid; ?></td>
  </tr><tr>
    <td><div align="right">Type of room  </div></td>
    <td><?php echo $roomtype; ?></td></tr>
  <tr>
    <td><div align="right">Number of nights</div></td>
    <td><?php echo $_POST['result']; ?></td>
  </tr>
  <tr>
    <td><div align="right">Firstname</div></td>
    <td><?php echo $name; ?></td>
  </tr>
  <tr>
    <td><div align="right">Lastname</div></td>
    <td><?php echo $last; ?></td>
  </tr>
  <tr>
    <td><div align="right">Address</div></td>
    <td><?php echo $address; ?></td>
  </tr>
  <tr>
    <td><div align="right">Town</div></td>
    <td><?php echo $city; ?></td>
  </tr>
  
  <tr>
    <td><div align="right">Country</div></td>
    <td><?php echo $country; ?></td>
  </tr>
  <tr>
    <td><div align="right">Email</div></td>
    <td><?php echo $email; ?></td>
  </tr>
  <tr>
    <td><div align="right">Contact Number</div></td>
    <td><?php echo $cnumber; ?></td>
  </tr><tr>
    <td><div align="right">Amount Paid (ksh)</div></td>
    <td><?php echo $payable; ?></td>
  </tr><tr>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <td colspan="2">
  <marquee><class="style3">TILL NUMBER : 827 - 359</marquee>
</table>
	 
	<input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="business" value="argiep_1323161081_biz@gmail.com" />
        <input type="hidden" name="item_name" value="<?php echo $type; ?>" />
        <input type="hidden" name="item_number" value="<?php echo $confirmation; ?>" />
        <input type="hidden" name="amount" value="<?php echo $payable; ?>" />
        <input type="hidden" name="no_shipping" value="1" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="currency_code" value="PHP" />
        <input type="hidden" name="lc" value="GB" />
        <input type="hidden" name="bn" value="PP-BuyNowBF" />
        <h5>Powered by : <img alt="m-pesa" border="0" src="images/MPESA.png" /> </h5>
        <!-- Payment confirmed -->
        <input type="hidden" name="return" value="https://tameraplazainn.x10.mx/showconfirm.php" />
        <!-- Payment cancelled -->
        <input type="hidden" name="cancel_return" value="http://tameraplazainn.x10.mx/cancel.php" />
        <input type="hidden" name="rm" value="2" />
        <input type="hidden" name="notify_url" value="http://tameraplazainn.x10.mx/ipn.php" />
        <input type="hidden" name="custom" value="any other custom field you want to pass" />
    </form>
    <?php
        }
    ?>
	
</div>
<div class="clear"> </div>

</div>

<!-- FOOTER -->

<div id="footer">

Contact us through: 0727827359

<p><a href="index.php">HOME</a> |<a href="about.php"> ABOUT US </a>|<a href="contact.php"> CONTACTS </a>|<a href="gallery.php"> GALLERY </a>|<a href="rates.php"> ROOM RATES </a> |<a href="rates.php">RATES</a></p>
</div>

<!-- BOTTOM -->

<div id="bottom">

<p>Copyright &copy; International Amani Lodge.</p>
</div>

</body>
</html>



</head>

