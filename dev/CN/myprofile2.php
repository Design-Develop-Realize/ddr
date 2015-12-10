<?
  session_start();
  session_register("Validate_session");
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
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
<? $LS=$_GET["vs"]; ?>
<? 
// *** Edit Operations: declare variables


$MM_editAction=${"URL"};
if (($_GET!=""))
{

  $MM_editAction=$MM_editAction."?".$_GET;
} 


// boolean to abort record edit

$MM_abortEdit=false;

// query string to execute

$MM_editQuery="";
?>
<? 
// *** Go To Record and Move To Record: create strings for maintaining URL and Form parameters


// create the list of parameters which should not be maintained

$MM_removeList="&index=";
if (($MM_paramName!=""))
{
  $MM_removeList=$MM_removeList."&".$MM_paramName."=";
} 
$MM_keepURL=""; $MM_keepForm=""; $MM_keepBoth=""; $MM_keepNone="";

// add the URL parameters to the MM_keepURL string

foreach ($_GET as $Item)
{

  $NextItem="&".$Item."=";
  if (((strpos(1,$MM_removeList,$NextItem,1) ? strpos(1,$MM_removeList,$NextItem,1)+1 : 0)==0))
  {

    $MM_keepURL=$MM_keepURL.$NextItem.rawurlencode($_GET[$Item]);
  } 

} 
// add the Form variables to the MM_keepForm string

foreach ($_POST as $Item)
{

  $NextItem="&".$Item."=";
  if (((strpos(1,$MM_removeList,$NextItem,1) ? strpos(1,$MM_removeList,$NextItem,1)+1 : 0)==0))
  {

    $MM_keepForm=$MM_keepForm.$NextItem.rawurlencode($_POST[$Item]);
  } 

} 
// create the Form + URL string and remove the intial '&' from each of the strings$MM_keepBoth=$MM_keepURL.$MM_keepForm;
if (($MM_keepBoth!=""))
{
  $MM_keepBoth=substr($MM_keepBoth,strlen($MM_keepBoth)-(strlen($MM_keepBoth)-1));
} 
if (($MM_keepURL!=""))
{
  $MM_keepURL=substr($MM_keepURL,strlen($MM_keepURL)-(strlen($MM_keepURL)-1));
} 
if (($MM_keepForm!=""))
{
  $MM_keepForm=substr($MM_keepForm,strlen($MM_keepForm)-(strlen($MM_keepForm)-1));
} 

// a utility function used for adding additional parameters to these strings

function MM_joinChar($firstItem)
{
  extract($GLOBALS);


  if (($firstItem!=""))
  {

    $MM_joinChar="&";
  }
    else
  {

    $MM_joinChar="";
  } 

  return $function_ret;
} 
?>
<? 
// *** Move To Record: set the strings for the first, last, next, and previous links


$MM_keepMove=$MM_keepBoth;
$MM_moveParam="index";

// if the page has a repeated region, remove 'offset' from the maintained parametersif (($MM_size>0))
{

  $MM_moveParam="offset";
  if (($MM_keepMove!=""))
  {

    $params=$Split[$MM_keepMove]["&"];
    $MM_keepMove="";
    for ($i=0; $i<=count($params); $i=$i+1)
    {

      $nextItem=substr($params[$i],0,(strpos($params[$i],"=") ? strpos($params[$i],"=")+1 : 0)-1);
      if ((strcmp($nextItem,$MM_moveParam,1)!=0))
      {

        $MM_keepMove=$MM_keepMove."&".$params[$i];
      } 


    } 

    if (($MM_keepMove!=""))
    {

      $MM_keepMove=substr($MM_keepMove,strlen($MM_keepMove)-(strlen($MM_keepMove)-1));
    } 

  } 

} 


// set the strings for the move to links

if (($MM_keepMove!=""))
{
  $MM_keepMove=$MM_keepMove."&";
} 
$urlStr=$_SERVER["URL"]."?".$MM_keepMove.$MM_moveParam."=";
$MM_moveFirst=$urlStr."0";
$MM_moveLast=$urlStr."-1";
$MM_moveNext=$urlStr.$MM_offset+$MM_size;
$prev=$MM_offset-$MM_size;
if (($prev<0))
{
  $prev=0;
} 
$MM_movePrev=$urlStr.$prev;
?>
<? 
// *** Update Record: set variables


if ((${"MM_update"}!="" && ${"MM_recordId"}!=""))
{


  $MM_editConnection=$MM_conn_STRING;
  $MM_editTable="USERS";
  $MM_editColumn="U_ID";
  $MM_recordId="'"+$_POST["MM_recordId"]+"'";
  $MM_editRedirectUrl="default.asp";
  $MM_fieldsStr="U_FIRST|value|U_PASSWORD|value|U_LAST|value|U_ADDRESS|value|U_CITY|value|U_STATE|value|U_ZIP|value|U_PHONE|value|U_FAX|value|checkbox|value|classifieds|value|BIO|value|Completed|value|Send_Message|value|Sent_Message_Email|value";
  $MM_columnsStr="U_FIRST|',none,''|U_PASSWORD|',none,''|U_LAST|',none,''|U_ADDRESS|',none,''|U_CITY|',none,''|U_STATE|',none,''|U_ZIP|',none,''|U_PHONE|',none,''|U_FAX|',none,''|email_subscribe|none,1,0|CLASSIFIEDS|none,1,0|BIO|',none,''|Completed|',none,''|Send_Message|',none,''|Sent_Message_Email|',none,''";

// create the MM_fields and MM_columns arrays

  $MM_fields=$Split[$MM_fieldsStr]["|"];
  $MM_columns=$Split[$MM_columnsStr]["|"];

// set the form values

  for ($i=0; $i<=count($MM_fields); $i=$i+2)
  {
    $MM_fields[$i+1]=$_POST[$MM_fields[$i]];

  } 


// append the query string to the redirect URL

  if (($MM_editRedirectUrl!="" && $_GET!=""))
  {

    if (((strpos(1,$MM_editRedirectUrl,"?",$vbTextCompare) ? strpos(1,$MM_editRedirectUrl,"?",$vbTextCompare)+1 : 0)==0 && $_GET!=""))
    {

      $MM_editRedirectUrl=$MM_editRedirectUrl."?".$_GET;
    }
      else
    {

      $MM_editRedirectUrl=$MM_editRedirectUrl."&".$_GET;
    } 

  } 


} 

?>
<? 
// *** Update Record: construct a sql update statement and execute it


if ((${"MM_update"}!="" && ${"MM_recordId"}!=""))
{


// create the sql update statement

  $MM_editQuery="update ".$MM_editTable." set ";
  for ($i=0; $i<=count($MM_fields); $i=$i+2)
  {
    $FormVal=$MM_fields[$i+1];
    $MM_typeArray=$Split[$MM_columns[$i+1]][","];
    $Delim=$MM_typeArray[0];
    if (($Delim=="none"))
    {
      $Delim="";
    } 
    $AltVal=$MM_typeArray[1];
    if (($AltVal=="none"))
    {
      $AltVal="";
    } 
    $EmptyVal=$MM_typeArray[2];
    if (($EmptyVal=="none"))
    {
      $EmptyVal="";
    } 
    if (($FormVal==""))
    {

      $FormVal=$EmptyVal;
    }
      else
    {

      if (($AltVal!=""))
      {

        $FormVal=$AltVal;
      }
        else
      if (($Delim=="'"))
      {
// escape quotes

        $FormVal="'".str_replace("'","''",$FormVal)."'";
      }
        else
      {

        $FormVal=$Delim+$FormVal+$Delim;
      } 

    } 

    if (($i!=0))
    {

      $MM_editQuery=$MM_editQuery.",";
    } 

    $MM_editQuery=$MM_editQuery.$MM_columns[$i]." = ".$FormVal;

  } 

  $MM_editQuery=$MM_editQuery." where ".$MM_editColumn." = ".$MM_recordId;

  if ((!$MM_abortEdit))
  {

// execute the update

// $MM_editCmd is of type "ADODB.Command"

    $MM_editCmd_ActiveConnection=$MM_editConnection;
        $MM_editCmd_CommandText=$MM_editQuery;
        $MM_editCmd_Execute=    $MM_editCmd_ActiveConnection=$Close;
;
        if (($MM_editRedirectUrl!=""))
    {

      header("Location: ".$MM_editRedirectUrl);
    } 

  } 


} 

?>
<!--#include file="inc_header.php" -->


<body topmargin="0" text="#000000">

<table width="100%" height="100%" border="0" cellpadding="2" cellspacing="2">
<tr> 
<td width="100%" height="0"> 
<? if ($rsUser->EOF && $rsUser->BOF)
{
?><div align="center">
<strong>Please Login</strong> 
<? } 
// end rsUser.EOF And rsUser.BOF  


//top" width="100%"> <p align="left"> $br>;
echo 1$then; ?>
Thank you. You are almost finished. Please complete your 
registration below. 
<? }
  else
{
?>
You may edit your information below.
<? %>
</b><br>
</p>
<div align="center">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

<tr align="center" valign="middle" bgcolor="#FFFFFF" class="bodyText"> 
<td width="77%" bgcolor="#FFFFFF"> <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789-!@#$%^&*()-=_+?/.;'\" \t\r\n\f";
  var checkStr = theForm.U_PASSWORD.value;
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
    alert("Please enter only letter, digit, whitespace and \"!@#$%^&*()-=_+?/.;'\"\" characters in the \"U_PASSWORD\" field.");
    theForm.U_PASSWORD.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form ACTION="<? if (==$MM_editAction)
{
// METHOD="POST" name="FrontPage_Form1" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">} 
//100%" border="0" cellspacing="0" cellpadding="0">$rsUser->EOF|$Not$rsUser->BOF$Then; ?>
<tr> 
<td align="center" valign="top"> 
<div align="center">
<table cellspacing="0" border="1" bordercolor="#000080" cellpadding="8">
<tr valign="baseline"> 
<td align="right" nowrap bgcolor="#000080" height="24" colspan="2">
<p align="left"><b><font color="#FFFFFF">&nbsp;:. 
Manage Your Profile</font></b></td>
</tr>
<tr valign="baseline"> 
<td align="right" nowrap bgcolor="#F7F7F7" height="24" valign="top"><div align="right">
<strong>
<font color="#000000">
User Name:</font></strong></div></td>
<td width="74%" bgcolor="#F7F7F7" height="24" valign="top"> 
<font color="#000000"><b>
&nbsp;&nbsp;<? echo ($rsUser->Fields.$Item["U_ID"].$Value); ?></b></font></td>
</tr>
<tr valign="baseline"> 
<td align="right" nowrap bgcolor="#F7F7F7" height="29" width="22%" valign="top">
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<strong>
<img border="0" src="assets/asterisk_red.gif" width="15" height="12"></strong></font><strong><font color="#000000">Password:</font></strong></td>
<td bgcolor="#F7F7F7" height="29" valign="top">
<font color="#000000"><b>
&nbsp;<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="!@#$%^&amp;*()-=_+?/.;'&quot;" --><input type="password" name="U_PASSWORD" value="<? echo ($rsUser->Fields.$Item["U_PASSWORD"].$Value); ?>" size="50" class="inputFieldIE"><br>
&nbsp; </b><i><font size="1">You may change your password here at any time</font></i></font></td>
</tr>
<tr>
<td align="right" nowrap bgcolor="#F7F7F7" width="22%" valign="top">
<font color="#000000">
<b>
&nbsp;</b><strong>Registered E-Mail Address:</strong></font></td>
<td> <font color="#000000">
<b>
&nbsp;&nbsp;<? echo ($rsUser->Fields.$Item["U_EMAIL"].$Value); ?></b></font></td>
</tr>

<tr>
<td align="right" nowrap bgcolor="#F7F7F7" width="22%" valign="top">
<font color="#000000">
<b>
&nbsp;</b><strong>Send in-game private <br>
messages to your email?</strong></font></td>
<td> <font color="#000000">
<b>

<input type="checkbox" name="Send_Message" value=1 <? if ($rsUser["Send_Message"]==1)
{
?>checked<? } ?>> Yes, send me the messages via 
email.</b></font></td>
</tr>
<tr>
<td align="right" nowrap bgcolor="#F7F7F7" valign="top">
<font color="#000000">
<b>
&nbsp;</b><strong>If yes above, to what email should <br>
private messages be sent?</strong></font></td>
<td> 
<font color="#000000"><b>
<input type="text" name="Sent_Message_Email" value="<? echo $rsUser["Sent_Message_Email"]; ?>" size="50" class="inputFieldIE"></b></font></td>
</tr>


<tr valign="baseline"> 
<td height="44" align="center" nowrap bgcolor="#F7F7F7" colspan="2">&nbsp;<p> 
<input name="submit" type="submit" class="Buttons" onClick="MM_validateForm('U_PASSWORD','','R','U_EMAIL','','RisEmail');return document.MM_returnValue" value="Submit"><font color="#000000">
</font> 

</p>

<p align="left">
&nbsp;</td>
</tr>
</table>
<p>&nbsp;</div>
<input type="hidden" name="Completed" value="YES"> 
<input type="hidden" name="MM_update" value="form1"> 
<input type="hidden" name="MM_recordId" value="<? echo $rsUser->Fields.$Item["U_ID"].$Value; ?>"> 
</td>
</tr>
<? ' end Not rsUser.EOF Or NOT rsUser.BOF %>
</table>
<input type="hidden" name="TM_insert" value="true">
</form>
</td>      
</tr>
</table>
</div>
<td valign="top">

</td>

</td>
</tr>
</table>
<!--#include file="inc_footer.php" -->
<? if ()
{
$objConn->Close();
} 
$objConn=null;

?>
