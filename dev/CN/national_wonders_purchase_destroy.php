<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
?>
<!--#include file="connection.php" -->
<? //end if

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
$lngRecordNo=intval($rsGuestbookHead["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);


$improvementtype=$_GET["Improvement"];
// $rsWonders is of type "ADODB.Recordset"

$rsWondersSQL="SELECT * FROM National_Wonders WHERE Nation_ID=".$rsGuestbook["Nation_ID"];
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsWondersSQL);
$rsWonders_numRows=0;

switch ($improvementtype)
{
  case "Internet":
    if ($rsWonders["Internet"]>0)
    {

$rsWonders["Internet"]=0;
          } 

    break;
  case "Space_Program":
    if ($rsWonders["Space_Program"]>0)
    {

$rsWonders["Space_Program"]=0;
          } 

    break;
  case "Great_Monument":
    if ($rsWonders["Great_Monument"]>0)
    {

$rsWonders["Great_Monument"]=0;
          } 

    break;
  case "Movie_Industry":
    if ($rsWonders["Movie_Industry"]>0)
    {

$rsWonders["Movie_Industry"]=0;
          } 

    break;
  case "Great_University":
    if ($rsWonders["Great_University"]>0)
    {

$rsWonders["Great_University"]=0;
          } 

    break;
  case "Research_Lab":
    if ($rsWonders["Research_Lab"]>0)
    {

$rsWonders["Research_Lab"]=0;
          } 

    break;
  case "Social_Security":
    if ($rsWonders["Social_Security"]>0)
    {

$rsWonders["Social_Security"]=0;
          } 

    break;
  case "Disaster_Relief":
    if ($rsWonders["Disaster_Relief"]>0)
    {

$rsWonders["Disaster_Relief"]=0;
          } 

    break;
  case "Interstate_System":
    if ($rsWonders["Interstate_System"]>0)
    {

$rsWonders["Interstate_System"]=0;
          } 

    break;
  case "Great_Temple":
    if ($rsWonders["Great_Temple"]>0)
    {

$rsWonders["Great_Temple"]=0;
          } 

    break;
  case "War_Memorial":
    if ($rsWonders["War_Memorial"]>0)
    {

$rsWonders["War_Memorial"]=0;
          } 

    break;
  case "Stock_Market":
    if ($rsWonders["Stock_Market"]>0)
    {

$rsWonders["Stock_Market"]=0;
          } 

    break;
} 

//Update the record in the recordset



//Reset server objects


$rsWonders=null;

$objConn->Close();
$objConn=null;


//Return to the delete select page in case another record needs deleting

header("Location: "."national_wonders_purchase.asp");
?>
