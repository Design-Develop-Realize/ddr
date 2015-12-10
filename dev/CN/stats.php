<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_UserName_session");
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

<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td bgcolor="#000080">





		<font color="#FFFFFF"><b>:. Cyber Nations Statistics Screens</b></font></td>
	</tr>
	<tr>
		<td>





		<table border="0" width="100%" id="table2" cellspacing="0" cellpadding="2">
			<tr>
<td height="19" colspan="2">
Please click on a link below to access the 
statistics screen of your choice.</td>
			</tr>
			<tr>
<td height="19" width="3%">
&nbsp;</td>
<td height="19" width="96%">
&nbsp;</td>
			</tr>
			<tr>
<td height="19" width="3%">
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" width="96%">
<a href="stats_ranking_nuclear.php">Nation Rankings</a> - Various nation ranking 
categories.</td>
			</tr>
			<tr>
<td height="19" width="3%">
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" width="96%">
<a href="stats_news.php">Nuclear News Reports</a> - Recent nuclear attacks and nuclear purchases.</td>
			</tr>
			<tr>
<td height="19" width="3%">
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" width="96%">
<a href="all_sanctions_view.php">World Sanctions List</a> - A listing of all 
sanctions placed by team senators in the game.</td>
			</tr>
			<tr>
<td height="19" width="3%">
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" width="96%">
<a href="stats_demographics.php">World Demographics</a> - Cyber Nations world 
statistics and demographics.</td>
			</tr>
			<tr>
<td height="19" width="3%">
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" width="96%">
<a href="stats_team_stats.php">Team Statistics</a> - A breakdown of the  
teams within the game.</td>
			</tr>
		
			<tr>
<td height="19" width="3%">
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" width="96%">
<a href="stats_alliance_stats.php">Alliance Statistics</a> - A breakdown of the 
sanctioned alliances within the game.</td>
			</tr>
		
			<tr>
<td height="19" width="3%">
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" width="96%">
<a href="stats_alliance_stats_custom.php">Real Time Alliance Statistics</a> - 
Retrieve real time alliance statistics for any alliance.</td>
			</tr>
		

<? if ($MM_UserName_session!="")
{
?>			
			<tr>
<td height="19" width="3%">
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
<td height="19" width="96%">
<a href="allNations_display_ranking.php">My Nation Ranking</a> - View your own nation ranking.</td>
			</tr>
<? } ?>			
			<tr>
				<td>
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
				<td width="96%"><a href="stats_awards.php">Cyber Nations Awards</a> 
				- Player awards.</td>
			</tr>
			<tr>
				<td>
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
				<td width="96%"><a href="stats_buildings.php">Improvements</a> 
				- What other nations are purchasing around the world.</td>
			</tr>
			<tr>
				<td>
<img border="0" src="images/ico_arr_gray.gif" width="11" height="11"></td>
				<td width="96%"><a href="stats_wonders.php">National Wonders</a> 
				- What national wonders other nations are developing around the world.</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td width="96%">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td width="96%">&nbsp;</td>
			</tr>
		</table>

		</td>
	</tr>
</table>
<!--#include file="inc_footer.php" -->
<? 
$objConn->Close();
$objConn=null;

?>
