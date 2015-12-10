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
if ($access==0)
{

  $denyreason_session="You do not have access to view this page.";
  header("Location: "."activity_denied.asp");
} 


$lngRecordNo9=intval($_GET["ID"]);
$lngRecordNo2=intval($_GET["Nation_ID"]);
// $rsUpdateEntry9 is of type "ADODB.Recordset"

$rsUpdateEntry9SQL="SELECT * FROM Sanctions WHERE ID =".$lngRecordNo9;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntry9SQL);


if ($rsUpdateEntry9["Sanction_Date"]>time()()-3)
{

  $denyreason_session="That sanction is too new to be removed at this time.";
  header("Location: "."activity_denied.asp");
} 



if ($rsUpdateEntry9["Sanction_Team"]!=$rsGuestbookHead["Nation_Team"])
{

  $denyreason_session="That sanction does not belong to your team.";
  header("Location: "."activity_denied.asp");
} 



//Send a message to the receiver of the sanctions

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
//U_ID") = rsUpdateEntry9("Poster")//MESS_FROM") =  rsUser("U_ID")//MESSAGE") = "Sanctions have been removed against your nation by the "& rsUpdateEntry9("Sanction_Team") &" team."//SUBJECT") = "Sanctions Removed"//MESS_READ") = "False"
//Reset server objects


$rsAddComments=null;

$adoCon=null;






$rsUpdateEntry9=null;

$objConn->Close();
$objConn=null;



header("Location: "."sanctions_view.asp");

?>
