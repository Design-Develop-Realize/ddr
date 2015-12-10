<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
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


//

//  This function get the arccos function from arctan function    

//

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


//

//  This function converts decimal degrees to radians             

//

function deg2rad($Deg)
{
  extract($GLOBALS);


  $deg2rad=$cdbl[$Deg*$pi/180];
  return $function_ret;
} 

//

//  This function converts radians to decimal degrees             

//

function rad2deg($Rad)
{
  extract($GLOBALS);


  $rad2deg=$cdbl[$Rad*180/$pi];
  return $function_ret;
} 


?>



<? 
$lngRecordNo=intval($_GET["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
$rsGuestbook_numRows=0;
?>



<? 
// $rsSent2 is of type "ADODB.Recordset"

$rsSent2SQL="SELECT * FROM Nation";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSent2SQL);
$rsSent2_numRows=0;
?>

 

<!--#include file="inc_header.php" -->
<? if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper($rsGuestbook0->Fields.$Item["POSTER"].$Value))
{
?>
<p></p><font color="red">Please do not attempt to cheat.</font>
<? }
  else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="Window-target" content="_top" />



<? 



  while((!($rsSent2==0)))
  {

    if ($rsSent2["nation_lon"]<-300)
    {

?>
<?       echo $rsSent2["Nation_Lon"]; ?> ***** <?       echo $rsSent2["Nation_LAT"]; ?> --- <?       echo $rsSent2["Nation_Name"]; ?><BR>


<? 
    } 

    $rsSent2=mysql_fetch_array($rsSent2_query);
    $rsSent2_BOF=0;


  } 
?>








	</head>


	<table border="0" width="90%" id="table3">
		<tr>
			<td align="left" valign="top">

			<br>This map will display the nations that are 1) within 500 miles 
			of your capital city and 2) within your range of nations that you 
			can declare war on. The map may take a few seconds to fully load.<p>
			</p>
			<div id="map" style="width: 100%; height: 450px"></div>
			
			<div id="message">
				<p>&nbsp;</div>
				</center>
				<noscript> 
<font color="Red">***If you are seeing this line (for more than a few seconds), you have 
JavaScript disabled (or an unsupported browser). In order to play Cyber Nations you must
use a compatable browser and have Java Scripts turned on.***</font>
</noscript> 
			</td>
		</tr>
	</table>

<? } ?>
<!--#include file="inc_footer.php" -->
<? 


$rsSent2=null;

$objConn->Close;
$objConn=null;

?>
