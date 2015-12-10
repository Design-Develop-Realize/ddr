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
  

<body topmargin="0">


<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td valign="top" width="50%" bgcolor="#000080"><font color="#FFFFFF"><b>
		:. Cyber Nations Awards</b></font></td>
	</tr>
	
	<tr>
		<td valign="top" width="50%"></p><p><b>
		<br>
		Most Active User</b><p>


<? 
// $rsActivity is of type "ADODB.Recordset"

$rsActivitySQL="SELECT Top 5 U_ID,Activity From Users Where U_ID <> 'markskd' Order By Activity DESC ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsActivitySQL);
$rsActivity_numRows=0;
?>
<? 
while((!($rsActivity==0)))
{

  $counter=$counter+1;
?>
<?   echo $counter; ?>) <?   echo $rsActivity["U_ID"]; ?> - <?   echo $rsActivity["Activity"]; ?> Transactions<br>
<br>
<? 
  $rsActivity=mysql_fetch_array($rsActivity_query);
  $rsActivity_BOF=0;

} 
?>





<b>Oldest Nation</b><p>
<? 
// $rsOldest is of type "ADODB.Recordset"

$rsOldestSQL="SELECT Top 5 Nation_Name,Nation_Team,Poster,Nation_Dated From Nation Order By Nation_Dated ASC ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsOldestSQL);
$rsOldest_numRows=0;
?>
<? 
$counter=0;
while((!($rsOldest==0)))
{

  $counter=$counter+1;
?>
<?   echo $counter; ?>) <?   echo $rsOldest["Nation_Dated"]; ?> (<?   echo time()()-$rsOldest["Nation_Dated"]; ?> Days) - <?   echo $rsOldest["Poster"]; ?> of <?   echo $rsOldest["Nation_Name"]; ?> nation - <font color="<?   echo $rsOldest["Nation_Team"]; ?>"><?   echo $rsOldest["Nation_Team"]; ?> Team</font><br>
<br>
<? 
  $rsOldest=mysql_fetch_array($rsOldest_query);
  $rsOldest_BOF=0;

} 
?>


<b>Most Popular Player/Nation</b><p>
<? 
// $rsPrinceps is of type "ADODB.Recordset"

$rsPrincepsSQL="SELECT Top 5 Nation_Name,Nation_Team,Poster,Votes From Nation Order By Votes DESC ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsPrincepsSQL);
$rsPrinceps_numRows=0;
?>
<? 
$counter=0;
while((!($rsPrinceps==0)))
{

  $counter=$counter+1;
?>
<?   echo $counter; ?>) <?   echo $rsPrinceps["Votes"]; ?> Senate Votes - <?   echo $rsPrinceps["Poster"]; ?> of <?   echo $rsPrinceps["Nation_Name"]; ?> nation - <font color="<?   echo $rsPrinceps["Nation_Team"]; ?>"><?   echo $rsPrinceps["Nation_Team"]; ?> Team</font> <br>
<br>
<? 
  $rsPrinceps=mysql_fetch_array($rsPrinceps_query);
  $rsPrinceps_BOF=0;

} 
?>



<b>Most Attacking Casualties</b><p>
<? 
// $rsCasualties is of type "ADODB.Recordset"

$rsCasualtiesSQL="SELECT Top 5 Nation_Name,Nation_Team,Poster,Military_Attacking_Casualties From Nation Order By Military_Attacking_Casualties DESC ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsCasualtiesSQL);
$rsCasualties_numRows=0;
?>
<? 
$counter=0;
while((!($rsCasualties==0)))
{

  $counter=$counter+1;
?>
<?   echo $counter; ?>) <?   echo $rsCasualties["Military_Attacking_Casualties"]; ?> Soldiers Lost - <?   echo $rsCasualties["Poster"]; ?> of <?   echo $rsCasualties["Nation_Name"]; ?> nation - <font color="<?   echo $rsCasualties["Nation_Team"]; ?>"><?   echo $rsCasualties["Nation_Team"]; ?> Team</font> <br>
<br>
<? 
  $rsCasualties=mysql_fetch_array($rsCasualties_query);
  $rsCasualties_BOF=0;

} 
?>



<b>Most Defending Casualties</b><p>
<? 
// $rsCasualtiesD is of type "ADODB.Recordset"

$rsCasualtiesDSQL="SELECT Top 5 Nation_Name,Nation_Team,Poster,Military_Defending_Casualties From Nation Order By Military_Defending_Casualties DESC ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsCasualtiesDSQL);
$rsCasualtiesD_numRows=0;
?>
<? 
$counter=0;
while((!($rsCasualtiesD==0)))
{

  $counter=$counter+1;
?>
<?   echo $counter; ?>) <?   echo $rsCasualtiesD["Military_Defending_Casualties"]; ?> Soldiers Lost - <?   echo $rsCasualtiesD["Poster"]; ?> of <?   echo $rsCasualtiesD["Nation_Name"]; ?> nation - <font color="<?   echo $rsCasualtiesD["Nation_Team"]; ?>"><?   echo $rsCasualtiesD["Nation_Team"]; ?> Team</font> <br>
<br>
<? 
  $rsCasualtiesD=mysql_fetch_array($rsCasualtiesD_query);
  $rsCasualtiesD_BOF=0;

} 
?>

<b>Most Money Earned</b><p>
<? 
// $rsMoney is of type "ADODB.Recordset"

$rsMoneySQL="SELECT Top 5 Nation_Name,Nation_Team,Poster,Money_Earned From Nation Order By Money_Earned DESC ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsMoneySQL);
$rsMoney_numRows=0;
?>
<? 
$counter=0;
while((!($rsMoney==0)))
{

  $counter=$counter+1;
?>
<?   echo $counter; ?>) $<?   echo $FormatNumber[$rsMoney["Money_Earned"]][2]; ?> Earned - <?   echo $rsMoney["Poster"]; ?> of <?   echo $rsMoney["Nation_Name"]; ?> nation - <font color="<?   echo $rsMoney["Nation_Team"]; ?>"><?   echo $rsMoney["Nation_Team"]; ?> Team</font> <br>
<br>
<? 
  $rsMoney=mysql_fetch_array($rsMoney_query);
  $rsMoney_BOF=0;

} 
?>



</td>
	</tr>
	
</table>

</p>



<p>


<p></p>

<p></p>
<p align="center">
<b><a href="stats.php">Main World Statistics Screen</a></b></p>

<p></p>
<!--#include file="inc_footer.php" -->



<? 
$rsGuestbook->Close();
$rsGuestbook=null;



$rsActivity=null;



$rsOldest=null;



$rsPrinceps=null;



$rsCasualties=null;



$rsCasualtiesD=null;



$rsMoney=null;


$rsSent2->Close();
$rsSent2=null;


$objConn->Close();
$objConn=null;

?>
