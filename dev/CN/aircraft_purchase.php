<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
?>
<!--#include file="connection.php" -->
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=500,height=460,left = 262,top = 154');");
}
// End -->
</script>
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
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Upper(Poster) = '".strtoupper($rsUser["U_ID"])."' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
$lngRecordNo=$rsGuestbook["Nation_ID"];
?> 

<? 
// $rsAircraft is of type "ADODB.Recordset"

$rsAircraftSQL="SELECT * FROM Aircraft WHERE Nation_ID=".$rsGuestbook["Nation_ID"];
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsAircraftSQL);

$totalaircraft=0;
$fighter_strength=0;
$bomber_strength=0;
if ((!($rsAircraft_BOF==1)) && (!($rsAircraft==0)))
{

  $totalaircraft=$rsAircraft["Yakovlev Yak-9"]+$rsAircraft["P-51 Mustang"]+$rsAircraft["F-86 Sabre"]+$rsAircraft["Mikoyan-Gurevich MiG-15"]+$rsAircraft["F-100 Super Sabre"]+$rsAircraft["F-35 Lightning II"]+$rsAircraft["F-15 Eagle"]+$rsAircraft["Su-30 MKI"]+$rsAircraft["F-22 Raptor"]+$rsAircraft["AH-1 Cobra"]+$rsAircraft["AH-64 Apache"]+$rsAircraft["Bristol Blenheim"]+$rsAircraft["B-25 Mitchell"]+$rsAircraft["B-17G Flying Fortress"]+$rsAircraft["B-52 Stratofortress"]+$rsAircraft["B-2 Spirit"]+$rsAircraft["B-1B Lancer"]+$rsAircraft["Tupolev Tu-160"];
  $fighter_strength=$rsAircraft["Yakovlev Yak-9"]*1+$rsAircraft["P-51 Mustang"]*2+$rsAircraft["F-86 Sabre"]*3+$rsAircraft["Mikoyan-Gurevich MiG-15"]*4+$rsAircraft["F-100 Super Sabre"]*5+$rsAircraft["F-35 Lightning II"]*6+$rsAircraft["F-15 Eagle"]*7+$rsAircraft["Su-30 MKI"]*8+$rsAircraft["F-22 Raptor"]*9;
  $bomber_strength=$rsAircraft["AH-1 Cobra"]*1+$rsAircraft["AH-64 Apache"]*2+$rsAircraft["Bristol Blenheim"]*3+$rsAircraft["B-25 Mitchell"]*4+$rsAircraft["B-17G Flying Fortress"]*5+$rsAircraft["B-52 Stratofortress"]*6+$rsAircraft["B-2 Spirit"]*7+$rsAircraft["B-1B Lancer"]*8+$rsAircraft["Tupolev Tu-160"]*9;
} 

?> 

<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->
<!--#include file="calculations_costs.php" -->

 <noscript><font color="red"><b>You must have JavaScript enabled to use this page.<p></p></b></font></noscript>
	<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0" bordercolor="#000080">
	<tr>
	<td>
	<table border="1" width="100%" id="table4" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
	<td width="100%" align="right" valign="top" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="4" bgcolor="#000080">
	<p align="left">
	<b><font color="#FFFFFF">:. Purchase aircraft for </font> <a href="nation_drill_display.asp?Nation_ID=<? echo $rsGuestbook["Nation_ID"]; ?>">
	<font color="#FFFFFF"><? echo $rsGuestbook["Nation_Name"]; ?></font></a><font color="#FFFFFF">
	</font> </b>
	</td>
	</tr>
	<tr>
	<td width="25%" align="right" valign="top" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
	Technology:</td>
	<td valign="top" width="70%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="3"><? echo $FormatNumber[$rsGuestbook["Technology_Purchased"]][2]; ?></td>
	</tr>
	<tr>
	<td width="25%" align="right" valign="top" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
	Infrastructure:</td>
	<td valign="top" width="70%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="3"><? echo $FormatNumber[$rsGuestbook["Infrastructure_Purchased"]][2]; ?></td>
	</tr>
	<tr>
	<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">Current <? echo ($rsGuestbook["Currency_Type"].$Value); ?>s Available:</td>
	<td width="70%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="3">$<? echo $FormatNumber[$totalmoneyavailable][2]; ?></td>
	</tr>
	<tr>
	<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
	Total Aircraft:</td>
	<td width="70%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="3"><? echo $totalaircraft; ?> of <? echo $aircraftlimit; ?></td>
	</tr>
	<tr>
	<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
	Total Fighter Strength:</td>
	<td width="70%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="3"><? echo $FormatNumber[$fighter_strength][0]; ?> of a possible <? echo $aircraftlimit*9; ?></td>
	</tr>
	<tr>
	<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
	Total Bomber Strength:</td>
	<td width="70%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="3"><? echo $FormatNumber[$bomber_strength][0]; ?> of a possible <? echo $aircraftlimit*9; ?></td>
	</tr>
	<? if ((!($rsAircraft_BOF==1)) && (!($rsAircraft==0)))
{
?>	
		<tr>
		<td width="51%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="2" bgcolor="#E9E9E9">
		<p align="center">
		<b>Fighter Aircraft</b></td>
		<td width="46%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="2" bgcolor="#E9E9E9">
		<p align="center">
		<b>Bomber Aircraft</b></td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Yakovlev Yak-9
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Yakovlev Yak-9')"><img border="0" src="images/information.gif" width="17" height="16"></A>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["Yakovlev Yak-9"]; ?>
		<?   if ($rsAircraft["Yakovlev Yak-9"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=Yakovlev Yak-9" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		AH-1 Cobra
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=AH-1 Cobra')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["AH-1 Cobra"]; ?>
		<?   if ($rsAircraft["AH-1 Cobra"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=AH-1 Cobra" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		P-51 Mustang
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=P-51 Mustang')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["P-51 Mustang"]; ?>
		<?   if ($rsAircraft["P-51 Mustang"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=P-51 Mustang" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		AH-64 Apache
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=AH-64 Apache')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["AH-64 Apache"]; ?>
		<?   if ($rsAircraft["AH-64 Apache"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=AH-64 Apache" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-86 Sabre
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-86 Sabre')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["F-86 Sabre"]; ?>
		<?   if ($rsAircraft["F-86 Sabre"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=F-86 Sabre" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		Bristol Blenheim
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Bristol Blenheim')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["Bristol Blenheim"]; ?>
		<?   if ($rsAircraft["Bristol Blenheim"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=Bristol Blenheim" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Mikoyan-Gurevich MiG-15
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Mikoyan-Gurevich MiG-15')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["Mikoyan-Gurevich MiG-15"]; ?>
		<?   if ($rsAircraft["Mikoyan-Gurevich MiG-15"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=Mikoyan-Gurevich MiG-15" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		B-25 Mitchell
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-25 Mitchell')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["B-25 Mitchell"]; ?>
		<?   if ($rsAircraft["B-25 Mitchell"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=B-25 Mitchell" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-100 Super Sabre
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-100 Super Sabre')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["F-100 Super Sabre"]; ?>
		<?   if ($rsAircraft["F-100 Super Sabre"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=F-100 Super Sabre" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		B-17G Flying Fortress
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-17G Flying Fortress')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["B-17G Flying Fortress"]; ?>
		<?   if ($rsAircraft["B-17G Flying Fortress"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=B-17G Flying Fortress" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-35 Lightning II
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-35 Lightning II')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["F-35 Lightning II"]; ?>
		<?   if ($rsAircraft["F-35 Lightning II"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=F-35 Lightning II" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		B-52 Stratofortress
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-52 Stratofortress')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["B-52 Stratofortress"]; ?>
		<?   if ($rsAircraft["B-52 Stratofortress"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=B-52 Stratofortress" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		</tr>
		<tr>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		F-15 Eagle
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-15 Eagle')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["F-15 Eagle"]; ?>
		<?   if ($rsAircraft["F-15 Eagle"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=F-15 Eagle" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		B-2 Spirit
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-2 Spirit')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["B-2 Spirit"]; ?>  
		<?   if ($rsAircraft["B-2 Spirit"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=B-2 Spirit" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Su-30 MKI
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Su-30 MKI')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["Su-30 MKI"]; ?>
		<?   if ($rsAircraft["Su-30 MKI"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=Su-30 MKI" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		B-1B Lancer
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-1B Lancer')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["B-1B Lancer"]; ?>
		<?   if ($rsAircraft["B-1B Lancer"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=B-1B Lancer" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-22 Raptor
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-22 Raptor')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["F-22 Raptor"]; ?>
		<?   if ($rsAircraft["F-22 Raptor"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=F-22 Raptor" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Tupolev Tu-160
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Tupolev Tu-160')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		<?   echo $rsAircraft["Tupolev Tu-160"]; ?>
		<?   if ($rsAircraft["Tupolev Tu-160"]>0)
  {
?>
		<a href="aircraft_purchase_destroy.php?Aircraft=Tupolev Tu-160" onclick="return confirm('Destroying aircraft is free. Are you sure you want to destroy one aircraft? You will not be refunded the original cost of this item.');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
		<?   } ?>
		</td>
		</tr>
	<? }
  else
{
?>
		<tr>
		<td width="51%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="2" bgcolor="#E9E9E9">
		<p align="center">
		<b>Fighter Aircraft</b></td>
		<td width="46%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="2" bgcolor="#E9E9E9">
		<p align="center">
		<b>Bomber Aircraft</b></td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Yakovlev Yak-9
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Yakovlev Yak-9')"><img border="0" src="images/information.gif" width="17" height="16"></A>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		AH-1 Cobra
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=AH-1 Cobra')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		P-51 Mustang
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=P-51 Mustang')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		AH-64 Apache
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=AH-64 Apache')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-86 Sabre
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-86 Sabre')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		Bristol Blenheim
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Bristol Blenheim')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Mikoyan-Gurevich MiG-15
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Mikoyan-Gurevich MiG-15')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		B-25 Mitchell
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-25 Mitchell')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-100 Super Sabre
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-100 Super Sabre')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		B-17G Flying Fortress
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-17G Flying Fortress')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-35 Lightning II
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-35 Lightning II')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		B-52 Stratofortress
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-52 Stratofortress')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		</tr>
		<tr>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		F-15 Eagle
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-15 Eagle')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		B-2 Spirit
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-2 Spirit')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Su-30 MKI
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Su-30 MKI')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		B-1B Lancer
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-1B Lancer')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		</tr>
		<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-22 Raptor
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-22 Raptor')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Tupolev Tu-160
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Tupolev Tu-160')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		0</td>
		</tr>
	<? } ?>
			
	</table>
	
	<? if (time()()-$rsGuestbook["Last_Bills_Paid"]<=2)
{
?>
	
	<br><br>
	
	
	<?   if ($_POST["aircraft"]=="")
  {
?>
	<table border="1" width="100%" id="table2" cellpadding="5" bordercolor="#000080" cellspacing="0">
	<form name="FrontPage_Form1" method="post">	

	<?     if ($totalaircraft>=$aircraftlimit || $rsGuestbook["Infrastructure_Purchased"]<$f1_infras || $rsGuestbook["Technology_Purchased"]<$f1_tech || $totalmoneyavailable-$f1==<0)
    {
?>
		<tr>
		<td valign="top" colspan="2">
		<?       if ($rsGuestbook["Infrastructure_Purchased"]<$f1_infras || $rsGuestbook["Technology_Purchased"]<$f1_tech || $totalmoneyavailable-$f1<0 || $totalmoneyavailable-$b1==<0)
      {
?>
		You do not have enough infrastructure, technology, or money to purchase aircraft at this time. To purchase the most basic aircraft you
		need at least 100 infrastructure, 10 technology levels, and more than $<?         echo $FormatNumber[$f1][0]; ?>.
		<?       } ?>
		<?       if ($totalaircraft>=$aircraftlimit)
      {
?>
		You already have <?         echo $totalaircraft; ?> aircraft and cannot purchase more at this time.
		<?       } ?>
		</td>
		</tr>
	<?     }
      else
    {
?>	
		<tr>
		<td align="center" bgcolor="#E9E9E9" width="50%">
		<b>Purchase Fighter Aircraft</b></td>
		<td align="center" bgcolor="#E9E9E9" width="50%">
		<b>Purchase Bomber Aircraft</b></td>
		</tr>
	<?     } ?>	

	
	
	
	

	
		<?     if (($totalaircraft<$aircraftlimit) && ($rsGuestbook["Infrastructure_Purchased"]>=$f1_infras) && ($rsGuestbook["Technology_Purchased"]>=$f1_tech) && ($totalmoneyavailable-$f1>0))
    {
?>
		<tr>
		<td colspan="2">
		<table border="0" width="100%" id="table3" cellpadding="5" cellspacing="0">
		<tr>
		<td width="20" valign="top">
		<input type="radio" value="Yakovlev Yak-9" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top">
		<img border="0" src="images/aircraft/fighter_01.jpg" width="150" height="100"><br>
		<b>Yakovlev Yak-9 </b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Yakovlev Yak-9')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$f1][0]; ?><br>
		Strength: 1</i></td>
		<td width="20" valign="top">
		<input type="radio" value="AH-1 Cobra" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top">
		<img border="0" src="images/aircraft/bomber_01.jpg" width="150" height="100"><br>
		<b>AH-1 Cobra</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=AH-1 Cobra')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$b1][0]; ?><br>
		Strength: 1</i></td>
		</tr>
		<?     } ?>
	
	
		<?     if ($totalaircraft<$aircraftlimit && $rsGuestbook["Infrastructure_Purchased"]>=$f2_infras && $rsGuestbook["Technology_Purchased"]>=$f2_tech && ($totalmoneyavailable-$f2>0))
    {
?>
		<tr>
		<td width="20" valign="top">
		<input type="radio" value="P-51 Mustang" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top">
		<img border="0" src="images/aircraft/fighter_02.jpg" width="150" height="100"><br>
		<b>P-51 Mustang</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=P-51 Mustang')"><img border="0" src="images/information.gif" width="17" height="16"></A>
		<br>
		<i>Cost: $<?       echo $FormatNumber[$f2][0]; ?><br>
		Strength: 2</i></td>
		<td width="20" valign="top">
		<input type="radio" value="AH-64 Apache" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top">
		<img border="0" src="images/aircraft/bomber_02.jpg" width="150" height="100"><br>
		<b>AH-64 Apache</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=AH-64 Apache')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$b2][0]; ?><br>
		Strength: 2</i></td>
		</tr>
		<?     } ?>
	
		<?     if ($totalaircraft<$aircraftlimit && $rsGuestbook["Infrastructure_Purchased"]>=$f3_infras && $rsGuestbook["Technology_Purchased"]>=$f3_tech && ($totalmoneyavailable-$f3>0))
    {
?>
		<tr>
		<td width="20" valign="top">
		<input type="radio" value="F-86 Sabre" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top"><b>
		<img border="0" src="images/aircraft/fighter_03.jpg" width="150" height="100"></b><br>
		<b>F-86 Sabre</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-86 Sabre')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$f3][0]; ?><br>
		Strength: 3</i></td>
		<td width="20" valign="top">
		<input type="radio" value="Bristol Blenheim" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top">
		<b>
		<img border="0" src="images/aircraft/bomber_03.jpg" width="150" height="100"></b><br>
		<b>Bristol Blenheim</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Bristol Blenheim')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		</font><i>Cost: $<?       echo $FormatNumber[$b3][0]; ?><br>
		Strength: 3</i></td>
		</tr>
		<?     } ?>
	
		<?     if ($totalaircraft<$aircraftlimit && $rsGuestbook["Infrastructure_Purchased"]>=$f4_infras && $rsGuestbook["Technology_Purchased"]>=$f4_tech && ($totalmoneyavailable-$f4>0))
    {
?>
		<tr>
		<td width="20" valign="top">
		<input type="radio" value="Mikoyan-Gurevich MiG-15" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top"><b>
		<img border="0" src="images/aircraft/fighter_04.jpg" width="150" height="100"></b><br>
		<b>Mikoyan-Gurevich MiG-15</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Mikoyan-Gurevich MiG-15')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$f4][0]; ?><br>
		Strength: 4</i></td>
		<td width="20" valign="top">
		<input type="radio" value="B-25 Mitchell" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top">
		<b>
		<img border="0" src="images/aircraft/bomber_04.jpg" width="150" height="100"></b><br>
		<b>B-25 Mitchell</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-25 Mitchell')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		</font><i>Cost: $<?       echo $FormatNumber[$b4][0]; ?><br>
		Strength: 4</i></td>
		</tr>
		<?     } ?>
	
		<?     if ($totalaircraft<$aircraftlimit && $rsGuestbook["Infrastructure_Purchased"]>=$f5_infras && $rsGuestbook["Technology_Purchased"]>=$f5_tech && ($totalmoneyavailable-$f5>0))
    {
?>
		<tr>
		<td width="20" valign="top">
		<input type="radio" value="F-100 Super Sabre" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top"><b>
		<img border="0" src="images/aircraft/fighter_05.jpg" width="150" height="100"></b><br>
		<b>F-100 Super Sabre</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-100 Super Sabre')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$f5][0]; ?></i><font color="#000000" face="Helvetica,Arial"><i> <br>
		</i></font><i>Strength: 5</i></td>
		<td width="20" valign="top">
		<input type="radio" value="B-17G Flying Fortress" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top">
		<img border="0" src="images/aircraft/bomber_05.jpg" width="150" height="112"><br>
		<b>B-17G Flying Fortress</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-17G Flying Fortress')"><img border="0" src="images/information.gif" width="17" height="16"></A><font color="#000000" face="Helvetica,Arial"><br>
		</font><i>Cost: $<?       echo $FormatNumber[$b5][0]; ?> <br>
		Strength: 5</i></td>
		</tr>
		<?     } ?>
	
		<?     if ($totalaircraft<$aircraftlimit && $rsGuestbook["Infrastructure_Purchased"]>=$f6_infras && $rsGuestbook["Technology_Purchased"]>=$f6_tech && ($totalmoneyavailable-$f6>0))
    {
?>
		<tr>
		<td width="20" valign="top">
		<input type="radio" value="F-35 Lightning II" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top"><b>
		<img border="0" src="images/aircraft/fighter_06.jpg" width="150" height="100"></b><br>
		<b>F-35 Lightning II</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-35 Lightning II')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$f6][0]; ?><br>
		Strength: 6</i></td>
		<td width="20" valign="top">
		<input type="radio" value="B-52 Stratofortress" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top">
		<img border="0" src="images/aircraft/bomber_06.jpg" width="150" height="100"><br>
		<b>B-52 Stratofortress</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-52 Stratofortress')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$b6][0]; ?><br>
		Strength: 6</i></td>
		</tr>
		<?     } ?>
		
		<?     if ($totalaircraft<$aircraftlimit && $rsGuestbook["Infrastructure_Purchased"]>=$f7_infras && $rsGuestbook["Technology_Purchased"]>=$f7_tech && ($totalmoneyavailable-$f7>0))
    {
?>
		<tr>
		<td width="20" valign="top">
		<input type="radio" value="F-15 Eagle" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top"><b>
		<img border="0" src="images/aircraft/fighter_07.jpg" width="150" height="100"></b><br>
		<b>F-15 Eagle</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-15 Eagle')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$f7][0]; ?><br>
		Strength: 7</i></td>
		<td width="20" valign="top">
		<input type="radio" value="B-2 Spirit" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top">
		<img border="0" src="images/aircraft/bomber_07.jpg" width="150" height="100"><br>
		<b>B-2 Spirit</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-2 Spirit')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$b7][0]; ?><br>
		Strength: 7</i></td>
		</tr>
		<?     } ?>
		
		<?     if ($totalaircraft<$aircraftlimit && $rsGuestbook["Infrastructure_Purchased"]>=$f8_infras && $rsGuestbook["Technology_Purchased"]>=$f8_tech && ($totalmoneyavailable-$f8>0))
    {
?>
		<tr>
		<td width="20" valign="top">
		<input type="radio" value="Su-30 MKI" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top"><b>
		<img border="0" src="images/aircraft/fighter_08.jpg" width="150" height="100"><br>
		Su-30 MKI
		</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Su-30 MKI')"><img border="0" src="images/information.gif" width="17" height="16"></A><b><br>
		</b><i>Cost: $<?       echo $FormatNumber[$f8][0]; ?><br>
		Strength: 8</i></td>
		<td width="20" valign="top">
		<input type="radio" value="B-1B Lancer" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top">
		<img border="0" src="images/aircraft/bomber_08.jpg" width="150" height="100"><br>
		<b>B-1B Lancer</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-1B Lancer')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$b8][0]; ?><br>
		Strength: 8</i></td>
		</tr>
		<?     } ?>
	
		<?     if ($totalaircraft<$aircraftlimit && $rsGuestbook["Infrastructure_Purchased"]>=$f9_infras && $rsGuestbook["Technology_Purchased"]>=$f9_tech && ($totalmoneyavailable-$f9>0))
    {
?>
		<tr>
		<td width="20" valign="top">
		<input type="radio" value="F-22 Raptor" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top"><b>
		<img border="0" src="images/aircraft/fighter_09.jpg" width="150" height="100"></b><br>
		<b>F-22 Raptor</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-22 Raptor')"><img border="0" src="images/information.gif" width="17" height="16"></A><br>
		<i>Cost: $<?       echo $FormatNumber[$f9][0]; ?><br>
		Strength: 9</i></td>
		<td width="20" valign="top">
		<input type="radio" value="Tupolev Tu-160" name="aircraft" onClick="this.form.submit()"></td>
		<td valign="top"><b>
		<img border="0" src="images/aircraft/bomber_09.jpg" width="150" height="100"><br>
		Tupolev Tu-160
		</b>
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Tupolev Tu-160')"><img border="0" src="images/information.gif" width="17" height="16"></A><b><br>
		</b><i>Cost: $<?       echo $FormatNumber[$b9][0]; ?><br>
		Strength: 9</i></td>
		</tr>
		<?     } ?>
	
	</table>
	</td>
	</tr>
	</table><br><br>
	&nbsp;
	</form>
	<?   } ?>
	
	<?   if ($_POST["aircraft"]!="" && $totalaircraft<$aircraftlimit)
  {
?>

	
	
	
	<table border="1" width="100%" id="table2" cellpadding="5" cellspacing="0" bordercolor="#000080">
	<form name="FrontPage_Form2" method="post" action="aircraft_purchase.asp?aircraft=<?     echo $_POST["aircraft"]; ?>">
	<tr>
	<td>
	<p align="center">
		<? 
    switch ($_POST["aircraft"])
    {
      case "Yakovlev Yak-9":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/fighter_01.JPG' title='Yakovlev Yak-9'>";
        $itemcost=$f1;
        $item_infras=$f1_infras;
        $item_tech=$f1_tech;
        break;
      case "P-51 Mustang":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/fighter_02.JPG' title='P-51 Mustang'>";
        $itemcost=$f2;
        $item_infras=$f2_infras;
        $item_tech=$f2_tech;
        break;
      case "F-86 Sabre":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/fighter_03.JPG' title='F-86 Sabre'>";
        $itemcost=$f3;
        $item_infras=$f3_infras;
        $item_tech=$f3_tech;
        break;
      case "Mikoyan-Gurevich MiG-15":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/fighter_04.JPG' title='Mikoyan-Gurevich MiG-15'>";
        $itemcost=$f4;
        $item_infras=$f4_infras;
        $item_tech=$f4_tech;
        break;
      case "F-100 Super Sabre":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/fighter_05.JPG' title='F-100 Super Sabre'>";
        $itemcost=$f5;
        $item_infras=$f5_infras;
        $item_tech=$f5_tech;
        break;
      case "F-35 Lightning II":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/fighter_06.JPG' title='F-35 Lightning II'>";
        $itemcost=$f6;
        $item_infras=$f6_infras;
        $item_tech=$f6_tech;
        break;
      case "F-15 Eagle":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/fighter_07.JPG' title='F-15 Eagle'>";
        $itemcost=$f7;
        $item_infras=$f7_infras;
        $item_tech=$f7_tech;
        break;
      case "Su-30 MKI":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/fighter_08.JPG' title='Su-30 MKI'>";
        $itemcost=$f8;
        $item_infras=$f8_infras;
        $item_tech=$f8_tech;
        break;
      case "F-22 Raptor":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/fighter_09.JPG' title='F-22 Raptor'>";
        $itemcost=$f9;
        $item_infras=$f9_infras;
        $item_tech=$f9_tech;

        break;
      case "AH-1 Cobra":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/bomber_01.JPG' title='AH-1 Cobra'>";
        $itemcost=$b1;
        $item_infras=$f1_infras;
        $item_tech=$f1_tech;
        break;
      case "AH-64 Apache":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/bomber_02.JPG' title='AH-64 Apache'>";
        $itemcost=$b2;
        $item_infras=$f2_infras;
        $item_tech=$f2_tech;
        break;
      case "Bristol Blenheim":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/bomber_03.JPG' title='Bristol Blenheim'>";
        $itemcost=$b3;
        $item_infras=$f3_infras;
        $item_tech=$f3_tech;
        break;
      case "B-25 Mitchell":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/bomber_04.JPG' title='B-25 Mitchell'>";
        $itemcost=$b4;
        $item_infras=$f4_infras;
        $item_tech=$f4_tech;
        break;
      case "B-17G Flying Fortress":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/bomber_05.JPG' title='B-17G Flying Fortress'>";
        $itemcost=$b5;
        $item_infras=$f5_infras;
        $item_tech=$f5_tech;
        break;
      case "B-52 Stratofortress":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/bomber_06.JPG' title='B-52 Stratofortress'>";
        $itemcost=$b6;
        $item_infras=$f6_infras;
        $item_tech=$f6_tech;
        break;
      case "B-2 Spirit":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/bomber_07.JPG' title='B-2 Spirit'>";
        $itemcost=$b7;
        $item_infras=$f7_infras;
        $item_tech=$f7_tech;
        break;
      case "B-1B Lancer":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/bomber_08.JPG' title='B-1B Lancer'>";
        $itemcost=$b8;
        $item_infras=$f8_infras;
        $item_tech=$f8_tech;
        break;
      case "Tupolev Tu-160":
        print "<img src='http://cybernations.net/images/aircraft/aircraft_large/bomber_09.JPG' title='Tupolev Tu-160'>";
        $itemcost=$b9;
        $item_infras=$f9_infras;
        $item_tech=$f9_tech;
        break;
    } 
?>
<script type="text/javascript">
var submit_ok;
function d(){
  var amount_purchase = parseInt(document.FrontPage_Form2.amount_purchase.value);
  var amount_purchase_cost = amount_purchase * <?     echo intval($itemcost); ?>;

    if (amount_purchase > 0 && <?     echo intval($totalmoneyavailable); ?> - amount_purchase_cost >= 0 && amount_purchase + <?     echo intval($totalaircraft); ?> <= <?     echo intval($aircraftlimit); ?>) 
	{
	document.getElementById('results').innerHTML="Purchase of " + amount_purchase + " <?     echo $_POST["aircraft"]; ?> at $" + amount_purchase_cost +" is acceptable.";
	submit_ok = 'Yes';
	}
	else
	{
	
	    if (amount_purchase <= 0)
	    {
		document.getElementById('results').innerHTML="<font color='#FF0000'>Purchase of " + amount_purchase + " <?     echo $_POST["aircraft"]; ?> at $" + amount_purchase_cost +" is denied. You must specify a number greater than zero.";
		}
	    if (<?     echo intval($totalmoneyavailable); ?> - amount_purchase_cost < 0)
	    {
		document.getElementById('results').innerHTML="<font color='#FF0000'>Purchase of " + amount_purchase + " <?     echo $_POST["aircraft"]; ?> at $" + amount_purchase_cost +" is denied. You do not have enough money for that transaction.";
		}	
		if (amount_purchase + <?     echo intval($totalaircraft); ?> > <?     echo intval($aircraftlimit); ?>)
	    {
		document.getElementById('results').innerHTML="<font color='#FF0000'>Purchase of " + amount_purchase + " <?     echo $_POST["aircraft"]; ?> at $" + amount_purchase_cost +" is denied. That purchase would put your nation over the aircraft limit.";
		}	
	submit_ok = 'No';
	} 
	
}
function submit_form(){
submit_ok = 'No';
 d()
    if (submit_ok == 'Yes') {
  	document.FrontPage_Form2.submit();
    }
}
// End -->
</script>	

	<p></p>
	<?     if ($rsGuestbook["Infrastructure_Purchased"]<$item_infras || $rsGuestbook["Technology_Purchased"]<$item_tech || $totalmoneyavailable-$itemcost<0)
    {
?>
	You do not have either enough infrastructure, technology, or money to purchase aircraft at this time. To purchase that aircraft you
	need at least <?       echo $item_infras; ?> infrastructure, <?       echo $item_tech; ?> technology levels, and $<?       echo $FormatNumber[$itemcost][0]; ?>.
	<?     }
      else
    {
?>
	<table border="0" width="100%" id="table5" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="2">You selected to purchase <?       echo $_POST["aircraft"]; ?> at $<?       echo $FormatNumber[$itemcost][0]; ?> each. Please specify how many of this aircraft type you would like to purchase.<br>
&nbsp;</td>
		</tr>
		<tr>
			<td width="50%">
			<p align="right">Purchase Amount:</td>
			<td width="50%">
		<input type="text" size="8" name="amount_purchase" value="1">
		</td>
		</tr>
	</table>	
		
	<p align="center">

	
		

	<!--#include file="activitycheck.php" -->
	<input type="hidden" name="process" value="1">
	<input type="button" value="Confirm Order" onclick="d()">&nbsp; 
	<input type="button" onclick="submit_form()" value="Place Order"><br>


	<font color="#FF0000">
	<div align="center">
	
	


<table border="0" width="60%" cellspacing="0" cellpadding="10" id="table6">
	<tr>
		<td width="4">&nbsp;</td>
		<td><span id='results'></span></td>
	</tr>
</table>
	</div>
	</font>

<?     } ?>

	&nbsp;</td>
	</tr>
	</form>
	</table>
	<?   } ?>
	
	
	
	<? 
// Final form processing

  if ($_GET["aircraft"]!="" && $totalaircraft<$aircraftlimit && $_POST["process"]==1 && $_POST["amount_purchase"]>0)
  {

?>
	<!--#include file="activity.php" -->
	<? 
//Create a fresh instance of rsAircraft

    
    $rsAircraft=null;

// $rsAircraft is of type "ADODB.Recordset"

    $rsAircraftSQL="SELECT * FROM Aircraft WHERE Nation_ID=".$rsGuestbook["Nation_ID"];
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query($rsAircraftSQL);

    if (($rsAircraft_BOF==1) && ($rsAircraft==0))
    {


      
$rsAircraft["Nation_ID"]=$rsGuestbook["Nation_ID"];
      
      switch ($_GET["aircraft"])
      {
        case "Yakovlev Yak-9":
          $itemcost=$f1*$_POST["amount_purchase"];
          $item_infras=$f1_infras;
          $item_tech=$f1_tech;
$rsAircraft["Yakovlev Yak-9"]=$_POST["amount_purchase"];
                    break;
        case "P-51 Mustang":
          $itemcost=$f2*$_POST["amount_purchase"];
          $item_infras=$f2_infras;
          $item_tech=$f2_tech;
$rsAircraft["P-51 Mustang"]=$_POST["amount_purchase"];
                    break;
        case "F-86 Sabre":
          $itemcost=$f3*$_POST["amount_purchase"];
          $item_infras=$f3_infras;
          $item_tech=$f3_tech;
$rsAircraft["F-86 Sabre"]=$_POST["amount_purchase"];
                    break;
        case "Mikoyan-Gurevich MiG-15":
          $itemcost=$f4*$_POST["amount_purchase"];
          $item_infras=$f4_infras;
          $item_tech=$f4_tech;
$rsAircraft["Mikoyan-Gurevich MiG-15"]=$_POST["amount_purchase"];
                    break;
        case "F-100 Super Sabre":
          $itemcost=$f5*$_POST["amount_purchase"];
          $item_infras=$f5_infras;
          $item_tech=$f5_tech;
$rsAircraft["F-100 Super Sabre"]=$_POST["amount_purchase"];
                    break;
        case "F-35 Lightning II":
          $itemcost=$f6*$_POST["amount_purchase"];
          $item_infras=$f6_infras;
          $item_tech=$f6_tech;
$rsAircraft["F-35 Lightning II"]=$_POST["amount_purchase"];
                    break;
        case "F-15 Eagle":
          $itemcost=$f7*$_POST["amount_purchase"];
          $item_infras=$f7_infras;
          $item_tech=$f7_tech;
$rsAircraft["F-15 Eagle"]=$_POST["amount_purchase"];
                    break;
        case "Su-30 MKI":
          $itemcost=$f8*$_POST["amount_purchase"];
          $item_infras=$f8_infras;
          $item_tech=$f8_tech;
$rsAircraft["Su-30 MKI"]=$_POST["amount_purchase"];
                    break;
        case "F-22 Raptor":
          $itemcost=$f9*$_POST["amount_purchase"];
          $item_infras=$f9_infras;
          $item_tech=$f9_tech;
$rsAircraft["F-22 Raptor"]=$_POST["amount_purchase"];
          
          break;
        case "AH-1 Cobra":
          $itemcost=$b1*$_POST["amount_purchase"];
          $item_infras=$f1_infras;
          $item_tech=$f1_tec;
$rsAircraft["AH-1 Cobra"]=$_POST["amount_purchase"];
                    break;
        case "AH-64 Apache":
          $itemcost=$b2*$_POST["amount_purchase"];
          $item_infras=$f2_infras;
          $item_tech=$f2_tech;
$rsAircraft["AH-64 Apache"]=$_POST["amount_purchase"];
                    break;
        case "Bristol Blenheim":
          $itemcost=$b3*$_POST["amount_purchase"];
          $item_infras=$f3_infras;
          $item_tech=$f3_tech;
$rsAircraft["Bristol Blenheim"]=$_POST["amount_purchase"];
                    break;
        case "B-25 Mitchell":
          $itemcost=$b4*$_POST["amount_purchase"];
          $item_infras=$f4_infras;
          $item_tech=$f4_tech;
$rsAircraft["B-25 Mitchell"]=$_POST["amount_purchase"];
                    break;
        case "B-17G Flying Fortress":
          $itemcost=$b5*$_POST["amount_purchase"];
          $item_infras=$f5_infras;
          $item_tech=$f5_tech;
$rsAircraft["B-17G Flying Fortress"]=$_POST["amount_purchase"];
                    break;
        case "B-52 Stratofortress":
          $itemcost=$b6*$_POST["amount_purchase"];
          $item_infras=$f6_infras;
          $item_tech=$f6_tech;
$rsAircraft["B-52 Stratofortress"]=$_POST["amount_purchase"];
                    break;
        case "B-2 Spirit":
          $itemcost=$b7*$_POST["amount_purchase"];
          $item_infras=$f7_infras;
          $item_tech=$f7_tech;
$rsAircraft["B-2 Spirit"]=$_POST["amount_purchase"];
                    break;
        case "B-1B Lancer":
          $itemcost=$b8*$_POST["amount_purchase"];
          $item_infras=$f8_infras;
          $item_tech=$f8_tech;
$rsAircraft["B-1B Lancer"]=$_POST["amount_purchase"];
                    break;
        case "Tupolev Tu-160":
          $itemcost=$b9*$_POST["amount_purchase"];
          $item_infras=$f9_infras;
          $item_tech=$f9_tech;
$rsAircraft["Tupolev Tu-160"]=$_POST["amount_purchase"];
                    break;
      } 

    }
      else
    {


      switch ($_GET["aircraft"])
      {
        case "Yakovlev Yak-9":
          $itemcost=$f1*$_POST["amount_purchase"];
          $item_infras=$f1_infras;
          $item_tech=$f1_tech;
$rsAircraft["Yakovlev Yak-9"]=$rsAircraft["Yakovlev Yak-9"]+$_POST["amount_purchase"];
                    break;
        case "P-51 Mustang":
          $itemcost=$f2*$_POST["amount_purchase"];
          $item_infras=$f2_infras;
          $item_tech=$f2_tech;
$rsAircraft["P-51 Mustang"]=$rsAircraft["P-51 Mustang"]+$_POST["amount_purchase"];
                    break;
        case "F-86 Sabre":
          $itemcost=$f3*$_POST["amount_purchase"];
          $item_infras=$f3_infras;
          $item_tech=$f3_tech;
$rsAircraft["F-86 Sabre"]=$rsAircraft["F-86 Sabre"]+$_POST["amount_purchase"];
                    break;
        case "Mikoyan-Gurevich MiG-15":
          $itemcost=$f4*$_POST["amount_purchase"];
          $item_infras=$f4_infras;
          $item_tech=$f4_tech;
$rsAircraft["Mikoyan-Gurevich MiG-15"]=$rsAircraft["Mikoyan-Gurevich MiG-15"]+$_POST["amount_purchase"];
                    break;
        case "F-100 Super Sabre":
          $itemcost=$f5*$_POST["amount_purchase"];
          $item_infras=$f5_infras;
          $item_tech=$f5_tech;
$rsAircraft["F-100 Super Sabre"]=$rsAircraft["F-100 Super Sabre"]+$_POST["amount_purchase"];
                    break;
        case "F-35 Lightning II":
          $itemcost=$f6*$_POST["amount_purchase"];
          $item_infras=$f6_infras;
          $item_tech=$f6_tech;
$rsAircraft["F-35 Lightning II"]=$rsAircraft["F-35 Lightning II"]+$_POST["amount_purchase"];
                    break;
        case "F-15 Eagle":
          $itemcost=$f7*$_POST["amount_purchase"];
          $item_infras=$f7_infras;
          $item_tech=$f7_tech;
$rsAircraft["F-15 Eagle"]=$rsAircraft["F-15 Eagle"]+$_POST["amount_purchase"];
                    break;
        case "Su-30 MKI":
          $itemcost=$f8*$_POST["amount_purchase"];
          $item_infras=$f8_infras;
          $item_tech=$f8_tech;
$rsAircraft["Su-30 MKI"]=$rsAircraft["Su-30 MKI"]+$_POST["amount_purchase"];
                    break;
        case "F-22 Raptor":
          $itemcost=$f9*$_POST["amount_purchase"];
          $item_infras=$f9_infras;
          $item_tech=$f9_tech;
$rsAircraft["F-22 Raptor"]=$rsAircraft["F-22 Raptor"]+$_POST["amount_purchase"];
          
          break;
        case "AH-1 Cobra":
          $itemcost=$b1*$_POST["amount_purchase"];
          $item_infras=$f1_infras;
          $item_tech=$f1_tech;
$rsAircraft["AH-1 Cobra"]=$rsAircraft["AH-1 Cobra"]+$_POST["amount_purchase"];
                    break;
        case "AH-64 Apache":
          $itemcost=$b2*$_POST["amount_purchase"];
          $item_infras=$f2_infras;
          $item_tech=$f2_tech;
$rsAircraft["AH-64 Apache"]=$rsAircraft["AH-64 Apache"]+$_POST["amount_purchase"];
                    break;
        case "Bristol Blenheim":
          $itemcost=$b3*$_POST["amount_purchase"];
          $item_infras=$f3_infras;
          $item_tech=$f3_tech;
$rsAircraft["Bristol Blenheim"]=$rsAircraft["Bristol Blenheim"]+$_POST["amount_purchase"];
                    break;
        case "B-25 Mitchell":
          $itemcost=$b4*$_POST["amount_purchase"];
          $item_infras=$f4_infras;
          $item_tech=$f4_tech;
$rsAircraft["B-25 Mitchell"]=$rsAircraft["B-25 Mitchell"]+$_POST["amount_purchase"];
                    break;
        case "B-17G Flying Fortress":
          $itemcost=$b5*$_POST["amount_purchase"];
          $item_infras=$f5_infras;
          $item_tech=$f5_tech;
$rsAircraft["B-17G Flying Fortress"]=$rsAircraft["B-17G Flying Fortress"]+$_POST["amount_purchase"];
                    break;
        case "B-52 Stratofortress":
          $itemcost=$b6*$_POST["amount_purchase"];
          $item_infras=$f6_infras;
          $item_tech=$f6_tech;
$rsAircraft["B-52 Stratofortress"]=$rsAircraft["B-52 Stratofortress"]+$_POST["amount_purchase"];
                    break;
        case "B-2 Spirit":
          $itemcost=$b7*$_POST["amount_purchase"];
          $item_infras=$f7_infras;
          $item_tech=$f7_tech;
$rsAircraft["B-2 Spirit"]=$rsAircraft["B-2 Spirit"]+$_POST["amount_purchase"];
                    break;
        case "B-1B Lancer":
          $itemcost=$b8*$_POST["amount_purchase"];
          $item_infras=$f8_infras;
          $item_tech=$f8_tech;
$rsAircraft["B-1B Lancer"]=$rsAircraft["B-1B Lancer"]+$_POST["amount_purchase"];
                    break;
        case "Tupolev Tu-160":
          $itemcost=$b9*$_POST["amount_purchase"];
          $item_infras=$f9_infras;
          $item_tech=$f9_tech;
$rsAircraft["Tupolev Tu-160"]=$rsAircraft["Tupolev Tu-160"]+$_POST["amount_purchase"];
                    break;
      } 



    } 


    if ($totalmoneyavailable-$itemcost<0 || $rsGuestbook["Infrastructure_Purchased"]<$item_infras || $rsGuestbook["Technology_Purchased"]<$item_tech)
    {

      $denyreason_session="You do not have that much money, infrastructure, or technology to purchase that aircraft.";
      header("Location: "."activity_denied.asp");
    }
      else
    {

      
$rsGuestbook["Money_Spent"]=$itemcost+$rsGuestbook["Money_Spent"];
      $rsGuestbook["Number_Of_Purchases"]=$rsGuestbook["Number_Of_Purchases"]+1;
            
    } 


    
    $rsGuestbook=null;

    
    $rsAircraft=null;


    $lngRecordNo=$rsGuestbookHead["Nation_ID"];
?>
	<!--#include file="database_nationstrength.php" -->
	<? 

    header("Location: "."aircraft_purchase.asp");
  } ?>



<? }
  else
{
?>
<font color="#FF0000"><p></p>You must <a href="pay_bills.asp?Nation_ID=<?   echo $rsGuestbook["Nation_ID"]; ?>">pay your bills</a>
before you can make any more purchases.<p></p>
<? } ?>
	
	</td>
	</tr>
	</table>







<!--#include file="inc_footer.php" -->

<? 
$rsGuestbook->Close;
$rsGuestbook=null;

$rsAircraft->Close;
$rsAircraft=null;


$objConn->Close();
$objConn=null;

?>
