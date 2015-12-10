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
  $rsGuestbook_numRows=0;
?>



<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT COUNT(Nation_ID) AS CADS FROM Nation";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $nukecapable=$rsAllUsers["CADS"]*.05;
  $nukecapable=intval($nukecapable);
  $allnations=$rsAllUsers["CADS"];
  
  $rsAllUsers=null;

?> 
<? 
  $purchaseok=0;

// $rsGuestbook2 is of type "ADODB.Recordset"

  $rsGuestbook2SQL="SELECT COUNT(*) AS StrAbove FROM Nation where strength > '".$rsGuestbookHead["Strength"]+1."' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsGuestbook2SQL);
  $rankposition=$rsGuestbook2["StrAbove"]+1;
  
  $rsGuestbook2=null;



  if ($rankposition<=$nukecapable)
  {

    $purchaseok=1;
  } 



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


	<?     if ($rsGuestbook["Nuclear"]!=3)
    {
?>
	<p></p>Sorry, your government position on nuclear weapons indicates that you are opposed to the development of nuclear weapons. You 
	must change your <a href="government_position.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>">government
	position</a> if you wish to purchase nuclear weapons.
	<?     }
      else
    {
?>



<?       if ($rsGuestbook["Nuclear_Purchased_Date"]=time()()$then; )
      {

        $You$have$already$purchased$nuclear$weapons$today->Your$scientists$are$exhausted&$demand$a$day$of$rest->Come$back$tomorrow->
<$%else; ?>



<body bgcolor="white" text="black">



   <table border="1" width="100%" id="table2" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
	<tr>
		<td align="right" valign="top" colspan="2" bgcolor="#000080">
		<p align="left">
<b><font color="#FFFFFF">:. Purchase Nuclear Weapons for </font> <a href="nation_drill_display.asp?Nation_ID=<?         echo $rsGuestbook["Nation_ID"]; ?>">
		<font color="#FFFFFF"><?         echo $rsGuestbook["Nation_Name"]; ?></font></a><font color="#FFFFFF">
		</font> </b>
		</td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Current Nuclear Weapons</td>
		<td valign="top" width="70%"> 
		
		
		
		<table border="0" width="100%" id="table6" cellspacing="0" cellpadding="0">
			<tr>
				<td><b><?         echo ($rsGuestbook["Nuclear_Purchased"]); ?></b></td>
				<td width="487">
				<p align="center">
<?         if ($rsGuestbook["Nuclear_Purchased"]>0 && $totalmoneyavailable>=10000)
        {
?>
		<a href="nuclear_destroy.asp?Nation_ID=<?           echo $rsGuestbook["Nation_ID"]; ?>" onclick="return confirm('Destroying missles cost $10,000. Are you sure you want to destroy a missle?');">
		<img src="assets/delete.jpg" width="17" height="17" border="0"><br>Decommission One 
				Missile</a>
<?         } ?>
</td>
				<td width="28">&nbsp;</td>
			</tr>
		</table>
		
		</td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">Technology Level</td>
		<td valign="top" width="70%"><?         echo $FormatNumber[$rsGuestbook["Technology_Purchased"]][2]; ?>  </td>
	</tr>
	<tr>
		<td width="30%" align="right" valign="top">
		Infrastructure Level</td>
		<td valign="top" width="70%"><?         echo $FormatNumber[$rsGuestbook["Infrastructure_Purchased"]][2]; ?>  </td>
	</tr>
	<tr>
			<td width="30%" align="right">Total <?         echo ($rsGuestbook["Currency_Type"].$Value); ?>s Spent</td>
			<td width="70%">$<?         echo $FormatNumber[($rsGuestbook["Money_Spent"].$Value)][2]; ?></td>
		</tr>
	<tr>
			<td width="30%" align="right">Current <?         echo ($rsGuestbook["Currency_Type"].$Value); ?>s Available</td>
			<td width="70%">$<?         echo $FormatNumber[$totalmoneyavailable][2]; ?></td>
		</tr>
	<tr>
		<td width="30%" align="right" valign="top">Nuclear Weapons Costs Per Unit To Buy</td>
		<td valign="top" width="70%">$<?         echo $FormatNumber[$nuclearcost][2]; ?> </td>
	</tr>

		
	<tr>
<td align="right" valign="top" width="30%">Daily Nuclear Weapons Cost to Maintain</td>
<td valign="top" width="70%"><font color="#FF0000">$<?         echo $FormatNumber[$dailynuclearcost][2]; ?> 
</font> </td>
	</tr>

		
	</table>
	<p>&nbsp;</p>
	<?         if (time()()-$rsGuestbook["Last_Bills_Paid"]<=2)
        {
?>
	
<? 
// Calculate the maximum they can buy

          $maximumbuy=0;
          if ($totalmoneyavailable>0 && ($totalmoneyavailable-$nuclearcost)>=0)
          {

            $maximumbuy=($totalmoneyavailable/$nuclearcost)-1;
          } 


// Now calculate 4 numbers to go with this for the option box

          $buy1=1;
          $buy2=2;

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
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="nuclear_buy_code.asp?Nation_ID=<?           echo $rsGuestbook["Nation_ID"]; ?>" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
		<input type=hidden name="nuclear" value="<?           print $nuclear;?>">
   <table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF" bordercolor="#000080">
<? 
          if ($maximumbuy==0)
          {

?>
			<tr>
		<td align="right" valign="top" colspan="2">
		<p align="left">
			<?             if (($totalmoneyavailable-$nuclearcost)<0)
            {
?>
			<font color="#FF0000">Sorry, you can not buy nuclear weapons at this time. You do not have enough <?               echo ($rsGuestbook["Currency_Type"].$Value); ?>s. You currently have $<?               print $totalmoneyavailable;?> you need a minimum of $<?               echo $FormatNumber[$nuclearcost][2]; ?>.
			
			
			<?             } ?>
	
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
		Purchase nuclear weapons below.</td>
		
	</tr>
			
	<tr>
		<td width="30%">
		<p align="center">
		<img border="0" src="http://cybernations.net/images/nuclarblast.jpg" width="150" height="112"></td>
		<td width="67%"> 

		<table border="0" width="100%" id="table5" cellspacing="0" cellpadding="0">
			<tr>
				<td>
			
	<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="newpurchase">
<option>Select A Buy Amount</option>


<?             if ($buy1==0)
            {
?>
<?             }
              else
            {
?>
<option value="1"><?               print $buy1;?> nuclear weapon at $<?               print $FormatNumber[($buy1*$nuclearcost)][2];?> </option>
<?             } ?>
</select>
</td>
			</tr><?           } ?>
		</table>


</td>
		
	</tr>
			
	</table>
	<p>   
<!--#include file="activitycheck.php" -->

   <input type="hidden" name="Number_Of_Purchases" value="1">
   <input type="hidden" name="Nation_ID" value="<?           echo $rsGuestbook["Nation_ID"]; ?>">
   
   
<?           if ($maximumbuy!=0)
          {
?>
	<?             if ($rsGuestbook["Technology_Purchased"]<75 || $rsGuestbook["Infrastructure_Purchased"]<1000)
            {
?>
	Sorry, but your technology level or infrastructure level is not high enough to purchase nuclear weapons at this time.
	You currently have a technology level of <?               echo $rsGuestbook["Technology_Purchased"]; ?> and need at least a technology level of 
75. 
	You currently have an infrastructure level of <?               echo $FormatNumber[$rsGuestbook["Infrastructure_Purchased"]][2]; ?> and need at least an infrastructure level of 1000. 
	<?             }
              else
            {
              if ($purchaseok==0)
              {
?>
	Your nation must be ranked in the top <?                 echo $FormatNumber[$nukecapable][0]; ?> nations in order to purchase nuclear weapons. You are currently ranked <?                 echo $FormatNumber[$rankposition][0]; ?> of <?                 echo $FormatNumber[$allnations][0]; ?> total nations.
	<?               }
                else
              {
?>
	
		<?                 if ($uranium==0)
                {
?>
		<p></p>You are not connected to a source of uranium to develop nuclear weapons. You must setup a trade agreement with another nation that 
		has uranium before you may begin developing nuclear weapons.
		<?                 }
                  else
                {
?>
			<?                   if ($rsGuestbook["Nuclear_Purchased"]>=20)
                  {
?>
			You have <?                     echo $rsGuestbook["Nuclear_Purchased"]; ?> nuclear missiles and cannot purchase any more at this time.
			<?                   }
                    else
                  {
?>
			<input type="submit" class="Buttons" name="Submit" value="Purchase Nuclear Weapons">
			<?                   } ?>
		<?                 } ?>
	<?               } ?>
	<?             } ?>
<?           } ?>
   
   
   
   
   </p>
</form>


<!-- End form code -->




</font>

</body>
<?         }
          else
        {
?>
<font color="#FF0000"><p></p>You must <a href="pay_bills.asp?Nation_ID=<?           echo $rsGuestbook["Nation_ID"]; ?>">pay your bills</a>
 before you can make any more transactions.
<?         } ?><?       } ?><?     } ?><?   } ?><!--#include file="inc_footer.php" --><? 
//Reset server objects


  
  $rsGuestbook=null;

$objConn->Close();
  $objConn=null;

?><? } ?>
