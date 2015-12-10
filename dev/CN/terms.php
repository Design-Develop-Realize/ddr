<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<!--#include file="connection.php" -->


<!--#include file="inc_header.php" -->

<body>
<table border="1" width="100%" id="table2" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td width="50%" bgcolor="#000080"><b><font color="#FFFFFF">&nbsp;:. Cyber 
		Nations Terms and Conditions
		</font></b></td>
	</tr>
	<tr>
		<td width="50%" valign="top">
<table border="0" width="100%" id="table3" cellspacing="0" cellpadding="0">
	<tr>
		<td>The following are the terms and conditions that all players must accept 
before playing Cyber Nations. These terms are subject to change at any time so 
please check this page often. To review the Cyber Nations Forum guidelines click
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?act=boardrules">
here</a>.</font></td>
	</tr>
	<tr>
		<td>

<p align="center">
<br>
<!--#include file="terms_include.php" -->

</p>
<p></td>
	</tr>
</table>
		</td>
	</tr>
	</table>
</body>

</html>

<!--#include file="inc_footer.php" --> 

<? 
$objConn->Close();
$objConn=null;

?>
