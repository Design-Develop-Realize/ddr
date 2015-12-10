<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<? 
// *** Logout the current user.

$MM_Logout=$_SERVER["URL"]."?MM_Logoutnow=1";
if ((${"MM_Logoutnow"}=="1"))
{


  $MM_logoutRedirectPage="default.asp";
// redirect with URL parameters (remove the "MM_Logoutnow" query param).

  if (($MM_logoutRedirectPage==""))
  {
    $MM_logoutRedirectPage=$_SERVER["URL"];
  } 
  if (((strpos(1,$UC_redirectPage,"?",$vbTextCompare) ? strpos(1,$UC_redirectPage,"?",$vbTextCompare)+1 : 0)==0 && $_GET!=""))
  {

    $MM_newQS="?";
foreach ($_GET as $Item)
    {

      if (($Item!="MM_Logoutnow"))
      {

        if ((strlen($MM_newQS)>1))
        {
          $MM_newQS=$MM_newQS."&";
        } 
        $MM_newQS=$MM_newQS.$Item."=".rawurlencode($_GET[$Item]);
      } 

    }     if ((strlen($MM_newQS)>1))
    {
      $MM_logoutRedirectPage=$MM_logoutRedirectPage.$MM_newQS;
    } 
  } 

  header("Location: ".$MM_logoutRedirectPage);
} 

?>
<!-- #include file="CAPTCHA/CAPTCHA_process_form.php" -->          
<? 

if (!$blnCAPTCHAcodeCorrect)
{

  $denyreason_session="You did not enter the validation code correctly.";
  header("Location: "."activity_denied.asp");
} 





//Validate the users email address

$goby=0; //Initializing goby to 0
;

//if the len is less than 5 then it can't be an email//(i.e.: a@a.c) 

if (strlen($_POST["MY_EMAIL"])<=5)
{

  $goby=1;
} 


if ((strpos(1,$_POST["MY_EMAIL"],"@",1) ? strpos(1,$_POST["MY_EMAIL"],"@",1)+1 : 0)<2)
{

//If we find one and only one @, then the

//email address is good to go.

  $goby=1;
}
  else
{

  if ((strpos(1,$_POST["MY_EMAIL"],".",1) ? strpos(1,$_POST["MY_EMAIL"],".",1)+1 : 0)<1)
  {

//Must have a '.' too    $goby=1;
  } 

} 


if ($goby!=0)
{

  $denyreason_session="The email address that you entered is not a valid email address.";
  header("Location: "."activity_denied.asp");
} 


$lngRecordNo=$_POST["MY_EMAIL"];
$lngRecordNo=str_replace("'","''",$lngRecordNo);

// $RSBODY is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT *  FROM Users Where U_EMAIL='".$lngRecordNo."'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();

if (!($RSBODY_BOF==1) && !($RSBODY==0))
{


  if (strtoupper($_POST["Lost_Username"])!=strtoupper($RSBODY["U_ID"]))
  {

    $denyreason_session="The email address that you specified is valid but it does not match the user name in the system.";
    header("Location: "."activity_denied.asp");
  } 




  $URL="http://www.cybernations.net/validate.asp?p=1";
  $PASS=(.$Item["U_Password"].$Value);
  $ID=(.$Item["U_ID"].$Value);


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

  $Temp_Password=gen_pass(8);
  $Database_Password=sha256($Temp_Password);

$RSBODY["U_Password"]=$Database_Password;
    
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
$objMail->To=$_POST["MY_EMAIL"];
$objMail->Subject="Cyber Nations Temporary Password";
$objMail->TextBody=$ID.","."\r\n"."Per your request a temporary password has been assigned to your account at Cyber Nations. Your temporary credentials are: "."\r\n"."\r\n"."User Name: ".$ID."\r\n"."Password: ".$Temp_Password."\r\n"."\r\n"."IMPORTANT: This is a temporary password only. You must validate these temporary credentials at ".$URL." before attempting to login to Cyber Nations."."\r\n"."\r\n"."If you did not request this email to be sent to you please ignore this message."."\r\n"."\r\n"."\r\n"."\r\n"."PROTECT YOUR CREDENTIALS - NEVER give your password to anyone, including Cyber Nations administrators. Protect yourself against fraudulent websites by opening a new web browser (e.g. Internet Explorer or FireFox) and typing in the Cyber Nations URL every time you log in to your account.";
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

?>
	



<head>


<?   $LN=$_GET["Login"];
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
// create the Form + URL string and remove the intial '&' from each of the strings  $MM_keepBoth=$MM_keepURL.$MM_keepForm;
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

<? } ?>


  

<? if (($RSBODY_BOF==1) && ($RSBODY==0))
{
?>
	<? 
// Count to see if that username even exists

// $rsUTEST is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT COUNT(U_ID) AS UTOTAL FROM Users WHERE U_ID = '".$_POST["Lost_Username"]."'  ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $userexists=$rsUTEST["UTOTAL"];
  
  $rsUTEST=null;

  if ($userexists>0)
  {
?>
	<p></p>That user name was found in our system but the email address that you provided
	does not match our file. You may attempt to <a href="sendpassword1.php">send your information</a> with a valid email address.
	<?   }
    else
  {
?>
	<p></p>We have no record of that user name on file. You may attempt to
	<a href="sendpassword1.php">send your information</a> with a valid email address and user name
	or <a href="register.php">register</a> a new user name.
	<?   } ?>

<? }
  else
{
?>          

              
            <body text="#000000">

            <div align="right"></div>
            <p align="left">An email has been sent to your email address with further instructions for activating your account.
            Please follow the instructions in the email <font color="#FF0000">
			<b>WORD FOR WORD</b></font> by first validating the temporary password before
            attempting to login. (You cannot login directly to the site with the 
			temporary password) See the email for more information.
			</p>
			<p></p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td  height="0" valign="top" width="100%"> 
               <table height="0" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr> 
                      <td valign="bottom" width="100%"></td>
                    </tr>
                    <tr> 
                      <td valign="top" width="100%"> <div align="left"> 
                          <div align="center">
                          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr> 
                              <td align="center" width="100%"> 
                       
                       
                       </td>
                            </tr>
                          </table>
                        	</div>
                        	<p> </div></td>
                    </tr>
                  </table></td>
                <td width="15" valign="top"><br>
                
                </td>
              </tr>
            </table>
   <? } ?><!--#include file="inc_footer.php" -->
<? 
//RSBODY.Close

//Set RSBODY = Nothing

$objConn->Close();
$objConn=null;

?>
