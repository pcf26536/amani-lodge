<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }

mysqli_select_db($con, "argie_tamera");
	
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];	
	$no_rooms = $_POST['no_rooms'];
	$roomid = $_POST['roomid'];
	$results = floor($_POST['result']);

$result = mysqli_query($con,"SELECT * FROM room WHERE room_id='$roomid'");

$roomtype = null;
while($row1 = mysqli_fetch_array($result))
  {
  $roomtype=$row1['type'];
  }
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>International Amani Lodge</title>
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

var e=document.forms["personal"]["country"].value;
var f=document.forms["personal"]["email"].value;
var g=document.forms["personal"]["cemail"].value;
var x=document.forms["personal"]["cnumber"].value;
let i=document.forms["personal"]["password"].value;
let m=document.forms["personal"]["password2"].value;


var atpos=f.indexOf("@");
var dotpos=f.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=f.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }





if( f != g ) {
alert("email does not match");
  return false;
}
if( i !== m ) {
    alert("Passwords do not match");
    return false;
}
if ((a=="Lastname" || a=="") || (b=="Address" || b=="") || (c=="City" || c=="") ||  (e=="Country" || e=="") || (f=="Email" || f=="") || (g=="Confirm Email" || g=="")|| (x=="Contact Number" || x=="") || (y=="Firstname" || y=="") || (i=="Password" || i==""))
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

if ((a==null || a===""))
  {
  alert("pls.enter your password");
  return false;
  }
}
</script>
<script language="Javascript">
<!--
function ValidateAlpha()
{
var keyCode = window.event.keyCode;
if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
{
window.event.returnValue = false;
alert("Enter only letters");
}
}
-->
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


 

    
 
    </script>
 <style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:249px;
	height:27px;
	z-index:1;
	top: 396px;
	margin-left:3px;
	left: 140px;
}
.style1 {
	font-size: 12px;
	font-weight: bold;
}
.style3 {font-size: 12px; font-weight: bold; color: #FF6600; }
-->
 </style>
</head>

<body onload="DrawCaptcha();">

<!-- TOP -->
<div id="top1"><a href="index.php"><img src="images/logo.jpg" width="76" height="54" border="0" style="margin-top:27px; margin-left:20px;" /></a></div>
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
<p class="style1">
  <ul class="style1">
        <h3>Payment</h3>
        <div><img src="images/mpesa2.png" alt="mpesa"/></div>
        <?php
        $result1 = mysqli_query($con,"SELECT * FROM room where room_id='$roomid'");
        $rate = null;
        while($row = mysqli_fetch_array($result1))
        {
            $rate=$row['rate'];
            $type=$row['type'];

        }
        $payable= $rate*$results*$no_rooms;
        ?>
        TILL NUMBER : 827-359 <br/>
        Payable : Ksh <?php echo $payable; ?> /=<br /><br />
      Check In Date : <?php echo $arival; ?><br />
      Check Out Date : <?php echo $departure; ?>  <br />
	  Adults : <?php echo $adults; ?><br />
	  Child : <?php echo $child; ?><br />
	  Number of Rooms : <?php echo $no_rooms; ?><br />
	  Room Type : <?php echo $roomtype; ?><br />
      Number Of Nights : <?php echo $results; ?><br />
 </ul>
    </p>
</p>
</div>

<div id="services">
International Amani Lodge
</div>



</div><br /><br /><br />
<div id="featured">
  
  <br />
    <label for="existing" class="style1" style="margin-left: 80px;">Use Existing User</label>
    <input type="radio" name="type" value="existing" id="existing"/>
    <label for="new" class="style1" style="margin-left: 80px;">Register New User</label>
    <input type="radio" name="type" value="new" id="new" style="margin-bottom: 10px;"/>

  <div id="existing-user" style="display: none">
  <form action="payment1.php" method="post" style="height: 140px; margin-top: -5px;" onsubmit="return validateForm1()" name="log">
  <input name="start" type="hidden" value="<?php echo $arival; ?>" />
  <input name="end" type="hidden" value="<?php echo $departure; ?>" />
  <input name="adult" type="hidden" value="<?php echo $adults; ?>" />
  <input name="child" type="hidden" value="<?php echo $child; ?>" />
  <input name="n_room" type="hidden" value="<?php echo $no_rooms; ?>" />
  <input name="rm_id" type="hidden" value="<?php echo $roomid; ?>" />
    <input name="rm_type" type="hidden" value="<?php echo $roomtype; ?>" />
  <input name="result" type="hidden" value="<?php echo $results; ?>" />
  <table width="502" border="0">
      <thead></thead>
    <tr>
      <td colspan="3"><div align="right" class="style1"></div></td>
      </tr>
    <tr>
      <td width="133"><div align="right" class="style1">Email:</div></td>
      <td width="262"><input name="email" type="text" class="ed" id="last" size="35" required />
      <span class="style3">*</span></td>
      <td width="93">&nbsp;</td>
    </tr>
  <tr>
      <td><div align="right" class="style1">M-Pesa Transaction Code:</div></td>
      <td><input name="code" type="text" class="ed" id="code" minlength="10" maxlength="10" size="35" pattern="[A-Za-z0-9]+" required/>
          <span class="style3">*</span></td>
      <td>&nbsp;</td>
  </tr>
    <tr>
      <td><div align="right" class="style1">Password:</div></td>
      <td><input name="password" type="password" class="ed" id="address" minlength="6"  size="35" required />
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td><input name="login" type="submit" value="login" /></td>
      <td>&nbsp;</td>
    </tr>
	</table>
 </form> 
 <br /> <br /> <br />
  </div>

 <div id="new-user" style="display: none;">
 <form action="payment.php" method="post" style="margin-top: -10px;" onsubmit="return validateForm()" name="personal">

     <input name="start" type="hidden" value="<?php echo $arival; ?>" />
     <input name="end" type="hidden" value="<?php echo $departure; ?>" />
     <input name="adult" type="hidden" value="<?php echo $adults; ?>" />
     <input name="child" type="hidden" value="<?php echo $child; ?>" />
     <input name="n_room" type="hidden" value="<?php echo $no_rooms; ?>" />
     <input name="rm_id" type="hidden" value="<?php echo $roomid; ?>" />
     <input name="result" type="hidden" value="<?php echo $results; ?>" />

     <br />
      <div align="center"><span class="style1"> All field mark with this symbol (<span class="style3">*</span>) are required to be fill up</span></div>
     
   <table width="502" border="0">
    <tr>
      <td width="133"><div align="right" class="style1">First Name:</div></td>
      <td width="262"><input name="name" type="text" class="ed" id="name" size="35" onKeyPress="ValidateAlpha();" pattern="[A-Za-z]+"required="required"/>
        <span class="style3">*</span></td>
      <td width="93">&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Last Name:</div></td>
      <td><input name="last" type="text" class="ed" id="last" size="35"onKeyPress="ValidateAlpha();" pattern="[A-Za-z]+"required="required"/>
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Address:</div></td>
      <td><input name="address" type="text" class="ed" id="address" size="35" maxlength="6"onkeypress="return checkIt(event)"required="required" />
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Town:</div></td>
      <td><input name="city" type="text" class="ed" id="city" size="35" onKeyPress="ValidateAlpha();"pattern="[A-Za-z]+" required="required"/>
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    
      
    <tr>
    <td><div align="right" class="style1">
      <div align="right">
        <label>Country : </label>
      </div>
    </div></td>
    <td><select name="country" class="ed"style="width:230px;">
     
    <option value="Kenya" selected="selected">kenya</option>
    <option value="Canada">Canada</option>
    <option value="United Kingdom" >United Kingdom</option>
    <option value="Ireland" >Ireland</option>
    <option value="Australia" >Australia</option>
    <option value="New Zealand" >New Zealand</option>
    
    <option value="Afghanistan">Afghanistan</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antarctica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cote D'ivoire">Cote D'ivoire</option>
    <option value="Croatia">Croatia</option>
    <option value="Cuba">Cuba</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-bissau">Guinea-bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="United States">United States</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
    <option value="Korea, Republic of">Korea, Republic of</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macao">Macao</option>
    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
    <option value="Moldova, Republic of">Moldova, Republic of</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russian Federation">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Helena">Saint Helena</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
    <option value="Saint Lucia">Saint Lucia</option>
    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Serbia and Montenegro">Serbia and Montenegro</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra Leone">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
    <option value="Spain">Spain</option>
    <option value="Sri Lanka">Sri Lanka</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
    <option value="Thailand">Thailand</option>
    <option value="Timor-leste">Timor-leste</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Viet Nam">Viet Nam</option>
    <option value="Virgin Islands, British">Virgin Islands, British</option>
    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
    <option value="Wallis and Futuna">Wallis and Futuna</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
    </select>
   </td>
  </tr>

       <tr>
           <td><div align="right" class="style1">Contact Number:</div></td>
           <td><input name="cnumber" type="text" class="ed" id="cnumber" maxlength="10" onkeypress="return checkIt(event)"required="required" />
               <span id="errmsg1"></span><span class="style3">*</span></td>
           <td>&nbsp;</td>
       </tr>
    <tr>
      <td><div align="right" class="style1">Email:</div></td>
      <td><input name="email" type="text" class="ed" id="email" size="35"  required/>
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Retype Email:</div></td>
      <td><input name="cemail" type="text" class="ed" id="cemail" size="35"  required/>
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Password:</div></td>
      <td><input name="password" type="password" class="ed" id="password" minlength="6" size="35" required/>
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
   <tr>
       <td><div align="right" class="style1">Retype Password:</div></td>
       <td><input name="password2" type="password" class="ed" id="password2" minlength="6" size="35" required/>
           <span class="style3">*</span></td>
       <td>&nbsp;</td>
   </tr>
       <tr>
           <td><div align="right" class="style1">M-Pesa Transaction Code:</div></td>
           <td><input name="code" type="text" class="ed" id="code" minlength="10" maxlength="10" size="35" pattern="[A-Za-z0-9]+" required/>
               <span class="style3">*</span></td>
           <td>&nbsp;</td>
       </tr>
    <tr>
      <td><div align="right"></div></td>
      <td colspan="2"><label>
      <input type="checkbox" name="condition" value="checkbox" />
      <span class="style1"><small>i agree the <a rel="facebox" href="terms_condition.php">terms and condition</a> International Amani Lodge</small></span></label></td>
      </tr>
    
    <tr>
      <td><div align="right"></div></td>
      <td><input name="but" type="submit" value="Confirm" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>

 </form>
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

<p>Copyright &copy; International Amani Lodge.</p>
</div>
    <script type="application/javascript">
        $('input:radio[name="type"]').click(function () {
            let selected_radio = $(this).val();
            if (selected_radio === 'existing') {
                $('#new-user').hide();
                $('#existing-user').show();
            }
            else if (selected_radio === 'new') {
                $('#new-user').show();
                $('#existing-user').hide();
            }
        });
    </script>
</body>
</html>
