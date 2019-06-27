<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>International Amani Lodge</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<!--sa error trapping-->



<style type="text/css">
<!--
.style2 {
	font-size: 12px;
	font-weight: bold;
}
#apDiv1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 219px;
	top: 203px;
}
-->
</style>
</head>

<body>

<!-- TOP -->
<div id="top1"><a href="index.php"><img src="images/logo.jpg" width="73" border="0" style="margin-top:27px; margin-left:20px;" /></a></div>
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
    
   <!--sa poip up-->
 
<link href="src/facebox.css" media="screen" rel="stylesheet" href="./febe/style.css" type="text/css" media="screen" charset="utf-8">
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

</head>

<body>
<div id="apDiv1"> PLEASE CHECK ON YOUR USERNAME AND PASSWORD
<div style="width:300px; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:20px;">
  <form id="form1" name="login" method="post" action="login.php" onsubmit="return validateForm()">
  <table width="286" align="center">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="92"><div align="right">UserName</div></td>
    <td width="178"><input type="text" name="user" /></td>
  </tr>
  <tr>
    <td><div align="right">Password:</div></td>
    <td>
      <input type="password" name="password" />
    </td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="login" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
    
  </form></div>
</div>
</body> 
    
    
    
    
    
</div>
<div class="clear"></div>

</div>

<!-- FOOTER -->

<div id="footer">

Contact us through: 0727827359 <br><a href="http://www.gmail.com">internationalamanilodge@gmail.com</a>

<p><a href="index.php">HOME</a> |<a href="about.php"> ABOUT US </a>|<a href="contact.php"> CONTACTS </a>|<a href="gallery.php"> GALLERY </a>|<a href="rates.php"> ROOM RATES </a> |<a href="terms.php">TERMS AND CONDITIONS</a></p>
</div>

<!-- BOTTOM -->

<div id="bottom">

<p>Copyright &copy; International Amani Lodge. Designed by <a href="#" target="_blank">SHEILA</a></p>
</div>
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</body>
</html>

