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
$lngRecordNo=intval($_GET["Nation_ID"]);
$lngRecordNo=str_replace("'","''",$lngRecordNo);
// $rsUpdateEntry is of type "ADODB.Recordset"

$rsUpdateEntrySQL="SELECT Poster,Cruise_Purchased FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntrySQL);
$rsUpdateEntry_numRows=0;
?>

<? 
if (strtoupper($rsUpdateEntry["Poster"])!=strtoupper($rsUser["U_ID"]))
{

  $denyreason_session="You are attempting to destroy cruise missiles with a nation that does not belong to you.";
  header("Location: "."activity_denied.asp");
} 


if (("Cruise_Purchased")<1)
{

  $denyreason_session="You do not have any cruise missiles to destroy.";
  header("Location: "."activity_denied.asp");
} 



//Cruise_Purchased") = rsUpdateEntry.Fields("Cruise_Purchased") - 1
//Update the record in the recordset


?>
<!--#include file="database_nationstrength.php" -->
<? 
//Reset server objects


$rsUpdateEntry=null;

$objConn->Close();
$objConn=null;


//Return to the delete select page in case another record needs deleting

header("Location: "."cruise_buy.asp?Nation_ID=".$lngRecordNo);
?>
