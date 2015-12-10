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

if ($_POST["Temp_Email_Code"]!="")
{


  $Database_Email_Code=sha256($_POST["Temp_Email_Code"]);

  if ($rsUser["Temp_Email_Code"]!=$Database_Email_Code || $rsUser["Temp_Email_Code"]=="" || !isset($rsUser["Temp_Email_Code"]))
  {

    $alreadyused_session="True";
    header("Location: "."myprofile_email_code_confirm.asp");
  }
    else
  {


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

// Generate a new email code so they can't use the same code twice.    $Temp_Email_Code=gen_pass(10);


    $rsUser["U_Email"]=$rsUser["Temp_Email"];
    $rsUser["Temp_Email"]="";
    $rsUser["Temp_Email_Code"]=sha256($Temp_Email_Code);
$rsUser->Update;
  } 


  header("Location: "."myprofile_email_code_confirm.asp?Completed=1");
} 

//=======================================================================

?>

<body bgcolor="white" text="black">


<? if ($_POST["New_Email"]=="" && $_GET["Completed"]!=1)
{
?>

<?   if ($alreadyused_session=="True")
  {

    $Remove["alreadyused"];
?>
<p></p>
<p align="left">
<font color="#FF0000"><strong>Sorry, the email change code that you entered is incorrect. Please try again or request a new
<a href="myprofile_email_code.php">email change code</a>.</strong></font> <br>
&nbsp;
<?   } ?>



<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Temp_Email_Code.value == "")
  {
    alert("Please enter a value for the \"Temp_Email_Code\" field.");
    theForm.Temp_Email_Code.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789-";
  var checkStr = theForm.Temp_Email_Code.value;
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
    alert("Please enter only letter and digit characters in the \"Temp_Email_Code\" field.");
    theForm.Temp_Email_Code.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form method="post" action="myprofile_email_code_confirm.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript" name="FrontPage_Form1">
<tr>
<td align="right" colspan="2" bgcolor="#000080">
<p align="left"><b><font color="#FFFFFF">
Submit Email Change Code
</font></b>
</font> </td>
</tr>
<tr>
<td align="left" colspan="2">Enter the email change code that you received via 
email to complete the email change process.</td>
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
<?   if (!isset($rsUser["Temp_Email"]) || $rsUser["Temp_Email"]=="")
  {
?>
No new email address in the system.
<?   }
    else
  {
?>
<?     echo $rsUser["Temp_Email"]; ?>&nbsp;
<?   } ?>
</b>
</td>
</tr>
<tr>
<td align="left" width="35%">Email Change Code:</td>
<td> 
<b>
<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-value-required="TRUE" --><input type="password" name="Temp_Email_Code" size="20"></b></td>
</tr>
</table>
<p align="left">   
<!--#include file="activitycheck.php" -->
<input type="hidden" name="U_ID" value="<?   echo $rsUser["U_ID"]; ?>">
<?   if (!isset($rsUser["Temp_Email"]) || $rsUser["Temp_Email"]=="")
  {
?>
<b><font color="#FF0000">There is no new email address for you in the system. Please 
</font> <a href="myprofile_email_code.php">add an email address</a><font color="#FF0000"> before attempting to perform this action.</font></b>
<?   }
    else
  {
?><p align="center">
<input type="submit" class="Buttons" name="Submit" value="Change My Email Address"> </p>
<?   } ?>


</form>

&nbsp;
<? } ?>
<? if ($_GET["Completed"]==1)
{
?>
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<tr>
<td align="right" bgcolor="#000080">
<p align="left"><b><font color="#FFFFFF">
Email Change </font></b><font color="#FFFFFF"><b>Complete</b></font></font></td>
</tr>
<tr>
<td align="left">Your in-game email address has been changed to <?   echo $rsUser["U_Email"]; ?>. View 
<a href="myprofile.php">your profile</a> to manage the rest of your user settings.<br>
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
