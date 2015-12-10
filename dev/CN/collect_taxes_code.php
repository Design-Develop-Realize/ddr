<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("dailypopulationtaxes_session");
  session_register("totalmoneyavailable_session");
  session_register("citizens_session");
  session_register("event_number_session");
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
?>
<!--#include file="inc_header.php" -->
<? 
// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT * FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);
?>
<? 
if (strtoupper($_POST["Poster"])!=strtoupper($rsUser["U_ID"]))
{

  $denyreason_session="You are attempting to collect taxes with a nation that does not belong to you. You have been logged for cheating.";
  header("Location: "."activity_denied.asp");
} 



if ($_POST["Nation_ID"]-$rsGuestbook0["Nation_ID"]!=0)
{

  $denyreason_session="Nation ID does not match in the database. Please login and try again.";
  header("Location: "."activity_denied.asp");
} 


if ($dailypopulationtaxes_session=="")
{

  $denyreason_session="Nation ID does not match in the database. Please login and try again.";
  header("Location: "."activity_denied.asp");
} 


$last_date=$DateDiff["d"][$rsGuestbook0["Last_Tax_Collection"]][time()()];
if ($last_date>0 && $last_date<1)
{

  $last_date=1;
} 


if ($last_date==0)
{

  $denyreason_session="You have already collected taxes today.";
  header("Location: "."activity_denied.asp");
} 


$totalmoneyavailable=$totalmoneyavailable_session;
$dailypopulationtaxes=$dailypopulationtaxes_session;
$citizens=$citizens_session;

$dailypopulationtaxes_session="";
$citizens_session="";
$totalmoneyavailable_session="";


if ($rsUser["Site_Ads"]==1)
{

  $interestrate=12;
  $maxearnedinterest=10000;
  $earnedinterest=($totalmoneyavailable*.12)*($last_date-1);
}
  else
{

  $interestrate=8;
  $maxearnedinterest=5000;
  $earnedinterest=($totalmoneyavailable*.08)*($last_date-1);
} 



if ($totalmoneyavailable<0)
{

  $earnedinterest=0;
} 

if ($earnedinterest<0)
{

  $earnedinterest=0;
} 


if ($earnedinterest>$maxearnedinterest)
{

  $earnedinterest=$maxearnedinterest;
} 


$collection=(($dailypopulationtaxes*($FormatNumber[$citizens][0]))*$last_date)+$earnedinterest;


//Update the record in the recordset

//Money_Earned") = rsGuestbook0.Fields("Money_Earned") + collection//Last_Tax_Collection") = now()

// =============================================================================

// Validate that the nation has the proper fields and didnt hack into the system

$teamchecker=0;
switch ($rsGuestbook0["Nation_Team"])
{
  case "Red":
    $teamchecker=1;
    break;
  case "Green":
    $teamchecker=1;
    break;
  case "Brown":
    $teamchecker=1;
    break;
  case "Blue":
    $teamchecker=1;
    break;
  case "Purple":
    $teamchecker=1;
    break;
  case "Orange":
    $teamchecker=1;
    break;
  case "Black":
    $teamchecker=1;
    break;
  case "Pink":
    $teamchecker=1;
    break;
  case "Maroon":
    $teamchecker=1;
    break;
  case "Yellow":
    $teamchecker=1;
    break;
  case "White":
    $teamchecker=1;
    break;
  case "Aqua":
    $teamchecker=1;
    break;
  case "None":
    $teamchecker=1;
    break;
} 
if ($teamchecker==0)
{

$rsGuestbook0["Nation_Team"]="None";
  } 


if ($rsGuestbook0["Technology_Purchased"]<0)
{
$rsGuestbook0["Technology_Purchased"]=0;
}
;
  } 

$religionchecker=0;
switch ($rsGuestbook0["Religion"])
{
  case "None":
    $religionchecker=1;
    break;
  case "Mixed":
    $religionchecker=1;
    break;
  case "Baha'i Faith":
    $religionchecker=1;
    break;
  case "Buddhism":
    $religionchecker=1;
    break;
  case "Christianity":
    $religionchecker=1;
    break;
  case "Confucianism":
    $religionchecker=1;
    break;
  case "Hinduism":
    $religionchecker=1;
    break;
  case "Islam":
    $religionchecker=1;
    break;
  case "Jainism":
    $religionchecker=1;
    break;
  case "Judaism":
    $religionchecker=1;
    break;
  case "Norse":
    $religionchecker=1;
    break;
  case "Shinto":
    $religionchecker=1;
    break;
  case "Sikhism":
    $religionchecker=1;
    break;
  case "Taoism":
    $religionchecker=1;
    break;
  case "Voodoo":
    $religionchecker=1;
    break;
} 
if ($religionchecker==0)
{

$rsGuestbook0["Religion"]="Christianity";
  } 


$governmentchecker=0;
switch ($rsGuestbook0["Government_Type"])
{
  case "Capitalist":
    $governmentchecker=1;
    break;
  case "Communist":
    $governmentchecker=1;
    break;
  case "Democracy":
    $governmentchecker=1;
    break;
  case "Dictatorship":
    $governmentchecker=1;
    break;
  case "Federal Government":
    $governmentchecker=1;
    break;
  case "Monarchy":
    $governmentchecker=1;
    break;
  case "Republic":
    $governmentchecker=1;
    break;
  case "Revolutionary Government":
    $governmentchecker=1;
    break;
  case "Totalitarian State":
    $governmentchecker=1;
    break;
  case "Transitional":
    $governmentchecker=1;
    break;
} 
if ($governmentchecker==0)
{

$rsGuestbook0["Government_Type"]="Anarchy";
  } 


if (!isset($rsGuestbook0["Capital_City"]))
{

$rsGuestbook0["Capital_City"]="Capital City";
  } 


if (!isset($rsGuestbook0["Nation_BIO"]) || $rsGuestbook0["Nation_BIO"]=""$then;
$rsGuestbook0["Nation_BIO"]="Nation BIO";
;
}
)
{

  if (!isset($rsGuestbook0["Currency_Type"]))
  {

$rsGuestbook0["Currency_Type"]="Dollar";
      } 


  if (!isset($rsGuestbook0["Ethnic_Group"]))
  {

$rsGuestbook0["Ethnic_Group"]="Caucasian";
      } 


  if (!isset($rsGuestbook0["Nation_Peace_Date"]))
  {

$rsGuestbook0["Nation_Peace_Date"]=time()()-7;
      } 


  if (!isset($rsGuestbook0["Nation_Peace"]))
  {

$rsGuestbook0["Nation_Peace"]="1";
      } 


// End hack validation check

// =============================================================================


  if (("Religion_Changed")<time()()-20)
  {

    mt_srand((double)microtime()*1000000);
    $randomnumber=intval((mt_rand(0,10000000)/10000000))+1;
    switch ($randomnumber)
    {
      case :
?>
	<?         $desired_religion="None"; ?>
	<?         break;
      case 2: ?>
	<?         $desired_religion="Mixed"; ?>
	<?         break;
      case 3: ?>
	<?         $desired_religion="Baha'i Faith"; ?>
	<?         break;
      case 4: ?>
	<?         $desired_religion="Buddhism"; ?>
	<?         break;
      case 5: ?>
	<?         $desired_religion="Christianity"; ?>
	<?         break;
      case 6: ?>
	<?         $desired_religion="Confucianism"; ?>
	<?         break;
      case 7: ?>
	<?         $desired_religion="Hinduism"; ?>
	<?         break;
      case 8: ?>
	<?         $desired_religion="Islam"; ?>
	<?         break;
      case 9: ?>
	<?         $desired_religion="Jainism"; ?>
	<?         break;
      case 10: ?>
	<?         $desired_religion="Judaism"; ?>
	<?         break;
      case 11: ?>
	<?         $desired_religion="Shinto"; ?>
	<?         break;
      case 12: ?>
	<?         $desired_religion="Sikhism"; ?>
	<?         break;
      case 13: ?>
	<?         $desired_religion="Judaism"; ?>
	<?         break;
      case 14: ?>
	<?         $desired_religion="Taoism"; ?>
	<?         break;
      case 15: ?>
	<?         $desired_religion="Voodoo"; ?>
	<?         break;
      case 16: ?>
	<?         $desired_religion="Norse"; ?>
	<?         break;
    } 
    //Desired_Religion") = desired_religion    //Religion_Changed") = date()-5  } 

?>

<? 
  if (("Government_Changed")<time()()-20)
  {

    mt_srand((double)microtime()*1000000);
    $randomnumber=intval((mt_rand(0,10000000)/10000000))+1;
    switch ($randomnumber)
    {
      case :
?>
	<?         $desired_government="Democracy"; ?>
	<?         break;
      case 2: ?>
	<?         $desired_government="Capitalist"; ?>
	<?         break;
      case 3: ?>
	<?         $desired_government="Communist"; ?>
	<?         break;
      case 4: ?>
	<?         $desired_government="Democracy"; ?>
	<?         break;
      case 5: ?>
	<?         $desired_government="Dictatorship"; ?>
	<?         break;
      case 6: ?>
	<?         $desired_government="Federal Government"; ?>
	<?         break;
      case 7: ?>
	<?         $desired_government="Monarchy"; ?>
	<?         break;
      case 8: ?>
	<?         $desired_government="Republic"; ?>
	<?         break;
      case 9: ?>
	<?         $desired_government="Revolutionary Government"; ?>
	<?         break;
      case 10: ?>
	<?         $desired_government="Totalitarian State"; ?>
	<?         break;
      case 11: ?>
	<?         $desired_government="Transitional"; ?>
	<?         break;
    } 
    //Desired_Government") = desired_government    //Government_Changed") = date()-5  } 

?>

<? 
  if ((!is_numeric($rsGuestbook0["Nation_Lat"])) && (!is_numeric($rsGuestbook0["Nation_Lon"])))
  {

$rsGuestbook0["Nation_Lat"]=25.64152637306577;
    $rsGuestbook0["Nation_Lon"]=8.96484375;
      } 


//Write the updated recordset to the database

  
?>


<? 
  if (time()()=="11/9/2006")
  {

// Send a message to help advertise the site

// $adoCon is of type "ADODB.Connection"

    $a2p_connstr==$MM_conn_STRING_Messages;
    $a2p_uid=strstr($a2p_connstr,'uid');
    $a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
    $a2p_pwd=strstr($a2p_connstr,'pwd');
    $a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
    $a2p_database=strstr($a2p_connstr,'dsn');
    $a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
    $adoCon=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
    mysql_select_db($a2p_database,$adoCon);
// $rsAddComments is of type "ADODB.Recordset"

    $strSQL="EMESSAGES";
        echo 2;
        echo 3;
    $rs=mysql_query($strSQL);
    //U_ID") = rsGuestbookHead("Poster")    //MESS_FROM") =  "admin"    //MESSAGE") = "If you have not already taken advantage of the <a href='http://www.cybernations.net/offer_link.asp'>link offer bonus</a> consider doing so now. The link offer bonus has been created to help attract more players to Cyber Nations while rewarding those who help it grow. Our game servers are prepared to handle many more players than we have now and all we need is for you to help get the word out. See the link offer bonus for more details on getting free rewards for your nation for helping to advertise Cyber Nations."    //SUBJECT") = "Help Spread The Word"    //MESS_READ") = "False"//rsAddComments.Update 

    
    $rsAddComments=null;

  } 

?>

<? 
// $rsEvent2 is of type "ADODB.Recordset"

  $rsEvent2SQL="Select * From National_Events";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsEvent2SQL);
  $rsEvent2_numRows=0;

  

  $event_number=$event_number_session;
  $Remove["event_number"];

  if ($event_number>=1 && $event_number<=7)
  {
//  chance of getting an event

    mt_srand((double)microtime()*1000000);
    $randomnumber=intval((mt_rand(0,10000000)/10000000))+1;
    $actualevent=0;
    $lowestNumber=1;
    $highestNumber=19; //Number of events in the system
;
    mt_srand((double)microtime()*1000000);
    $randomNum=intval(($highestNumber-$lowestNumber+1)*(mt_rand(0,10000000)/10000000));
    $actualevent=$randomNum;
    mt_srand((double)microtime()*1000000);
    $randomnumber=intval((mt_rand(0,10000000)/10000000))+1;

    if ($actualevent==6 && $rsGuestbook0["Nuclear"]!=2)
    {

      $actualevent=1;
    } 


    //National_Event_Date") = date()    //National_Event_Number") = actualevent    //National_Event_Receiver") = rsGuestbook0("Nation_ID")    //National_Event_Receiver_Name") = rsGuestbook0("Nation_Name")    //National_Event_Receiver_Ruler") = rsGuestbook0("Poster")    
  } 

?>
<!--#include file="database_nationstrength.php" -->
<? 
  
  $rsGuestbook0=null;

  
  $rsEvent2=null;

$objConn->Close;
  $objConn=null;


//Return to the update select page in case another record needs deleting

  header("Location: "."nation_drill_display.asp?Nation_ID=".$lngRecordNo);
?>} 

