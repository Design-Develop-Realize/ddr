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
echo "Select * from Stats_Alliances Order By Score Desc";
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
Alliance Statistics - Last Updated on <? echo $rsStats["Last_Update"]; ?></b></font></td>
</tr>




<tr>
<td width="24%" bgcolor="#C0C0C0"><b>Alliance Name</b></td>
<td width="11%" align="center" bgcolor="#C0C0C0"><b>Total Nations</b></td>
<td width="11%" align="center" bgcolor="#C0C0C0"><b>Active Nations</b></td>
<td width="14%" align="center" bgcolor="#C0C0C0"><b>Percent Active</b></td>
<td width="12%" align="center" bgcolor="#C0C0C0"><b>Strength</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Avg. Strength</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Nukes</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Score</b></td>
</tr>




<? while(!($rsStats_BOF==1) && !($rsStats==0))
{
?>
<tr>
<td width="24%" height="29">
<a href="stats_ranking_alliances.asp?Alliance=<?   echo $rsStats["Team_Name"]; ?>"><?   echo $rsStats["Team_Name"]; ?></a>
</td>
<td width="11%" align="center" height="29">
<?   echo $FormatNumber[$rsStats["Total_Nations"]][0]; ?>
</td>
<td width="11%" align="center" height="29">
<?   echo $FormatNumber[$rsStats["Active_Nations"]][0]; ?>
</td>
<td width="14%" align="center" height="29">
<?   echo $rsStats["Percent_Active"]; ?>%
</td>
<td width="12%" align="center" height="29">
<?   echo $FormatNumber[$rsStats["Strength"]][0]; ?>
</td>
<td width="14%" align="center" height="29">
<?   echo $FormatNumber[$rsStats["Avg_Strength"]][0]; ?>
</td>
<td width="16%" align="center" height="29">
<?   echo $FormatNumber[$rsStats["Nukes"]][0]; ?>
</td>
<td width="16%" align="center" height="29">
<?   echo $FormatNumber[$rsStats["Score"]][2]; ?>
</td>
</tr>
<? 
  $rsStats=mysql_fetch_array($rsStats_query);
  $rsStats_BOF=0;

} 
?>



</table>
		</td>
	</tr>
	</table>
<p align="center">
<b>
<img border="0" src="images/information.gif" width="17" height="16"> 
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=26">
Alliance Information</a> | <a href="stats.php">Main World Statistics Screen</a></b></p>
<!--#include file="inc_footer.php" -->


<? 

$rsStats=null;


$objConn->Close();
$objConn=null;

?>
