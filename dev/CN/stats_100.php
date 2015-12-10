<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
?>


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

<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<!--#include file="calculations.php" -->


<? 
// $rsGuestbook2 is of type "ADODB.Recordset"

$rsGuestbook2SQL="SELECT Poster,Nation_Lat,Nation_Lon,Nuclear_Purchased,Nation_Name,Nation_ID,Land_Purchased,Infrastructure_Purchased,Technology_Purchased,Military_Purchased,Military_Attacking_Casualties,Military_Defending_Casualties,Nation_Team,Nation_Peace,Strength  FROM Nation ORDER BY  Strength  DESC ";
echo 3;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook2SQL);
$rsGuestbook2_numRows=0;
?>

<p align="center"><b>My Nation Ranking</b></p>

<!--#include file="stats_include.php" -->
<br>
<table border="1" width="100%" id="table1" cellspacing="0" bordercolor="#000080" cellpadding="5">
	<tr>
		<td><b><u><br>
		Your Nation Ranking:</u> (This list also indicates who you are able to 
declare war on.)</b><p></p>
<? 
$pi=3.14159265358979323846;
function distance($lat1,$lon1,$lat2,$lon2,$unit)
{
  extract($GLOBALS);


  $theta=$lon1-$lon2;
  $dist=sin(deg2rad($lat1))*sin(deg2rad($lat2))+cos(deg2rad($lat1))*cos(deg2rad($lat2))*cos(deg2rad($theta));
  $dist=acos($dist);
  $dist=rad2deg($dist);
  $distance=$dist*60*1.1515;
  switch (strtoupper($unit))
  {
    case "K":
      $distance=$distance*1.609344;
      break;
    case "N":
      $distance=$distance*0.8684;
      break;
  } 
  return $function_ret;
} 
function acos($rad)
{
  extract($GLOBALS);


  if (abs($rad)!=1)
  {

    $acos=$pi/2-atan($rad/sqrt(1-$rad*$rad));
  }
    else
  if ($rad==-1)
  {

    $acos=$pi;
  } 

  return $function_ret;
} 
function deg2rad($Deg)
{
  extract($GLOBALS);


  $deg2rad=$cdbl[$Deg*$pi/180];
  return $function_ret;
} 
function rad2deg($Rad)
{
  extract($GLOBALS);


  $rad2deg=$cdbl[$Rad*180/$pi];
  return $function_ret;
} 
?>
<? 
$proceed=0;
$myrank=0;
$anothercntr=0;
$anothercntr2=0;
$nation_recordcounter=0;
while($anothercntr2<50)
{

  $nation_recordcounter=$nation_recordcounter+1;
?>
<? 
  if ($rsGuestbook2["Nation_Name"]=$rsGuestbook0["Nation_Name"]&$proceed=0$then;
$proceed==1)
  {
    $anothercntr=1;
  } 
  mysql_data_seek($rsGuestbook2_query,75);
  if ($nation_recordcounter>75)
  {

    $nation_recordcounter=$nation_recordcounter-75;
  }
    else
  {

    $nation_recordcounter=0;
  } 

} if ()
{
?>
<? 
  if ($anothercntr>1 && $anothercntr2<50 && $proceed==1)
  {

    $anothercntr=$anothercntr+1;
    if ($anothercntr2>0)
    {

      $anothercntr2=$anothercntr2+1;
    } 

    $nationdistance=distance($rsGuestbook2["Nation_Lat"],$rsGuestbook2["Nation_Lon"],$rsGuestbook0["Nation_Lat"],$rsGuestbook0["Nation_Lon"],"M");
    $theirnationage=time()()-$rsGuestbook2["Nation_Dated"]+1;
    $theirnationsize=(round(($theirnationage/2),3))+$rsGuestbook2["Land_Purchased"];
    if (($theirnationsize/2)+($nationsize/2)>$nationdistance && strtoupper($rsGuestbook2["Nation_Name"])!=strtoupper($rsGuestbook0["Nation_Name"]))
    {

      $encroachment=1;
    }
      else
    {

      $encroachment=0;
    } 

    $powermeter=$rsGuestbook2["Strength"];
?>
	<?     if ($rsGuestbook2["Nation_Name"]=$rsGuestbook0["Nation_Name"]$then; )
    {
    } 
//background-color: #FFFF00">
    echo 1;
  } ?>
	<?   echo $nation_recordcounter; ?>) <a href="nation_drill_display.asp?Nation_ID=<?   echo $rsGuestbook2["Nation_ID"]; ?>"><?   echo $rsGuestbook2["Nation_Name"]; ?></a> (<?   echo $rsGuestbook2["Poster"]; ?>) - <?   echo $FormatNumber[$powermeter][3]; ?>
	<?   if ($rsGuestbook2["Nation_Team"]!="None")
  {
?>
	- <font color="<?     echo $rsGuestbook2["Nation_Team"]; ?>"><?     echo $rsGuestbook2["Nation_Team"]; ?> Team</font>
	<?   }
    else
  {
?>
	-  No Team
	<?   } ?>
<?   if ($rsGuestbook2["Nation_Peace"]=1$then; )
  {

//images/peace.gif" height="14" title="Peace Mode">
//Nation_Peace") = 0 then?>  } 

//images/war.gif" height="13" title="War is an option">
//Nuclear_Purchased") > 0 then?>} 

//0" src="images/nukesmall.png" title="Nation has nuclear weapons." width="11" height="9">
$then; ?><font color="red"><b> (Land Encroachment! <? echo $FormatNumber[$nationdistance][0]; ?> Miles!)</b></font><? > 
	<br>
	</span>
<? 
