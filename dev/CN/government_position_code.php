<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
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
<!--#include file="activity.php" -->
<!--#include file="inc_header.php" -->
<? 
$lngRecordNo=intval($rsGuestbookHead["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);


//Update the record in the recordset

if ($_POST["Foreign"]==1 && $rsGuestbook["Nation_Peace"]=0$then;
$denyreason_session=="You cannot select that foreign aid position at this time.")
{
  header("Location: "."activity_denied.asp");} 

if Request.Form("Foreign") = 2 and rsGuestbook("Nation_Peace") > 0 then
Session ("denyreason") = "You cannot select that foreign aid position at this time."
Response.Redirect "activity_denied.asp"
end if
if Request.Form("Foreign") = 3 and rsGuestbook("Nation_Peace") > 0 then
Session ("denyreason") = "You cannot select that foreign aid position at this time."
Response.Redirect "activity_denied.asp"
end if
if Request.Form("Nuclear") = 0 and rsGuestbook("Nuclear_Purchased") > 0 then
Session ("denyreason") = "You cannot select that nuclear position at this time."
Response.Redirect "activity_denied.asp"
end if
if Request.Form("Nuclear") = 1 and rsGuestbook("Nuclear_Purchased") > 0 then
Session ("denyreason") = "You cannot select that nuclear position at this time."
Response.Redirect "activity_denied.asp"
end if
if Request.Form("Nuclear") = 2 and rsGuestbook("Nuclear_Purchased") > 0 then
Session ("denyreason") = "You cannot select that nuclear position at this time."
Response.Redirect "activity_denied.asp"
end if

rsGuestbook.Fields("Foreign") = Request.Form("Foreign")
rsGuestbook.Fields("Nuclear") = Request.Form("Nuclear")
rsGuestbook.Fields("Drugs") = Request.Form("Drugs")
rsGuestbook.Fields("Domestic") = Request.Form("Domestic")
rsGuestbook.Fields("Immigration") = Request.Form("Immigration")
rsGuestbook.Fields("Speech") = Request.Form("Speech")
rsGuestbook.Fields("Disaster") = Request.Form("Disaster")
rsGuestbook.Fields("Trade") = Request.Form("Trade")


'Write the updated recordset to the database
rsGuestbook.Update


'Reset server objects
rsGuestbook.Close
Set rsGuestbook = Nothing
objConn.Close
Set objConn = Nothing

'Return to the update select page in case another record needs deleting
Response.Redirect "nation_drill_display.asp?Nation_ID="& lngRecordNo
%>  
 

