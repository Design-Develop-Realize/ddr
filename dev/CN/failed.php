<?
  session_start();
  session_register("failedattempt_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<? // asp2php (vbscript) converted
$CODEPAGE="1252"; ?>
<? 
//*** start part for the failed.asp


if ($failedattempt_session=="")
{

  $failedattempt_session=1;
} 



$failedattempt_session=$failedattempt_session+1;

if ($failedattempt_session>10)
{

  $userIP=$_SERVER["remote_addr"];

$Application->Lock;
  $Application["BannedIPs"]=$Application["BannedIPs"].$userIP." , ";
$Application->UnLock;

  $strFileName=$DOCUMENT_ROOT."assets/SysBannedIp.txt";
// $fso is of type "Scripting.FileSystemObject"

$file=fopen($strFileName,"a");
  fputs($file,""."\n");
  fputs($file,$userIP."\n");
  fclose($file);
  $file=null;

  $fso=null;


} 

?>



<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<body>
<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0" bordercolor="#000080">
<tr>
<td>
<table border="1" width="100%" id="table2" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td width="100%" bgcolor="#000080"><b><font color="#FFFFFF">:. 
		Login Failed</font></b></td>
	</tr>
	<tr>
		<td width="100%" valign="top">
<p align="left"><br>
<br>
Sorry but you entered an invalid username or password. You may attempt to
<a href="login.php">login</a> again or if you have not done so you may <a href="register.php">
register</a> a new account. 
<? if ($failedattempt_session>3)
{
?>
<span style="background-color: #FFFF99">
<? } ?>
If you have forgotten your user name or password 
<a href="sendpassword1.php">
click here</span></a>. 
<? if ($failedattempt_session>3)
{
?>
</span> 
<? } ?>
<p align="center">
<? if ($failedattempt_session>5)
{
?>
<font color="#FF0000"><b>
<? } ?>
<i>You have <? echo 10-$failedattempt_session; ?> failed login attempts left before you will be banned from using
this site.</i></b></font><p align="left">
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
