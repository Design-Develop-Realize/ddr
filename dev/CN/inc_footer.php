
<body>

<div align="left">
</table>
</div>
<p>
<? 
if (!((strpos($_SERVER["Path_Info"],"register.asp") ? strpos($_SERVER["Path_Info"],"register.asp")+1 : 0)>0) && 
   !((strpos($_SERVER["Path_Info"],"default.asp") ? strpos($_SERVER["Path_Info"],"default.asp")+1 : 0)>0) && 
   !((strpos($_SERVER["Path_Info"],"login.asp") ? strpos($_SERVER["Path_Info"],"login.asp")+1 : 0)>0) && 
   !((strpos($_SERVER["Path_Info"],"register.asp") ? strpos($_SERVER["Path_Info"],"register.asp")+1 : 0)>0) && 
   !((strpos($_SERVER["Path_Info"],"newNation.asp") ? strpos($_SERVER["Path_Info"],"newNation.asp")+1 : 0)>0) && 
   !((strpos($_SERVER["Path_Info"],"about.asp") ? strpos($_SERVER["Path_Info"],"about.asp")+1 : 0)>0) && 
   !((strpos($_SERVER["Path_Info"],"offer_donation.asp") ? strpos($_SERVER["Path_Info"],"offer_donation.asp")+1 : 0)>0) && 
   !((strpos($_SERVER["Path_Info"],"offer_link.asp") ? strpos($_SERVER["Path_Info"],"offer_link.asp")+1 : 0)>0) && 
   !((strpos($_SERVER["Path_Info"],"validate.asp") ? strpos($_SERVER["Path_Info"],"validate.asp")+1 : 0)>0))
{

  $HeaderOK=true;
}
  else
{

  $HeaderOK=false;
} 


if ($rsUser["Site_Ads"]=="0")
{
  $HeaderOK=false;
}
;
} 

if ($HeaderOK==true)
{

?>
<center>
<script type="text/javascript"><!--
google_ad_client = "pub-9338475562447655";
google_ad_width = 728;
google_ad_height = 90;
google_ad_format = "728x90_as";
google_ad_type = "text_image";
google_ad_channel = "";
google_color_border = "FFFFFF";
google_color_bg = "FFFFFF";
google_color_link = "0033FF";
google_color_text = "000000";
google_color_url = "0033FF";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</center>
<? } ?>
<div align="center">
	<br>
	<table border="1" width="760" id="table2" cellspacing="0" cellpadding="0" bordercolor="#000080">
		<tr>
			<td>
			<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="3" bordercolor="#000080">
				<tr>
					<td bgcolor="#F7F7F7" align="left" width="100%">
					<table border="0" width="100%" id="table3" cellspacing="0" cellpadding="0">
						<tr>
							<td width="518">
							<img border="0" src="assets/up.gif" width="12" height="7">
							<a href="#pagetop">Page Top</a></td>
							<td>
							<table border="0" width="100%" id="table4" cellspacing="0" cellpadding="3">
								<tr>
									<td align="right">
									<a href="offer_donation.php">
									<img border="0" src="images/offer_donation_button.gif" width="112" height="26"></a></td>
								</tr>
							</table></td>
						</tr>
					</table></td>
				</tr>
			</table></td>
		</tr>
	</table>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="760" bordercolor="#669966">
		<tr>
			<td align="center" valign="top">
			<p align="left">


<? echo $FormatNumber[$Application["ActiveUsers"]][0]; ?>
current visitors.
<br><br>Copyright © 2006 - 2007 Cyber Nations. All Rights Reserved<font color="#808080">.</font>
			</p></td>
			<td width="349" align="center" valign="top">
			<p align="right"><a title="Cyber Nations Home Page" href="default.php">Home</a> 
| 
<a target="_blank" href="http://www.cybernations.net/forums">Forums</a>  
| <a href="terms.php">Terms</a> | <a href="links.php">Links</a><br><br>Beta 2.0<br>&nbsp;</td>
		</tr>
	</table>
</div></center>
</body>
</html>
<? 
$rsSent10->Close;
$rsSent10=null;

$rsSent->Close;
$rsSent=null;

$rsUser->Close;
$rsUser=null;

$rsAllUsers->Close;
$rsAllUsers=null;

$rsGuestbook0->Close;
$rsGuestbook0=null;

$rsGuestbookHead->Close;
$rsGuestbookHead=null;

$rsGuestbook->Close;
$rsGuestbook=null;

$rsMessages->Close;
$rsMessages=null;

$objConn->Close();
$objConn=null;

?>
