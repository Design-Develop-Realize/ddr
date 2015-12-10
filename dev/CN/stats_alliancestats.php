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
  
<p align="center">
<b><br>
Alliance Statistics Are Manually Updated</b></p>

</p>



<p>


<p></p>

<p></p>



<p></p>
<p align="center">
As of 10/31/06</p>

</p>



<p>


<p></p>

<p></p>



<p></p>
<p align="center">
<img border="0" src="images/alliancestats.PNG"></p>
<p align="center">
<b>
<img border="0" src="images/information.gif" width="17" height="16"> 
<a target="_blank" href="http://s15.invisionfree.com/Cyber_Nations/index.php?showtopic=26&st=0">
Alliance Information</a></b></p>
<p align="center">
<b><a href="stats.php">Main World Statistics Screen</a></b></p>
<!--#include file="inc_footer.php" -->


<? 
$rsGuestbook->Close();
$rsGuestbook=null;


$rsGuestbook2->Close();
$rsGuestbook2=null;


$rsSent2->Close();
$rsSent2=null;


$objConn->Close();
$objConn=null;

?>
