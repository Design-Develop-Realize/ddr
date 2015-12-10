<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
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
<!--#include file="activity.php" -->

<? 
// $rsAddComments is of type "ADODB.Recordset"

$rsAddCommentsSQL="SELECT * FROM Team_News";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsAddCommentsSQL);
?>




<? 
//Tell the recordset we are adding a new record to it



//Add a new record to the recordset

//News_Info") = Request.Form("News_Info")//Poster") = Request.Form("Poster")//Priority") = Request.Form("Priority")//Title") = Request.Form("Title")//Team") = Request.Form("Team")//Poster_Nation") = Request.Form("Poster_Nation")
//Write the updated recordset to the database




//Reset server objects


$rsAddComments=null;

$objConn->Close();
$objConn=null;

?>

<? 
//Redirect to the guestbook.asp page

header("Location: "."team_messages_information.asp");
?>  
 


