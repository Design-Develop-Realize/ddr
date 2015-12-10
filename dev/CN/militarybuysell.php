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
<!--#include file="inc_header.php" -->
<? 
  $lngRecordNo=intval($rsGuestbookHead["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

  $rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsGuestbookSQL);
?>  

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

<body bgcolor="white" text="black">


   <table border="1" width="100%" id="table2" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
	<tr>
		<td align="right" valign="top" colspan="2" bgcolor="#000080">
		<p align="left">
<b><font color="#FFFFFF">:. Purchase Military for <a href="nation_drill_display.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>">
		<font color="#FFFFFF">
		<?     echo $rsGuestbook["Nation_Name"]; ?></font></a> </font> </b>
		</td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Current Military</td>
		<td valign="top" width="70%"><b><?     echo ($FormatNumber[$actualmilitary][0]); ?>  soldier</i>s</td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Current Citizens</td>
		<td valign="top" width="70%"><b><?     echo ($FormatNumber[$citizens][0]); ?>  working citizens</i></td>
	</tr>	
	<tr>
			<td width="30%" align="right">Total Number of transactions made by your 
			nation</td>
			<td width="70%"><?     echo ($rsGuestbook["Number_Of_Purchases"].$Value); ?></td>
		</tr>
	<tr>
			<td width="30%" align="right">Current <?     echo ($rsGuestbook["Currency_Type"].$Value); ?>s Available</td>
			<td width="70%">$<?     echo $FormatNumber[$totalmoneyavailable][2]; ?></td>
		</tr>
	<tr>
		<td width="30%" align="right" valign="top">Military Costs Per Soldier To Buy</td>
		<td valign="top" width="70%">$<?     echo $FormatNumber[$militarycost][2]; ?> </td>
	</tr>

		
	<tr>
<td align="right" valign="top" width="30%">Daily Soldier Cost to Maintain</td>
<td valign="top" width="70%"><font color="#FF0000">$<?     echo $FormatNumber[$dailysoldiercost][2]; ?> 
</font> </td>
	</tr>

		
	</table>
	<p>&nbsp;</p>
	
<? 
// Calculate the maximum they can buy

    $maximumbuy=0;
    $maximumbuy1=0;
    $maximumbuy2=0;
    $maximumbuy2=($citizens*.80)-$actualmilitary;
    if ($totalmoneyavailable>0 && ($totalmoneyavailable-$militarycost)>0)
    {

      $maximumbuy1=($totalmoneyavailable/$militarycost)-1;

      if ($maximumbuy1>$maximumbuy2)
      {

        $maximumbuy=$maximumbuy2;
      }
        else
      {

        $maximumbuy=$maximumbuy1;
      } 

      $maximumbuy=$FormatNumber[$maximumbuy][0];
      if ($maximumbuy<=0)
      {

        $maximumbuy=0;
      } 

    } 


// Now calculate 4 numbers to go with this for the option box

    $buy0=(round(($maximumbuy/20),0));
    $buy1=(round(($maximumbuy/8),0));
    $buy2=(round(($maximumbuy/5),0));
    $buy3=(round(($maximumbuy/2),0));
    $buy4=(round(($maximumbuy),0));
?>


<?     if (time()()-$rsGuestbook["Last_Bills_Paid"]<=2)
    {
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
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="militarypurchase_code.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
		<input type=hidden name="militarycost" value="<?       print $militarycost;?>">
   <table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF" bordercolor="#000080">
<? 
      if ($maximumbuy<1 || $buy4<1)
      {

?>
			<tr>
		<td align="right" valign="top" colspan="2">
		<p align="left">
			<?         if (($totalmoneyavailable-$militarycost)<0)
        {
?>
			<font color="#FF0000">Sorry, you can not buy military at this time. You do not have enough <?           echo ($rsGuestbook["Currency_Type"].$Value); ?> . 
			You currently have $<?           echo $FormatNumber[$totalmoneyavailable][2]; ?> you need a minimum of $<?           echo $FormatNumber[$militarycost][2]; ?>.
			Try selling land or infrastructure to get more <?           echo ($rsGuestbook["Currency_Type"].$Value); ?>s.
			<?         } ?>
			
			<?         if ($maximumbuy2<1)
        {
?>
			Sorry, but your ratio of soldiers:citizens is currently too high and above the 
			80% limit. You must work to raise your citizen count before purchasing more soldiers.
			<?         } ?>	
	
		</font>
		
		</td>
		
	</tr>
	<? 
      }
        else
      {

?>
	<tr>
		<td width="96%" align="right" colspan="2">
		<p align="left">You may purchase soldiers below. If your amount of <?         echo ($rsGuestbook["Currency_Type"].$Value); ?>s permits you may purchase 
		up to 80% of your citizen population in soldiers. 
		</td>
		
	</tr>
		

			
	<tr>
		<td width="30%">
		<p align="center">
		<img border="0" src="http://cybernations.net/images/sold1.jpg" width="57" height="105"></td>
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
<option value="1"><?           print $buy0;?> soldiers at $<?           print $FormatNumber[($buy0*$militarycost)][2];?> </option>
<?         } ?>
<?         if ($buy1==0 || $buy1==$buy0)
        {
?>
<?         }
          else
        {
?>
<option value="2"><?           print $buy1;?> soldiers at $<?           print $FormatNumber[($buy1*$militarycost)][2];?> </option>
<?         } ?>
<?         if ($buy2==0 || $buy2==$buy1)
        {
?>
<?         }
          else
        {
?>
<option value="3"><?           print $buy2;?> soldiers at $<?           print $FormatNumber[($buy2*$militarycost)][2];?> </option>
<?         } ?>
<?         if ($buy3==0 || $buy3==$buy2)
        {
?>
<?         }
          else
        {
?>
<option value="4"><?           print $buy3;?> soldiers at $<?           print $FormatNumber[($buy3*$militarycost)][2];?> </option>
<?         } ?>
<option value="5"><?         print $buy4;?> soldiers at $<?         print $FormatNumber[($buy4*$militarycost)][2];?> </option>
</select></td>
			</tr>
		</table>


</td>
		
	</tr>
		<?       } ?>	
	</table>
	<p>

<? 
      if ($maximumbuy<=0 || $buy4<=0)
      {
?>
</form>
<? 
      }
        else
      {

?>
<!--#include file="activitycheck.php" -->

   <input type="hidden" name="Number_Of_Purchases" value="1">
   <input type="hidden" name="Nation_ID" value="<?         echo $rsGuestbook["Nation_ID"]; ?>">
   &nbsp;<input type="submit" class="Buttons" name="Submit" value="Purchase Military">

   </p>
</form>
<?       } ?>

<!-- End form code -->

<?     }
      else
    {
?>
<font color="#FF0000"><p></p>You must <a href="pay_bills.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>">pay your bills</a>
 before you can make any more purchases.<p></p>
<?     } ?>

<? 
// Calculate the maximum they can sell

    if ($actualmilitary<1)
    {

      $maxsell=0;
    }
      else
    {

      $maxsell=$actualmilitary;
    } 



// Now calculate 4 numbers to go with this for the option box

    $sell1=(round(($maxsell/4),0));
    $sell2=(round(($maxsell/3),0));
    $sell3=(round(($maxsell/2),0));
    $sell4=(round(($maxsell),0));
?>

<br>

<br>
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form2_Validator(theForm)
{

  if (theForm.newsell.selectedIndex < 0)
  {
    alert("Please select one of the \"newsell\" options.");
    theForm.newsell.focus();
    return (false);
  }

  if (theForm.newsell.selectedIndex == 0)
  {
    alert("The first \"newsell\" option is not a valid selection.  Please choose one of the other options.");
    theForm.newsell.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form2" method="post" action="militarydismiss_code.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>" onsubmit="return FrontPage_Form2_Validator(this)" language="JavaScript">
   <table border="1" width="100%" id="table3" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF" bordercolor="#000080">
<? 
    if ($maxsell==0)
    {

?>	<tr>
		<td align="right" valign="top" colspan="2">
		<p align="left">
		<font color="#FF0000">Sorry, you have no troops to dismiss at this time
		</td>
		
	</tr>
	
		<?     }
      else
    {
?>
	<tr>
		<td width="96%" align="right" colspan="2">
		<p align="left">Dismiss Soldiers below. When you dismiss troops you will not receive any <?       echo ($rsGuestbook["Currency_Type"].$Value); ?>s. 
		Also, all of your deployed troops will be returned home for processing and redistribution of forces.
		
		If you dismiss more than 40% of your forces (red options below) your government will be 
		thrown into Anarchy and riots will spark up across your nation. You may 
		only dismiss soldiers once every 2 days. 
		<?       if ($rsGuestbook["Military_Sold_Date"]!="")
      {
?>
		You last dismissed soldiers on <?         echo $rsGuestbook["Military_Sold_Date"]; ?>.
		<?       } ?>
		</td>
		
	</tr>
		<? 
    } 

?>	
	<tr>
		<td width="30%" align="right">
		<p align="center">&nbsp;<img border="0" src="http://cybernations.net/images/sold2.jpg" width="51" height="110"></td>
		<td width="66%"> 
	
<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="newsell">
<option>Select A Dismiss Amount</option>
<?     if ($sell1==0)
    {
?>
<?     }
      else
    {
?>
<option <?       if ($actualmilitary-$sell1<=($actualmilitary*45))
      {
?>style="color: Red"<?       } ?> value="1"><?       print $sell1;?> Soldiers</option>
<?     } ?>
<?     if ($sell2==0 || $sell2==$sell1)
    {
?>
<?     }
      else
    {
?>
<option <?       if ($actualmilitary-$sell2<=($actualmilitary*45))
      {
?>style="color: Red"<?       } ?> value="2"><?       print $sell2;?> Soldiers</option>
<?     } ?>
<?     if ($sell3==0 || $sell3==$sell2)
    {
?>
<?     }
      else
    {
?>
<option <?       if ($actualmilitary-$sell3<=($actualmilitary*45))
      {
?>style="color: Red"<?       } ?> value="3"><?       print $sell3;?> Soldiers</option>
<?     } ?>
<option <?     if ($actualmilitary-$sell4<=($actualmilitary*45))
    {
?>style="color: Red"<?     } ?> value="4"><?     print $sell4;?> Soldiers</option>
</select><br>
<br>
<input type="checkbox" name="Confirm" value="1"> - Click to confirm military 
dismissal</td>
		
	</tr>
		
	</table>
	<p> 
	  
<?     if ($rsGuestbook["Military_Sold_Date"]>time()()-1)
    {
?>
You have already dismissed soldiers within the last 2 days. You may only dismiss soldiers once every 2 days.
<?     }
      else
    {
?>    
   <?       if (time()()-$rsGuestbook["Military_Attack_Date1"]<2 || time()()-$rsGuestbook["Military_Attack_Date2"]<2)
      {
?>
   You cannot dismiss soldiers at this time because you have attacked another nation within the past 2 days. 
   Your soldiers need time to recuperate from any potential shell shock they may be experiencing. (This prevents you from
   attacking another nation and dismissing all of your soldiers to prevent being attacked in return.)
   <?       }
        else
      {
?>
   <!--#include file="activitycheck.php" --> 
   <input type="hidden" name="Number_Of_Purchases" value="1">
   <input type="hidden" name="Nation_ID" value="<?         echo $rsGuestbook["Nation_ID"]; ?>">
   <input type="submit" class="Buttons" name="Submit1" value="Dismiss Military">
   <?       } ?>
 <?     } ?>

</p>
</form>

</font>

</body>
<?   } ?><!--#include file="inc_footer.php" --><? 
//Reset server objects


  
  $rsGuestbook=null;

$objConn->Close();
  $objConn=null;

?>
<? } ?>
