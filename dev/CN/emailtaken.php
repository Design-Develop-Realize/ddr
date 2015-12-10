<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<? // asp2php (vbscript) converted
$CODEPAGE="1252"; ?>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<body>
<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0" bordercolor="#000080">
<tr>
<td>
<table border="1" width="100%" id="table2" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td width="100%" bgcolor="#000080"><b><font color="#FFFFFF">:. 
		Registration Failed</font></b></td>
	</tr>
	<tr>
		<td width="100%" valign="top">
<p align="left"><br>
<br>
Sorry but that email address has already been registered in the game. Please
<a href="login.php">login</a> or you may attempt to <a href="register.php">
register</a> again.<p align="left">
<br>
&nbsp;</td>
	</tr>
</table>
<p align="center">
<br>
&nbsp;</td>
</tr>
</table>



<p align="center">&nbsp;</p>



<p></p>



<!--#include file="inc_footer.php" --> 
<? 
$objConn->Close();
$objConn=null;

?>
