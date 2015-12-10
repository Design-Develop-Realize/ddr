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
if ($_POST["Password"]=="")
{

  $denyreason_session="You did not enter anything in the password validation field. Please try again.";
  header("Location: "."activity_denied.asp");
} 


$sDigest=sha256($_POST["Password"]);
if ($sDigest!=$rsUser["U_Password_Secure"])
{

  $denyreason_session="The password that you entered did not match in the system. Please try again.";
  header("Location: "."activity_denied.asp");
} 


// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT Strength FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);
?>
<? 

// $rsWarCntr is of type "ADODB.Recordset"

$rsWarCntrSQL="SELECT Count(*) as Wars FROM WAR WHERE Receiving_Nation_ID = '"+$_POST["Receiving_Nation_ID"]+"'AND WAR.Nation_Deleted = 0 AND (WAR.Receiving_Nation_Peace + WAR.Declaring_Nation_Peace <> 2) AND War_End_Date > '".time()()."' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsWarCntrSQL);
$warcntr=$rsWarCntr["Wars"];

$rsWarCntr=null;


if ($warcntr>=3)
{

  $denyreason_session="That nation is involved in too many wars. You cannot declare war on them at this time.";
  header("Location: "."activity_denied.asp");
} 


$warcntr=0;
// $rsWarCntr is of type "ADODB.Recordset"

$rsWarCntrSQL="SELECT Count(*) as Wars FROM WAR WHERE Declaring_Nation_ID = '".$rsGuestbookHead["Nation_ID"]."'AND WAR.Nation_Deleted = 0 AND (WAR.Receiving_Nation_Peace + WAR.Declaring_Nation_Peace <> 2) AND War_End_Date > '".time()()."' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsWarCntrSQL);
$warcntr=$rsWarCntr["Wars"];

$rsWarCntr=null;

if ($warcntr>=3)
{

  $denyreason_session="Your nation is involved in too many wars. You cannot declare war at this time.";
  header("Location: "."activity_denied.asp");
} 



$lngRecordNo1=$_POST["Receiving_Nation_ID"];
$lngRecordNo1=str_replace("'","''",$lngRecordNo1);

$lngRecordNo2=$_POST["War_Declared_By_User"];
$lngRecordNo2=str_replace("'","''",$lngRecordNo1);

$lngRecordNo3=$_POST["War_Declared_On_User"];
$lngRecordNo3=str_replace("'","''",$lngRecordNo1);

// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID = '".$lngRecordNo1."'  ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);

if (strtoupper($_POST["War_Declared_By_User"])!=strtoupper($rsUser["U_ID"]) && strtoupper($_POST["War_Declared_On_User"])!=strtoupper($rsUser["U_ID"]))
{

  $denyreason_session="You are attempting to declare war with a nation that does not belong to you. You have been logged for cheating.";
  header("Location: "."activity_denied.asp");
} 


if ((!$rsGuestbook["Strength"]>=$rsGuestbook0["Strength"]*5) && (!$rsGuestbook["Strength"]<=$rsGuestbook0["Strength"]*2))
{

  if ($rsGuestbook["Strength"]<30000 && $rsGuestbook0["Strength"]<30000)
  {

    $denyreason_session="You are attempting to declare war with a nation outside your strength range.";
    header("Location: "."activity_denied.asp");
  } 

} 


if ($rsGuestbook["Nation_Peace"]=1$then;
$denyreason_session=="That nation is a peaceful nation. Please do not attempt to cheat.")
{
  header("Location: "."activity_denied.asp");} 

	
	If (InStr(Request.Form("War_Reason"),"%") > 0) Then
	Session ("denyreason") = "Do not use invalid characters in in your war reason."
	Response.Redirect "activity_denied.asp"
	end if

	if Request.Form("War_Reason") = "Please Select A Reason For War" then
	Session ("denyreason") = "Please select a reason for war."
	Response.Redirect "activity_denied.asp"
	end if

Dim rsSent
Dim rsSentSQL
Set rsSent= Server.CreateObject("ADODB.Recordset") 
rsSentSQL = "SELECT COUNT(*) AS WARCOUNT FROM WAR  WHERE (War_Declared_By_User = '" & lngRecordNo2 & "' AND War_Declared_On_User = '" & lngRecordNo3 & "' ) OR (War_Declared_By_User = '" & lngRecordNo3 & "' AND War_Declared_On_User = '" & lngRecordNo2 & "' ) AND WAR.Nation_Deleted = 0 AND (WAR.Receiving_Nation_Peace + WAR.Declaring_Nation_Peace <> 2) AND War_End_Date > date() - 7"
rsSent.CursorType = 0
rsSent.CursorLocation = 2
rsSent.LockType = 3
rsSent.Open rsSentSQL,objConn
rsSent_numRows = 0
dim warcounter
warcounter = rsSent("WARCOUNT")
	if warcounter <> 0 then
	Session ("denyreason") = "You are already at war with that nation."
	Response.Redirect "activity_denied.asp"
	end if
rsSent.Close
Set rsSent = Nothing
%>
<? if ()
{


  $lngRecordNo=$_POST["Declaring_Nation_ID"];
  $lngRecordNo=str_replace("'","''",$lngRecordNo);
  $lngRecordNo2=$_POST["Receiving_Nation_ID"];
  $lngRecordNo2=str_replace("'","''",$lngRecordNo2);


// $rsSent3 is of type "ADODB.Recordset"

    echo $MM_conn_STRING_Trade;
    echo "SELECT * FROM Trade WHERE (Receiving_Nation_ID= '".$lngRecordNo."' AND Declaring_Nation_ID='".$lngRecordNo2."') OR (Receiving_Nation_ID= '".$lngRecordNo2."' AND Declaring_Nation_ID='".$lngRecordNo."')";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();


  while((!($rsSent3==0)) && (!($rsSent3_BOF==1)))
  {


    //Trade_Cancled") = 2    

    $rsSent3=mysql_fetch_array($rsSent3_query);
    $rsSent3_BOF=0;

  } 
?>
<? 
  $lngRecordNo=$_POST["Declaring_Nation_ID"];
// $rsAddComments is of type "ADODB.Recordset"

  $rsAddCommentsSQL="SELECT * FROM War;";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsAddCommentsSQL);
  $rsAddComments_numRows=0;


//Tell the recordset we are adding a new record to it

  

//Add a new record to the recordset

  //Declaring_Nation") = Request.Form("Declaring_Nation")  //Declaring_Nation_ID") = Request.Form("Declaring_Nation_ID")  //War_Declared_By_User") = Request.Form("War_Declared_By_User")  if ($_POST["War_Reason"]!="" && !!isset($_POST["War_Reason"]))
  {

    //War_Reason") = Server.HTMLEncode(Replace(Request.Form("War_Reason"), "'", "''"))   }
    else
  {

    //War_Reason") = "A general dispute"  } 

  //Declaring_Team") = Request.Form("Declaring_Team")

  //Receiving_Nation") = rsGuestbook("Nation_Name")  //Receiving_Nation_ID") = rsGuestbook("Nation_ID")  //War_Declared_On_User") = rsGuestbook("Poster")  //Receiving_Team") = rsGuestbook("Nation_Team")


//Write the updated recordset to the database

  

//Reset server objects

  
  $rsAddComments=null;









// Send a message to the sender reminding them of the aid agreement

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

  //U_ID") = rsGuestbook("Poster")  //MESS_FROM") =  Request.Form("War_Declared_By_User")   //MESSAGE") = "War has been declared on you by "& Request.Form("War_Declared_By_User") &" for the reason of "& Request.Form("War_Reason") &"! You may access your <a href='nation_war_information.asp'>War & Battles</a> screen to view and manage this war."  //SUBJECT") = "War Declared!"  //MESS_READ") = "False"
  

  
  $rsAddComments=null;

  $adoCon=null;














$objConn->Close;
  $objConn=null;

?>

<? 
//Redirect to the guestbook.asp page

  header("Location: "."nation_war_information.asp?Nation_ID=".$lngRecordNo);
?>} 

