<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
$body = "You have just recieved an email from a site user, their details are below\n";
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

	$subject = "Contact Us Query";
	$body .= " {$name} of {$company} has asked the following {$subject} question:\n {$message}\n You can reply to them at this address: {$address} or ring them at {$phone}";

	mail('info@wearegravity.com', $subject, $body, "FROM: {$address}");
} else {
echo("fail");
}
?>
<!doctype html>
<head>
<title>Contact Us</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div id="logo"><div class="logo"></div></div>
<div id="menu">
<div class="menu">
<ul>
<li><a href="index.html" alt="go to the first page">Home</a></li>
<li><a href="services.html" alt="read about our services">Services</a></li>
<!--<li><a href="javascript://" alt="see what we have made">Portfolio</a></li> Add later -->
<li><a href="about.html" alt="learn about our team">About</a></li>
<li class="here"><a href="contact.html" alt="contact us for more information">Contact</a></li>
</div>
</div>
<div id="firstp">
<div class="firstp">
<h2>Let's talk to each other</h2>
<p>If you like what you've seen here and believe our services are for you, write us a message using the contact form below. Our team will review your message and respond to any questions you have. We look forward to hearing from you!</p>
</div>
</div>
<div id="main">
<div class="main">
<h3>The Reason You Want To Fill In The Form</h3>
<p>You care about your users, like we care about your clients. By taking 5 minutes to fill out this form, our team will be able to help you to give your users the best experience when they visit your website. The details you place into this form will only be used by us to identify you and your needs and they will never be passed onto anyone else (unless you really want us to) and will only be used for relevant communications.</p>
<h2 style="color:green;">Thank you for your submission!</h2>
<p>Our team will get back to you as quickly as possible.</p>
<form class="frm" action="send.php" name="DDRWebMail" method="POST">
<p>First Name<br/><input type="text" placeholder="firstname" name="firstname" /></p>
<p>Last Name<br/><input type="text" placeholder="lastname" name="lastname" /></p>
<p>Email Address<input type="email" placeholder="youremail@domain.com" name="address"/></p>
<p>Phone Number<input type="text" placeholder="xxx-xxx-xxxx" name="phone" /></p>
<p>Comments<br/><textarea placeholder="Write the details of your enquiry here for review" name="message"></textarea></p>
<p>7x2 =</p><br /><input type="text" placeholder="?" name="digits" /></p>
<p style="text-align:right;"><input type="submit" value="Send" name="submit" style="width:50px;"/></p>
</form>
</div>
</div>
</div>
</body>
</html>