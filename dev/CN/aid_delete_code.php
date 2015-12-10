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
$lngRecordNo9=intval($_GET["ID"]);
$lngRecordNo9=str_replace("'","''",$lngRecordNo9);
$lngRecordNo2=intval($rsGuestbookHead["Nation_ID"]);
// $rsUpdateEntry9 is of type "ADODB.Recordset"

$rsUpdateEntry9SQL="SELECT * FROM Aid WHERE ID =".$lngRecordNo9;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntry9SQL);
$rsUpdateEntry9_numRows=0;


if (($rsUpdateEntry9["Aid_Cancled"]=3|$rsUpdateEntry9["Aid_Cancled"]=1)&$rsUpdateEntry9["Aid_Declaration_Date"]>time()()-9$then;
$denyreason_session="You may not delete that foreign aid agreement at this time.";
$Response->Redirect"activity_denied.asp")
{
} 


if ($rsUpdateEntry9["Declaring_Nation_ID"]!=$rsGuestbookHead["Nation_ID"] && $rsUpdateEntry9["Receiving_Nation_ID"]!=$rsGuestbookHead["Nation_ID"])
{

  $denyreason_session="That foreign aid agreement does not belong to you.";
  header("Location: "."activity_denied.asp");
} 








$rsUpdateEntry9=null;

$objConn->Close();
$objConn=null;



header("Location: "."aid_information.asp?Nation_ID=".$lngRecordNo2);
?>
