<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<? // asp2php (vbscript) converted
$CODEPAGE="1252"; ?> 
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
<!--#include file="connection.php" -->

<? 
$rsMessage__MMColParam="1";
if (($_GET["ID"]!=""))
{

  $rsMessage__MMColParam=intval($_GET["ID"]);
} 

?> <? 

// $rsMessage is of type "ADODB.Recordset"

echo $MM_conn_STRING_Messages;
echo "SELECT *  FROM EMESSAGES  WHERE ID ="+str_replace("'","''",$rsMessage__MMColParam)+"";
echo 0;
echo 2;
echo 1;
$rs=mysql_query();

$rsMessage_numRows=0;
?>

<script type="text/javascript">
function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}
</script>

<!--#include file="inc_header.php" -->


<? if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["U_ID"].$Value) && strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["MESS_FROM"].$Value))
{
?>
	<body style="text-align: center">

	<font color="#FF0000">Please do not attempt to cheat.</font>
<? }
  else
{
?>

	<?   if ($_POST["report"]=="")
  {
?>
	<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.report.value == "")
  {
    alert("Please enter a value for the \"report\" field.");
    theForm.report.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form method="post" action="reportMessage.asp?ID=<?     echo $rsMessage["ID"]; ?>" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript" name="FrontPage_Form1">
	
	<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
	<td colspan="2" bgcolor="#000080"><b>
	<font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF">
	Report A Message To Moderation</font></b></td>
	</tr>
	<tr>
	<td colspan="2" height="19" align="left"><strong>To:</strong><?     echo (.$Item["U_ID"].$Value); ?>&nbsp;&nbsp;&nbsp;<strong>From:</strong><?     echo (.$Item["MESS_FROM"].$Value); ?> &nbsp;&nbsp;<?     echo (.$Item["MESS_DATE"].$Value); ?>&nbsp;<strong>Subject: </strong><?     echo (.$Item["SUBJECT"].$Value); ?><br>
	<p><?     echo (.$Item["MESSAGE"].$Value); ?></p><br></td>
	</tr>
	<tr>
	<td width="346" valign="top">Please indicate why you are reporting 
	this message:<br>
&nbsp;</td>
	<td width="62%" valign="top">
	&nbsp;<!--webbot bot="Validation" b-value-required="TRUE" --><textarea maxlength="250" onkeyup="return ismaxlength(this)" rows="4" name="report" cols="34"></textarea></td>
	</tr>
	<tr>
	<td colspan="2">
	<p align="center"><br>
	&nbsp;<div align="center">
		<table border="0" width="60%" id="table2" cellspacing="0" cellpadding="2">
			<tr>
				<td width="15" valign="top">
				<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
				<strong>
<img border="0" src="assets/asterisk_red.gif" width="15" height="12"></strong></font></td>
				<td valign="top">
				<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
				<strong>
				WARNING: DO NOT abuse this system. It is for serious reports 
				only. Players caught abusing this system will be removed from 
				the game.</strong></font></td>
			</tr>
		</table>
	</div>
	<p align="center">
	<input type="submit" value="Report This Message" name="B1" onclick="return confirm('Reporting messages will send the original content of the message to moderation for review. You may use this feature if the message contains content that you find offensive or objectionable and in violation of the Cyber Nations terms and conditions. WARNING: DO NOT abuse this system. It is for serious reports only. Players caught abusing this system will be removed from the game. Are you sure you want to report the contents of this message to Moderation?');"><br>
	&nbsp;</td>
	</tr>
	</table>
	<p>&nbsp;</p>
	</form>
	<p>
	<?   } ?>


	<?   if ($_POST["report"]!="")
  {
?>

	<!--METADATA TYPE="typelib"
	UUID="CD000000-8B95-11D1-82DB-00C04FB1625D"
	NAME="CDO for Windows 2000 Library" -->
	<!--METADATA TYPE="typelib"
	UUID="00000205-0000-0010-8000-00AA006D2EA4"
	NAME="ADODB Type Library" -->
	<? 
// $objMail is of type "CDO.Message"

// $objConfig is of type "CDO.Configuration"

//Configuration:

$objConfig->Fields($cdoSendUsingMethod)=$cdoSendUsingPort;
$objConfig->Fields($cdoSMTPServer)="cybernations.net";
$objConfig->Fields($cdoSMTPServerPort)=25;
$objConfig->Fields($cdoSMTPAuthenticate)=$cdoBasic;
$objConfig->Fields($cdoSendUserName)="modremove@cybernations.net";
$objConfig->Fields($cdoSendPassword)="cybermods";
//Update configuration

$objConfig->Fields.$Update;
$objMail=$Configuration    echo $objConfig;


$objMail->From="modremove@cybernations.net";
$objMail->To="modremove@cybernations.net";
$objMail->Subject=.$Item["U_ID"].$Value." has reported a private message";
$objMail->TextBody="Date: "..$Item["MESS_DATE"].$Value." To: "..$Item["U_ID"].$Value." From: "..$Item["MESS_FROM"].$Value." "."\r\n"."Message: "..$Item["MESSAGE"].$Value.""."\r\n".""."\r\n"."Reason: ".$_POST["report"];
$objMail->Send;
    if ($Err->Number==0)
    {

//Response.Write("An email has been sent to you.")

    }
      else
    {

//Response.Write("Error sending mail. Code: " & Err.Number)

$Err->Clear;
    } 

    $objMail=null;

    $objConfig=null;



?>
	
	</p>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr> 
	<td width="100%" height="0" valign="top"> <table width="97%" height="0" border="0" cellpadding="0" cellspacing="0">
	<tr> 
	<td valign="bottom"> 
	<p align="center"><br>
	<br>
	<font color="#FF0000">The following message has been reported to moderation 
	for staff review.</font><br>
	&nbsp;<p align="center">&nbsp;</td>
	</tr>
	<tr> 
	<td valign="bottom"></td>
	</tr>
	<tr>
	<td bgcolor="#000080"><b>
	<font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF">MESSAGE</font></b></td>
	</tr>
	<tr>
	<td height="19" align="left"><strong>To:</strong><?     echo (.$Item["U_ID"].$Value); ?>&nbsp;&nbsp;&nbsp;<strong>From:</strong><?     echo (.$Item["MESS_FROM"].$Value); ?> &nbsp;&nbsp;<?     echo (.$Item["MESS_DATE"].$Value); ?>&nbsp;<strong>Subject: </strong><?     echo (.$Item["SUBJECT"].$Value); ?><br>
	<p><?     echo (.$Item["MESSAGE"].$Value); ?></p>
	<br>
	Reason: <?     echo $_POST["report"]; ?>
	</td>
	</tr>
	<tr valign="top"> 
	<td>&nbsp;</td>
	</tr>
	</table></td>
	<td width="150" valign="top"></td>
	</tr>
	</table>
	<p>&nbsp;</p>
	<p align="center"><a href="inbox.php">Return to Inbox</a></p>
	
	<?   } ?>

<? } ?>
<!--#include file="inc_footer.php" -->
<? 

$rsMessage=null;

$objConn->Close();
$objConn=null;

?>
