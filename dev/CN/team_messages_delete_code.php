<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
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

<? 
$lngRecordNo9=intval($_GET["Entry_ID"]);
// $rsUpdateEntry9 is of type "ADODB.Recordset"

$rsUpdateEntry9SQL="SELECT * FROM Team_News WHERE Entry_ID =".$lngRecordNo9;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntry9SQL);
$rsUpdateEntry9_numRows=0;

//Update the record in the recordset






$rsUpdateEntry9=null;

$objConn->Close();
$objConn=null;

?>

<? 
header("Location: "."Team_Messages_information.asp");

?>
