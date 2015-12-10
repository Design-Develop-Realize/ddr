<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
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
<!--#include file="inc_header.php" -->
<!--#include file="calculations.php" -->


<? 
// $rsSent is of type "ADODB.Recordset"

$rsSentSQL="SELECT *  FROM Aid WHERE Declaring_Nation_ID = '".$rsGuestbookHead["Nation_ID"]."' OR Receiving_Nation_ID = '".$rsGuestbookHead["Nation_ID"]."' ORDER BY Aid_Declaration_Date DESC";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSentSQL);


if (!($rsSent_BOF==1) && !($rsSent==0))
{

//Loop through the recordset

  $counters=0;
  while((!($rsSent==0)))
  {

    if (($Item["Aid_Cancled"]$Value)==1 && ($Item["Aid_Declaration_Date"]$Value)>=time()()-9)
    {

      $counters=$counters+1;
    } 

    $rsSent=mysql_fetch_array($rsSent_query);
    $rsSent_BOF=0;

  } 
} 


$rsSent=null;


if ($counters>=$aidslots)
{

  $denyreason_session="You do not have any aid slots available at this time.";
  header("Location: "."activity_denied.asp");
} 

?>



<? 
$lngRecordNo0=intval($_GET["id"]);
$lngRecordNo0=str_replace("'","''",$lngRecordNo0);


// Update the aid agreement

// $rsUpdateAid is of type "ADODB.Recordset"

$rsUpdateAidSQL="SELECT * FROM Aid WHERE ID =".$lngRecordNo0;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateAidSQL);

if ($rsUpdateAid["Declaring_Nation_ID"]!=$rsGuestbookHead["Nation_ID"] && $rsUpdateAid["Receiving_Nation_ID"]!=$rsGuestbookHead["Nation_ID"])
{

  $denyreason_session="That foreign aid agreement does not belong to you.";
  header("Location: "."activity_denied.asp");
}
  else
{

  if (("Aid_Cancled")!=0)
  {

    $denyreason_session="This foreign aid package has already been accepted or cannot be accepted at this time.";
    header("Location: "."activity_denied.asp");
  }
    else
  {

    $lngRecordNo1=intval($rsUpdateAid["Declaring_Nation_ID"]);
    $lngRecordNo2=intval($rsUpdateAid["Receiving_Nation_ID"]);
  } 

} 



// Update the senders account

// $rsUpdateEntry is of type "ADODB.Recordset"

$rsUpdateEntrySQL="SELECT * FROM Nation,Aid WHERE Nation.Nation_ID =".$lngRecordNo1." AND Aid.ID =".$lngRecordNo0;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntrySQL);
$rsUpdateEntry_numRows=0;

if (($rsUpdateEntry_BOF==1) && ($rsUpdateEntry==0))
{

  $denyreason_session="Sorry, but the sending nation no longer exists or an error has occured. Please delete this aid agreement.";
  header("Location: "."activity_denied.asp");
} 



$totalmoneyspent=$FormatNumber[$rsUpdateEntry["Money_Spent"]+$rsUpdateEntry["Government_Bills"]][2];
$totalmoneyavailable=($FormatNumber[($rsUpdateEntry["Money_Earned"]-$totalmoneyspent)][2]);

if (("Technology_Purchased")-("Resource_Sent_2")<0)
{

  $denyreason_session="Sorry, but the sending nation no longer has the required amount of technology to send this aid package. Please delete this foreign aid proposal.";
  header("Location: "."activity_denied.asp");
} 

if ($totalmoneyavailable-("Resource_Sent_1")<-500)
{

  $denyreason_session="Sorry, but the sending nation no longer has the required amount of money to send this aid package. This aid package would put the sender into more than $500 in debt. Please delete this foreign aid proposal.";
  header("Location: "."activity_denied.asp");
} 

if (("Military_Deployed")<0)
{

  $denyreason_session="Sorry, but the sending nation no longer has the required amount of deployed military to send this aid package. Please delete this foreign aid proposal.";
  header("Location: "."activity_denied.asp");
} 





//Money_Spent") = rsUpdateEntry.Fields("Money_Spent") + rsUpdateEntry.Fields("Resource_Sent_1")//Technology_Purchased") = rsUpdateEntry.Fields("Technology_Purchased") - rsUpdateEntry.Fields("Resource_Sent_2")//Military_Purchased") = rsUpdateEntry.Fields("Military_Purchased") - rsUpdateEntry.Fields("Resource_Sent_3")








// Send a message to the sender reminding them of the aid agreement

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

//U_ID") = rsUpdateEntry("Aid_Issued_By_User")//MESS_FROM") =  rsUpdateEntry("Aid_Issued_On_User") //MESSAGE") = "The foreign aid offer that was submitted by you to "& rsUpdateEntry("Aid_Issued_On_User") &" has been accepted and received by "& rsUpdateEntry("Aid_Issued_On_User") &". In this foreign aid package you sent $"& FormatNumber(rsUpdateEntry("Resource_Sent_1"),2) &", "& FormatNumber(rsUpdateEntry("Resource_Sent_2"),0) &" technology, and "& FormatNumber(rsUpdateEntry("Resource_Sent_3"),0) &" soldiers. Since this foreign aid offer has just now been accepted you may notice a decrease in your account for these items."//SUBJECT") = "Foreign Aid Accepted"//MESS_READ") = "False"



$rsAddComments=null;

$adoCon=null;





// Update the receivers account

// $rsUpdateEntry is of type "ADODB.Recordset"

$rsUpdateEntrySQL="SELECT * FROM Nation,Aid WHERE Nation.Nation_ID =".$lngRecordNo2." AND Aid.ID =".$lngRecordNo0;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntrySQL);
$rsUpdateEntry_numRows=0;
//Money_Spent") = rsUpdateEntry.Fields("Money_Spent") - rsUpdateEntry.Fields("Resource_Sent_1")//Technology_Purchased") = rsUpdateEntry.Fields("Technology_Purchased") + rsUpdateEntry.Fields("Resource_Sent_2")//Military_Purchased") = rsUpdateEntry.Fields("Military_Purchased") + rsUpdateEntry.Fields("Resource_Sent_3")

//Aid_Cancled") = 1

//Reset server objects


$rsUpdateEntry=null;

$objConn->Close();
$objConn=null;


$lngRecordNo=$rsGuestbookHead["Nation_ID"];
?>
<!--#include file="database_nationstrength.php" -->
<? 
//Return to the delete select page in case another record needs deleting

header("Location: "."aid_information.asp");
?>
