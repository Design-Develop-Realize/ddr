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
// $rsSanction is of type "ADODB.Recordset"

$rsSanctionSQL="SELECT Nation_ID FROM Sanctions WHERE (Nation_ID='".$_POST["Receiving_Nation_ID"]."' OR Nation_ID= '".$_POST["Declaring_Nation_ID"]."' ) AND Sanction_Aid = 1 AND (Sanction_Team = '".$_POST["Receiving_Nation_Team"]."' OR Sanction_Team = '".$_POST["Declaring_Nation_Team"]."') ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSanctionSQL);

if (!($rsSanction_BOF==1) && !($rsSanction==0))
{

  $denyreason_session="Either your nation or the nation in question has aid sanctions placed against it by one of your teams. You may not offer foreign aid at this time.";
  header("Location: "."activity_denied.asp");
} 



$rsSanction=null;

?>


<? 
// $rsAid is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(*) AS AidTotal FROM Aid WHERE (Aid.Aid_Cancled <> 2) AND (Aid_Declaration_Date >= getdate()-10) AND ((Receiving_Nation_ID=".$_POST["Receiving_Nation_ID"]."AND Declaring_Nation_ID=".$_POST["Declaring_Nation_ID"].") OR (Declaring_Nation_ID=".$_POST["Receiving_Nation_ID"]."AND Receiving_Nation_ID=".$_POST["Declaring_Nation_ID"]."))";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();

$test=$rsAid["Aid_Declaration_Date"];
$aidtotal=$rsAid["AidTotal"];

$rsAid=null;


if ($aidtotal>0)
{

  $denyreason_session="A foreign aid package already exists between these two nations.";
  header("Location: "."activity_denied.asp");
} 

?>




<? 
if (1000000-intval($_POST["Resource_Sent_1"])<0)
{

  $denyreason_session="The financial aid offer is invalid.";
  header("Location: "."activity_denied.asp");
} 

if ($_POST["Resource_Sent_1"]=="Select Financial Aid" || $_POST["Resource_Sent_1"]=="")
{

  $denyreason_session="The financial aid field was not completed.";
  header("Location: "."activity_denied.asp");
} 

if ($_POST["Resource_Sent_2"]=="Select Technology Aid" || $_POST["Resource_Sent_2"]=="")
{

  $denyreason_session="The technology aid field was not completed.";
  header("Location: "."activity_denied.asp");
} 

if ($_POST["Resource_Sent_3"]=="Select Military Aid" || $_POST["Resource_Sent_3"]=="")
{

  $denyreason_session="The military aid field was not completed.";
  header("Location: "."activity_denied.asp");
} 

if ($_POST["Resource_Sent_3"]+$_POST["Resource_Sent_2"]+$_POST["Resource_Sent_1"]==0)
{

  $denyreason_session="You must choose to send something.";
  header("Location: "."activity_denied.asp");
} 

?>
<? 

$lngRecordNo1=$_POST["Declaring_Nation_ID"];
// $rsAddComments is of type "ADODB.Recordset"

$rsAddCommentsSQL="SELECT * FROM Aid";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsAddCommentsSQL);
$rsAddComments_numRows=0;


//Tell the recordset we are adding a new record to it



//Add a new record to the recordset

//Aid_Issued_By_User") = Request.Form("Aid_Issued_By_User")//Aid_Issued_On_User") = Request.Form("Aid_Issued_On_User")//Receiving_Nation") = Request.Form("Receiving_Nation")//Receiving_Nation_ID") = Request.Form("Receiving_Nation_ID")//Declaring_Nation") = Request.Form("Declaring_Nation")//Declaring_Nation_ID") = Request.Form("Declaring_Nation_ID")if ($_POST["Aid_Reason"]=="")
{

  //Aid_Reason") = "Financial Assistance"}
  else
{

  //Aid_Reason") = Request.Form("Aid_Reason")} 

//Aid_Declaration_Date") = now()//Aid_Cancled") = 0
?>


<? if (strtoupper($_POST["Aid_Issued_By_User"])!=strtoupper($rsUser["U_ID"]) && strtoupper($_POST["Aid_Issued_On_User"])!=strtoupper($rsUser["U_ID"]))
{
?>
<!--#include file="activitylog.php" -->
<?   $denyreason_session="You are attempting to send aid with a nation that does not belong to you. You have been logged for cheating.";
  header("Location: "."activity_denied.asp");
} ?>






<? 
// $rsDetail is of type "ADODB.Recordset"

$rsDetailSQL="SELECT *  FROM Nation, Users WHERE Nation.POSTER = USERS.U_ID AND Nation_ID=".$lngRecordNo1;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsDetailSQL);
$rsDetail_numRows=0;



// Make sure his team is correct

if ($_POST["Declaring_Nation_Team"]!=$rsDetail["Nation_Team"])
{

  $denyreason_session="Your team information is incorrect.";
  header("Location: "."activity_denied.asp");
} 




$iLoc=0;
$iLoc=(strpos(strtoupper($MM_Username_session),strtoupper($rsDetail["Poster"])) ? strpos(strtoupper($MM_Username_session),strtoupper($rsDetail["Poster"]))+1 : 0);
if ($iLoc==0)
{

  $denyreason_session="User Name does not match in the database. Your session may have expired. Please login and try again.";
  header("Location: "."activity_denied.asp");
} 



$moneyavailable=$rsDetail["Money_Earned"]-($rsDetail["Money_Spent"]+$rsDetail["Government_Bills"]);
if ($moneyavailable>9000000)
{
  $moneyavailable=9000000;
}
;
} ?>

<? if ($rsDetail["Nation_Peace"]=1|!isset($rsDetail["Nation_Peace"])|$rsDetail["Nation_Peace"]=""$then;
$denyreason_session="Your nation is at peace and cannot send aid.";
$Response->Redirect"activity_denied.asp")
{
} ?>

<? 
$moneysent0=$moneyavailable-$moneyavailable;
$moneysent1=$moneyavailable/20;
$moneysent2=$moneyavailable/15;
$moneysent3=$moneyavailable/10;
$moneysent4=$moneyavailable/8;
$moneysent5=$moneyavailable/6;
$moneysent6=$moneyavailable/5;
$moneysent7=$moneyavailable/4;
$moneysent8=$moneyavailable/3;
$moneysent0=$FormatNumber[$moneysent0][2];
$moneysent1=$FormatNumber[$moneysent1][2];
$moneysent2=$FormatNumber[$moneysent2][2];
$moneysent3=$FormatNumber[$moneysent3][2];
$moneysent4=$FormatNumber[$moneysent4][2];
$moneysent5=$FormatNumber[$moneysent5][2];
$moneysent6=$FormatNumber[$moneysent6][2];
$moneysent7=$FormatNumber[$moneysent7][2];
$moneysent8=$FormatNumber[$moneysent8][2];

$formsubmit=$_POST["Resource_Sent_1"];
switch ($formsubmit)
{
  case 0:
    $Resource_Sent_1=$moneysent0;
    break;
  case 1:
    $Resource_Sent_1=$moneysent1;
    break;
  case 2:
    $Resource_Sent_1=$moneysent2;
    break;
  case 3:
    $Resource_Sent_1=$moneysent3;
    break;
  case 4:
    $Resource_Sent_1=$moneysent4;
    break;
  case 5:
    $Resource_Sent_1=$moneysent5;
    break;
  case 6:
    $Resource_Sent_1=$moneysent6;
    break;
  case 7:
    $Resource_Sent_1=$moneysent7;
    break;
  case 8:
    $Resource_Sent_1=$moneysent8;
    break;
} 

$Resource_Sent_1=$FormatNumber[$Resource_Sent_1][2];

//Resource_Sent_1") = Resource_Sent_1




$techavailable=($rsDetail["Technology_Purchased"])-5;
if ($techavailable>1000)
{
  $moneyavailable=1000;
}
;
} 
$techsent0=$techavailable-$techavailable;
$techsent1=$techavailable/20;
$techsent2=$techavailable/15;
$techsent3=$techavailable/10;
$techsent4=$techavailable/8;
$techsent5=$techavailable/6;
$techsent6=$techavailable/5;
$techsent7=$techavailable/4;
$techsent8=$techavailable/3;
$techsent0=$FormatNumber[$techsent0][2];
$techsent1=$FormatNumber[$techsent1][2];
$techsent2=$FormatNumber[$techsent2][2];
$techsent3=$FormatNumber[$techsent3][2];
$techsent4=$FormatNumber[$techsent4][2];
$techsent5=$FormatNumber[$techsent5][2];
$techsent6=$FormatNumber[$techsent6][2];
$techsent7=$FormatNumber[$techsent7][2];
$techsent8=$FormatNumber[$techsent8][2];

$formsubmit=$_POST["Resource_Sent_2"];
switch ($formsubmit)
{
  case 0:
    $Resource_Sent_2=$techsent0;
    break;
  case 1:
    $Resource_Sent_2=$techsent1;
    break;
  case 2:
    $Resource_Sent_2=$techsent2;
    break;
  case 3:
    $Resource_Sent_2=$techsent3;
    break;
  case 4:
    $Resource_Sent_2=$techsent4;
    break;
  case 5:
    $Resource_Sent_2=$techsent5;
    break;
  case 6:
    $Resource_Sent_2=$techsent6;
    break;
  case 7:
    $Resource_Sent_2=$techsent7;
    break;
  case 8:
    $Resource_Sent_2=$techsent8;
    break;
} 

//Resource_Sent_2") = Resource_Sent_2



$soldiersavailable=($rsDetail["Military_Purchased"]-$rsDetail["Military_Defending_Casualties"]-$rsDetail["Military_Attacking_Casualties"]-$rsDetail["Military_Deployed"])*.50;
if ($soldiersavailable>2000)
{
  $soldiersavailable=2000;
}
;
} 
$soldierssent0=$soldiersavailable-$soldiersavailable;
$soldierssent1=$soldiersavailable/15;
$soldierssent2=$soldiersavailable/10;
$soldierssent3=$soldiersavailable/6;
$soldierssent4=$soldiersavailable/5;
$soldierssent5=$soldiersavailable/4;
$soldierssent6=$soldiersavailable/3;
$soldierssent7=$soldiersavailable/2.5;
$soldierssent8=$soldiersavailable/2;
$soldierssent9=$soldiersavailable/1.5;
$soldierssent10=$soldiersavailable/1;
$soldierssent0=$FormatNumber[$soldierssent0][0];
$soldierssent1=$FormatNumber[$soldierssent1][0];
$soldierssent2=$FormatNumber[$soldierssent2][0];
$soldierssent3=$FormatNumber[$soldierssent3][0];
$soldierssent4=$FormatNumber[$soldierssent4][0];
$soldierssent5=$FormatNumber[$soldierssent5][0];
$soldierssent6=$FormatNumber[$soldierssent6][0];
$soldierssent7=$FormatNumber[$soldierssent7][0];
$soldierssent8=$FormatNumber[$soldierssent8][0];
$soldierssent9=$FormatNumber[$soldierssent9][0];
$soldierssent10=$FormatNumber[$soldierssent10][0];

$formsubmit=$_POST["Resource_Sent_3"];
switch ($formsubmit)
{
  case 0:
    $Resource_Sent_3=$soldierssent0;
    break;
  case 1:
    $Resource_Sent_3=$soldierssent1;
    break;
  case 2:
    $Resource_Sent_3=$soldierssent2;
    break;
  case 3:
    $Resource_Sent_3=$soldierssent3;
    break;
  case 4:
    $Resource_Sent_3=$soldierssent4;
    break;
  case 5:
    $Resource_Sent_3=$soldierssent5;
    break;
  case 6:
    $Resource_Sent_3=$soldierssent6;
    break;
  case 7:
    $Resource_Sent_3=$soldierssent7;
    break;
  case 8:
    $Resource_Sent_3=$soldierssent8;
    break;
  case 9:
    $Resource_Sent_3=$soldierssent9;
    break;
  case 10:
    $Resource_Sent_3=$soldierssent10;
    break;
} 


//Resource_Sent_3") = Resource_Sent_3

//Write the updated recordset to the database


?>

<? 
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


//Add a new record to the recordset

//U_ID") = Request.Form("Aid_Issued_On_User")//MESS_FROM") =  Request.Form("Aid_Issued_By_User")//MESSAGE") = "A foreign aid offer has been submitted by " & Request.Form("Aid_Issued_By_User") & ". Please review your <a href='aid_information.asp'>Foreign Aid</a> screen to accept or deny this foreign aid offer." //SUBJECT") = "Foreign Aid Offer"//MESS_READ") = "False"


//Write the updated recordset to the database




?>

<? 
//Reset server objects

$rsUser->Close;
$rsUser=null;


$rsAddComments=null;

$objConn->Close();
$objConn=null;


//Redirect to the guestbook.asp page

header("Location: "."aid_information.asp?Nation_ID=".$lngRecordNo1);
?>
