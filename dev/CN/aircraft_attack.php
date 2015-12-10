<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
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
$aircraftlimit=50;


// $rsAttack is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT * FROM Nation WHERE Upper(Poster)='".strtoupper($rsUser["U_ID"])."'  ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();

// $rsDefend is of type "ADODB.Recordset"

echo $MM_conn_STRING;


if ($_POST["attack"]!=1)
{

  $lngRecordNo1=intval($_GET["Nation_ID"]);
  $lngRecordNo1=str_replace("'","''",$lngRecordNo1);
    echo "SELECT * FROM Nation WHERE Nation_ID='".$lngRecordNo1."' ";
}
  else
{

  $lngRecordNo2=intval($_POST["defendingnation"]);
  $lngRecordNo2=str_replace("'","''",$lngRecordNo2);
    echo "SELECT * FROM Nation WHERE Nation_ID='".$lngRecordNo2."' ";
} 

echo 0;
echo 2;
echo 3;
$rs=mysql_query();

if (($rsDefend_BOF==1) && ($rsDefend==0))
{

  header("Location: "."failed_noexist.asp");
} 


// $rsSent is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT * FROM WAR WHERE (Receiving_Nation_ID = '".$rsAttack["Nation_ID"]."' OR Declaring_Nation_ID = '".$rsAttack["Nation_ID"]."') AND (Receiving_Nation_ID = '".$rsDefend["Nation_ID"]."' OR Declaring_Nation_ID = '".$rsDefend["Nation_ID"]."') AND (Nation_Deleted = 0) AND (Receiving_Nation_Peace + Declaring_Nation_Peace <> 2) AND (getdate() - War_Declaration_Date < 8)  ORDER BY War.War_Declaration_Date DESC";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();

// $rsAircraft is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT * FROM Aircraft WHERE Nation_ID=".$rsAttack["Nation_ID"];
echo 0;
echo 2;
echo 3;
$rs=mysql_query();

// $rsDAircraft is of type "ADODB.Recordset"

echo $MM_conn_STRING;
if ($_POST["attack"]!=1)
{

    echo "SELECT * FROM Aircraft WHERE Nation_ID='".intval($_GET["Nation_ID"])."' ";
}
  else
{

    echo "SELECT * FROM Aircraft WHERE Nation_ID='".intval($_POST["defendingnation"])."' ";
} 

echo 0;
echo 2;
echo 3;
$rs=mysql_query();
if (($rsDAircraft_BOF==1) && ($rsDAircraft==0))
{

  $defending_fighters_strength=0;
  $defending_fighters=0;
}
  else
{

  $defending_fighters=($rsDAircraft["Yakovlev Yak-9"])+($rsDAircraft["P-51 Mustang"])+($rsDAircraft["F-86 Sabre"])+($rsDAircraft["Mikoyan-Gurevich MiG-15"])+($rsDAircraft["F-100 Super Sabre"])+($rsDAircraft["F-35 Lightning II"])+($rsDAircraft["F-15 Eagle"])+($rsDAircraft["Su-30 MKI"])+($rsDAircraft["F-22 Raptor"]);
  $defending_fighters_strength=($rsDAircraft["Yakovlev Yak-9"]*1)+($rsDAircraft["P-51 Mustang"]*2)+($rsDAircraft["F-86 Sabre"]*3)+($rsDAircraft["Mikoyan-Gurevich MiG-15"]*4)+($rsDAircraft["F-100 Super Sabre"]*5)+($rsDAircraft["F-35 Lightning II"]*6)+($rsDAircraft["F-15 Eagle"]*7)+($rsDAircraft["Su-30 MKI"]*8)+($rsDAircraft["F-22 Raptor"]*9);
} 



?>
<? if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
{
?>
Please stop trying to cheat. 
<? }
  else
{
?>

<? 
  $theyareatwar=0;
  while((!($rsSent_BOF==1)) && (!($rsSent==0)))
  {

    if (strtoupper($rsSent["Declaring_Nation"])==strtoupper($rsDefend["Nation_Name"]) || strtoupper($rsSent["Receiving_Nation"])==strtoupper($rsDefend["Nation_Name"]))
    {

      $theyareatwar=1;
    } 

    $rsSent=mysql_fetch_array($rsSent_query);
    $rsSent_BOF=0;

  } 
  
?>

<?   if ($theyareatwar==0)
  {
?>
Please stop trying to cheat. 
<?   }
    else
  {
?>

<?     if (($rsSent_BOF==1) && ($rsSent==0))
    {
?>
You are not at war with that nation.
<?     }
      else
    {
?>




<?       if ($_POST["attack"]==1)
      {
?>

<!--#include file="aircraft_attack_results.php" -->

<?       } ?>



<?       if ($_POST["attack"]!=1)
      {
?>
<noscript><font color="red"><b><br>You must have JavaScript enabled to use this page.<p></p></b></font></noscript>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=500,height=460,left = 262,top = 154');");
}
// End -->
</script>
<?         if (!($rsAircraft_BOF==1) && !($rsAircraft==0))
        {
?>
<script type="text/javascript">
var submit_ok;
function d(){
  var f1 = parseInt(document.form1.f1.value);
  var f2 = parseInt(document.form1.f2.value);
  var f3 = parseInt(document.form1.f3.value);
  var f4 = parseInt(document.form1.f4.value);
  var f5 = parseInt(document.form1.f5.value);
  var f6 = parseInt(document.form1.f6.value);
  var f7 = parseInt(document.form1.f7.value);
  var f8 = parseInt(document.form1.f8.value);
  var f9 = parseInt(document.form1.f9.value);
  
  var b1 = parseInt(document.form1.b1.value);
  var b2 = parseInt(document.form1.b2.value);
  var b3 = parseInt(document.form1.b3.value);
  var b4 = parseInt(document.form1.b4.value);
  var b5 = parseInt(document.form1.b5.value);
  var b6 = parseInt(document.form1.b6.value);
  var b7 = parseInt(document.form1.b7.value);
  var b8 = parseInt(document.form1.b8.value);
  var b9 = parseInt(document.form1.b9.value);
  var fighters = (f1 + f2 + f3 + f4 + f5 + f6 + f7 + f8 + f9);
  var bombers = (b1 + b2 + b3 + b4 + b5 + b6 + b7 + b8 + b9);
  var total = (fighters + bombers);
 
    if (total <= <?           echo $aircraftlimit; ?> && total > 0) 
	{
	document.getElementById('results').innerHTML="Fighter Squadron Size: " + fighters + "<br>Bomber Squadron Size: " + bombers + "<br>Total Aircraft: " + total;
		if (fighters >  0 && bombers == 0 && <?           echo $defending_fighters; ?> > 0) 
		{
		document.getElementById('results_type').innerHTML="<i>Attack Type: Air-to-Air fighter combat.</i>";
		}
		if (fighters >  0 && bombers == 0 && <?           echo $defending_fighters; ?> <= 0) 
		{
		document.getElementById('results_type').innerHTML="<i>Attack Type: <font color='#FF0000'>Air-to-Air fighter combat. Please note that your enemy currently does not have any fighter aircraft. A bombing run is more appropriate at this time.</i>";
		}
		if (fighters ==  0 && bombers > 0 && <?           echo $defending_fighters; ?> > 0) 
		{
		document.getElementById('results_type').innerHTML="<i>Attack Type: <font color='#FF0000'>Unescorted Air-to-Ground bombing campaign. Your enemy has fighter aircraft and will likley shoot down your bombers.</font></i>";
		}
		if (fighters ==  0 && bombers > 0 && <?           echo $defending_fighters; ?> <= 0) 
		{
		document.getElementById('results_type').innerHTML="<i>Attack Type: Unescorted Air-to-Ground bombing campaign. Your enemy has zero known fighters, your bombers should be safe.</i>";
		}
		if (fighters >  0 && bombers > 0) 
		{
		document.getElementById('results_type').innerHTML="<i>Attack Type: Fighter escorted Air-to-Ground bombing campaign.</i>";
		}
	submit_ok = 'Yes';
	}
	else
	{
	document.getElementById('results').innerHTML="<font color='#FF0000'>You did not select a valid number or aircraft. You must select between 1 and <?           echo $aircraftlimit; ?> aircraft for this raid.";
	submit_ok = 'No';
	} 
	
	
	if (f1 > <?           echo $rsAircraft["Yakovlev Yak-9"]; ?> || f1 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many Yakovlev Yak-9 aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (f2 > <?           echo $rsAircraft["P-51 Mustang"]; ?> || f2 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many P-51 Mustang aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (f3 > <?           echo $rsAircraft["F-86 Sabre"]; ?> || f3 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many F-86 Sabre aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (f4 > <?           echo $rsAircraft["Mikoyan-Gurevich MiG-15"]; ?> || f4 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many Mikoyan-Gurevich MiG-15 aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (f5 > <?           echo $rsAircraft["F-100 Super Sabre"]; ?> || f5 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many F-100 Super Sabre aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (f6 > <?           echo $rsAircraft["F-35 Lightning II"]; ?> || f6 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many F-35 Lightning II aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (f7 > <?           echo $rsAircraft["F-15 Eagle"]; ?> || f7 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many F-15 Eagle aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (f8 > <?           echo $rsAircraft["Su-30 MKI"]; ?> || f8 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many Su-30 MKI aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (f9 > <?           echo $rsAircraft["F-22 Raptor"]; ?> || f9 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many F-22 Raptor aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	
	if (b1 > <?           echo $rsAircraft["AH-1 Cobra"]; ?> || b1 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many AH-1 Cobra aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (b2 > <?           echo $rsAircraft["AH-64 Apache"]; ?> || b2 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many AH-64 Apache aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (b3 > <?           echo $rsAircraft["Bristol Blenheim"]; ?> || b3 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many Bristol Blenheim aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (b4 > <?           echo $rsAircraft["B-25 Mitchell"]; ?> || b4 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many B-25 Mitchell aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (b5 > <?           echo $rsAircraft["B-17G Flying Fortress"]; ?> || b5 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many B-17G Flying Fortress aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (b6 > <?           echo $rsAircraft["B-52 Stratofortress"]; ?> || b6 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many B-52 Stratofortress aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (b7 > <?           echo $rsAircraft["B-2 Spirit"]; ?> || b7 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many B-2 Spirit aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (b8 > <?           echo $rsAircraft["B-1B Lancer"]; ?> || b8 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many B-1B Lancer aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	if (b9 > <?           echo $rsAircraft["Tupolev Tu-160"]; ?> || b9 < 0){
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many Tupolev Tu-160 aircraft.";
	document.getElementById('results_type').innerHTML="";
	submit_ok = 'No';
	}
	
}
function submit_form(){
submit_ok = 'No';
 d()
    if (submit_ok == 'Yes') {
  	document.form1.submit();
    }
}
// End -->
</script>
<?         } ?>



<p align="center">
<?         if (!isset($rsDefend["Flag"]) || $rsDefend["Flag"]="images/flags/None.jpg"|!isset($rsAttack["Flag"])|$rsAttack["Flag"]="images/flags/None.jpg"$then;
;
      }
        else
      {


<img src="<? )
      {
        echo $rsAttack["Flag"];       } ?>"> vs. <img src="<?       echo $rsDefend["Flag"]; ?>">
<?     } ?>
<? 
    $declaring=0;
    $receiving=0;
    $cleartobattle=0;
    if (strtoupper($rsSent["Declaring_Nation_ID"])==strtoupper($rsAttack["Nation_ID"]))
    {
      $declaring=1;
    }
;
    } 
    if (strtoupper($rsSent["Receiving_Nation_ID"])==strtoupper($rsAttack["Nation_ID"]))
    {
      $receiving=1;
    }
;
    } ?>

<?     if ($declaring==1 && $rsSent["Declaring_Aircraft_Date2"]=time()()$then; )
    {

      $p>$You$have$already$launched$two$aircraft$attacks$today$against<$%=$rsDefend["Nation_Name"]; ?>. Your 
flight crews are not prepared to launch 
aircraft against <?       echo $rsDefend["Nation_Name"]; ?> at this time.
<?     }
      else
    {
      if ($declaring==1 && $rsSent["Declaring_Aircraft_Date1"]=time()()$then;
$cleartobattle==1)
      {
?>
<p></p>You have already launched one aircraft attack today against <?         echo $rsDefend["Nation_Name"]; ?>. You have
one more aircraft attack left.
<?       }
        else
      {
        if ($declaring==1)
        {

          $cleartobattle=1;
?>
<p></p>This will be your first aircraft attack against <?           echo $rsDefend["Nation_Name"]; ?> today. You
will be able to carry out a total of two aircraft attacks against <?           echo $rsDefend["Nation_Name"]; ?> today.
<?         } ?><?       } ?><?     } ?>



<?     if ($receiving==1 && $rsSent["Receiving_Aircraft_Date2"]=time()()$then; )
    {

      $p>$You$have$already$launched$two$aircraft$attacks$today$against<$%=$rsDefend["Nation_Name"]; ?>. Your 
flight crews are not prepared to launch 
aircraft against <?       echo $rsDefend["Nation_Name"]; ?> at this time. 
<?     }
      else
    {
      if ($receiving==1 && $rsSent["Receiving_Aircraft_Date1"]=time()()$then;
$cleartobattle==1)
      {
?>
<p></p>You have already launched one aircraft attack today against <?         echo $rsDefend["Nation_Name"]; ?>. You have
one more aircraft attack left.
<?       }
        else
      {
        if ($receiving==1)
        {

          $cleartobattle=1;
?>
<p></p>This will be your first aircraft attack against <?           echo $rsDefend["Nation_Name"]; ?> today. You
will be able to carry out a total of two aircraft attacks against <?           echo $rsDefend["Nation_Name"]; ?> today.
<?         } ?><?       } ?><?     } ?>

<br>
<?     if ($cleartobattle==1)
    {
?>&nbsp;&nbsp;

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="0" valign="top">
<div align="center">
<table width="100%" border="0" cellspacing="0">
<tr> 
<td height="278" valign="top"> <div align="center"> 
<div align="center">
<table width="100%" 
border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
<tbody>
<tr bgcolor="5E6C50" class=colorformheader> 
<td colspan=2 bgcolor="#000080">
<p align="left">
<font class=textsize9 color="#FFFFFF"><b>&nbsp;:. Launch Aircraft Attack Against <?       echo (.$Item["Nation_Name"].$Value); ?></b></font></td>
</tr>



<tr>
<td align=right width="31%">
Defending Nation<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<a href="nation_drill_display.asp?Nation_ID=<?       echo (.$Item["Nation_ID"].$Value); ?>">
<?       echo (.$Item["Nation_Name"].$Value); ?></a> (<?       echo (.$Item["Poster"].$Value); ?>)


</font></td>
</tr>


<tr>
<td align=right width="31%">
Defending Tanks<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<? 
      if (!isset(("Tanks_Defending")))
      {

        $numtanksdefending=0;
      }
        else
      {

        $numtanksdefending=("Tanks_Defending");
      } 

?>
<?       echo $numtanksdefending; ?>


</font></td>
</tr>
<tr>
<td align=right width="31%">
Defending Infrastructure<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<?       echo $FormatNumber[$rsDefend["Infrastructure_Purchased"]][2]; ?>


</font></td>
</tr>
<tr>
<td align=right width="31%">
Defending Fighters:</td>
<td width="69%">
<? 
      print $defending_fighters;
?>

</td>
</tr>
<tr>
<td align=right width="31%">
Defensive Strength:</td>
<td width="69%">
<? 
      print $defending_fighters_strength;
?>
</td>
</tr>
<tr>
<td align=right width="100%" colspan="2">
<p align="center">
<table border="0" width="100%" id="table2" cellspacing="0" cellpadding="0" bordercolor="#000080">
	<tr>
		<td width="16%">
		
		
		<div align="center">
		
<p align="left">
		
<?       if (($rsAircraft_BOF==1) && ($rsAircraft==0))
      {
?>
You do not have any aircraft to attack with. You may purchase aircraft by visiting the 
<a href="military_purchase.php">Military Purchase</a> screen. 	
<?       }
        else
      {
?>
</p>
<form name="form1" method="post" action="aircraft_attack.php">
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="6" bordercolor="#E1E1E1">
	<tr>
		
		<td width="25%" align="right" bgcolor="#C0C0C0">
		<b><font style="font-size: 7pt">Fighter Aircraft</font></b></td>
		<td width="8%" bgcolor="#C0C0C0">  
		<p align="center"><b><font style="font-size: 7pt">Available</font></b></td>
		<td width="15%" bgcolor="#C0C0C0">  
		<b><font style="font-size: 7pt">Attacking</font></b></td>
		
		<td width="25%" align="right" bgcolor="#C0C0C0">
		<b><font style="font-size: 7pt">Bomber Aircraft</font></b></td>
		<td width="8%" bgcolor="#C0C0C0">  
		<p align="center"><b><font style="font-size: 7pt">Available</font></b></td>
		<td width="15%" bgcolor="#C0C0C0">  
		<b><font style="font-size: 7pt">Attacking</font></b></td>
	</tr>
	<tr>
		
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Yakovlev Yak-9
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Yakovlev Yak-9')"><img border="0" src="images/information.gif" width="17" height="16"></A>
		</td>
		<td width="8%" align="center">  
		<?         echo $rsAircraft["Yakovlev Yak-9"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["Yakovlev Yak-9"]>0)
        {
?>
		<input type="text" size="8" name="f1" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="f1" value="0">0
		<?         } ?>
		</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		AH-1 Cobra
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=AH-1 Cobra')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="9%" align="center">  
		<?         echo $rsAircraft["AH-1 Cobra"]; ?></td>
		<td width="18%">  
		<?         if ($rsAircraft["AH-1 Cobra"]>0)
        {
?>
		<input type="text" size="8" name="b1" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="b1" value="0">0
		<?         } ?>
		</td>
	</tr>
	<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		P-51 Mustang
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=P-51 Mustang')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="8%" align="center">  
		<?         echo $rsAircraft["P-51 Mustang"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["P-51 Mustang"]>0)
        {
?>
		<input type="text" size="8" name="f2" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="f2" value="0">0
		<?         } ?>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		AH-64 Apache
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=AH-64 Apache')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="9%" align="center">  
<?         echo $rsAircraft["AH-64 Apache"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["AH-64 Apache"]>0)
        {
?>
		<input type="text" size="8" name="b2" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="b2" value="0">0
		<?         } ?>
		</td>
	</tr>
	<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-86 Sabre
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-86 Sabre')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="8%" align="center">  
<?         echo $rsAircraft["F-86 Sabre"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["F-86 Sabre"]>0)
        {
?>
		<input type="text" size="8" name="f3" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="f3" value="0">0
		<?         } ?>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		Bristol Blenheim
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Bristol Blenheim')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="9%" align="center">  
<?         echo $rsAircraft["Bristol Blenheim"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["Bristol Blenheim"]>0)
        {
?>
		<input type="text" size="8" name="b3" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="b3" value="0">0
		<?         } ?>
		</td>
	</tr>
	<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Mikoyan-Gurevich MiG-15
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Mikoyan-Gurevich MiG-15')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="8%" align="center">  
<?         echo $rsAircraft["Mikoyan-Gurevich MiG-15"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["Mikoyan-Gurevich MiG-15"]>0)
        {
?>
		<input type="text" size="8" name="f4" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="f4" value="0">0
		<?         } ?>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		B-25 Mitchell
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-25 Mitchell')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="9%" align="center">  
<?         echo $rsAircraft["B-25 Mitchell"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["B-25 Mitchell"]>0)
        {
?>
		<input type="text" size="8" name="b4" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="b4" value="0">0
		<?         } ?>
		</td>
	</tr>
	<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-100 Super Sabre
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-100 Super Sabre')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="8%" align="center">  
<?         echo $rsAircraft["F-100 Super Sabre"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["F-100 Super Sabre"]>0)
        {
?>
		<input type="text" size="8" name="f5" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="f5" value="0">0
		<?         } ?>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		B-17G Flying Fortress
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-17G Flying Fortress')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="9%" align="center">  
<?         echo $rsAircraft["B-17G Flying Fortress"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["B-17G Flying Fortress"]>0)
        {
?>
		<input type="text" size="8" name="b5" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="b5" value="0">0
		<?         } ?>
		</td>
	</tr>
	<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-35 Lightning II
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-35 Lightning II')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="8%" align="center">  
<?         echo $rsAircraft["F-35 Lightning II"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["F-35 Lightning II"]>0)
        {
?>
		<input type="text" size="8" name="f6" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="f6" value="0">0
		<?         } ?>
		</td>
		<td width="21%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		B-52 Stratofortress
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-52 Stratofortress')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="9%" align="center">  
<?         echo $rsAircraft["B-52 Stratofortress"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["B-52 Stratofortress"]>0)
        {
?>
		<input type="text" size="8" name="b6" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="b6" value="0">0
		<?         } ?>
		</td>
	</tr>
	<tr>
		<td width="25%" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" align="right">
		F-15 Eagle
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-15 Eagle')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="8%" align="center">  
<?         echo $rsAircraft["F-15 Eagle"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["F-15 Eagle"]>0)
        {
?>
		<input type="text" size="8" name="f7" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="f7" value="0">0
		<?         } ?>
		</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		B-2 Spirit
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-2 Spirit')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="9%" align="center">  
<?         echo $rsAircraft["B-2 Spirit"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["B-2 Spirit"]>0)
        {
?>
		<input type="text" size="8" name="b7" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="b7" value="0">0
		<?         } ?>
		</td>
	</tr>
	<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Su-30 MKI
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Su-30 MKI')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="8%" align="center">  
<?         echo $rsAircraft["Su-30 MKI"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["Su-30 MKI"]>0)
        {
?>
		<input type="text" size="8" name="f8" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="f8" value="0">0
		<?         } ?>
		</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		B-1B Lancer
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=B-1B Lancer')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="9%" align="center">  
<?         echo $rsAircraft["B-1B Lancer"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["B-1B Lancer"]>0)
        {
?>
		<input type="text" size="8" name="b8" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="b8" value="0">0
		<?         } ?>
		</td>
	</tr>
	<tr>
		<td width="25%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		F-22 Raptor
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=F-22 Raptor')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="8%" align="center">  
<?         echo $rsAircraft["F-22 Raptor"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["F-22 Raptor"]>0)
        {
?>
		<input type="text" size="8" name="f9" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="f9" value="0">0
		<?         } ?>
		</td>
		<td width="21%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000">
		Tupolev Tu-160
		<A HREF="javascript:popUp('aircraft_specifications.php?aircraft_specifications=Tupolev Tu-160')"><img border="0" src="images/information.gif" width="17" height="16"></A></td>
		<td width="9%" align="center">  
<?         echo $rsAircraft["Tupolev Tu-160"]; ?></td>
		<td width="15%">  
		<?         if ($rsAircraft["Tupolev Tu-160"]>0)
        {
?>
		<input type="text" size="8" name="b9" value="0">
		<?         }
          else
        {
?>
		<input type=hidden size="8" name="b9" value="0">0
		<?         } ?>
		</td>
	</tr>
</table>
<br>

<br>
<input name="attack" type="hidden" value=1>
<input name="defendingnation" type="hidden" value="<?         echo $rsDefend["Nation_ID"]; ?>">
	<?         if (time()()-$rsAttack["Last_Bills_Paid"]<=2)
        {
?>
	<!--#include file="activitycheck.php" -->
	<input type="button" value="Confirm Orders" onclick="d()">&nbsp; 
	<input type="button" onclick="submit_form()" value="Order Attack">
	<?         }
          else
        {
?>
	<font color="#FF0000"><p></p>You must <a href="pay_bills.asp?Nation_ID=<?           echo $rsAttack["Nation_ID"]; ?>">pay your bills</a>
	 before you can attack with aircraft.
	<?         } ?>
	
	


<table border="0" width="60%" cellspacing="0" cellpadding="10">
	<tr>
		<td width="4">&nbsp;</td>
		<td><span id='results'></span></td>
	</tr>
	<tr>
		<td width="4">&nbsp;</td>
		<td><span id='results_type'></span></td>
	</tr>
</table>
</form>
<?       } ?>
</p>
</div>
</td>
</tr>
</table></td>
</tr>
</tbody>
</table>
<p align="left">



</font>

</div>

<p>
&nbsp;</p>
<p>&nbsp;</p>
</div></td>
</tr>
</table>
</div>
 <br>

</td>
</tr>
</table>

<?     } ?>
<?   } ?><? } ?><? } ?><? ><!--#include file="inc_footer.php" --><? if ($%)
{
} 

$rsDefend=null;


$rsSent=null;


$rsAttack=null;

$rsGuestbook->Close;
$rsGuestbook=null;

$objConn->Close();
$objConn=null;

?>
