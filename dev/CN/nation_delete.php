<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("alreadyused_session");
  session_register("activity_session");
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
// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT * FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);
?>
<? 
// $rsSent is of type "ADODB.Recordset"

$rsSentSQL="SELECT Count(ID) AS WARCNTR FROM WAR WHERE Receiving_Nation_Peace + Declaring_Nation_Peace <> 2 AND Nation_Deleted = 0 AND War_Declaration_Date >= getdate()-7 AND ((War_Declared_By_User = '".$rsUser["U_ID"]."' AND WAR.Nation_Deleted = 0) OR (War.War_Declared_ON_User = '".$rsUser["U_ID"]."'))";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSentSQL);
$activewars=$rsSent["WARCNTR"];

$rsSent=null;

?>
<? 
// $rsAidCount is of type "ADODB.Recordset"

$rsAidCountSQL="SELECT Count(*) As AidTotal FROM Aid WHERE Aid_Declaration_Date >= '".time()()-9."' AND Aid_Cancled <> 2 AND (Declaring_Nation_ID = '".$rsGuestbookHead["Nation_ID"]."' OR Receiving_Nation_ID = '".$rsGuestbookHead["Nation_ID"]."') ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsAidCountSQL);
$myaidcount=$rsAidCount["AidTotal"];
?>
<? 
//=======================================================================

if ($_POST["Nation_ID"]!="")
{

  if ($rsGuestbook0["Nation_Dated"]<=time()()-5)
  {

    if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
    {

      $denyreason_session="You are attempting to delete a nation that does not belong to you.";
      header("Location: "."activity_denied.asp");
    } 


    if ($activewars>0)
    {

      $denyreason_session="You are currently involved in a war and cannot delete your nation at this time.";
      header("Location: "."activity_denied.asp");
    } 


    if ($myaidcount>0)
    {

      $denyreason_session="You currently have active foreign aid offers and cannot delete your nation until the aid offers have expired.";
      header("Location: "."activity_denied.asp");
    } 


    if ($rsGuestbook0["Delete_Code"]!=sha256($_POST["Delete_Code"]) || $rsGuestbook0["Delete_Code"]=""|!isset($rsGuestbook0["Delete_Code"])$then;
$alreadyused_session=="True")
    {
      header("Location: "."nation_delete.asp");    } 

  }
    else
  {

// $rsDelete is of type "ADODB.Recordset"

        echo $MM_conn_STRING;
        echo "Delete FROM Nation WHERE Upper(Poster) = '".strtoupper($rsUser["U_ID"])."' ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
// $rsDelete is of type "ADODB.Recordset"

        echo $MM_conn_STRING;
        echo "Delete FROM War WHERE Upper(War_Declared_On_User) = '".strtoupper($rsUser["U_ID"])."' OR Upper(War_Declared_By_User) = '".strtoupper($rsUser["U_ID"])."' ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();

// $rsDelete is of type "ADODB.Recordset"

        echo $MM_conn_STRING;
        echo "Delete FROM Aid WHERE Upper(Aid_Issued_On_User) = '".strtoupper($rsUser["U_ID"])."' OR Upper(Aid_Issued_By_User) = '".strtoupper($rsUser["U_ID"])."' ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
// $rsDelete is of type "ADODB.Recordset"

        echo $MM_conn_STRING;
        echo "Delete FROM National_Events WHERE Upper(National_Event_Receiver_Ruler) = '".strtoupper($rsUser["U_ID"])."' ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
// $rsDelete is of type "ADODB.Recordset"

        echo $MM_conn_STRING;
        echo "Delete FROM Improvements WHERE Nation_ID = '".$rsGuestbook0["Nation_ID"]."' ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
// $rsDelete is of type "ADODB.Recordset"

        echo $MM_conn_STRING;
        echo "Delete FROM CLASSFAVORITES WHERE AD_ID = '".$rsGuestbook0["Nation_ID"]."' ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
// $rsDelete is of type "ADODB.Recordset"

        echo $MM_conn_STRING_Messages;
        echo "Delete FROM EMESSAGES WHERE Upper(U_ID) = '".strtoupper($rsUser["U_ID"])."' ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
?>
<? 
// Delete all nations who no longer have a U_ID in the users table

// $rsAllUsers is of type "ADODB.Recordset"

        echo $MM_conn_STRING_Trade;
        echo "delete From Trade WHERE not exists (SELECT a.Nation_ID FROM china.cybernations.dbo.Nation a WHERE a.Nation_ID = Trade.Declaring_Nation_ID)";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
?>
<? 
// Delete all nations who no longer have a U_ID in the users table

// $rsAllUsers is of type "ADODB.Recordset"

        echo $MM_conn_STRING_Trade;
        echo "delete From Trade WHERE not exists (SELECT a.Nation_ID FROM china.cybernations.dbo.Nation a WHERE a.Nation_ID = Trade.Receiving_Nation_ID)";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
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
$objConfig->Fields($cdoSendUserName)="webmaster@cybernations.net";
$objConfig->Fields($cdoSendPassword)="chevy$%^79!mail";
//Update configuration

$objConfig->Fields.$Update;
$objMail=$Configuration    echo $objConfig;


$objMail->From="webmaster@cybernations.net";
$objMail->To=$rsUser["U_Email"];
$objMail->Subject="Cyber Nations Deletion Complete";
    $URL="http://www.cybernations.net/nation_delete.asp";
$objMail->TextBody="Hello ".$rsUser["U_ID"].","."\r\n"."By user request your nation has been deleted. Thanks for playing Cyber Nations, "."\r\n"."\r\n"."Kevin (aka. Admin)";
$objMail->Send;
    if ($Err->Number==0)
    {

      print "An email has been sent to you.";
    }
      else
    {

      print "Error sending mail. Code: ".$Err->Number;
$Err->Clear;
    } 

    $objMail=null;

    $objConfig=null;


    
    $rsDelete=null;

  } 

}
  else
{

  $denyreason_session="Your nation is too new to delete at this time.";
  header("Location: "."activity_denied.asp");
} 

header("Location: "."nation_delete.asp?Completed=1");
'=======================================================================
%>

<body bgcolor="white" text="black">

<? if ()
{
  if ($myaidcount==0)
  {
?>
	
	<?     if ($activewars==0)
    {
?>		
	
		<?       if ($rsGuestbook0["Nation_Dated"]<=time()()-5)
      {
?>
			<?         if ($_POST["Nation_ID"]=="" && $_GET["Completed"]!=1)
        {
?>
			
			<?           if ($alreadyused_session=="True")
          {

            $Remove["alreadyused"];
?>
			<p></p>
			<p align="left">
			<font color="#FF0000"><strong>Sorry, the nation delete code that you entered is incorrect. Please try again or request a new
			<a href="nation_delete_email_code.php">nation delete code</a>.</strong></font> <br>
			&nbsp;
			<?           } ?>
			
			<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
			<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Delete_Code.value == "")
  {
    alert("Please enter a value for the \"Delete Code\" field.");
    theForm.Delete_Code.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789-";
  var checkStr = theForm.Delete_Code.value;
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
    alert("Please enter only letter and digit characters in the \"Delete Code\" field.");
    theForm.Delete_Code.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form method="post" action="nation_delete.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript" name="FrontPage_Form1">
			<tr>
			<td align="right" colspan="2" bgcolor="#000080">
			<p align="left"><b><font color="#FFFFFF">
			Delete </font> <a href="nation_drill_display.asp?Nation_ID=<?           echo $rsGuestbook0["Nation_ID"]; ?>">
			<font color="#FFFFFF"><?           echo $rsGuestbook0["Nation_Name"]; ?></font></a><font color="#FFFFFF">
			</font></b>
			</font> </td>
			</tr>
			<tr>
			<td align="left" colspan="2">Fill out the form below to process your nation 
			deletion. You must have a valid nation deletion code in order to perform this 
			action. If you do not have a <a href="nation_delete_email_code.php">nation 
			deletion code</a> you may have one sent to you via email. By deleting your 
			nation all trades, foreign aid offers, wars, private messages, saved 
			nations, national improvements, and national events for your nation will be 
			deleted. According to the Cyber Nations <a href="terms.php">terms and 
			condition</a> no compensation or refunds will be provided to any newly 
			re-created nations after deletion.</td>
			</tr>
			<tr>
			<td align="left" width="35%">Nation Name: </td>
			<td> 
			<b><?           echo $rsGuestbook0["Nation_Name"]; ?></b></td>
			</tr>
			<tr>
			<td align="left" width="35%">Ruler: </td>
			<td> 
			<b><?           echo $rsGuestbook0["Poster"]; ?></b></td>
			</tr>
			<tr>
			<td align="left" width="35%">Date Created: </td>
			<td> 
			<b><?           echo $rsGuestbook0["Nation_Dated"]; ?></b></td>
			</tr>
			<tr>
			<td align="left" width="35%">Nation Delete Code: </td>
			<td> 
			<!--webbot bot="Validation" s-display-name="Delete Code" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-value-required="TRUE" --><input type="password" name="Delete_Code" size="20"><br>
			<a href="nation_delete_email_code.php">Request Nation Delete Code</a></td>
			</tr>
			</table>
			<p align="center">   
			<!--#include file="activitycheck.php" -->
			<input type="hidden" name="Nation_ID" value="<?           echo $rsGuestbook0["Nation_ID"]; ?>">
			<input type="submit" class="Buttons" name="Submit" value="Delete My Nation" onclick="return confirm('Are you absolutley sure you want to delete your nation? All trades, foreign aid offers, wars, private messages, saved nations, national improvements, and national events for your nation will be deleted!');"> </p>
			</form>
			<p>&nbsp;</p>
			<?         } ?>
			<?         if ($_GET["Completed"]==1)
        {
?>
			<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
			<tr>
			<td align="right" bgcolor="#000080">
			<p align="left"><b><font color="#FFFFFF">
			Nation Successfully Deleted </font></b>
			</font> </td>
			</tr>
			<tr>
			<td align="left">You have successfully deleted your nation from the game. If you wish to continue playing Cyber 
			Nations you will need to create a new nation using the link to the left. 
			If you 
		no longer wish to play Cyber Nations your ruler account will be automatically deleted after 15 days of inactivity.
		</td>
			</tr>
			</table>
			<?         } ?>
		<?       }
        else
      {
?>
		<br>
		<font color="#FF0000"><b>Your nation is too new to be deleted at this time. Please wait until after <?         echo $FormatDateTime[$rsGuestbook0["Nation_Dated"]+5][2]; ?> to complete the nation deletion process.
		After <?         echo $FormatDateTime[$rsGuestbook0["Nation_Dated"]+5][2]; ?> you may freely delete your nation at any time. 
		
		
		</b></font>
		<?       } ?>
	<?     }
      else
    {
?>
	<p></p>
	<font color="#FF0000">Your nation is at war and cannot be deleted at this time. 
	You must wait until your wars auto expire after 7 days or until peace is declared before you can delete your nation.
	View your <a href="nation_war_information.asp?Nation_ID=<?       echo $rsGuestbook0["Nation_ID"]; ?>">War & Battle</a> screen for more details.</font><p>
	<?     } ?>
<?   }
    else
  {
?>
<p></p>
<font color="#FF0000">Your nation has active foreign aid offers and cannot be deleted at this time. 
You must cancel your foreign aid offers or wait until they auto expire after 10 days of the foreign aid offer date.
View your <a href="aid_information.asp?Nation_ID=<?     echo $rsGuestbook0["Nation_ID"]; ?>">Foreign Aid</a> screen for more details.</font><p>
<?   } } ?>
</body>
</html><!--#include file="inc_footer.php" -->
<? 
//Reset server objects

$rsSent->Close;
$rsSent=null;


$rsGuestbook0=null;

$objConn->Close();
$objConn=null;

?>
