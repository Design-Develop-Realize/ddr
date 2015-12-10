<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<html>
<head>
<title>Cyber Nations, an online nation simulation game</title>
<META NAME="Description" CONTENT="Cyber Nation is a free online nation simulation game build around Google Maps that allows you to create your nation anywhere in the world, decide how you will rule your people, and build your empire by purchasing infrastructure, land, military.">
<META NAME="Keywords" CONTENT="government simulators, geo-political simulators, political simulators, google map game, nation simulator, political simulator, country game, build a nation, nation building game, nation creation, internet game, free internet games, online games, multiplayer games, interactive games, web games">
<META HTTP-EQUIV=Content-Type CONTENT="text/html; charset=iso-8859-1">
<META name="Copyright" content="Copyright © 2006 Cyber Nations. All Rights Reserved.">
<meta HTTP-EQUIV="reply-to" CONTENT="webmaster@cybernations.net">
<meta NAME="robots" CONTENT="index, follow">
<link href="css.css" rel="stylesheet" type="text/css">
<!--#include file="style_include.htm" -->
<!--#include file="login_secure_password.php"-->

<style fprolloverstyle>A:hover {color: #FF0000; font-weight: regular}</style>
<? 
//header begins

// *** Logout the current user.

$MM_Logout=$_SERVER["URL"]."?MM_Logoutnow=1";
if ((${"MM_Logoutnow"}=="1"))
{


  $MM_logoutRedirectPage="default.asp";
// redirect with URL parameters (remove the "MM_Logoutnow" query param).

  if (($MM_logoutRedirectPage==""))
  {
    $MM_logoutRedirectPage=$_SERVER["URL"];
  } 
  if (((strpos(1,$UC_redirectPage,"?",$vbTextCompare) ? strpos(1,$UC_redirectPage,"?",$vbTextCompare)+1 : 0)==0 && $_GET!=""))
  {

    $MM_newQS="?";
foreach ($_GET as $Item)
    {

      if (($Item!="MM_Logoutnow"))
      {

        if ((strlen($MM_newQS)>1))
        {
          $MM_newQS=$MM_newQS."&";
        } 
        $MM_newQS=$MM_newQS.$Item."=".rawurlencode($_GET[$Item]);
      } 

    }     if ((strlen($MM_newQS)>1))
    {
      $MM_logoutRedirectPage=$MM_logoutRedirectPage.$MM_newQS;
    } 
  } 

  header("Location: ".$MM_logoutRedirectPage);
} 

?> <? 
ob_start();
$On$Error$Resume$Next;
// *** Validate request to log in to this site.

$MM_LoginAction=$_SERVER["URL"];
if ($_GET!="")
{
  $MM_LoginAction=$MM_LoginAction+"?"+$_GET;
} 
$MM_valUsername=$_POST["Username"];

if (strlen($_POST["Username"])>40 || strlen($_POST["Password"])>40)
{


  $denyreason_session="An unexpected error has occured with your login attempt.";
  header("Location: "."activity_denied.asp");
} 



$connectionlimit=5000;
//if hour(now()) = 23 AND minute(now()) > 40 then connectionlimit = 3000 end if

//if hour(now()) = 23 AND minute(now()) > 50 then connectionlimit = 2500 end if

if (strftime("%H",(strftime("%m/%d/%Y %H:%M:%S %p")()))==0 && strftime("%M",(strftime("%m/%d/%Y %H:%M:%S %p")()))<=30)
{
  $connectionlimit=3500;
}
;
} 
//if hour(now()) = 0 AND minute(now()) > 30 then connectionlimit = 2500 end if

//if hour(now()) = 0 AND minute(now()) > 45 then connectionlimit = 3000 end if




if ($MM_valUsername!="")
{




  if ($loginattempt_session>2)
  {

?>          
	<!-- #include file="CAPTCHA/CAPTCHA_process_form.php" -->          
	<? 

    if (!$blnCAPTCHAcodeCorrect)
    {

      $denyreason_session="You did not enter the validation code correctly.";
      header("Location: "."activity_denied.asp");
    } 

  } 


  if ($Application["ActiveUsers"]>$connectionlimit && strtoupper($_POST["Username"])!=strtoupper("ADMIN"))
  {


    header("Location: "."http://busy.cybernations.net/");
  } 


  if ($_POST["Password"]!="")
  {

    $sDigest=sha256($_POST["Password"]);
  } 


  $MM_fldUserAuthorization="";
  $MM_redirectLoginSuccess=$MM_LoginAction;
  $MM_redirectLoginFailed="failed.asp";
  $MM_flag="ADODB.Recordset";
// $MM_rsUser is of type MM_flag

$MM_rsUser->ActiveConnection=$MM_conn_STRING;
$MM_rsUser->Source="SELECT U_Email,BANNED,U_ID,U_PASSWORD,Last_Login,Last_IP,U_Password_Secure";
  if ($MM_fldUserAuthorization!="")
  {
$MM_rsUser->Source=$MM_rsUser->Source.",".$MM_fldUserAuthorization;
  } 
$MM_rsUser->Source=$MM_rsUser->Source." FROM USERS WHERE U_ID='".str_replace("'","''",$MM_valUsername)."' AND U_PASSWORD_Secure='".$sDigest."'  ";
$MM_rsUser->CursorType=0;
$MM_rsUser->CursorLocation=2;
$MM_rsUser->LockType=3;
$MM_rsUser->Open;

  if ($MM_rsUser->EOF && $MM_rsUser->BOF)
  {

// username and password do not match

// $rsLoginFailed is of type "ADODB.Recordset"

        echo $MM_conn_STRING;
        echo "SELECT Login_Date,Login_Attempts,Login_IPADDRESS FROM Users WHERE U_ID='".str_replace("'","''",$MM_valUsername)."' ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
    if (!($rsLoginFailed_BOF==1) && !($rsLoginFailed==0))
    {

      if (!isset($rsLoginFailed["Login_Date"]) || $rsLoginFailed["Login_Date"]!=time()())
      {

$rsLoginFailed["Login_Date"]=time()();
        $rsLoginFailed["Login_Attempts"]=1;
        $rsLoginFailed["Login_IPADDRESS"]=$_SERVER["remote_addr"];
              }
        else
      {

$rsLoginFailed["Login_Attempts"]=$rsLoginFailed["Login_Attempts"]+1;
        $rsLoginFailed["Login_IPADDRESS"]=$_SERVER["remote_addr"];
              } 

      
    } 

  } 



  if (!$MM_rsUser->EOF || !$MM_rsUser->BOF)
  {

// username and password match - this is a valid user


    if ($MM_rsUser["BANNED"]==1)
    {

      header("Location: "."banned.asp");
    } 


    if ($MM_rsUser["BANNED"]==3)
    {

      $denyreason_session="You have been removed from the game by administration until you contact them with more information about your recent suspicious activities in the game. Please contact administration at webmaster@cybernations.net.";
      header("Location: "."activity_denied.asp");
    } 


    $Remove["loginattempt"];
    $MM_Username_session=$MM_valUsername;
    $MM_rsUser["Last_Login"]=strftime("%m/%d/%Y %H:%M:%S %p")();
    $MM_rsUser["U_Password"]="";
    $MM_rsUser["Last_IP"]=$_SERVER["remote_addr"];
$MM_rsUser->Update;

    if (($MM_fldUserAuthorization!=""))
    {

//Session("MM_UserAuthorization") = CStr(MM_rsUser.Fields.Item(MM_fldUserAuthorization).Value)

    }
      else
    {

//Session("MM_UserAuthorization") = ""

    } 

    if ($_GET["accessdenied"]!="" && true)
    {

      $MM_redirectLoginSuccess=htmlspecialchars($_GET["accessdenied"]);
    } 

$MM_rsUser->Close;

    header("Location: ".$MM_redirectLoginSuccess);
  } 

$MM_rsUser->Close;
  $MM_rsUser=null;


  header("Location: ".$MM_redirectLoginFailed);
} 

?><? 
$rsUser__MMColParam="xalsp";
if (($MM_Username_session!=""))
{
  $rsUser__MMColParam=$MM_Username_session;
} ?>
<? 
// $rsUser is of type "ADODB.Recordset"

$rsUserSQL="SELECT U_PASSWORD_Last,U_Password_Date,U_Password_Secure,Site_Ads_Date,Site_Ads,Color_Blind,U_ID,Activity,Last_Activity,Banned,U_Password,IPADDRESS,Last_IP,Conditions,U_EMAIL,Temp_Email,Temp_Email_Code FROM USERS WHERE U_ID = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUserSQL);



// Miscellanous stuff

$RecordCounter=0;
$Repeat8__numRows=40;
$Repeat8__index=0;



if (!($rsUser_BOF==1) && !($rsUser==0))
{

// $rsGuestbookHead is of type "ADODB.Recordset"

  $rsGuestbookHeadSQL="SELECT Strength,Nation_ID,Nation_Team,Poster FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsGuestbookHeadSQL);

// Count the number of unread messages

  $rsMessages__MMColParam="1";
  if ((${"MM_EmptyValue"}!=""))
  {

    $rsMessages__MMColParam=${"MM_EmptyValue"};
  } 

// $rsUMESSAGES is of type "ADODB.Recordset"

    echo $MM_conn_STRING_Messages;
    echo "SELECT COUNT(ID) AS UTOTAL FROM EMessages WHERE MESS_DATE > getdate()-7 AND U_ID = '"+str_replace("'","''",$rsUser__MMColParam)+"' and MESS_READ <> "+str_replace("'","''",$rsMessages__MMColParam)+"";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $unreadmessages=$rsUMESSAGES["UTOTAL"];
  
  $rsUMESSAGES=null;

} 

?>
</head>
<body text="#000000" bgcolor="#FFFFFF" topmargin="0">
<div align="center">
<table cellSpacing="0" cellPadding="4" border="0" id="table1" width="760">
<tr>
<td vAlign="top" align="middle">
<table border="0" width="100%" id="table25" cellspacing="0" bordercolor="#000080" cellpadding="0">
<tr>
<td width="2%" valign="top">&nbsp;</td>
<td width="70%">
<a href="default.php">
<img border="0" src="images/cn_logo.png" width="468" height="75"></a></td>
<td align="right">
<table border="0" width="100%" id="table51" cellspacing="0" cellpadding="3">
<tr>
<td align="right">
<a href="offer_donation.php">
<img border="0" src="images/offer_donation_button.gif" width="112" height="26"></a></td>
</tr>
<tr>
<td align="right">
&nbsp;</td>
</tr>
</table>

<br>
<? echo strftime("%m/%d/%Y %H:%M:%S %p")(); ?></td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<div align="center">
<table border="0" cellpadding="0" style="border-collapse: collapse" bordercolor="#111111" height="406" width="760" id="table12">
<tr>
<td height="406" valign="top" align="center">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="table13">
<tr>
<td width="169" valign="top">
<? if (!($rsUser==0) && !($rsUser_BOF==1))
{
?> 
<? 
  $strFileName=$DOCUMENT_ROOT."moderation/assets/banned_ip.txt";
// $fso is of type "Scripting.FileSystemObject"

$file=fopen($strFileName,"r");
  $iLoc=0;
  $iLoc2=0;
  $inlist=0;
  if (!!isset($rsUser["IPADDRESS"]) && !!isset($rsUser["Last_IP"]))
  {

    while(!feof($file))
    {

      $Line=fgets($file);;
      $iLoc1=(strpos($Line,$rsUser["IPADDRESS"]) ? strpos($Line,$rsUser["IPADDRESS"])+1 : 0);
      $iLoc2=(strpos($Line,$rsUser["Last_IP"]) ? strpos($Line,$rsUser["Last_IP"])+1 : 0);
      if ($iLoc1!=0 || $iLoc2!=0)
      {

        header("Location: "."banned.asp");
      } 

    } 
  } 

?>

<? 
  if (!((strpos($_SERVER["Path_Info"],"login.asp") ? strpos($_SERVER["Path_Info"],"login.asp")+1 : 0)>0) && $rsUser["Conditions"]!=2)
  {

    header("Location: "."login.asp");
  } 

?>
<? 
//if not(Instr(Request.ServerVariables("Path_Info"), "activity_denied.asp") > 0) AND not(Instr(Request.ServerVariables("Path_Info"), "login.asp") > 0) AND not(Instr(Request.ServerVariables("Path_Info"), "myprofile.asp") > 0) then

//	if ISNULL(rsUser("U_Password_Date")) OR date() - rsUser("U_Password_Date") > 90 then 

//	response.redirect "login.asp"

//	end if

//end if

?>
<table border="2" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000080" id="table17" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#000080" height="18">
<p align="left"><font color="#FFFFFF"><b>&nbsp;:. My Menu</b></font></td>
</tr>
<tr>
<td align="center" width="151">
<table border="0" cellpadding="2" style="border-collapse: collapse" width="100%" id="table18">
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"><a href="default.php">Home </a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="about.php">About The Game</a></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top" bgcolor="#FFFFFF">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left" bgcolor="#FFFFFF">
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=423">
FAQ</a></td>
</tr>
<?   if (($rsGuestbookHead_BOF==1) && ($rsGuestbookHead==0))
  {
?>
<tr>
<td height="19" width="18" align="right" valign="top" bgcolor="#FFFFFF">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left" bgcolor="#FFFFFF">
<a href="nation_drill_display_sample.php">
Sample Nation</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top" bgcolor="#FFFFCC">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left" bgcolor="#FFFFCC"><a href="newNation.php">Create My Nation</a> </td>
</tr>
<?   } ?>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a target="_blank" href="http://www.cybernations.net/forums/">Forums</a></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td width="121" height="19" align="left">
<a href="inbox.php">
<?   if ($unreadmessages>0)
  {
?><font color="red"><?   } ?>
<font face="Verdana, Arial, Helvetica, sans-serif">My Inbox (<?   echo $unreadmessages; ?>)</font></a></td>
</tr>


<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<font face="Verdana, Arial, Helvetica, sans-serif">
<a title="View sent messages through the Cyber Nations internal e-mail system." href="outbox.php">
Sent Messages</a></font></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<font face="Verdana, Arial, Helvetica, sans-serif">
<a title="Enter your account area to make changes to your user information." href="myprofile.php">
My Profile</a></font></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"><font color="#333333">
<a title="Logout of your Cyber Nations account." href="<?   echo $MM_Logout; ?>">
<font face="Verdana, Arial, Helvetica, sans-serif">Logout</font>
</a></font>
</td>
</tr>
</table>
</td>
</tr>
</table>
<br>
<?   if (!($rsGuestbookHead_BOF==1) && !($rsGuestbookHead==0))
  {
?>
<table border="2" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000080" id="table28" bgcolor="#FFFFFF">
<tr>
<td align="center" width="151">
<table border="0" cellpadding="2" style="border-collapse: collapse" width="100%" id="table29">
<tr>
<td height="19" align="right" valign="top" bordercolor="#000080" bgcolor="#000080" colspan="2">
<p align="left"><font color="#FFFFFF"><b>:. Nation Menu</b></font></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="nation_drill_display.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">View My Nation
</a> </td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="allNations_display_ranking.php">Nation Rankings</a></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="nation_drill_display_map.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">My 
Nation Map</a></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="government_position.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">
My Government Position</a> </td>
</tr>

<?     if ($rsGuestbookHead["Nation_Team"]!="None")
    {
?>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="teams.php">Team Information Panel</a></td>
</tr>
<?     } ?>


<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">			
<a href="militarydeploy.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">Deploy Military </a></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"> <a href="nation_war_information.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">War 
&amp; Battles</a></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"> <a href="event_information.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">Events</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"> <a href="trade_information.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">Trade Agreements</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"> 
<a href="aid_information.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">
Foreign Aid</a></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"> <a href="nation_delete.php">Delete My Nation</a></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"> <a href="nation_edit.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">Edit My Nation</a></td>
</tr>
<tr>
<td height="19" align="right" valign="top" colspan="2" bgcolor="#000080">
<p align="left"><font color="#FFFFFF"><b>:. Nation Transactions</b></font></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"> 
<a href="collect_taxes.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">Collect Taxes</a> </td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"> 
<a href="pay_bills.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">Pay Bills</a> </td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="infrastructurebuysell.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">Infrastructure</a> 
</td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="improvements_purchase.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">Improvements</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="landbuysell.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">Land</a></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"> 
<a href="military_purchase.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">Military</a> </td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"> 
<a href="national_wonders_purchase.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">National Wonders</a> </td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="technology_purchase.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">Technology</a> 
</td>
</tr>

<tr>
<td height="19" align="right" valign="top" bordercolor="#000080" bgcolor="#000080" colspan="2">
<p align="left"><font color="#FFFFFF"><b>:. World Menu</b></font></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"><a href="allNations_display.php">Display All Nations</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"><a href="allNations_display_resource.php">Display 
All Nations Resources</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="all_aid_information.php">
Foreign Aid Offers Across the Globe</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="all_war_information.php">Wars Across the Globe</a></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="c_p.php">My Saved Nations</a></td>
</tr>

<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="stats.php">
World Statistics</a></td>
</tr>

</table>
</td>
</tr>
</table>
<?   } ?>
<br>
<? } 
// end Not rsUser.EOF Or NOT rsUser.BOF  
$EOF&($rsUser_BOF==1)$Then; ?> 
<table border="2" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000080" id="table32" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#000080" height="18">
<p align="left"><font color="#FFFFFF"><b>&nbsp;:. Get Started</b></font></td>
</tr>
<tr>
<td align="center" width="151">
<table border="0" cellpadding="2" style="border-collapse: collapse" width="100%" id="table33">
<tr>
<td height="19" width="18" align="right" valign="top">
<p align="right">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"><a href="default.php">Home</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top" bgcolor="#FFFFFF">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left" bgcolor="#FFFFFF">
<a href="about.php">About The Game</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top" bgcolor="#FFFFFF">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left" bgcolor="#FFFFFF">
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=423">
FAQ</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left"><a href="register.php">Register</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<? if ($_GET["validate"]==1)
{
?>
<a href="login.php?validate=1">Login</a>
<? }
  else
{
?>
<a href="login.php">Login</a>
<? } ?>
</td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a target="_blank" href="http://www.cybernations.net/forums/">Forums</a></td>
</tr>
</table>
</td>
</tr>
</table><br>
<? 
// $rsTop is of type "ADODB.Recordset"

$rsTopSQL="SELECT Top 5 * FROM Nation Order By Strength Desc";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsTopSQL);
?>
<table border="2" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000080" id="table56" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#000080" height="18">
<p align="left"><font color="#FFFFFF"><b>&nbsp;:. 
Top 5 Nations</b></font></td>
</tr>
<tr>
<td align="center" width="151">
<? while(!($rsTop==0))
{
?>
<table border="0" cellpadding="2" style="border-collapse: collapse" width="100%" id="table57">
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="nation_drill_display_guest.asp?Nation_ID=<?   echo $rsTop["Nation_ID"]; ?>&Extended=1">
<?   echo $rsTop["Nation_Name"]; ?></a>
</td>
</tr>
</table>
<? 
  $rsTop=mysql_fetch_array($rsTop_query);
  $rsTop_BOF=0;

} 

$rsTop=null;

?>

</td>
</tr>
</table><br>



<? ' end rsUser.EOF And rsUser.BOF %>
</p>
<table border="2" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000080" id="table49" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#000080" height="18">
<p align="left"><font color="#FFFFFF"><b>&nbsp;:. Other Stuff</b></font></td>
</tr>
<tr>
<td align="center" width="151">
<table border="0" cellpadding="2" style="border-collapse: collapse" width="100%" id="table50">
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a target="_blank" href="http://tournament.cybernations.net/">Cyber Nations 
Tournament Edition</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="links.php">Game Related Links</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="offer_donation.php">Donation Offer</a></td>
</tr>
<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a target="_blank" href="http://www.cybernations.net/shop">Cyber Nations 
Merchandise Store</a> </td>
</tr>


<tr>
<td height="19" width="18" align="right" valign="top">
<img border="0" src="http://cybernations.net/images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" align="left">
<a href="javascript:window.external.AddFavorite('http://www.cybernations.net', 'Cyber Nations, an online nation simulation game')">
Add To Favorites</a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td width="2%" valign="top" height="406">
<td width="76%" valign="top" height="406">
<table width="75%" border="0" cellpadding="0" cellspacing="0" id="table23">
<tr>
<td></td>
</tr>
</table>

<? if ()
{
  if (!((strpos($_SERVER["Path_Info"],"register.asp") ? strpos($_SERVER["Path_Info"],"register.asp")+1 : 0)>0) && 
     !((strpos($_SERVER["Path_Info"],"default.asp") ? strpos($_SERVER["Path_Info"],"default.asp")+1 : 0)>0) && 
     !((strpos($_SERVER["Path_Info"],"login.asp") ? strpos($_SERVER["Path_Info"],"login.asp")+1 : 0)>0) && 
     !((strpos($_SERVER["Path_Info"],"register.asp") ? strpos($_SERVER["Path_Info"],"register.asp")+1 : 0)>0) && 
     !((strpos($_SERVER["Path_Info"],"newNation.asp") ? strpos($_SERVER["Path_Info"],"newNation.asp")+1 : 0)>0) && 
     !((strpos($_SERVER["Path_Info"],"about.asp") ? strpos($_SERVER["Path_Info"],"about.asp")+1 : 0)>0) && 
     !((strpos($_SERVER["Path_Info"],"offer_donation.asp") ? strpos($_SERVER["Path_Info"],"offer_donation.asp")+1 : 0)>0) && 
     !((strpos($_SERVER["Path_Info"],"offer_link.asp") ? strpos($_SERVER["Path_Info"],"offer_link.asp")+1 : 0)>0) && 
     !((strpos($_SERVER["Path_Info"],"links.asp") ? strpos($_SERVER["Path_Info"],"links.asp")+1 : 0)>0) && 
     !((strpos($_SERVER["Path_Info"],"validate.asp") ? strpos($_SERVER["Path_Info"],"validate.asp")+1 : 0)>0))
  {

    $HeaderOK=true;
  }
    else
  {

    $HeaderOK=false;
  } 
} 


if ($rsUser["Site_Ads"]="0"$then$HeaderOK=false;
}
;
)
{
  if ($HeaderOK==true)
  {

?>
<table border="0" width="100%" id="table54" cellspacing="0" cellpadding="3" height="23">
	<tr>
		<td bgcolor="#FFFFFF" align="center">
		
		
<script type="text/javascript"><!--
google_ad_client = "pub-9338475562447655";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text_image";
//2006-11-11: Cyber Nations
google_ad_channel = "6616297596";
google_color_border = "FFFFFF";
google_color_bg = "FFFFFF";
google_color_link = "0000FF";
google_color_text = "000000";
google_color_url = "008000";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
		
		
		
		</td>

	</tr>
	<tr>
	</tr>
</table>
<?   } } ?>
