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
  $lngRecordNo=str_replace("'","''",$lngRecordNo);
// $rsGuestbook is of type "ADODB.Recordset"

  $rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsGuestbookSQL);
  $rsGuestbook_numRows=0;
?> 



<!--#include file="inc_header.php" -->
<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->
<!--#include file="calculations_costs.php" -->
<html>




<?   if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
  {
?>
	<font color="#FF0000">Please do not attempt to cheat.</font>
<?   }
    else
  {
?>





<body bgcolor="white" text="black">



   <table border="1" width="100%" id="table2" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
	<tr>
		<td align="right" valign="top" colspan="2" bgcolor="#000080">
		<p align="left">
<b><font color="#FFFFFF">:. Purchase Cruise Missiles for </font> <a href="nation_drill_display.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>">
		<font color="#FFFFFF"><?     echo $rsGuestbook["Nation_Name"]; ?></font></a><font color="#FFFFFF">
		</font> </b>
		</td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Current Cruise Missiles:</td>
		<td valign="top" width="70%"> 
		
		
		
		<table border="0" width="100%" id="table6" cellspacing="0" cellpadding="0">
			<tr>
				<td><?     echo ($rsGuestbook["Cruise_Purchased"]); ?></td>
				<td width="487">
				<p align="center">
<?     if ($rsGuestbook["Cruise_Purchased"]>0)
    {
?>
		<a href="cruise_destroy.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>" onclick="return confirm('Destroying cruise missiles is free. Are you sure you want to destroy one cruise missile?');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"><br>Decommission One 
				Missile</a>
<?     } ?>
</td>
				<td width="28">&nbsp;</td>
			</tr>
		</table>
		
		</td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Technology Level:</td>
		<td valign="top" width="70%"><?     echo $FormatNumber[$rsGuestbook["Technology_Purchased"]][2]; ?>  </td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">
		Infrastructure Level:</td>
		<td valign="top" width="70%"><?     echo $FormatNumber[$rsGuestbook["Infrastructure_Purchased"]][2]; ?>  </td>
	</tr>
	<tr>
			<td width="30%" align="right">Current <?     echo ($rsGuestbook["Currency_Type"].$Value); ?>s Available:</td>
			<td width="70%">$<?     echo $FormatNumber[$totalmoneyavailable][2]; ?></td>
		</tr>
	<tr>
		<td width="30%" align="right" valign="top">Cruise Missiles Cost Per Unit To Buy:</td>
		<td valign="top" width="70%">$<?     echo $FormatNumber[$cruisecost][2]; ?> </td>
	</tr>

		
	<tr>
<td align="right" valign="top" width="30%">Cruise Missiles Cost to Maintain:</td>
<td valign="top" width="70%">$<?     echo $FormatNumber[$dailycruisecost][2]; ?> <i>(Cost 
tripled after 50 cruise missiles)</i></td>
	</tr>

		
	</table>
	<p>&nbsp;</p>
<?     if (time()()-$rsGuestbook["Last_Bills_Paid"]<=2)
    {
?>	
<? 
// Calculate the maximum they can buy

      $maximumbuy=0;
      if ($totalmoneyavailable>0 && ($totalmoneyavailable-$cruisecost)>0)
      {

        $maximumbuy=($totalmoneyavailable/$cruisecost);
        if ($maximumbuy>10)
        {
          $maximumbuy=10;
        }
;
        } 
      } 


// Now calculate 4 numbers to go with this for the option box

      $buy0=(round(($maximumbuy/20),0));
      $buy1=(round(($maximumbuy/8),0));
      $buy2=(round(($maximumbuy/5),0));
      $buy3=(round(($maximumbuy/2),0));
      $buy4=(round(($maximumbuy),0));

?>


			
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.newpurchase.selectedIndex < 0)
  {
    alert("Please select one of the \"newpurchase\" options.");
    theForm.newpurchase.focus();
    return (false);
  }

  if (theForm.newpurchase.selectedIndex == 0)
  {
    alert("The first \"newpurchase\" option is not a valid selection.  Please choose one of the other options.");
    theForm.newpurchase.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="cruise_buy_code.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">

   <table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF" bordercolor="#000080">
<? 
      if ($maximumbuy==0)
      {

?>
			<tr>
		<td align="right" valign="top" colspan="2">
		<p align="left">
			<?         if (($totalmoneyavailable-$cruisecost)<0)
        {
?>
			<font color="#FF0000">Sorry, you can not buy cruise missiles at this time. You do not have enough <?           echo ($rsGuestbook["Currency_Type"].$Value); ?>s. You currently have $<?           print $totalmoneyavailable;?> you need a minimum of $<?           echo $FormatNumber[$cruisecost][2]; ?>.
			
			
			<?         } ?>
	
		</font>
		
		</td>
		
	</tr>
	<? 
      } 

?>

		
   <? 
      if ($maximumbuy!=0)
      {

?>	
			
	<tr>
		<td width="97%" colspan="2">
		Purchase cruise missiles below.</td>
		
	</tr>
			
	<tr>
		<td width="30%">
		<p align="center">
		
				<? 
        if ($rsGuestbook["Technology_Purchased"]<7)
        {

          print "<img src='images/cruise0.JPG' title='Current tech level permits this V1 Flying Bomb design.'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=7 && $rsGuestbook["Technology_Purchased"]<12)
        {

          print "<img src='images/cruise1.JPG' title='Current tech level permits this V2 Rocket design.'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=12)
        {

          print "<img src='images/cruise2.JPG' title='Current tech level permits this Tomhawk missile design.'>";
        } 

?>
		
		
		</td>
		<td width="67%"> 

		<table border="0" width="100%" id="table5" cellspacing="0" cellpadding="0">
			<tr>
				<td>
			
	<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="newpurchase">
<option>Select A Buy Amount</option>


<?         if ($buy0==0)
        {
?>
<?         }
          else
        {
?>
<option value="1"><?           print $buy0;?> cruise missiles at $<?           print $FormatNumber[($buy0*$cruisecost)][2];?> </option>
<?         } ?>
<?         if ($buy1==0 || $buy1==$buy0)
        {
?>
<?         }
          else
        {
?>
<option value="2"><?           print $buy1;?> cruise missiles at $<?           print $FormatNumber[($buy1*$cruisecost)][2];?> </option>
<?         } ?>
<?         if ($buy2==0 || $buy2==$buy1)
        {
?>
<?         }
          else
        {
?>
<option value="3"><?           print $buy2;?> cruise missiles at $<?           print $FormatNumber[($buy2*$cruisecost)][2];?> </option>
<?         } ?>
<?         if ($buy3==0 || $buy3==$buy2)
        {
?>
<?         }
          else
        {
?>
<option value="4"><?           print $buy3;?> cruise missiles at $<?           print $FormatNumber[($buy3*$cruisecost)][2];?> </option>
<?         } ?>
<?         if ($buy4==0 || $buy4==$buy3)
        {
?>
<?         }
          else
        {
?>
<option value="5"><?           print $buy4;?> cruise missiles at $<?           print $FormatNumber[($buy4*$cruisecost)][2];?> </option>
<?         } ?>
</select>
</td>
			</tr><?       } ?>
		</table>


</td>
		
	</tr>
			
	</table>
	<p>   
<!--#include file="activitycheck.php" -->

   <input type="hidden" name="Number_Of_Purchases" value="1">
   <input type="hidden" name="Nation_ID" value="<?       echo $rsGuestbook["Nation_ID"]; ?>">
   
   
<?       if ($maximumbuy!=0)
      {
?>
	<?         if ($rsGuestbook["Technology_Purchased"]<15 || $rsGuestbook["Infrastructure_Purchased"]<100)
        {
?>
	Sorry, but your technology level or infrastructure level is not high enough to purchase 
	cruise missiles at this time.
	You currently have a technology level of <?           echo $FormatNumber[$rsGuestbook["Technology_Purchased"]][2]; ?> and need at least a technology level of 15. 
	You currently have an infrastructure level of <?           echo $FormatNumber[$rsGuestbook["Infrastructure_Purchased"]][2]; ?> and need at least an infrastructure level of 100. 
	<?         }
          else
        {
?>
		<?           if ($rsGuestbook["Cruise_Purchased"]>=50)
          {
?>
		You have <?             echo $rsGuestbook["Cruise_Purchased"]; ?> cruise missiles and cannot purchase any more at this time.
		<?           }
            else
          {
?>
		<input type="submit" class="Buttons" name="Submit" value="Purchase Cruise Missiles">
		<?           } ?>
	<?         } ?>
<?       } ?>
   
   
   
   
   </p>
</form>


<!-- End form code -->




</font>

</body>
<?     }
      else
    {
?>
<font color="#FF0000"><p></p>You must <a href="pay_bills.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>">pay your bills</a>
 before you can purchase cruise missiles.
<?     } ?><?   } ?><!--#include file="inc_footer.php" --><? 
//Reset server objects


  
  $rsGuestbook=null;

$objConn->Close();
  $objConn=null;

?><? } ?>
