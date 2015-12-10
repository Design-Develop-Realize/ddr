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


  
<!--#include file="inc_header.php" -->


<body bgcolor="white" text="black">
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
<!--#include file="calculations_costs.php" -->
<?     $last_date=time()()-$rsGuestbook["Last_Bills_Paid"];
    if ($last_date>0 && $last_date<1)
    {

      $last_date=1;
    } 

?>
   <table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<form name="FrontPage_Form1" method="post" action="pay_bills_code.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>">
	<tr>
		<td align="right" colspan="2" bgcolor="#000080">
		<p align="center">
		<img border="0" src="images/billsfinal.jpg" width="500" height="100"></td>
	</tr>

	<tr>
		<td align="right" width="50%" valign="top" bgcolor="#FFFFFF">Last Bill Payment Date</td>
		<td width="50%" bgcolor="#FFFFFF"> 
		<?     echo $rsGuestbook["Last_Bills_Paid"]; ?></td>
	</tr>
	<tr>
		<td align="right" width="50%" valign="top" bgcolor="#FFFFFF">Days Since Last Bill Payment</td>
		<td width="50%" bgcolor="#FFFFFF"> 

<?     echo $last_date; ?></td>
	</tr>
	<tr>
		<td align="right" width="50%" valign="top" bgcolor="#FFFFFF">
		Current Money Available</td>
		<td width="50%" bgcolor="#FFFFFF"> $<?     echo $totalmoneyavailable; ?></td>
	</tr>
	
	
	
	<tr>
		<td align="right" width="100%" bgcolor="#C0C0C0" valign="top" colspan="2">
		<table border="0" width="100%" id="table2" cellspacing="0" cellpadding="0">
			<tr>
				<td><b>Begin Detailed Summary</b></td>
				<td>
				<p align="right"><i>Only items that you own are shown</i></td>
			</tr>
		</table>
		</td>
	</tr>
	
	
	
	
	
	<?     if ($rsGuestbook["Infrastructure_Purchased"]>0)
    {
?>
	<tr>
		<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Infrastructure Purchased</td>
		<td width="50%" bgcolor="#FFFFFF"> 
		<?       echo $FormatNumber[$rsGuestbook["Infrastructure_Purchased"]][2]; ?></td>
	</tr>
	<tr>
		<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Daily Infrastructure Cost (Per 1 Unit)</td>
		<td width="50%" bgcolor="#FFFFFF"> 
		$<?       echo $FormatNumber[$dailybuildingcost][2]; ?></td>
	</tr>
	<tr>
		<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">
		<font color="#FF0000">Infrastructure Bill</font></td>
		<td width="50%" bgcolor="#FFFFFF"> 
	<font color="#FF0000"> 
	<?       $infrastructurebill=($FormatNumber[$rsGuestbook["Infrastructure_Purchased"]][2]*$FormatNumber[$dailybuildingcost][2])*$last_date;
?>
	$<?       echo $FormatNumber[$infrastructurebill][2]; ?>
	</font>
	</td>
		</tr>
	<?     } ?>
	
	
	

	<?     if ($actualmilitary>0)
    {
?>
	<tr>
			<td align="right" width="50%" valign="top" bgcolor="#FFFFFF">Number of Soldiers</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			<?       echo $FormatNumber[($actualmilitary)][0]; ?></td>
		</tr>
		<tr>
			<td align="right" width="50%" valign="top" bgcolor="#FFFFFF">Daily Soldier Cost (Per 1 Unit)</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			$<?       echo $FormatNumber[$dailysoldiercost][2]; ?>
			
			</td>
		</tr>
		<tr>
			<td align="right" width="50%" valign="top" bgcolor="#FFFFFF">
			<font color="#FF0000">Soldier Bill</font></td>
			<td width="50%" bgcolor="#FFFFFF"> 
	<font color="#FF0000"> 
	<?       $militarybill=($dailysoldiercost*($FormatNumber[$actualmilitary][0]))*$last_date;
      if ($militarybill<0)
      {
        $militarybill=0;
      }
;
      } ?>
	$<?       echo $FormatNumber[$militarybill][2]; ?>
	</font>
	</td>
	</tr>
	<?     } ?>
	



	<?     if ($numberoftanks>0)
    {
?>
	<tr>
	<td align="right" width="50%" valign="top" bgcolor="#FFFFFF">Number of Tanks</td>
	<td width="50%" bgcolor="#FFFFFF"> 
	<?       echo $numberoftanks; ?>
	</td>
	</tr>
	<tr>
	<td align="right" width="50%" valign="top" bgcolor="#FFFFFF">Daily Tank Cost (Per 1 Unit)</td>
	<td width="50%" bgcolor="#FFFFFF"> 
	$<?       echo $FormatNumber[$dailytankcost][2]; ?>
	<? 
      if ($numberoftanks>($actualmilitary*10))
      {

        print "<br><i>You have more tanks than your soliders can maintain. Your bill has been increased as a result.</i>";
      } 

?>
	
	</td>
	</tr>
	<tr>
	<td align="right" width="50%" valign="top" bgcolor="#FFFFFF">
	<font color="#FF0000">Tank Bill</font></td>
	<td width="50%" bgcolor="#FFFFFF"> 
	<font color="#FF0000"> 
	<?       $tankbill=($dailytankcost*($FormatNumber[$numberoftanks][0]))*$last_date;
?>
	$<?       echo $FormatNumber[$tankbill][2]; ?>
	</font>
	</td>
	</tr>
	<?     } ?>
	
	
	
	<?     if ($cruisemissles>0)
    {
?>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Number of&nbsp; Cruise 
			Missiles</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			<?       echo $cruisemissles; ?></td>
		</tr>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Daily Cruise 
			Missiles Cost (Per 1 Unit)</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			$<?       echo $FormatNumber[$dailycruisecost][2]; ?></td>
		</tr>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">
			<font color="#FF0000">Cruise 
			Missiles Bill</font></td>
			<td width="50%" bgcolor="#FFFFFF"> 
	<font color="#FF0000"> 
	<?       $cruisebill=($dailycruisecost*$cruisemissles)*$last_date;
?>
	$<?       echo $FormatNumber[$cruisebill][2]; ?>
	</font>
	</td>
		</tr>	
	<?     } ?>
	
	
<? 
// $rsAircraft is of type "ADODB.Recordset"

    $rsAircraftSQL="SELECT * FROM Aircraft WHERE Nation_ID=".$rsGuestbook["Nation_ID"];
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query($rsAircraftSQL);
    if (!($rsAircraft_BOF==1) && !($rsAircraft==0))
    {

      $totalaircraft=$rsAircraft["Yakovlev Yak-9"]+$rsAircraft["P-51 Mustang"]+$rsAircraft["F-86 Sabre"]+$rsAircraft["Mikoyan-Gurevich MiG-15"]+$rsAircraft["F-100 Super Sabre"]+$rsAircraft["F-35 Lightning II"]+$rsAircraft["F-15 Eagle"]+$rsAircraft["Su-30 MKI"]+$rsAircraft["F-22 Raptor"]+$rsAircraft["AH-1 Cobra"]+$rsAircraft["AH-64 Apache"]+$rsAircraft["Bristol Blenheim"]+$rsAircraft["B-25 Mitchell"]+$rsAircraft["B-17G Flying Fortress"]+$rsAircraft["B-52 Stratofortress"]+$rsAircraft["B-2 Spirit"]+$rsAircraft["B-1B Lancer"]+$rsAircraft["Tupolev Tu-160"];
    } 

    
    $rsAircraft=null;

?>
	<?     if ($totalaircraft>0)
    {
?>	
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Number of&nbsp; 
			Aircraft</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			<?       echo $FormatNumber[$totalaircraft][0]; ?> </td>
		</tr>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Daily 
			Aircraft Cost (Per 1 Unit)</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			$<?       echo $FormatNumber[$dailyaircraftcost][2]; ?></td>
		</tr>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">
			<font color="#FF0000">Aircraft Bill</font></td>
			<td width="50%" bgcolor="#FFFFFF"> 
	<font color="#FF0000"> 
	<?       $aircraftbill=($dailyaircraftcost*$totalaircraft)*$last_date;
?>
	$<?       echo $FormatNumber[$aircraftbill][2]; ?>
	</font>
	</td>
		</tr>
	<?     } ?>
	
	
	<?     if ($rsGuestbook["Nuclear_Purchased"]>0)
    {
?>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Number of&nbsp; Nuclear Weapons</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			<?       echo $rsGuestbook["Nuclear_Purchased"]; ?></td>
		</tr>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Daily Nuclear Weapon Cost (Per 1 Unit)</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			$<?       echo $FormatNumber[$dailynuclearcost][2]; ?></td>
		</tr>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">
			<font color="#FF0000">Nuclear Weapon Bill</font></td>
			<td width="50%" bgcolor="#FFFFFF"> 
	<font color="#FF0000"> 
	<?       $nuclearbill=($dailynuclearcost*($rsGuestbook["Nuclear_Purchased"].$Value))*$last_date;
?>
	$<?       echo $FormatNumber[$nuclearbill][2]; ?>
	</font>
	</td>
		</tr>
	<?     } ?>

<? 
    $totalimprove=$banks+$barracks+$border_walls+$churches+$clinics+$factories+$foreign_ministries+$guerilla_camps+$harbors+$hospitals+$intelligence_agencies+$labor_camps+$missile_defenses+$police_headquarters+$satellites+$schools+$stadiums+$universities;
    $improvecost=500; //base cost for calculations
;
    if ($totalimprove>=5)
    {

      $improvecost=$improvecost+100;
    } 

    if ($totalimprove>=8)
    {

      $improvecost=$improvecost+150;
    } 

    if ($totalimprove>=15)
    {

      $improvecost=$improvecost+200;
    } 

    if ($totalimprove>=20)
    {

      $improvecost=$improvecost+250;
    } 

    if ($totalimprove>=30)
    {

      $improvecost=$improvecost+300;
    } 

    if ($totalimprove>=40)
    {

      $improvecost=$improvecost+500;
    } 

    if ($totalimprove>=50)
    {

      $improvecost=$improvecost+1000;
    } 

    $improvebill=($totalimprove*$improvecost)*$last_date;
?>


	<?     if ($totalimprove>0)
    {
?>	
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Number of&nbsp; 
			Nation Improvements</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			<?       echo $totalimprove; ?></td>
		</tr>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Daily 
			Improvement Taxes</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			$<?       echo $FormatNumber[$improvecost][2]; ?></td>
		</tr>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">
			<font color="#FF0000">Improvement Bill</font></td>
			<td width="50%" bgcolor="#FFFFFF"> 
	<font color="#FF0000">$<?       echo $FormatNumber[$improvebill][2]; ?>
	</font>
	</td>
		</tr>
	<?     } ?>	
	
<? 
    $totalwonder=$InternetWonder+$SpaceWonder+$MonumentWonder+$MovieWonder+$UniversityWonder+$ResearchWonder+$SocialWonder+$DisasterWonder+$InterstateWonder+$TempleWonder+$MemorialWonder+$StockWonder;
    $wondercost=5000; //base cost for calculations
;
    $wonderbill=($totalwonder*$wondercost)*$last_date;
?>
	<?     if ($totalwonder>0)
    {
?>	
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Number of&nbsp; 
			National Wonders</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			<?       echo $totalwonder; ?></td>
		</tr>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">Daily 
			Wonders Taxes</td>
			<td width="50%" bgcolor="#FFFFFF"> 
			$<?       echo $FormatNumber[$wondercost][2]; ?></td>
		</tr>
		<tr>
			<td align="right" width="50%" bgcolor="#FFFFFF" valign="top">
			<font color="#FF0000">Wonder Bill</font></td>
			<td width="50%" bgcolor="#FFFFFF"> 
	<font color="#FF0000">$<?       echo $FormatNumber[$wonderbill][2]; ?>
	</font>
	</td>
		</tr>
	<?     } ?>		
	
	<tr>
<td align="right" width="100%" valign="top" bgcolor="#C0C0C0" colspan="2">
<p align="left"><b>End Detailed Summary</b></td>
	</tr>
	
	<tr>
<td align="right" width="50%" valign="top" bgcolor="#FFFFFF"><i>Total Cost of All Bills</i></td>
<td width="50%" bgcolor="#FFFFFF"> 
<i> 
<?     $billcollection=$militarybill+$infrastructurebill+$nuclearbill+$tankbill+$cruisebill+$improvebill+$aircraftbill+$wonderbill;
?>
$<?     echo $FormatNumber[$billcollection][2]; ?></i></td>
	</tr>
	<tr>
<td align="right" width="50%" valign="top" bgcolor="#FFFFFF"><i>Interest Charged on 
All Bills</i></td>
<td width="50%" bgcolor="#FFFFFF"> 
<i> 
<? 



    $maxbillinterest=5000;
    $billinterest=($billcollection*.10)*($last_date-1);

    if ($totalmoneyavailable<0)
    {

      $billinterest=0;
    } 

    if ($billinterest<0)
    {

      $billinterest=0;
    } 

    if ($billinterest>$maxbillinterest)
    {

      $billinterest=$maxbillinterest;
    } 

?>
$<?     echo $FormatNumber[$billinterest][2]; ?> <br>
10% per day. (Max $<?     echo $maxbillinterest; ?>) <br>
No interest on first day.</i></td>
	</tr>
	<tr>
<td align="right" width="50%" valign="top" bgcolor="#FFFF99"><b>Total Bill Payment</b></td>
<td width="50%" bgcolor="#FFFF99"> 
<b> 
<?     $collection=$billcollection+$billinterest;
    $collection=$FormatNumber[$collection][2];
?>
$<?     echo $FormatNumber[$collection][2]; ?></b></td>

	</tr>
	<tr>
<td align="right" width="50%" valign="top" bgcolor="#FFFF99"><b>Money Left After Bill Payment</b></td>
<td width="50%" bgcolor="#FFFF99"> 
<b> 
<?     $leftover=$totalmoneyavailable-($billcollection+$billinterest);
    $leftover=$FormatNumber[$leftover][2];
?>
$<?     echo $FormatNumber[$leftover][2]; ?></b></td>
	</tr>
			
	</table>
	<p align="center">   
   
 
   

   <input type="hidden" name="Nation_ID" value="<?     echo $rsGuestbook["Nation_ID"]; ?>">
<?     if ($leftover>=0)
    {
?>
	<?       if ($last_date==0)
      {
?>
	<font color="#FF0000">You cannot pay bills today. You may only pay bills once a day.<br>
	The daily update occurs at 6 am GMT. The current server date and time is <?         echo strftime("%m/%d/%Y %H:%M:%S %p")(); ?>.</font>
	<?       }
        else
      {
?>
	<!--#include file="activitycheck.php" -->
	<input type="submit" class="Buttons" name="Submit" value="Pay Bills">
	<?       } ?>
<?     }
      else
    {
?>
	<?       if ($last_date==0)
      {
?>
	<font color="#FF0000">You cannot pay bills today. You may only pay bills once a day.<br>
	The daily update occurs at 5 am GMT. The current server date and time is <?         echo strftime("%m/%d/%Y %H:%M:%S %p")(); ?>.</font>
	<?       }
        else
      {
?>
	<font color="#FF0000">You do not have enough money to pay your bills today.
	<?       } ?>
<?     } ?>
</p>
</form>
<!-- End form code -->
</body>
<?   } ?>
</html>
<!--#include file="inc_footer.php" -->
<? 
//Reset server objects


  
  $rsGuestbook=null;

$objConn->Close;
  $objConn=null;

?>
<? } ?>
