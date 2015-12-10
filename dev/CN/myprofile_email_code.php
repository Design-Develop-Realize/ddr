<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("alreadyused_session");
  session_register("activity_session");
?>
<!--#include file="connection.php" -->

<? 
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
<!--#include file="inc_header.php" -->
<? 
//=======================================================================

if ($_POST["New_Email"]!="")
{



//Validate the users email address

  $goby=0; //Initializing goby to 0
;

//if the len is less than 5 then it can't be an email//(i.e.: a@a.c) 

  if (strlen($_POST["New_Email"])<=5)
  {

    $goby=1;
  } 


  if ((strpos(1,$_POST["New_Email"],"@",1) ? strpos(1,$_POST["New_Email"],"@",1)+1 : 0)<2)
  {

//If we find one and only one @, then the

//email address is good to go.

    $goby=1;
  }
    else
  {

    if ((strpos(1,$_POST["New_Email"],".",1) ? strpos(1,$_POST["New_Email"],".",1)+1 : 0)<4)
    {

//Must have a '.' too      $goby=1;
    } 

  } 


  if ($goby!=0)
  {

    $denyreason_session="The email address that you entered is not a valid email address.";
    header("Location: "."activity_denied.asp");
  } 




  $trimemail=trim($_POST["New_Email"]);
  $trimemail=str_replace("'","''",$trimemail);
// $rsEmailCheck is of type "ADODB.Recordset"

  $rsEmailCheckSQL="SELECT * FROM Users WHERE U_EMAIL='".$trimemail."'";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsEmailCheckSQL);

// ===================================

// Redirect them if the email already exists

  while(!($rsEmailCheck==0))
  {

    if (strtoupper($rsEmailCheck["U_EMAIL"])==strtoupper($trimemail))
    {

      $alreadyused_session="True";
      header("Location: "."myprofile_email_code.asp");
    } 

    $rsEmailCheck=mysql_fetch_array($rsEmailCheck_query);
    $rsEmailCheck_BOF=0;

  } 
// ====================================




  function gen_pass($max_num)
  {
    extract($GLOBALS);



    $gen_array[0]="3";
    $gen_array[1]="1";
    $gen_array[2]="2";
    $gen_array[3]="3";
    $gen_array[4]="4";
    $gen_array[5]="5";
    $gen_array[6]="6";
    $gen_array[7]="7";
    $gen_array[8]="8";
    $gen_array[9]="9";
    $gen_array[10]="A";
    $gen_array[11]="B";
    $gen_array[12]="C";
    $gen_array[13]="D";
    $gen_array[14]="E";
    $gen_array[15]="F";
    $gen_array[16]="G";
    $gen_array[17]="H";
    $gen_array[18]="I";
    $gen_array[19]="J";
    $gen_array[20]="K";
    $gen_array[21]="L";
    $gen_array[22]="M";
    $gen_array[23]="N";
    $gen_array[24]="M";
    $gen_array[25]="P";
    $gen_array[26]="Q";
    $gen_array[27]="R";
    $gen_array[28]="S";
    $gen_array[29]="T";
    $gen_array[30]="U";
    $gen_array[31]="V";
    $gen_array[32]="W";
    $gen_array[33]="X";
    $gen_array[34]="Y";
    $gen_array[35]="Z";
    $gen_array[36]="a";
    $gen_array[37]="b";
    $gen_array[38]="c";
    $gen_array[39]="d";
    $gen_array[40]="e";
    $gen_array[41]="f";
    $gen_array[42]="g";
    $gen_array[43]="h";
    $gen_array[44]="i";
    $gen_array[45]="j";
    $gen_array[46]="k";
    $gen_array[47]="g";
    $gen_array[48]="m";
    $gen_array[49]="n";
    $gen_array[50]="k";
    $gen_array[51]="p";
    $gen_array[52]="q";
    $gen_array[53]="r";
    $gen_array[54]="s";
    $gen_array[55]="t";
    $gen_array[56]="u";
    $gen_array[57]="v";
    $gen_array[58]="w";
    $gen_array[59]="x";
    $gen_array[60]="y";
    $gen_array[61]="z";

    mt_srand((double)microtime()*1000000);
// ------- Generate the string until the length of max_num is met ------

    while(strlen($output)<$max_num)
    {

      $num=$gen_array[intval((61-0+1)*(mt_rand(0,10000000)/10000000))];
      $output=$output+$num;
    } 

// ------- Let function result = output ------


    $gen_pass=$output;
    return $function_ret;
  } 

// $rsEmail is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "Select * FROM Users WHERE U_ID = '".$rsUser["U_ID"]."' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();

  $Temp_Email_Code=gen_pass(8);
  $Database_Email_Code=sha256($Temp_Email_Code);
$rsEmail["Temp_Email_Code"]=$Database_Email_Code;
  $rsEmail["Temp_Email"]=$trimemail;
    
  
  $rsEmail=null;

?>

<!--METADATA TYPE="typelib"
UUID="CD000000-8B95-11D1-82DB-00C04FB1625D"
NAME="CDO for Windows 2000 Library" -->
<!--METADATA TYPE="typelib"
UUID="00000205-0000-0010-8000-00AA006D2EA4"
NAME="ADODB Type Library" -->
<? 
// $objMail is of type "CDO.Message"

// $objConfig is of type "CDO.Configuration"

//Configuration:

$objConfig->Fields($cdoSendUsingMethod)=$cdoSendUsingPort;
$objConfig->Fields($cdoSMTPServer)="cybernations.net";
$objConfig->Fields($cdoSMTPServerPort)=25;
$objConfig->Fields($cdoSMTPAuthenticate)=$cdoBasic;
$objConfig->Fields($cdoSendUserName)="webmaster@cybernations.net";
$objConfig->Fields($cdoSendPassword)="chevy$%^79!mail";
//Update configuration

$objConfig->Fields.$Update;
$objMail=$Configuration  echo $objConfig;


$objMail->From="webmaster@cybernations.net";
$objMail->To=$trimemail;
$objMail->Subject="Cyber Nations Email Change";
  $URL="http://www.cybernations.net/myprofile_email_code_confirm.asp";
$objMail->TextBody="Hello ".$rsUser["U_ID"].","."\r\n"."Please validate this email change by using the following email change code below at ".$URL."\r\n"."\r\n"."Email Change Code: ".$Temp_Email_Code."\r\n"."\r\n"."Thanks for playing Cyber Nations, "."\r\n"."Kevin (aka. Admin)"."\r\n"."\r\n"."\r\n"."\r\n"."PROTECT YOUR CREDENTIALS - NEVER give your password to anyone, including Cyber Nations administrators. Protect yourself against fraudulent websites by opening a new web browser (e.g. Internet Explorer or FireFox) and typing in the Cyber Nations URL every time you log in to your account.";
$objMail->Send;
  if ($Err->Number==0)
  {

    print "An email has been sent to you.";
  }
    else
  {

    print "Error sending mail. Code: ".$Err->Number;
$Err->Clear;
  } 

  $objMail=null;

  $objConfig=null;



  header("Location: "."myprofile_email_code.asp?New_Email=".$_POST["New_Email"]);
} 

//=======================================================================

?>

<body bgcolor="white" text="black">


<? if ($_POST["New_Email"]=="" && $_GET["New_Email"]=="")
{
?>

<?   if ($alreadyused_session=="True")
  {

    $Remove["alreadyused"];
?>
<p></p>
<p align="center">
<font color="#FF0000"><strong>Sorry, that 
email is already 
taken. Please try again.</strong></font> <br>
&nbsp;
<?   } ?>



<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.New_Email.value == "")
  {
    alert("Please enter a value for the \"New Email Address\" field.");
    theForm.New_Email.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789-@._- \t\r\n\f";
  var checkStr = theForm.New_Email.value;
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
    alert("Please enter only letter, digit, whitespace and \"@._-\" characters in the \"New Email Address\" field.");
    theForm.New_Email.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form method="post" action="myprofile_email_code.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript" name="FrontPage_Form1">
<tr>
<td align="right" colspan="2" bgcolor="#000080">
<p align="left"><font color="#FFFFFF"><b>Retrieve Email Change Code</b></font><b><font color="#FFFFFF">
</font></b>
</font> </td>
</tr>
<tr>
<td align="left" colspan="2">Fill out and submit the form below to change your 
current in-game email address to a new one. A confirmation code will be sent to 
your new email address for validation.</td>
</tr>
<tr>
<td align="left" width="35%">Current Email Address: </td>
<td> 
<b> 
<?   if (!isset($rsUser["U_Email"]) || $rsUser["U_Email"]=="")
  {
?>
No email address in the system.
<?   }
    else
  {
?>
<?     echo $rsUser["U_Email"]; ?>&nbsp;
<?   } ?>
</b></td>
</tr>
<tr>
<td align="left" width="35%">New Email Address: </td>
<td> 
<b>
<!--webbot bot="Validation" s-display-name="New Email Address" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="@._-" b-value-required="TRUE" --><input type="text" name="New_Email" size="33"></b></td>
</tr>
</table>
<p align="center">   
<!--#include file="activitycheck.php" -->
<input type="hidden" name="U_ID" value="<?   echo $rsUser["U_ID"]; ?>">
<input type="submit" class="Buttons" name="Submit" value="Send Email Change Code"> </p>
</form>

&nbsp;
<? } ?>
<? if ($_GET["New_Email"]!="")
{
?>
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<tr>
<td align="right" bgcolor="#000080">
<p align="left"><b><font color="#FFFFFF">
Email Change Code Sent </font></b>
</font> </td>
</tr>
<tr>
<td align="left">You should receive an email shortly to <?   echo $_GET["New_Email"]; ?> containing instructions for 
changing your in-game email. <br>
&nbsp;</td>
</tr>
</table>
<? } ?>


</body>
</html><!--#include file="inc_footer.php" -->
<? 
//Reset server objects

$rsSent->Close;
$rsSent=null;

$objConn->Close();
$objConn=null;

?>
