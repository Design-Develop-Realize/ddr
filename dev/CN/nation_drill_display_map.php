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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="Window-target" content="_top" />
<script src="http://maps.google.com/maps?file=api&v=2.43&key=ABQIAAAAQpiA_mSUPTtx989SOA_cqxQUbKRsxEr5HWq648QG6J5HPXuJ8hQeBxX39VAlA_htuj56kKr6UVzGFw" type="text/javascript"></script>


<script type="text/javascript">
//<![CDATA[

var icon = new GIcon();
icon.shadow = "assets/mm_20_shadow.png";
icon.iconSize = new GSize(12, 20);
icon.shadowSize = new GSize(33, 20);
icon.iconAnchor = new GPoint(9, 20);
icon.infoWindowAnchor = new GPoint(9, 2);
icon.infoShadowAnchor = new GPoint(18, 25);

var deflon = <? echo $rsGuestbook["Nation_Lon"]; ?><%;
var deflat = <? echo $rsGuestbook["Nation_Lat"]; ?><%;
var defzoom = 6;
var mapDiv;
var map;
var oldPoly;


function createMarker(point,html) 
{
// FF 1.5 fix
html = '<div align="left" style="white-space:nowrap;"><font color="#000000">' + html + '</font></div>';
var marker = new GMarker(point, icon);
GEvent.addListener(marker, "click", function() {marker.openInfoWindowHtml(html);});						
return marker;
}



function drawCircle(center, radius) {
	if(oldPoly) {
		map.removeOverlay(oldPoly);
		oldPoly=null;
	}
	var circleQuality = 5;			//1 is best but more points, 5 looks pretty good, too
	var M = Math.PI / 180;			//Create Radian conversion constant
	var L = map.getBounds();		//Holds copy of map bounds for use below
	var sw = L.getSouthWest();
	var ne = L.getNorthEast();
	var circleSquish = (ne.lng() - sw.lng()) / (ne.lat() - sw.lat());
	var points = [];							//Init Point Array
	for(var i=0; i<360; i+=circleQuality){
		var P = new GLatLng(
			center.lat() + (radius * Math.sin(i * M)),
			center.lng() + (radius * Math.cos(i * M)) * circleSquish
			);
		points.push(P);
	}
	
	
	
var outlinecolor 
outlinecolor="#000000"

var Cwidth = 4;
	points.push(points[0]);	// close the circle
	oldPoly = new GPolyline(points,outlinecolor,Cwidth)
	map.addOverlay(oldPoly);
}


function initMap() {
	map = new GMap2(mapDiv);					// create "map" object
	map.addControl(new GScaleControl());		// add scale control
	map.addControl(new GSmallMapControl());		// add small map controls
	map.addControl(new GMapTypeControl(true));	// add map type control
	map.setCenter(new GLatLng(deflat, deflon), defzoom);
	map.addControl(new GOverviewMapControl(new GSize(150, 100)));
	var omap = document.getElementById("map_overview");
	var place = document.getElementById("map");
	place.appendChild(omap);
	omap.style.right = "0px";
	omap.style.bottom = "8px";	
	
	var nationsize
	nationsize = (<? echo $nationsize; ?><%/2) * .01
	drawCircle(map.getCenter(), nationsize); //mile radius would be 500 miles


<? if ($rsGuestbook["Nation_Team"]="None"$then; )
{

$icon->image="assets/mm_20_grey.png"$;;
$icon->image="assets/mm_20_<% = rsGuestbook("$Nation_Team"); ?>.png";
<? } ?><%
var point = new GPoint(<? echo $rsGuestbook["Nation_Lon"]; ?><%,<? echo $rsGuestbook["Nation_Lat"]; ?><%);
var marker = createMarker(point,"</center><font color='#000000'>Nation Name: <a href=\"nation_drill_display.asp?Nation_ID=<? echo ($rsGuestbook["Nation_ID"].$Value); ?><%\"><? echo $rsGuestbook["Nation_Name"]; ?><%</a><BR>Capital: <? echo $rsGuestbook["Capital_City"]; ?><%<BR>Ruler: <? echo $rsGuestbook["Poster"]; ?><%<br>Government Type: <? echo ($rsGuestbook["Government_Type"].$Value); ?><%<br> Religion: <? echo ($rsGuestbook["Religion"].$Value); ?><%<br>Ethnicity: <? echo ($rsGuestbook["Ethnic_Group"].$Value); ?><%<br>Land Area: <? echo $FormatNumber[$nationsize][2]; ?><%<br>Team: <? echo ($rsGuestbook["Nation_Team"].$Value); ?><%<br>Created: <? echo ($rsGuestbook["Nation_Dated"].$Value); ?><%</font>");
map.addOverlay(marker);


}






function initPage() {
	mapDiv = document.getElementById("map");
	initMap();
}

//]]>
		</script>
	</head>
<body onload="initPage()">
<p align="left">Zoom in on the map to view a closer look of the nation. 
Click on the marker for more information about the nation. The circle around the 
capital city marker indicates land area. The color of the marker indicates the nation team. </p>
<center>
		<div id="map" style="width: 500px; height: 400px"></center>
<noscript> 
<font color="Red">***If you are seeing this line (for more than a few seconds), you have 
JavaScript disabled (or an unsupported browser). In order to play Cyber Nations you must
use a compatable browser and have Java Scripts turned on.***</font>
</noscript> 


<!--#include file="inc_footer.php" -->
<? 

$rsGuestbook=null;

$objConn->Close();
$objConn=null;

?>
</html>

