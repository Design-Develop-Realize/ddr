<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
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

// $rsSentMessages is of type "ADODB.Recordset"

echo $MM_conn_STRING_Messages;
echo "SELECT COUNT(ID) AS UTOTAL FROM EMessages WHERE MESS_DATE >= '".time()()."' AND MESS_From = '"+str_replace("'","''",$rsUser__MMColParam)+"' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$sentmessages=$rsSentMessages["UTOTAL"];

$rsSentMessages=null;



//Read in the record number to be updated

$lngRecordNo=intval($_GET["Nation_ID"]);
$lngRecordNo=str_replace("'","''",$lngRecordNo);
if ($lngRecordNo!="")
{

// $rsMessageTo is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT Poster FROM Nation WHERE Nation_ID = ".$lngRecordNo;
    echo 0;
    echo 2;
    echo 1;
  $rs=mysql_query();
  $messageto=$rsMessageTo["Poster"];
  
  $rsMessageTo=null;

} 


//=====================================================================================================================

// The form has been submitted and is ready to be processed

if ($_POST["messaging_toid"]!="")
{

  $failed=0;

  if ($sentmessages>200 && $rsUser["U_ID"]!="admin")
  {

    $denyreason_session="You have already sent out 200 messages today. Please wait until tomorrow to use the private message system again.";
    header("Location: "."activity_denied.asp");
  } 


  if ($sentmessages>=25)
  {

?>          
		<!-- #include file="CAPTCHA/CAPTCHA_process_form.php" -->          
		<? 

    if (!$blnCAPTCHAcodeCorrect)
    {

      $failed=1;
      $failedon="You did not enter the validation image code correctly.";
    } 

  } 


  if (strlen($_POST["messaging_subject"])>40)
  {

    $failed=1;
    $failedon="The message subject is greater than 50 characters.";
  } 

  if (strlen($_POST["messaging_toid"])>50)
  {

    $failed=1;
    $failedon="The message recipient name is greater than 50 characters.";
  } 

  if (strlen($_POST["messaging_message"])>1000)
  {

    $failed=1;
    $failedon="The message text field is greater than 1000 characters.";
  } 


  if (trim(strtoupper($_POST["messaging_toid"]))==trim(strtoupper($rsGuestbookHead["Poster"])))
  {

    $failed=1;
    $failedon="You cannot send messages to yourself.";
  } 


// Validate the input

  if (((strpos($_POST["carboncopy"],"<") ? strpos($_POST["carboncopy"],"<")+1 : 0)>0) || ((strpos($_POST["messaging_toid"],"<") ? strpos($_POST["messaging_toid"],"<")+1 : 0)>0) || ((strpos($_POST["messaging_message"],"<") ? strpos($_POST["messaging_message"],"<")+1 : 0)>0) || ((strpos($_POST["messaging_subject"],"<") ? strpos($_POST["messaging_subject"],"<")+1 : 0)>0))
  {

    $failed=1;
    $failedon="Do not use the < character in messages.";
  } 

  if (((strpos($_POST["carboncopy"],">") ? strpos($_POST["carboncopy"],">")+1 : 0)>0) || ((strpos($_POST["messaging_toid"],">") ? strpos($_POST["messaging_toid"],">")+1 : 0)>0) || ((strpos($_POST["messaging_message"],">") ? strpos($_POST["messaging_message"],">")+1 : 0)>0) || ((strpos($_POST["messaging_subject"],">") ? strpos($_POST["messaging_subject"],">")+1 : 0)>0))
  {

    $failed=1;
    $failedon="Do not use the > character in messages.";
  } 

  if (((strpos($_POST["carboncopy"],"#") ? strpos($_POST["carboncopy"],"#")+1 : 0)>0) || ((strpos($_POST["messaging_toid"],"#") ? strpos($_POST["messaging_toid"],"#")+1 : 0)>0) || ((strpos($_POST["messaging_message"],"#") ? strpos($_POST["messaging_message"],"#")+1 : 0)>0) || ((strpos($_POST["messaging_subject"],"#") ? strpos($_POST["messaging_subject"],"#")+1 : 0)>0))
  {

    $failed=1;
    $failedon="Do not use the # character in messages.";
  } 

  if (((strpos($_POST["carboncopy"],"%") ? strpos($_POST["carboncopy"],"%")+1 : 0)>0) || ((strpos($_POST["messaging_toid"],"%") ? strpos($_POST["messaging_toid"],"%")+1 : 0)>0) || ((strpos($_POST["messaging_message"],"%") ? strpos($_POST["messaging_message"],"%")+1 : 0)>0) || ((strpos($_POST["messaging_subject"],"%") ? strpos($_POST["messaging_subject"],"%")+1 : 0)>0))
  {

    $failed=1;
    $failedon="Do not use the % character in messages.";
  } 

  if ($_POST["messaging_toid"]=="")
  {

    $failed=1;
    $failedon="The reciepent ruler name field is blank.";
  } 

  if ($_POST["messaging_message"]=="")
  {

    $failed=1;
    $failedon="The message field is blank.";
  } 

  if ($_POST["messaging_subject"]=="")
  {

    $failed=1;
    $failedon="The message subject field is blank.";
  } 




// Function to sort the array in alphebetical order

  function ShellSort($MyArray)
  {
    extract($GLOBALS);


    $FirstRow=0;
    $LastRow=count($MyArray);
    $NumRows=$LastRow-$FirstRow+1;
    do
    {
      $GapSize=$GapSize*3+1;
    } while (!($GapSize>$NumRows));

    do
    {
      $GapSize=$GapSize$\3;
      for ($i=($GapSize+$FirstRow); $i<=$LastRow; $i=$i+1)
      {

        $CurPos=$i;
        $TempVal=$MyArray[$i];
        while(CompareResult($MyArray[$CurPos-$GapSize],$TempVal))
        {

          $MyArray[$CurPos]=$MyArray[$CurPos-$GapSize];
          $CurPos=$CurPos-$GapSize;
          if (($CurPos-$GapSize)<$FirstRow)
          {
            break;
          } 

        } 
        $MyArray[$CurPos]=$TempVal;

      } 

    } while (!($GapSize==1));

    return $function_ret;
  } 

  function CompareResult($Value1,$Value2)
  {
    extract($GLOBALS);


    $CompareResult=($Value1>$Value2);
    return $function_ret;
  } 


// Check the carbon copy input for invalid ruler names

  if ($_POST["carboncopy"]!="" && $failed==0)
  {


    $MyString=$_POST["carboncopy"];
    $MyArray=$Split[$MyString]["\r\n"];
    ShellSort($MyArray);
    $failed=0;

    for ($i=0; $i<=count($MyArray); $i=$i+1)
    {

      $myArray[$i]=str_replace("'","''",$myArray[$i]);
      $myArray[$i]=trim($myArray[$i]);

      if ($_POST["messaging_toid"]==trim($myArray[$i]))
      {

        $failed=1;
        $failedon="You have duplicate reciepients of ".trim($myArray[$i]).".";
      } 


      if ($duplicatetest==$myArray[$i])
      {

        $failed=1;
        $failedon="You have duplicate reciepients of ".trim($myArray[$j])."..";
      } 

      $duplicatetest=$myArray[$i];

      if ($myArray[$i]=="")
      {

        $failed=1;
        $failedon="You entered a blank reciepient in the carbon copy field.";
      } 



      if ($failed==0)
      {

// $rsUserCheck is of type "ADODB.Recordset"

                echo $MM_conn_STRING;
                echo "SELECT u_id FROM users WHERE u_id = '".trim($myArray[$i])."'";
                echo 0;
                echo 2;
                echo 3;
        $rs=mysql_query();
        if (!($rsUserCheck_BOF==1) && !($rsUserCheck==0))
        {

          if ($rsUserCheck["U_ID"]=$rsGuestbookHead["Poster"]$Then;
$failed==1)
          {
            $failedon="You cannot send messages to yourself.";
          } 
        } 

      } 


      if (($rsUserCheck_BOF==1) && ($rsUserCheck==0))
      {

        $failedon=$myArray[$i]." is an invalid nation ruler name.";
        $failed=1;
      } 

      
      $rsUserCheck=null;


    } 
    if ()
    {

// Check to make sure they didn't enter too many ruler names in the CC field      if ($i>25)
      {

        $failed=1;
        $failedon="You entered more than 25 ruler names.";
      } 

    } 
//move on to the next value of i 

  } 



// Send the message to multiple users

  if ($_POST["carboncopy"]!="" && $failed==0)
  {

    $themessage=htmlspecialchars($_POST["messaging_message"]);
    $themessage=str_replace("\r\n","<br>",$themessage);

    for ($i=0; $i<=count($MyArray); $i=$i+1)
    {

      $myArray[$i]=str_replace("'","''",$myArray[$i]);
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

      //U_ID") = trim(myArray(i))      //MESS_FROM") =  trim(rsGuestbookHead("Poster"))      //MESSAGE") = themessage      //SUBJECT") = request.form("messaging_subject")      //MESS_READ") = "False"

      

//Reset server objects

      
      $rsAddComments=null;


    } 
//move on to the next value of i 

  } 


// Check to see if the actual recipient of the message is valid

// $rsMessageTo is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT U_ID FROM Users WHERE Upper(U_ID) = '".trim(strtoupper($_POST["messaging_toid"]))."'  ";
    echo 0;
    echo 2;
    echo 1;
  $rs=mysql_query();
  if (($rsMessageTo_BOF==1) && ($rsMessageTo==0))
  {

    $failed=1;
    $failedon="The recipient name is not a ruler name in the system.";
  } 

  
  $rsMessageTo=null;



// Now send the message to the actual reciever of the messaging_toid field

  if ($failed==0)
  {

    $themessage=htmlspecialchars($_POST["messaging_message"]);
    $themessage=str_replace("\r\n","<br>",$themessage);

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

    //U_ID") = request.form("messaging_toid")    //MESS_FROM") =  trim(rsGuestbookHead("Poster"))    //MESSAGE") = themessage    //SUBJECT") = request.form("messaging_subject")    //MESS_READ") = "False"

    

//Reset server objects

    
    $rsAddComments=null;

  } 

  if ($messageto=="")
  {

    $messageto=$_POST["messaging_toid"];
  } 


  if ($failed==0)
  {

    header("Location: "."inbox.asp");
  } 

} 


//=====================================================================================================================

$rsMessage__MMColParam="1";
if (($_GET["ID"]!=""))
{

  $rsMessage__MMColParam=intval($_GET["ID"]);
} 


// $rsMessage is of type "ADODB.Recordset"

echo $MM_conn_STRING_Messages;
echo "SELECT *  FROM EMESSAGES  WHERE ID ="+str_replace("'","''",$rsMessage__MMColParam)+"";
echo 0;
echo 2;
echo 1;
$rs=mysql_query();
?>

<script type="text/javascript">
function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}
</script>
<? if ($rsGuestbookHead->BOF && $rsGuestbookHead->EOF)
{
?>
<p></p>You must create your nation before sending messages.
<? }
  else
{
?>

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="0" valign="top">
				<div align="center">
					<table width="100%" border="0" cellspacing="0">
                    <tr> 
                      <td height="278" valign="top"> <div align="center"> 


                          <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.messaging_toid_disabled.value == "")
  {
    alert("Please enter a value for the \"Recipient Ruler Name\" field.");
    theForm.messaging_toid_disabled.focus();
    return (false);
  }

  if (theForm.messaging_toid_disabled.value.length > 50)
  {
    alert("Please enter at most 50 characters in the \"Recipient Ruler Name\" field.");
    theForm.messaging_toid_disabled.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'.\",:;*-+!()?/_=’`$&@ \t\r\n\f";
  var checkStr = theForm.carboncopy.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()?/_=’`$&@\" characters in the \"Carbon Copy Rulers\" field.");
    theForm.carboncopy.focus();
    return (false);
  }

  if (theForm.messaging_subject.value == "")
  {
    alert("Please enter a value for the \"Message Title\" field.");
    theForm.messaging_subject.focus();
    return (false);
  }

  if (theForm.messaging_subject.value.length > 40)
  {
    alert("Please enter at most 40 characters in the \"Message Title\" field.");
    theForm.messaging_subject.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'.\",:;*-+!()?/_=’`$&@ \t\r\n\f";
  var checkStr = theForm.messaging_subject.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()?/_=’`$&@\" characters in the \"Message Title\" field.");
    theForm.messaging_subject.focus();
    return (false);
  }

  if (theForm.messaging_message.value == "")
  {
    alert("Please enter a value for the \"Message\" field.");
    theForm.messaging_message.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'.\",:;*-+!()?/_=’`$&@ \t\r\n\f";
  var checkStr = theForm.messaging_message.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()?/_=’`$&@\" characters in the \"Message\" field.");
    theForm.messaging_message.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form METHOD="POST" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript" name="FrontPage_Form1">
                            <div align="center">
                            <table width="100%" 
                              border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
                              <tbody>
                                <tr bgcolor="5E6C50" class=colorformheader> 
                                  <td colspan=2 bgcolor="#000080">
                                  <p align="left"><font color="#FFFFFF"><b><font class=textsize9>&nbsp;:. Reply To
                                    A Message</font></td>
                                </tr>
                                <?   if ($failed==1)
  {
?>
                                <tr class=colorformfields> 
                                  <td align=right width="100%" valign="top" colspan="2">
									<p align="left"><font color="#FF0000">Your message will fail for 
									the following reason: <?     echo $failedon; ?> </font> </td>
                                </tr>
                                <?   } ?>
                                <tr class=colorformfields> 
                                  <td align=right width="31%" valign="top">
									Recipient<font 
                                class=textsize9> Ruler Name:</font></td>
                                  <td width="69%"><font class=textsize9> 


									<!--webbot bot="Validation" s-display-name="Recipient Ruler Name" b-value-required="TRUE" i-maximum-length="50" --><input type=text disabled name="messaging_toid_disabled" value="<?   echo (.$Item["MESS_FROM"].$Value); ?>" size="30" maxlength="50">
									<input name="messaging_toid" type="hidden" id="messaging_toid" value="<?   echo (.$Item["MESS_FROM"].$Value); ?>">
                                 &nbsp;</font></td>
                                </tr>
                                <tr class=colorformfieldsalt> 
                                  <td align=right width="31%" valign="top">
									Carbon Copy Rulers:<br>
									<font size="1">
									<i>(One per line. Max 25 
									names.)<br>

<script language='javascript' type="text/javascript">
<!--
function find_users()
{
  url = "compose_search.asp";
  window.open(url,'FindUsers','width=500,height=300,resizable=yes,scrollbars=yes'); 
}
//-->
</script><br>
									</i>
<input type='button' class=Buttons name='findusers' onclick='find_users()' value='Search for users' /><i>
</font></td>
                                  <td>
									<!--webbot bot="Validation" s-display-name="Carbon Copy Rulers" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()?/_=’`$&amp;@" -->
									<textarea rows="3" name="carboncopy" cols="30"><?   echo $_POST["carboncopy"]; ?></textarea></td>
                                </tr>
                                <tr class=colorformfieldsalt> 
                                  <td align=right width="31%" valign="top">
									Message Title<font 
                                class=textsize9>:</font></td>
                                  <td><font class=textsize9> 
                                    <!--webbot bot="Validation" s-display-name="Message Title" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()?/_=’`$&amp;@" b-value-required="TRUE" i-maximum-length="40" --><input class=inputFieldIE 
                                maxlength=40 size=30 
                                name=messaging_subject value="RE: <?   echo (.$Item["SUBJECT"].$Value); ?>">
                                    <input name="from" type="hidden" id="from2" value="<?   echo ($rsUser->Fields.$Item["U_ID"].$Value); ?>">
                                    </font></td>
                                </tr>
                                <tr>
                                  <td align=right width="31%" valign="top"><font 
                                class=textsize9>Enter Your Message</font></td>
                                  <td><font class=textsize9> 
                                    <!--webbot bot="Validation" s-display-name="Message" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()?/_=’`$&amp;@" b-value-required="TRUE" --><textarea maxlength="1000" onkeyup="return ismaxlength(this)" name=messaging_message rows=10 cols=30><?   echo $_POST["messaging_message"]; ?></textarea>
                                    </font></td>
                                </tr>
<?   if ($sentmessages>=25)
  {
?>                                                             
<tr>
<td class="title" valign="top">
<p align="right">
<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<br>
</font><font class="textsize9">Enter the code exactly 
as you see it:</font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><br />
</font></font></td>
<td valign="top"> 
<br />
<!--#include file="CAPTCHA/CAPTCHA_form_inc.php" -->
</td>
</tr>
<?   } ?>                   			
                      			
                      			
                                <tr class=colorformfields> 
                                  <td align=right colspan=2><div align="center">&nbsp;</div>
									<div align="left"><font class=textsize9> 
                                      <?   if ($sentmessages>200 && $rsUser["U_ID"]!="admin")
  {
?>
<font color="red">You have already sent out 200 messages today. Please wait until tomorrow to use the private message system again.</font>
<?   }
    else
  {
?>
</font></div>
<div align="center"><font class=textsize9> 
<br><input name=submit2 type=submit class=Buttons id=submit2 value="Send Message"><p>
<?   } ?>
                                      	</font></div>
									<div align="center">&nbsp;</div>
									<div align="left"><i><font color="#FF0000">
										<b>IMPORTANT:</b></font> Do not send 
										fake battle reports of any kind. Do not 
										use any form of m</i><font class=textsize9><i>ass 
										messaging script to send mass messages 
										to 
										other users in Cyber Nations. Do not use 
										any form of software with this messaging 
										system. Violating these rules 
										will quickly get you banned from the 
										game.</i><br>
&nbsp;</font></div></td>
                                </tr>
                              </tbody>
                            </table>
                            </div>
                            <input type="hidden" name="MM_insert" value="form1">
                          </form>

                        </div></td>
                    </tr>
                  </table>
                  </div>
                  <p>&nbsp; </p> <br>




                </td>
              </tr>
            </table>
			<? } ?>
            <!--#include file="inc_footer.php" -->
<? 
$rsUsers->Close();
$rsUsers=null;

$objConn->Close;
$objConn=null;

?>
