<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("totalmoneyavailable_session");
  session_register("dailypopulationtaxes_session");
  session_register("citizens_session");
  session_register("activity_session");
  session_register("event_number_session");
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


<?     $last_date=$DateDiff["d"][$rsGuestbook["Last_Tax_Collection"]][time()()];
    if ($last_date>0 && $last_date<1)
    {

      $last_date=1;
    } 



    if ($rsUser["Site_Ads"]==1)
    {

      $interestrate=12;
      $maxearnedinterest=10000;
      $earnedinterest=($totalmoneyavailable*.12)*($last_date-1);
    }
      else
    {

      $interestrate=8;
      $maxearnedinterest=5000;
      $earnedinterest=($totalmoneyavailable*.08)*($last_date-1);
    } 



    if ($totalmoneyavailable<0)
    {

      $earnedinterest=0;
    } 

    if ($earnedinterest<0)
    {

      $earnedinterest=0;
    } 


    if ($earnedinterest>$maxearnedinterest)
    {

      $earnedinterest=$maxearnedinterest;
    } 


    $totalmoneyavailable_session=$totalmoneyavailable;
    $dailypopulationtaxes_session=$dailypopulationtaxes;
    $citizens_session=$citizens;
?>

   <table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
   <form name="FrontPage_Form1" method="post" action="collect_taxes_code.asp?Nation_ID=<?     echo $rsGuestbook["Nation_ID"]; ?>">
	<tr>
		<td align="right" colspan="2" bgcolor="#000080">
		<p align="center">
		<img border="0" src="images/jpgtaxes.jpg" width="500" height="100"></td>
	</tr>
	<tr>
		<td align="right" width="50%" valign="top">Last Tax Collection Date</td>
		<td width="50%"> 
		<?     echo $FormatDateTime[$rsGuestbook["Last_Tax_Collection"]][2]; ?></td>
	</tr>
	<tr>
		<td align="right" width="50%" valign="top">Days Since Last Tax Collection</td>
		<td width="50%"> 

<?     echo $last_date; ?></td>
	</tr>
	<tr>
		<td align="right" width="50%" valign="top">
		Current Money Available</td>
		<td width="50%"> 
		
		
$<?     echo $totalmoneyavailable; ?></td>



	</tr>
	<tr>
		<td align="right" width="50%" valign="top">Earned Interest Since Last Collection</td>
		<td width="50%"> 
	
		$<?     echo $FormatNumber[$earnedinterest][2]; ?> <br>
		<i><?     echo $interestrate; ?>% per day on available cash. (Max $<?     echo $FormatNumber[$maxearnedinterest][0]; ?>)&nbsp; <br>
		No interest on first day.</i></td>
	</tr>
	<tr>
		<td align="right" width="50%" valign="top">Daily Population Taxes (Per Citizen)</td>
		<td width="50%"> 
		$<?     echo $FormatNumber[$dailypopulationtaxes][2]; ?></td>
	</tr>
	<tr>
		<td align="right" width="50%" valign="top">Taxpaying Citizens</td>
		<td width="50%"> 
		<?     echo ($FormatNumber[$citizens][0]); ?></td>
	</tr>
	
	<tr>
<td align="right" width="50%" valign="top"><b>Total Collection Amount</b></td>
<td width="50%"> 
<b> 
<?     $collection=(($dailypopulationtaxes*($FormatNumber[$citizens][0]))*$last_date)+$earnedinterest;
?>
$<?     echo $FormatNumber[$collection][2]; ?></b></td>
	</tr>
	
	
	
	
	

	
	
	
	<tr>
<td align="right" width="50%" valign="top"><b>Total Money Available After Tax Collection</b></td>
<td width="50%"> 
<b> 

$<?     echo $FormatNumber[$collection+$totalmoneyavailable][2]; ?></b></td>
	</tr>
			
	</table>
	<p align="center">   


   
<!--#include file="activitycheck.php" --> 
   

<input type="hidden" name="Poster" value="<?     echo $rsGuestbook["Poster"]; ?>">
<input type="hidden" name="Nation_ID" value="<?     echo $rsGuestbook["Nation_ID"]; ?>">
   
   <?     if ($last_date==0)
    {
?>

<font color="#FF0000">You cannot collect taxes today. You may only collect taxes once a day.
 <br>The current server date and time is <?       echo strftime("%m/%d/%Y %H:%M:%S %p")(); ?>.
 <br>The daily update occurs at 6 am GMT.<br>
Countdown to update:


<SCRIPT type="text/javascript">

////////// CONFIGURE THE COUNTDOWN SCRIPT HERE //////////////////

var month = '0';     //  '*' for next month, '0' for this month or 1 through 12 for the month 
var day = '+1';       //  Offset for day of month day or + day  
var hour = 0;        //  0 through 23 for the hours of the day
var tz = -6;         //  Offset for your timezone in hours from UTC
var lab = 'tzcd';    //  The id of the page entry where the timezone countdown is to show

function start() {displayTZCountDown(setTZCountDown(month,day,hour,tz),lab);}


window.onload = start;



function setTZCountDown(month,day,hour,tz) 
{
var toDate = new Date();
//document.getElementById("stuff").innerHTML = "<br>" + toDate ;
if (month == '*')toDate.setMonth(toDate.getMonth() + 1);
else if (month > 0) 
{ 
if (month <= toDate.getMonth())toDate.setYear(toDate.getYear() + 1);
toDate.setMonth(month-1);
}
if (day.substr(0,1) == '+') 
{var day1 = parseInt(day.substr(1));
toDate.setDate(toDate.getDate()+day1);
} 
else{toDate.setDate(day);
}
toDate.setHours(hour);
toDate.setMinutes(0-(tz*60));
toDate.setSeconds(0);
var fromDate = new Date();
fromDate.setMinutes(fromDate.getMinutes() + fromDate.getTimezoneOffset());
var diffDate = new Date(0);
diffDate.setMilliseconds(toDate - fromDate);
return Math.floor(diffDate.valueOf()/1000);
}
function displayTZCountDown(countdown,tzcd) 
{
if (countdown < 0) document.getElementById(tzcd).innerHTML = "Sorry, you are too late."; 
else {var secs = countdown % 60; 
if (secs < 10) secs = '0'+secs;
var countdown1 = (countdown - secs) / 60;
var mins = countdown1 % 60; 
if (mins < 10) mins = '0'+mins;
countdown1 = (countdown1 - mins) / 60;
var hours = countdown1 % 24;
var days = (countdown1 - hours) / 24;
//document.getElementById(tzcd).innerHTML = days + " day" + (days == 1 ? '' : 's') + ' + ' +hours+ 'h : ' +mins+ 'm : '+secs+'s';
document.getElementById(tzcd).innerHTML =  +hours+ 'h : ' +mins+ 'm : '+secs+'s';
setTimeout('displayTZCountDown('+(countdown-1)+',\''+tzcd+'\');',999);

}
}
</SCRIPT>


<span id="tzcd"></span>


<?     }
      else
    {
?>
   <?       if ($collection<0)
      {
?>
   Sorry, you have nothing to collect at this time.
   <?       }
        else
      {
?>
<? 
        $event_number=0;
        mt_srand((double)microtime()*1000000);
        $event_number=intval((mt_rand(0,10000000)/10000000))+1;
        $event_number_session=$event_number;
        $clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;
?>

   <input type="submit" class="Buttons" name="Submit" value="Collect Taxes">
   <?       } ?>
<?     } ?>
</p>
</form>
<!-- End form code -->
<p align="center">&nbsp;</p>
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
