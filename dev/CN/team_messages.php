<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
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
$messaccess1=strtoupper("admin");
$messaccess2=strtoupper("all seeing eye");
?>


<script type="text/javascript">

/***********************************************
* Textarea Maxlength script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}

</script>







</head>
<!--#include file="inc_header.php" -->
<? 
// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT Nation_Team,Poster,Nation_ID FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);
?>
<!--#include file="election_code.php" -->
<? 
$access=0;
while(!$rsSent10->BOF && !$rsSent10->EOF)
{

  if ($rsGuestbookHead["Nation_ID"]==$rsSent10["Nation_ID"])
  {
    $access=1;
  }
;
  } 
$rsSent10->MoveNext;
} 
?>

<? if ($access==1 || strtoupper($rsUser->Fields.$Item["U_ID"].$Value)==$messaccess1 || strtoupper($rsUser->Fields.$Item["U_ID"].$Value)==$messaccess2)
{
?>

<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Priority.selectedIndex < 0)
  {
    alert("Please select one of the \"Priority\" options.");
    theForm.Priority.focus();
    return (false);
  }

  if (theForm.Priority.selectedIndex == 0)
  {
    alert("The first \"Priority\" option is not a valid selection.  Please choose one of the other options.");
    theForm.Priority.focus();
    return (false);
  }

  if (theForm.Title.value == "")
  {
    alert("Please enter a value for the \"Title\" field.");
    theForm.Title.focus();
    return (false);
  }

  if (theForm.Title.value.length > 20)
  {
    alert("Please enter at most 20 characters in the \"Title\" field.");
    theForm.Title.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'.\",:;*-+!()?/_= \t\r\n\f";
  var checkStr = theForm.Title.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()?/_=\" characters in the \"Title\" field.");
    theForm.Title.focus();
    return (false);
  }

  if (theForm.News_Info.value == "")
  {
    alert("Please enter a value for the \"News_Info\" field.");
    theForm.News_Info.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'.\",:;*-+!()?/_= \t\r\n\f";
  var checkStr = theForm.News_Info.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()?/_=\" characters in the \"News_Info\" field.");
    theForm.News_Info.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="team_messages_code.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">      



<div align="center">
<p align="left">
<font color="black"><br>
<b>Use this screen to post bulletin messages for everyone in your team to read. 
Only team senators may send team bulletin messages.	
	



&nbsp;</b></font></p>
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<tr>
<td align="left" width="97%" colspan="2" bgcolor="#000080"><b>
<font color="#FFFFFF">Send Bulletin To All <?   echo $rsGuestbook0["Nation_Team"]; ?> Team Members</font></b></td>
</tr>

<tr>
<td align="left" width="25%">Poster:</td>
<td align="left" width="72%" valign="top">


<?   echo $rsGuestbook0["Poster"]; ?>

<input type="hidden" name="Poster" value="<?   echo $rsGuestbook0["Poster"]; ?>" size="20">
</td>
</tr>

<tr>
<td align="left" width="25%">Team:</td>
<td align="left" width="72%" valign="top">
<?   if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)==$messaccess1 || strtoupper($rsUser->Fields.$Item["U_ID"].$Value)==$messaccess2)
  {
?>
All Teams (Your message will be sent for everyone to read)
<input type="hidden" name="Team" value="All" size="20"> 
<?   }
    else
  {
?>
<?     echo $rsGuestbook0["Nation_Team"]; ?>
<input type="hidden" name="Team" value="<?     echo $rsGuestbook0["Nation_Team"]; ?>" size="20"> 
<?   } ?>

<input type="hidden" name="Poster_Nation" value="<?   echo $rsGuestbook0["Nation_ID"]; ?>" size="20">
</td>
</tr>

<tr>
<td align="right" width="32%">
<p align="left">

Message Priority:</td>
<td> 
<p align="left">
<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="Priority">
<option>Select Message Priority...</option>

<option value="1">1 - General</option>
<option value="2">2 - Important</option>
<option value="3">3 - Critical</option>





</select>
</td>
	</tr>

<tr>
<td align="left" width="25%">
Message Title</td>
<td align="left" width="72%" valign="top"> 
<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()?/_=" b-value-required="TRUE" i-maximum-length="20" --><input type="text" maxlength="20" name="Title" size="20"></td>
</tr>

<tr>
<td align="left" width="25%" valign="top">Message To Team:</td>
<td align="left" width="72%" valign="top"> 


<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()?/_=" b-value-required="TRUE" --><textarea maxlength="250" onkeyup="return ismaxlength(this)" rows="6" name="News_Info" cols="27"></textarea></td>
</tr>

</table>

</font>
</div>


<p align="center">

<!--#include file="activitycheck.php" -->

<input type="submit" class="Buttons" name="Submit" value="Create Team Message">
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
<? }
  else
{
?>
<p>
</p>&nbsp;<p align="center">You are not an elected official for the <?   echo $rsGuestbook0["Nation_Team"]; ?> 
Team therefore you may not post bulletins. </p>

<? } ?></html>

<!--#include file="inc_footer.php" -->

<? 
$rsSent10->Close;
$rsSent10=null;

$rsSent20->Close;
$rsSent20=null;

$rsSent30->Close;
$rsSent30=null;

$rsGuestbook->Close;
$rsGuestbook=null;


$objConn->Close();
$objConn=null;

?>
