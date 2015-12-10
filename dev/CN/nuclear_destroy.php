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
$lngRecordNo=intval($rsGuestbookHead["Nation_ID"]);
// $rsUpdateEntry is of type "ADODB.Recordset"

$rsUpdateEntrySQL="SELECT Nuclear_Purchased,Money_Spent FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntrySQL);

if (("Nuclear_Purchased")<=0)
{

  $denyreason_session="You do not have any nuclear weapons to destroy.";
  header("Location: "."activity_denied.asp");
}
  else
{

  //Nuclear_Purchased") = rsUpdateEntry.Fields("Nuclear_Purchased") - 1  //Money_Spent") = rsUpdateEntry.Fields("Money_Spent") + 10000} 


//Update the record in the recordset


?>
<!--#include file="database_nationstrength.php" -->
<? 
//Reset server objects


$rsUpdateEntry=null;

$objConn->Close();
$objConn=null;


//Return to the delete select page in case another record needs deleting

header("Location: "."nuclear_buy.asp?Nation_ID=".$lngRecordNo);
?>
