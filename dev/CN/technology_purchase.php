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

<?     if (time()()-$rsGuestbook["Last_Bills_Paid"]<=2)
    {
?>
<body bgcolor="white" text="black">

 

<table border="1" width="100%" id="table2" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<tr>
<td align="right" valign="top" colspan="2" bgcolor="#000080">
<p align="left">
<b><font color="#FFFFFF">
:. Purchase Technology for </font> <a href="nation_drill_display.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>">
<font color="#FFFFFF"><?       echo $rsGuestbook["Nation_Name"]; ?></font></a><font color="#FFFFFF">
</font></b>
</font></td>
</tr>
<tr>
<td align="right" valign="top">Current Technology</td>
<td valign="top" width="70%"><b> 
<i><?       echo $FormatNumber[($rsGuestbook["Technology_Purchased"].$Value)][2]; ?> </td>
</tr>
<tr>
<td align="right">Current <?       echo ($rsGuestbook["Currency_Type"].$Value); ?>s Available</td>
<td width="70%">$<?       echo $FormatNumber[$totalmoneyavailable][2]; ?></td>
</tr>
<tr>
<td align="right" valign="top">Technology Costs Per Level (Ex. 1,2,3,4) </td>
<td valign="top" width="70%">$<?       echo ($FormatNumber[$technologycost][2]); ?> </td>
</tr>


</table>








<p></p>

<? 
// Calculate the maximum they can buy

      $maximumbuy=$totalmoneyavailable/($technologycost-5000);
      if ($maximumbuy>20)
      {
        $maximumbuy=20;
      }
;
      } 
// Now calculate 4 numbers to go with this for the option box

      $buy1=($FormatNumber[($maximumbuy/20)][2]);
      $buy2=($FormatNumber[($maximumbuy/10)][2]);
      $buy3=($FormatNumber[($maximumbuy/4)][2]);
      $buy4=($FormatNumber[($maximumbuy/2)][2]);
?>



<p>&nbsp;</p>

<?       if (($totalmoneyavailable-($technologycost-5000))<0)
      {
?>
<font color="#FF0000"><p></p>Sorry, you can not buy technology at this 
time. You do not have enough money. You currently have $<?         print $totalmoneyavailable;?> 
you need a minimum of $<?         echo $FormatNumber[($technologycost-5000)][2]; ?> before you can begin making 
technology purchases. Try 
selling land or infrastructure to get more <?         echo $rsGuestbook["Currency_Type"]; ?>s.</font><p>&nbsp;</p>
<?       }
        else
      {
?>

<table border="0" width="100%" id="table4" cellpadding="0" cellspacing="0">
<tr>
<td>
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF" bordercolor="#000080">
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
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="technology_purchase_code.asp?Nation_ID=<?         echo $rsGuestbook["Nation_ID"]; ?>" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
<input type=hidden name="technologycost" value="<?         echo $FormatNumber[$technologycost][2]; ?>">


<tr>
<td align="right" valign="top" colspan="2">
<p align="left">Purchase technology below:</td>

</tr>


<tr>
<td align="right" valign="top">
<p align="center">
		<? 
        if ($rsGuestbook["Technology_Purchased"]<1)
        {

          print "<img src='http://cybernations.net/images/technologya.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=1 && $rsGuestbook["Technology_Purchased"]<2)
        {

          print "<img src='http://cybernations.net/images/technologyb.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=2 && $rsGuestbook["Technology_Purchased"]<3)
        {

          print "<img src='http://cybernations.net/images/technologyc.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=3 && $rsGuestbook["Technology_Purchased"]<4)
        {

          print "<img src='http://cybernations.net/images/technologyd.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=4 && $rsGuestbook["Technology_Purchased"]<5)
        {

          print "<img src='http://cybernations.net/images/technologye.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=5 && $rsGuestbook["Technology_Purchased"]<6)
        {

          print "<img src='http://cybernations.net/images/technologyf.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=6 && $rsGuestbook["Technology_Purchased"]<8)
        {

          print "<img src='http://cybernations.net/images/technologyg.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=8 && $rsGuestbook["Technology_Purchased"]<10)
        {

          print "<img src='http://cybernations.net/images/technologyh.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=10 && $rsGuestbook["Technology_Purchased"]<13)
        {

          print "<img src='http://cybernations.net/images/technologyi.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=13 && $rsGuestbook["Technology_Purchased"]<16)
        {

          print "<img src='http://cybernations.net/images/technologyj.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=16 && $rsGuestbook["Technology_Purchased"]<21)
        {

          print "<img src='http://cybernations.net/images/technologyk.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=21 && $rsGuestbook["Technology_Purchased"]<25)
        {

          print "<img src='http://cybernations.net/images/technologyl.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=25 && $rsGuestbook["Technology_Purchased"]<35)
        {

          print "<img src='http://cybernations.net/images/technologym.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=35 && $rsGuestbook["Technology_Purchased"]<50)
        {

          print "<img src='http://cybernations.net/images/technologyn.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=50 && $rsGuestbook["Technology_Purchased"]<80)
        {

          print "<img src='http://cybernations.net/images/technologyo.JPG'>";
        } 

        if ($rsGuestbook["Technology_Purchased"]>=80)
        {

          print "<img src='http://cybernations.net/images/technologyp.JPG'>";
        } 


?>





</td>
<td width="70%"> 

<p>
<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="newpurchase">
<option>Select Your Technology Purchase</option>
<option value="1"><?         print $buy1;?> Technology at $<?         print $FormatNumber[($buy1*$technologycost)][2];?></option>
<option value="2"><?         print $buy2;?> Technology at $<?         print $FormatNumber[($buy2*$technologycost)][2];?></option>
<option value="3"><?         print $buy3;?> Technology at $<?         print $FormatNumber[($buy3*$technologycost)][2];?></option>
<option value="4"><?         print $buy4;?> Technology at $<?         print $FormatNumber[($buy4*$technologycost)][2];?></option>
</select>


</td>

</tr>

</table>
<p>   
<!--#include file="activitycheck.php" -->
<?         if ($rsGuestbook["Technology_Purchased"]>1000)
        {
?>
You have reached the maximum technology level. You cannot purchase technology at this time.
<?         }
          else
        {
?>
<input type="hidden" name="Nation_ID" value="<?           echo $rsGuestbook["Nation_ID"]; ?>">
<input type="submit" class="Buttons" name="Submit" value="Purchase Technology">
<?         } ?>
</p>
</form>


<!-- End form code -->

</td>
</tr>
</table>
<? 
      } 

?>



</td>
	</tr>
</table>





</body>
<?     }
      else
    {
?>
<font color="#FF0000"><p></p>You must <a href="pay_bills.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>">pay your bills</a>
 before you can make any more purchases.
<?     } ?><?   } ?><!--#include file="inc_footer.php" --><? 
//Reset server objects


  
  $rsGuestbook=null;

$objConn->Close();
  $objConn=null;

?><? } ?>
