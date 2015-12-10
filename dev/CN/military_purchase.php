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
<? 
// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT Nation_ID FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);
?>

<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td bgcolor="#000080">
		<font color="#FFFFFF"><b>:. Military Purchase Options</b></font></td>
	</tr>
	<tr>
		<td>
		<div align="center">
		<table border="0" id="table2" cellspacing="0" cellpadding="6" width="100%">
			<tr>
<td height="19" width="22%" align="center" valign="bottom">
<a href="aircraft_purchase.php">
<img border="0" src="images/milita1.jpg"></a></td>
<td height="19" width="75%" align="center">
<p align="left"><a href="aircraft_purchase.php">Aircraft</a> <i>- </i>Consists of fighter and bomber 
aircraft. Bombers destroy a percentage of enemy tanks, infrastructure, and cruise missiles. 
Fighters destroy enemy fighters and attacking enemy bombers.</td>
			</tr>
			<tr>
<td height="19" width="22%" align="center" valign="bottom">
<a title="Purchase Cruise Missiles" href="cruise_buy.asp?Nation_ID=<? echo $rsGuestbook0["Nation_ID"]; ?>">
<img border="0" src="images/milita2.jpg"></a></td>
<td height="19" width="75%" align="left">
<a href="cruise_buy.asp?Nation_ID=<? echo $rsGuestbook0["Nation_ID"]; ?>">
Cruise Missiles</a> - Destroys a percentage of enemy tanks and infrastructure. 
Performance measured by technology level.</td>
			</tr>
			<tr>
<td height="19" width="22%" align="center" valign="bottom">
<a title="Purchase Nuclear Weapons" href="nuclear_buy.asp?Nation_ID=<? echo $rsGuestbook0["Nation_ID"]; ?>">
<img border="0" src="images/milita3.jpg"></a></td>
<td height="19" width="75%" align="left">
<a href="nuclear_buy.asp?Nation_ID=<? echo $rsGuestbook0["Nation_ID"]; ?>">Nuclear 
Weapons</a> - Destroys all enemy soldiers, a percentage of cruise missiles, 
tanks, infrastructure and land, and a quarter of all aircraft.</td>
			</tr>
			<tr>
<td height="19" width="22%" align="center" valign="bottom">
<a title="Purchase Soldiers" href="militarybuysell.asp?Nation_ID=<? echo $rsGuestbook0["Nation_ID"]; ?>">
<img border="0" src="images/milita4.jpg"></a></td>
<td height="19" width="75%" align="left">
<p align="left">
<a href="militarybuysell.asp?Nation_ID=<? echo $rsGuestbook0["Nation_ID"]; ?>">Soldiers</a> 
- Combined with tanks, soldiers destroy a percentage of enemy soldiers and 
tanks. Performance measured by technology, infrastructure, and DEFCON 
levels.</td>
			</tr>
			<tr>
<td height="19" width="22%" align="center" valign="bottom">
<a title="Purchase Tanks" href="tanksbuysell.asp?Nation_ID=<? echo $rsGuestbook0["Nation_ID"]; ?>">
<img border="0" src="images/milita5.jpg"></a></td>
<td height="19" width="75%" align="left">
<a href="tanksbuysell.asp?Nation_ID=<? echo $rsGuestbook0["Nation_ID"]; ?>">
Tanks </a> - Combined with soldiers, tanks destroy a percentage of enemy 
soldiers and tanks. Performance measured by technology, infrastructure, 
and DEFCON levels.</td>
			</tr>
			

<? if ($MM_UserName_session!="")
{
?>			
			<? } ?>
		</table>
		</div>
		</td>
	</tr>
</table>
<!--#include file="inc_footer.php" -->
<? 
$objConn->Close();
$objConn=null;

?>
