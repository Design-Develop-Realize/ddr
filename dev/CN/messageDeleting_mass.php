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
$currentuser=$rsUser["U_ID"];
if ($_POST["list"]=="")
{

  $denyreason_session="You did not select any messages to delete.";
  header("Location: "."activity_denied.asp");
} 


$MyString=$_POST["list"];
$MyArray=$Split[$MyString][","];

for ($i=0; $i<=count($MyArray); $i=$i+1)
{

  $myArray[$i]=str_replace("'","''",$myArray[$i]);
  $myArray[$i]=str_replace(" ","",$myArray[$i]);
  $myArray[$i]=str_replace(",","",$myArray[$i]);


// $Adsdelete is of type "ADODB.Command"

  $Adsdelete_ActiveConnection=$MM_conn_STRING_Messages;
    $Adsdelete_CommandText="DELETE FROM EMESSAGES WHERE ID = '".intval($myArray[$i])."' AND Upper(U_ID) = '".strtoupper($currentuser)."' ";
    $Adsdelete_CommandType=1;
    $Adsdelete_CommandTimeout=0;
    $Adsdelete_Prepared=true;
    $Adsdelete_Execute=);
  $objConn->Close();
  $objConn=null;




} 
//move on to the next value of i 



header("Location: "."inbox.asp");

?>
