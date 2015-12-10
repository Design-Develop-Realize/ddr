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
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Top 50 * FROM Nation ORDER BY Strength DESC ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
$rsGuestbook_numRows=0;
?>

 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<script src="http://maps.google.com/maps?file=api&v=1&key=ABQIAAAAQpiA_mSUPTtx989SOA_cqxQUbKRsxEr5HWq648QG6J5HPXuJ8hQeBxX39VAlA_htuj56kKr6UVzGFw" type="text/javascript"></script>
<script src="script/xmaps.1b.js" type="text/javascript"></script>
</head>
<!--#include file="inc_header.php" -->
<body>
</center></div></center></div></center></div>


	<table border="0" width="90%" id="table3">
		<tr>
			<td align="left" valign="top">
			<br><b>The map may take a few seconds to fully load. Only the top 50 
			nations are displayed on the map. One of the major goals of the game 
			is to grow or battle your way to the top 50 to get your nation on 
			this map. </b>The <a href="stats.php">World Statistics</a> page provides a text 
			version of this map that lists the top 50 nations. Zoom in on 
			the map to view a closer look of each nation. Click on the markers 
			for more information about each nation. The inner circles of 
			the nations indicate the size of the nation and the color of the 
			marker as well as the outer band circle indicate the nation team.<p></p>
			<div id="map" style="width: 100%; height: 450px"></div>
			
			<div id="message">
				<p>&nbsp;</div></center>
				<noscript> 
<font color="Red">***If you are seeing this line (for more than a few seconds), you have 
JavaScript disabled (or an unsupported browser). In order to play Cyber Nations you must
use a compatable browser and have Java Scripts turned on.***</font>
</noscript> 
<p align="center">
<b><a href="stats.php">Main World Statistics Screen</a></b></p>
			</td>
		</tr>
	</table>
</td>
</tr>
</table></div></font>
</div>
</td>
</tr>
</table></div></font></div>
</td>
</tr>
</table>




</font>
</body>
</html>
<script type="text/javascript">
//<![CDATA[

var map = new GMap(document.getElementById("map"));
map.addControl(new GLargeMapControl());
map.addControl(new GScaleControl());
map.addControl(new GMapTypeControl());


GEvent.addListener(map, "moveend", function() {
var center = map.getCenterLatLng();
var latLngStr = '(' + center.y + ', ' + center.x + ')';
document.getElementById("message").innerHTML = latLngStr;
});

map.centerAndZoom(new GPoint(11.953125, 21.289374355860424), 16);

</script>
<? 
while((!($rsGuestbook==0)))
{

  $nation_recordcounter=$nation_recordcounter+1;
?>




<script>
var icon = new GIcon();
<?   if ($rsGuestbook["Nation_Team"]="None"$then; )
  {

$icon->image="assets/mm_20_grey.png"$;;
$icon->image="assets/mm_20_<% = rsGuestbook("$Nation_Team"); ?>.png";
<?   } ?>
icon.shadow = "assets/mm_20_shadow.png";
icon.iconSize = new GSize(12, 20);
icon.shadowSize = new GSize(22, 20);
icon.iconAnchor = new GPoint(6, 20);
icon.infoWindowAnchor = new GPoint(3, 1);
// Place the icons randomly in the map viewport
var bounds = map.getBoundsLatLng();
var width = bounds.maxX - bounds.minX;
var height = bounds.maxY - bounds.minY;
createMarker(new GPoint(<?   echo $rsGuestbook["Nation_Lon"]; ?>,<?   echo $rsGuestbook["Nation_Lat"]; ?>));
// Creates one of our tiny markers at the given point
function createMarker(point) {
var marker = new GMarker(point, icon);
map.addOverlay(marker);
GEvent.addListener(marker, "click", function() {
marker.openInfoWindowHtml("</center><font color='#000000'>Nation Name: <a href=\"nation_drill_display.asp?Nation_ID=<?   echo ($rsGuestbook["Nation_ID"].$Value); ?>\"><?   echo $rsGuestbook["Nation_Name"]; ?></a><BR>Capital: <?   echo $rsGuestbook["Capital_City"]; ?><BR>Ruler: <?   echo $rsGuestbook["Poster"]; ?><br>Government Type: <?   echo ($rsGuestbook["Government_Type"].$Value); ?><br> Religion: <?   echo ($rsGuestbook["Religion"].$Value); ?><br>Ethnicity: <?   echo ($rsGuestbook["Ethnic_Group"].$Value); ?><br>Team: <?   echo ($rsGuestbook["Nation_Team"].$Value); ?><br>Created: <?   echo ($rsGuestbook["Nation_Dated"].$Value); ?></font>");
}); 

var outlinecolor 
<?   if ($rsGuestbook["Nation_Team"]="Red"$then; )
  {

    $outlinecolor="#ff0000";

//Nation_Team") = "Green" then?>  } 

  $outlinecolor="#00ff00";

//Nation_Team") = "Blue" then?>} 
$outlinecolor="#6633ff";

//Nation_Team") = "Purple" then?>
outlinecolor="#660066"
<? 
