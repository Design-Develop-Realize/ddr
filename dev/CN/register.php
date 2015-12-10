<?
  session_start();
  session_register("denyreason_session");
  session_register("newReg_session");
  session_register("email_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<!--#include file="Connection.php" -->
<? 
// *** declare variables

$TM_editAction=${"URL"};
if (($_GET!=""))
{

  $TM_editAction=$TM_editAction."?".$_GET;
} 

// boolean to abort record edit

$TM_abortEdit=false;
?>
<? 

$duplicate=$_GET["did"];
// *** declare variables

$TM_editAction=${"URL"};
if (($_GET!=""))
{

  $TM_editAction=$TM_editAction."?".$_GET;
} 

// boolean to abort record edit

$TM_abortEdit=false;
?>
<? 

//This code has been modified from a previous listing found

//on ASPIN.COM 



function gen_pass($max_num)
{
  extract($GLOBALS);



// ------- Setup array of characters to chose from ------


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
  $gen_array[24]="X";
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
  $gen_array[47]="m";
  $gen_array[48]="m";
  $gen_array[49]="n";
  $gen_array[50]="p";
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
?>
<? 
// *** Redirect if username exists

$MM_flag="TM_insert";
if ((${$MM_flag}!=""))
{

  $MM_dupKeyRedirect="register.asp?did=1";

  if ((strpos($_POST["U_ID"],"'") ? strpos($_POST["U_ID"],"'")+1 : 0)>0 || (strpos($_POST["U_EMAIL"],"'") ? strpos($_POST["U_EMAIL"],"'")+1 : 0)>0)
  {

    $denyreason_session="You entered an invalid character in one of the input fields.";
    header("Location: "."activity_denied.asp");
  } 

  if ((strpos($_POST["U_ID"],"%") ? strpos($_POST["U_ID"],"%")+1 : 0)>0)
  {

    $denyreason_session="You entered an invalid character in one of the input fields.";
    header("Location: "."activity_denied.asp");
  } 

  if ((strpos(strtoupper($_POST["U_ID"]),"SCRIPT") ? strpos(strtoupper($_POST["U_ID"]),"SCRIPT")+1 : 0)>0)
  {

    $denyreason_session="You entered an invalid character in one of the input fields.";
    header("Location: "."activity_denied.asp");
  } 



  if (((strpos(strtoupper($_POST["U_ID"]),"FUCK") ? strpos(strtoupper($_POST["U_ID"]),"FUCK")+1 : 0)>0))
  {

    $denyreason_session="Do not use offensive language in in your user name.";
    header("Location: "."activity_denied.asp");
  } 

  if (((strpos(strtoupper($_POST["U_ID"]),"NIGGER") ? strpos(strtoupper($_POST["U_ID"]),"NIGGER")+1 : 0)>0))
  {

    $denyreason_session="Do not use offensive language in in your user name.";
    header("Location: "."activity_denied.asp");
  } 

  if (((strpos(strtoupper($_POST["U_ID"]),"SHIT") ? strpos(strtoupper($_POST["U_ID"]),"SHIT")+1 : 0)>0))
  {

    $denyreason_session="Do not use offensive language in in your user name.";
    header("Location: "."activity_denied.asp");
  } 

  if (((strpos(strtoupper($_POST["U_ID"]),"PUSSY") ? strpos(strtoupper($_POST["U_ID"]),"PUSSY")+1 : 0)>0))
  {

    $denyreason_session="Do not use offensive language in in your user name.";
    header("Location: "."activity_denied.asp");
  } 


?>
<!-- #include file="CAPTCHA/CAPTCHA_process_form.php" -->          
<? 

  if (!$blnCAPTCHAcodeCorrect)
  {

    $denyreason_session="You did not enter the validation code correctly.";
    header("Location: "."activity_denied.asp");
  } 



  $MM_rsKeyConnection=$MM_conn_STRING;
  $MM_dupKeyUsernameValue=$_POST["U_ID"];


//Validate the users email address

  $goby=0; //Initializing goby to 0
;

//if the len is less than 5 then it can't be an email//(i.e.: a@a.c) 

  if (strlen($_POST["U_EMAIL"])<=5)
  {

    $goby=1;
  } 


  if ((strpos(1,$_POST["U_EMAIL"],"@",1) ? strpos(1,$_POST["U_EMAIL"],"@",1)+1 : 0)<2)
  {

//If we find one and only one @, then the

//email address is good to go.

    $goby=1;
  }
    else
  {

    if ((strpos(1,$_POST["U_EMAIL"],".",1) ? strpos(1,$_POST["U_EMAIL"],".",1)+1 : 0)<1)
    {

//Must have a '.' too      $goby=1;
    } 

  } 


  if ($goby!=0)
  {

    $denyreason_session="The email address that you entered is not a valid email address.";
    header("Location: "."activity_denied.asp");
  } 





  $MM_dupKeySQL="SELECT U_ID,U_EMAIL FROM USERS WHERE U_ID='".$MM_dupKeyUsernameValue."' OR U_EMAIL='".$_POST["U_EMAIL"]."'";
  $MM_adodbRecordset="ADODB.Recordset";
// $MM_rsKey is of type MM_adodbRecordset

$MM_rsKey->ActiveConnection=$MM_rsKeyConnection;
$MM_rsKey->Source=$MM_dupKeySQL;
$MM_rsKey->CursorType=0;
$MM_rsKey->CursorLocation=2;
$MM_rsKey->LockType=3;
$MM_rsKey->Open;
  if (!$MM_rsKey->EOF || !$MM_rsKey->BOF)
  {

// the username was found - can not add the requested username

    $MM_qsChar="?";
    if (((strpos(1,$MM_dupKeyRedirect,"?") ? strpos(1,$MM_dupKeyRedirect,"?")+1 : 0)>=1))
    {
      $MM_qsChar="&";
    } 
    $MM_dupKeyRedirect=$MM_dupKeyRedirect.$MM_qsChar."requsername=".$MM_dupKeyUsernameValue;
    header("Location: ".$MM_dupKeyRedirect);
  } 

$MM_rsKey->Close;
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
$MM_keepURL=""; $MM_keepForm=""; $MM_keepBoth=""; $MM_keepNone="";

// add the URL parameters to the MM_keepURL string

foreach ($_GET as $Item)
{

  $NextItem="&".$Item."=";
  if (((strpos(1,$MM_removeList,$NextItem,1) ? strpos(1,$MM_removeList,$NextItem,1)+1 : 0)==0))
  {

    $MM_keepURL=$MM_keepURL.$NextItem.rawurlencode($_GET[$Item]);
  } 

} 
// add the Form variables to the MM_keepForm string

foreach ($_POST as $Item)
{

  $NextItem="&".$Item."=";
  if (((strpos(1,$MM_removeList,$NextItem,1) ? strpos(1,$MM_removeList,$NextItem,1)+1 : 0)==0))
  {

    $MM_keepForm=$MM_keepForm.$NextItem.rawurlencode($_POST[$Item]);
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
// *** Insert Record and retrieve autonumber: set variables

if ((${"TM_insert"}!=""))
{

  $MM_editConnection=$MM_conn_STRING;
  $TM_editTable="USERS";
  $TM_editRedirectUrl="validate.asp";
  $TM_fieldsStr="U_ID|value|Password|value|U_EMAIL|value|IPADDRESS|value";
  $TM_columnsStr="U_ID|',none,''|U_PASSWORD|',none,''|U_EMAIL|',none,''|IPADDRESS|',none,''";
// create the TM_fields and TM_columns arrays

  $TM_fields=$Split[$TM_fieldsStr]["|"];
  $TM_columns=$Split[$TM_columnsStr]["|"];
// set the form values

  for ($i=0; $i<=count($TM_fields); $i=$i+2)
  {
    $TM_fields[$i+1]=$_POST[$TM_fields[$i]];

  } 


// append the query string to the redirect URL

  if (($TM_editRedirectUrl!="" && $_GET!=""))
  {

    if (((strpos(1,$TM_editRedirectUrl,"?",$vbTextCompare) ? strpos(1,$TM_editRedirectUrl,"?",$vbTextCompare)+1 : 0)==0 && $_GET!=""))
    {

      $TM_editRedirectUrl=$TM_editRedirectUrl."?".$_GET;
    }
      else
    {

      $TM_editRedirectUrl=$TM_editRedirectUrl."&".$_GET;
    } 

  } 

  $TM_dontClose=false;
}
  else
{

  $TM_dontClose=true;
} 

?>

<? 
// *** Insert Record and retrieve autonumber for MS Access

// *** ID value is stored in the TM_editCmd("youridcolumn") value

if ((${"TM_insert"}!=""))
{

// create the sql insert statement

  $TM_tableValues="";
  $TM_dbValues="";
  for ($i=0; $i<=count($TM_fields); $i=$i+2)
  {
    $FormVal=$TM_fields[$i+1];
    $TM_typeArray=$Split[$TM_columns[$i+1]][","];
    $Delim=$TM_typeArray[0];
    if (($Delim=="none"))
    {
      $Delim="";
    } 
    $AltVal=$TM_typeArray[1];
    if (($AltVal=="none"))
    {
      $AltVal="";
    } 
    $EmptyVal=$TM_typeArray[2];
    if (($EmptyVal=="none"))
    {
      $EmptyVal="";
    } 
    if (($EmptyVal=="NULL"))
    {
      $EmptyVal="";
    } 
    if (($FormVal==""))
    {

      $FormVal=$EmptyVal;
    }
      else
    {

      if (($AltVal!=""))
      {

        $FormVal=$AltVal;
      } 

    } 

    $TM_fields[$i+1]=$FormVal;

  } 

  if ((!$TM_abortEdit))
  {

// execute the insert using the AddNew method

// $TM_editCmd is of type "ADODB.Recordset"

        echo $MM_editConnection;
        echo 1;
        echo 3;
        echo $TM_editTable;
    $rs=mysql_query();
    
    for ($i=0; $i<=count($TM_fields); $i=$i+2)
    {
//If a value for the column name was passed in,

//set the column name equal to the value passed through the form...

      if (strlen($TM_fields[$i+1])>0 && $TM_fields[$i+1]!="''")
      {

                $TM_columns[$i])=$TM_fields[$i+1];
      } 


    } 

    
    $newReg_session=$TM_editCmd["U_ID"];
    $email_session=$TM_editCmd["U_EMAIL"];
    if (($TM_editRedirectUrl!=""))
    {

            $Close;
      header("Location: ".$TM_editRedirectUrl);
    } 

  } 

} 

?>

<? 

// $rsSettings is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "Select *  From Settings";
echo 0;
echo 2;
echo 1;
$rs=mysql_query();

$rsSettings_numRows=0;
?>
<script type="text/javascript">

function openpopup(popurl){
var winpops=window.open(popurl,"","toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=200,height=200")
}
</script>
<script>

//"Accept terms" form submission- By Dynamic Drive
//For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
//This credit MUST stay intact for use

var checkobj

function agreesubmit(el){
checkobj=el
if (document.all||document.getElementById){
for (i=0;i<checkobj.form.length;i++){  //hunt down submit button
var tempobj=checkobj.form.elements[i]
if(tempobj.type.toLowerCase()=="submit")
tempobj.disabled=!checkobj.checked
}
}
}

function defaultagree(el){
if (!document.all&&!document.getElementById){
if (window.checkobj&&checkobj.checked)
return true
else{
alert("Please read/accept terms to submit form")
return false
}
}
}

</script>
<!--#include file="inc_header.php" -->
<? 
$nothingcntr=1;
if ($rsGuestbookHead->BOF && $rsGuestbookHead->EOF)
{

  $nothingcntr=0;
} 

?>
<? if ($rsGuestbookHead->BOF && $rsGuestbookHead->EOF && $nothingcntr==0)
{
?>



<? 
  $theirIP=$_SERVER["remote_addr"];

// $rsIPBAN is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "Select Last_IP,IPADDRESS,BANNED From Users Where IPADDRESS = '".$theirIP."' OR Last_IP = '".$theirIP."'";
    echo 0;
    echo 2;
    echo 1;
  $rs=mysql_query();
  $rsIPBAN_numRows=0;
  while((!($rsIPBAN_BOF==1)) && (!($rsIPBAN==0)))
  {

    if ($rsIPBAN["BANNED"]=1|$rsIPBAN["BANNED"]=3$then;
$theyarebanned=1;
;
  }
)
    {
      $rsIPBAN=mysql_fetch_array($rsIPBAN_query);
      $rsIPBAN_BOF=0;
    } 

  } 
  if ($theyarebanned==1)
  {

    header("Location: "."banned.asp");
  } 

?>




<? 
// Count the number of nations before regristration

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT COUNT(Nation_ID) AS CADS FROM Nation";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<?   if ($rsAllUsers["CADS"]>50000)
  {
?> 
The Cyber Nations register screen is down for maintenance. Please try again later.
<?   }
    else
  {
?>

<?     if ($duplicate==1)
    {
?><p align="left"> 
<font color="#FF0000"><strong>Sorry, that user name or 
email is already 
taken. If you do not remember your user name or 
password you can <a href="sendpassword1.php">have it 
sent to you</a>.</strong></font><br>
&nbsp; <br>
<?     } ?>

<div align="center">

<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" width="100%">
<tr align="center" valign="middle" bgcolor="#FFFFFF" class="bodyText"> 
<td width="77%" bgcolor="#FFFFFF"> <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.U_ID.value == "")
  {
    alert("Please enter a value for the \"User Name\" field.");
    theForm.U_ID.focus();
    return (false);
  }

  if (theForm.U_ID.value.length < 5)
  {
    alert("Please enter at least 5 characters in the \"User Name\" field.");
    theForm.U_ID.focus();
    return (false);
  }

  if (theForm.U_ID.value.length > 20)
  {
    alert("Please enter at most 20 characters in the \"User Name\" field.");
    theForm.U_ID.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-.,:;*-+!()?/_=$& \t\r\n\f";
  var checkStr = theForm.U_ID.value;
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
    alert("Please enter only letter, digit, whitespace and \".,:;*-+!()?/_=$&\" characters in the \"User Name\" field.");
    theForm.U_ID.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-@._- \t\r\n\f";
  var checkStr = theForm.U_EMAIL.value;
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
    alert("Please enter only letter, digit, whitespace and \"@._-\" characters in the \"Email\" field.");
    theForm.U_EMAIL.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form ACTION="<?     echo $TM_editAction; ?>" METHOD="POST" name="FrontPage_Form1" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
<input name="classifieds" type="hidden" value="0">
<div align="center">
<table width="100%" cellspacing="0" cellpadding="5" border="1" bordercolor="#000080">
<tr valign="baseline"> 
<td colspan="2" align="right" nowrap bgcolor="#000080">
<div align="left"><strong><font color="#FFFFFF">
:. Register With Cyber Nations (Create A 
Ruler)</font></strong></div></td>
</tr>
<tr valign="baseline"> 
<td align="right" nowrap width="25%"><div align="right">
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<strong>
<img border="0" src="assets/asterisk_red.gif" width="15" height="12">User 
Name:<br>
&nbsp;</strong></font></div></td>
<td width="50%"> <div align="left"> 
<table border="0" width="100%" id="table2" cellspacing="0" cellpadding="0">
	<tr>
		<td width="232">
<!--webbot bot="Validation" s-display-name="User Name" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars=".,:;*-+!()?/_=$&amp;" b-value-required="TRUE" i-minimum-length="5" i-maximum-length="20" --><input name="U_ID" type="text" class="inputFieldIE" value="" size="32" maxlength="20" id="fname" onchange="test(this.id)"></td>
<script type="text/javascript">
function test(x)
{
var testname=document.FrontPage_Form1.U_ID.value //document.getElementById(x).value
var pattern = / /g;
var MyNewString=testname.replace(pattern,"%20");

//alert (document.FrontPage_Form1.U_ID.value)
document.getElementById("moretext").innerHTML = " <a href=javascript:openpopup('register_check.asp?U_ID=" + MyNewString + "')>Check Availability</a>";
}
</script>
		<td>

<div id="moretext"></div>
		</td>
	</tr>
</table>
<input name="Password" type="hidden" id="Password" value="<?     echo gen_pass(8); ?>">
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<strong><i><font color="#FF0000">
Important: </font>This will be your <u>Ruler 
Name</u> in the 
game. You cannot change it once you 
register so make sure you pick your 
ruler name 
carefully. The admin will not change 
your ruler name for you. You will create 
your actual <u>Nation Name</u> in a 
later step.</i></strong></font></div></td>
</tr>
<tr>
<td nowrap align="right" width="25%">
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<strong>
<img border="0" src="assets/asterisk_red.gif" width="15" height="12"></strong></font><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#333333">Email:</font></b></td>
<td width="50%"> 
<!--webbot bot="Validation" s-display-name="Email" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="@._-" --><input type="text" name="U_EMAIL" value="" size="32" class="inputFieldIE"><br>
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<strong><i><font color="#FF0000">Important:
</font></i></strong></font><strong><i>
<font face="Verdana, Arial, Helvetica, sans-serif" size="1">
Your email address </font></i></strong>
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<strong><i>must use a real email address to receive your password. </i></strong></font> 
</td>
</tr>
<tr>
                        <td class="title" valign="top">
						<p align="right"><br>
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<strong>
<img border="0" src="assets/asterisk_red.gif" width="15" height="12"></strong></font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Enter the code exactly 
						as you see it:</strong></font><br />
                		</font></td>
                        <td valign="top"> 
                        <br />
                

<!--#include file="CAPTCHA/CAPTCHA_form_inc.php" -->

</td>
                      </tr>
<tr valign="baseline"> 
<td align="right" nowrap colspan="2"> <div align="center"> 
<p>





<br>
<b>Terms and Conditions</b><p> 
<!--#include file="terms_include.php" -->



</p>
<table border="0" width="71%" id="table1" cellpadding="7">
<tr>
<td valign="top">
<p align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><img border="0" src="assets/asterisk_red.gif" width="15" height="12"></strong></font><input name="agreecheck" type="checkbox" onClick="agreesubmit(this)"><br>
&nbsp;</td>
<td><b> I agree to the above terms and conditions 
<u>AND</u> certify that I am not 
creating multiple accounts with 
the same user.</b></td>
</tr>
</table>

</div> <div align="center"> 
<br>

<input name="submit" disabled type="submit" value="Continue">


</div>
<div align="center"> 
&nbsp;</div></td>
</tr>
</table>
<p align="left">Required fields are 
denoted by  
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<strong>
<img border="0" src="assets/asterisk_red.gif" width="15" height="12"></strong></font></div>
<input type="hidden" name="TM_insert" value="true">
<input type="hidden" name="IPADDRESS" value="<?     echo ($_SERVER["remote_addr"]); ?>">
</form></td>
</tr>
</table>
<p align="left"> 
<b><span style="background-color: #FFFFCC">
<font color="#FF0000">WARNING:</font> Players are only allowed one ruler name 
and one nation <u>PER PLAYER!</u> Multiple accounts by the same user will be <u>
DELETED</u> and the user will be <u>BANNED</u> from using this site! <?   } ?>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-764032-1";
urchinTracker();
</script>
</span>
<? }
  else
{
?>
<br> Sorry, but you already have a Cyber Nations account. 
You may attempt to
<a href="login.php">login</a> or if you have forgotten your user name or password <a href="sendpassword1.php">
click here</a>. 

<? } ?>


<!--#include file="inc_footer.php" --></div>

<? 

$rsSettings=null;

$objConn->Close();
$objConn=null;

?><? if (!$TM_dontClose)
{
  } 
$Close; ?>
