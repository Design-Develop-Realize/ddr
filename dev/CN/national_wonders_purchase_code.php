<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
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

if (time()()-$rsGuestbook["Last_Bills_Paid"]>=3)
{

  $denyreason_session="You must pay your bills before making this purchase.";
  header("Location: "."activity_denied.asp");
} 


$soldierslostalltime=intval($rsGuestbook["Military_Defending_Casualties"])+intval($rsGuestbook["Military_Attacking_Casualties"]);

if ($_POST["Nation_ID"]-$rsGuestbook["Nation_ID"]!=0)
{

  $denyreason_session="Nation ID does not match in the database. Please login and try again.";
  header("Location: "."activity_denied.asp");
} 


if (!isset($rsGuestbook["National_Wonder_Date"]))
{

  $wonderdate=time()()-60;
}
  else
{

  $wonderdate=$rsGuestbook["National_Wonder_Date"];
} 


if (time()()-$wonderdate<30)
{

  $denyreason_session="You may only develop national wonders once every 30 days.";
  header("Location: "."activity_denied.asp");
} 


if (time()()-$rsGuestbook["Last_Bills_Paid"]>2)
{

  $denyreason_session="You must pay your bills before purchasing nation improvements.";
  header("Location: "."activity_denied.asp");
} 


?>


<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->

<? 
$InternetCost=$FormatNumber[35000000][2];
$SpaceCost=$FormatNumber[30000000][2];
$MonumentCost=$FormatNumber[35000000][2];
$MovieCost=$FormatNumber[26000000][2];
$UniversityCost=$FormatNumber[35000000][2];
$ResearchCost=$FormatNumber[35000000][2];
$SocialCost=$FormatNumber[40000000][2];
$DisasterCost=$FormatNumber[40000000][2];
$InterstateCost=$FormatNumber[45000000][2];
$TempleCost=$FormatNumber[35000000][2];
$MemorialCost=$FormatNumber[27000000][2];
$StockCost=$FormatNumber[30000000][2];


switch ($_POST["improvement"])
{
  case "Internet":
    $itemcost=$InternetCost;
    break;
  case "Space_Program":
    $itemcost=$SpaceCost;
    break;
  case "Great_Monument":
    $itemcost=$MonumentCost;
    break;
  case "Movie_Industry":
    $itemcost=$MovieCost;
    break;
  case "Great_University":
    $itemcost=$UniversityCost;
    break;
  case "Research_Lab":
    $itemcost=$ResearchCost;
    break;
  case "Social_Security":
    $itemcost=$SocialCost;
    break;
  case "Disaster_Relief":
    $itemcost=$DisasterCost;
    break;
  case "Interstate_System":
    $itemcost=$InterstateCost;
    break;
  case "Great_Temple":
    $itemcost=$TempleCost;
    break;
  case "War_Memorial":
    $itemcost=$MemorialCost;
    break;
  case "Stock_Market":
    $itemcost=$StockCost;
    break;
} 

if ($totalmoneyavailable-$itemcost<0)
{

  $denyreason_session="You do not have enough money to purchase that improvement.";
  header("Location: "."activity_denied.asp");
} 


?>


<? 
// $rsWonders is of type "ADODB.Recordset"

$rsWondersSQL="SELECT * FROM National_Wonders WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsWondersSQL);

$totalwonders=0;
if ((!($rsWonders_BOF==1)) && (!($rsWonders==0)))
{

  $totalwonders=$rsWonders["Internet"]+$rsWonders["Space_Program"]+$rsWonders["Great_Monument"]+$rsWonders["Movie_Industry"]+$rsWonders["Great_University"]+$rsWonders["Research_Lab"]+$rsWonders["Social_Security"]+$rsWonders["Disaster_Relief"]+$rsWonders["Interstate_System"]+$rsWonders["Great_Temple"]+$rsWonders["War_Memorial"]+$rsWonders["Stock_Market"];

  if ($totalwonders>=12)
  {

    $denyreason_session="You already have 5 national wonders and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["Internet"]>0 && $_POST["improvement"]=="Internet")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["Space_Program"]>0 && $_POST["improvement"]=="Space_Program")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["Great_Monument"]>0 && $_POST["improvement"]=="Great_Monument")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["Movie_Industry"]>0 && $_POST["improvement"]=="Movie_Industry")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["Great_University"]>0 && $_POST["improvement"]=="Great_University")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["Research_Lab"]>0 && $_POST["improvement"]=="Research_Lab")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["Social_Security"]>0 && $_POST["improvement"]=="Social_Security")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["Disaster_Relief"]>0 && $_POST["improvement"]=="Disaster_Relief")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["Interstate_System"]>0 && $_POST["improvement"]=="Interstate_System")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["Great_Temple"]>0 && $_POST["improvement"]=="Great_Temple")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["War_Memorial"]>0 && $_POST["improvement"]=="War_Memorial")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsWonders["Stock_Market"]>0 && $_POST["improvement"]=="Stock_Market")
  {

    $denyreason_session="You already have this national wonder and cannot purchase any more.";
    header("Location: "."activity_denied.asp");
  } 

} 


if ($soldierslostalltime<50000 && $_POST["improvement"]=="War_Memorial")
{

  $denyreason_session="You have not lost enough soldiers in war to develop a national war memorial.";
  header("Location: "."activity_denied.asp");
} 


if (($rsWonders_BOF==1) && ($rsWonders==0))
{

  
} 


$rsWonders["Nation_ID"]=$lngRecordNo;
switch ($_POST["improvement"])
{
  case "Internet":
$rsWonders["Internet"]=1;
        break;
  case "Space_Program":
$rsWonders["Space_Program"]=1;
        break;
  case "Great_Monument":
$rsWonders["Great_Monument"]=1;
        break;
  case "Movie_Industry":
$rsWonders["Movie_Industry"]=1;
        break;
  case "Great_University":
$rsWonders["Great_University"]=1;
        break;
  case "Research_Lab":
$rsWonders["Research_Lab"]=1;
        break;
  case "Social_Security":
$rsWonders["Social_Security"]=1;
        break;
  case "Disaster_Relief":
$rsWonders["Disaster_Relief"]=1;
        break;
  case "Interstate_System":
$rsWonders["Interstate_System"]=1;
        break;
  case "Great_Temple":
$rsWonders["Great_Temple"]=1;
        break;
  case "War_Memorial":
$rsWonders["War_Memorial"]=1;
        break;
  case "Stock_Market":
$rsWonders["Stock_Market"]=1;
        break;
} 




//Money_Spent") = itemcost + rsGuestbook("Money_Spent")//Number_Of_Purchases") = rsGuestbook("Number_Of_Purchases") +1//National_Wonder_Date") = date()

?>


<? 
//Reset server objects



$rsGuestbook=null;


$rsWonders=null;

$objConn->Close();
$objConn=null;


//Return to the update select page in case another record needs deleting

header("Location: "."national_wonders_purchase.asp");
?>
