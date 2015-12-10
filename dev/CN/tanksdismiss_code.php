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
if ($_POST["confirm"]!=1)
{

  $denyreason_session="You must click the checkbox to confirm dismissal of your tanks.";
  header("Location: "."activity_denied.asp");
} 


$lngRecordNo=intval($rsGuestbookHead["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);


if ($rsGuestbook["Military_Sold_Date"]>time()()-1)
{

  $denyreason_session="You have already dismissed tanks or soldiers within the past 2 days.";
  header("Location: "."activity_denied.asp");
} 

if (time()()-$rsGuestbook["Military_Attack_Date1"]<2 || time()()-$rsGuestbook["Military_Attack_Date2"]<2)
{

  $denyreason_session="You cannot dismiss tanks after having attacked an opponent within the past 2 days.";
  header("Location: "."activity_denied.asp");
} 



if ($_POST["Nation_ID"]-$rsGuestbook["Nation_ID"]!=0)
{

  $denyreason_session="Nation ID does not match in the database. Please login and try again.";
  header("Location: "."activity_denied.asp");
} 

?>
<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->
<!--#include file="calculations_costs.php" -->
<? 

// Calculate the maximum they can sell

if ($defendingtanks<1)
{

  $maxsell=0;
}
  else
{

  $maxsell=$defendingtanks;
} 



// Now calculate 4 numbers to go with this for the option box

$sell1=(round(($maxsell/4),0));
$sell2=(round(($maxsell/3),0));
$sell3=(round(($maxsell/2),0));
$sell4=(round(($maxsell),0));


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

//Tanks_Defending") = numberoftanks - newsell//Tanks_Deployed") = 0//Military_Sold_Date") = date()

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
 

