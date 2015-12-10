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
<? //Dimension variables


//Read in the record number to be updated

$lngRecordNo9=intval($_GET["ID"]);
$lngRecordNo9=str_replace("'","''",$lngRecordNo9);
$lngRecordNo2=intval($rsGuestbookHead["Nation_ID"]);

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

$strSQL9="SELECT * FROM War WHERE ID=".$lngRecordNo9;
echo 3;
$rs=mysql_query($strSQL9);
if ($rsUpdateEntry["Declaring_Nation_ID"]!=$rsGuestbookHead["Nation_ID"] && $rsUpdateEntry["Receiving_Nation_ID"]!=$rsGuestbookHead["Nation_ID"])
{

  $denyreason_session="You may not delete this war as it does not involve your nation.";
  header("Location: "."activity_denied.asp");
} 


if ($rsUpdateEntry["War_End_Date"]<time()() || $rsUpdateEntry["Nation_Deleted"]=1|($rsUpdateEntry["Receiving_Nation_Peace"]=1&$rsUpdateEntry["Declaring_Nation_Peace"]=1)$then;
;
;
}
  else
{

$denyreason_session=="There are existing conditions that do not allow you to delete this war at this time.")
{
header("Location: "."activity_denied.asp");} 



rsUpdateEntry.Close
Set rsUpdateEntry = Nothing
objConn.Close()
Set objConn = Nothing


'Return to the delete select page in case another record needs deleting
Response.Redirect "nation_war_information.asp?Nation_ID="& lngRecordNo2

%>
