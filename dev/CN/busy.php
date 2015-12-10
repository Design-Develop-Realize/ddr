<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->

<head>
<meta http-equiv="Content-Language" content="en-us">
</head>

<body>
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
<tr>
<td>

<p>&nbsp;</p>
<p>Cyber Nations is currently too busy to process your login attempt. Please try 
again later. This is not an error.</p>
<p></font></td>
</tr>
</table>
</body>

</html>

<!--#include file="inc_footer.php" --> 

<? 
$objConn->Close();
$objConn=null;

?>
