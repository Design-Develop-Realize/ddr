<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("maximumbuy_session");
  session_register("infrastructurecost_session");
  session_register("maxsell_session");
  session_register("infrastructurecost2_session");
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
// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT Nation_ID,Infrastructure_Purchased,Money_Spent,Number_Of_Purchases FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);
?>
<? 
$lngRecordNo=intval($_GET["Nation_ID"]);
if ($_POST["Nation_ID"]-$rsGuestbook0["Nation_ID"]!=0)
{

  $denyreason_session="Nation ID does not match in the database. Please login and try again.";
  header("Location: "."activity_denied.asp");
} 


if ($maximumbuy_session=="")
{

  $denyreason_session="Nation ID does not match in the database. Please login and try again.";
?>
<!--#include file="activitylog.php" -->
<? 
  header("Location: "."activity_denied.asp");
} 

?>

<? 

// Calculate the maximum they can buy

$maximumbuy=$maximumbuy_session;
$infrastructurecost=$infrastructurecost_session;

$maximumbuy_session="";
$infrastructurecost_session="";
$maxsell_session="";
$infrastructurecost2_session="";

if ($maximumbuy>10)
{
  $maximumbuy=10;
}
;
} 
// Now calculate 4 numbers to go with this for the option box

$buy1=($FormatNumber[($maximumbuy/15)][2]);
$buy2=($FormatNumber[($maximumbuy/10)][2]);
$buy3=($FormatNumber[($maximumbuy/5)][2]);
$buy4=($FormatNumber[($maximumbuy)/2][2]);
$buy5=($FormatNumber[($maximumbuy)/1][2]);


$formsubmit=$_POST["newpurchase"];
switch ($formsubmit)
{
  case 1:
    $newpurchase=$buy1;
    break;
  case 2:
    $newpurchase=$buy2;
    break;
  case 3:
    $newpurchase=$buy3;
    break;
  case 4:
    $newpurchase=$buy4;
    break;
  case 5:
    $newpurchase=$buy5;
    break;
} 


//Update the record in the recordset

//Infrastructure_Purchased") = newpurchase + rsGuestbook0("Infrastructure_Purchased")//Money_Spent") = ((newpurchase * infrastructurecost) + rsGuestbook0("Money_Spent"))//Number_Of_Purchases") = (rsGuestbook0("Number_Of_Purchases") +1)
//Write the updated recordset to the database



?>
<!--#include file="database_nationstrength.php" -->
<? 
//Reset server objects


$rsGuestbook0=null;

$objConn->Close();
$objConn=null;


//Return to the update select page in case another record needs deleting

header("Location: "."nation_drill_display.asp?Nation_ID=".$lngRecordNo);
?>  
