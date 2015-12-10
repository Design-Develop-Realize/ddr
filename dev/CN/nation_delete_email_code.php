<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
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
// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT Nation_ID,Delete_Code,Poster FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);
?>
<? 
//=======================================================================

if ($_POST["Nation_ID"]!="")
{


  if (strtoupper($_POST["Nation_ID"])><strtoupper($rsGuestbook0["Nation_ID"].$Value))
  {

    $denyreason_session="You are attempting to process with a nation that does not belong to you.";
    header("Location: "."activity_denied.asp");
  } 


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

  $Delete_Code=gen_pass(8);
  $Database_Delete_Code=sha256($Delete_Code);
$rsGuestbook0["Delete_Code"]=$Database_Delete_Code;
    
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
$objMail->To=$rsUser["U_Email"];
$objMail->Subject="Cyber Nations Deletion Code";
  $URL="http://www.cybernations.net/nation_delete.asp";
$objMail->TextBody="Hello ".$rsUser["U_ID"].","."\r\n"."Please complete the nation deletion process with the code provided below at ".$URL."\r\n"."\r\n"."Nation Delete Code: ".$Delete_Code."\r\n"."\r\n"."Thanks for playing Cyber Nations, "."\r\n"."Kevin (aka. Admin)"."\r\n"."\r\n"."\r\n"."\r\n"."PROTECT YOUR CREDENTIALS - NEVER give your password to anyone, including Cyber Nations administrators. Protect yourself against fraudulent websites by opening a new web browser (e.g. Internet Explorer or FireFox) and typing in the Cyber Nations URL every time you log in to your account.";
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



  header("Location: "."nation_delete_email_code.asp?Completed=1");
} 

//=======================================================================

?>

<body bgcolor="white" text="black">


<? if ($_POST["Nation_ID"]=="" && $_GET["Completed"]!=1)
{
?>
<? 
  if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
  {

    $denyreason_session="You are attempting to delete a nation that does not belong to you.";
    header("Location: "."activity_denied.asp");
  } 

?>
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<form method="post" action="nation_delete_email_code.php">
<tr>
<td align="right" colspan="2" bgcolor="#000080">
<p align="left"><b><font color="#FFFFFF">
Send Nation Deletion Code </font> 
</b>
</font> </td>
</tr>
<tr>
<td align="left" colspan="2">In order to delete your nation you must enter a 
nation deletion code. To retrieve this code submit the form below to have it 
emailed to your email address.</td>
</tr>
<tr>
<td align="left" width="35%">Email Address: </td>
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
</b>
<br>
<a href="myprofile_email_code.php">Change my email address</a>
</td>
</tr>
</table>
<p align="left">   
<!--#include file="activitycheck.php" -->
<input type="hidden" name="Nation_ID" value="<?   echo $rsGuestbook0["Nation_ID"]; ?>">
<?   if (!isset($rsUser["U_Email"]) || $rsUser["U_Email"]=="")
  {
?>
<b><font color="#FF0000">There is no email address for you in the system. Please 
</font> <a href="myprofile_email_code.php">add an email address</a><font color="#FF0000"> before attempting to delete your nation.</font></b>
<?   }
    else
  {
?><p align="center">
<input type="submit" class="Buttons" name="Submit" value="Send Nation Deletion Code"><br>
<?   } ?>


&nbsp; </p>
</form>
<? } ?>
<? if ($_GET["Completed"]==1)
{
?>
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<tr>
<td align="right" bgcolor="#000080">
<p align="left"><b><font color="#FFFFFF">
Nation Deletion Code Sent</font></b></font></td>
</tr>
<tr>
<td align="left"><br>
A nation deletion code has been emailed to your in-game email 
address. Please visit the <a href="nation_delete.php">nation deletion page</a> 
to complete the nation deletion process.<p>&nbsp;</td>
</tr>
</table>
<? } ?>


</body>
</html><!--#include file="inc_footer.php" -->
<? 
//Reset server objects

$rsSent->Close;
$rsSent=null;


$rsGuestbook0=null;

$objConn->Close();
$objConn=null;

?>
