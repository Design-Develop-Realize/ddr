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
<title>booking_sm</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css" />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=3.0.1'></script>
<script type='text/javascript' src='js/infinite-rotator.js'></script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (booking_sm.psd) -->
<table id="Table_01" width="1009" height="2036" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="9">
			<img src="images/bgfill.jpg" width="17" height="2035" alt=""></td>
		<td colspan="11">
			<img src="images/page_bg.gif" width="973" height="119" alt=""></td>
		<td rowspan="8">
			<img src="images/index_03.gif" width="19" height="1853" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="http://www.designdeveloprealize.com/gravity/"><img src="images/index_04.gif" width="121" height="46" alt=""></a></td>
		<td>
			<a href="http://www.designdeveloprealize.com/gravity/studio/"><img src="images/index_05.gif" width="97" height="46" alt=""></a></td>
		<td>
			<a href="http://www.designdeveloprealize.com/gravity/merch/"><img src="images/index_06.gif" width="155" height="46" alt=""></a></td>
		<td>
			<a href="http://www.designdeveloprealize.com/gravity/contact/"><img src="images/index_07.gif" width="111" height="46" alt=""></a></td>
		<td>
			<img src="images/index_08.gif" width="314" height="46" alt=""></td>
		<td>
			<a href="http://www.facebook.com/wearegravity" target="_blank"><img src="images/index_09.gif" width="59" height="46" alt=""></a></td>
		<td>
			<a href="http://twitter.com/we_are_gravity" target="_blank"><img src="images/index_10.gif" width="59" height="46" alt=""></a></td>
		<td colspan="3">
			<a href="http://www.youtube.com/user/jonathanwroach" target="_blank"><img src="images/index_11.gif" width="57" height="46" alt=""></a></td>
	</tr>
	<tr>
		<td colspan="9">
			<img src="images/menu_img.gif" width="960" height="22" alt=""></td>
		<td colspan="2">
			<img src="images/index_13.gif" width="13" height="22" alt=""></td>
	</tr>
	<tr>
		<td colspan="11">
			<div id="rotating-item-wrapper">
			<img src="images/merchimg.png" alt="a person entering a building" class="rotating-item" />
    <img src="images/studioimg.png" alt="photo of building across from our office" class="rotating-item" />
      <img src="images/tshirtimg.png" alt="building entrance with neon backlit walls" class="rotating-item" />
		</div></td>
	</tr>
	<tr>
		<td colspan="11">
			<img src="images/simple_img_bg.png" width="973" height="77" alt=""></td>
	</tr>
	<tr>
		<td colspan="11">
			<img src="images/index_16.gif" width="973" height="1" alt=""></td>
	</tr>
		<tr>
		<td>
			<img src="images/index_17.gif" width="2" height="78" alt=""></td>
		<td colspan="9">
			<img src="images/index_18.gif" width="970" height="78" alt=""></td>
		<td>
			<img src="images/index_19.gif" width="1" height="78" alt=""></td>
	</tr>
<tr>
		<td colspan="11">
			<form class="frm" action="send.php" name="DDRWebMail" method="POST" height="1160">
<p>First Name:<input type="text" placeholder="firstname" name="firstname" /></p>
<p>Last Name:<input type="text" placeholder="lastname" name="lastname" /></p>
<p>Email:<input type="email" placeholder="youremail@domain.com" name="address"/></p>
<p>Phone:<input type="text" placeholder="xxx-xxx-xxxx" name="phone" /></p>
<p>Home Town:<input type="text" placeholder="where are you from" name="hometown" /></p>
<p>Company/Band Name:<input type="text" placeholder="" name="company" /></p>
<p>Website:<input type="text" placeholder="http://www.example.com" name="site" /></p>
<p>What Genre is your music?<input type="text" placeholder="?" name="genre" /></p>
<p>Package:<select>
<option>Single</option>
<option>EP</option>
<option>Full-Length</option></select></p>
<p>Select the Services you are interested in:</p>
<p>
<input type='checkbox'/>Recording/Engineering</p>
<p>
<input type='checkbox'/>Mixing</p>
<p>
<p><input type='checkbox'/>Complete Music Production/Preproduction</p>
<p><input type='checkbox'/>Mastering
</p>
<p>Comments:<br/><textarea placeholder="Write the details of your enquiry here for review" name="message"></textarea></p>
<p>7x2 = <input type="text" placeholder="?" name="digits" /></p>
<p><input type="submit" value="Send" name="submit" style="width:50px;"/></p>
</form></td>
	</tr>
	<tr>
		<td colspan="12">
			<img src="images/img_1.jpg" width="992" height="182" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="17" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="119" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="97" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="155" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="111" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="314" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="59" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="59" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="44" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="12" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="19" height="1" alt=""></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</body>
</html>
<?
}
?>