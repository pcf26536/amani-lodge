<script type="text/javascript">
    function validateForm()
    {

        var b=document.forms["contact"]["email"].value;
        if (b==null || b=="")
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
        var b=document.forms["contact"]["password"].value;
        if (b==null || b==="")
        {
            alert("Pls. Enter your Password");
            return false;
        }
    }
</script>

<form action="cancelindex.php" method="post" onsubmit="return validateForm1()" name="contact">



    Email Address:<br />
                      <input name="email" type="text" class="ed" />
                      <br />
    Password:<br />
                        <input name="password" type="password" class="ed" minlength="6" />
                         <br />

                      <input name="Input" type="submit" value="Proceed" id="button1" />
                   </div>
  </form>