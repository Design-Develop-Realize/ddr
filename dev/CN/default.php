<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
// Set slideShowSpeed (milliseconds)
var slideShowSpeed = 4000;
// Duration of crossfade (seconds)
var crossFadeDuration = 5;
// Specify the image files
var Pic = new Array();
// to add more images, just continue
// the pattern, adding to the array below

Pic[0] = 'images/cybernations1.jpg'
Pic[1] = 'images/cybernations3.jpg'
Pic[2] = 'images/cybernations4.jpg'

// do not edit anything below this line
var t;
var j = 0;
var p = Pic.length;
var preLoad = new Array();
for (i = 0; i < p; i++) {
preLoad[i] = new Image();
preLoad[i].src = Pic[i];
}
function runSlideShow() {
if (document.all) {
document.images.SlideShow.style.filter="blendTrans(duration=2)";
document.images.SlideShow.style.filter="blendTrans(duration=crossFadeDuration)";
document.images.SlideShow.filters.blendTrans.Apply();
}
document.images.SlideShow.src = preLoad[j].src;
if (document.all) {
document.images.SlideShow.filters.blendTrans.Play();
}
j = j + 1;
if (j > (p - 1)) j = 0;
t = setTimeout('runSlideShow()', slideShowSpeed);
}
//  End -->
</script>
<body onload="runSlideShow()">
<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0" bordercolor="#000080">
<tr>
<td>
<table border="1" width="100%" id="table2" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td width="50%" bgcolor="#000080"><b><font color="#FFFFFF">&nbsp;:. 
		
		<? 
// Count the number of nations in the system

// $rsAllUsers is of type "ADODB.Recordset"

//echo $MM_conn_STRING;
//echo "SELECT COUNT(Nation_ID) AS Nations FROM Nation";
//echo 0;
//echo 2;
//echo 3;
//$rs=mysql_query();
?>
Simulating <? echo('1');//echo $FormatNumber[$rsAllUsers["Nations"]][0]; ?> Active Nations
		
		
		</font></b></td>
	</tr>
	<tr>
		<td width="50%" valign="top">
<p align="justify">
Welcome to Cyber Nations, a free nation simulation game. Create 
a nation 
anywhere in the world and decide how you will rule your people by choosing 
a government type, a national religion, ethnicity, tax rate, currency 
type, and more in this new geo-political, nation, and government simulator. 
There are no fees associated with Cyber Nations, no credits or upgrades to buy, no gimmicks, just a fun 
place to hang out and rule your nation. <a href="register.php">Register</a> 
or <a href="login.php">Login</a> and get started building your nation today. For 
more information about Cyber Nations check out the
<a target="_blank" href="http://www.cybernations.net/forums/">Cyber Nations
Forums</a> or visit the <a href="about.php">About Cyber Nations</a> page for 
a detailed description of the game.</td>
	</tr>
	<tr>
		<td width="100%" valign="top">
<p align="center"><br>
<img src="images/cybernations1.jpg" name='SlideShow'><br>
&nbsp;</td>
	</tr>
</table>
</td>
</tr>
</table>

<? if (!$rsUser->EOF && !$rsUser->BOF)
{
?> 
<p align="center">&nbsp;</p>
<p></p>
<!--#include file="search_include.php" -->
<? } ?>

<!--#include file="inc_footer.php" --> 
<? 
//$objConn->Close();
$objConn=null;

?>
