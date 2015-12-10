<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
  session_register("newReg_session");
  session_register("Validate_session");
  session_register("MM_UserAuthorization_session");
?>
<!--#include file="Connection.php" -->
<!--#include file="inc_header.php" -->
<? 


// $rsValidate is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT *  FROM USERS  WHERE U_ID = '".$newReg_session."'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();

$rsValidate_numRows=0;
$trimname=trim($rsValidate["U_ID"]);
$rsValidate["U_ID"]=$trimname;



$CLN=(.$Item["U_ID"].$Value);
$LF=$_GET["Loginfailed"];
$URL="http://www.cybernations.net/validate.asp?p=1";
$PASS=(.$Item["U_Password"].$Value);
$FORUM="http://www.cybernations.net/forums/";
$ID=(.$Item["U_ID"].$Value);
?>




<? if ($Validate_session=="" && $_POST["UserName"]=="" && $_GET["p"]!=1 && $_GET["LF"]!=1)
{
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
$objMail->To=$rsVAlidate["U_EMAIL"];
$objMail->Subject="Cyber Nations Registration";
$objMail->TextBody="Hello ".$CLN.","."\r\n"."Thank you for registering with Cyber Nations. Your account is almost setup on our system. Please validate your new account by using the following information detailed below at ".$URL."\r\n"."\r\n"."User Name: ".$CLN."\r\n"."Password: ".$PASS."\r\n"."\r\n"."The above account information will be your username and temporary password for the Cyber Nations game. You will be asked to create a new password when you first login to the site and you may change your password at any time by accessing your in-game profile. Also there are a lot of resources and information on our forums that can help you get started. In addition to the in game teams within Cyber Nations there are also numerous player created alliances that are constantly vying for position and power that might be willing to accept your nation into their alliance and help you get started. For more information see the Cyber Nations forums at ".$FORUM." I hope you enjoy your nation building experience."."\r\n"."\r\n"."Thanks for playing,"."\r\n"."Kevin (aka. Admin)"."\r\n"."\r\n"."\r\n"."\r\n"."PROTECT YOUR CREDENTIALS - NEVER give your password to anyone, including Cyber Nations administrators. Protect yourself against fraudulent websites by opening a new web browser (e.g. Internet Explorer or FireFox) and typing in the Cyber Nations URL every time you log in to your account.";
$objMail->Send;
  if ($Err->Number==0)
  {

//Response.Write("An email has been sent to you.")

  }
    else
  {

//Response.Write("Error sending mail. Code: " & Err.Number)

$Err->Clear;
  } 

  $objMail=null;

  $objConfig=null;

  $Validate_session=1;
} 

?>

	
	
	

<? 
// *** Validate request to log in to this site.

$MM_LoginAction=$_SERVER["URL"];
if ($_GET!="")
{
  $MM_LoginAction=$MM_LoginAction+"?"+$_GET;
} 
$MM_valUsername=$_POST["Validate_UserName"];
if ($MM_valUsername!="")
{


?>
<!-- #include file="CAPTCHA/CAPTCHA_process_form.php" -->          
<? 

  if (!$blnCAPTCHAcodeCorrect)
  {

    $denyreason_session="You did not enter the validation code correctly.";
    header("Location: "."activity_denied.asp");
  } 



  $sDigest=sha256($_POST["Password"]);

  $MM_fldUserAuthorization="";
  $MM_redirectLoginSuccess="login.asp";
  $MM_redirectLoginFailed="validate.asp?loginfailed=1";
  $MM_flag="ADODB.Recordset";
// $MM_rsUser is of type MM_flag

$MM_rsUser->ActiveConnection=$MM_conn_STRING;
$MM_rsUser->Source="SELECT U_ID,U_PASSWORD,U_PASSWORD_Secure";
  if ($MM_fldUserAuthorization!="")
  {
$MM_rsUser->Source=$MM_rsUser->Source.",".$MM_fldUserAuthorization;
  } 
$MM_rsUser->Source=$MM_rsUser->Source." FROM USERS WHERE U_ID='".str_replace("'","''",$MM_valUsername)."' AND (U_PASSWORD='".str_replace("'","''",$_POST["Password"])."') OR (U_PASSWORD='".$sDigest."')";
$MM_rsUser->CursorType=0;
$MM_rsUser->CursorLocation=2;
$MM_rsUser->LockType=3;
$MM_rsUser->Open;
  if (!$MM_rsUser->EOF || !$MM_rsUser->BOF)
  {


    if (strlen($_POST["New_Password1"])<7 || strlen($_POST["New_Password1"])>50)
    {

      $denyreason_session="Your new password is either too big or too small. It must be at least 7 characters and a maximum of 50 characters.";
      header("Location: "."activity_denied.asp");
    } 


    if (($_POST["New_Password1"]!=$_POST["New_Password2"]) || ($_POST["New_Password1"]=="") || ($MM_rsUser["U_PASSWORD"]=="") || (!isset($MM_rsUser["U_PASSWORD"])))
    {

      $denyreason_session="Your new passwords are not the same or there was an error with the form. Please go back and try again.";
      header("Location: "."activity_denied.asp");
    }
      else
    {

      $sDigest=sha256($_POST["New_Password1"]);
      $MM_rsUser["U_PASSWORD_Secure"]=$sDigest;
      $MM_rsUser["U_PASSWORD"]="";
$MM_rsUser->Update;
    } 



// username and password match - this is a valid user

    $MM_Username_session=$MM_valUsername;
    if (($MM_fldUserAuthorization!=""))
    {

      $MM_UserAuthorization_session=$MM_rsUser->Fields.$Item[$MM_fldUserAuthorization].$Value;
    }
      else
    {

      $MM_UserAuthorization_session="";
    } 

    if ($_GET["accessdenied"]!="" && false)
    {

      $MM_redirectLoginSuccess=$_GET["accessdenied"];
    } 

$MM_rsUser->Close;
    header("Location: ".$MM_redirectLoginSuccess);
  } 

$MM_rsUser->Close;
  header("Location: ".$MM_redirectLoginFailed);
} 

?>
            <? 
// *** Go To Record and Move To Record: create strings for maintaining URL and Form parameters




// create the list of parameters which should not be maintained

$MM_removeList="&index=";
if (($MM_paramName!=""))
{

  $MM_removeList=$MM_removeList."&".$MM_paramName."=";
} 


$MM_keepURL="";
$MM_keepForm="";
$MM_keepBoth="";
$MM_keepNone="";

// add the URL parameters to the MM_keepURL string

foreach ($_GET as $MM_item)
{

  $MM_nextItem="&".$MM_item."=";
  if (((strpos(1,$MM_removeList,$MM_nextItem,1) ? strpos(1,$MM_removeList,$MM_nextItem,1)+1 : 0)==0))
  {

    $MM_keepURL=$MM_keepURL.$MM_nextItem.rawurlencode($_GET[$MM_item]);
  } 

} 
// add the Form variables to the MM_keepForm string

foreach ($_POST as $MM_item)
{

  $MM_nextItem="&".$MM_item."=";
  if (((strpos(1,$MM_removeList,$MM_nextItem,1) ? strpos(1,$MM_removeList,$MM_nextItem,1)+1 : 0)==0))
  {

    $MM_keepForm=$MM_keepForm.$MM_nextItem.rawurlencode($_POST[$MM_item]);
  } 

} 
// create the Form + URL string and remove the intial '&' from each of the strings$MM_keepBoth=$MM_keepURL.$MM_keepForm;
if (($MM_keepBoth!=""))
{

  $MM_keepBoth=substr($MM_keepBoth,strlen($MM_keepBoth)-(strlen($MM_keepBoth)-1));
} 

if (($MM_keepURL!=""))
{

  $MM_keepURL=substr($MM_keepURL,strlen($MM_keepURL)-(strlen($MM_keepURL)-1));
} 

if (($MM_keepForm!=""))
{

  $MM_keepForm=substr($MM_keepForm,strlen($MM_keepForm)-(strlen($MM_keepForm)-1));
} 


// a utility function used for adding additional parameters to these strings

function MM_joinChar($firstItem)
{
  extract($GLOBALS);


  if (($firstItem!=""))
  {

    $MM_joinChar="&";
  }
    else
  {

    $MM_joinChar="";
  } 

  return $function_ret;
} 
?>
            <? 
$HLooper1__numRows=3;
$HLooper1__index=0;
$SmallBanners_numRows=$SmallBanners_numRows+$HLooper1__numRows;
?>















            
             <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr align="center"> 
    <td height="0" align="center" valign="top"> 
      <table width="100%" border="0" cellpadding="2">
        <tr> 
          <td align="left" valign="top" width="93%"> <div align="center">
       
                    
                          <p align="left"></div>
			<div align="center">
       
                    
                          <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolor="#34A336">
							<tr>
								<td><b>You are almost done 
								validating your account. Please 
                            	check your email and enter 
								your user name and temporary password given to 
								you. </b>The message may 
								take a few minutes to deliver and you may need 
								to check your junk mail folder for the message. 
								If you are having problems receiving the 
								validation email or your temporary password 
								isn't working please use
								<a href="sendpassword1.php">this form</a> to 
								have a new validation code sent to you.</td>
							</tr>
							</table>
			</div>
          <div align="center">
       
                    
                          <p align="left">&nbsp;</div>
            <div align="center">
            <table width="100%" border="1" cellpadding="5" cellspacing="0" bgcolor="#F7F7F7" class="table" bordercolor="#000080">
              <tr align="center" valign="middle" bgcolor="5E6C50"> 
                <td width="77%" bgcolor="#000080" height="30" colspan="2">
                <p align="left"><font color="#FFFFFF"><b>&nbsp;:. Validation <? if ($LF==1)
{
?>
                                    <font color="#FF0000">
                                    <em>Oops error with temporary
                                    password !!</em> 
                                    <? } ?></b></font></td>
              </tr>
              <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Validate_UserName.value == "")
  {
    alert("Please enter a value for the \"Validate_UserName\" field.");
    theForm.Validate_UserName.focus();
    return (false);
  }

  if (theForm.Validate_UserName.value.length > 50)
  {
    alert("Please enter at most 50 characters in the \"Validate_UserName\" field.");
    theForm.Validate_UserName.focus();
    return (false);
  }

  if (theForm.Password.value == "")
  {
    alert("Please enter a value for the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  if (theForm.Password.value.length < 5)
  {
    alert("Please enter at least 5 characters in the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  if (theForm.Password.value.length > 50)
  {
    alert("Please enter at most 50 characters in the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  if (theForm.New_Password1.value == "")
  {
    alert("Please enter a value for the \"New_Password1\" field.");
    theForm.New_Password1.focus();
    return (false);
  }

  if (theForm.New_Password1.value.length < 7)
  {
    alert("Please enter at least 7 characters in the \"New_Password1\" field.");
    theForm.New_Password1.focus();
    return (false);
  }

  if (theForm.New_Password1.value.length > 50)
  {
    alert("Please enter at most 50 characters in the \"New_Password1\" field.");
    theForm.New_Password1.focus();
    return (false);
  }

  if (theForm.New_Password2.value == "")
  {
    alert("Please enter a value for the \"New_Password2\" field.");
    theForm.New_Password2.focus();
    return (false);
  }

  if (theForm.New_Password2.value.length < 7)
  {
    alert("Please enter at least 7 characters in the \"New_Password2\" field.");
    theForm.New_Password2.focus();
    return (false);
  }

  if (theForm.New_Password2.value.length > 50)
  {
    alert("Please enter at most 50 characters in the \"New_Password2\" field.");
    theForm.New_Password2.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form ACTION="<? echo $MM_LoginAction; ?>" method="POST" name="FrontPage_Form1" id="login" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
              <tr align="center" valign="middle" bgcolor="#FFFFFF" class="bodyText"> 
                <td height="0" bgcolor="#FFFFFF" class="bodyText" align="left" width="23%">
				<b>User 
										Name:</b></td>
                <td height="0" bgcolor="#FFFFFF" class="bodyText" align="left">
                                      &nbsp;<!--webbot bot="Validation" b-value-required="TRUE" i-maximum-length="50" --><input value="<? echo (.$Item["U_ID"].$Value); ?>" name="Validate_UserName" type="text" class="displayFieldIE" size="20" maxlength="50"></td>
              </tr>
              <tr align="center" valign="middle" bgcolor="#FFFFFF" class="bodyText"> 
                <td height="0" bgcolor="#FFFFFF" class="bodyText" align="left" width="23%">
				<b>Temporary Password:</b></td>
                <td height="0" bgcolor="#FFFFFF" class="bodyText" align="left"> 
										&nbsp;<!--webbot bot="Validation" b-value-required="TRUE" i-minimum-length="5" i-maximum-length="50" --><input name="Password" type="password" class="displayFieldIE" size="20" maxlength="50"></td>
              </tr>
              <tr align="center" valign="middle" bgcolor="#FFFFFF" class="bodyText"> 
                <td height="0" bgcolor="#FFFFFF" class="bodyText" align="left" width="23%">
				<b>New Password:</b></td>
                <td height="0" bgcolor="#FFFFFF" class="bodyText" align="left"> 
										&nbsp;<!--webbot bot="Validation" b-value-required="TRUE" i-minimum-length="7" i-maximum-length="50" --><input name="New_Password1" type="password" class="displayFieldIE" size="20" maxlength="50"></td>
              </tr>
              <tr>
                <td height="0" bgcolor="#FFFFFF" class="bodyText" align="left" width="23%">
				<b>Confirm New Password:</b></td>
                <td height="0" bgcolor="#FFFFFF" class="bodyText" align="left"> 
										&nbsp;<!--webbot bot="Validation" b-value-required="TRUE" i-minimum-length="7" i-maximum-length="50" --><input name="New_Password2" type="password" class="displayFieldIE" size="20" maxlength="50"></td>
              </tr>
				<tr>
                <td height="0" bgcolor="#FFFFFF" class="bodyText" align="left" width="23%">
				<b>Enter the code exactly 
						as you see it:</b></td>
                <td height="0" bgcolor="#FFFFFF" class="bodyText" align="left"> 
				<!--#include file="CAPTCHA/CAPTCHA_form_inc.php" --></td>
              </tr>
              <tr align="center" valign="middle" bgcolor="#FFFFFF" class="bodyText"> 
                <td height="0" bgcolor="#FFFFFF" class="bodyText" colspan="2">
				<br>
                                          <input name="Submit" type="submit" class="Buttons" value="Continue"><br>
&nbsp;</td>
              </tr>
              </table>
              </form>
            </div>
            <p align="right"></p>
            <div align="right"> </div></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
</table><p>
   <!--#include file="inc_footer.php" -->
<? 
$rsAddComments1->Close();
$rsAddComments1=null;



$rsValidate=null;

$objConn->Close();
$objConn=null;

?>

</p>
</body> </html> 
