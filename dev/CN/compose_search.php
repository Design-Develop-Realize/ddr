<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
?>
<!--#include file="Connection.php" -->
<script language='javascript'>
<!--
function InsertRulerName(name)
{
 // initialize locals
 var i = 0;
 var j = 0;
 var text = opener.document.FrontPage_Form1.carboncopy.value;
 var length = opener.document.FrontPage_Form1.carboncopy.value.length;

 // find leading and trailing whitespace
 for(i = 0; i < length; ++i)
 {
  var c = text.charAt(i);
  if(c != ' ' && c != '\n') { break; }
 }
 for(j = length - 1; j >= 0; --j)
 {
  var c = text.charAt(j);
  if(c != ' ' && c != '\n') { break; }
 }

 // trim away whitespace as needed
 if(i == length)
 {
  text = '';
  length = 0;
 }
 else if(i > 0 || j < (length - 1))
 {
  text = text.substring(i, j);
  length = text.length;
 }

 // add the name
 if(length == 0)
 {
  text = name;
 }
 else
 {
  text += '\n' + name;
 }

 // update the form
 opener.document.FrontPage_Form1.carboncopy.value = text;
}
//-->
</script>
<link href="css.css" rel="stylesheet" type="text/css">
<title>Cyber Nations User Search</title>
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


<body bgcolor="#F4F4F4">


<form method="POST" action="compose_search.php?go=1">
<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0">
	<tr>
		<td>
<p align="center">Enter all or part of the nation or ruler name.</p>
<p align="center"><input type="text" name="search" size="20"></p>
<p align="center">
<input type="submit" class=Buttons value="Search For Users" name="submit"> <input type="button" class=Buttons value="Close Window" onclick="window.close()">
</p>

</td>
	</tr>
</table>
</form>

<? if ($_GET["go"]!="")
{
?>
<!--#include file="compose_search_search.php" -->
<? } ?>
