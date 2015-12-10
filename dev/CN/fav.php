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

if (($MM_Username_session!=""))
{
  $Command1__varUser=$rsGuestbookHead["Poster"];
} 

if (($_GET["Nation_ID"]!=""))
{
  $Command1__varAd=intval($_GET["Nation_ID"]);
} 

// $Command1 is of type "ADODB.Command"

$Command1_ActiveConnection=$MM_conn_STRING;
$Command1_CommandText="INSERT INTO classFAVORITES (U_ID, AD_ID)  VALUES ('"+str_replace("'","''",$Command1__varUser)+"','"+str_replace("'","''",$Command1__varAd)+"' ) ";
$Command1_CommandType=1;
$Command1_CommandTimeout=0;
$Command1_Prepared=true;
$Command1_Execute=);


$objConn->Close;
$objConn=null;


header("Location: "."c_p.asp");
?>


