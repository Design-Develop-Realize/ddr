<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
?>
<!--#include file="connection.php" -->
<? //end if

// *** Restrict Access To Page: Grant or deny access to this page

$MM_authorizedUsers="";
$MM_authFailedURL="login.asp";
$MM_grantAccess=false;
if ($MM_Username_session!="")
{

  if ((false || $MM_UserAuthorization_session=="") || 
     ((strpos(1,$MM_authorizedUsers,$MM_UserAuthorization_session) ? strpos(1,$MM_authorizedUsers,$MM_UserAuthorization_session)+1 : 0)>=1))
  {

    $MM_grantAccess=true;
  } 

} 

if (!$MM_grantAccess)
{

  $MM_qsChar="?";
  if (((strpos(1,$MM_authFailedURL,"?") ? strpos(1,$MM_authFailedURL,"?")+1 : 0)>=1))
  {
    $MM_qsChar="&";
  } 
  $MM_referrer=$_SERVER["URL"];
  if ((strlen($_GET[])>0))
  {
    $MM_referrer=$MM_referrer."?".$_GET[];
  } 
  $MM_authFailedURL=$MM_authFailedURL.$MM_qsChar."accessdenied=".rawurlencode($MM_referrer);
  header("Location: ".$MM_authFailedURL);
} 

?>

<? 
$lngRecordNo2=intval($_GET["Nation_ID"]);
$lngRecordNo2=str_replace("'","''",$lngRecordNo2);
$lngRecordNo1=intval($_GET["bynation"]);
$lngRecordNo1=str_replace("'","''",$lngRecordNo1);
// $rsDetail is of type "ADODB.Recordset"

$rsDetailSQL="SELECT *  FROM Nation WHERE Nation_ID=".$lngRecordNo2;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsDetailSQL);
?>

<? 
// $rsSent2 is of type "ADODB.Recordset"

$rsSent2SQL="SELECT Count(*) As histotal FROM Aid WHERE (Receiving_Nation_ID=".$lngRecordNo2." OR Declaring_Nation_ID=".$lngRecordNo2.") AND (Aid.Aid_Declaration_Date > '".time()()-10."') AND (Aid.Aid_Cancled <> 2)";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSent2SQL);
$histotal=$rsSent2["histotal"];

$rsSent2=null;



// $rsSent2 is of type "ADODB.Recordset"

$rsSent2SQL="SELECT Count(*) As ourtotal FROM Aid WHERE ((Receiving_Nation_ID=".$lngRecordNo1." AND Declaring_Nation_ID=".$lngRecordNo2.") OR (Declaring_Nation_ID=".$lngRecordNo1." AND Receiving_Nation_ID=".$lngRecordNo2.")) AND (Aid.Aid_Declaration_Date > '".time()()-10."') AND (Aid.Aid_Cancled <> 2)";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSent2SQL);
$counters=$rsSent2["ourtotal"];

$rsSent2=null;

?>

<? 
// $rsSent3 is of type "ADODB.Recordset"

$rsSent3SQL="SELECT Count(*) As mytotal FROM Aid WHERE (Receiving_Nation_ID=".$lngRecordNo1."OR Declaring_Nation_ID=".$lngRecordNo1.") AND (Aid.Aid_Cancled <> 2) AND (Aid.Aid_Declaration_Date > '".time()()-10."')";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSent3SQL);
$activetrades=$rsSent3["mytotal"];

$rsSent3=null;

?>
<!--#include file="inc_header.php" -->

<? 
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID='".$rsGuestbookHead["Nation_ID"]."'  ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
?>

<? 
// $rsSanction is of type "ADODB.Recordset"

$rsSanctionSQL="SELECT Nation_ID FROM Sanctions WHERE (Nation_ID='".intval($_GET["Nation_ID"])."' OR Nation_ID= '".intval($_GET["bynation"])."' ) AND Sanction_Aid = 1 AND (Sanction_Team = '".$rsDetail["Nation_Team"]."' OR Sanction_Team = '".$rsGuestbookHead["Nation_Team"]."') ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSanctionSQL);

$sanctions=0;
if (!($rsSanction_BOF==1) && !($rsSanction==0))
{

  $sanctions=1;
} 



$rsSanction=null;

?>
<!--#include file="calculations.php" --> 
<? 
$techavailable=$rsGuestbook["Technology_Purchased"];
$actualmilitary=$actualmilitary-100;
$totalmoneyavailable=$totalmoneyavailable-500;

if ($totalmoneyavailable<1)
{
  $totalmoneyavailable=0;
}
;
} 
if ($techavailable<1)
{
  $techavailable=0;
}
;
} 
if ($actualmilitary<1)
{
  $actualmilitary=0;
}
;
} 

if ($totalmoneyavailable>3000000)
{
  $totalmoneyavailable=3000000;
}
;
} 
if ($techavailable>50)
{
  $techavailable=50;
}
;
} 
if ($actualmilitary>2000)
{
  $actualmilitary=2000;
}
;
} ?>


<? 
//===============================================================================================================

if ($_POST["Aid_Issued_By_User"]!="")
{

?>
<!--#include file="activity.php" -->
<? 
  if ($_POST["Password"]=="")
  {

    $denyreason_session="You did not enter anything in the password validation field. Please try again.";
    header("Location: "."activity_denied.asp");
  } 


  $sDigest=sha256($_POST["Password"]);
  if ($sDigest!=$rsUser["U_Password_Secure"])
  {

    $denyreason_session="The password that you entered did not match in the system. Please try again.";
    header("Location: "."activity_denied.asp");
  } 


  if (time()()-$rsGuestbook["Last_Bills_Paid"]>=3)
  {

    $denyreason_session="You must pay your bills before sending foreign aid.";
    header("Location: "."activity_denied.asp");
  } 


  if ($histotal>=6)
  {

    $denyreason_session="The recipient nation already has their foreign aid slots full. Please try again once these aid offers expire.";
    header("Location: "."activity_denied.asp");
  } 


  if ($rsGuestbook["Strength"]<0)
  {

    $denyreason_session="You do not have enough strength to send foreign aid at this time. You need at least 1000 nation strength.";
    header("Location: "."activity_denied.asp");
  } 

  if (strtoupper(.$Item["Nation_Name"].$Value)==strtoupper(.$Item["Nation_Name"].$Value))
  {

    $denyreason_session="Stop playing with yourself.";
    header("Location: "."activity_denied.asp");
  } 

  if ($activetrades>=$aidslots)
  {

    $denyreason_session="You do not have that many aid slots available.";
    header("Location: "."activity_denied.asp");
  } 

  if ($counters>0)
  {

    $denyreason_session="A foreign aid offer already exists between these two nations.";
    header("Location: "."activity_denied.asp");
  } 

  if (intval($_POST["Resource_Sent_1"])>3000000)
  {

    $denyreason_session="The financial aid offer is over 3,000,000 and is invalid.";
    header("Location: "."activity_denied.asp");
  } 

  if ($_POST["Resource_Sent_1"]=="" || $_POST["Resource_Sent_2"]=="" || $_POST["Resource_Sent_3"]=="")
  {

    $denyreason_session="One of the foreign aid fields was not completed.";
    header("Location: "."activity_denied.asp");
  } 

  if (intval($_POST["Resource_Sent_1"])<0 || intval($_POST["Resource_Sent_2"])<0 || intval($_POST["Resource_Sent_3"])<0)
  {

    $denyreason_session="One of the foreign aid fields was not completed.";
    header("Location: "."activity_denied.asp");
  } 

  if (intval($_POST["Resource_Sent_3"])+intval($_POST["Resource_Sent_2"])+intval($_POST["Resource_Sent_1"])==0)
  {

    $denyreason_session="You must choose to send something.";
    header("Location: "."activity_denied.asp");
  } 

  if (intval($_POST["Resource_Sent_1"])>$totalmoneyavailable || intval($_POST["Resource_Sent_1"])>3000000)
  {

    $denyreason_session="You do not have that much money to send or you are not allowed to send that much money.";
    header("Location: "."activity_denied.asp");
  } 

  if (intval($_POST["Resource_Sent_2"])>$techavailable || intval($_POST["Resource_Sent_2"])>50)
  {

    $denyreason_session="You do not have that much technology to send.";
    header("Location: "."activity_denied.asp");
  } 

  if (intval($_POST["Resource_Sent_3"])>$actualmilitary || intval($_POST["Resource_Sent_3"])>2000)
  {

    $denyreason_session="You do not have that many soliders to send.";
    header("Location: "."activity_denied.asp");
  } 

  if ($rsGuestbook["Nation_Peace"]=1|!isset($rsGuestbook["Nation_Peace"])|$rsGuestbook["Nation_Peace"]=""$then;
$denyreason_session="You cannot send foreign aid while in peace mode.";
$Response->Redirect"activity_denied.asp")
  {
  } 

  if ($sanctions==1)
  {

    $denyreason_session="Foreign aid sanctions placed by your team senators exist between your nation or the foreign aid receiver.";
    header("Location: "."activity_denied.asp");
  } 



// $rsAddComments is of type "ADODB.Recordset"

  $rsAddCommentsSQL="SELECT * FROM Aid";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsAddCommentsSQL);
  

  //Aid_Issued_By_User") = rsGuestbook("Poster")  //Aid_Issued_On_User") = rsDetail("Poster")  //Receiving_Nation") = rsDetail("Nation_Name")  //Receiving_Nation_ID") = rsDetail("Nation_ID")  //Declaring_Nation") = rsGuestbook("Nation_Name")  //Declaring_Nation_ID") = rsGuestbook("Nation_ID")
  if (((strpos($_POST["Aid_Reason"],"%") ? strpos($_POST["Aid_Reason"],"%")+1 : 0)>0))
  {

    $denyreason_session="Do not use invalid characters in in your foreign aid reason.";
    header("Location: "."activity_denied.asp");
  } 


  if ($_POST["Aid_Reason"]=="")
  {

    //Aid_Reason") = "Financial Assistance"  }
    else
  {

    //Aid_Reason") = Server.HTMLEncode(Replace(Request.Form("Aid_Reason"), "'", "''"))   } 

  //Aid_Declaration_Date") = now()  //Aid_Cancled") = 0  //Resource_Sent_1") = INT(request.form("Resource_Sent_1"))  //Resource_Sent_2") = INT(request.form("Resource_Sent_2"))  //Resource_Sent_3") = INT(request.form("Resource_Sent_3"))
  



// $adoCon is of type "ADODB.Connection"

  $a2p_connstr==$MM_conn_STRING_Messages;
  $a2p_uid=strstr($a2p_connstr,'uid');
  $a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_pwd=strstr($a2p_connstr,'pwd');
  $a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_database=strstr($a2p_connstr,'dsn');
  $a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $adoCon=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
  mysql_select_db($a2p_database,$adoCon);
// $rsAddComments is of type "ADODB.Recordset"

  $strSQL="EMESSAGES";
    echo 2;
    echo 3;
  $rs=mysql_query($strSQL);
  //U_ID") = rsDetail("Poster")  //MESS_FROM") =  rsGuestbook("Poster")  //MESSAGE") = "A foreign aid offer has been submitted by " & rsGuestbook("Poster") & ". Please review your <a href='aid_information.asp'>Foreign Aid</a> screen to accept or deny this foreign aid offer."   //SUBJECT") = "Foreign Aid Offer"  //MESS_READ") = "False"  


  header("Location: "."aid_information.asp");

} 

//===============================================================================================================

?>

<? if (strtoupper(.$Item["Nation_Name"].$Value)==strtoupper(.$Item["Nation_Name"].$Value))
{
?>
<font color="#FF0000">You shouldn't play with yourself like that.</font>
<? }
  else
{
?>

<?   if ($activetrades>=$aidslots)
  {
?>
<p></p>You cannot offer any new aid agreements because you have already offered or are 
involved in in <?     echo $aidslots; ?> other foreign aid agreements within the past 10 days. This 
includes foreign aid offers that you have received as well as foreign aid offers 
that you have sent.
<?   }
    else
  {
?>

<?     if ($counters>0)
    {
?>
<p></p>A foreign aid offer has already been submitted between you and <?       echo $rsDetail["Nation_Name"]; ?> (<?       echo $rsDetail["Poster"]; ?>) within the past 10 days.
<?     }
      else
    {
?>

<noscript><font color="red"><b>You must have JavaScript enabled to use this page.<p></p></b></font></noscript>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="0" valign="top">
<div align="center">
<table width="100%" border="0" cellspacing="0">
<tr> 
<td height="278" valign="top"> <div align="center"> 

<div align="center">
<table width="100%" border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
<tbody>
<tr bgcolor="5E6C50" class=colorformheader> 
<td colspan=2 bgcolor="#000080">
<table border="0" width="100%" id="table7" cellspacing="0" cellpadding="0">
	<tr>
		<td>
<font class=textsize9 color="#FFFFFF"><b>:. Offer Foreign Aid To <?       echo (.$Item["Nation_Name"].$Value); ?> (<?       echo (.$Item["Poster"].$Value); ?>) </b></font>
		</td>
		<td>
		<p align="right"><font color="#FFFFFF"><font class="textsize9"><b>
		<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=577"><font color="#FFFFFF">About 
		Foreign Aid</font></a></b></font></font></td>
	</tr>
</table>
</td>
</tr>
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Aid_Reason.value == "")
  {
    alert("Please enter a value for the \"Aid Reason\" field.");
    theForm.Aid_Reason.focus();
    return (false);
  }

  if (theForm.Aid_Reason.value.length > 25)
  {
    alert("Please enter at most 25 characters in the \"Aid Reason\" field.");
    theForm.Aid_Reason.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'.\",:;*-+!()/_=’`$?&@ \t\r\n\f";
  var checkStr = theForm.Aid_Reason.value;
  var allValid = true;
  var validGroups = true;
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
  }
  if (!allValid)
  {
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()/_=’`$?&@\" characters in the \"Aid Reason\" field.");
    theForm.Aid_Reason.focus();
    return (false);
  }

  if (theForm.Password.value == "")
  {
    alert("Please enter a value for the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  if (theForm.Password.value.length < 7)
  {
    alert("Please enter at least 7 characters in the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  if (theForm.Password.value.length > 40)
  {
    alert("Please enter at most 40 characters in the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789- \t\r\n\f";
  var checkStr = theForm.Password.value;
  var allValid = true;
  var validGroups = true;
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
  }
  if (!allValid)
  {
    alert("Please enter only letter, digit and whitespace characters in the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="aid_form.asp?Nation_ID=<?       echo $lngRecordNo2; ?>&bynation=<?       echo $lngRecordNo1; ?>" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">      
<input name="Trade_Within_Team" type="hidden" value="1">
<tr>
<td align=right width="97%" height="39" valign="top" colspan="2">
<p align="left">This screen will allow you to offer foreign aid to <?       echo $rsDetail["Poster"]; ?> the ruler of 
<?       echo $rsDetail["Nation_Name"]; ?>. Once <?       echo $rsDetail["Poster"]; ?> 
accepts your foreign aid offer they will be credited with the items that you 
send and you will be debited for those items. After you submit your foreign aid 
offer you may review the details of your offer in your
<a href="aid_information.php">Foreign 
Aid Screen</a>.&nbsp;



<script type="text/javascript">
var submit_ok;
var error_cntr = 0;
function d(){
  var Resource_Sent_1 = parseInt(document.FrontPage_Form1.Resource_Sent_1.value);
  var Resource_Sent_2 = parseInt(document.FrontPage_Form1.Resource_Sent_2.value);
  var Resource_Sent_3 = parseInt(document.FrontPage_Form1.Resource_Sent_3.value);
  var Password = document.FrontPage_Form1.Password.value;
  
    if (Resource_Sent_1 < 0 || Resource_Sent_2 < 0 || Resource_Sent_3 < 0) 
	{
	submit_ok = 'No';
	error_cntr = 1;
	document.getElementById('results').innerHTML="<font color='#FF0000'>You must specify zero or greater in all three categories.";
	}
	if (   isNaN(Resource_Sent_1) || isNaN(Resource_Sent_2) || isNaN(Resource_Sent_3)  ) 
	{
	submit_ok = 'No';
	error_cntr = 1;
	document.getElementById('results').innerHTML="<font color='#FF0000'>You must specify a number of zero or greater in all three categories.";
	}
	if (Resource_Sent_1 == 0 && Resource_Sent_2 == 0 && Resource_Sent_3 == 0) 
	{
	submit_ok = 'No';
	error_cntr = 1;
	document.getElementById('results').innerHTML="<font color='#FF0000'>You cannot specify zero for all three categories.";
	}
		
	if (Resource_Sent_1 > <?       echo intval($totalmoneyavailable); ?> || Resource_Sent_1 > 3000000)
	{
    submit_ok = 'No';
    error_cntr = 1;
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that much money or you cannot send that much money in a foreign aid transaction.";
	}

	if (Resource_Sent_2 > <?       echo intval($techavailable); ?> || Resource_Sent_2 > 50)
	{
    submit_ok = 'No';
    error_cntr = 1;
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that much technology to send or you cannot send that much technology in a foreign aid transaction.";
	}	

	if (Resource_Sent_3 > <?       echo intval($actualmilitary); ?> || Resource_Sent_3 > 2000)
	{
    submit_ok = 'No';
    error_cntr = 1;
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many soldiers to send or you cannot send that many soldiers in a foreign aid transaction.";
	}
	
if (Password == 'undefined')
	{
    submit_ok = 'No';
    error_cntr = 1;
	document.getElementById('results').innerHTML="<font color='#FF0000'>You must enter your password in the password validation field.";
	}
		if (error_cntr == 0)
		{
		submit_ok = 'Yes';
		document.getElementById('results').innerHTML="This foreign aid offer is ok and ready to submit.";
		}
		if (error_cntr == 1)
		{
		error_cntr = 0;
		}
	
}
function submit_form(){
submit_ok = 'No';
 d()
    if (submit_ok == 'Yes') {
  	document.FrontPage_Form1.submit();
    }
}
// End -->
</script>	


</td>
</tr>

<tr>
<td align=right width="29%" height="39" valign="top"><font 
class=textsize9> Foreign Aid Reason:</font></td>
<td width="68%" height="39" valign="top">

<!--webbot bot="Validation" s-display-name="Aid Reason" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()/_=’`$?&amp;@" b-value-required="TRUE" i-maximum-length="25" --><input type="text" name="Aid_Reason" size="30" value="Financial Assistance" maxlength="25">

</td>
</tr>

<tr>
<td align=right width="29%" height="37" valign="top">
<font 
class=textsize9>Aid Offered By:</font></td>
<td width="68%" height="37" valign="top"><font class=textsize9> 

<a href="nation_drill_display.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>"><?       echo $rsGuestbook["Nation_Name"]; ?></a> (<?       echo (.$Item["Poster"].$Value); ?>) -
<?       if (($Item["Nation_Team"]$Value)=="None")
      {
?>
No Team
<?       }
        else
      {
?>
<?         echo (.$Item["Nation_Team"].$Value); ?> Team
<?       } ?>

</td>
</tr>


<tr>
<td align=right width="29%" height="37" valign="top">
<font 
class=textsize9>&nbsp;Aid Offered To:</font></td>
<td width="68%" valign="top"><font class=textsize9> 
<a href="nation_drill_display.asp?Nation_ID=<?       echo $rsDetail["Nation_ID"]; ?>"><?       echo (.$Item["Nation_Name"].$Value); ?></a>  (<?       echo (.$Item["Poster"].$Value); ?>) -
<?       if (($Item["Nation_Team"]$Value)=="None")
      {
?>
No Team
<?       }
        else
      {
?>
<?         echo (.$Item["Nation_Team"].$Value); ?> Team
<?       } ?></td>
</tr>


<tr>
<td align=right width="29%" height="43" valign="top">Financial Aid Offered:</td>

<td width="68%" height="43" valign="top">
<input type="text" size="5" name="Resource_Sent_1" value="0"> of $<?       echo $FormatNumber[$totalmoneyavailable][2]; ?>&nbsp;<?       echo $rsGuestbook["Currency_Type"]; ?>s.

</td>
</tr>
<tr>
<td align=right width="29%" height="43" valign="top">Technology Aid Offered:</td>
<td width="68%" height="43" valign="top">

<input type="text" size="5" name="Resource_Sent_2" value="0"> of <?       echo $FormatNumber[$techavailable][2]; ?> 
available technology.
</td>
</tr>


<tr>
<td align=right width="29%" height="43" valign="top">Military Aid Offered:
</td>
<td width="68%" height="43" valign="top">
<input type="text" size="5" name="Resource_Sent_3" value="0"> of <?       echo ($FormatNumber[$actualmilitary][0]); ?> 
available soldiers.
</td>
</tr>


<tr>
<td align=right width="29%" height="43" valign="top">My Password:<br>
<i>(For validation purposes)</i>
</td>
<td width="68%" height="43" valign="top">
<!--webbot bot="Validation" s-display-name="Password" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" b-value-required="TRUE" i-minimum-length="7" i-maximum-length="40" --><input type="password" name="Password" size="30" maxlength="40"></td>
</tr>


<tr class=colorformfields> 
<td align=right colspan=2><div align="center"><font class=textsize9>




<?       if ($counters>0)
      {
?>
<font color="red">A foreign aid offer already exists between these two nations.</font>
<?       }
        else
      {
?>
	<?         if ($rsGuestbook["Nation_Peace"]=1|!isset($rsGuestbook["Nation_Peace"])|$rsGuestbook["Nation_Peace"]=""$then; ; )
        {

//red">You cannot offer foreign aid while in Peace mode.</font>           $then; ?>
			Either yourself or the nation in question has foreign aid sanctions placed against it by 
			one of your teams. You may not offer foreign aid at this time.
			<?         }
          else
        {
?>
				<?           if ($rsGuestbook["Strength"]<0)
          {
?>
				You cannot send aid at this time because you do not have enough nation strength. You must have at least
				0 nation strength to send foreign aid.
				<?           }
            else
          {
?>
					<?             if (time()()-$rsGuestbook["Last_Bills_Paid"]<=2)
            {
?>
						<?               if ($histotal>=6)
              {
?>
						That nation has too many active foreign aid agreements at this time. Please wait until 
						these agreements expire before attempting to send aid.
						<?               }
                else
              {
?>
						<!--#include file="activitycheck.php" -->
						<input type="button" value="Confirm Aid Offer" onclick="d()">&nbsp; 
						<input type="button" onclick="submit_form()" value="Submit Foreign Aid">
						
						<table border="0" width="60%" cellspacing="0" cellpadding="10" id="table6">
						<tr>
						<td width="4">&nbsp;</td>
						<td><span id='results'></span></td>
						</tr>
						</table>
						<?               } ?>
					<?             }
              else
            {
?>
					You must pay your bills before sending foreign aid.
					<?             } ?>
				<?           } ?>

			<?         } ?>
		<br>
	<?       } ?>
<?     } ?>


<br>
</font></div>



</td>
</tr>
</tbody>
</table>
<p align="left">




</font>

<b>

<span style="background-color: #FFFF99">
<img border="0" src="images/warning.gif" width="17" height="16"> DO NOT attempt 
to send aid to yourself with multiple nations. If you do your nation will be 
flagged for cheating in the <a href="all_aid_information.php">All Foreign Aid 
Offers Across the Globe</a> screen with a cheat indicator for everyone to see. 
If you are caught abusing the foreign aid feature of the game your nation will 
be DELETED.</span></b></div>


<input name="Aid_Issued_By_User" type="hidden" value="<?     echo (.$Item["Poster"].$Value); ?>">
<input name="Declaring_Nation_ID" type="hidden" value="<?     echo (.$Item["Nation_ID"].$Value); ?>">
<input name="Declaring_Nation" type="hidden" value="<?     echo (.$Item["Nation_Name"].$Value); ?>">
<input name="Declaring_Nation_Team" type="hidden" value="<?     echo (.$Item["Nation_Team"].$Value); ?>">

<input name="Aid_Issued_On_User" type="hidden" value="<?     echo (.$Item["Poster"].$Value); ?>">
<input name="Receiving_Nation_ID" type="hidden" value="<?     echo (.$Item["Nation_ID"].$Value); ?>">
<input name="Receiving_Nation" type="hidden" value="<?     echo (.$Item["Nation_Name"].$Value); ?>">
<input name="Receiving_Nation_Team" type="hidden" value="<?     echo (.$Item["Nation_Team"].$Value); ?>">


</form>

</div></td>
</tr>
</table>
</div>
<p align="center">&nbsp; 
<img border="0" src="http://cybernations.net/images/aid.jpg" width="305" height="240"></p> <br>

</td>
</tr>
</table>
<?   } ?><? } ?><? >

<!--#include file="inc_footer.php" -->
<? if ($%)
{
  } 

$rsGuestbook=null;


$rsDetail=null;

$objConn->Close();
$objConn=null;

?>
