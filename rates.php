<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>International Amani Lodge</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />


<!--sa nivo slider-->
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	
<!--sa calendar-->	
	<script type="text/javascript" src="js/datepicker.js"></script>
        <link href="css/demo.css"       rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
//<![CDATA[

/*
        A "Reservation Date" example using two datePickers
        --------------------------------------------------

        * Functionality

        1. When the page loads:
                - We clear the value of the two inputs (to clear any values cached by the browser)
                - We set an "onchange" event handler on the startDate input to call the setReservationDates function
        2. When a start date is selected
                - We set the low range of the endDate datePicker to be the start date the user has just selected
                - If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

        * Caveats (aren't there always)

        - This demo has been written for dates that have NOT been split across three inputs

*/

function makeTwoChars(inp) {
        return String(inp).length < 2 ? "0" + inp : inp;
}

function initialiseInputs() {
        // Clear any old values from the inputs (that might be cached by the browser after a page reload)
        document.getElementById("sd").value = "";
        document.getElementById("ed").value = "";

        // Add the onchange event handler to the start date input
        datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
}

var initAttempts = 0;

function setReservationDates(e) {
        // Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
        // until they become available (a maximum of ten times in case something has gone horribly wrong)

        try {
                var sd = datePickerController.getDatePicker("sd");
                var ed = datePickerController.getDatePicker("ed");
        } catch (err) {
                if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
                return;
        }

        // Check the value of the input is a date of the correct format
        var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

        // If the input's value cannot be parsed as a valid date then return
        if(dt == 0) return;

        // At this stage we have a valid YYYYMMDD date

        // Grab the value set within the endDate input and parse it using the dateFormat method
        // N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
        var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

        // Set the low range of the second datePicker to be the date parsed from the first
        ed.setRangeLow( dt );
        
        // If theres a value already present within the end date input and it's smaller than the start date
        // then clear the end date value
        if(edv < dt) {
                document.getElementById("ed").value = "";
        }
}

function removeInputEvents() {
        // Remove the onchange event handler set within the function initialiseInputs
        datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
}

datePickerController.addEvent(window, 'load', initialiseInputs);
datePickerController.addEvent(window, 'unload', removeInputEvents);

//]]>
</script>

<!--sa error trapping-->
<script type="text/javascript">
function validateForm()
{
var x=document.forms["index"]["start"].value;
if (x==null || x=="")
  {
  alert("you must enter your check in Date(click the calendar icon)");
  return false;
  }
var y=document.forms["index"]["end"].value;
if (y==null || y=="")
  {
  alert("you must enter your check out Date(click the calendar icon)");
  return false;
  }
}
</script>
<!--end sa nivo slider-->
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {
	font-size: 1.4em;
	font-weight: bold;
	color: #FFFFFF;
}
.style3 {	font-size: 16px;
	font-weight: bold;
}
-->
</style>
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
</head>

<body>

<!-- TOP -->

<div id="top1"><a href="index.php"><img src="images/logo.jpg" width="77" border="0" style="margin-top:27px; margin-left:20px;" /></a></div>
<div id="top">

<ul class="menu">
<li class="home"><a href="index.php">Home</a></li>
<li class="about"><a href="about.php">About</a></li>
<li class="contacts"><a href="contact.php">Contacts</a></li>
<li class="renting"><a href="gallery.php">GALLERY</a></li>
<li class="selling1"><a href="rates.php">RATES</a></li>


</ul>


</div>




<!-- HEADER -->

<div id="header">

<div id="formPan">
<h2 class="style2">RESERVATION FORM </h2>

<form method="post" action="testing.php" name="index" onsubmit="return validateForm()">
<div style="margin-top:20px; margin-left:10px;">
 <table width="186" border="0">
  <tr>
    <td width="69"><div align="right">
      <label>Start Date : </label>
    </div></td>
    <td width="101"><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="start" id="sd" value="" maxlength="10" readonly="readonly" /></td>
  </tr>
  <tr>
    <td><div align="right">
      <label>End Date : </label>
    </div></td>
    <td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="end" id="ed" value="" maxlength="10" readonly="readonly" /></td>
  </tr>
  <tr>
    <td><div align="right">
      <label>Adult : </label>
    </div></td>
    <td><select name="adult" class="ed" >
      <option>1</option>
      <option>2</option>
      <option>3</option>
	  <option>4</option>
	  <option>5</option>
	  <option>6</option>
    </select></td>
  </tr>
  <tr>
    <td><div align="right">
      <div align="right">
        <label>Child : </label>
      </div>
    </div></td>
    <td><select name="child" class="ed">
      <option>0</option>
      <option>1</option>
      <option>2</option>
	  <option>3</option>
	  <option>4</option>
	  <option>5</option>
	  <option>6</option>
    </select></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input name="Input" type="submit" value="Check Availability" id="button" /></td>
  </tr>
</form>
  <tr>
      <td colspan="3"><div><a rel="facebox" href="cancel.php">Check Reservations</a> </div><div><a rel="facebox" href="cancel.php">Cancel a Reservation</a> </div></td>
    </tr>
</table> 
 </div>    

 
</div>

<div id="mainimgPan">
  <div id="mainimg">
<div id="slider" class="nivoSlider" style="float:right;">
                <img src="images/toystory.jpg" alt="" />
                <img src="images/up.jpg" alt="" />
                <img src="images/walle.jpg" alt="" />
                <img src="images/nemo.jpg" alt=""/>
				<img src="images/basecamp.jpg" alt=""/>
				<img src="images/buffaloes.jpg" alt=""/>
				<img src="images/oup.jpg" alt=""/>
				<img src="images/ten.jpg" alt=""/>
      </div>
</div>


</div>
</div>

<!-- CONTENT -->

<div id="content">

<div id="leftPan">

<div id="services">
<h2><strong>OUR HOTEL AMeNITiES</strong></h2>
<p>
  <ul>
      <li>AIR CONDITIONING IN EVERY ROOM</li>
      <br />
	  <li>FREE BREAKFAST AND COFFEE  </li><br />
	  <li>BAR AND COFFEE SHOP </li><br />
	  <li>FUNCTION ROOM  </li><br />
	  <li>24 HOURS STAND BY GENERATOR </li><br />
	  <li>LAUNDRY AND PRESSING  </li><br />
	 <li>RESTAURANT </li><br />
	  <li>HOT AND COLD SHOWERS  </li><br />
	 <li>TELEPHONE AND CABLE TV </li><br />
	  <li>FREE WIFI</li><br />
	  <li>GAME PARK TOUR</li><br />
	  <li>SWIMMING POOL</li>
 </ul>
    </p>
</p>
</div>

<div id="services">
</div>



</div>
<div id="featured"><br />
 <div>International Amani Lodge ROOM RATES</div><br />
  <p class="feat1">&nbsp;<span class="style3">Superior</span><br />
      <img src="images/superior.jpg" alt="hghg" style="float:left;" /> | <span class="price">Price:</span> <span class="number">ksh 9,500.00</span><br />
    This room is composed of three king sized bed,with air conditioned and a free wifi connection. This room also has a comfort room wich is suitable for you.</p>
  <br />
  <p class="feat2">&nbsp;<span class="style3">Deluxe</span><br />
      <img src="images/deluxe.jpg" alt="ghg" style="float:left;" />| <span class="price">Price:</span> <span class="number">ksh 8,500.00</span><br />
 This room is a deluxe room with a double king sized bed with hot and cold shower and a free wifi connection. </p>
  <br />
  <p class="feat3">&nbsp;<span class="style3">Standard</span><br />
      <img src="images/standard.jpg" alt="hghg" style="float:left;" /> | <span class="price">Price:</span> <span class="number">ksh 7500.00</span><br />
   This room is composed of a queen sized bed with a an entertainment televesion set and a comfort room which is suitable for you. This room includes a wifi connection.</p>
   <br />
   <p class="feat4">&nbsp;<span class="style3">Tent</span><br />
   <img src="images/tent.jpg" alt="sfdf" style="float:left;" /> | <span class="price">Price:</span> <span class="number">ksh 6000.00</span><br />
This room has 2 double mahogany bed,a television set and a free wifi connection</p><br />

  <br /><br>
  <p><strong><a href="javascript:javascript:history.go(-1)">Go Back</a></strong></p>
</div>
<div class="clear"></div>

</div>

<!-- FOOTER -->

<div id="footer">

Contact us through: 0727827359

<p><a href="index.php">HOME</a> |<a href="about.php"> ABOUT US </a>|<a href="contact.php"> CONTACTS </a>|<a href="gallery.php"> GALLERY </a>|<a href="rates.php"> ROOM RATES </a> |<a href="terms.php">TERMS AND CONDITIONS</a></p>
</div>

<!-- BOTTOM -->

<div id="bottom">

<p>Copyright &copy; International Amani Lodge</p>
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
