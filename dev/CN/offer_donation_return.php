<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<? 
//strFileName = server.mappath("assets/donation_test.txt")

//set fso = server.CreateObject("Scripting.FileSystemObject")

//set file = fso.OpenTextFile(strFileName,8,true)

//file.write(Session("MM_Username"))

//file.write(", ")

//file.write(NOW)

//file.write(", ")

//strURL = LCASE(Request.ServerVariables("HTTP_REFERER"))

//file.write(strURL)

//file.writeline()

//file.close

//set file = nothing

//set fso = nothing

?>
  
<p align="center">
<b>&nbsp;Thank You For Your Cyber Nations Donation</b></p>
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="20" bordercolor="#800000">
	<tr>
		<td>




Thank you for your Cyber Nations Donation. Your donation has been sent and 
within 24 hours a moderator will review the transaction and provide your nation 
with the donation bonus specified in the <a href="offer_donation.php">donation 
offer page</a>. A receipt for your Cyber Nations donation has been emailed to 
you. You may log into your account at <a href="https://www.paypal.com/us/">
www.paypal.com/us</a> to view details of this transaction. If you feel you made 
a mistake such as forgetting to provide your nation and ruler name as a message 
as part of this transaction please
<a href="mailto:webmaster@cybernations.net?subject=Donation Offer - Account Details">
contact us</a> with your account details. Limit one nation donation bonus per calendar month. Nations may receive the store 
purchase bonus and donation bonus within the same calendar month.</p>


<!--#include file="offer_donation_include.php" -->
</table>
		</td>
	</tr>
</table>
<!--#include file="inc_footer.php" -->
<? 
$objConn->Close();
$objConn=null;

?>
