<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
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
<!--#include file="activity.php" -->
<!--#include file="inc_header.php" -->
<? 
// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT Resource1,Resource2,Nation_Team FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);
?>


<? 
// $rsSanction is of type "ADODB.Recordset"

$rsSanctionSQL="SELECT Nation_ID FROM Sanctions WHERE (Nation_ID='".$_POST["Receiving_Nation_ID"]."' OR Nation_ID= '".$_POST["Declaring_Nation_ID"]."' ) AND Sanction_Trade = 1 AND (Sanction_Team = '".$_POST["Receiving_Nation_Team"]."' OR Sanction_Team = '".$_POST["Declaring_Nation_Team"]."') ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSanctionSQL);

if (!($rsSanction_BOF==1) && !($rsSanction==0))
{

  $denyreason_session="Either your nation or the nation in question has trade sanctions placed against it by one of your teams. You may not offer trades at this time.";
  header("Location: "."activity_denied.asp");
} 



$rsSanction=null;

?>

<? 
$lngRecordNo1=$_POST["Declaring_Nation_ID"];
// $rsAddComments is of type "ADODB.Recordset"

echo $MM_conn_STRING_Trade;
echo "Trade";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();


//Add a new record to the recordset

//Trade_Issued_By_User") = Request.Form("Trade_Issued_By_User")//Trade_Issued_On_User") = Request.Form("Trade_Issued_On_User")//Receiving_Nation") = Request.Form("Receiving_Nation")//Receiving_Nation_ID") = Request.Form("Receiving_Nation_ID")//Declaring_Nation") = Request.Form("Declaring_Nation")//Declaring_Nation_ID") = Request.Form("Declaring_Nation_ID")
if (((strpos($_POST["Trade_Reason"],"%") ? strpos($_POST["Trade_Reason"],"%")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in in your trade reason.";
  header("Location: "."activity_denied.asp");
} 


if ($_POST["Trade_Reason"]=="")
{

  //Trade_Reason") = "Improved Foreign Relations"}
  else
{

  //Trade_Reason") = Server.HTMLEncode(Replace(Request.Form("Trade_Reason"), "'", "''")) } 

//Trade_Declaration_Date") = date()

if (strtoupper($_POST["Trade_Issued_By_User"])!=strtoupper($rsUser["U_ID"]) && strtoupper($_POST["Trade_Issued_On_User"])!=strtoupper($rsUser["U_ID"]))
{

  $denyreason_session="You are attempting to send a trade offer with a nation that does not belong to you. You have been logged for cheating.";
  header("Location: "."activity_denied.asp");
} 


//Resource_Sent_1") = rsGuestbook0("Resource1")//Resource_Sent_2") = rsGuestbook0("Resource2")

if ($_POST["Resource_Sent_1"]!=$rsGuestbook0["Resource1"] || $_POST["Resource_Sent_2"]!=$rsGuestbook0["Resource2"])
{

  $denyreason_session="Please stop attempt to cheat the trade system.";
  header("Location: "."activity_denied.asp");
} 



// $rsSent2 is of type "ADODB.Recordset"

$rsSent2SQL="SELECT Resource1,Resource2,Nation_Team FROM Nation WHERE Nation_ID = '"+$_POST["Receiving_Nation_ID"]+"' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSent2SQL);
$rsSent2_numRows=0;
//Resource_Receive_1") = rsSent2("Resource1")//Resource_Receive_2") = rsSent2("Resource2")
if ($_POST["Resource_Receive_1"]!=$rsSent2["Resource1"] || $_POST["Resource_Receive_2"]!=$rsSent2["Resource2"])
{

  $denyreason_session="Please stop attempt to cheat the trade system.";
  header("Location: "."activity_denied.asp");
} 



// Make sure their teams are correct

if ($_POST["Declaring_Nation_Team"]!=$rsGuestbook0["Nation_Team"] || $_POST["Receiving_Nation_Team"]!=$rsSent2["Nation_Team"])
{

  $denyreason_session="Your team information is incorrect.";
  header("Location: "."activity_denied.asp");
} 



if ($_POST["Trade_Within_Team"]==1)
{

// Make sure their teams are the same

  if ($rsGuestbook0["Nation_Team"]!=$rsSent2["Nation_Team"])
  {

    $denyreason_session="The form indicated an enabled trade within team bonus but your teams are not the same.";
    header("Location: "."activity_denied.asp");
  }
    else
  {

    if ($_POST["Secret"]!=1)
    {

      //Trade_Within_Team") = 1    } 

  } 

} 


//Write the updated recordset to the database



// $adoCon is of type "ADODB.Connection"

$a2p_connstr==$MM_conn_STRING_Messages;
$a2p_uid=strstr($a2p_connstr,'uid');
$a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$a2p_pwd=strstr($a2p_connstr,'pwd');
$a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$a2p_database=strstr($a2p_connstr,'dsn');
$a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$adoCon=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
mysql_select_db($a2p_database,$adoCon);
// $rsAddComments is of type "ADODB.Recordset"

$strSQL="EMESSAGES";
echo 2;
echo 3;
$rs=mysql_query($strSQL);

//Add a new record to the recordset

//U_ID") = Request.Form("Trade_Issued_On_User")//MESS_FROM") =  Request.Form("Trade_Issued_By_User")
if ($_POST["Secret"]!=1)
{

  //MESSAGE") = "A trade offer has been submitted by " & Request.Form("Trade_Issued_By_User") & ". You may review your <a href='trade_information.asp'>Trade Agreements</a> screen to accept or deny this trade. Please note that since this trade offer is not secret it is prone to any team sanctions." }
  else
{

  //MESSAGE") = "A secret trade offer has been submitted by " & Request.Form("Trade_Issued_By_User") & ". You may review your <a href='trade_information.asp'>Trade Agreements</a> screen to accept or deny this trade. Please note that since this trade offer was offered in secret it has forfeited any team bonuses but will be immune to any team sanctions." } 

//SUBJECT") = "Trade Offer"//MESS_READ") = "False"
//Write the updated recordset to the database




//Reset server objects

$rsUser->Close;
$rsUser=null;


$rsSent2=null;


$rsAddComments=null;

$objConn->Close();
$objConn=null;


//Redirect to the guestbook.asp page

header("Location: "."trade_information.asp?Nation_ID=".$lngRecordNo1);
?>
