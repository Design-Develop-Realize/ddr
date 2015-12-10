<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
?>


<? // asp2php (vbscript) converted
$CODEPAGE="1252"; ?>
<? 
// *** Restrict Access To Page: Grant or deny access to this page

$MM_authorizedUsers="";
$MM_authFailedURL="login.asp";
$MM_grantAccess=false;
if ($MM_Username_session!="")
{

  if ((false || $MM_UserAuthorization_session=="") || 
     ((strpos(1,$MM_authorizedUsers,$MM_UserAuthorization_session) ? strpos(1,$MM_authorizedUsers,$MM_UserAuthorization_session)+1 : 0)>=1))
  {

    $MM_grantAccess=true;
  } 

} 

if (!$MM_grantAccess)
{

  $MM_qsChar="?";
  if (((strpos(1,$MM_authFailedURL,"?") ? strpos(1,$MM_authFailedURL,"?")+1 : 0)>=1))
  {
    $MM_qsChar="&";
  } 
  $MM_referrer=$_SERVER["URL"];
  if ((strlen($_GET[])>0))
  {
    $MM_referrer=$MM_referrer."?".$_GET[];
  } 
  $MM_authFailedURL=$MM_authFailedURL.$MM_qsChar."accessdenied=".rawurlencode($MM_referrer);
  header("Location: ".$MM_authFailedURL);
} 

?>

<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<? 
// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT Nation_Name FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);
?>
<body>
<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0" bordercolor="#000080">
<tr>
<td>
<table border="1" width="100%" id="table2" cellspacing="0" cellpadding="5" bordercolor="#000080" bgcolor="#F7F7F7">
	<tr>
		<td width="100%" bgcolor="#000080"><b><font color="#FFFFFF">:. 
		Report multiple users</font></b></td>
	</tr>
	<tr>
		<td width="189%" valign="top">
<p align="left"><br>
<b>Use this form to report multiple players from the same computer or network.</b><p align="left"><br>
<br>


<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.THEIR_USER.value == "")
  {
    alert("Please enter a value for the \"Friends User ID\" field.");
    theForm.THEIR_USER.focus();
    return (false);
  }

  if (theForm.THEIR_USER.value.length < 1)
  {
    alert("Please enter at least 1 characters in the \"Friends User ID\" field.");
    theForm.THEIR_USER.focus();
    return (false);
  }

  if (theForm.THEIR_USER.value.length > 30)
  {
    alert("Please enter at most 30 characters in the \"Friends User ID\" field.");
    theForm.THEIR_USER.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'.\",:;*-+!()?/_=’`$ \t\r\n\f";
  var checkStr = theForm.THEIR_USER.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()?/_=’`$\" characters in the \"Friends User ID\" field.");
    theForm.THEIR_USER.focus();
    return (false);
  }

  if (theForm.THEIR_NATION.value == "")
  {
    alert("Please enter a value for the \"Friends Nation\" field.");
    theForm.THEIR_NATION.focus();
    return (false);
  }

  if (theForm.THEIR_NATION.value.length < 1)
  {
    alert("Please enter at least 1 characters in the \"Friends Nation\" field.");
    theForm.THEIR_NATION.focus();
    return (false);
  }

  if (theForm.THEIR_NATION.value.length > 30)
  {
    alert("Please enter at most 30 characters in the \"Friends Nation\" field.");
    theForm.THEIR_NATION.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'.\",:;*-+!()?/_=’`$ \t\r\n\f";
  var checkStr = theForm.THEIR_NATION.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()?/_=’`$\" characters in the \"Friends Nation\" field.");
    theForm.THEIR_NATION.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="multiuserreport_code.php" style="display: inline; margin: 0;" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
<div align="center">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr>
<td width="38%">
<p align="right"><strong>
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;My 
User Name:</font></strong></td>
<td width="60%"> 
&nbsp;<? echo $rsUser["U_ID"]; ?>
</td>
</tr>
<tr>
<td width="38%">
<p align="right"><strong>
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;My 
Nation Name:</font></strong></td>
<td width="60%"> 
&nbsp;<? echo $rsGuestbook0["Nation_Name"]; ?>
</td>
</tr>
<tr>
<td width="38%">
<p align="right"><strong>
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<img border="0" src="assets/asterisk_red.gif" width="15" height="12">Friend's 
User Name:</font></strong></td>
<td width="60%"> 
&nbsp;<!--webbot bot="Validation" s-display-name="Friends User ID" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()?/_=’`$" b-value-required="TRUE" i-minimum-length="1" i-maximum-length="30" --><input name="THEIR_USER" type="text" class = "inputFieldIE" size="30" maxlength="30">
</td>
</tr>
<tr align="left" valign="middle"> 
<td width="38%">
<p align="right"><strong>
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<img border="0" src="assets/asterisk_red.gif" width="15" height="12">Friend's 
Nation Name:</font></strong></td>
<td width="60%"> 
&nbsp;<!--webbot bot="Validation" s-display-name="Friends Nation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()?/_=’`$" b-value-required="TRUE" i-minimum-length="1" i-maximum-length="30" --><input name="THEIR_NATION" type="text" class = "inputFieldIE" size="30" maxlength="30">
</td>
</tr>
<tr align="left" valign="middle"> 
<td colspan="2" align="center">  
<br>
<input type="hidden" name="U_ID" value="<? echo $rsUser["U_ID"]; ?>">
<input type="submit" name="Submit2" value="Report Multiple Users" class = "Buttons" onClick="MM_validateForm('MY_EMAIL','','RisEmail');return document.MM_returnValue">
</td>
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
