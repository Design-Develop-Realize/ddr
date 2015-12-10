<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
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
<!--#include file="inc_header.php" -->

<? 
$lngRecordNo=intval($_GET["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Upper(Poster) = '".strtoupper($rsUser["U_ID"])."' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);


// $rsAircraft is of type "ADODB.Recordset"

$rsAircraftSQL="SELECT * FROM Aircraft WHERE Nation_ID=".$rsGuestbook["Nation_ID"];
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsAircraftSQL);

if (($rsAircraft_BOF==1) && ($rsAircraft==0))
{

  header("Location: "."aircraft_purchase.asp");
} 


$aircrafttype=$_GET["Aircraft"];
switch ($aircrafttype)
{
  case "Yakovlev Yak-9":
    if ($rsAircraft["Yakovlev Yak-9"]>0)
    {

$rsAircraft["Yakovlev Yak-9"]=$rsAircraft["Yakovlev Yak-9"]-1;
          } 

    break;
  case "P-51 Mustang":
    if ($rsAircraft["P-51 Mustang"]>0)
    {

$rsAircraft["P-51 Mustang"]=$rsAircraft["P-51 Mustang"]-1;
          } 

    break;
  case "F-86 Sabre":
    if ($rsAircraft["F-86 Sabre"]>0)
    {

$rsAircraft["F-86 Sabre"]=$rsAircraft["F-86 Sabre"]-1;
          } 

    break;
  case "Mikoyan-Gurevich MiG-15":
    if ($rsAircraft["Mikoyan-Gurevich MiG-15"]>0)
    {

$rsAircraft["Mikoyan-Gurevich MiG-15"]=$rsAircraft["Mikoyan-Gurevich MiG-15"]-1;
          } 

    break;
  case "F-100 Super Sabre":
    if ($rsAircraft["F-100 Super Sabre"]>0)
    {

$rsAircraft["F-100 Super Sabre"]=$rsAircraft["F-100 Super Sabre"]-1;
          } 

    break;
  case "F-35 Lightning II":
    if ($rsAircraft["F-35 Lightning II"]>0)
    {

$rsAircraft["F-35 Lightning II"]=$rsAircraft["F-35 Lightning II"]-1;
          } 

    break;
  case "F-15 Eagle":
    if ($rsAircraft["F-15 Eagle"]>0)
    {

$rsAircraft["F-15 Eagle"]=$rsAircraft["F-15 Eagle"]-1;
          } 

    break;
  case "Su-30 MKI":
    if ($rsAircraft["Su-30 MKI"]>0)
    {

$rsAircraft["Su-30 MKI"]=$rsAircraft["Su-30 MKI"]-1;
          } 

    break;
  case "F-22 Raptor":
    if ($rsAircraft["F-22 Raptor"]>0)
    {

$rsAircraft["F-22 Raptor"]=$rsAircraft["F-22 Raptor"]-1;
          } 

    break;
  case "AH-1 Cobra":
    if ($rsAircraft["AH-1 Cobra"]>0)
    {

$rsAircraft["AH-1 Cobra"]=$rsAircraft["AH-1 Cobra"]-1;
          } 

    break;
  case "AH-64 Apache":
    if ($rsAircraft["AH-64 Apache"]>0)
    {

$rsAircraft["AH-64 Apache"]=$rsAircraft["AH-64 Apache"]-1;
          } 

    break;
  case "Bristol Blenheim":
    if ($rsAircraft["Bristol Blenheim"]>0)
    {

$rsAircraft["Bristol Blenheim"]=$rsAircraft["Bristol Blenheim"]-1;
          } 

    break;
  case "B-25 Mitchell":
    if ($rsAircraft["B-25 Mitchell"]>0)
    {

$rsAircraft["B-25 Mitchell"]=$rsAircraft["B-25 Mitchell"]-1;
          } 

    break;
  case "B-17G Flying Fortress":
    if ($rsAircraft["B-17G Flying Fortress"]>0)
    {

$rsAircraft["B-17G Flying Fortress"]=$rsAircraft["B-17G Flying Fortress"]-1;
          } 

    break;
  case "B-52 Stratofortress":
    if ($rsAircraft["B-52 Stratofortress"]>0)
    {

$rsAircraft["B-52 Stratofortress"]=$rsAircraft["B-52 Stratofortress"]-1;
          } 

    break;
  case "B-2 Spirit":
    if ($rsAircraft["B-2 Spirit"]>0)
    {

$rsAircraft["B-2 Spirit"]=$rsAircraft["B-2 Spirit"]-1;
          } 

    break;
  case "B-1B Lancer":
    if ($rsAircraft["B-1B Lancer"]>0)
    {

$rsAircraft["B-1B Lancer"]=$rsAircraft["B-1B Lancer"]-1;
          } 

    break;
  case "Tupolev Tu-160":
    if ($rsAircraft["Tupolev Tu-160"]>0)
    {

$rsAircraft["Tupolev Tu-160"]=$rsAircraft["Tupolev Tu-160"]-1;
          } 

    break;
} 

//Update the record in the recordset



$lngRecordNo=$rsGuestbookHead["Nation_ID"];
?>
<!--#include file="database_nationstrength.php" -->
<? 

//Reset server objects


$rsAircraft=null;

$objConn->Close();
$objConn=null;


//Return to the delete select page in case another record needs deleting

header("Location: "."aircraft_purchase.asp");
?>
