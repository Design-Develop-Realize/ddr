<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("alreadyused_session");
  session_register("activity_session");
?>
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




<? 
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Top 30 * FROM Nation ORDER BY Strength DESC ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
$rsGuestbook_numRows=0;
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAQpiA_mSUPTtx989SOA_cqxQUbKRsxEr5HWq648QG6J5HPXuJ8hQeBxX39VAlA_htuj56kKr6UVzGFw" type="text/javascript"></script>


<script type="text/javascript">

function openpopup(popurl){
var winpops=window.open(popurl,"","toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=200,height=200")
}
</script>

<script type="text/javascript">
function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}
</script>

</head>
<!--#include file="inc_header.php" -->
<? 
$nothingcntr=1;
if ($rsGuestbookHead->BOF && $rsGuestbookHead->EOF)
{

  $nothingcntr=0;
} 

?>
<? if ($rsGuestbookHead->BOF && $rsGuestbookHead->EOF && $nothingcntr==0)
{
?>

<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Nation_Name.value == "")
  {
    alert("Please enter a value for the \"Nation_Name\" field.");
    theForm.Nation_Name.focus();
    return (false);
  }

  if (theForm.Nation_Name.value.length < 5)
  {
    alert("Please enter at least 5 characters in the \"Nation_Name\" field.");
    theForm.Nation_Name.focus();
    return (false);
  }

  if (theForm.Nation_Name.value.length > 20)
  {
    alert("Please enter at most 20 characters in the \"Nation_Name\" field.");
    theForm.Nation_Name.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-.,:;*-+!()?/_=$& \t\r\n\f";
  var checkStr = theForm.Nation_Name.value;
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
    alert("Please enter only letter, digit, whitespace and \".,:;*-+!()?/_=$&\" characters in the \"Nation_Name\" field.");
    theForm.Nation_Name.focus();
    return (false);
  }

  if (theForm.Capital_City.value == "")
  {
    alert("Please enter a value for the \"Capital_City\" field.");
    theForm.Capital_City.focus();
    return (false);
  }

  if (theForm.Capital_City.value.length > 20)
  {
    alert("Please enter at most 20 characters in the \"Capital_City\" field.");
    theForm.Capital_City.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789- \t\r\n\f";
  var checkStr = theForm.Capital_City.value;
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
    alert("Please enter only letter, digit and whitespace characters in the \"Capital_City\" field.");
    theForm.Capital_City.focus();
    return (false);
  }

  if (theForm.Nation_Team.selectedIndex < 0)
  {
    alert("Please select one of the \"Nation_Team\" options.");
    theForm.Nation_Team.focus();
    return (false);
  }

  if (theForm.Nation_Team.selectedIndex == 0)
  {
    alert("The first \"Nation_Team\" option is not a valid selection.  Please choose one of the other options.");
    theForm.Nation_Team.focus();
    return (false);
  }

  if (theForm.Currency_Type.selectedIndex < 0)
  {
    alert("Please select one of the \"Currency_Type\" options.");
    theForm.Currency_Type.focus();
    return (false);
  }

  if (theForm.Currency_Type.selectedIndex == 0)
  {
    alert("The first \"Currency_Type\" option is not a valid selection.  Please choose one of the other options.");
    theForm.Currency_Type.focus();
    return (false);
  }

  if (theForm.Government_Type.selectedIndex < 0)
  {
    alert("Please select one of the \"Government_Type\" options.");
    theForm.Government_Type.focus();
    return (false);
  }

  if (theForm.Government_Type.selectedIndex == 0)
  {
    alert("The first \"Government_Type\" option is not a valid selection.  Please choose one of the other options.");
    theForm.Government_Type.focus();
    return (false);
  }

  if (theForm.Ethnic_Group.selectedIndex < 0)
  {
    alert("Please select one of the \"Ethnic_Group\" options.");
    theForm.Ethnic_Group.focus();
    return (false);
  }

  if (theForm.Ethnic_Group.selectedIndex == 0)
  {
    alert("The first \"Ethnic_Group\" option is not a valid selection.  Please choose one of the other options.");
    theForm.Ethnic_Group.focus();
    return (false);
  }

  if (theForm.DEFCON.selectedIndex < 0)
  {
    alert("Please select one of the \"DEFCON\" options.");
    theForm.DEFCON.focus();
    return (false);
  }

  if (theForm.DEFCON.selectedIndex == 0)
  {
    alert("The first \"DEFCON\" option is not a valid selection.  Please choose one of the other options.");
    theForm.DEFCON.focus();
    return (false);
  }

  if (theForm.Nation_Peace.selectedIndex < 0)
  {
    alert("Please select one of the \"Nation_Peace\" options.");
    theForm.Nation_Peace.focus();
    return (false);
  }

  if (theForm.Nation_Peace.selectedIndex == 0)
  {
    alert("The first \"Nation_Peace\" option is not a valid selection.  Please choose one of the other options.");
    theForm.Nation_Peace.focus();
    return (false);
  }

  if (theForm.Religion.selectedIndex < 0)
  {
    alert("Please select one of the \"Religion\" options.");
    theForm.Religion.focus();
    return (false);
  }

  if (theForm.Religion.selectedIndex == 0)
  {
    alert("The first \"Religion\" option is not a valid selection.  Please choose one of the other options.");
    theForm.Religion.focus();
    return (false);
  }

  if (theForm.Nation_Bio.value == "")
  {
    alert("Please enter a value for the \"Nation_Bio\" field.");
    theForm.Nation_Bio.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'.\",:;*-+!()= \t\r\n\f";
  var checkStr = theForm.Nation_Bio.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()=\" characters in the \"Nation_Bio\" field.");
    theForm.Nation_Bio.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789--. \t\r\n\f";
  var checkStr = theForm.lat0.value;
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
    alert("Please enter only letter, digit, whitespace and \"-.\" characters in the \"lat0\" field.");
    theForm.lat0.focus();
    return (false);
  }

  var chkVal = theForm.lat0.value;
  var prsVal = chkVal;
  if (chkVal != "" && !(prsVal != lat))
  {
    alert("Please enter a value not equal to \"lat\" in the \"lat0\" field.");
    theForm.lat0.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789--. \t\r\n\f";
  var checkStr = theForm.long0.value;
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
    alert("Please enter only letter, digit, whitespace and \"-.\" characters in the \"long0\" field.");
    theForm.long0.focus();
    return (false);
  }

  var chkVal = theForm.long0.value;
  var prsVal = chkVal;
  if (chkVal != "" && !(prsVal != lon))
  {
    alert("Please enter a value not equal to \"lon\" in the \"long0\" field.");
    theForm.long0.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="newNation_code.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">      

<input type="hidden" name="POSTER" value="<?   echo $MM_Username_session; ?>" size="20">

<div align="center">
<font color="black"><span class="spnMessageText">Anywhere that you see the
</span><b>
<img border="0" src="images/information.gif" width="17" height="16"></b> 
there is more information available for that item.<br>


<?   if ($alreadyused_session=="True")
  {

    $alreadyused_session="Nothing";
?>
</p>
<p><font color="#FF0000">
<strong>Sorry, that nation name is already 
taken.<br>
Please try a different nation name.<p></p></strong></font> 

<?   } ?>


&nbsp;</font><table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<tr>
<td align="left" width="97%" colspan="2" bgcolor="#000080"><b>
<font color="#FFFFFF">:. Create a new nation </font></b></td>
</tr>
<tr>
<td align="left" width="25%">Nation Name:</td>
<td align="left" width="72%" valign="top"> 
<table border="0" width="100%" id="table5">
	<tr>
		<td width="148">
		<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars=".,:;*-+!()?/_=$&amp;" b-value-required="TRUE" i-minimum-length="5" i-maximum-length="20" --><input type="text" name="Nation_Name" maxlength="20" size="20" id="fname" onchange="test(this.id)"></td>
<script type="text/javascript">
function test(x)
{
var testname=document.FrontPage_Form1.fname.value //document.getElementById(x).value
var pattern = / /g;
var MyNewString=testname.replace(pattern,"%20");

//alert (document.FrontPage_Form1.U_ID.value)
document.getElementById("moretext").innerHTML = " <a href=javascript:openpopup('newNation_check.asp?U_ID=" + MyNewString + "')>Check Availability</a>";
}
</script>
		<td>
<div id="moretext"></div>

</td>
	</tr>
</table>
<font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><img border="0" src="assets/asterisk_red.gif" width="15" height="12"></strong></font><strong><i><font face="Verdana, Arial, Helvetica, sans-serif" size="1">Your 
nation </font></i></strong>
<font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>
<i>name cannot be changed once it is 
created so make sure you pick your nation name carefully. The admin will not 
change your nation name for you.</i></strong></font></td>
</tr>
<tr>
<td align="left" width="25%">
Capital City:</td>
<td align="left" width="72%" valign="top">
<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" b-value-required="TRUE" i-maximum-length="20" --><input type="text" maxlength="20" name="Capital_City" size="20"></td>
</tr>
<tr>
<td align="left" width="25%">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=26">
Nation Team</a>:</td>
<td align="left" width="72%" valign="top">
<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="Nation_Team">
<option>Please Select A Team</option>
<option value="None">No Team</option>
<option value="Aqua">Aqua Team</option>
<option value="Black">Black Team</option>
<option value="Blue">Blue Team</option>
<option value="Brown">Brown Team</option>
<option value="Green">Green Team</option>
<option value="Maroon">Maroon Team</option>
<option value="Orange">Orange Team</option>
<option value="Pink">Pink Team</option>
<option value="Purple">Purple Team</option>
<option value="Red">Red Team</option>
<option value="Yellow">Yellow Team</option>
<option value="White">White Team</option>
</select></td>
</tr>
<tr>
<td align="left" width="25%">Currency Type:</td>
<td align="left" width="72%" valign="top"> 

<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="Currency_Type">
<option>Please Select A Currency</option>
<option value="Afghani">Afghani</option>
<option value="Austral">Austral</option>
<option value="Baht">Baht</option>
<option value="Canadian">Canadian</option>
<option value="Dinar">Dinar</option>
<option value="Dollar">Dollar</option>
<option value="Dong">Dong</option>
<option value="Euro">Euro</option>
<option value="Florin">Florin</option>
<option value="Franc">Franc</option>
<option value="Kwacha">Kwacha</option>
<option value="Kwanza">Kwanza</option>
<option value="Kyat">Kyat</option>
<option value="Lari">Lari</option>
<option value="Mark">Mark</option>
<option value="Peso">Peso</option>
<option value="Pound">Pound</option>
<option value="Riyal">Riyal</option>
<option value="Rouble">Rouble</option>
<option value="Rupee">Rupee</option>
<option value="Shilling">Shilling</option>
<option value="Won">Won</option>
<option value="Yen">Yen</option>
</select>
</td>
</tr>
<tr>
<td align="left" width="25%">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=23">Tax Rate</a>:</td>
<td align="left" width="72%" valign="top"> 
<select size="1" name="Tax_Rate">
<option value="10">10%</option>
<option value="11">11%</option>
<option value="12">12%</option>
<option value="13">13%</option>
<option value="14">14%</option>
<option value="15">15%</option>
<option value="16">16%</option>
<option value="17">17%</option>
<option value="18">18%</option>
<option value="19">19%</option>
<option value="20">20%</option>
<option value="21">21%</option>
<option value="22">22%</option>
<option value="23">23%</option>
<option value="24">24%</option>
<option value="25">25%</option>
<option value="26">26%</option>
<option value="27">27%</option>
<option value="28">28%</option>






</select></td>
</tr>

<tr>
<td align="left" width="25%">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=19">Government Type</a>:</td>
<td align="left" width="72%" valign="top"> 
<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="Government_Type">
<option>Please Select A Government</option>
<option value="Capitalist">Capitalist</option>
<option value="Communist">Communist</option>
<option value="Democracy">Democracy</option>
<option value="Dictatorship">Dictatorship</option>
<option value="Federal Government">Federal Government</option>
<option value="Monarchy">Monarchy</option>
<option value="Republic">Republic</option>
<option value="Revolutionary Government">Revolutionary Government</option>
<option value="Totalitarian State">Totalitarian State</option>
<option value="Transitional">Transitional</option>

</select></td>
</tr>

<tr>
<td align="left" width="25%">Primary Ethnic Group:</td>
<td align="left" width="72%" valign="top"> 
<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="Ethnic_Group">
<option>Please Select Choose An Ethnic Group</option>
<option value="African">African</option>
<option value="Albanian">Albanian</option>
<option value="Amerindian">Amerindian</option>
<option value="Arab">Arab</option>
<option value="Arab-Berber">Arab-Berber</option>
<option value="Armenian">Armenian</option>
<option value="Black">Black</option>
<option value="British">British</option>
<option value="Bulgarian">Bulgarian</option>
<option value="Burman">Burman</option>
<option value="Caucasian">Caucasian</option>
<option value="Celtic">Celtic</option>
<option value="Chinese">Chinese</option>
<option value="Creole">Creole</option>
<option value="Croat">Croat</option>
<option value="Czech">Czech</option>
<option value="Dutch">Dutch</option>
<option value="Estonian">Estonian</option>
<option value="French">French</option>
<option value="German">German</option>
<option value="Greek">Greek</option>
<option value="Han Chinese">Han Chinese</option>
<option value="Italian">Italian</option>
<option value="Indian">Indian</option>
<option value="Japanese">Japanese</option>
<option value="Jewish">Jewish</option>
<option value="Korean">Korean</option>
<option value="Mestizo">Mestizo</option>
<option value="Mexican">Mexican</option>
<option value="Mixed">Mixed</option>
<option value="Norwegian">Norwegian</option>
<option value="Pacific Islander">Pacific Islander</option>
<option value="Pashtun">Pashtun</option>
<option value="Persian">Persian</option>
<option value="Russian">Russian</option>
<option value="Scandinavian">Scandinavian</option>
<option value="Serb">Serb</option>
<option value="Somali">Somali</option>
<option value="Spanish">Spanish</option>
<option value="Thai">Thai</option>
<option value="Turk">Turk</option>
</select></td>
</tr>

<tr>
<td align="right" width="32%">
<p align="left">

<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=375">DEFCON Level</a>:</td>
<td> 
<p align="left">
<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="DEFCON">
<option>Please select your initial DEFCON level...</option>
<option value="5">5 - Peacetime Readiness</option>
<option value="4">4 - Normal Readiness</option>
<option value="3">3 - Increased Readiness</option>
<option value="2">2 - Hightened Readiness</option>
<option value="1">1 - Maximum Readiness</option>

</select>
</td>
</tr>

<tr>
<td align="left" width="25%">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=9">War/Peace Preference</a>:</td>
<td align="left" width="72%" valign="top"> 
<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="Nation_Peace">
<option>Please Select Choose An Option</option>
<option value="0">War is an option.</option>
<option value="1">I do not want to be attacked.</option>
</select></td>
</tr>

<tr>
<td align="left" width="25%">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=18">National Religion</a>:</td>
<td align="left" width="72%" valign="top"> 
<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="Religion">
<option>Please Select Choose A Religion</option>
<option value="None">None</option>
<option value="Mixed">Mixed</option>
<option value="Baha'i Faith">Baha'i Faith</option>
<option value="Buddhism">Buddhism</option>
<option value="Christianity">Christianity</option>
<option value="Confucianism">Confucianism</option>
<option value="Hinduism">Hinduism</option>
<option value="Islam">Islam</option>
<option value="Jainism">Jainism</option>
<option value="Judaism">Judaism</option>
<option value="Norse">Norse</option>
<option value="Shinto">Shinto</option>
<option value="Sikhism">Sikhism</option>
<option value="Taoism">Taoism</option>
<option value="Voodoo">Voodoo</option>
</select></td>
</tr>

<tr>
<td align="left" width="25%" valign="top">About Your Nation:<br>
<i>(Do not use profanity or offensive language in your BIO! Your nation will be 
deleted if profanity or offensive language is discovered.)</i></td>
<td align="left" width="72%" valign="top"> 




<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()=" b-value-required="TRUE" --><textarea maxlength="250" onkeyup="return ismaxlength(this)" rows="6" name="Nation_Bio" cols="27"></textarea></td>
</tr>

<tr>
<td align="right" colspan="2">



<p align="left">
<b>
Click anywhere on the map to chose your base location.</b>
The 
markers that pre-exist on the map indicate the locations of the 30 most powerful active nations and 
their team colors. You can choose water locations which will be considered as 
floating cities in Cyber Nations.<br>
<noscript> 
<font color="Red">***If you are seeing this line (for more than a few seconds), you have 
JavaScript disabled (or an unsupported browser). In order to play Cyber Nations you must
use a compatable browser and have Java Scripts turned on.***</font>
</noscript> 
&nbsp;<div align="center">
<table border="0" width="100%" id="table4" cellspacing="0" cellpadding="0">
<tr>
<td align="center">
<div id="map" style="width: 100%; height: 450px" ></div>


</td>
</tr>
</table>

<p>&nbsp;



</td>
</tr>

<tr>
<td align="right" width="25%">
<p align="left"><font color="#808080">Click on the map above to 
get these coordinates: (Do not attempt to type them yourself.)</font></td>
<td align="left" width="72%"> 
<font color="#808080">
&nbsp;<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="-." s-validation-constraint="Not equal to" s-validation-value="lat" --><input STYLE="color: #808080" type=text id="lat" value="lat" name="lat0" onFocus="this.blur()" size="23"/><br>
</font><font color="#808080">
&nbsp;<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="-." s-validation-constraint="Not equal to" s-validation-value="lon" --><input STYLE="color: #808080" type=text id="lon" value="lon" name="long0" onFocus="this.blur()" size="23"/> </font></td>
</tr>

</table>

</font>
</div>


<p align="center">


<!--#include file="activitycheck.php" -->

<input type="submit" class="Buttons" name="Submit" value="Create My Nation">
<p>
</p>
</form> 
<p align="left"> 
</table>

</font>
</div>
</table>

</font>
</div>
</table>

</font>
</div>


</body>

</html>

<script type="text/javascript">
//&lt;![CDATA[

var icon = new GIcon();
icon.iconSize = new GSize(12, 20);
icon.shadowSize = new GSize(33, 20);
icon.iconAnchor = new GPoint(9, 20);
icon.infoWindowAnchor = new GPoint(9, 2);
icon.infoShadowAnchor = new GPoint(18, 25);

function createMarker(point,html) 
{
// FF 1.5 fix
html = '<div align="left" style="white-space:nowrap;"><font color="#000000">' + html + '</font></div>';
var marker = new GMarker(point, icon);
GEvent.addListener(marker, "click", function() {marker.openInfoWindowHtml(html);});						
return marker;
}		


function loadMap()
{
var map = new GMap2(document.getElementById("map"));
map.addControl(new GLargeMapControl());
map.addControl(new GMapTypeControl());
map.setCenter(new GLatLng(0, 0), 1);
map.addControl(new GOverviewMapControl(new GSize(150, 100)));
var omap = document.getElementById("map_overview");
var place = document.getElementById("map");
place.appendChild(omap);
omap.style.right = "0px";
omap.style.bottom = "8px";




<? 
  while((!($rsGuestbook==0)))
  {

?>
<?     if ($rsGuestbook["Nation_Team"]="None"$then; )
    {

$icon->image="assets/mm_20_grey.png"$;;
$icon->image="assets/mm_20_<% = rsGuestbook("$Nation_Team"); ?>.png";
<?     } ?>
var point = new GPoint(<?     echo $rsGuestbook["Nation_Lon"]; ?>,<?     echo $rsGuestbook["Nation_Lat"]; ?>);
var marker = createMarker(point,'');
map.addOverlay(marker);	

<? 
    $rsGuestbook=mysql_fetch_array($rsGuestbook_query);
    $rsGuestbook_BOF=0;

  } 
?>

GEvent.addListener(map, "click", function(overlay, point)
{
map.clearOverlays();
if (point) 
{
map.addOverlay(new GMarker(point, icon));
map.panTo(point);

var thelat = point.y;
var thelon = point.x;				

//savecode = "<input type=hidden name=latitude value=" + thelat + "><input type=hidden name=longitude value=" + thelon + ">";
document.getElementById("lon").value = point.x;
document.getElementById("lat").value = point.y;
//document.getElementById("lat").innerHTML = thelat;
//document.getElementById("lon").innerHTML = thelon;


//document.getElementById("savelocation").innerHTML = savecode;
map.clearOverlays();
icon.image = "assets/mm_20_big.png";
icon.shadow = "assets/mm_20_big_shadow.png";
icon.iconSize = new GSize(20, 34);
icon.shadowSize = new GSize(37, 34);
icon.iconAnchor = new GPoint(9, 34);
icon.infoWindowAnchor = new GPoint(9, 2);
icon.infoShadowAnchor = new GPoint(18, 25);
var point = new GPoint(point.x, point.y);
var marker = createMarker(point,'');
map.addOverlay(marker);		
}
}
);


}

// arrange for our onload handler to 'listen' for onload events
if (window.attachEvent) 
{
window.attachEvent("onload", function() 
{
loadMap();	// Internet Explorer
}
);
} 
else
{
window.addEventListener("load", function()
{
loadMap(); // Firefox and standard browsers
}, false);
}
//]]&gt;
</script >

<? }
  else
{
?><font color="#FF0000">

<br>Sorry but you already have <?   print $rsAllUsers_total;?> nation. 
<a href="nation_drill_display.asp?Nation_ID=<?   echo $rsGuestbookHead["Nation_ID"]; ?>">Click here to view your nation</a></font>
</p></center></center></div></div>
<? } ?><!--#include file="inc_footer.asp" -->

<? 

$rsGuestbook=null;

$objConn->Close();
$objConn=null;

?><%
