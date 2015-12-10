<?
  session_start();
  session_register("loginattempt_session");
  session_register("denyreason_session");
  session_register("MM_Username_session");
?>
<? $loginattempt_session=2;
?>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<body>
<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0" bordercolor="#000080">
<tr>
<td>
<table border="1" width="100%" id="table2" cellspacing="0" cellpadding="5" bordercolor="#000080" bgcolor="#F7F7F7">
	<tr>
		<td width="100%" bgcolor="#000080"><b><font color="#FFFFFF">:. 
		</font></b><font color="#FFFFFF"><b>Send Lost Information Via Email</b></font></td>
	</tr>
	<tr>
		<td width="189%" valign="top">
<p align="left"><br>
<b>Forgot your user name or password? Just enter your email address below and 
your information will be sent to you.</b><p align="left"><br>
<br>


<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Lost_Username.value == "")
  {
    alert("Please enter a value for the \"Lost_Username\" field.");
    theForm.Lost_Username.focus();
    return (false);
  }

  if (theForm.Lost_Username.value.length > 40)
  {
    alert("Please enter at most 40 characters in the \"Lost_Username\" field.");
    theForm.Lost_Username.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-@._- \t\r\n\f";
  var checkStr = theForm.MY_EMAIL.value;
  var allValid = true;
  var validGroups = true;
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
  }
  if (!allValid)
  {
    alert("Please enter only letter, digit, whitespace and \"@._-\" characters in the \"MY_EMAIL\" field.");
    theForm.MY_EMAIL.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="sendpassword2.php" style="display: inline; margin: 0;" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
<div align="center">
<table width="70%" border="0" cellpadding="0">
<tr>
<td width="38%">
<p align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<strong><img border="0" src="assets/asterisk_red.gif" width="15" height="12">User 
ID:</strong></font></td>
<td width="60%"> 
<!--webbot bot="Validation" b-value-required="TRUE" i-maximum-length="40" --><input value="<? echo $_COOKIE["edireuser"]; ?>" name="Lost_Username" type="text" class="displayFieldIE" size="30" maxlength="40"></td>
</tr>
<tr>
<td width="38%">
<p align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<strong>&nbsp;<img border="0" src="assets/asterisk_red.gif" width="15" height="12">Email Address:</strong></font></td>
<td width="60%"> 
<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="@._-" --><input name="MY_EMAIL" type="text" class = "inputFieldIE" size="30">
</td>
</tr>
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
<tr align="left" valign="middle"> 
<td colspan="2" align="center">  
<br>
<input type="submit" name="Submit2" value="Send Temporary Password" class = "Buttons" onClick="MM_validateForm('MY_EMAIL','','RisEmail');return document.MM_returnValue"><br>
&nbsp;</td>
</tr>
</table></div>
</form>


<p align="left">
<br>
&nbsp;</td>
	</tr>
</table>
<p align="center">
<br>
&nbsp;</td>
</tr>
</table>



<p align="center">






</p>



<p></p>



<!--#include file="inc_footer.php" --> 
<? $objConn->Close();
$objConn=null;
?>
