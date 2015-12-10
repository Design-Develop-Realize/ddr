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
<b><font color="#FFFFFF">:. Purchase Tanks for </font> <a href="nation_drill_display.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>">
		<font color="#FFFFFF"><?     echo $rsGuestbook["Nation_Name"]; ?></font></a><font color="#FFFFFF">
		</font> </b>
		</td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Number of Tanks</td>
		<td valign="top" width="70%"><b><?     echo ($FormatNumber[$numberoftanks][0]); ?> </i></td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Defending Tanks</td>
		<td valign="top" width="70%"><b><?     echo $rsGuestbook["Tanks_Defending"]; ?> </i></td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Deployed Tanks</td>
		<td valign="top" width="70%"><b><?     echo $rsGuestbook["Tanks_Deployed"]; ?> </i></td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Number of Soldiers</td>
		<td valign="top" width="70%"><b><?     echo ($FormatNumber[$actualmilitary][0]); ?>  </td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Working Citizens</td>
		<td valign="top" width="70%"><b><?     echo $FormatNumber[$citizens][0]; ?>  </td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Technology Level</td>
		<td valign="top" width="70%"><b><?     echo $FormatNumber[$rsGuestbook["Technology_Purchased"]][1]; ?>  </td>
	</tr>
	<tr>
			<td width="30%" align="right">Current <?     echo ($rsGuestbook["Currency_Type"].$Value); ?>s Available</td>
			<td width="70%">$<?     echo $FormatNumber[$totalmoneyavailable][2]; ?></td>
		</tr>
	<tr>
		<td width="30%" align="right" valign="top">Tanks Costs Per Unit To Buy</td>
		<td valign="top" width="70%">$<?     echo $FormatNumber[$tankcost][2]; ?> </td>
	</tr>

		
	<tr>
<td align="right" valign="top" width="30%">Daily Cost to Maintain Tanks</td>
<td valign="top" width="70%"><font color="#FF0000">$<?     echo $FormatNumber[$dailytankcost][2]; ?> 
</font> </td>
	</tr>

		
	</table>
	<p>&nbsp;</p>
	
<? 
// Calculate the maximum they can buy

    $maximumbuy=0;
    $maximumbuy1=0;
    $maximumbuy2=0;

    $sample1=$citizens*.08-$numberoftanks;
    $sample2=($actualmilitary/10)-$numberoftanks;
    if (($sample1<$sample2) && (($citizens*80)-$actualmilitary<0))
    {
//They have more than the max military and their citizen population can support this much

      $maximumbuy2=$sample1;
    }
      else
    {
//They have less than the max military and their military can support this much

      $maximumbuy2=$sample2;
    } 



    if ($totalmoneyavailable>0 && ($totalmoneyavailable-$tankcost)>0)
    {

      $maximumbuy1=($totalmoneyavailable/$tankcost);

      if ($maximumbuy1>$maximumbuy2)
      {
//They dont have enough money to buy the maximum anyways

        $maximumbuy=$maximumbuy2;
      }
        else
      {

        $maximumbuy=$maximumbuy1;
      } 

      if ($maximumbuy<=0)
      {

        $maximumbuy=0;
      } 

    } 


    if ($rsGuestbook["Technology_Purchased"]<10)
    {

      $maximumbuy=0;
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
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="tankspurchase_code.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
		<input type=hidden name="tankcost" value="<?       print $tankcost;?>">
   <table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF" bordercolor="#000080">
<? 
      if ($maximumbuy<1 || $buy4<1)
      {

?>
			<tr>
		<td align="right" valign="top" colspan="2">
		<p align="left">

			
			
			You may not purchase tanks at this time. You may purchase up to 10% 
			of your soldier count or up to 8% of your working citizen 
			population, whichever is less, as long as you have a minimum of 
			level 10 technology and enough money.
		
		</td>
		
	</tr>
	<? 
      }
        else
      {

?>
	<tr>
		<td width="96%" align="right" colspan="2">
		<p align="left">You may purchase tanks below. If your amount of <?         echo ($rsGuestbook["Currency_Type"].$Value); ?>s permits you may purchase 
		up to 10% of your soldier count or up to 
		8% of your working citizen population, whichever is less.</td>
		
	</tr>
		

			
	<tr>
		<td width="31%">
		<p align="center">
		<? 
        if ($rsGuestbook["Technology_Purchased"]<7)
        {

          print "<img src='http://cybernations.net/images/tank0.JPG' title='Current tech level permits this FT-17 Light Tank design.'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=7 && $rsGuestbook["Technology_Purchased"]<10)
        {

          print "<img src='http://cybernations.net/images/tank1.JPG' title='Current tech level permits this M4 Sherman Tank design.'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=10 && $rsGuestbook["Technology_Purchased"]<13)
        {

          print "<img src='http://cybernations.net/images/tank2.JPG' title='Current tech level permits this T-34 Tank design.'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=13 && $rsGuestbook["Technology_Purchased"]<16)
        {

          print "<img src='http://cybernations.net/images/tank3.JPG' title='Current tech level permits this Type 59 Tank design.'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=16 && $rsGuestbook["Technology_Purchased"]<20)
        {

          print "<img src='http://cybernations.net/images/tank4.JPG' title='Current tech level permits this Challenger Tank design.'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=20)
        {

          print "<img src='http://cybernations.net/images/tank5.JPG' title='Current tech level permits this M1A2 Tank design.'>";
        } 

?>
		</td>
		<td width="66%"> 

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
<option value="1"><?           print $buy0;?> tanks at $<?           print $FormatNumber[($buy0*$tankcost)][2];?> </option>
<?         } ?>
<?         if ($buy1==0 || $buy1==$buy0)
        {
?>
<?         }
          else
        {
?>
<option value="2"><?           print $buy1;?> tanks at $<?           print $FormatNumber[($buy1*$tankcost)][2];?> </option>
<?         } ?>
<?         if ($buy2==0 || $buy2==$buy1)
        {
?>
<?         }
          else
        {
?>
<option value="3"><?           print $buy2;?> tanks at $<?           print $FormatNumber[($buy2*$tankcost)][2];?> </option>
<?         } ?>
<?         if ($buy3==0 || $buy3==$buy2)
        {
?>
<?         }
          else
        {
?>
<option value="4"><?           print $buy3;?> tanks at $<?           print $FormatNumber[($buy3*$tankcost)][2];?> </option>
<?         } ?>
<?         if ($buy4==0 || $buy3==$buy3)
        {
?>
<?         }
          else
        {
?>
<option value="5"><?           print $buy4;?> tanks at $<?           print $FormatNumber[($buy4*$tankcost)][2];?> </option>
<?         } ?>
</select></td>
			</tr>
		</table>


</td>
		
	</tr>
		<?       } ?>	
	</table>
	<p>

<? 
      if ($maximumbuy<1 || $buy4<0)
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
   &nbsp;<input type="submit" class="Buttons" name="Submit" value="Purchase Tanks">

   </p>
</form>
<?       } ?>

<!-- End form code -->

<?     }
      else
    {
?>
<font color="#FF0000"><p></p>You must <a href="pay_bills.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>">pay your bills</a>
 before you can purchase tanks.<p></p>
<?     } ?>

<? 
// Calculate the maximum they can sell

    if ($defendingtanks<1)
    {

      $maxsell=0;
    }
      else
    {

      $maxsell=$defendingtanks;
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
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form2" method="post" action="tanksdismiss_code.php" onsubmit="return FrontPage_Form2_Validator(this)" language="JavaScript">
   <table border="1" width="100%" id="table3" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF" bordercolor="#000080">
<? 
    if ($maxsell==0)
    {

?>	<tr>
		<td align="right" valign="top" colspan="2">
		<p align="left">
		<font color="#FF0000">Sorry, you have no defending tanks to decom at this time
		</td>
		
	</tr>
	
		<?     }
      else
    {
?>
	<tr>
		<td width="96%" align="right" colspan="2">
		<p align="left">Decommission tanks below. When you decom tanks you will not receive any <?       echo ($rsGuestbook["Currency_Type"].$Value); ?>s. 
		Also, all of your deployed tanks will be returned home for processing and redistribution of forces. You may 
		only dismiss soldiers or tanks once every 2 days. 
		<?       if ($rsGuestbook["Military_Sold_Date"]!="")
      {
?>
		You last dismissed soldiers or tanks on <?         echo $rsGuestbook["Military_Sold_Date"]; ?>.
		<?       } ?>
		</td>
		
	</tr>
		<? 
    } 

?>	
	<tr>
		<td width="31%" align="right">
		<p align="center">&nbsp;<img border="0" src="images/tankdecom.JPG" width="219" height="205"></td>
		<td width="66%"> 
	
<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="newsell">
<option>Select A Decom Amount</option>
<?     if ($sell1==0)
    {
?>
<?     }
      else
    {
?>
<option value="1"> <?       print $sell1;?> Tanks</option>
<?     } ?>
<?     if ($sell2==0 || $sell2==$sell1)
    {
?>
<?     }
      else
    {
?>
<option value="2"><?       print $sell2;?> Tanks</option>
<?     } ?>
<?     if ($sell3==0 || $sell3==$sell2)
    {
?>
<?     }
      else
    {
?>
<option value="3"><?       print $sell3;?> Tanks</option>
<?     } ?>
<option value="4"><?     print $sell4;?> Tanks</option>
</select><p>
<font color="#FF0000">
<input type="checkbox" name="Confirm" value="1"></font>

- Click to confirm tank 
dismissal</td>
		
	</tr>
		
	</table>
	<p>   
   <?     if ($rsGuestbook["Military_Sold_Date"]>time()()-1)
    {
?>
You have already dismissed soldiers or tanks within the last 2 days. You may only dismiss soldiers once every 2 days.
<?     }
      else
    {
?>   
<!--#include file="activitycheck.php" -->  
   <?       if ($sell4==0)
      {
?>
   You have no defending tanks to decom at this time. If you have deployed 
	tanks, bring them home to decom.
   <?       }
        else
      {
?>
	   <?         if (time()()-$rsGuestbook["Military_Attack_Date1"]<2 || time()()-$rsGuestbook["Military_Attack_Date2"]<2)
        {
?>
	   You cannot dismiss tanks at this time because you have attacked another nation within the past 2 days. 
	   <?         }
          else
        {
?>
	   <input type="hidden" name="Number_Of_Purchases" value="1">
	   <input type="hidden" name="Nation_ID" value="<?           echo $rsGuestbook["Nation_ID"]; ?>">
	   &nbsp;<input type="submit" class="Buttons" name="Submit1" value="Decom Defending Tanks">
	   <?         } ?>
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
