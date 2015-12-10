<?
  session_start();
  session_register("failedattempt_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<? 
//*** start part for the failed.asp


if ($failedattempt_session=="")
{

  $failedattempt_session=1;
} 



$failedattempt_session=$failedattempt_session+1;

//If Session("failedattempt") > 20 Then

//dim userIP

//userIP = Request.ServerVariables("remote_addr")


//  Application.Lock

//   Application("BannedIPs") = Application("BannedIPs") & userIP & " , "

//  Application.UnLock


//strFileName = server.mappath("assets/SysBannedIp.txt")

//set fso = server.CreateObject("Scripting.FileSystemObject")

//set file = fso.OpenTextFile(strFileName,8,true)

//file.writeline("")

//file.writeline(userIP)

//file.close

//set file = nothing

//set fso = nothing


//End If

?>
<!--#include file="connection.php" -->
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

</head>

<body>
<!--#include file="inc_header.php" -->
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
<tr>
<td>
<p align="center"><br>
<img border="0" src="images/warning2.gif" width="33" height="33"></p>
<p><font color="#FF0000">
<? if ($denyreason_session=="")
{
?>
The action that you just tried to perform has been 
denied. This could be the result of trying to submit a form twice, 
using your back button to resubmit form information, or attempting to illegally 
upload information to the server. This feature exists primarily to 
stop hackers and the use of the back button in the game. If you are not 
performing any of these activities but are still getting this error page try to go 
back, refresh your page and/or clear your Internet cache. </font><br></p><p>
<? } ?>
<? if ($denyreason_session!="")
{
?>
<font color="#FF0000">You have received an error trying to view a page. Here is the detailed error code: <?   echo $denyreason_session; ?></font><p>
<? 
  $denyreason_session="";
} ?>
</p>

<!--
<p align="center"><i>You have <? echo 10-$failedattempt_session; ?> failed attempts left before you will be banned from using
this site.</i><p align="left">
-->

</td>
</tr>
</table>
</body>

</html>
<!--#include file="inc_footer.php" --> 

