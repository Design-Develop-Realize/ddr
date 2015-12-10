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
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Upper(Poster) = '".strtoupper($rsUser["U_ID"])."' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);


$improvementtype=$_GET["Improvement"];
// $rsUpdateEntry is of type "ADODB.Recordset"

$rsUpdateEntrySQL="SELECT * FROM Improvements WHERE Nation_ID=".$rsGuestbook["Nation_ID"];
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntrySQL);
$rsUpdateEntry_numRows=0;

switch ($improvementtype)
{
  case "Bank":
    if ($rsUpdateEntry["Banks"]>0)
    {

$rsUpdateEntry["Banks"]=$rsUpdateEntry["Banks"]-1;
          } 

    break;
  case "Barrack":
    if ($rsUpdateEntry["Barracks"]>0)
    {

$rsUpdateEntry["Barracks"]=$rsUpdateEntry["Barracks"]-1;
          } 

    break;
  case "Border Wall":
    if ($rsUpdateEntry["Border_Walls"]>0)
    {

$rsUpdateEntry["Border_Walls"]=$rsUpdateEntry["Border_Walls"]-1;
          } 

    break;
  case "Church":
    if ($rsUpdateEntry["Churches"]>0)
    {

$rsUpdateEntry["Churches"]=$rsUpdateEntry["Churches"]-1;
          } 

    break;
  case "Clinic":
    if ($rsUpdateEntry["Clinics"]>0)
    {

      if ($rsUpdateEntry["Hospitals"]>0)
      {

        $denyreason_session="You cannot destroy clincis when you have a Hospital.";
        header("Location: "."activity_denied.asp");
      }
        else
      {

$rsUpdateEntry["Clinics"]=$rsUpdateEntry["Clinics"]-1;
              } 

    } 

    break;
  case "Factory":
    if ($rsUpdateEntry["Factories"]>0)
    {

$rsUpdateEntry["Factories"]=$rsUpdateEntry["Factories"]-1;
          } 

    break;
  case "Foreign Ministry":
    if ($rsUpdateEntry["Foreign_Ministries"]>0)
    {

$rsUpdateEntry["Foreign_Ministries"]=$rsUpdateEntry["Foreign_Ministries"]-1;
          } 

    break;
  case "Guerilla Camp":
    if ($rsUpdateEntry["Guerilla_Camps"]>0)
    {

$rsUpdateEntry["Guerilla_Camps"]=$rsUpdateEntry["Guerilla_Camps"]-1;
          } 

    break;
  case "Harbor":
    if ($rsUpdateEntry["Harbors"]>0)
    {

$rsUpdateEntry["Harbors"]=$rsUpdateEntry["Harbors"]-1;
          } 

    break;
  case "Hospital":
    if ($rsUpdateEntry["Hospitals"]>0)
    {

$rsUpdateEntry["Hospitals"]=$rsUpdateEntry["Hospitals"]-1;
          } 

    break;
  case "Intelligence Agency":
    if ($rsUpdateEntry["Intelligence_Agencies"]>0)
    {

$rsUpdateEntry["Intelligence_Agencies"]=$rsUpdateEntry["Intelligence_Agencies"]-1;
          } 

    break;
  case "Labor Camp":
    if ($rsUpdateEntry["Labor_Camps"]>0)
    {

$rsUpdateEntry["Labor_Camps"]=$rsUpdateEntry["Labor_Camps"]-1;
          } 

    break;
  case "Missile Defense":
    if ($rsUpdateEntry["Missile_Defenses"]>0)
    {

$rsUpdateEntry["Missile_Defenses"]=$rsUpdateEntry["Missile_Defenses"]-1;
          } 

    break;
  case "Police Headquarters":
    if ($rsUpdateEntry["Police_Headquarters"]>0)
    {

$rsUpdateEntry["Police_Headquarters"]=$rsUpdateEntry["Police_Headquarters"]-1;
          } 

    break;
  case "Satellite":
    if ($rsUpdateEntry["Satellites"]>0)
    {

$rsUpdateEntry["Satellites"]=$rsUpdateEntry["Satellites"]-1;
          } 

    break;
  case "School":
    if ($rsUpdateEntry["Schools"]>0)
    {

      if ($rsUpdateEntry["Universities"]>0)
      {

        $denyreason_session="You cannot destroy schools when you have a University.";
        header("Location: "."activity_denied.asp");
      }
        else
      {

$rsUpdateEntry["Schools"]=$rsUpdateEntry["Schools"]-1;
              } 

    } 

    break;
  case "Stadium":
    if ($rsUpdateEntry["Stadiums"]>0)
    {

$rsUpdateEntry["Stadiums"]=$rsUpdateEntry["Stadiums"]-1;
          } 

    break;
  case "University":
    if ($rsUpdateEntry["Universities"]>0)
    {

$rsUpdateEntry["Universities"]=$rsUpdateEntry["Universities"]-1;
          } 

    break;
} 

//Update the record in the recordset



//Reset server objects


$rsUpdateEntry=null;

$objConn->Close();
$objConn=null;


//Return to the delete select page in case another record needs deleting

header("Location: "."improvements_purchase.asp?Nation_ID=".$_GET["Nation_ID"]);
?>
