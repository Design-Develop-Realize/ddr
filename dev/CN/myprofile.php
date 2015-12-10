<?
  session_start();
  session_register("Validate_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<? $Validate_session="";
?>
<!--#include file="connection.php" -->
<? 
// *** Logout the current user.

$MM_Logout=$_SERVER["URL"]."?MM_Logoutnow=1";
if ((${"MM_Logoutnow"}=="1"))
{


  $MM_logoutRedirectPage="default.asp";
// redirect with URL parameters (remove the "MM_Logoutnow" query param).

  if (($MM_logoutRedirectPage==""))
  {
    $MM_logoutRedirectPage=$_SERVER["URL"];
  } 
  if (((strpos(1,$UC_redirectPage,"?",$vbTextCompare) ? strpos(1,$UC_redirectPage,"?",$vbTextCompare)+1 : 0)==0 && $_GET!=""))
  {

    $MM_newQS="?";
foreach ($_GET as $Item)
    {

      if (($Item!="MM_Logoutnow"))
      {

        if ((strlen($MM_newQS)>1))
        {
          $MM_newQS=$MM_newQS."&";
        } 
        $MM_newQS=$MM_newQS.$Item."=".rawurlencode($_GET[$Item]);
      } 

    }     if ((strlen($MM_newQS)>1))
    {
      $MM_logoutRedirectPage=$MM_logoutRedirectPage.$MM_newQS;
    } 
  } 

  header("Location: ".$MM_logoutRedirectPage);
} 

?>

<!--#include file="inc_header.php" -->


<? 
if ($_POST["Process"]==1)
{


  if ($_POST["Original_Password"]!="")
  {

    $sDigest=sha256($_POST["Original_Password"]);

    if ($sDigest!=$rsUser["U_PASSWORD_Secure"] || $rsUser["U_PASSWORD_Secure"]=="" || !isset($rsUser["U_PASSWORD_Secure"]))
    {

      $denyreason_session="Your original password input is not valid.";
      header("Location: "."activity_denied.asp");
    }
      else
    {


      if (strlen($_POST["New_Password1"])<7 || strlen($_POST["New_Password1"])>50)
      {

        $denyreason_session="Your new password is either too big or too small. It must be at least 7 characters and a maximum of 50 characters.";
        header("Location: "."activity_denied.asp");
      } 


      if (strtolower($_POST["New_Password1"])=="asdfghj" || strtolower($_POST["New_Password1"])=="qwertyu" || strtolower($_POST["New_Password1"])=="01234567" || strtolower($_POST["New_Password1"])=="1234567" || strtolower($_POST["New_Password1"])=="password" || strtolower($_POST["New_Password1"])=="cybernations" || strtolower($_POST["New_Password1"])=="cyber nations")
      {

        $denyreason_session="Surley you can come up with a new password that is more complex than that!";
        header("Location: "."activity_denied.asp");
      } 


      if ($_POST["New_Password1"]!=$_POST["New_Password2"])
      {

        $denyreason_session="Your new passwords are not the same. Please go back and try again.";
        header("Location: "."activity_denied.asp");
      } 


      if ($_POST["New_Password1"]==$_POST["Original_Password"])
      {

        $denyreason_session="Your new password and your old password is the same. Please go back and create a different password.";
        header("Location: "."activity_denied.asp");
      } 


      $currentpassword=$sDigest;
      $oldpassword=$rsUser["U_PASSWORD_Last"];
      $sDigest=sha256($_POST["New_Password1"]);

      if ($sDigest==$oldpassword || $sDigest==$currentpassword)
      {

        $denyreason_session="You cannot use the same password that you previously used. Please create a new password.";
        header("Location: "."activity_denied.asp");
      } 


      $rsUser["U_PASSWORD_Last"]=$currentpassword;
      $rsUser["U_PASSWORD_Secure"]=$sDigest;
      $rsUser["U_PASSWORD_Date"]=time()();

    } 

  } 



  if ($_POST["Color_Blind"]!=1)
  {

    $rsUser["Color_Blind"]=0;
  }
    else
  {

    $rsUser["Color_Blind"]=1;
  } 



  if ($_POST["Site_Ads"]!=1)
  {

    $rsUser["Site_Ads"]=0;
  }
    else
  {

    $rsUser["Site_Ads"]=1;
  } 




$rsUser->Update;

  header("Location: "."myprofile.asp?Updated=1");
} 

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

<tr align="center" valign="middle" bgcolor="#FFFFFF" class="bodyText"> 
<td width="77%" bgcolor="#FFFFFF"> <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789-!@#$%^&*()-=_+?/.;'\" \t\r\n\f";
  var checkStr = theForm.New_Password1.value;
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
    alert("Please enter only letter, digit, whitespace and \"!@#$%^&*()-=_+?/.;'\"\" characters in the \"New_Password1\" field.");
    theForm.New_Password1.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789-!@#$%^&*()-=_+?/.;'\" \t\r\n\f";
  var checkStr = theForm.New_Password2.value;
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
    alert("Please enter only letter, digit, whitespace and \"!@#$%^&*()-=_+?/.;'\"\" characters in the \"New_Password2\" field.");
    theForm.New_Password2.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form ACTION="<? echo $MM_editAction; ?>" METHOD="POST" name="FrontPage_Form1" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<? if (!$rsUser->EOF || !$rsUser->BOF)
{
?>
<tr> 
<td align="center" valign="top"> 
<div align="center">
<table width="100%" cellspacing="0" border="1" bordercolor="#000080" cellpadding="5">
<tr valign="baseline"> 
<td align="right" nowrap bgcolor="#000080" height="24" colspan="2">
<p align="left"><b><font color="#FFFFFF">&nbsp;:. 
Manage Your Profile
<?   if ($_GET["Updated"]==1)
  {
?>
 -  
 </font>
 <font color="#FFFF00"> <i>Your profile has been updated</i></font><font color="#FFFFFF">
<?   } ?> 
 </font>
 </b></td>
</tr>
<tr valign="baseline"> 
<td align="right" nowrap bgcolor="#F7F7F7" height="24" width="32%" valign="top"><div align="right">
<strong>
<font color="#000000">
User Name:</font></strong></div></td>
<td width="632" bgcolor="#F7F7F7" height="24" valign="top"> 
<font color="#000000"><b>
<?   echo ($rsUser->Fields.$Item["U_ID"].$Value); ?></b></font></td>
</tr>
<tr>
<td align="right" nowrap bgcolor="#F7F7F7" width="32%" valign="top">
<font color="#000000">
<b>
&nbsp;</b><strong>E-mail Address:</strong></font></td>
<td> <font color="#000000">
<b>

<?   if (!isset($rsUser["U_Email"]) || $rsUser["U_Email"]=="")
  {
?>
No email address in the system.
<?   }
    else
  {
?>
<?     echo $rsUser["U_Email"]; ?>&nbsp;
<?   } ?>
</b><br>
<font size="1"><i>
<a href="myprofile_email_code.php">Change my email address</a></i></font>
</tr>

</tr>
<tr>
<td align="right" nowrap bgcolor="#F7F7F7" height="29" width="32%" valign="top">
<strong><font color="#000000">Change Password:</font></strong></td>
<td bgcolor="#F7F7F7" height="29" valign="top">
<font color="#000000"><b>
<input type="password" name="Original_Password" size="30" class="inputFieldIE"></b> 
- Old Password<br>
<b>
<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="!@#$%^&amp;*()-=_+?/.;'&quot;" --><input type="password" name="New_Password1" size="30" class="inputFieldIE"> - </b>
New Password<b><br>
<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="!@#$%^&amp;*()-=_+?/.;'&quot;" --><input type="password" name="New_Password2" size="30" class="inputFieldIE"> - </b>Confirm New Password</font></td>
</tr>
<tr valign="baseline"> 
<td align="right" nowrap bgcolor="#F7F7F7" height="29" width="32%" valign="top">
<strong style="font-weight: 400">
<font color="#000000">
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> 
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=32337">
Color blind accessibility</a>:</font></strong></td>
<td bgcolor="#F7F7F7" height="29" valign="top">
<input type="checkbox" name="Color_Blind" value="1" <?   if ($rsUser["Color_Blind"]==1)
  {
?>checked<?   } ?>><i>disables 
colored boxes for team displays</i></td>
</tr>
<tr valign="baseline"> 
<td align="right" nowrap bgcolor="#F7F7F7" height="29" width="32%" valign="top">
<strong style="font-weight: 400">
<font color="#000000">
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> 
<a href="http://s15.invisionfree.com/Cyber_Nations/index.php?showtopic=32337">S</a><a target="_blank" href="http://s15.invisionfree.com/Cyber_Nations/index.php?showtopic=32337">ite ads for nation bonus</a>:</font></strong></td>
<td bgcolor="#F7F7F7" height="29" valign="top">




<input type="checkbox" name="Site_Ads" value="1" <?   if ($rsUser["Site_Ads"]==1)
  {
?>CHECKED<?   } ?>>






<i>provides 
income tax bonuses on tax collections</i></td>
</tr>

<tr valign="baseline"> 
<td height="44" align="center" nowrap bgcolor="#F7F7F7" colspan="2">&nbsp;<p> 
<input name="submit" type="submit" class="Buttons" value="Update My Information"><font color="#000000">
</font> 

</p>

<p align="left">
&nbsp;</td>
</tr>
</table>
<p>&nbsp;</div>
<input type="hidden" name="Process" value="1"> 
</td>
</tr>
<? } 
// end Not rsUser.EOF Or NOT rsUser.BOF  







$#include$file="inc_footer.asp"-->;
$Close[];
$objConn=null;

?>
