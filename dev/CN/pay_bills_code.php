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
?>

<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->
<!--#include file="calculations_costs.php" -->
<? 
if ($_POST["Nation_ID"]-$rsGuestbook["Nation_ID"]!=0)
{

  $denyreason_session="You are trying to access a nation that does not belong to you.";
  header("Location: "."activity_denied.asp");
} 


$last_date=time()()-$rsGuestbook["Last_Bills_Paid"];
if ($last_date>0 && $last_date<1)
{

  $last_date=1;
} 


if ($last_date==0)
{

  $denyreason_session="You have already paid your bills today.";
  header("Location: "."activity_denied.asp");
} 


$infrastructurebill=($FormatNumber[$rsGuestbook["Infrastructure_Purchased"]][2]*$FormatNumber[$dailybuildingcost][2])*$last_date;

$militarybill=($dailysoldiercost*($FormatNumber[$actualmilitary][0]))*$last_date;
if ($militarybill<0)
{
  $militarybill=0;
}
;
} 

$tankbill=($dailytankcost*($FormatNumber[$numberoftanks][0]))*$last_date;

$cruisebill=($dailycruisecost*$cruisemissles)*$last_date;

$nuclearbill=($dailynuclearcost*($rsGuestbook["Nuclear_Purchased"].$Value))*$last_date;


// $rsAircraft is of type "ADODB.Recordset"

$rsAircraftSQL="SELECT * FROM Aircraft WHERE Nation_ID=".$rsGuestbook["Nation_ID"];
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsAircraftSQL);
if (!($rsAircraft_BOF==1) && !($rsAircraft==0))
{

  $totalaircraft=$rsAircraft["Yakovlev Yak-9"]+$rsAircraft["P-51 Mustang"]+$rsAircraft["F-86 Sabre"]+$rsAircraft["Mikoyan-Gurevich MiG-15"]+$rsAircraft["F-100 Super Sabre"]+$rsAircraft["F-35 Lightning II"]+$rsAircraft["F-15 Eagle"]+$rsAircraft["Su-30 MKI"]+$rsAircraft["F-22 Raptor"]+$rsAircraft["AH-1 Cobra"]+$rsAircraft["AH-64 Apache"]+$rsAircraft["Bristol Blenheim"]+$rsAircraft["B-25 Mitchell"]+$rsAircraft["B-17G Flying Fortress"]+$rsAircraft["B-52 Stratofortress"]+$rsAircraft["B-2 Spirit"]+$rsAircraft["B-1B Lancer"]+$rsAircraft["Tupolev Tu-160"];
} 


$rsAircraft=null;


$aircraftbill=($dailyaircraftcost*$totalaircraft)*$last_date;



$totalimprove=$banks+$barracks+$border_walls+$churches+$clinics+$factories+$foreign_ministries+$guerilla_camps+$harbors+$hospitals+$intelligence_agencies+$labor_camps+$missile_defenses+$police_headquarters+$satellites+$schools+$stadiums+$universities;
$improvecost=500; //base cost for calculations
;
if ($totalimprove>=5)
{

  $improvecost=$improvecost+100;
} 

if ($totalimprove>=8)
{

  $improvecost=$improvecost+150;
} 

if ($totalimprove>=15)
{

  $improvecost=$improvecost+200;
} 

if ($totalimprove>=20)
{

  $improvecost=$improvecost+250;
} 

if ($totalimprove>=30)
{

  $improvecost=$improvecost+300;
} 

if ($totalimprove>=40)
{

  $improvecost=$improvecost+500;
} 

if ($totalimprove>=50)
{

  $improvecost=$improvecost+1000;
} 

$improvebill=($totalimprove*$improvecost)*$last_date;

$totalwonder=$InternetWonder+$SpaceWonder+$MonumentWonder+$MovieWonder+$UniversityWonder+$ResearchWonder+$SocialWonder+$DisasterWonder+$InterstateWonder+$TempleWonder+$MemorialWonder+$StockWonder;
$wondercost=5000; //base cost for calculations
;
$wonderbill=($totalwonder*$wondercost)*$last_date;

$billcollection=$militarybill+$infrastructurebill+$nuclearbill+$tankbill+$cruisebill+$improvebill+$aircraftbill+$wonderbill;

$maxbillinterest=5000;
$billinterest=($billcollection*.10)*($last_date-1);
if ($totalmoneyavailable<0)
{

  $billinterest=0;
} 

if ($billinterest<0)
{

  $billinterest=0;
} 

if ($billinterest>$maxbillinterest)
{

  $billinterest=$maxbillinterest;
} 


$collection=$billcollection+$billinterest;
$collection=$FormatNumber[$collection][2];

$leftover=$totalmoneyavailable-($billcollection+$billinterest);
$leftover=$FormatNumber[$leftover][2];

if ($leftover<0)
{

  $denyreason_session="You do not have enough money to pay your bills at this time.";
  header("Location: "."activity_denied.asp");
} 


//Update the record in the recordset

//Government_Bills") = rsGuestbook.Fields("Government_Bills") + collection//Last_Bills_Paid") = date()
//Write the updated recordset to the database



//Reset server objects



$rsGuestbook=null;

$objConn->Close;
$objConn=null;


//Return to the update select page in case another record needs deleting

header("Location: "."nation_drill_display.asp?Nation_ID=".$lngRecordNo);
?>  
