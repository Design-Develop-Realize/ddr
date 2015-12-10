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
  $Adsdelete__varId=intval($_GET["id"]);
} 


// $rsDeleteTest is of type "ADODB.Recordset"

echo $MM_conn_STRING_Messages;
echo "Select U_ID,MESS_FROM From Emessages where ID = "+str_replace("'","''",$Adsdelete__varId)+" ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
if (strtoupper($rsDeleteTest["U_ID"])!=strtoupper($rsUser["U_ID"]))
{

  $denyreason_session="An unexpected error has occured. That message does not belong to you so you do not have permission to delete it. If this is your message please go back and try again.";
  header("Location: "."activity_denied.asp");
} 


$rsDeleteTest=null;


// $Adsdelete is of type "ADODB.Command"

$Adsdelete_ActiveConnection=$MM_conn_STRING_Messages;
$Adsdelete_CommandText="DELETE FROM EMESSAGES WHERE ID = "+str_replace("'","''",$Adsdelete__varId)+" ";
$Adsdelete_CommandType=1;
$Adsdelete_CommandTimeout=0;
$Adsdelete_Prepared=true;
$Adsdelete_Execute=);
$objConn->Close();
$objConn=null;


?>

<? 


header("Location: "."inbox.asp");
?>

