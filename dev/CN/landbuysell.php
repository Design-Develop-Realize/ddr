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
<b><font color="#FFFFFF">:. Purchase Land for </font> <a href="nation_drill_display.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>">
		<font color="#FFFFFF"><?     echo $rsGuestbook["Nation_Name"]; ?></font></a><font color="#FFFFFF">
		</font> </b>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top">Current Lands</td>
		<td valign="top"><b><?     echo $FormatNumber[$nationsize][3]; ?> mile diameter.</b><br>
		<i><?     echo $FormatNumber[$adjustednationsize][3]; ?> from 
		purchases/sales.<br>
		 <?     echo $FormatNumber[$nationnaturalgrowth][3]; ?> from natural growth.</i></td>
	</tr>
	<tr>
			<td align="right">Current <?     echo ($rsGuestbook["Currency_Type"].$Value); ?>s Available</td>
			<td>$<?     echo $FormatNumber[$totalmoneyavailable][2]; ?></td>
		</tr>
	<tr>
		<td align="right" valign="top">Land Costs Per Mile To Buy</td>
		<td valign="top">$<?     echo $FormatNumber[$landcostpermile][2]; ?> </td>
	</tr>
	<tr>
		<td align="right" valign="top">Land Value Per Mile When 
		Selling</td>
		<td valign="top">$<?     echo $FormatNumber[$landcostpermile2][2]; ?> </td>
	</tr>
		
	<tr>
<td align="right" valign="top">Daily Land Cost to Maintain</td>
<td valign="top" width="70%">$<?     print "0.00";?> </td>
	</tr>
		
	</table>
	<p align="center">

<?     if ($nationsize>=$nationsizelimit)
    {
?>
Your nation has reached its maximum size. You cannot purchase new lands at this time.
<?     }
      else
    {
?>
<p></p>




<SCRIPT type="text/javascript">
var field_used;
var submit_ok;

function Calc(){
 if (field_used == 'purchase_amount'){
   figure_land(document.FrontPage_Form1.purchase_amount.value)
   } else {
   figure_amount(document.FrontPage_Form1.purchase_land.value)
   }
}
function figure_land(amount){
 var land_cost_permile;
 land_cost_permile = <?       echo $landcostpermile; ?>;
 var land_cost_permile2;
 land_cost_permile2 = <?       echo $landcostpermile2; ?>;  
 var total_money_available;
 total_money_available = <?       print str_replace(",","",$totalmoneyavailable);?>;
 var maximum_land;
 var minimum_land;
 <?       if (time()()-$rsGuestbook["Last_Bills_Paid"]<=2)
      {
?>
 maximum_land = 20;
 minimum_land = -20;
 <?       }
        else
      {
?>
 maximum_land = 0;
 minimum_land = 0
 <?       } ?>
 

 if (amount > 0){
 var amount_of_land = amount / land_cost_permile;
 }
 else {
 var amount_of_land = amount / land_cost_permile2;
 }
 
   var nation_size;
   nation_size = <?       echo $nationsize-100; ?>;
 
   if (((amount <= total_money_available && amount > 0) || (amount_of_land < 0 && (amount_of_land-amount_of_land-amount_of_land) < nation_size)) && (amount_of_land <= maximum_land) && (amount_of_land >= minimum_land) ) {
   document.getElementById('no_money').innerHTML = '';
	document.FrontPage_Form1.purchase_land.value = amount_of_land;
	submit_ok = 'Yes';
   }
   else {
	document.FrontPage_Form1.purchase_amount.value='';
    document.FrontPage_Form1.purchase_land.value='';
	document.getElementById('no_money').innerHTML = "<font color='#FF0000'>Either you do not have enough land or <?       echo ($rsGuestbook["Currency_Type"].$Value); ?>s to perform that transaction or you attempted to purchase more than the maximum amount of land available to purchase at one time is " + maximum_land + " miles. The maximum amount of land that you can sell is " + minimum_land + " miles.</font>";
	submit_ok = 'No';
	   }

	   
}

function figure_amount(amount_of_land){
 var land_cost_permile;
 land_cost_permile = <?       echo $landcostpermile; ?>;
 var land_cost_permile2;
 land_cost_permile2 = <?       echo $landcostpermile2; ?>; 
 var total_money_available;
 total_money_available = <?       print str_replace(",","",$totalmoneyavailable);?>;
 var maximum_land;
 var minimum_land;
 <?       if (time()()-$rsGuestbook["Last_Bills_Paid"]<=2)
      {
?>
 maximum_land = 20;
 minimum_land = -20;
 <?       }
        else
      {
?>
 maximum_land = 0;
 minimum_land = 0
 <?       } ?>

 if (amount_of_land > 0){
 var amount = amount_of_land * land_cost_permile;
 }
 else {
 var amount = amount_of_land * land_cost_permile2;
 }

   var nation_size;
   nation_size = <?       echo $nationsize-100; ?>;
   
   if (((amount <= total_money_available && amount > 0) || (amount_of_land < 0 && (amount_of_land-amount_of_land-amount_of_land) < nation_size)) && (amount_of_land <= maximum_land)  && (amount_of_land >= minimum_land)) {
   document.getElementById('no_money').innerHTML = '';
   document.FrontPage_Form1.purchase_amount.value = amount;
   submit_ok = 'Yes';
   }
   else {
	document.FrontPage_Form1.purchase_amount.value='';
	document.FrontPage_Form1.purchase_land.value='';
	document.getElementById('no_money').innerHTML = "<font color='#FF0000'>Either you do not have enough land or <?       echo ($rsGuestbook["Currency_Type"].$Value); ?>s to perform that transaction or you attempted to purchase more than the maximum amount of land available to purchase at one time is " + maximum_land + " miles. The maximum amount of land that you can sell is " + minimum_land + " miles.</font>";
	submit_ok = 'No';
	   }

	   
}

function change_field(field){
field_used = field;

}
function submit_form(){
submit_ok = 'No';

 //if (document.FrontPage_Form1.purchase_amount.value > 0) {
 Calc() 
    if (submit_ok == 'Yes') {
    
  	document.FrontPage_Form1.submit();
    }
 //}
}
</SCRIPT>

You may buy or sell land for your nation below. <b>To purchase land enter a positive number</b> in either field below and click the 'Calculate' button. 
<b>To sell land
enter a negative number</b> in either field below and click the 'Calculate' button. Once you are ready to perform the transaction click the 'Perform Transaction' 
button. The minimum land required before selling is 100 miles. The maximum amount 
of land that you can buy at one time is 20 miles of land if you are up to date on your bill payments. If you are not up to date on your bill payments you may only sell land.<br>
<span id='no_money'></span>
<span id='field_to_use'></span><br>
&nbsp;
<table border="0" width="100%" id="table4" cellspacing="0" cellpadding="0">
<tr>
<td>
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF" bordercolor="#000080">
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  var checkOK = "0123456789-.,";
  var checkStr = theForm.purchase_amount.value;
  var allValid = true;
  var validGroups = true;
  var decPoints = 0;
  var allNum = "";
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
    if (ch == ".")
    {
      allNum += ".";
      decPoints++;
    }
    else if (ch == "," && decPoints != 0)
    {
      validGroups = false;
      break;
    }
    else if (ch != ",")
      allNum += ch;
  }
  if (!allValid)
  {
    alert("Please enter only digit characters in the \"purchase_amount\" field.");
    theForm.purchase_amount.focus();
    return (false);
  }

  if (decPoints > 1 || !validGroups)
  {
    alert("Please enter a valid number in the \"purchase_amount\" field.");
    theForm.purchase_amount.focus();
    return (false);
  }

  var checkOK = "0123456789-.,";
  var checkStr = theForm.purchase_land.value;
  var allValid = true;
  var validGroups = true;
  var decPoints = 0;
  var allNum = "";
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
    if (ch == ".")
    {
      allNum += ".";
      decPoints++;
    }
    else if (ch == "," && decPoints != 0)
    {
      validGroups = false;
      break;
    }
    else if (ch != ",")
      allNum += ch;
  }
  if (!allValid)
  {
    alert("Please enter only digit characters in the \"purchase_land\" field.");
    theForm.purchase_land.focus();
    return (false);
  }

  if (decPoints > 1 || !validGroups)
  {
    alert("Please enter a valid number in the \"purchase_land\" field.");
    theForm.purchase_land.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="landpurchase_code.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">


<tr>
<td width="27%" align="right"><?       echo ($rsGuestbook["Currency_Type"].$Value); ?> Value of Land:</td>
<td> 
$<!--webbot bot="Validation" s-data-type="Number" s-number-separators=",." --><input type="text" name="purchase_amount" size="20" OnMouseDown="change_field('purchase_amount')"></td>
<input type="hidden" name="Nation_ID" value="<?       echo $rsGuestbook["Nation_ID"]; ?>">
<td width="18%" align="right">Miles of Land:</td>
<td width="30%" align="left">
&nbsp;<!--webbot bot="Validation" s-data-type="Number" s-number-separators=",." --><input type="text" name="purchase_land" size="20" OnMouseDown="change_field('purchase_land')"></td>
</tr>
</table>

<p align="center">


<input type="button" onclick="Calc()" value="Calculate">
<!--#include file="activitycheck.php" -->
<input type="button" onclick="submit_form()" value="Perform Transaction">
<p>
</p>
<p align="center">
</form>
	<img border="0" src="images/landbu3.jpg"></td>
</tr>
</table>




<?     } ?>
<!-- End form code -->



</font>

</body>
<?   } ?><!--#include file="inc_footer.php" --><? 
//Reset server objects


  
  $rsGuestbook=null;

$objConn->Close();
  $objConn=null;

?><? } ?>
