<!--#include file="nocache.php" -->

<? 
$ExecuteCodeBlock=false;
if ($ExecuteCodeBlock)
{

  $strFileName=$DOCUMENT_ROOT."assets/sitedown.txt";
//Const ForReading = 1, ForWriting = 2, ForAppending = 8

// $fso is of type "Scripting.FileSystemObject"

$file=fopen($strFileName,"a");
  fputs($file,strftime("%m/%d/%Y %H:%M:%S %p")()."\n");
  fclose($file);
  $file=null;

  $fso=null;

} 

?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Cyber Nations</title>
<style>
<!--
div.Section1
	{page:Section1;}
-->
</style>
</head>

<body>
<script language=JavaScript>
<!--

//Disable right click script III- By Renigade (renigade@mediaone.net)
//For full source code, visit http://www.dynamicdrive.com

var message="";
///////////////////////////////////
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")
// --> 
</script>
<p align="center">
<a title="Cyber Nations, an online nation simulation game" href="default.php" name="pagetop">
<img border="0" src="images/cybernationslogo.jpg" alt="Cyber Nations, an online nation simulation game"></a></p>


<div align="center">
	<table border="0" width="90%" id="table1">
		<tr>
			<td>Cyber Nations has been taken down for routine maintenance on <? echo time()(); ?>. The site will be back online as soon as possible.

</td>
		</tr>
	</table>
</div>


<p>

&nbsp;<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p align="center">
<br>
<a target="_blank" href="http://www.cybernations.net/forums">Visit the Cyber Nations Forums</a>
</p>
</body>

</html>
