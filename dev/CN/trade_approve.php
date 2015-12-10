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
$lngRecordNo=intval($_GET["ID"]);
$lngRecordNo2=intval($_GET["Nation_ID"]);
// $rsUpdateEntry is of type "ADODB.Recordset"

echo $MM_conn_STRING_Trade;
echo "SELECT Trade_Cancled,Receiving_Nation_ID FROM Trade WHERE ID =".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query();


if ($rsUpdateEntry["Receiving_Nation_ID"]!=$rsGuestbookHead["Nation_ID"])
{

  $denyreason_session="You are not the recipient of this trade agreement so you cannot accept it.";
  header("Location: "."activity_denied.asp");
}
  else
{

  //Trade_Cancled") = 1  
} 



//Reset server objects


$rsUpdateEntry=null;

$objConn->Close();
$objConn=null;


//Return to the delete select page in case another record needs deleting

header("Location: "."trade_information.asp?Nation_ID=".$lngRecordNo2);

?>
