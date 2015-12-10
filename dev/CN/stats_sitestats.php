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
  
<p align="center"><b>Cyber Nations Page Hits</b></p>
<p align="center"><i>These images are periodically manually updated.</i></p>
<p align="center">
<img border="0" src="images/apr06.JPG"><br>
April 2006</p>
<p align="center"><br>
<img border="0" src="images/mar06.JPG"><br>
March 2006</p>
<p align="center"><br>
<img border="0" src="images/feb06.JPG"><br>
February 2006</p>
<p align="center"><br>
&nbsp;</p>
<!--#include file="inc_footer.php" -->
<? 
$objConn->Close();
$objConn=null;

?>
