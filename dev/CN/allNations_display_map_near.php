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

$rsSent2SQL="SELECT Nation_ID,Nation_Name,Nation_Lat,Nation_Lon,Nation_Dated,Land_Purchased,Nuclear_Purchased,Technology_Purchased,Infrastructure_Purchased,Military_Purchased,Military_Attacking_Casualties,Military_Defending_Casualties,Military_Deployed,DEFCON,Nation_Team,Capital_City,Poster,Government_Type,Religion,Ethnic_Group,Strength FROM Nation ORDER By Strength DESC ";
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
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAQpiA_mSUPTtx989SOA_cqxQUbKRsxEr5HWq648QG6J5HPXuJ8hQeBxX39VAlA_htuj56kKr6UVzGFw" type="text/javascript"></script>


<script type="text/javascript">
//<![CDATA[

var icon = new GIcon();
icon.shadow = "assets/mm_20_shadow.png";
icon.iconSize = new GSize(12, 20);
icon.shadowSize = new GSize(33, 20);
icon.iconAnchor = new GPoint(9, 20);
icon.infoWindowAnchor = new GPoint(9, 2);
icon.infoShadowAnchor = new GPoint(18, 25);


//var deflon = <?   echo $rsGuestbook["Nation_Lon"]; ?>;
//var deflat = <?   echo $rsGuestbook["Nation_Lat"]; ?>;
//var defzoom = 5;
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

function drawCircle(lng,lat,Cradius,outlinecolor) { 
   var d2r = Math.PI/180;   // degrees to radians 
   var r2d = 180/Math.PI;   // radians to degrees 
   var Clat = (Cradius/3963)*r2d;
   var Clng = Clat/Math.cos(lat*d2r); 
   var Cpoints = []; 
	   for (var i=0; i < 33; i++) { 
	      var theta = Math.PI * (i/16); 
	      Cx = lng + (Clng * Math.cos(theta)); 
	      Cy = lat + (Clat * Math.sin(theta)); 
	      Cpoints.push(new GPoint(Cx,Cy)); 
	   }; 


	var Cwidth = 6;
		Cpoints.push(Cpoints[0]);	// close the circle
		oldPoly = new GPolyline(Cpoints,outlinecolor,Cwidth)
		map.addOverlay(oldPoly);	
}


function initMap() {
	map = new GMap2(mapDiv);					// create "map" object
	map.addControl(new GScaleControl());		// add scale control
	map.addControl(new GSmallMapControl());		// add small map controls
	map.addControl(new GMapTypeControl(true));	// add map type control
	map.setCenter(new GLatLng(<?   echo $rsGuestbook["Nation_Lat"]; ?>, <?   echo $rsGuestbook["Nation_Lon"]; ?>), 5);
	map.addControl(new GOverviewMapControl(new GSize(150, 100)));
	var omap = document.getElementById("map_overview");
	var place = document.getElementById("map");
	place.appendChild(omap);
	omap.style.right = "0px";
	omap.style.bottom = "8px";	

<? 
  $nation_recordcounter=0;
  $myrank=0;
  while((!($rsSent2==0)))
  {

    $nation_recordcounter=$nation_recordcounter+1;

    if (strtoupper($rsSent2["Nation_Name"])==strtoupper($rsGuestbook0["Nation_Name"]))
    {

      $myrank=$nation_recordcounter;
    } 


    if ($myrank!=0)
    {

      mysql_data_seek($rsSent2_query,mysql_num_rows($rsSent2_query)-1);

$rsSent2=mysql_fetch_array($rsSent2_query);
      $rsSent2_BOF=0;

    }
      else
    {

      $rsSent2=mysql_fetch_array($rsSent2_query);
      $rsSent2_BOF=0;

    } 

  } 
?>
<!--#include file="trade_connections.asp" -->
<!--#include file="calculations.asp" -->

<? 
  $nation_recordcounter=0;
  


  while((!($rsSent2==0)))
  {

    if (is_numeric($rsSent2["Nation_Lat"]) && is_numeric($rsSent2["Nation_Lon"]))
    {

    }
      else
    {

      $rsSent2=mysql_fetch_array($rsSent2_query);
      $rsSent2_BOF=0;

    } 


    $nation_recordcounter=$nation_recordcounter+1;

    if (($nation_recordcounter>=$myrank-75 && $nation_recordcounter<=$myrank+50))
    {

      if (distance($rsSent2["Nation_Lat"],$rsSent2["Nation_Lon"],$rsGuestbook["Nation_Lat"],$rsGuestbook["Nation_Lon"],"M")<500)
      {

        $nationdistance=distance($rsSent2["Nation_Lat"],$rsSent2["Nation_Lon"],$rsGuestbook["Nation_Lat"],$rsGuestbook["Nation_Lon"],"M");

?>
<? 
        $theirnationage=time()()-$rsSent2["Nation_Dated"]+1;


        if (strtoupper($rsGuestbook["Nation_Name"])==strtoupper($rsSent2["Nation_Name"]))
        {

          $theirnationsize=$nationsize;
        }
          else
        {

          $theirnationsize=(round(($theirnationage/2),3))+$rsSent2["Land_Purchased"]-3;
        } 



        $theirnationstrength=$rsSent2["Strength"];
        $theiractualmilitary=$rsSent2["Military_Purchased"]-$rsSent2["Military_Defending_Casualties"]-$rsSent2["Military_Attacking_Casualties"];
        $theiractualdeployed=$rsSent2["Military_Deployed"];


        $threats=0;
        if (!isset($rsSent2["DEFCON"]))
        {

          $threats=3;
        }
          else
        {

          $threats=$rsSent2["DEFCON"];
        } 

        if ($rsSent2["Nation_Team"]=$rsGuestbook["Nation_Team"]$then$threats=$threats+4;
      }
;
$if$theirnationstrength<$nationstrength)
        {
          $threat=$threats+1;
        }
;
        } 
        if ($theiractualdeployed<($theiractualmilitary/3))
        {
          $threats=$threats+1;
        }
;
        } ?>

<?         if (($theirnationsize/2)+($nationsize/2)>$nationdistance && strtoupper($rsSent2["Nation_Name"])!=strtoupper($rsGuestbook["Nation_Name"]))
        {

          $encroachment=1;
        }
          else
        {

          $encroachment=0;
        } 

?>

<?         if ($threats<1)
        {
          $threattext="<img border='0' src='assets/5stars.gif' title='This nation is a severe threat to your nation.'>";
        }
;         } ?>
<?         if ($threats>=1 && $threats<2)
        {
          $threattext="<img border='0' src='assets/4_5stars.gif' title='This nation is a high priority threat to your nation.'>";
        }
;         } ?>
<?         if ($threats>=2 && $threats<3)
        {
          $threattext="<img border='0' src='assets/4stars.gif' title='This nation is a priority threat to your nation.'>";
        }
;         } ?>
<?         if ($threats>=3 && $threats<4)
        {
          $threattext="<img border='0' src='assets/3_5stars.gif' title='This nation is an elevated threat to your nation.'>";
        }
;         } ?>
<?         if ($threats>=4 && $threats<5)
        {
          $threattext="<img border='0' src='assets/3stars.gif' title='This nation is an increased threat to your nation.'>";
        }
;         } ?>
<?         if ($threats>=5 && $threats<6)
        {
          $threattext="<img border='0' src='assets/2_5stars.gif' title='This nation is a moderate threat to your nation.'>";
        }
;         } ?>
<?         if ($threats>=6 && $threats<7)
        {
          $threattext="<img border='0' src='assets/2stars.gif' title='You should consider this nation as a mild threat to your nation.'>";
        }
;         } ?>
<?         if ($threats>=7 && $threats<8)
        {
          $threattext="<img border='0' src='assets/1_5stars.gif' title='You should consider this nation as a low level threat to your nation.'>";
        }
;         } ?>
<?         if ($threats>=8)
        {
          $threattext="<img border='0' src='assets/1stars.gif' title='Currently, this nation should probably not be considered a threat to your nation.'>";
        }
;         } ?>
<?         if ($rsSent2["Nation_Name"]=$rsGuestbook["Nation_Name"]$then$threattext=0;
      }
; )
        {



//Nation_Team") = "None" then?>        } 

$icon->image="assets/mm_20_grey.png"$;;
$icon->image="assets/mm_20_<% = rsSent2("$Nation_Team"); ?>.png";
<?       } ?>
var point = new GPoint(<?       echo $rsSent2["Nation_Lon"]; ?>,<?       echo $rsSent2["Nation_Lat"]; ?>);
var marker = createMarker(point,"</center><font color='#000000'>Nation Name: <a href=\"nation_drill_display.asp?Nation_ID=<?       echo ($rsSent2["Nation_ID"].$Value); ?>\"><?       echo $rsSent2["Nation_Name"]; ?></a><BR>Capital: <?       echo $rsSent2["Capital_City"]; ?><BR>Ruler: <?       echo $rsSent2["Poster"]; ?><br>Government Type: <?       echo ($rsSent2["Government_Type"].$Value); ?><br> Religion: <?       echo ($rsSent2["Religion"].$Value); ?><br>Ethnicity: <?       echo ($rsSent2["Ethnic_Group"].$Value); ?><br>Team: <?       echo ($rsSent2["Nation_Team"].$Value); ?><br>Created: <?       echo ($rsSent2["Nation_Dated"].$Value); ?><br>Distance: <?       echo $FormatNumber[$nationdistance][2]; ?> Miles<br>Rank: <?       echo $nation_recordcounter; ?><?       if (!isset($rsSent2["DEFCON"].$Value))
      {
?><?       }
        else
      {
?><br>DEFCON: <?         echo ($rsSent2["DEFCON"].$Value); ?><?       } ?><?       if ($threattext!=0)
      {
?><br>Threat Advisory: <?         echo $threattext; ?><?       } ?><br> <?       if ($encroachment==1)
      {
?><font color='red'><b>Land Encroachment!</b></font><?       } ?></font>");
map.addOverlay(marker);




var outlinecolor 
<?       if ($rsSent2["Nation_Team"]="Red"$then; )
      {

        $outlinecolor="#ff0000";

//Nation_Team") = "Green" then?>      } 

      $outlinecolor="#008000";

//Nation_Team") = "Blue" then?>    } 

    $outlinecolor="#0000ff";

//Nation_Team") = "Purple" then?>  } 
  $outlinecolor="#660066";

//Nation_Team") = "Orange" then?>} 

$outlinecolor="#CA7900";

//Nation_Team") = "Brown" then?>
outlinecolor="#663300"
<? 
