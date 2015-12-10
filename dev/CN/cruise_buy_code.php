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
<? 
$lngRecordNo=intval($_POST["Nation_ID"]);
$lngRecordNo=str_replace("'","''",$lngRecordNo);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);

if (time()()-$rsGuestbook["Last_Bills_Paid"]>=3)
{

  $denyreason_session="You must pay your bills before making this purchase.";
  header("Location: "."activity_denied.asp");
} 


$iLoc=0;
$iLoc=(strpos(strtoupper($MM_Username_session),strtoupper($rsGuestbook["Poster"])) ? strpos(strtoupper($MM_Username_session),strtoupper($rsGuestbook["Poster"]))+1 : 0);
if ($iLoc==0)
{

  $denyreason_session="User Name does not match in the database. Your session may have expired. Please login and try again.";
  header("Location: "."activity_denied.asp");
} 


if ($_POST["Nation_ID"]-$rsGuestbook["Nation_ID"]!=0)
{

  $denyreason_session="Nation ID does not match in the database. Please login and try again.";
  header("Location: "."activity_denied.asp");
} 



if ($rsGuestbook["Technology_Purchased"]<15 || $rsGuestbook["Infrastructure_Purchased"]<100)
{

  $denyreason_session="Either you do not have enough technology or infrastructure to purchase missiles at this time.";
  header("Location: "."activity_denied.asp");
} 

?>
<!--#include file="inc_header.php" -->
<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->
<!--#include file="calculations_costs.php" -->
<? 
if ($totalmoneyavailable-$cruisecost<=0)
{

  $denyreason_session="You do not have enough money to purchase cruise missiles.";
  header("Location: "."activity_denied.asp");
} 


if ($rsGuestbook["Cruise_Purchased"]>=50)
{

  $denyreason_session="You already have too many missiles and cannot buy more at this time.";
  header("Location: "."activity_denied.asp");
} 


// Calculate the maximum they can buy

$maximumbuy=0;
if ($totalmoneyavailable>0 && ($totalmoneyavailable-$cruisecost)>0)
{

  $maximumbuy=($totalmoneyavailable/$cruisecost);
  if ($maximumbuy>10)
  {
    $maximumbuy=10;
  }
;
  } 
} 

// Now calculate 4 numbers to go with this for the option box

$buy0=(round(($maximumbuy/20),0));
$buy1=(round(($maximumbuy/8),0));
$buy2=(round(($maximumbuy/5),0));
$buy3=(round(($maximumbuy/2),0));
$buy4=(round(($maximumbuy),0));


$formsubmit=$_POST["newpurchase"];
switch ($formsubmit)
{
  case 1:
    $newpurchase=$buy0;
    break;
  case 2:
    $newpurchase=$buy1;
    break;
  case 3:
    $newpurchase=$buy2;
    break;
  case 4:
    $newpurchase=$buy3;
    break;
  case 5:
    $newpurchase=$buy4;
    break;
} 



//Update the record in the recordset

//Cruise_Purchased") = newpurchase + rsGuestbook("Cruise_Purchased")//Money_Spent") = (newpurchase * cruisecost) + rsGuestbook("Money_Spent")//Number_Of_Purchases") = (rsGuestbook("Number_Of_Purchases") +1)


//Write the updated recordset to the database



?>
<!--#include file="database_nationstrength.php" -->
<? 
//Reset server objects



$rsGuestbook=null;

$objConn->Close();
$objConn=null;

?>

<? 
//Return to the update select page in case another record needs deleting

header("Location: "."nation_drill_display.asp?Nation_ID=".$lngRecordNo);
?>  
 

