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



if ($_POST["Nation_ID"]-$rsGuestbook["Nation_ID"]!=0)
{

  $denyreason_session="Nation ID does not match in the database. Please login and try again.";
  header("Location: "."activity_denied.asp");
} 


?>
<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->
<? 
$bankscost=$FormatNumber[100000][2];
$barrackscost=$FormatNumber[50000][2];
$border_wallscost=$FormatNumber[60000][2];
$churchescost=$FormatNumber[40000][2];
$clinicscost=$FormatNumber[50000][2];
$factoriescost=$FormatNumber[80000][2];
$Foreign_Ministriescost=$FormatNumber[120000][2];
$Guerilla_Campscost=$FormatNumber[20000][2];
$harborscost=$FormatNumber[200000][2];
$hospitalscost=$FormatNumber[180000][2];
$Intelligence_Agenciescost=$FormatNumber[38500][2];
$labor_campscost=$FormatNumber[50000][2];
$missile_defensescost=$FormatNumber[90000][2];
$Police_Headquarterscost=$FormatNumber[75000][2];
$satellitescost=$FormatNumber[90000][2];
$schoolscost=$FormatNumber[85000][2];
$stadiumscost=$FormatNumber[110000][2];
$universitiescost=$FormatNumber[180000][2];

switch ($_POST["improvement"])
{
  case "Bank":
    $itemcost=$bankscost;
    break;
  case "Barrack":
    $itemcost=$barrackscost;
    break;
  case "Border Wall":
    $itemcost=$border_wallscost;
    break;
  case "Church":
    $itemcost=$churchescost;
    break;
  case "Clinic":
    $itemcost=$clinicscost;
    break;
  case "Factory":
    $itemcost=$factoriescost;
    break;
  case "Foreign Ministry":
    $itemcost=$Foreign_Ministriescost;
    break;
  case "Guerilla Camp":
    $itemcost=$Guerilla_Campscost;
    break;
  case "Harbor":
    $itemcost=$harborscost;
    break;
  case "Hospital":
    $itemcost=$hospitalscost;
    break;
  case "Intelligence Agency":
    $itemcost=$Intelligence_Agenciescost;
    break;
  case "Labor Camp":
    $itemcost=$labor_campscost;
    break;
  case "Missile Defense":
    $itemcost=$missile_Defensescost;
    break;
  case "Police Headquarters":
    $itemcost=$Police_Headquarterscost;
    break;
  case "Satellite":
    $itemcost=$satellitescost;
    break;
  case "School":
    $itemcost=$schoolscost;
    break;
  case "Stadium":
    $itemcost=$stadiumscost;
    break;
  case "University":
    $itemcost=$universitiescost;
    break;
} 

if ($totalmoneyavailable-$itemcost<0)
{

  $denyreason_session="You do not have enough money to purchase that improvement.";
  header("Location: "."activity_denied.asp");
} 


?>


<? 
// $rsUpdateEntry is of type "ADODB.Recordset"

$rsUpdateEntrySQL="SELECT * FROM Improvements WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntrySQL);
$rsUpdateEntry_numRows=0;


$totalimprovements=0;
if ((!($rsUpdateEntry_BOF==1)) && (!($rsUpdateEntry==0)))
{

  $totalimprovements=$rsUpdateEntry["Banks"]+$rsUpdateEntry["Barracks"]+$rsUpdateEntry["Border_Walls"]+$rsUpdateEntry["Churches"]+$rsUpdateEntry["Clinics"]+$rsUpdateEntry["Factories"]+$rsUpdateEntry["Foreign_Ministries"]+$rsUpdateEntry["Guerilla_Camps"]+$rsUpdateEntry["Harbors"]+$rsUpdateEntry["Hospitals"]+$rsUpdateEntry["Intelligence_Agencies"]+$rsUpdateEntry["Labor_Camps"]+$rsUpdateEntry["Missile_Defenses"]+$rsUpdateEntry["Police_Headquarters"]+$rsUpdateEntry["Satellites"]+$rsUpdateEntry["Schools"]+$rsUpdateEntry["Stadiums"]+$rsUpdateEntry["Universities"];

  if ($rsUpdateEntry["Harbors"]>0 && $_POST["improvement"]=="Harbor")
  {

    $denyreason_session="You already have a harbor and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsUpdateEntry["Foreign_Ministries"]>0 && $_POST["improvement"]=="Foreign Ministry")
  {

    $denyreason_session="You already have a Foreign Ministry and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsUpdateEntry["Clinics"]<2 && $_POST["improvement"]=="Hospital")
  {

    $denyreason_session="You do not have enough clinics for a hospital.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsUpdateEntry["Schools"]<3 && $_POST["improvement"]=="University")
  {

    $denyreason_session="You do not have enough schools for a university.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsUpdateEntry["Hospitals"]>0 && $_POST["improvement"]=="Hospital")
  {

    $denyreason_session="You already have a Hospital and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsUpdateEntry["Universities"]>1 && $_POST["improvement"]=="University")
  {

    $denyreason_session="You already have two Universities and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 


} 

if (($citizens-999)-($totalimprovements*1000)<0)
{

  $denyreason_session="You do not have enough citizens to purchase new nation improvements.";
  header("Location: "."activity_denied.asp");
} 





if (($rsUpdateEntry_BOF==1) && ($rsUpdateEntry==0))
{


  

$rsUpdateEntry["Nation_ID"]=$lngRecordNo;
    switch ($_POST["improvement"])
  {
    case "Bank":
$rsUpdateEntry["Banks"]=1;
            break;
    case "Barrack":
$rsUpdateEntry["Barracks"]=1;
            break;
    case "Border Wall":
$rsUpdateEntry["Border_Walls"]=1;
            break;
    case "Church":
$rsUpdateEntry["Churches"]=1;
            break;
    case "Clinic":
$rsUpdateEntry["Clinics"]=1;
            break;
    case "Factory":
$rsUpdateEntry["Factories"]=1;
            break;
    case "Foreign Ministry":
$rsUpdateEntry["Foreign_Ministries"]=1;
            break;
    case "Guerilla Camp":
$rsUpdateEntry["Guerilla_Camps"]=1;
            break;
    case "Harbor":
$rsUpdateEntry["Harbors"]=1;
            break;
    case "Hospital":
$rsUpdateEntry["Hospitals"]=1;
            break;
    case "Intelligence Agency":
$rsUpdateEntry["Intelligence_Agencies"]=1;
            break;
    case "Labor Camp":
$rsUpdateEntry["Labor_Camps"]=1;
            break;
    case "Missile Defense":
$rsUpdateEntry["Missile_Defenses"]=1;
            break;
    case "Police Headquarters":
$rsUpdateEntry["Police_Headquarters"]=1;
            break;
    case "Satellite":
$rsUpdateEntry["Satellites"]=1;
            break;
    case "School":
$rsUpdateEntry["Schools"]=1;
            break;
    case "Stadium":
$rsUpdateEntry["Stadiums"]=1;
            break;
    case "University":
$rsUpdateEntry["Universities"]=1;
            break;
  } 





}
  else
{



$rsUpdateEntry["Nation_ID"]=$lngRecordNo;
    switch ($_POST["improvement"])
  {
    case "Bank":
$rsUpdateEntry["Banks"]=$rsUpdateEntry["Banks"]+1;
            break;
    case "Barrack":
$rsUpdateEntry["Barracks"]=$rsUpdateEntry["Barracks"]+1;
            break;
    case "Border Wall":
$rsUpdateEntry["Border_Walls"]=$rsUpdateEntry["Border_Walls"]+1;
            break;
    case "Church":
$rsUpdateEntry["Churches"]=$rsUpdateEntry["Churches"]+1;
            break;
    case "Clinic":
$rsUpdateEntry["Clinics"]=$rsUpdateEntry["Clinics"]+1;
            break;
    case "Factory":
$rsUpdateEntry["Factories"]=$rsUpdateEntry["Factories"]+1;
            break;
    case "Foreign Ministry":
$rsUpdateEntry["Foreign_Ministries"]=1;
            break;
    case "Guerilla Camp":
$rsUpdateEntry["Guerilla_Camps"]=$rsUpdateEntry["Guerilla_Camps"]+1;
            break;
    case "Harbor":
$rsUpdateEntry["Harbors"]=1;
            break;
    case "Hospital":
$rsUpdateEntry["Hospitals"]=$rsUpdateEntry["Hospitals"]+1;
            break;
    case "Intelligence Agency":
$rsUpdateEntry["Intelligence_Agencies"]=$rsUpdateEntry["Intelligence_Agencies"]+1;
            break;
    case "Labor Camp":
$rsUpdateEntry["Labor_Camps"]=$rsUpdateEntry["Labor_Camps"]+1;
            break;
    case "Missile Defense":
$rsUpdateEntry["Missile_Defenses"]=$rsUpdateEntry["Missile_Defenses"]+1;
            break;
    case "Police Headquarters":
$rsUpdateEntry["Police_Headquarters"]=$rsUpdateEntry["Police_Headquarters"]+1;
            break;
    case "Satellite":
$rsUpdateEntry["Satellites"]=$rsUpdateEntry["Satellites"]+1;
            break;
    case "School":
$rsUpdateEntry["Schools"]=$rsUpdateEntry["Schools"]+1;
            break;
    case "Stadium":
$rsUpdateEntry["Stadiums"]=$rsUpdateEntry["Stadiums"]+1;
            break;
    case "University":
$rsUpdateEntry["Universities"]=$rsUpdateEntry["Universities"]+1;
            break;
  } 


} 




//Money_Spent") = itemcost + rsGuestbook("Money_Spent")//Number_Of_Purchases") = rsGuestbook("Number_Of_Purchases") +1

?>


<? 
//Reset server objects



$rsGuestbook=null;


$rsUpdateEntry=null;

$objConn->Close();
$objConn=null;


//Return to the update select page in case another record needs deleting

header("Location: "."improvements_purchase.asp?Nation_ID=".$lngRecordNo);
?>
