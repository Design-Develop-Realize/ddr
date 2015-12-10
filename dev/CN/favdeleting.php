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

if (($_GET["id"]!=""))
{

  $Adsdelete__varId=$_GET["id"];
}
  else
{

  $denyreason_session="You did not select a valid nation to save.";
  header("Location: "."activity_denied.asp");
} 


// $Adsdelete is of type "ADODB.Command"

$Adsdelete_ActiveConnection=$MM_conn_STRING;
$Adsdelete_CommandText="DELETE FROM CLASSFAVORITES  WHERE AD_ID = "+str_replace("'","''",$Adsdelete__varId)+" and U_ID = '".$rsUser["U_ID"]."' ";
$Adsdelete_CommandType=1;
$Adsdelete_CommandTimeout=0;
$Adsdelete_Prepared=true;
$Adsdelete_Execute=);

$objConn->Close;
$objConn=null;


header("Location: "."c_p.asp");
?>


