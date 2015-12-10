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


<? if ($rsGuestbookHead["Nation_Team"]=="None")
{
?>
You are not part of a team and do not have access to this screen at this time.
<? }
  else
{
?>

<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td bgcolor="#000080">
		<font color="#FFFFFF"><b>:. <?   echo $rsGuestbookHead["Nation_Team"]; ?> Team Information 
		Panel</b></font></td>
	</tr>
	<tr>
		<td>
		<div align="center">
		<table border="0" id="table2" cellspacing="0" cellpadding="6" width="100%">
			<tr>
<td height="19" width="22%" align="center" valign="bottom">
<a href="elect_senators.asp?Nation_ID=<?   echo $rsGuestbookHead["Nation_ID"]; ?>">
<img border="0" src="images/teams.6.jpg"></a></td>
<td height="19" width="75%" align="center">
<p align="left">
<a href="elect_senators.asp?Nation_ID=<?   echo $rsGuestbookHead["Nation_ID"]; ?>">Vote 
For Team Senators</a> - A number of nation leaders within the <?   echo $rsGuestbookHead["Nation_Team"]; ?>
Team are vying for position and power. They have called upon you to cast your 
vote in the <?   echo $rsGuestbookHead["Nation_Team"]; ?> Team senate. </td>
			</tr>
			<tr>
<td height="19" width="22%" align="center" valign="bottom">
<a href="elect_senators_results.asp?Nation_ID=<?   echo $rsGuestbookHead["Nation_ID"]; ?>">
<img border="0" src="images/Image7.jpg" width="100" height="76"></a></td>
<td height="19" width="75%" align="left">
<a href="elect_senators_results.asp?Nation_ID=<?   echo $rsGuestbookHead["Nation_ID"]; ?>">
Senate Election Results</a> - The top three 
		senate positions hold a position of great prestige within the <?   echo $rsGuestbookHead["Nation_Team"]; ?> 
Team. They will command authority within the <?   echo $rsGuestbook["Nation_Team"]; ?> 
		Team and give its member nations direction.</td>
			</tr>
			<tr>
<td height="19" width="22%" align="center" valign="bottom">
<a href="team_messages_information.php">
<img border="0" src="images/teams.3.gif"></a></td>
<td height="19" width="75%" align="left">
<a href="team_messages_information.php"><?   echo $rsGuestbookHead["Nation_Team"]; ?> Team Messages</a> - Messages are 
delivered by the top three team senators to provide all team members information 
and direction.</td>
			</tr>
			<tr>
<td height="19" width="22%" align="center" valign="bottom">
<a href="sanctions_view.php">
<img border="0" src="images/teams.7.gif">
</a>
</td>
<td height="19" width="75%" align="left">
<a href="sanctions_view.php"><?   echo $rsGuestbookHead["Nation_Team"]; ?> Team Sanctions</a> - Sanctions can be placed 
against trade agreements, foreign aid offers, or both and are managed by the top 
three elected officials of the <?   echo $rsGuestbookHead["Nation_Team"]; ?> Team. Trade sanctions prevent any member of the 
<?   echo $rsGuestbookHead["Nation_Team"]; ?> Team from trading with the sanctioned nation. </td>
			</tr>
			

			<tr>
<td height="19" width="22%" align="center" valign="bottom">
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showforum=14">
<img border="0" src="images/teams.8.jpg"></a></td>
<td height="19" width="75%" align="left">
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showforum=14">
Team Forums</a> - Community forums for inter-team trading and other discussions.<span class="desc"><br>
&nbsp;</span></td>
			</tr>
						

		</table>
		</div>
		</td>
	</tr>
</table>

<? } ?>
<!--#include file="inc_footer.php" -->
<? 
$objConn->Close();
$objConn=null;

?>
