<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
?>
<!--#include file="connection.php" -->
<? //end if

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
$lngRecordNo=$rsGuestbookHead["Nation_ID"];
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);

$soldierslostalltime=intval($rsGuestbook["Military_Defending_Casualties"])+intval($rsGuestbook["Military_Attacking_Casualties"]);
?> 

<? 
// $rsWonders is of type "ADODB.Recordset"

$rsWondersSQL="SELECT * FROM National_Wonders WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsWondersSQL);

$totalwonders=0;
if ((!($rsWonders_BOF==1)) && (!($rsWonders==0)))
{

  $totalwonders=$rsWonders["Internet"]+$rsWonders["Space_Program"]+$rsWonders["Great_Monument"]+$rsWonders["Movie_Industry"]+$rsWonders["Great_University"]+$rsWonders["Research_Lab"]+$rsWonders["Social_Security"]+$rsWonders["Disaster_Relief"]+$rsWonders["Interstate_System"]+$rsWonders["Great_Temple"]+$rsWonders["War_Memorial"]+$rsWonders["Stock_Market"];
} 

?> 


<? 
$InternetCost=$FormatNumber[35000000][2];
$SpaceCost=$FormatNumber[30000000][2];
$MonumentCost=$FormatNumber[35000000][2];
$MovieCost=$FormatNumber[26000000][2];
$UniversityCost=$FormatNumber[35000000][2];
$ResearchCost=$FormatNumber[35000000][2];
$SocialCost=$FormatNumber[40000000][2];
$DisasterCost=$FormatNumber[40000000][2];
$InterstateCost=$FormatNumber[45000000][2];
$TempleCost=$FormatNumber[35000000][2];
$MemorialCost=$FormatNumber[27000000][2];
$StockCost=$FormatNumber[30000000][2];
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
<b><font color="#FFFFFF">:. Purchase National Wonders for </font> <a href="nation_drill_display.asp?Nation_ID=<? echo $rsGuestbook["Nation_ID"]; ?>">
		<font color="#FFFFFF"><? echo $rsGuestbook["Nation_Name"]; ?></font></a><font color="#FFFFFF">
		</font> </b>
		</td>
	</tr>
	<tr>
			<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">Current <? echo ($rsGuestbook["Currency_Type"].$Value); ?>s Available</td>
			<td width="70%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="3">$<? echo $FormatNumber[$totalmoneyavailable][2]; ?></td>
		</tr>
<? if ((!($rsWonders_BOF==1)) && (!($rsWonders==0)))
{
?>		
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">Internet</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?   echo $rsWonders["Internet"]; ?>
<?   if ($rsWonders["Internet"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Internet" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
Space Program</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?   echo $rsWonders["Space_Program"]; ?>
<?   if ($rsWonders["Space_Program"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Space_Program" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
</tr>
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
Great Monument</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?   echo $rsWonders["Great_Monument"]; ?>
<?   if ($rsWonders["Great_Monument"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Great_Monument" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
Movie Industry</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?   echo $rsWonders["Movie_Industry"]; ?>
<?   if ($rsWonders["Movie_Industry"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Movie_Industry" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
</tr>
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
Great University</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?   echo $rsWonders["Great_University"]; ?>
<?   if ($rsWonders["Great_University"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Great_University" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
National Research Lab</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?   echo $rsWonders["Research_Lab"]; ?>
<?   if ($rsWonders["Research_Lab"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Research_Lab" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
</tr>
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
Social Security System</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?   echo $rsWonders["Social_Security"]; ?>
<?   if ($rsWonders["Social_Security"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Social_Security" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
Disaster Relief Agency</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?   echo $rsWonders["Disaster_Relief"]; ?>
<?   if ($rsWonders["Disaster_Relief"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Disaster_Relief" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
</tr>
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
Interstate System</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000"><?   echo $rsWonders["Clinics"]; ?>
<?   echo $rsWonders["Interstate_System"]; ?>
<?   if ($rsWonders["Interstate_System"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Interstate_System" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
Great Temple</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?   echo $rsWonders["Great_Temple"]; ?>
<?   if ($rsWonders["Great_Temple"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Great_Temple" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
</tr>
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
National War Memorial</td>
<td width="24%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?   echo $rsWonders["War_Memorial"]; ?>
<?   if ($rsWonders["War_Memorial"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=War_Memorial" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
Stock Market</td>
<td width="23%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
<?   echo $rsWonders["Stock_Market"]; ?>
<?   if ($rsWonders["Stock_Market"]>0)
  {
?>
<a href="national_wonders_purchase_destroy.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>&Improvement=Stock_Market" onclick="return confirm('Destroying national wonders is free. Are you sure you want to destroy this national wonder? You will not be refunded the original cost of this item.');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?   } ?>
</td>
</tr>
<? }
  else
{
?>
<tr>
<td width="30%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
Wonders Developed</td>
<td width="70%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="3">0</td>
</tr>
<? } ?>
</table>
<br><br>
<? 
if (!isset($rsGuestbook["National_Wonder_Date"]))
{

  $wonderdate=time()()-31;
}
  else
{

  $wonderdate=$rsGuestbook["National_Wonder_Date"];
} 


if (time()()-$wonderdate>=30)
{

?>

<?   if (time()()-$rsGuestbook["Last_Bills_Paid"]<=2)
  {
?>



<?     if ($_POST["improvement"]=="")
    {
?>
<table border="1" width="100%" id="table2" cellpadding="5" bordercolor="#000080" cellspacing="0">
<form name="FrontPage_Form1" method="post">	
<tr>
<td>
National wonders are great improvements that you can purchase to 
further advance your nation once you reach the upper echelons of development. 
National wonders are the most expensive improvements in the game but like standard 
improvements 
they are not subject to outside forces during war. You may only purchase one 
of each type of national wonder and only one wonder every 30 days. Click on the 
national wonder that you would like to purchase.</td>
</tr>


<tr>
<td>
<table border="0" width="100%" id="table3" cellpadding="5">

<?       if ($rsWonders["Internet"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$InternetCost>=0)
        {

          $purchaseok=1;
?>
	<tr>
	<td width="20" valign="top">
	<input type="radio" value="Internet" name="improvement" onClick="this.form.submit()"></td>
	<td valign="top"><b>Internet</b> - $<?           echo $InternetCost; ?> - Provides Internet infrastructure throughout your nation. Increases population happiness +5.
	</td>
	</tr>
	<?         } ?>
<?       } ?>


<?       if ($rsWonders["Space_Program"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$SpaceCost>=0)
        {

          $purchaseok=1;
?>
	<tr>
	<td width="20" valign="top">
	<input type="radio" value="Space_Program" name="improvement" onClick="this.form.submit()"></td>
	<td valign="top"><b>Space Program</b> - $<?           echo $SpaceCost; ?> - The space program sends your astronauts to the moon and beyond. Increases happiness +3, lowers technology cost -3% and lowers aircraft cost -5%.
</td>
	</tr>
	<?         } ?>
<?       } ?>

<?       if ($rsWonders["Great_Monument"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$MonumentCost>=0)
        {

          $purchaseok=1;
?>
	<tr>
	<td width="20" valign="top">
	<input type="radio" value="Great_Monument" name="improvement" onClick="this.form.submit()"></td>
	<td valign="top"><b>Great Monument</b> - $<?           echo $MonumentCost; ?> -
	The great monument is a testament to your great leadership. Increases happiness +4 and your population will always be happy with your government choice. 
	</td>
	</tr>
	<?         } ?>
<?       } ?>


<?       if ($rsWonders["Movie_Industry"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$MovieCost>=0)
        {

          $purchaseok=1;
?>
	<tr>
	<td width="20" valign="top">
	<input type="radio" value="Movie_Industry" name="improvement" onClick="this.form.submit()"></td>
	<td valign="top"><b>Movie Industry</b> - $<?           echo $MovieCost; ?> - 
	The movie industry provides a great source of entertainment to your people. Increases population happiness +3. 

	</td>
	</tr>
	<?         } ?>
<?       } ?>


<?       if ($rsWonders["Great_University"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$UniversityCost>=0)
        {

          $purchaseok=1;
?>
	<tr>
	<td width="20" valign="top">
	<input type="radio" value="Great_University" name="improvement" onClick="this.form.submit()"></td>
	<td valign="top"><b>Great University</b> - $<?           echo $UniversityCost; ?> - 
	The great university is a central location for scholars within your nation. Decreases technology costs -10% and increases population happiness +.2% (+2 for every 1000) of your nation's technology level over 200 up to 3,000 tech.
	</td>
	</tr>
	<?         } ?>
<?       } ?>

<?       if ($rsWonders["Research_Lab"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$ResearchCost>=0)
        {

          $purchaseok=1;
?>
	<tr>
	<td width="20" valign="top">
	<input type="radio" value="Research_Lab" name="improvement" onClick="this.form.submit()"></td>
	<td valign="top"><b>National Research Lab</b> - $<?           echo $ResearchCost; ?> - 
	The national research lab is a central location for scientists seeking cures for common diseases among your population. Increases population +5% and decreases technology costs -3%. 
	</td>
	</tr>
	<?         } ?>
<?       } ?>


<?       if ($rsWonders["Social_Security"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$SocialCost>=0)
        {

          $purchaseok=1;
?>
		<tr>
		<td width="20" valign="top">
		<input type="radio" value="Social_Security" name="improvement" onClick="this.form.submit()"></td>
		<td valign="top"><b>Social Security System</b> - $<?           echo $SocialCost; ?> - 
		The social security system provides benefits to aging members of your nation. Allows you to raise taxes above 28% up to 30% without additional happiness penalties.
		</td>
		</tr>
		<?         } ?>
<?       } ?>


<?       if ($rsWonders["Disaster_Relief"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$DisasterCost>=0)
        {

          $purchaseok=1;
?>
	<tr>
	<td width="20" valign="top">
	<input type="radio" value="Disaster_Relief" name="improvement" onClick="this.form.submit()"></td>
	<td valign="top"><b>Disaster Relief Agency</b> - $<?           echo $DisasterCost; ?> -
	The disaster relief agency helps restore your nation and its people after emergency situations. Increases population +3% and opens one extra foreign aid slot. 
	</td>
	</tr>
	<?         } ?>
<?       } ?>


<?       if ($rsWonders["Interstate_System"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$InterstateCost>=0)
        {

          $purchaseok=1;
?>
		<tr>
		<td width="20" valign="top">
		<input type="radio" value="Interstate_System" name="improvement" onClick="this.form.submit()"></td>
		<td valign="top"><b>Interstate System</b> - $<?           echo $InterstateCost; ?> - 
		The interstate system allows goods and materials to be transported throughout your nation with greater ease. Decreases initial infrastructure cost -8% and decreases infrastructure upkeep costs -8%. 
		</td>
		</tr>
		<?         } ?>
<?       } ?>


<?       if ($rsWonders["Great_Temple"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$TempleCost>=0)
        {

          $purchaseok=1;
?>
	<tr>
	<td width="20" valign="top" height="32">
	<input type="radio" value="Great_Temple" name="improvement" onClick="this.form.submit()"></td>
	<td valign="top" height="32"><b>Great Temple</b> - $<?           echo $TempleCost; ?> -
	The great temple is a dedicated shrine to your national religion. Increases happiness +5 and your population will always be happy with your religion choice. 
	</td>
	</tr>
	<?         } ?>
<?       } ?>



<?       if ($rsWonders["War_Memorial"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$MemorialCost>=0 && (intval($soldierslostalltime)-50000>=0))
        {

          $purchaseok=1;
?>
	<tr>
	<td width="20" valign="top">
	<input type="radio" value="War_Memorial" name="improvement" onClick="this.form.submit()"></td>
	<td valign="top"><b>National War Memorial</b> - $<?           echo $MemorialCost; ?> - 
	The war memorial allows your citizens to remember its fallen soldiers. This improvement is only available to nations that have lost over 50,000 soldiers during war throughout the life of your nation. Increases population happiness +3, Increases soldier count +10%. 

	</td>
	</tr>
	<?         } ?>
<?       } ?>



<?       if ($rsWonders["Stock_Market"]<1)
      {
?>
	<?         if ($totalmoneyavailable-$StockCost>=0)
        {

          $purchaseok=1;
?>
	<tr>
	<td width="20" valign="top">
	<input type="radio" value="Stock_Market" name="improvement" onClick="this.form.submit()"></td>
	<td valign="top"><b>Stock Market</b> - $<?           echo $StockCost; ?> - 
	The stock market provides a boost to your economy. Increases citizen income +$10.00. 

	</td>
	</tr>
	<?         } ?>
<?       } ?>




<?       if ($purchaseok!=1)
      {
?>
Sorry, but there are no national wonders available to you at this time.
<?       } ?> 

</table>




</td>
</tr>
</table><br><br>
&nbsp;
</form>
<?     } ?> 

<?     if ($_POST["improvement"]!="")
    {
?>
<? 
      switch ($_POST["improvement"])
      {
        case "Internet":
          $itemcost=$InternetCost;
          break;
        case "Space_Program":
          $itemcost=$SpaceCost;
          break;
        case "Great_Monument":
          $itemcost=$MonumentCost;
          break;
        case "Movie_Industry":
          $itemcost=$MovieCost;
          break;
        case "Great_University":
          $itemcost=$UniversityCost;
          break;
        case "Research_Lab":
          $itemcost=$ResearchCost;
          break;
        case "Social_Security":
          $itemcost=$SocialCost;
          break;
        case "Disaster_Relief":
          $itemcost=$DisasterCost;
          break;
        case "Interstate_System":
          $itemcost=$InterstateCost;
          break;
        case "Great_Temple":
          $itemcost=$TempleCost;
          break;
        case "War_Memorial":
          $itemcost=$MemorialCost;
          break;
        case "Stock_Market":
          $itemcost=$StockCost;
          break;
      } 


      switch ($_POST["improvement"])
      {
        case "Internet":
          $wondertype="Internet System";
          break;
        case "Space_Program":
          $wondertype="Space Program";
          break;
        case "Great_Monument":
          $wondertype="Great Monument";
          break;
        case "Movie_Industry":
          $wondertype="Movie Industry";
          break;
        case "Great_University":
          $wondertype="Great University";
          break;
        case "Research_Lab":
          $wondertype="National Research Lab";
          break;
        case "Social_Security":
          $wondertype="Social Security System";
          break;
        case "Disaster_Relief":
          $wondertype="Disaster Relief Agency";
          break;
        case "Interstate_System":
          $wondertype="Interstate System";
          break;
        case "Great_Temple":
          $wondertype="Great Temple";
          break;
        case "War_Memorial":
          $wondertype="National War Memorial";
          break;
        case "Stock_Market":
          $wondertype="Stock Market";
          break;
      } 

?>



<table border="1" width="100%" id="table2" cellpadding="5" cellspacing="0" bordercolor="#000080">
<form name="FrontPage_Form2" method="post" action="national_wonders_purchase_code.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>">
<tr>
<td>
<p align="center">


You selected to develop a <?       echo $wondertype; ?> at $<?       echo $itemcost; ?>.<p align="center">

<? 
      if ($_POST["improvement"]=="Internet")
      {

        print "<img src='http://cybernations.net/images/wonders/Internet.JPG' title='Internet system.'>";
      } 

      if ($_POST["improvement"]=="Space_Program")
      {

        print "<img src='http://cybernations.net/images/wonders/Space_Program.JPG' title='Space Program.'>";
      } 

      if ($_POST["improvement"]=="Great_Monument")
      {

        print "<img src='http://cybernations.net/images/wonders/Great_Monument.JPG' title='Great Monument.'>";
      } 

      if ($_POST["improvement"]=="Movie_Industry")
      {

        print "<img src='http://cybernations.net/images/wonders/Movie_Industry.JPG' title='Movie Industry.'>";
      } 

      if ($_POST["improvement"]=="Great_University")
      {

        print "<img src='http://cybernations.net/images/wonders/Great_University.JPG' title='Great University.'>";
      } 

      if ($_POST["improvement"]=="Research_Lab")
      {

        print "<img src='http://cybernations.net/images/wonders/Research_Lab.JPG' title='National Research Lab.'>";
      } 

      if ($_POST["improvement"]=="Social_Security")
      {

        print "<img src='http://cybernations.net/images/wonders/Social_Security.JPG' title='Social Security System.'>";
      } 

      if ($_POST["improvement"]=="Disaster_Relief")
      {

        print "<img src='http://cybernations.net/images/wonders/Disaster_Relief.JPG' title='Disaster Relief Agency.'>";
      } 

      if ($_POST["improvement"]=="Interstate_System")
      {

        print "<img src='http://cybernations.net/images/wonders/Interstate_System.JPG' title='Interstate System.'>";
      } 

      if ($_POST["improvement"]=="Great_Temple")
      {

        print "<img src='http://cybernations.net/images/wonders/Great_Temple.JPG' title='Great Temple.'>";
      } 

      if ($_POST["improvement"]=="War_Memorial")
      {

        print "<img src='http://cybernations.net/images/wonders/War_Memorial.JPG' title='National War Memorial.'>";
      } 

      if ($_POST["improvement"]=="Stock_Market")
      {

        print "<img src='http://cybernations.net/images/wonders/Stock_Market.JPG' title='Stock Market.'>";
      } 

?>

<p align="center"><br>
<!--#include file="activitycheck.php" -->
<input type="hidden" name="Number_Of_Purchases" value="1">
<input type="hidden" name="Nation_ID" value="<?       echo $rsGuestbook["Nation_ID"]; ?>">
<input type="hidden" name="improvement" value="<?       echo $_POST["improvement"]; ?>">

<input type="submit" class="Buttons" name="Submit" value="Develop National Wonder">

<br>
&nbsp;</td>
</tr>
</form>
</table>
<?     } ?>







<?   }
    else
  {
?>
<font color="#FF0000"><p></p>You must <a href="pay_bills.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>">pay your bills</a>
 before you can make any more purchases.<p></p>
</font>


<?   } ?>

<? }
  else
{
?>
<font color="#FF0000"><p></p>You last developed a national wonder on <?   echo $rsGuestbook["National_Wonder_Date"]; ?> and cannot develop
new national wonders until <?   echo $rsGuestbook["National_Wonder_Date"]+30; ?>.<p></p>
</font>


<? } ?>
</td>
</tr>
</table>



<p align="center">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> 
</b><i>For a full list of all available national wonders
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=38839">click here</a>.</i></p>



<!--#include file="inc_footer.php" -->

<? 
$objConn->Close();
$objConn=null;

?>
