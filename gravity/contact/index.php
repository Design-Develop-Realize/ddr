<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
$body = "You have just recieved an email from a site user wanting to book, their details are below\n";
$subject = '';
$name = '';
$company = '';
$message = '';
$address = '';

if(array_key_exists('submit', $_POST))
{
	if(!$_POST['digits'] == '14')
	{
		die("FAIL AT MATHZ");
	}
    foreach($_POST as $key => $value)
	{
	    //${$key} = mysql_real_escape_string($value);
		${$key} = $value; //unprotected i know
	}

	$subject = "Studio Booking Request";
	$body .= " {$firstname} {$lastname} of {$company} has a {$subject}:\n {$message}\n You can reply to them at this address: {$address} or ring them at {$phone}";

	mail('info@wearegravity.com', $subject, $body, "FROM: {$address}");
} else {


?>
<html>
<head>
<title>Contact_sm</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=3.0.1'></script>
<script type='text/javascript' src='js/infinite-rotator.js'></script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (Contact_sm.psd) -->
<table id="Table_01" width="1008" height="1646" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="6">
			<img src="images/index_01.gif" width="352" height="118" alt=""></td>
		<td colspan="3">
			<img src="images/index_02.gif" width="307" height="118" alt=""></td>
		<td colspan="6">
			<img src="images/index_03.gif" width="349" height="118" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/index_04.gif" width="18" height="61" alt=""></td>
		<td colspan="2">
			<a href="../"><img src="images/index_05.gif" width="118" height="61" alt=""></a></td>
		<td>
			<a href="../studio/"><img src="images/index_06.gif" width="108" height="61" alt=""></a></td>
		<td colspan="2">
			<a href="../merch/"><img src="images/index_07.gif" width="136" height="61" alt=""></a></td>
		<td>
			<a href="index.html"><img src="images/index_08.gif" width="110" height="61" alt=""></a></td>
		<td colspan="2">
			<img src="images/index_09.gif" width="336" height="61" alt=""></td>
		<td>
			<a href="http://www.facebook.com/wearegravity" target="_blank"><img src="images/index_10.gif" width="57" height="61" alt=""></a></td>
		<td>
			<a href="http://twitter.com/we_are_gravity" target="_blank"><img src="images/index_11.gif" width="58" height="61" alt=""></a></td>
		<td colspan="2">
			<a href="http://www.youtube.com/user/jonathanwroach" target="_blank"><img src="images/index_12.gif" width="55" height="61" alt=""></a></td>
		<td>
			<img src="images/index_13.gif" width="12" height="61" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/index_14.gif" width="26" height="443" alt=""></td>
		<td colspan="10">
			<div id="rotating-item-wrapper">
			<img src="images/merchimg.png" alt="a person entering a building" class="rotating-item" width="969" height="443" />
    <img src="images/studioimg.png" alt="photo of building across from our office" class="rotating-item" width="969" height="443" />
      <img src="images/tshirtimg.png" alt="building entrance with neon backlit walls" class="rotating-item" width="969" height="443" />
		</div></td>
		<td colspan="2">
			<img src="images/index_16.gif" width="13" height="443" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="images/index_17.gif" width="17" height="857" alt=""></td>
		<td colspan="10">
			<img src="images/index_18.gif" width="866" height="242" alt=""></td>
		<td colspan="4" rowspan="2">
			<img src="images/index_19.gif" width="125" height="857" alt=""></td>
	</tr>
	<tr>
		<td colspan="10">
			<form class="frm" action="send.php" name="DDRWebMail" method="POST">
<p>First Name <input type="text" placeholder="firstname" name="firstname" /></p>
<p>Last Name <input type="text" placeholder="lastname" name="lastname" /></p>
<p>Email Address <input type="email" placeholder="youremail@domain.com" name="address"/></p>
<p>Phone Number <input type="text" placeholder="xxx-xxx-xxxx" name="phone" /></p>
<p>Comments<br/><textarea placeholder="Write the details of your enquiry here for review" name="message"></textarea></p>
<p>7x2 =<input type="text" placeholder="?" name="digits" /></p>
<p><input type="submit" value="Send" name="submit" style="width:50px;"/></p>
</form></td>
	</tr>
	<tr>
		<td colspan="15">
			<img src="images/index_21.gif" width="1008" height="166" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="17" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="8" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="110" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="108" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="108" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="28" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="110" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="169" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="167" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="57" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="58" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="54" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="12" height="1" alt=""></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</body>
</html>
<?
}
?>