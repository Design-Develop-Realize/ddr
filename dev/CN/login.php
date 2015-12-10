<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<? // asp2php (vbscript) converted
?>
<? 
$RegSuccess=$_GET["Reg"]; ?>
<? 
if ($_POST["Username"]!="")
{

  if ($_POST["checkbox"]=="1")
  {

    setcookie("edireuser" . $_POST["Username"],0,"","",0);
//   Response.Cookies("edirepass") = Request.Form("Password")

    setcookie("edirerem" . "1",0,"","",0);
    // Unsupported: Response.Cookie. expires = Date + 30
//   Response.Cookies("edirepass").expires = Date + 30

    // Unsupported: Response.Cookie. expires = Date + 30
  }
    else
  {

    setcookie("edirerem" . "",0,"","",0);
    setcookie("edireuser" . "",0,"","",0);
    setcookie("edirepass" . "",0,"","",0);
  } 

} 

?>


<!--#include file="Connection.php" -->

<!--#include file="inc_header.php" -->
<? 
if ($_POST["Conditions"]=="1")
{

// $rsTerms is of type "ADODB.Recordset"

  $rsTermsSQL="SELECT Conditions FROM USERS WHERE U_ID = '".$rsUser["U_ID"]."'";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsTermsSQL);
  if (($rsTerms_BOF==1) && ($rsTerms==0))
  {

    $denyreason_session="There is a problem with your login credentials.";
    header("Location: "."activity_denied.asp");
  } 

$rsTerms["Conditions"]=2;
    
  
  $rsTerms=null;

  header("Location: "."login.asp");
} 

?>

<? 
// $rsLogin is of type "ADODB.Recordset"

$rsLoginSQL="SELECT count(*) AS LoginAttempts FROM USERS WHERE Login_Date = '".time()."' AND Login_IPADDRESS = '".$_SERVER["remote_addr"]."' AND Login_Attempts > 12";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsLoginSQL);
if ($rsLogin["LoginAttempts"]>0)
{

  $denylogin=1;
} 


$rsLogin=null;


if ($denylogin!=1)
{

// $rsLogin is of type "ADODB.Recordset"

  $rsLoginSQL="SELECT count(*) AS LoginAttempts FROM USERS WHERE Login_Date = '".time()."' AND Login_IPADDRESS = '".$_SERVER["remote_addr"]."' AND Login_Attempts >= 3";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsLoginSQL);
  if ($rsLogin["LoginAttempts"]>0)
  {

    $loginattempt_session=3;
  } 

  if ($rsLogin["LoginAttempts"]>8)
  {

    $denylogin=1;
  } 

  
  $rsLogin=null;

} 


?>



<? 
if ($loginattempt_session=="")
{

} else {
  $loginattempt_session=1;
} ?>
<? if ($rsUser->EOF && $rsUser->BOF)
{
?>
<? 
  $loginattempt_session=$loginattempt_session+1;
  if ($loginattempt_session>5)
  {

    header("Location: "."sendpassword1.asp");
  } 

?>





     
      <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">

        <tr> 
          <td width="90%" valign="top">
			<table width="100%" border="1" cellspacing="0" cellpadding="4" bordercolor="#000080">
              <tr > 
                <td align="left" bgcolor="#000080"><font color="#FFFFFF"><b>&nbsp;:. 
				Account Login</b></font></td>
              </tr>
<?   if ($denylogin==1)
  {
?>
              <tr > 
                  <td height="43" align="center" valign="middle" >
					<p align="left">It appears that you are having some problems 
					logging into the site. Please come back tomorrow and try 
					again or email the 
					<a href="mailto:webmaster@cybernations.net?subject=Login Issues">
					administrator</a> regarding your recent activity.</td>
              </tr>
<?   }
    else
  {
?> 
<?     if ($Application["ActiveUsers"]>$connectionlimit)
    {
?>
<tr>
<td>
<p align="left">Cyber Nations experiences high traffic loads around update time. The game servers are currently too busy to process login attempts at this time. Please come back later when the 
servers are not so busy.
</td>
</tr>
<?     }
      else
    {
?>


 
<body onload="document.FrontPage_Form1.Password.focus()" >        
              <tr > 
                <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Username.value == "")
  {
    alert("Please enter a value for the \"Username\" field.");
    theForm.Username.focus();
    return (false);
  }

  if (theForm.Username.value.length > 40)
  {
    alert("Please enter at most 40 characters in the \"Username\" field.");
    theForm.Username.focus();
    return (false);
  }

  if (theForm.Password.value == "")
  {
    alert("Please enter a value for the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  if (theForm.Password.value.length > 40)
  {
    alert("Please enter at most 40 characters in the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form action="<?       echo $MM_LoginAction; ?>" method="POST" name="FrontPage_Form1" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript" >
                  <td height="43" align="center" valign="middle" >
					<p align="left">
                           
                            <br>

							</b>Please login to your account below or
							
							<a href="register.php">register</a> a new account to 
							proceed. 
							
							
							You must have cookies enabled to use this 
					site. Some Internet firewalls or Zone Alarm settings may 
					prevent you from doing certain functions in the game.<b>
</b></p>
					<table width="70%" border="0" align="center" cellpadding="0" cellspacing="2">
                      <tr> 
                        <td width="38%" class="title"><div align="right">
							<p align="right">
							<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
							<strong>
<img border="0" src="assets/asterisk_red.gif" width="15" height="12">User 
                            ID:</strong></font></div></td>
                        <td width="62%"> 
						&nbsp;<!--webbot bot="Validation" b-value-required="TRUE" i-maximum-length="40" --><input value="<?       echo $_COOKIE["edireuser"]; ?>" name="Username" type="text" class="displayFieldIE" size="30" maxlength="40"></td>
                      </tr>

						<tr>
                        <td class="title"><div align="right">
							<p align="right">
							<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
							<strong>
<img border="0" src="assets/asterisk_red.gif" width="15" height="12">Password:</strong></font></div></td>
                        <td> 
						&nbsp;<!--webbot bot="Validation" b-value-required="TRUE" i-maximum-length="40" --><input value="" name="Password" type="password" class="displayFieldIE" size="30" maxlength="40"></td>
                      </tr>
                      <tr> 
                        <td class="title"><div align="right">
							<p align="right"><i>
							<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
							<strong style="font-weight: 400">Remember 
                            me:</strong></font></i></div></td>
                        <td> <input name="checkbox" type="checkbox" value="1" checked <?       if (($_COOKIE["edirerem"]=="1"))
      {
        print "CHECKED";      } 
      print "";?>></td>
                      </tr>
                      <?       if ($loginattempt_session>2)
      {
?>
                      <tr> 
                        <td class="title" valign="top">
						<p align="right">
						<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
						<strong><br>
<img border="0" src="assets/asterisk_red.gif" width="15" height="12">Enter the code exactly 
						as you see it:<br />
                		</font></strong></font></td>
                        <td valign="top"> 
                        <br />
                

<!--#include file="CAPTCHA/CAPTCHA_form_inc.php" -->

</td>
                      </tr>
                      <?       } ?>
                      <tr> 
                        <td class="title">&nbsp;</td>
                        <td> 
                        <input name="imageField" type="image" id="imageField" src="http://cybernations.net/assets/login.jpg" border="0">
						
                          <a href="sendpassword1.php">
					Forgot 
                   Password?</a></td>
                      </tr>
                    </table>
                    &nbsp; </td>
                </form>
              </tr>
<?     } ?> 
<?   } ?>          
            </table>
                     <? }
  else
{
?>
<?   $loginattempt_session="";
?>




<?   if ($rsUser["Conditions"]!=2)
  {
?>


<script>
var checkobj

function agreesubmit(el){
checkobj=el
if (document.all||document.getElementById){
for (i=0;i<checkobj.form.length;i++){  //hunt down submit button
var tempobj=checkobj.form.elements[i]
if(tempobj.type.toLowerCase()=="submit")
tempobj.disabled=!checkobj.checked
}
}
}

function defaultagree(el){
if (!document.all&&!document.getElementById){
if (window.checkobj&&checkobj.checked)
return true
else{
alert("Please read/accept terms to submit form")
return false
}
}
}

</script>
<p align="left">	
Please review the Cyber Nations terms and conditions once again, make sure you 
understand them, and click the check box below to signify that by using this site you agree to 
the terms and conditions below. If you do not agree to these conditions DO NOT 
use this site.</p>
<form name="Conditions" method="post">	
<p align="center">	
<!--#include file="terms_include.php" -->

</p>
<div align="center"> 
<table border="0" width="333" id="table1" cellpadding="2">
<tr>
<td width="35">
<p align="center">
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<strong>
<img border="0" src="assets/asterisk_red.gif" width="15" height="12"></strong></font><input name="agreecheck" type="checkbox" onClick="agreesubmit(this)"></td>
<td width="284"><b> I agree to the above terms and conditions 
<u>AND</u> certify that I am not 
using multiple accounts by 
the same user.</b></td>
</tr>
</table>

</div> <div align="center"> 
<br>
<input type="hidden" name="Conditions" value="1">
<input name="submit" disabled type="submit" value="Continue">
</div>


<?   }
    else
  {
?>

		<p>&nbsp;</p>
			<p align="center">
         <b>Thank you for logging in <?     echo $MM_Username_session; ?>.</b><p align="center">
         <p align="left">
         <br>


<p align="left">

Reminder:

Protect your credentials at all times by using a complex password and changing it frequently
			by 
			<a href="myprofile.php">editing your profile</a>.</span> Also verify 
that your in-game email address is accurate and up to date in your profile screen. Check 
			the
			<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=20527">
			game update log</a> for game updates.<p>

						<p>&nbsp;</p>
						

<!--#include file="search_include.php" -->
	<?   } ?>
	
<? } ?>
</td>
          </table>
      </td>
        </tr>
      </table>
      <!--#include file="inc_footer.php" -->
