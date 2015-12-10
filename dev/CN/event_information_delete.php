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
<? 
//Dimension variables


$lngRecordNo0=intval($_GET["Receiver"]);
$lngRecordNo1=intval($_GET["Event"]);
$lngRecordNo2=$_GET["Date"];


// $adoCon9 is of type "ADODB.Connection"

$a2p_connstr==$MM_conn_STRING;
$a2p_uid=strstr($a2p_connstr,'uid');
$a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$a2p_pwd=strstr($a2p_connstr,'pwd');
$a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$a2p_database=strstr($a2p_connstr,'dsn');
$a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$adoCon9=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
mysql_select_db($a2p_database,$adoCon9);
// $rsUpdateEntry is of type "ADODB.Recordset"

$strSQL9="SELECT * FROM National_Events WHERE National_Event_Receiver='".$lngRecordNo0."' AND National_Event_ID = '".$lngRecordNo1."' AND National_Event_Date ='".$lngRecordNo2."' ";
echo 3;
$rs=mysql_query($strSQL9);
if (($rsUpdateEntry_BOF==1) && ($rsUpdateEntry==0))
{

  $denyreason_session="That event does not belong to your nation.";
  header("Location: "."activity_denied.asp");
} 


if ($rsUpdateEntry["National_Event_Receiver"]!=$rsGuestbookHead["Nation_ID"])
{

  $denyreason_session="That event does not belong to your nation.";
  header("Location: "."activity_denied.asp");
} 


if ($rsUpdateEntry["National_Event_Date"]+30<time()()+1)
{

  
} 





$rsUpdateEntry=null;

$objConn->Close();
$objConn=null;



header("Location: "."event_information.asp?Nation_ID=".$lngRecordNo0);

?>
