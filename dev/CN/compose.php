<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("U_ID_session");
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
<!--#include file="inc_header.php" -->
<? 

// $rsSentMessages is of type "ADODB.Recordset"

echo $MM_conn_STRING_Messages;
echo "SELECT COUNT(ID) AS UTOTAL FROM EMessages WHERE MESS_DATE >= '".time()()."' AND MESS_From = '"+str_replace("'","''",$rsUser__MMColParam)+"' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$sentmessages=$rsSentMessages["UTOTAL"];

$rsSentMessages=null;




// *** Edit Operations: declare variables





$MM_editAction=$_SERVER["SCRIPT_NAME"];
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
// *** Insert Record: set variables


if ((${"MM_insert"}=="form1"))
{


  if ($sentmessages>=10)
  {

?>          
	<!-- #include file="CAPTCHA/CAPTCHA_process_form.php" -->          
	<? 

    if (!$blnCAPTCHAcodeCorrect)
    {

      $denyreason_session="You did not enter the validation code correctly.";
      header("Location: "."activity_denied.asp");
    } 

  } 




  if (strtoupper($_POST["from"])!=strtoupper($rsUser["U_ID"]))
  {
?>
<!--#include file="activitylog.php" -->
<?     $denyreason_session="The User ID sending the message does not match your own User ID.";
    header("Location: "."activity_denied.asp");
  } 


  if (((strpos($_POST["messaging_message"],"<") ? strpos($_POST["messaging_message"],"<")+1 : 0)>0) || ((strpos($_POST["messaging_subject"],"<") ? strpos($_POST["messaging_subject"],"<")+1 : 0)>0))
  {

    $denyreason_session="Do not use invalid characters in messages.";
?>
<!--#include file="activitylog.php" -->
<? 
    header("Location: "."activity_denied.asp");
  } 

  if (((strpos($_POST["messaging_message"],">") ? strpos($_POST["messaging_message"],">")+1 : 0)>0) || ((strpos($_POST["messaging_subject"],">") ? strpos($_POST["messaging_subject"],">")+1 : 0)>0))
  {

    $denyreason_session="Do not use invalid characters in messages.";
?>
<!--#include file="activitylog.php" -->
<? 
    header("Location: "."activity_denied.asp");
  } 

  if (((strpos($_POST["messaging_message"],"#") ? strpos($_POST["messaging_message"],"#")+1 : 0)>0) || ((strpos($_POST["messaging_subject"],"#") ? strpos($_POST["messaging_subject"],"#")+1 : 0)>0))
  {

    $denyreason_session="Do not use invalid characters in messages.";
?>
<!--#include file="activitylog.php" -->
<? 
    header("Location: "."activity_denied.asp");
  } 

  if (((strpos($_POST["messaging_message"],"%") ? strpos($_POST["messaging_message"],"%")+1 : 0)>0) || ((strpos($_POST["messaging_subject"],"%") ? strpos($_POST["messaging_subject"],"%")+1 : 0)>0))
  {

    $denyreason_session="Do not use invalid characters in messages.";
?>
<!--#include file="activitylog.php" -->
<? 
    header("Location: "."activity_denied.asp");
  } 








  $MM_editConnection=$MM_conn_STRING_Messages;
  $MM_editTable="EMESSAGES";
  if ($_GET!="")
  {

    $MM_editRedirectUrl="inbox.asp";
//else MM_editRedirectUrl = "inbox.asp"

  } 

  $MM_fieldsStr="messaging_toid|value|messaging_subject|value|from|value|messaging_message|value";
  $MM_columnsStr="U_ID|',none,''|SUBJECT|',none,''|MESS_FROM|',none,''|MESSAGE|',none,''";

// create the MM_fields and MM_columns arrays

  $MM_fields=$Split[$MM_fieldsStr]["|"];
  $MM_columns=$Split[$MM_columnsStr]["|"];

// set the form values

  for ($MM_i=0; $MM_i<=count($MM_fields); $MM_i=$MM_i+2)
  {
    $MM_fields[$MM_i+1]=$_POST[$MM_fields[$MM_i]];

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
// *** Insert Record: construct a sql insert statement and execute it



if ((${"MM_insert"}!=""))
{


// create the sql insert statement

  $MM_tableValues="";
  $MM_dbValues="";
  for ($MM_i=0; $MM_i<=count($MM_fields); $MM_i=$MM_i+2)
  {
    $MM_formVal=$MM_fields[$MM_i+1];
    $MM_typeArray=$Split[$MM_columns[$MM_i+1]][","];
    $MM_delim=$MM_typeArray[0];
    if (($MM_delim=="none"))
    {
      $MM_delim="";
    } 
    $MM_altVal=$MM_typeArray[1];
    if (($MM_altVal=="none"))
    {
      $MM_altVal="";
    } 
    $MM_emptyVal=$MM_typeArray[2];
    if (($MM_emptyVal=="none"))
    {
      $MM_emptyVal="";
    } 
    if (($MM_formVal==""))
    {

      $MM_formVal=$MM_emptyVal;
    }
      else
    {

      if (($MM_altVal!=""))
      {

        $MM_formVal=$MM_altVal;
      }
        else
      if (($MM_delim=="'"))
      {
// escape quotes

        $MM_formVal="'".str_replace("'","''",$MM_formVal)."'";
      }
        else
      {

        $MM_formVal=$MM_delim+$MM_formVal+$MM_delim;
      } 

    } 

    if (($MM_i!=0))
    {

      $MM_tableValues=$MM_tableValues.",";
      $MM_dbValues=$MM_dbValues.",";
    } 

    $MM_tableValues=$MM_tableValues.$MM_columns[$MM_i];
    $MM_dbValues=$MM_dbValues.$MM_formVal;

  } 

  $MM_editQuery="insert into ".$MM_editTable." (".$MM_tableValues.") values (".$MM_dbValues.")";

  if ((!$MM_abortEdit))
  {

// execute the insert

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
// *** Move To Record: set the strings for the first, last, next, and previous ADS


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


// set the strings for the move to ADS

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
$rsUsers__MMColParam="1";
if (($U_ID_session!=""))
{

  $rsUsers__MMColParam=$U_ID_session;
} 

?> 


<? 

//Read in the record number to be updated

$lngRecordNo=intval($_GET["Nation_ID"]);
$lngRecordNo=str_replace("'","''",$lngRecordNo);

// $rsUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Users.U_ID, Nation.Poster, Nation.Nation_Name,Nation.Nation_Team FROM USERS,Nation WHERE Users.U_ID = Nation.Poster AND Nation.Nation_ID = ".$lngRecordNo;
echo 0;
echo 2;
echo 1;
$rs=mysql_query();

$rsUsers_numRows=0;
?>

<script type="text/javascript">
function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}
</script>


            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="0" valign="top">
				<div align="center">
					<table width="100%" border="0" cellspacing="0">
                    <tr> 
                      <td height="278" valign="top"> <div align="center"> 


                          <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.messaging_subject.value == "")
  {
    alert("Please enter a value for the \"Subject\" field.");
    theForm.messaging_subject.focus();
    return (false);
  }

  if (theForm.messaging_subject.value.length > 50)
  {
    alert("Please enter at most 50 characters in the \"Subject\" field.");
    theForm.messaging_subject.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789-'.\",:;*-+!()?/_=’`$&@ \t\r\n\f";
  var checkStr = theForm.messaging_subject.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()?/_=’`$&@\" characters in the \"Subject\" field.");
    theForm.messaging_subject.focus();
    return (false);
  }

  if (theForm.messaging_message.value == "")
  {
    alert("Please enter a value for the \"Message\" field.");
    theForm.messaging_message.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789-'.\",:;*-+!()?/_=’`$&@ \t\r\n\f";
  var checkStr = theForm.messaging_message.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()?/_=’`$&@\" characters in the \"Message\" field.");
    theForm.messaging_message.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form ACTION="<? echo $MM_editAction; ?>" METHOD="POST" name="FrontPage_Form1" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
                            <div align="center">
                            <table width="100%" 
                              border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
                              <tbody>
                                <tr bgcolor="5E6C50" class=colorformheader> 
                                  <td colspan=2 bgcolor="#000080">
                                  <p align="left"><font color="#FFFFFF"><font class=textsize9><b>&nbsp;:. Compose 
                                    A Message To <? echo $rsUsers["U_ID"]; ?> ruler of (<? echo $rsUsers["Nation_Name"]; ?>)</font></td>
                                </tr>
                                <tr class=colorformfields> 
                                  <td align=right width="31%"><font 
                                class=textsize9>To Nation / Member Id:</font></td>
                                  <td width="69%"><font class=textsize9> 
     
     <? if ($rsUser["Color_Blind"]!=1)
{
?>
	  <img border="0" src="images/teams/team_<?   echo $rsUsers["Nation_Team"]; ?>.gif" width="14" height="13" title="Team: <?   echo $rsUsers["Nation_Team"]; ?>"> 
	 <? } ?>
                         
	
                                 
<? echo $rsUsers["U_ID"]; ?> (<? echo $rsUsers["Nation_Name"]; ?>)
<input type=hidden name="messaging_toid" value="<? echo $rsUsers["U_ID"]; ?>">
                                 &nbsp;</font></td>
                                </tr>
                                <tr class=colorformfieldsalt> 
                                  <td align=right width="31%"><font 
                                class=textsize9>Subject:</font></td>
                                  <td><font class=textsize9> 
                                    &nbsp;<!--webbot bot="Validation" s-display-name="Subject" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()?/_=’`$&amp;@" b-value-required="TRUE" i-maximum-length="50" --><input class=inputFieldIE 
                                maxlength=50 size=60 
                                name=messaging_subject>
                                    <input name="from" type="hidden" id="from2" value="<? echo ($rsUser->Fields.$Item["U_ID"].$Value); ?>">
                                    </font></td>
                                </tr>
                                <tr>
                                  <td align=right width="31%" valign="top"><font 
                                class=textsize9>Message</font></td>
                                  <td><font class=textsize9> 
                                    &nbsp;<!--webbot bot="Validation" s-display-name="Message" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()?/_=’`$&amp;@" b-value-required="TRUE" --><textarea maxlength="250" onkeyup="return ismaxlength(this)" class=inputFieldIE name=messaging_message rows=10 cols=50></textarea>
                                    </font></td>
                                </tr>
<? if ($sentmessages>=10)
{
?>                                                             
<tr>
<td class="title" valign="top">
<p align="right">
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<br>
</font><font class="textsize9">Enter the code exactly 
as you see it:</font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><br />
</font></font></td>
<td valign="top"> 
<br />
<!--#include file="CAPTCHA/CAPTCHA_form_inc.php" -->
</td>
</tr>
<? } ?>                   			
                      			
                      			
                                <tr class=colorformfields> 
                                  <td align=right colspan=2><div align="center">&nbsp;</div>
									<div align="center"><font class=textsize9> 
                                      <input name=submit2 type=submit class=Buttons id=submit2 value="Send Message">
                                      	</font></div>
									<div align="center">&nbsp;</div>
									<div align="left"><i>IMPORTANT: Using a m</i><font class=textsize9><i>ass 
										messaging script to mass message other 
										users in Cyber Nations is strictly 
										prohibited. Do not use any form of 
										software with this messaging system. 
										Using scripts and messaging software 
										will quickly get you banned from the 
										game.</i><br>
&nbsp;</font></div></td>
                                </tr>
                              </tbody>
                            </table>
                            </div>
                            <input type="hidden" name="MM_insert" value="form1">
                          </form>
                            <? if ($_GET=="sent")
{
?>
                            </p>
							<p><b><em style="font-style: normal">
							<span style="background-color: #FFFF00">Your Message Was Successfully Sent</span> 
                            <? } ?>
                        </div></td>
                    </tr>
                  </table>
                  </div>
                  <p>&nbsp; </p> <br>
                  <form action="search.php" method="get" name="dirsearch" id="dirsearch">
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td width="50%">
		<p align="right">Search For Nations &amp; Rulers:</td>
		<td width="50%"><div align="left"><font size="1"> 
<input name="search" class="displayFieldIE" id="search" size="27" style="float: left">
</font></div><input name="imageField" type="image" id="imageField" src="assets/go.gif" width="21" height="14" border="0"></td>
		</td>
	</tr>
</table>
</form>
                </td>
              </tr>
            </table>
			
            <!--#include file="inc_footer.php" -->
<? 

$rsUsers=null;

$objConn->Close;
$objConn=null;

?>
