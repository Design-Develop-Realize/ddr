<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
?>
<? if ($_POST["Nation_ID"]=="")
{
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
  $lngRecordNo=intval($_GET["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

  $rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsGuestbookSQL);
  $rsGuestbook_numRows=0;
?> 

<? 
// $rsImprovements is of type "ADODB.Recordset"

  $rsImprovementsSQL="SELECT Improvements.* FROM Improvements WHERE Nation_ID=".$lngRecordNo;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsImprovementsSQL);
  $rsImprovements_numRows=0;

  $totalimprovements=0;
  if ((!($rsImprovements_BOF==1)) && (!($rsImprovements==0)))
  {

    $totalimprovements=$rsImprovements["Banks"]+$rsImprovements["Barracks"]+$rsImprovements["Border_Walls"]+$rsImprovements["Churches"]+$rsImprovements["Clinics"]+$rsImprovements["Factories"]+$rsImprovements["Foreign_Ministries"]+$rsImprovements["Guerilla_Camps"]+$rsImprovements["Harbors"]+$rsImprovements["Hospitals"]+$rsImprovements["Intelligence_Agencies"]+$rsImprovements["Labor_Camps"]+$rsImprovements["Missile_Defenses"]+$rsImprovements["Police_Headquarters"]+$rsImprovements["Satellites"]+$rsImprovements["Schools"]+$rsImprovements["Stadiums"]+$rsImprovements["Universities"];
  } 

?> 


<? 
  $bankscost=$FormatNumber[100000][2];
  $barrackscost=$FormatNumber[50000][2];
  $border_wallscost=$FormatNumber[60000][2];
  $churchescost=$FormatNumber[40000][2];
  $clinicscost=$FormatNumber[50000][2];
  $factoriescost=$FormatNumber[80000][2];
  $Foreign_Ministriescost=$FormatNumber[120000][2];
  $Guerilla_Campscost=$FormatNumber[20000][2];
  $harborscost=$FormatNumber[200000][2];
  $hospitalscost=$FormatNumber[180000][2];
  $Intelligence_Agenciescost=$FormatNumber[38500][2];
  $labor_campscost=$FormatNumber[50000][2];
  $missile_defensescost=$FormatNumber[90000][2];
  $Police_Headquarterscost=$FormatNumber[75000][2];
  $satellitescost=$FormatNumber[90000][2];
  $schoolscost=$FormatNumber[85000][2];
  $stadiumscost=$FormatNumber[110000][2];
  $universitiescost=$FormatNumber[180000][2];
?>

<!--#include file="inc_header.php" -->


<?   if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
  {
?>
	<font color="#FF0000">Please do not attempt to cheat.</font>
<?   }
    else
  {
?>

<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->



<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0" bordercolor="#000080">
<tr>
<td>
<table border="1" width="100%" id="table4" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td width="100%" align="right" valign="top" colspan="4" bgcolor="#000080">
		<p align="left">
<b><font color="#FFFFFF">:. Purchase Nation Improvements for </font> <a href="nation_drill_display.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>">
		<font color="#FFFFFF"><?     echo $rsGuestbook["Nation_Name"]; ?></font></a><font color="#FFFFFF">
		</font> </b>
		</td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">Current Citizens</td>
		<td valign="top" width="70%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="3"><?     echo ($FormatNumber[$citizens][0]); ?>  working citizens</i></td>
	</tr>
	<tr>
			<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">Current <?     echo ($rsGuestbook["Currency_Type"].$Value); ?>s Available</td>
			<td width="70%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="3">$<?     echo $FormatNumber[$totalmoneyavailable][2]; ?></td>
		</tr>
<?     if ((!($rsImprovements_BOF==1)) && (!($rsImprovements==0)))
    {
?>		
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">Banks</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?       echo $rsImprovements["Banks"]; ?>
<?       if ($rsImprovements["Banks"]>0)
      {
?>
<a href="improvements_purchase_destroy.asp?Nation_ID=<?         echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Bank" onclick="return confirm('Destroying improvements is free. Are you sure you want to destroy one Bank? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?       } ?>
</td>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
Hospitals</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?       echo $rsImprovements["Hospitals"]; ?>
<?       if ($rsImprovements["Hospitals"]>0)
      {
?>
<a href="improvements_purchase_destroy.asp?Nation_ID=<?         echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Hospital" onclick="return confirm('Destroying improvements is free. Are you sure you want to destroy one Hospital? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?       } ?>
</td>
</tr>
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
Barracks</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?       echo $rsImprovements["Barracks"]; ?>
<?       if ($rsImprovements["Barracks"]>0)
      {
?>
<a href="improvements_purchase_destroy.asp?Nation_ID=<?         echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Barrack" onclick="return confirm('Destroying improvements is free. Are you sure you want to destroy one Barracks? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?       } ?>
</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
Intelligence Agencies</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?       echo $rsImprovements["Intelligence_Agencies"]; ?>
<?       if ($rsImprovements["Intelligence_Agencies"]>0)
      {
?>
<a href="improvements_purchase_destroy.asp?Nation_ID=<?         echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Intelligence Agency" onclick="return confirm('Destroying improvements is free. Are you sure you want to destroy one Intelligence Agency? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?       } ?>
</td>
</tr>
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
Border Walls</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?       echo $rsImprovements["Border_Walls"]; ?>
<?       if ($rsImprovements["Border_Walls"]>0)
      {
?>
<a href="improvements_purchase_destroy.asp?Nation_ID=<?         echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Border Wall" onclick="return confirm('Destroying improvements is free. Are you sure you want to destroy one Border Wall? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?       } ?>
</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
Labor Camps</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?       echo $rsImprovements["Labor_Camps"]; ?>
<?       if ($rsImprovements["Labor_Camps"]>0)
      {
?>
<a href="improvements_purchase_destroy.asp?Nation_ID=<?         echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Labor Camp" onclick="return confirm('Destroying improvements is free. Are you sure you want to destroy one Labor Camp? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?       } ?>
</td>
</tr>
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
Churches</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?       echo $rsImprovements["Churches"]; ?>
<?       if ($rsImprovements["Churches"]>0)
      {
?>
<a href="improvements_purchase_destroy.asp?Nation_ID=<?         echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Church" onclick="return confirm('Destroying improvements is free. Are you sure you want to destroy one Church? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?       } ?>
</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
Missile Defense</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?       echo $rsImprovements["Missile_Defenses"]; ?>
<?       if ($rsImprovements["Missile_Defenses"]>0)
      {
?>
<a href="improvements_purchase_destroy.asp?Nation_ID=<?         echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Missile Defense" onclick="return confirm('Destroying improvements is free. Are you sure you want to destroy one Missile Defense? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?       } ?>
</td>
</tr>
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
Clinics</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000"><?       echo $rsImprovements["Clinics"]; ?>
<?       if ($rsImprovements["Hospitals"]=0$then; )
      {

//Clinics") > 0 then?>      } 

//improvements_purchase_destroy.asp?Nation_ID=<% = rsGuestbook("Nation_ID") ?>    } 
    $Improvement=$Clinic"$onclick="return confirm('Destroying improvements is free. Are you sure you want to destroy one Clinic? You will not be refunded the original cost of this item.');">;
//assets/delete.jpg" width="17" height="17" border="0"></a>


//23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">    $Police$Headquarters</$td>;
//23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">//Police_Headquarters")?>  } 

//Police_Headquarters") > 0 then?>} 

//improvements_purchase_destroy.asp?Nation_ID=<% = rsGuestbook("Nation_ID") ?>&Improvement=Police Headquarters" onclick="return confirm('Destroying improvements is free. Are you sure you want to destroy one Police Headquarters? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<? 
