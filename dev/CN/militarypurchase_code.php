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

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID='".$rsGuestbookHead["Nation_ID"]."' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);

if (time()()-$rsGuestbook["Last_Bills_Paid"]>=3)
{

  $denyreason_session="You must pay your bills before making this purchase.";
  header("Location: "."activity_denied.asp");
} 

?>




<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->
<!--#include file="calculations_costs.php" -->
<? 

// Calculate the maximum they can buy

$maximumbuy=0;
$maximumbuy1=0;
$maximumbuy2=0;
if ($totalmoneyavailable>0 && ($totalmoneyavailable-$militarycost)>0)
{

  $maximumbuy1=($totalmoneyavailable/$militarycost)-1;
  $maximumbuy2=($citizens*.8)-$actualmilitary;
  if ($maximumbuy1>$maximumbuy2)
  {

    $maximumbuy=$maximumbuy2;
  }
    else
  {

    $maximumbuy=$maximumbuy1;
  } 

  if ($maximumbuy<=0)
  {

    $maximumbuy=0;
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
  case 6:
    $newpurchase=$buy5;
    break;
  case 7:
    $newpurchase=$buy6;
    break;
  case 8:
    $newpurchase=$buy7;
    break;
} 



//Update the record in the recordset

$rsGuestbook["Military_Purchased"]=($newpurchase+$rsGuestbook["Military_Purchased"]);
$rsGuestbook["Money_Spent"]=(($newpurchase*$militarycost)+$rsGuestbook["Money_Spent"]);
$rsGuestbook["Number_Of_Purchases"]=($rsGuestbook["Number_Of_Purchases"]+1);

//Write the updated recordset to the database


?>
<!--#include file="database_nationstrength.php" -->
<? 
//Reset server objects



$rsGuestbook=null;

$objConn->Close();
$objConn=null;


//Return to the update select page in case another record needs deleting

header("Location: "."nation_drill_display.asp?Nation_ID=".$lngRecordNo);
?>  
 

