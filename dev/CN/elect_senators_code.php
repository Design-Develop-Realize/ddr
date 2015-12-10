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

<? if (strtoupper($_POST["Poster"])!=strtoupper($rsUser["U_ID"]))
{
?>
<!--#include file="activitylog.php" -->
<?   $denyreason_session="You are attempting to vote with a nation that does not belong to you. You have been logged for cheating.";
  header("Location: "."activity_denied.asp");
} ?>


<? 
// $rsUpdateEntry is of type "ADODB.Recordset"

$rsUpdateEntrySQL="select Last_Vote from Nation where Poster = '"+$_POST["Poster"]+"';";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntrySQL);

if (!($rsUpdateEntry_BOF==1) && !($rsUpdateEntry==0))
{

  if (("Last_Vote")>time()()-15)
  {

    $denyreason_session="You have already voted recently and cannot vote at this time.";
    header("Location: "."activity_denied.asp");
  } 


//Update the record in the recordset

  //Last_Vote") = date()
//Write the updated recordset to the database

  
} 

//Reset server objects


$rsUpdateEntry=null;



// $rsUpdateEntry is of type "ADODB.Recordset"

$rsUpdateEntrySQL="Select Votes from Nation where Poster = '"+$_POST["Senator"]+"';";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntrySQL);

if (!($rsUpdateEntry_BOF==1) && !($rsUpdateEntry==0))
{

//Update the record in the recordset

  //Votes") = rsUpdateEntry.Fields("Votes")  + 1
//Write the updated recordset to the database

  
} 

//Reset server objects


$rsUpdateEntry=null;




//Reset server objects

$objConn->Close;
$objConn=null;


//Return to the update select page in case another record needs deleting

header("Location: "."elect_senators_results.asp");
?>  


