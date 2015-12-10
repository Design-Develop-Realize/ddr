<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("maxsell_session");
  session_register("infrastructurecost2_session");
  session_register("maximumbuy_session");
  session_register("infrastructurecost_session");
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
if ($_POST["Sell_Confirm"]!=1)
{

  $denyreason_session="You did not check the infrastructure sell confirm checkbox to confirm this transaction.";
  header("Location: "."activity_denied.asp");
} 



$lngRecordNo=intval($rsGuestbookHead["Nation_ID"]);

// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT Nation_ID,Infrastructure_Purchased,Money_Earned,Number_Of_Purchases,Infrastructure_Sell FROM Nation WHERE Nation_ID = ".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);

if ($_POST["Nation_ID"]-$rsGuestbook0["Nation_ID"]!=0)
{

  $denyreason_session="Nation ID does not match in the database. Please login and try again.";
  header("Location: "."activity_denied.asp");
} 


if ($maxsell_session=="")
{

  $denyreason_session="Nation ID does not match in the database. Please login and try again.";
?>
<!--#include file="activitylog.php" -->
<? 
  header("Location: "."activity_denied.asp");
} 

?>


<? 
// Calculate the maximum they can sell

$maxsell=$maxsell_session;
$infrastructurecost2=$infrastructurecost2_session;

$maximumbuy_session="";
$infrastructurecost2_session="";
$maxsell_session="";
$infrastructurecost2_session="";

// Now calculate 4 numbers to go with this for the option box

$sell1=($FormatNumber[($maxsell/13)][2]);
$sell2=($FormatNumber[($maxsell/7)][2]);
$sell3=($FormatNumber[($maxsell/5)][2]);
$sell4=($FormatNumber[($maxsell/3)][2]);



$formsubmit=$_POST["newsell"];
switch ($formsubmit)
{
  case 1:
    $newsell=$sell1;
    break;
  case 2:
    $newsell=$sell2;
    break;
  case 3:
    $newsell=$sell3;
    break;
  case 4:
    $newsell=$sell4;
    break;
  case 5:
    $newsell=$sell5;
    break;
  case 6:
    $newsell=$sell6;
    break;
  case 7:
    $newsell=$sell7;
    break;
  case 8:
    $newsell=$sell8;
    break;
} 



//Update the record in the recordset

//Infrastructure_Purchased") = (rsGuestbook0("Infrastructure_Purchased") - newsell)//Money_Earned") = rsGuestbook0("Money_Earned") + (newsell * infrastructurecost2)//Number_Of_Purchases") = (rsGuestbook0("Number_Of_Purchases") +1)//Infrastructure_Sell") = now()
//Write the updated recordset to the database


?>
<!--#include file="database_nationstrength.php" -->
<? 
//Reset server objects

$objConn->Close();
$objConn=null;


//Return to the update select page in case another record needs deleting

header("Location: "."nation_drill_display.asp?Nation_ID=".$lngRecordNo);
?> 
