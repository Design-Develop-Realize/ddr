<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
?>
<!--#include file="connection.php" -->

<? 
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

?>

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
<!--#include file="election_code.php" -->
<? 
$lngRecordNo=intval($_GET["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT POSTER,Nation_Team FROM Nation WHERE Nation_ID='".$rsGuestbookHead["Nation_ID"]."' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
$rsGuestbook_numRows=0;

$nationteam=$rsGuestbook["Nation_Team"];
?>  




<? if ($rsSent10["Votes"]==0)
{
?>
<br>&nbsp;<p align="center"><font color="#FF0000">There have been 0 votes cast 
	<?   if ($rsGuestbook["Nation_Team"]="None"$then; )
  {

    $because$you$are$currently$not$a$member$of$a$team->
<$%else; ?>
	for the <?     echo $rsGuestbook["Nation_Team"]; ?> Team senate positions.</font>
	<?   } ?>
</center>
<br>
<? }
  else
{
?>

<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td width="99%" bgcolor="#000080" colspan="3">
		<table border="0" width="100%" id="table2" cellspacing="0" cellpadding="0">
			<tr>
				<td><font color="#FFFFFF"><b>
		:. Current <?   echo $rsGuestbook["Nation_Team"]; ?> Team Senate Positions</b></font></td>
				<td>
				<p align="right"><font color="#FFFFFF"><b>
				<a href="elect_senators.asp?Nation_ID=<?   echo $rsGuestbookHead["Nation_ID"]; ?>"><font color="#FFFFFF">Vote Now!</font></a></b></font></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td width="99%" bgcolor="#FFFFFF" colspan="3">The top three 
		senate positions will hold a position of great prestige within your 
		team. They will command authority within the <?   echo $rsGuestbook["Nation_Team"]; ?> 
		Team and give its member nations direction. The top three senate 
		positions of each team will 
also be responsible for managing <a href="sanctions_view.php">trade and foreign aid sanctions</a> 
		and managing <a href="team_messages_information.php">team messages</a>. Senate elections reset every 30 days. The next 
		senate election reset is scheduled for 
<? 
// $rsVotes is of type "ADODB.Recordset"

  $rsVotesSQL="SELECT Last_Reset FROM Election_Table";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsVotesSQL);
  print $rsVotes["Last_Reset"]+30;
  
  $rsVotes=null;

?>.



</td>
	</tr>
	<tr>
		<td width="33%" bgcolor="#000080"><font color="#FFFFFF"><b>Ruler 
		Name</b></font></td>
		<td bgcolor="#000080" width="33%" align="center">
		<p align="left"><font color="#FFFFFF"><b>Nation Name</b></font></td>
		<td bgcolor="#000080" width="33%" align="center">
		<p align="left"><font color="#FFFFFF">
		<b>Vote Statistics</b></font></td>
	</tr>
	
<? 

// $rsSent10 is of type "ADODB.Recordset"

  $rsSent10SQL="SELECT Top 20 Poster,Votes,Nation_Name,Nation_ID,Nation_Team FROM Nation where Nation_Team = '"+$rsGuestbookHead["Nation_Team"]+"'  Order By Votes desc";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSent10SQL);


  while((!($rsSent10==0)))
  {

    $counter=$counter+1;
?>



<tr>
<td width="33%" valign="top">
<?     if ($counter<4)
    {
?><b><?     } ?>
<?     if ($counter>=4)
    {
?><i><?     } ?>
<?     echo $counter; ?>) <?     echo $rsSent10["Poster"]; ?></td>
<td width="33%" valign="top">
<?     if ($counter<4)
    {
?><b><?     } ?>
<?     if ($counter>=4)
    {
?><i><?     } ?>
<a href="nation_drill_display.asp?Nation_ID=<?     echo $rsSent10["Nation_ID"]; ?>"><?     echo $rsSent10["Nation_Name"]; ?></a></td>
<td width="33%" valign="top">
<?     if ($counter<4)
    {
?><b><?     } ?>
<?     if ($counter>=4)
    {
?><i><?     } ?>
<?     echo $rsSent10["Votes"]; ?> Votes <?     if ($counter>=4)
    {
?>(runner up #<?       echo $counter-3; ?>)<?     } ?>
</td>
</tr>
	
	<? 
    $rsSent10=mysql_fetch_array($rsSent10_query);
    $rsSent10_BOF=0;

  } 
  
?>
	
	</table>
</p>
<p align="center">
<br>
</p><p align="center">
<br>
</p>
<!--#include file="search_include.php" -->
</body>
<? } ?>
</html>
<!--#include file="inc_footer.php" -->
<? 
//Reset server objects



$rsSent10=null;

$rsSent20->Close;
$rsSent20=null;

$rsSent30->Close;
$rsSent30=null;


$rsGuestbook=null;

$objConn->Close;
$objConn=null;

?>
