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
$lngRecordNo=str_replace("'","''",$lngRecordNo);
$lngRecordNo2=intval($_GET["Nation_ID"]);
$lngRecordNo2=str_replace("'","''",$lngRecordNo2);
// $rsUpdateEntry is of type "ADODB.Recordset"

$rsUpdateEntrySQL="SELECT Aid_Cancled,Declaring_Nation_ID,Receiving_Nation_ID FROM Aid WHERE ID =".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntrySQL);
$rsUpdateEntry_numRows=0;


if ($rsUpdateEntry["Declaring_Nation_ID"]!=$rsGuestbookHead["Nation_ID"] && $rsUpdateEntry["Receiving_Nation_ID"]!=$rsGuestbookHead["Nation_ID"])
{

  $denyreason_session="That foreign aid agreement does not belong to you.";
  header("Location: "."activity_denied.asp");
}
  else
{

  if (("Aid_Cancled")==1)
  {

    $denyreason_session="That foreign aid offer has already been accepted.";
    header("Location: "."activity_denied.asp");
  }
    else
  {

    //Aid_Cancled") = 2    
  } 

} 



//Reset server objects


$rsUpdateEntry=null;

$objConn->Close();
$objConn=null;

?>

<? 

//Return to the delete select page in case another record needs deleting

header("Location: "."aid_information.asp?Nation_ID=".$lngRecordNo2);

?>
