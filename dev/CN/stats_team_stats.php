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

<? 
// $rsStats is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "Select * from Stats_Teams Order By Strength DESC";
echo 2;
echo 3;
$rs=mysql_query();
?>

<!--#include file="inc_header.php" -->
  

<table border="0" width="100%" id="table4" cellspacing="0" cellpadding="0">
	<tr>
		<td valign="top" width="100%">
<table border="1" width="100%" id="table5" cellspacing="0" cellpadding="4" bordercolor="#000080" height="89">
<tr>
<td width="110%" bgcolor="#000080" colspan="8"><font color="#FFFFFF"><b>:. 
Team Statistics - Last Updated on <? echo $rsStats["Last_Update"]; ?></b></font></td>
</tr>




<tr>
<td width="16%" bgcolor="#C0C0C0"><b>Team Name</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Total Nations</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Active Nations</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Percent Active</b></td>
<td width="14%" align="center" bgcolor="#C0C0C0"><b>Strength</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Avg. Strength</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Nukes</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Score</b></td>
</tr>




<? while(!($rsStats_BOF==1) && !($rsStats==0))
{
?>
<tr>
<td width="16%" height="29">
<?   if ($rsStats["Team_Name"]="No Team"$then; )
  {

//Color_Blind") <> 1 then?>  } 

//stats_ranking_teams.asp?Team=None">//0" src="images/teams/team_<%=rsStats("Team_Name")?>} $gif"$width="14"$height="13"$title="Team: <%=rsStats("$Team_Name"); ?>"></a> 
	<a href="stats_ranking_teams.php?Team=None"><? echo $rsStats["Team_Name"]; ?></a>
	<? }
  else
{
?>
	<a href="stats_ranking_teams.asp?Team=<? echo $rsStats["Team_Name"]; ?>"><? echo $rsStats["Team_Name"]; ?></a>
	<? >
<? 
